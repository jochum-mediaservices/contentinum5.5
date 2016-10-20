<?php
namespace Contentinum\Entity;

use Doctrine\ORM\Mapping as ORM;
use ContentinumComponents\Entity\AbstractEntity;

/**
 * WebMediaBlocks
 *
 * @ORM\Table(name="web_media_categories")
 * @ORM\Entity
 */
class WebMediaCategories extends AbstractEntity
{

    /**
     *
     * @var integer 
     *      @ORM\Column(name="id", type="integer", nullable=false)
     *      @ORM\Id
     *      @ORM\GeneratedValue(strategy="NONE")
     */
    private $id;
    
    /**
     * 
     * @var integer
     * 
     * @ORM\Column(name="parent_media_file", type="integer", nullable=false)
     */
    private $parentMediaFile = '0';

    /**
     *
     * @var integer 
     * 
     * @ORM\Column(name="item_rang", type="integer", nullable=false)
     */
    private $itemRang = '0';
    
    /**
     *
     * @var string
     *
     * @ORM\Column(name="caption", type="text", nullable=true)
     */
    private $caption = '';    

    /**
     *
     * @var string 
     * 
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description = '';
    
    /**
     * @var string
     *
     * @ORM\Column(name="media_link_url", type="string", length=250, nullable=false)
     */
    private $mediaLinkUrl = '';  
    
    /**
     * @var string
     *
     * @ORM\Column(name="target_link", type="string", length=50, nullable=false)
     */
    private $targetLink = '';    

    /**
     *
     * @var string 
     * 
     * @ORM\Column(name="resource", type="string", length=50, nullable=false)
     */
    private $resource = 'index';
    
    /**
     *
     * @var integer
     *
     * @ORM\Column(name="alternate_download", type="integer", nullable=false)
     */
    private $alternateDownload = '0';    
    
    /**
     *
     * @var string
     *
     * @ORM\Column(name="alternate_linktitle", type="string", length=250, nullable=false)
     */
    private $alternateLinktitle = '';    
    
    /**
     *
     * @var string
     *
     * @ORM\Column(name="alternate_labelname", type="string", length=250, nullable=false)
     */
    private $alternateLabelname = '';    

    /**
     *
     * @var integer 
     * 
     * @ORM\Column(name="created_by", type="integer", nullable=false)
     */
    private $createdBy = '0';

    /**
     *
     * @var integer 
     * 
     * @ORM\Column(name="update_by", type="integer", nullable=false)
     */
    private $updateBy = '0';

    /**
     *
     * @var \DateTime 
     * 
     * @ORM\Column(name="register_date", type="datetime", nullable=false)
     */
    private $registerDate = '0000-00-00 00:00:00';

    /**
     *
     * @var \DateTime 
     * 
     * @ORM\Column(name="up_date", type="datetime", nullable=false)
     */
    private $upDate = '0000-00-00 00:00:00';

    /**
     *
     * @var \Contentinum\Entity\WebMedia
     *
     * @ORM\ManyToOne(targetEntity="Contentinum\Entity\WebMedias")
     * @ORM\JoinColumns({
     *  @ORM\JoinColumn(name="web_medias_id", referencedColumnName="id")
     * })
     */
    private $webMediasId;  

    /**
     *
     * @var \Contentinum\Entity\WebMediaGroup
     *      @ORM\ManyToOne(targetEntity="Contentinum\Entity\WebMediaGroup")
     *      @ORM\JoinColumns({
     *      @ORM\JoinColumn(name="web_mediagroup_id", referencedColumnName="id")
     *      })
     */
    private $webMediagroupId;

    /**
     * Construct
     *
     * @param array $options
     */
    public function __construct(array $options = null)
    {
        if (is_array($options)) {
            $this->setOptions($options);
        }
    }

    /**
     * (non-PHPdoc)
     *
     * @see \ContentinumComponents\Entity\AbstractEntity::getEntityName()
     */
    public function getEntityName()
    {
        return get_class($this);
    }

    /**
     * (non-PHPdoc)
     *
     * @see \ContentinumComponents\Entity\AbstractEntity::getPrimaryKey()
     */
    public function getPrimaryKey()
    {
        return 'id';
    }

    /**
     * (non-PHPdoc)
     *
     * @see \ContentinumComponents\Entity\AbstractEntity::getPrimaryValue()
     */
    public function getPrimaryValue()
    {
        return $this->id;
    }

