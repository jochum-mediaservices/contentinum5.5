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
namespace Guestbook\Model\Guests;

use ContentinumComponents\Mapper\Process;
use function Zend\Mvc\Controller\forward;

class SaveEntry extends Process
{
    
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
     * 
     * @var unknown
     */
    private $alloedchars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyzÄÖÜßäöü 0123456789.";

    /**
     * Prepare datas before save
     *
     * @see \ContentinumComponents\Mapper\Process::save()
     */
    public function save($datas, $entity = null, $stage = '', $id = null)
    {
        $entity = $this->handleEntity($entity);
        if (null === $entity->getPrimaryValue()) {
            if (isset($datas['furthernames']) && strlen($datas['furthernames']) > 0) {
                return array(
                    'error' => 'Sorry! ERROR!'
                );
            } else {
                $conf = $this->fetchRow("SELECT * FROM web_guestbook_config WHERE id = 1;");
                $datas['com'] = strip_tags($datas['com']);
                $datas['com'] = str_replace ("http://","", $datas['com']);
                $datas['com'] = str_replace ("https://","", $datas['com']);
                if ('0' == $conf['mark_spam_first']){
                    $datas['approved'] = 'publish';
                    $datas['checkout'] = 1;
                }
                parent::save($datas, $entity, $stage, $id);
                if ('1' == $conf['send_email']){
                    $this->sendmail($datas, $conf);
                }
                return array(
                    'success' => 'Vielen Dank! Dein Eintrag wurde registriert und nach Prüfung freigeschaltet.'
                );
            }
        } else {
            return array(
                'error' => 'Sorry! Es gab einen Fehler Bitte probiere es später noch einmal!'
            );
        }
    }
    
    
    /**
     *
     * @param unknown $datas
     */
    private function sendmail($datas, $conf)
    {
    
        $this->setTransport($this->getSl()->get('contentinum_smtp_transport'));
        $configuration = $this->getSl()->get('contentinum_customer');
        $support = $configuration->default->support_mail;
        $body = 'Serverzeit: ' . date('d.m.Y H:i');
        $body .= "\n\n" . 'Neuer Eintrag ins Gästebuch:';
        $body .= "\n" . $datas['com'];
        $body .= "\n\n" . 'Bitte loggen Sie sich ein und validieren den Eintrag';

    
    
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
        foreach (explode(';', $conf['email']) as $email){
            $mail->addAddress($email);
        }
        $mail->isHTML(false);
        $mail->Subject = 'Neuer Gästebucheintrag';

        $mail->Body = $body;
        $mail->send();
        return true;
    
    }    
}