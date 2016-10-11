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
 * @category Mcevent
 * @package Model
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 * @copyright Copyright (c) 2009-2013 jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 * @license http://www.opensource.org/licenses/bsd-license
 * @since contentinum version 5.0
 * @link      https://github.com/Mikel1961/contentinum-components
 * @version   1.0.0
 */
namespace Mcevent\Model\Events;

use ContentinumComponents\Mapper\Process;
use ContentinumComponents\Unique\Id;

class SaveRegistration extends Process
{

    /**
     * Zend\Mail\Transport\Smtp
     * 
     * @var Zend\Mail\Transport\Smtp
     */
    private $transport;

    /**
     *
     * @return the $transport
     */
    public function getTransport()
    {
        return $this->transport;
    }

    /**
     *
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
            $ident = $this->fetchRow("SELECT * FROM mcevent_dates WHERE id = {$datas['mceventIdent']}");
            $configure = $this->fetchRow($this->queryString($ident['configure_id']));
            $datas['organizerIdent'] = $configure['organizer_id'];
            $datas['registerIdent'] = Id::get();
            if (strlen($datas['poststreet']) < 2) {
                $datas['poststreet'] = $datas['street'];
                $datas['postnumber'] = $datas['number'];
                $datas['postcity'] = $datas['city'];
                $datas['postzipcode'] = $datas['zipcode'];
            }
            parent::save($datas, $entity, $stage, $id);
            if ('1' === $datas['sendConfirm']){
                return $this->sendmail($datas, $configure, $ident);
            }
        } else {
            parent::save($datas, $entity, $stage, $id);
            $ident = $this->fetchRow("SELECT * FROM mcevent_dates WHERE id = {$datas['mceventIdent']}");
            $configure = $this->fetchRow($this->queryString($ident['configure_id']));
            $datas['organizerIdent'] = $configure['organizer_id'];   
            $datas['registerIdent'] = $entity->registerIdent;
            parent::save($datas, $entity, $stage, $id);
            if ('1' === $datas['sendConfirm']){
                return $this->sendmail($datas, $configure, $ident);
            }           
        }
    }

    /**
     *
     * @param unknown $datas            
     */
    private function sendmail($datas, $configure, $ident)
    {
        $this->setTransport($this->getSl()
            ->get('contentinum_smtp_transport'));
        // $configuration = $this->getSl()->get('contentinum_customer');
        // $support = $configuration->default->support_mail;
        $ordername = $datas['surname'] . ' ' . $datas['name'];
        
        $convert = new \ContentinumComponents\Tools\ConvertMonthDayNames();
        $datetime = new \DateTime($ident['date_start']);
        $trashDate = $convert->get($datetime->format('N'), 'dayname') . ', ' . $datetime->format('d') . '. ' . $convert->get($datetime->format('m')) . ' ' . $datetime->format('Y');
        
        require CON_ROOT_PATH . '/vendor/phpmailer/phpmailer/PHPMailerAutoload.php';
        $mail = new \PHPMailer();
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
        
        if ('1' === $configure['send_email_participant']) {
            $mail->From = $configure['contact_email'];
            $mail->addReplyTo($configure['contact_email']);
            $mail->addAddress($datas['email'], $ordername);
            $mail->isHTML(false);
            $mail->Subject = $configure['emailsubject'];
            
            $body = str_replace('{DATETIME}', date('d.m.Y H:i'), $configure['email_participant']);
            $body = str_replace('{NAME}', $ordername, $body);
            $body = str_replace('{TERMIN}', $trashDate, $body);
            $body = str_replace('{MPOINT}', $ident['location_addresse'] . ', ' . $ident['location_zipcode'] . ' ' . $ident['location_city'], $body);
            
            $body .= "\n\n" . $configure['emailsignature'];
            $mail->Body = $body;
            
            if (! $mail->send()) {
                $msg = array(
                    'error' => $mail->ErrorInfo
                );
            } else {
                $msg = array(
                    'success' => 'Ihre Anmeldung wurde registriert eine E-Mail zur Bestätigung wurde versand. Bitte prüfen Sie auch Ihr SPAM Verzeichniss.'
                );
            }
        } else {
            $msg = array(
                'success' => 'Ihre Anmeldung wurde registriert.'
            );
        }
        
        if ('1' === $configure['send_email_organizer']) {
            unset($mail);
            $this->sendorganizer($datas, $configure, $ordername, $trashDate);
        }
        
        return $msg;
    }
    
    /**
     * 
     * @param unknown $datas
     * @param unknown $configure
     * @param unknown $ordername
     * @param unknown $trashDate
     */
    protected function sendorganizer($datas, $configure, $ordername, $trashDate)
    {

        $mail = new \PHPMailer();
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
        
        $mail->From = $datas['email'];
        $mail->addReplyTo($datas['email']);
        $mail->addAddress($configure['contact_email']);
        $mail->isHTML(false);
        $mail->Subject = 'Anmeldung zur ' . $configure['emailsubject'];
        $body = str_replace('{DATETIME}', date('d.m.Y H:i'), $configure['email_organizer']);
        $body = str_replace('{TEILNEHMER}', $ordername . ', ' . $datas['phone'], $body);
        $body = str_replace('{TERMIN}', $trashDate, $body);
        $body .= "\n\n" . $configure['emailsignature'];
        $mail->Body = $body;
        $mail->send();        
    }
    
    /**
     * 
     * @param unknown $ident
     */
    protected function queryString($ident)
    {
        $sql = "SELECT main.organizer_id, main.send_email_participant, main.email_participant, main.send_email_organizer, main.email_organizer, ";
        $sql .= "main.emailsubject, main.emailsignature, con.first_name, con.last_name, con.contact_email ";
        $sql .= "FROM mcevent_dates_config AS main ";
        $sql .= "LEFT JOIN contacts AS con ON con.id = main.organizer_id ";
        $sql .= "WHERE main.id = {$ident};";
    
        return $sql;
    }    
}