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
namespace Guestbook\Entity;

use Doctrine\ORM\Mapping as ORM;
use ContentinumComponents\Entity\AbstractEntity;

/**
 * Guestbook
 *
 * @ORM\Table(name="web_guestbook")
 * @ORM\Entity
 */
class Guestbook extends AbstractEntity
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
     * @ORM\Column(name="author_remote_ip", type="string", length=50, nullable=false)
     */    
    private $authorRemoteIp = ''; 
    
    /**
     * @var string
     *
     * @ORM\Column(name="author_agent", type="string", length=500, nullable=false)
     */   
    private $authorAgent = ''; 
    
    /**
     * @var string
     *
     * @ORM\Column(name="author_host", type="string", length=250, nullable=false)
     */    
    private $authorHost = ''; 
    
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=250, nullable=false)
     */    
    private $name; 
    
    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=50, nullable=false)
     */    
    private $phone = ''; 
    
    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=250, nullable=false)
     */    
    private $email = ''; 
    
    /**
     * @var string
     *
     * @ORM\Column(name="homepage", type="string", length=250, nullable=false)
     */    
    private $homepage = '';
    
    /**
     * @var string
     *
     * @ORM\Column(name="com", type="text", length=65535, nullable=false)
     */   
    private $com;
    
    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text", length=65535, nullable=false)
     */    
    private $comment = ''; 
    
    /**
     * @var string
     *
     * @ORM\Column(name="comment_name", type="string", length=200, nullable=false)
     */    
    private $commentName = ''; 
    
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="comment_date", type="string" , nullable=false)
     */   
    private $commentDate = '0000-00-00 00:00:00'; 
    
    /**
     * @var string
     *
     * @ORM\Column(name="approved", type="string", length=12, nullable=false)
     */    
    private $approved = 'spam'; 
  
    /**
     * @var integer
     *
     * @ORM\Column(name="checkout", type="integer", nullable=false)
     */    
    private $checkout = 0;    

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
     * @return the $authorRemoteIp
     */
    public function getAuthorRemoteIp()
    {
        return $this->authorRemoteIp;
    }

    /**
     * @param string $authorRemoteIp
     */
    public function setAuthorRemoteIp($authorRemoteIp)
    {
        $this->authorRemoteIp = $authorRemoteIp;
    }

    /**
     * @return the $authorAgent
     */
    public function getAuthorAgent()
    {
        return $this->authorAgent;
    }

    /**
     * @param string $authorAgent
     */
    public function setAuthorAgent($authorAgent)
    {
        $this->authorAgent = $authorAgent;
    }

    /**
     * @return the $authorHost
     */
    public function getAuthorHost()
    {
        return $this->authorHost;
    }

    /**
     * @param string $authorHost
     */
    public function setAuthorHost($authorHost)
    {
        $this->authorHost = $authorHost;
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
     * @return the $homepage
     */
    public function getHomepage()
    {
        return $this->homepage;
    }

    /**
     * @param string $homepage
     */
    public function setHomepage($homepage)
    {
        $this->homepage = $homepage;
    }

    /**
     * @return the $com
     */
    public function getCom()
    {
        return $this->com;
    }

    /**
     * @param string $com
     */
    public function setCom($com)
    {
        $this->com = $com;
    }

    /**
     * @return the $comment
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;
    }

    /**
     * @return the $commentName
     */
    public function getCommentName()
    {
        return $this->commentName;
    }

    /**
     * @param string $commentName
     */
    public function setCommentName($commentName)
    {
        $this->commentName = $commentName;
    }

    /**
     * @return the $commentDate
     */
    public function getCommentDate()
    {
        return $this->commentDate;
    }

    /**
     * @param DateTime $commentDate
     */
    public function setCommentDate($commentDate)
    {
        $this->commentDate = $commentDate;
    }

    /**
     * @return the $approved
     */
    public function getApproved()
    {
        return $this->approved;
    }

    /**
     * @param string $approved
     */
    public function setApproved($approved)
    {
        $this->approved = $approved;
    }

    /**
     * @return the $checkout
     */
    public function getCheckout()
    {
        return $this->checkout;
    }

    /**
     * @param number $checkout
     */
    public function setCheckout($checkout)
    {
        $this->checkout = $checkout;
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