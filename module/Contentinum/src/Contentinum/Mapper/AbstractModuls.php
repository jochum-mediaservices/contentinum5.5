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
 * @category contentinum
 * @package Mapper
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 * @copyright Copyright (c) 2009-2013 jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 * @license http://www.opensource.org/licenses/bsd-license
 * @since contentinum version 5.0
 * @link      https://github.com/Mikel1961/contentinum-components
 * @version   1.0.0
 */
namespace Contentinum\Mapper;

use ContentinumComponents\Mapper\Worker;

/**
 * Abstract moduls mapper
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
abstract class AbstractModuls extends Worker
{
    const PUBLIC_CACHE = 'contentinum_cache_public';
    
    /**
     * Current url
     * @var string
     */
    protected $url;
    
    /**
     * Current url article parameter
     * @var string
     */
    protected $article;
    
    /**
     * Current url category parameter
     * @var string
     */
    protected $category;
    
    /**
     * Url parameter tag
     * @var string
     */
    protected $tag;
    
    /**
     * Url parameter tagvalue
     * @var string
     */
    protected $tagvalue;   

    /**
     * User identity
     * @var unknown
     */
    protected $identity;

    /**
     * Users acl list
     * @var unknown
     */
    protected $acl;
    
    /**
     * Default role
     * @var unknown
     */
    protected $defaultRole;
        
    /**
     * Configuration datas
     * @var array
     */
    protected $configure = array();
    
    /**
     * Query parameter an values
     *
     * @var array
     */
    protected $params;
    
    /**
     * Name configuration
     * @var string
    */
    protected $key;
    
    /**
     *
     * @var boolen
     */
    protected $xmlHttpRequest;
    
    /**
     * 
     * @var string
     */
    protected $pluginRequest;
    
    /**
     * @return the $url
     */
    public function getUrl()
    {
        return $this->url;
    }

	/**
     * @param field_type $url
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }

	/**
     * @return the $article
     */
    public function getArticle()
    {
        return $this->article;
    }

	/**
     * @param field_type $article
     */
    public function setArticle($article)
    {
        $this->article = $article;
    }

	/**
     * @return the $category
     */
    public function getCategory()
    {
        return $this->category;
    }

	/**
     * @param field_type $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }
    
    /**
     * @return the $tag
     */
    public function getTag()
    {
        return $this->tag;
    }

	/**
     * @param string $tag
     */
    public function setTag($tag)
    {
        $this->tag = $tag;
    }

	/**
     * @return the $tagvalue
     */
    public function getTagValue()
    {
        return $this->tagvalue;
    }

	/**
     * @param string $tagvalue
     */
    public function setTagValue($tagvalue)
    {
        $this->tagvalue = $tagvalue;
    }

	/**
     * @return the $identity
     */
    public function getIdentity()
    {
        return $this->identity;
    }

	/**
     * @param Ambigous <object, \Contentinum\Mapper\unknown> $identity
     */
    public function setIdentity($identity)
    {
        $this->identity = $identity;
    }

	/**
     * @return the $acl
     */
    public function getAcl()
    {
        return $this->acl;
    }

	/**
     * @param \Contentinum\Mapper\unknown $acl
     */
    public function setAcl($acl)
    {
        $this->acl = $acl;
    }

	/**
     * @return the $defaultRole
     */
    public function getDefaultRole()
    {
        return $this->defaultRole;
    }

	/**
     * @param \Contentinum\Mapper\unknown $defaultRole
     */
    public function setDefaultRole($defaultRole)
    {
        $this->defaultRole = $defaultRole;
    }

	/**
     * @return the $configure
     */
    public function getConfigure()
    {
        return $this->configure;
    }
    
    /**
     * @param multitype: $configure
     * @return \Contentinum\Mapper\Navigation
     */
    public function setConfigure($configure)
    {
        $this->configure = $configure;
        return $this;
    }
    
    /**
     * @return the $params
     */
    public function getParams()
    {
        return $this->params;
    }
    
    /**
     * 
     * @param string $key
     */
    public function getParameter($key)
    {
        if (isset($this->params[$key])){
            return $this->params[$key];
        } else {
            return false;
        }
    }

    /**
     * @param array $params
     */
    public function setParams($params)
    {
        $this->params = $params;
    }
    
    /**
     *
     * @param string $key
     */
    public function setParameter($key, $value)
    {
        $this->params[$key] = $value;
    }    

    /**
     * @return the $key
     */
    public function getKey()
    {
        return $this->key;
    }
    
    /**
     *
     * @param string $key
     * @return \Contentinum\Mapper\Navigation
     */
    public function setKey($key)
    {
        $this->key = $key;
        return $this;
    }    

    /**
     * @return the $xmlHttpRequest
     */
    public function getXmlHttpRequest()
    {
        return $this->xmlHttpRequest;
    }

    /**
     * @param boolen $xmlHttpRequest
     */
    public function setXmlHttpRequest($xmlHttpRequest)
    {
        $this->xmlHttpRequest = $xmlHttpRequest;
    }

    /**
     * @return the $pluginRequest
     */
    public function getPluginRequest()
    {
        return $this->pluginRequest;
    }

    /**
     * @param string $pluginRequest
     */
    public function setPluginRequest($pluginRequest)
    {
        $this->pluginRequest = $pluginRequest;
    }

    /**
     * Fetch database query content
     * @param array $params query parameter
     */
	abstract public function fetchContent(array $params = null);
}