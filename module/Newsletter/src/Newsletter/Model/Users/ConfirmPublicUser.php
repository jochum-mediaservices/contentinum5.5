<?php
/**
 * contentinum - accessibility websites
 *
 * LICENSE
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED
 * OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * @category Mcwork
 * @package Model
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 * @copyright Copyright (c) 2009-2013 jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 * @license http://www.opensource.org/licenses/bsd-license
 * @since contentinum version 5.0
 * @link https://github.com/Mikel1961/contentinum-components
 * @version 1.0.0
 */
namespace Newsletter\Model\Users;

use ContentinumComponents\Mapper\Process;
use ContentinumComponents\Unique\Id;

class ConfirmPublicUser extends Process
{
    private $template = 'subscribeconfirmemail';
    
    
    /**
     * Zend\Mail\Transport\Smtp
     * @var Zend\Mail\Transport\Smtp
     */
    private $transport;
    
    /**
     * @return the $transport
     */
    public function getTransport()
    {
        return $this->transport;
    }
    
    /**
     * @param \Contentinum\Model\Zend\Mail\Transport\Smtp $transport
     */
    public function setTransport($transport)
    {
        $this->transport = $transport;
    }
    
    
    
    /**
     * Content query
     *
     * @param array $params
     *            query conditions
     * @return multitype:
     */
    public function fetchContent(array $params = null)
    {
        $datas = $this->fetchRow("SELECT * FROM newsletter_user WHERE verify_string = '{$params['category']}';");
        if (is_array($datas) && ! empty($datas)){
            $newVerify = Id::get();
            $this->executeQuery("UPDATE newsletter_user SET verify_string = '{$newVerify}', close = 'open', publish = 'yes' WHERE verify_string = '{$params['category']}';");
            
            $this->setTransport($this->getSl()->get('contentinum_smtp_transport'));
            $configuration = $this->getSl()->get('contentinum_customer');
            $support = $configuration->default->support_mail;
            $newsletter = $configuration->default->newsletter;
            $template = file_get_contents(CON_ROOT_PATH . '/data/files/emailtemplates/' . $this->template);
            
            
            
            //var_dump($pageOptions);exit;
            
            $body = str_replace('{DATETIME}', date('d.m.Y H:i'), $template);
            $body = str_replace('{TITLE}', $newsletter->website , $body);
            
            require CON_ROOT_PATH . '/vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
            $mail = new \PHPMailer;
            $mail->isSMTP();
            $transport = $this->getTransport()->getOptions();
            $mail->Host = $transport->getHost();
            $mail->SMTPAuth = true;
            $mail->CharSet = 'utf-8';
            $creditals = $transport->getConnectionConfig();
            $mail->Username = $creditals["username"];
            $mail->Password = $creditals["password"];
            $mail->SMTPSecure = 'ssl';
            $mail->Port = $transport->getPort();
            $mail->From = $support->mailfrom;
            $mail->FromName = $support->mailfromname;
            $mail->addReplyTo($support->mailfrom, $support->mailfromname);
            
            $mail->addAddress($datas['email']);
            
            $mail->isHTML(false);
            $mail->Subject = 'Newsletteranmeldung bestätigt';
            
            $mail->Body = $body;
            if(!$mail->send()) {
                return array('error' => $mail->ErrorInfo);
            } else {
                return array('success' => 'OK');
            }            
          
            
        } else {
            return array('error' => 'Der Link ist ung&uuml;ltig, bitte nehmen Sie mit uns Kontakt auf!');
        }
    }
}