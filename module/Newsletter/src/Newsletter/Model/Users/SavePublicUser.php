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
class SavePublicUser extends Process
{
    /**
     * 
     * @var unknown
     */
    private $template = 'subscribeemail';
    
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
     * Prepare datas before save
     *
     * @see \ContentinumComponents\Mapper\Process::save()
     */
    public function save($datas, $entity = null, $stage = '', $id = null)
    {
        $entity = $this->handleEntity($entity);
        if (null === $entity->getPrimaryValue()) {
            $datas['verifyString'] = Id::get();
            $datas['close'] = 'close';
            $datas['publish'] = 'no';
            $datas['date'] = date('Y-m-d H:i:s');
            parent::save($datas, $entity, $stage, $id);
            return $this->sendmail($datas);
        } else {
            parent::save($datas, $entity, $stage, $id);
        }
    } 
    
    /**
     *
     * @param unknown $datas
     */
    private function sendmail($datas)
    {
    
        $this->setTransport($this->getSl()->get('contentinum_smtp_transport'));
        $configuration = $this->getSl()->get('contentinum_customer');
        $support = $configuration->default->support_mail;
        $newsletter = $configuration->default->newsletter;
        $template = file_get_contents(CON_ROOT_PATH . '/data/files/emailtemplates/' . $this->template);
        

        
        //var_dump($pageOptions);exit;
        
        $body = str_replace('{DATETIME}', date('d.m.Y H:i'), $template);
        $body = str_replace('{EMAIL}', $datas['email'] , $body);
        $body = str_replace('{TITLE}', $newsletter->website , $body);
        $body = str_replace('{LINK}', $newsletter->link . '/' . $datas['verifyString'] , $body);
        
    
    
    
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
        $mail->Subject = 'Newsletteranmeldung bei ' . $newsletter->website;
    
        $mail->Body = $body;
        if(!$mail->send()) {
            return array('error' => $mail->ErrorInfo);
        } else {
            return array('success' => 'In Eintrag wurde registriert eine E-Mail zur Bestätigung des Eintrages wurde versand. Bitte prüfen Sie auch Ihr SPAM Verzeichniss.');
        }
    
    }    
    
    
}