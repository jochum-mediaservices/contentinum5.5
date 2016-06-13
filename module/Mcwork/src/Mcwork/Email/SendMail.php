<?php

namespace Mcwork\Email;

use ContentinumComponents\Mapper\Worker;


class SendMail extends Worker
{
    /**
     * Zend\Mail\Transport\Smtp
     * @var Zend\Mail\Transport\Smtp
     */
    private $transport;
    
    /**
     * 
     * @var unknown
     */
    private $supportmail;
    
    /**
     * 
     * @var string
     */
    private $email;
    
    /**
     *
     * @var string
     */    
    private $emailName;
    
    /**
     *
     * @var string
     */    
    private $replayTo;
    
    /**
     *
     * @var string
     */    
    private $replayName;
    
    /**
     *
     * @var string
     */    
    private $from;
    
    /**
     *
     * @var string
     */    
    private $fromName;
    
    /**
     *
     * @var string
     */    
    private $subject;
    
    /**
     * 
     * @var unknown
     */
    private $errorMessages = 'Your E-Mail ';
    
    /**
     * 
     * @var unknown
     */
    private $succesMessages;
    
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
     * @return the $supportmail
     */
    public function getSupportmail()
    {
        return $this->supportmail;
    }

    /**
     * @param unknown $supportmail
     */
    public function setSupportmail($supportmail)
    {
        $this->supportmail = $supportmail;
    }

    /**
     * @return the $email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return the $emailname
     */
    public function getEmailName()
    {
        return $this->emailName;
    }

    /**
     * @param string $emailname
     */
    public function setEmailName($emailname)
    {
        $this->emailName = $emailname;
    }

    /**
     * @return the $replayTo
     */
    public function getReplayTo()
    {
        return $this->replayTo;
    }

    /**
     * @param string $replayTo
     */
    public function setReplayTo($replayTo)
    {
        $this->replayTo = $replayTo;
    }

    /**
     * @return the $replayName
     */
    public function getReplayName()
    {
        return $this->replayName;
    }

    /**
     * @param string $replayName
     */
    public function setReplayName($replayName)
    {
        $this->replayName = $replayName;
    }

    /**
     * @return the $from
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param string $from
     */
    public function setFrom($from)
    {
        $this->from = $from;
    }

    /**
     * @return the $fromname
     */
    public function getFromName()
    {
        return $this->fromName;
    }

    /**
     * @param string $fromname
     */
    public function setFromName($fromname)
    {
        $this->fromName = $fromname;
    }

    /**
     * @return the $subject
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @param string $subject
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    /**
     * @return the $errorMessages
     */
    public function getErrorMessages()
    {
        return $this->errorMessages;
    }

    /**
     * @param unknown $errorMessages
     */
    public function setErrorMessages($errorMessages)
    {
        $this->errorMessages = $errorMessages;
    }

    /**
     * @return the $succesMessages
     */
    public function getSuccesMessages()
    {
        return $this->succesMessages;
    }

    /**
     * @param unknown $succesMessages
     */
    public function setSuccesMessages($succesMessages)
    {
        $this->succesMessages = $succesMessages;
    }

    /**
     * 
     * @param unknown $body
     */
    public function send($body)
    {
        
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
        $mail->From = $this->getFrom();
        if (null !== ($fromname = $this->getFromName())){
            $mail->FromName = $fromname;
        }
        $mail->addReplyTo($this->getReplayTo(), $this->getReplayName());
        $mail->addAddress($this->getEmail(), $this->getEmailName());
        $mail->isHTML(false);
        $mail->Subject = $this->getSubject();
        $supportmail = $this->getSupportmail();
        $body .= "\n\n" . $supportmail->signature;
        $mail->Body = $body;
        if(!$mail->send()) {
            return array('error' => $this->getErrorMessages());
        } else {
            return array('success' => $this->getSuccesMessages());
        }           
    }
}