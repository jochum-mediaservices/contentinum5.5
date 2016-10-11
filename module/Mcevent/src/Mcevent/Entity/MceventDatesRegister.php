<?php

namespace Mcevent\Entity;

use Doctrine\ORM\Mapping as ORM;
use ContentinumComponents\Entity\AbstractEntity;

/**
 * MceventDatesRegister
 *
 * @ORM\Table(name="mcevent_dates_register")
 * @ORM\Entity
 */
class MceventDatesRegister extends AbstractEntity
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
     * @var integer
     *
     * @ORM\Column(name="register_ident", type="string", length=40, nullable=false)
     */
    private $registerIdent;    
    
    /**
     * @var integer
     *
     * @ORM\Column(name="organizer_id", type="integer", nullable=false)
     */    
    private $organizerIdent = 0;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="mcevent_id", type="integer", nullable=false)
     */    
    private $mceventIdent;   
    
    /**
     * @var string
     *
     * @ORM\Column(name="company", type="string", length=250, nullable=false)
     */
    private $company = '';     

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=5, nullable=false)
     */
    private $title = '';
    
    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=80, nullable=false)
     */
    private $surname = '';   
    
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=250, nullable=false)
     */
    private $name = '';   
    
    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string", length=250, nullable=false)
     */    
    private $street = '';
    
    /**
     * @var string
     *
     * @ORM\Column(name="number", type="string", length=10, nullable=false)
     */
    private $number = '';
    
    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=80, nullable=false)
     */
    private $city = '';    
    
    /**
     * @var string
     *
     * @ORM\Column(name="zipcode", type="string", length=10, nullable=false)
     */    
    private $zipcode = '';
    
    /**
     * @var string
     *
     * @ORM\Column(name="post_street", type="string", length=150, nullable=false)
     */
    private $poststreet = ''; 
    
    /**
     * @var string
     *
     * @ORM\Column(name="post_street_num", type="string", length=10, nullable=false)
     */
    private $postnumber = ''; 
    
    /**
     * @var string
     *
     * @ORM\Column(name="post_city", type="string", length=150, nullable=false)
     */
    private $postcity = ''; 
    
    /**
     * @var string
     *
     * @ORM\Column(name="post_zipcode", type="string", length=10, nullable=false)
     */
    private $postzipcode = '';     
    
    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=25, nullable=false)
     */
    private $phone = '';
    
    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=80, nullable=false)
     */
    private $email = '';    
    
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, nullable=false)
     */
    private $description = '';  
    
    /**
     * @var string
     *
     * @ORM\Column(name="merkblatt", type="string", length=250, nullable=false)
     */
    private $merkblatt = '';  
    
    /**
     * @var integer
     *
     * @ORM\Column(name="num_groupmember", type="integer", nullable=false)
     */    
    private $numGroupmember = 0;
    
    /**
     * @var string
     *
     * @ORM\Column(name="stay_breakfast", type="string", length=10, nullable=false)
     */
    private $stayBreakfast = 'no';
    
    /**
     * @var string
     *
     * @ORM\Column(name="stay_lunch", type="string", length=10, nullable=false)
     */    
    private $stayLunch = 'no';
    
    /**
     * @var string
     *
     * @ORM\Column(name="stay_dinner", type="string", length=10, nullable=false)
     */    
    private $stayDinner = 'no';
    
    /**
     * @var string
     *
     * @ORM\Column(name="stay_overnight", type="string", length=10, nullable=false)
     */    
    private $stayOvernight = 'no';
    
    /**
     * @var string
     *
     * @ORM\Column(name="params", type="string", length=250, nullable=false)
     */
    private $params = '';    
    
    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10, nullable=false)
     */
    private $status = 'new';    

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
     * @return the $registerIdent
     */
    public function getRegisterIdent()
    {
        return $this->registerIdent;
    }

    /**
     * @param number $registerIdent
     */
    public function setRegisterIdent($registerIdent)
    {
        $this->registerIdent = $registerIdent;
    }

    /**
     * @return the $organizerIdent
     */
    public function getOrganizerIdent()
    {
        return $this->organizerIdent;
    }

    /**
     * @param number $organizerIdent
     */
    public function setOrganizerIdent($organizerIdent)
    {
        $this->organizerIdent = $organizerIdent;
    }

    /**
     * @return the $mceventIdent
     */
    public function getMceventIdent()
    {
        return $this->mceventIdent;
    }

    /**
     * @param number $mceventIdent
     */
    public function setMceventIdent($mceventIdent)
    {
        $this->mceventIdent = $mceventIdent;
    }

    /**
     * @return the $company
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param string $company
     */
    public function setCompany($company)
    {
        $this->company = $company;
    }

    /**
     * @return the $title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return the $surname
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param string $surname
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;
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
     * @return the $street
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param string $street
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }

    /**
     * @return the $number
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param string $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * @return the $city
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return the $zipcode
     */
    public function getZipcode()
    {
        return $this->zipcode;
    }

    /**
     * @param string $zipcode
     */
    public function setZipcode($zipcode)
    {
        $this->zipcode = $zipcode;
    }

    /**
     * @return the $poststreet
     */
    public function getPoststreet()
    {
        return $this->poststreet;
    }

    /**
     * @param string $poststreet
     */
    public function setPoststreet($poststreet)
    {
        $this->poststreet = $poststreet;
    }

    /**
     * @return the $postnumber
     */
    public function getPostnumber()
    {
        return $this->postnumber;
    }

    /**
     * @param string $postnumber
     */
    public function setPostnumber($postnumber)
    {
        $this->postnumber = $postnumber;
    }

    /**
     * @return the $postcity
     */
    public function getPostcity()
    {
        return $this->postcity;
    }

    /**
     * @param string $postcity
     */
    public function setPostcity($postcity)
    {
        $this->postcity = $postcity;
    }

    /**
     * @return the $postzipcode
     */
    public function getPostzipcode()
    {
        return $this->postzipcode;
    }

    /**
     * @param string $postzipcode
     */
    public function setPostzipcode($postzipcode)
    {
        $this->postzipcode = $postzipcode;
    }

    /**
     * @return the $phone
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
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
     * @return the $merkblatt
     */
    public function getMerkblatt()
    {
        return $this->merkblatt;
    }

    /**
     * @param string $merkblatt
     */
    public function setMerkblatt($merkblatt)
    {
        $this->merkblatt = $merkblatt;
    }

    /**
     * @return the $numGroupmember
     */
    public function getNumGroupmember()
    {
        return $this->numGroupmember;
    }

    /**
     * @param number $numGroupmember
     */
    public function setNumGroupmember($numGroupmember)
    {
        $this->numGroupmember = $numGroupmember;
    }

    /**
     * @return the $stayBreakfast
     */
    public function getStayBreakfast()
    {
        return $this->stayBreakfast;
    }

    /**
     * @param string $stayBreakfast
     */
    public function setStayBreakfast($stayBreakfast)
    {
        $this->stayBreakfast = $stayBreakfast;
    }

    /**
     * @return the $stayLunch
     */
    public function getStayLunch()
    {
        return $this->stayLunch;
    }

    /**
     * @param string $stayLunch
     */
    public function setStayLunch($stayLunch)
    {
        $this->stayLunch = $stayLunch;
    }

    /**
     * @return the $stayDinner
     */
    public function getStayDinner()
    {
        return $this->stayDinner;
    }

    /**
     * @param string $stayDinner
     */
    public function setStayDinner($stayDinner)
    {
        $this->stayDinner = $stayDinner;
    }

    /**
     * @return the $stayOvernight
     */
    public function getStayOvernight()
    {
        return $this->stayOvernight;
    }

    /**
     * @param string $stayOvernight
     */
    public function setStayOvernight($stayOvernight)
    {
        $this->stayOvernight = $stayOvernight;
    }

    /**
     * @return the $status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
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