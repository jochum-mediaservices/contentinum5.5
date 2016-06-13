<?php

namespace Contentinum\Entity;

use Doctrine\ORM\Mapping as ORM;
use ContentinumComponents\Entity\AbstractEntity;

/**
 * IndexGroups
 *
 * @ORM\Table(name="contact_groups", uniqueConstraints={@ORM\UniqueConstraint(name="scope", columns={"scope"})})
 * @ORM\Entity
 */
class ContactGroups extends AbstractEntity
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
     * @ORM\Column(name="name", type="string", length=250, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="scope", type="string", length=250, nullable=false)
     */
    private $scope;

    /**
     * @var string
     *
     * @ORM\Column(name="avatar", type="string", length=100, nullable=false)
     */
    private $avatar = '';

    /**
     * @var string
     *
     * @ORM\Column(name="image_source", type="string", length=250, nullable=false)
     */
    private $imageSource = '';

    /**
     * @var string
     *
     * @ORM\Column(name="headlines", type="string", length=150, nullable=false)
     */
    private $headlines = '';

    /**
     * @var string
     *
     * @ORM\Column(name="sub_headline", type="text", length=65535, nullable=false)
     */
    private $subHeadline = '';
    
    /**
     * @var string
     *
     * @ORM\Column(name="enable_organame", type="integer", nullable=false)
     */
    private $enableOrganame = 1;  
    
    /**
     * @var string
     *
     * @ORM\Column(name="enable_orglogo", type="integer", nullable=false)
     */
    private $enableOrglogo = 1;    
    
    /**
     * @var string
     *
     * @ORM\Column(name="enable_orgaddress", type="integer", nullable=false)
     */
    private $enableOrgaddress = 0;    
    
    /**
     * @var string
     *
     * @ORM\Column(name="enable_title", type="integer", nullable=false)
     */
    private $enableTitle = 1;
    
    /**
     * @var string
     *
     * @ORM\Column(name="enable_salutation", type="integer", nullable=false)
     */
    private $enableSalutation = 1;
    
    /**
     * @var string
     *
     * @ORM\Column(name="enable_first_name", type="integer", nullable=false)
     */
    private $enableFirstName = 1;
    
    /**
     * @var string
     *
     * @ORM\Column(name="enable_last_name", type="integer", nullable=false)
     */
    private $enableLastName = 1;
    
    /**
     * @var string
     *
     * @ORM\Column(name="enable_business_title", type="integer", nullable=false)
     */
    private $enableBusinessTitle = 1;
    
    /**
     * @var string
     *
     * @ORM\Column(name="enable_just_sign", type="integer", nullable=false)
     */
    private $enableJustSign = 1;
    
    /**
     * @var string
     *
     * @ORM\Column(name="enable_phone_home", type="integer", nullable=false)
     */
    private $enablePhoneHome = 1;
    
    /**
     * @var string
     *
     * @ORM\Column(name="enable_phone_mobile", type="integer", nullable=false)
     */
    private $enablePhoneMobile = 1;
    
    /**
     * @var string
     *
     * @ORM\Column(name="enable_phone_work", type="integer", nullable=false)
     */
    private $enablePhoneWork = 1;
    
    /**
     * @var string
     *
     * @ORM\Column(name="enable_phone_other", type="integer", nullable=false)
     */
    private $enablePhoneOther = 1;
    
    /**
     * @var string
     *
     * @ORM\Column(name="enable_phone_fax", type="integer", nullable=false)
     */
    private $enablePhoneFax = 1;
    
    /**
     * @var string
     *
     * @ORM\Column(name="enable_contact_email", type="integer", nullable=false)
     */
    private $enableContactEmail = 1;
    
    /**
     * @var string
     *
     * @ORM\Column(name="enable_internet", type="integer", nullable=false)
     */
    private $enableInternet = 1;
    
    /**
     * @var string
     *
     * @ORM\Column(name="enable_alternate_email", type="integer", nullable=false)
     */
    private $enableAlternateEmail = 1;
    
    /**
     * @var string
     *
     * @ORM\Column(name="enable_chat", type="integer", nullable=false)
     */
    private $enableChat = 1;
    
    /**
     * @var string
     *
     * @ORM\Column(name="enable_facebook", type="integer", nullable=false)
     */
    private $enableFacebook = 1;
    
    /**
     * @var string
     *
     * @ORM\Column(name="enable_twitter", type="integer", nullable=false)
     */
    private $enableTwitter = 1;
    
    /**
     * @var string
     *
     * @ORM\Column(name="enable_instagram", type="integer", nullable=false)
     */
    private $enableInstagram = 1;
    
    /**
     * @var string
     *
     * @ORM\Column(name="enable_pinterest",type="integer", nullable=false)
     */
    private $enablePinterest = 1;
    
    /**
     * @var string
     *
     * @ORM\Column(name="enable_image", type="integer", nullable=false)
     */
    private $enableImage = 1;
    
    /**
     * @var string
     *
     * @ORM\Column(name="enable_address", type="integer", nullable=false)
     */
    private $enableAddress = 1;
    
    /**
     * @var string
     *
     * @ORM\Column(name="enable_birthdate", type="integer", nullable=false)
     */
    private $enableBirthdate = 1;
    
    /**
     * @var string
     *
     * @ORM\Column(name="enable_description", type="integer", nullable=false)
     */
    private $enableDescription = 1;    


    /**
     * @var integer
     *
     * @ORM\Column(name="created_by", type="integer", nullable=false)
     */
    private $createdBy;

    /**
     * @var integer
     *
     * @ORM\Column(name="update_by", type="integer", nullable=false)
     */
    private $updateBy;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="register_date", type="datetime", nullable=false)
     */
    private $registerDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="up_date", type="datetime", nullable=false)
     */
    private $upDate;
    
    /**
     * @var \Contentinum\Entity\Accounts
     *
     * @ORM\ManyToOne(targetEntity="Contentinum\Entity\Accounts")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="accounts_id", referencedColumnName="id")
     * })
     */
    private $accounts;    
    
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
     * @return the $id
     */
    public function getId()
    {
        return $this->id;
    }

	/**
     * @param number $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

	/**
     * @return the $name
     */
    public function getName()
    {
        return $this->name;
    }

	/**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

	/**
     * @return the $scope
     */
    public function getScope()
    {
        return $this->scope;
    }

	/**
     * @param string $scope
     */
    public function setScope($scope)
    {
        $this->scope = $scope;
    }

	/**
     * @return the $avatar
     */
    public function getAvatar()
    {
        return $this->avatar;
    }

	/**
     * @param string $avatar
     */
    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;
    }

	/**
     * @return the $imageSource
     */
    public function getImageSource()
    {
        return $this->imageSource;
    }

	/**
     * @param string $imageSource
     */
    public function setImageSource($imageSource)
    {
        $this->imageSource = $imageSource;
    }

	/**
     * @return the $headlines
     */
    public function getHeadlines()
    {
        return $this->headlines;
    }

	/**
     * @param string $headlines
     */
    public function setHeadlines($headlines)
    {
        $this->headlines = $headlines;
    }

	/**
     * @return the $subHeadline
     */
    public function getSubHeadline()
    {
        return $this->subHeadline;
    }

	/**
     * @param string $subHeadline
     */
    public function setSubHeadline($subHeadline)
    {
        $this->subHeadline = $subHeadline;
    }

    

	/**
     * @return the $enableOrganame
     */
    public function getEnableOrganame()
    {
        return $this->enableOrganame;
    }

 /**
     * @return the $enableOrglogo
     */
    public function getEnableOrglogo()
    {
        return $this->enableOrglogo;
    }

 /**
     * @return the $enableOrgaddress
     */
    public function getEnableOrgaddress()
    {
        return $this->enableOrgaddress;
    }

 /**
     * @param string $enableOrganame
     */
    public function setEnableOrganame($enableOrganame)
    {
        $this->enableOrganame = $enableOrganame;
    }

 /**
     * @param string $enableOrglogo
     */
    public function setEnableOrglogo($enableOrglogo)
    {
        $this->enableOrglogo = $enableOrglogo;
    }

 /**
     * @param string $enableOrgaddress
     */
    public function setEnableOrgaddress($enableOrgaddress)
    {
        $this->enableOrgaddress = $enableOrgaddress;
    }

 /**
     * @return the $enableTitle
     */
    public function getEnableTitle()
    {
        return $this->enableTitle;
    }

 /**
     * @param string $enableTitle
     */
    public function setEnableTitle($enableTitle)
    {
        $this->enableTitle = $enableTitle;
    }

 /**
     * @return the $enableSalutation
     */
    public function getEnableSalutation()
    {
        return $this->enableSalutation;
    }

 /**
     * @param string $enableSalutation
     */
    public function setEnableSalutation($enableSalutation)
    {
        $this->enableSalutation = $enableSalutation;
    }

 /**
     * @return the $enableFirstName
     */
    public function getEnableFirstName()
    {
        return $this->enableFirstName;
    }

 /**
     * @param string $enableFirstName
     */
    public function setEnableFirstName($enableFirstName)
    {
        $this->enableFirstName = $enableFirstName;
    }

 /**
     * @return the $enableLastName
     */
    public function getEnableLastName()
    {
        return $this->enableLastName;
    }

 /**
     * @param string $enableLastName
     */
    public function setEnableLastName($enableLastName)
    {
        $this->enableLastName = $enableLastName;
    }

 /**
     * @return the $enableBusinessTitle
     */
    public function getEnableBusinessTitle()
    {
        return $this->enableBusinessTitle;
    }

 /**
     * @param string $enableBusinessTitle
     */
    public function setEnableBusinessTitle($enableBusinessTitle)
    {
        $this->enableBusinessTitle = $enableBusinessTitle;
    }

 /**
     * @return the $enableJustSign
     */
    public function getEnableJustSign()
    {
        return $this->enableJustSign;
    }

 /**
     * @param string $enableJustSign
     */
    public function setEnableJustSign($enableJustSign)
    {
        $this->enableJustSign = $enableJustSign;
    }

 /**
     * @return the $enablePhoneHome
     */
    public function getEnablePhoneHome()
    {
        return $this->enablePhoneHome;
    }

 /**
     * @param string $enablePhoneHome
     */
    public function setEnablePhoneHome($enablePhoneHome)
    {
        $this->enablePhoneHome = $enablePhoneHome;
    }

 /**
     * @return the $enablePhoneMobile
     */
    public function getEnablePhoneMobile()
    {
        return $this->enablePhoneMobile;
    }

 /**
     * @param string $enablePhoneMobile
     */
    public function setEnablePhoneMobile($enablePhoneMobile)
    {
        $this->enablePhoneMobile = $enablePhoneMobile;
    }

 /**
     * @return the $enablePhoneWork
     */
    public function getEnablePhoneWork()
    {
        return $this->enablePhoneWork;
    }

 /**
     * @param string $enablePhoneWork
     */
    public function setEnablePhoneWork($enablePhoneWork)
    {
        $this->enablePhoneWork = $enablePhoneWork;
    }

 /**
     * @return the $enablePhoneOther
     */
    public function getEnablePhoneOther()
    {
        return $this->enablePhoneOther;
    }

 /**
     * @param string $enablePhoneOther
     */
    public function setEnablePhoneOther($enablePhoneOther)
    {
        $this->enablePhoneOther = $enablePhoneOther;
    }

 /**
     * @return the $enablePhoneFax
     */
    public function getEnablePhoneFax()
    {
        return $this->enablePhoneFax;
    }

 /**
     * @param string $enablePhoneFax
     */
    public function setEnablePhoneFax($enablePhoneFax)
    {
        $this->enablePhoneFax = $enablePhoneFax;
    }

 /**
     * @return the $enableContactEmail
     */
    public function getEnableContactEmail()
    {
        return $this->enableContactEmail;
    }

 /**
     * @param string $enableContactEmail
     */
    public function setEnableContactEmail($enableContactEmail)
    {
        $this->enableContactEmail = $enableContactEmail;
    }

 /**
     * @return the $enableInternet
     */
    public function getEnableInternet()
    {
        return $this->enableInternet;
    }

 /**
     * @param string $enableInternet
     */
    public function setEnableInternet($enableInternet)
    {
        $this->enableInternet = $enableInternet;
    }

 /**
     * @return the $enableAlternateEmail
     */
    public function getEnableAlternateEmail()
    {
        return $this->enableAlternateEmail;
    }

 /**
     * @param string $enableAlternateEmail
     */
    public function setEnableAlternateEmail($enableAlternateEmail)
    {
        $this->enableAlternateEmail = $enableAlternateEmail;
    }

 /**
     * @return the $enableChat
     */
    public function getEnableChat()
    {
        return $this->enableChat;
    }

 /**
     * @param string $enableChat
     */
    public function setEnableChat($enableChat)
    {
        $this->enableChat = $enableChat;
    }

 /**
     * @return the $enableFacebook
     */
    public function getEnableFacebook()
    {
        return $this->enableFacebook;
    }

 /**
     * @param string $enableFacebook
     */
    public function setEnableFacebook($enableFacebook)
    {
        $this->enableFacebook = $enableFacebook;
    }

 /**
     * @return the $enableTwitter
     */
    public function getEnableTwitter()
    {
        return $this->enableTwitter;
    }

 /**
     * @param string $enableTwitter
     */
    public function setEnableTwitter($enableTwitter)
    {
        $this->enableTwitter = $enableTwitter;
    }

 /**
     * @return the $enableInstagram
     */
    public function getEnableInstagram()
    {
        return $this->enableInstagram;
    }

 /**
     * @param string $enableInstagram
     */
    public function setEnableInstagram($enableInstagram)
    {
        $this->enableInstagram = $enableInstagram;
    }

 /**
     * @return the $enablePinterest
     */
    public function getEnablePinterest()
    {
        return $this->enablePinterest;
    }

 /**
     * @param string $enablePinterest
     */
    public function setEnablePinterest($enablePinterest)
    {
        $this->enablePinterest = $enablePinterest;
    }

 /**
     * @return the $enableImage
     */
    public function getEnableImage()
    {
        return $this->enableImage;
    }

 /**
     * @param string $enableImage
     */
    public function setEnableImage($enableImage)
    {
        $this->enableImage = $enableImage;
    }

 /**
     * @return the $enableAddress
     */
    public function getEnableAddress()
    {
        return $this->enableAddress;
    }

 /**
     * @param string $enableAddress
     */
    public function setEnableAddress($enableAddress)
    {
        $this->enableAddress = $enableAddress;
    }

 /**
     * @return the $enableBirthdate
     */
    public function getEnableBirthdate()
    {
        return $this->enableBirthdate;
    }

 /**
     * @param string $enableBirthdate
     */
    public function setEnableBirthdate($enableBirthdate)
    {
        $this->enableBirthdate = $enableBirthdate;
    }

 /**
     * @return the $enableDescription
     */
    public function getEnableDescription()
    {
        return $this->enableDescription;
    }

 /**
     * @param string $enableDescription
     */
    public function setEnableDescription($enableDescription)
    {
        $this->enableDescription = $enableDescription;
    }

 /**
     * @return the $createdBy
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

	/**
     * @param number $createdBy
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;
    }

	/**
     * @return the $updateBy
     */
    public function getUpdateBy()
    {
        return $this->updateBy;
    }

	/**
     * @param number $updateBy
     */
    public function setUpdateBy($updateBy)
    {
        $this->updateBy = $updateBy;
    }

	/**
     * @return the $registerDate
     */
    public function getRegisterDate()
    {
        return $this->registerDate;
    }

	/**
     * @param DateTime $registerDate
     */
    public function setRegisterDate($registerDate)
    {
        $this->registerDate = $registerDate;
    }

	/**
     * @return the $upDate
     */
    public function getUpDate()
    {
        return $this->upDate;
    }

	/**
     * @param DateTime $upDate
     */
    public function setUpDate($upDate)
    {
        $this->upDate = $upDate;
    }
 /**
     * @return the $accounts
     */
    public function getAccounts()
    {
        return $this->accounts;
    }

 /**
     * @param \Contentinum\Entity\Accounts $accounts
     */
    public function setAccounts($accounts)
    {
        $this->accounts = $accounts;
    }
    
}