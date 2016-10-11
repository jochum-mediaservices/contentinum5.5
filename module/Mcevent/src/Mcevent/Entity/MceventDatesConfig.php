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
 * @package Entity
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 * @copyright Copyright (c) 2009-2013 jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 * @license http://www.opensource.org/licenses/bsd-license
 * @since contentinum version 5.0
 * @link      https://github.com/Mikel1961/contentinum-components
 * @version   1.0.0
 */
namespace Mcevent\Entity;

use Doctrine\ORM\Mapping as ORM;
use ContentinumComponents\Entity\AbstractEntity;

/**
 * GuestbookConfig
 *
 * @ORM\Table(name="mcevent_dates_config")
 * @ORM\Entity
 */
class MceventDatesConfig extends AbstractEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $id;
    
    /**
     * @var string
     *
     * @ORM\Column(name="organizer_id", type="integer", nullable=false)
     */
    private $organizer = 0;    

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=150, nullable=false)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="send_email_participant", type="integer", nullable=false)
     */    
    private $sendEmailParticipant = 0; // int(1) NOT NULL DEFAULT '0',
    
    /**
     * @var string
     *
     * @ORM\Column(name="email_participant", type="text", nullable=false)
     */    
    private $emailParticipant = ''; // text NOT NULL,
    
    /**
     * @var integer
     *
     * @ORM\Column(name="send_email_organizer", type="integer", nullable=false)
     */    
    private $sendEmailOrganizer = 0; // int(1) NOT NULL DEFAULT '0',
    
    /**
     * @var string
     *
     * @ORM\Column(name="email_organizer", type="text", nullable=false)
     */    
    private $emailOrganizer = ''; // text NOT NULL,
    
    /**
     * @var string
     *
     * @ORM\Column(name="emailsubject", type="string", length=150, nullable=false)
     */    
    private $emailsubject = ''; // varchar(150) NOT NULL,
    
    /**
     * @var string
     *
     * @ORM\Column(name="emailsignature", type="text", nullable=false)
     */    
    private $emailsignature = ''; // varchar(150) NOT NULL, 
    
    /**
     * @var string
     *
     * @ORM\Column(name="settings_formular", type="text", nullable=false)
     */
    private $settingsFormular = ''; // text NOT NULL,    

    /**
     * @var integer
     *
     * @ORM\Column(name="created_by", type="integer", nullable=false)
     */
    private $createdBy = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="update_by", type="integer", nullable=false)
     */
    private $updateBy = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="register_date", type="datetime", nullable=false)
     */
    private $registerDate = '0000-00-00 00:00:00';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="up_date", type="datetime", nullable=false)
     */
    private $upDate = '0000-00-00 00:00:00';

    /**
     * Construct
     * @param array $options
     */
    public function __construct (array $options = null)
    {
    	if (is_array($options)) {
    		$this->setOptions($options);
    	}
    }
    
    /** (non-PHPdoc)
     * @see \ContentinumComponents\Entity\AbstractEntity::getEntityName()
     */
    public function getEntityName()
    {
    	return get_class($this);
    }
    
    /** (non-PHPdoc)
     * @see \ContentinumComponents\Entity\AbstractEntity::getPrimaryKey()
     */
    public function getPrimaryKey()
    {
    	return 'id';
    }
    
    /** (non-PHPdoc)
     * @see \ContentinumComponents\Entity\AbstractEntity::getPrimaryValue()
     */
    public function getPrimaryValue()
    {
    	return $this->id;
    }
    
    /** (non-PHPdoc)
     * @see \ContentinumComponents\Entity\AbstractEntity::getProperties()
     */
    public function getProperties()
    {
    	return get_object_vars($this);
    }
    
    /**
     * @param number $id
     * @return FieldTypes
     */
    public function setId($id)
    {
    	$this->id = $id;
    
    	return $this;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return the $organizer
     */
    public function getOrganizer()
    {
        return $this->organizer;
    }

    /**
     * @param string $organizer
     */
    public function setOrganizer($organizer)
    {
        $this->organizer = $organizer;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return FieldTypes
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }   
    
    /**
     * @return the $sendEmailParticipant
     */
    public function getSendEmailParticipant()
    {
        return $this->sendEmailParticipant;
    }

    /**
     * @param number $sendEmailParticipant
     */
    public function setSendEmailParticipant($sendEmailParticipant)
    {
        $this->sendEmailParticipant = $sendEmailParticipant;
    }

    /**
     * @return the $emailParticipant
     */
    public function getEmailParticipant()
    {
        return $this->emailParticipant;
    }

    /**
     * @param string $emailParticipant
     */
    public function setEmailParticipant($emailParticipant)
    {
        $this->emailParticipant = $emailParticipant;
    }

    /**
     * @return the $sendEmailOrganizer
     */
    public function getSendEmailOrganizer()
    {
        return $this->sendEmailOrganizer;
    }

    /**
     * @param number $sendEmailOrganizer
     */
    public function setSendEmailOrganizer($sendEmailOrganizer)
    {
        $this->sendEmailOrganizer = $sendEmailOrganizer;
    }

    /**
     * @return the $emailOrganizer
     */
    public function getEmailOrganizer()
    {
        return $this->emailOrganizer;
    }

    /**
     * @param string $emailOrganizer
     */
    public function setEmailOrganizer($emailOrganizer)
    {
        $this->emailOrganizer = $emailOrganizer;
    }

    /**
     * @return the $emailsubject
     */
    public function getEmailsubject()
    {
        return $this->emailsubject;
    }

    /**
     * @param string $emailsubject
     */
    public function setEmailsubject($emailsubject)
    {
        $this->emailsubject = $emailsubject;
    }

    /**
     * @return the $emailsignature
     */
    public function getEmailsignature()
    {
        return $this->emailsignature;
    }

    /**
     * @param string $emailsignature
     */
    public function setEmailsignature($emailsignature)
    {
        $this->emailsignature = $emailsignature;
    }

    /**
     * @return the $settingsFormular
     */
    public function getSettingsFormular()
    {
        return $this->settingsFormular;
    }

    /**
     * @param string $settingsFormular
     */
    public function setSettingsFormular($settingsFormular)
    {
        $this->settingsFormular = $settingsFormular;
    }

    /**
     * Set createdBy
     *
     * @param integer $createdBy
     * @return FieldTypes
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return integer 
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set updateBy
     *
     * @param integer $updateBy
     * @return FieldTypes
     */
    public function setUpdateBy($updateBy)
    {
        $this->updateBy = $updateBy;

        return $this;
    }

    /**
     * Get updateBy
     *
     * @return integer 
     */
    public function getUpdateBy()
    {
        return $this->updateBy;
    }

    /**
     * Set registerDate
     *
     * @param \DateTime $registerDate
     * @return FieldTypes
     */
    public function setRegisterDate($registerDate)
    {
        $this->registerDate = $registerDate;

        return $this;
    }

    /**
     * Get registerDate
     *
     * @return \DateTime 
     */
    public function getRegisterDate()
    {
        return $this->registerDate;
    }

    /**
     * Set upDate
     *
     * @param \DateTime $upDate
     * @return FieldTypes
     */
    public function setUpDate($upDate)
    {
        $this->upDate = $upDate;

        return $this;
    }

    /**
     * Get upDate
     *
     * @return \DateTime 
     */
    public function getUpDate()
    {
        return $this->upDate;
    }
}
