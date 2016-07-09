<?php

namespace Contentinum\Entity;

use Doctrine\ORM\Mapping as ORM;
use ContentinumComponents\Entity\AbstractEntity;

/**
 * IndexGroups
 *
 * @ORM\Table(name="account_groups", uniqueConstraints={@ORM\UniqueConstraint(name="scope", columns={"scope"})}, indexes={@ORM\Index(name="FIELDTYPIDENT", columns={"account_id"})})
 * @ORM\Entity
 */
class AccountGroups extends AbstractEntity
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
     * @ORM\Column(name="description", type="text", length=65535, nullable=false)
     */
    private $description = '';

    /**
     * @var string
     *
     * @ORM\Column(name="params", type="text", length=65535, nullable=false)
     */
    private $params = '';
    
    /**
     * @var string
     *
     * @ORM\Column(name="enable_organisation_ext", type="integer", nullable=false)
     */    
    private $enableOrganisationExt = 1;
    
    /**
     * @var string
     *
     * @ORM\Column(name="enable_img_source", type="integer", nullable=false)
     */    
    private $enableImages = 1;
    
    /**
     * @var string
     *
     * @ORM\Column(name="enable_account_fax", type="integer", nullable=false)
     */    
    private $enableAccountFax = 1;
    
    /**
     * @var string
     *
     * @ORM\Column(name="enable_account_phone", type="integer", nullable=false)
     */    
    private $enableAccountPhone = 1;
    
    /**
     * @var string
     *
     * @ORM\Column(name="enable_phone_alternate", type="integer", nullable=false)
     */    
    private $enablePhoneAlternate = 0;
    
    /**
     * @var string
     *
     * @ORM\Column(name="enable_account_email", type="integer", nullable=false)
     */    
    private $enableAccountEmail = 1;
    
    /**
     * @var string
     *
     * @ORM\Column(name="enable_account_street", type="integer", nullable=false)
     */    
    private $enableAccountStreet = 1;
    
    /**
     * @var string
     *
     * @ORM\Column(name="enable_account_addresss", type="integer", nullable=false)
     */    
    private $enableAccountAddresss = 0;
    
    /**
     * @var string
     *
     * @ORM\Column(name="enable_account_city", type="integer", nullable=false)
     */    
    private $enableAccountCity = 1;   
    
    /**
     * @var string
     *
     * @ORM\Column(name="enable_description", type="integer", nullable=false)
     */    
    private $enableDescription = 1;
    
    /**
     * @var string
     *
     * @ORM\Column(name="enable_internet", type="integer", nullable=false)
     */    
    private $enableInternet = 1;

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
     * @return the $description
     */
    public function getDescription()
    {
        return $this->description;
    }

	/**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

	/**
     * @return the $params
     */
    public function getParams()
    {
        return $this->params;
    }

	/**
     * @param string $params
     */
    public function setParams($params)
    {
        $this->params = $params;
    }

	/**
     * @return the $enableOrganisationExt
     */
    public function getEnableOrganisationExt()
    {
        return $this->enableOrganisationExt;
    }

    /**
     * @param string $enableOrganisationExt
     */
    public function setEnableOrganisationExt($enableOrganisationExt)
    {
        $this->enableOrganisationExt = $enableOrganisationExt;
    }

    /**
     * @return the $enableImages
     */
    public function getEnableImages()
    {
        return $this->enableImages;
    }

    /**
     * @param string $enableImages
     */
    public function setEnableImages($enableImages)
    {
        $this->enableImages = $enableImages;
    }

    /**
     * @return the $enableAccountFax
     */
    public function getEnableAccountFax()
    {
        return $this->enableAccountFax;
    }

    /**
     * @param string $enableAccountFax
     */
    public function setEnableAccountFax($enableAccountFax)
    {
        $this->enableAccountFax = $enableAccountFax;
    }

    /**
     * @return the $enableAccountPhone
     */
    public function getEnableAccountPhone()
    {
        return $this->enableAccountPhone;
    }

    /**
     * @param string $enableAccountPhone
     */
    public function setEnableAccountPhone($enableAccountPhone)
    {
        $this->enableAccountPhone = $enableAccountPhone;
    }

    /**
     * @return the $enablePhoneAlternate
     */
    public function getEnablePhoneAlternate()
    {
        return $this->enablePhoneAlternate;
    }

    /**
     * @param string $enablePhoneAlternate
     */
    public function setEnablePhoneAlternate($enablePhoneAlternate)
    {
        $this->enablePhoneAlternate = $enablePhoneAlternate;
    }

    /**
     * @return the $enableAccountEmail
     */
    public function getEnableAccountEmail()
    {
        return $this->enableAccountEmail;
    }

    /**
     * @param string $enableAccountEmail
     */
    public function setEnableAccountEmail($enableAccountEmail)
    {
        $this->enableAccountEmail = $enableAccountEmail;
    }

    /**
     * @return the $enableAccountStreet
     */
    public function getEnableAccountStreet()
    {
        return $this->enableAccountStreet;
    }

    /**
     * @param string $enableAccountStreet
     */
    public function setEnableAccountStreet($enableAccountStreet)
    {
        $this->enableAccountStreet = $enableAccountStreet;
    }

    /**
     * @return the $enableAccountAddresss
     */
    public function getEnableAccountAddresss()
    {
        return $this->enableAccountAddresss;
    }

    /**
     * @param string $enableAccountAddresss
     */
    public function setEnableAccountAddresss($enableAccountAddresss)
    {
        $this->enableAccountAddresss = $enableAccountAddresss;
    }

    /**
     * @return the $enableAccountCity
     */
    public function getEnableAccountCity()
    {
        return $this->enableAccountCity;
    }

    /**
     * @param string $enableAccountCity
     */
    public function setEnableAccountCity($enableAccountCity)
    {
        $this->enableAccountCity = $enableAccountCity;
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
}