    /**
     * (non-PHPdoc)
     *
     * @see \ContentinumComponents\Entity\AbstractEntity::getProperties()
     */
    public function getProperties()
    {
        return get_object_vars($this);
    }

    /**
     *
     * @param number $id
     *
     * @return WebMediaGroupitems
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
     * @return the $parentMedia
     */
    public function getParentMediaFile()
    {
        return $this->parentMediaFile;
    }

	/**
     * @param number $parentMediaFile
     */
    public function setParentMediaFile($parentMediaFile)
    {
        $this->parentMediaFile = $parentMediaFile;
    }

	/**
     *
     * @return the $itemRang
     */
    public function getItemRang()
    {
        return $this->itemRang;
    }

    /**
     *
     * @param number $itemRang
     * 
     * @return WebMediaGroupitems
     */
    public function setItemRang($itemRang)
    {
        $this->itemRang = $itemRang;
        
        return $this;
    }

    /**
     * @return the $caption
     */
    public function getCaption()
    {
        return $this->caption;
    }

 /**
     * @param string $caption
     */
    public function setCaption($caption)
    {
        $this->caption = $caption;
    }

 /**
     *
     * @return the $description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     *
     * @param string $description
     * 
     * @return WebMediaGroupitems
     */
    public function setDescription($description)
    {
        $this->description = $description;
        
        return $this;
    }

    /**
     * @return the $mediaLinkUrl
     */
    public function getMediaLinkUrl()
    {
        return $this->mediaLinkUrl;
    }

    /**
     * @param string $mediaLinkUrl
     */
    public function setMediaLinkUrl($mediaLinkUrl)
    {
        $this->mediaLinkUrl = $mediaLinkUrl;
    }

    /**
     * @return the $targetLink
     */
    public function getTargetLink()
    {
        return $this->targetLink;
    }

    /**
     * @param string $targetLink
     */
    public function setTargetLink($targetLink)
    {
        $this->targetLink = $targetLink;
    }

    /**
     *
     * @return the $resource
     */
    public function getResource()
    {
        return $this->resource;
    }

    /**
     *
     * @param string $resource
     * 
     * @return WebMediaGroupitems
     */
    public function setResource($resource)
    {
        $this->resource = $resource;
        
        return $this;
    }

    /**
     * @return the $alternateDownload
     */
    public function getAlternateDownload()
    {
        return $this->alternateDownload;
    }

	/**
     * @param number $alternateDownload
     */
    public function setAlternateDownload($alternateDownload)
    {
        $this->alternateDownload = $alternateDownload;
    }

	/**
     * @return the $alternateLinktitle
     */
    public function getAlternateLinktitle()
    {
        return $this->alternateLinktitle;
    }

	/**
     * @param string $alternateLinktitle
     */
    public function setAlternateLinktitle($alternateLinktitle)
    {
        $this->alternateLinktitle = $alternateLinktitle;
    }

	/**
     * @return the $alternateLabelname
     */
    public function getAlternateLabelname()
    {
        return $this->alternateLabelname;
    }

	/**
     * @param string $alternateLabelname
     */
    public function setAlternateLabelname($alternateLabelname)
    {
        $this->alternateLabelname = $alternateLabelname;
    }

	/**
     * Set createdBy
     *
     * @param integer $createdBy
     * @return WebMediaGroupitems
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
     * @return WebMediaGroupitems
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
     * @return WebMediaGroupitems
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
     * @return WebMediaGroupitems
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

    /**
     *
     * @return the $webMediasId
     */
    public function getWebMediasId()
    {
    	return $this->webMediasId;
    }
    
    /**
     *
     * @param \Contentinum\Entity\WebMedias $webMediasId
     * @return WebMediaGroupitems
     */
    public function setWebMediasId($webMediasId)
    {
    	$this->webMediasId = $webMediasId;
    
    	return $this;
    }
	/**
	 * @return the $webMediagroupId
	 */
	public function getWebMediagroupId() 
	{
		return $this->webMediagroupId;
	}

	/**
	 * @param \Contentinum\Entity\WebMediaGroup $webMediagroupId
	 * 
	 * @return WebMediaGroupitems
	 */
	public function setWebMediagroupId($webMediagroupId) 
	{
		$this->webMediagroupId = $webMediagroupId;
		
		return $this;
	}
  
    
    
    
}