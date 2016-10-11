<?php
namespace Mcevent\Model\Events;

use ContentinumComponents\Mapper\Process;

class CancelPublicRegistration extends Process
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
     * Content query
     * 
     * @param array $params
     *            query conditions
     * @return multitype:
     */
    public function fetchContent(array $params = null)
    {
        $datas = $this->fetchRow("SELECT * FROM municipal_service_appointments WHERE uniqid_id = '{$params['category']}';");
        if (is_array($datas) && ! empty($datas)){
            $this->executeQuery("DELETE FROM municipal_service_appointments WHERE uniqid_id = '{$params['category']}';");
            switch ($datas['title']) {
                case 'Frau':
                    $title = 'Sehr geehrte Frau ';
                    break;
                case 'Herr':
                    $title = 'Sehr geehrter Herr ';
                    break;
                default:
                    $title = 'Sehr geehrte(r) ';
            }
            $date = new \DateTime($datas['occupancy_start']);
        
            $configuration = $this->getSl()->get('contentinum_customer');
            $online = $configuration->default->municicpal->zulassungterminstornierung;
            $template = file_get_contents(CON_ROOT_PATH . '/data/files/emailtemplates/' . $online->template);
            $this->setTransport($this->getSl()->get('contentinum_smtp_transport'));
        
            $convert = new \ContentinumComponents\Tools\ConvertMonthDayNames();
            $bookingdate = $convert->get($date->format('N'), 'dayname') . ', ' . $date->format('d') . '. ' . $convert->get($date->format('m')) . ' ' . $date->format('Y') .' um '. $date->format('H:i') .' Uhr';
             
            $body = str_replace('{DATETIME}', date('d.m.Y H:i'), $template);
            $body = str_replace('{ANREDE}', $title , $body);
            $body = str_replace('{NAME}', $datas['surname'] . ' ' . $datas['name'], $body);
            $body = str_replace('{BOOKINGLINK}', $online->bookinglink, $body);
            $body = str_replace('{TERMIN}', $bookingdate, $body);
        
        
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
            $mail->From = $online->masteremail;
            $mail->FromName = $online->mastername;
            $mail->addReplyTo($online->masteremail, $online->mastername);
            $mail->addAddress($datas['email'], $datas['surname'] . ' ' . $datas['name']);
            $mail->isHTML(false);
            $mail->Subject = $online->emailsubjekt;
            $mail->Body = $body;
            if(!$mail->send()) {
                return '<p>Der Termin wurde storniert, es konnte aber keine E-Mail versandt werden.</p>';
            } else {
                return '<p>Der Termin wurde storniert, Sie sollten eine Bestätigung in Kürze per E-Mail erhalten.</p>';
            }
        } else {
            return '<p>Der Termin konnte aufgrund fehlender Parameter nicht storniert werden, rufen Sie uns Bitte an.</p>';
        }
    }

    /**
     *
     * @param array $params            
     * @param string $posts            
     */
    public function processRequest(array $params = null, $posts = null)
    {
        if (is_array($posts)) {
            $params = array_merge($params, $posts);
        }
        return $this->fetchContent($params);

    }
}