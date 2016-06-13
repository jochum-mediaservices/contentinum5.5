<?php
namespace Contentinum\Pages;

use Zend\Config\Config;

class PageConfiguration
{
    /**
     * Name cache factory
     *
     * @var string
     */
    const CONTENTINUM_CACHE = 'contentinum_cache_struture';    

    /**
     * Cache name
     * 
     * @var string
     */
    private $cacheKey = null;

    /**
     * Service Manager
     *
     * @var use Zend\ServiceManager\ServiceLocatorInterface;
     */
    protected $sl;

    /**
     *
     * @return the $cache
     */
    public function getCacheKey()
    {
        return $this->cacheKey;
    }

    /**
     *
     * @param string $cache            
     */
    public function setCacheKey($key)
    {
        $this->cacheKey = $key;
    }

    /**
     *
     * @return the $sl
     */
    public function getSl()
    {
        return $this->sl;
    }

    /**
     *
     * @param use $sl            
     */
    public function setSl($sl)
    {
        $this->sl = $sl;
    }
    
    public function __construct($sl, $key = null)
    {
        $this->setSl($sl);
        $this->setCacheKey($key);
    }

    public function get($file)
    {
        $cache = $this->getSl()->get(static::CONTENTINUM_CACHE);
        if (! ($result = $cache->getItem($this->getCacheKey()))) {
            $result = new Config(include $file);
            $cache->setItem($this->getCacheKey(), $result);
        }
        return $result;
    }
}