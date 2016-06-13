<?php

namespace Contentinum\Entity;

use Doctrine\ORM\Mapping as ORM;
use ContentinumComponents\Entity\AbstractEntity;

/**
 * IndexGroups
 *
 * @ORM\Table(name="account_group_index", indexes={@ORM\Index(name="INDEXACCOUNTIDENT", columns={"account_id"}),@ORM\Index(name="ACCOUNTGROUP", columns={"index_group_id"})})
 * @ORM\Entity
 */
class AccountGroupIndex extends AbstractEntity
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
     * @ORM\Column(name="publish", type="string", length=4, nullable=false)
     */
    private $publish = 'yes';

    /**
     * @var integer
     *
     * @ORM\Column(name="item_rang", type="integer", nullable=false)
     */
    private $itemRang = 0;

    /**
     * @var string
     *
     * @ORM\Column(name="params", type="text", length=65535, nullable=false)
     */
    private $params = '';

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
     * @var \Contentinum\Entity\IndexAccountGroups
     *
     * @ORM\ManyToOne(targetEntity="Contentinum\Entity\AccountGroups")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="index_group_id", referencedColumnName="id")
     * })
     */
    private $indexGroup;    
    
    /**
     * @var \Contentinum\Entity\Accounts
     *
     * @ORM\ManyToOne(targetEntity="Contentinum\Entity\Accounts")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="account_id", referencedColumnName="id")
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
     * @return the $publish
     */
    public function getPublish()
    {
        return $this->publish;
    }

	/**
     * @param string $publish
     */
    public function setPublish($publish)
    {
        $this->publish = $publish;
    }

	/**
     * @return the $itemRang
     */
    public function getItemRang()
    {
        return $this->itemRang;
    }

	/**
     * @param number $itemRang
     */
    public function setItemRang($itemRang)
    {
        $this->itemRang = $itemRang;
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

	/**
     * @return the $indexGroup
     */
    public function getIndexGroup()
    {
        return $this->indexGroup;
    }

	/**
     * @param \Contentinum\Entity\AccountGroups $indexGroup
     */
    public function setIndexGroup($indexGroup)
    {
        $this->indexGroup = $indexGroup;
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