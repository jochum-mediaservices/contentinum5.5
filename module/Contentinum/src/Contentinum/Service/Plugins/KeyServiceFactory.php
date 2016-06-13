<?php
namespace Contentinum\Service\Plugins;

use Contentinum\Service\ContentinumServiceFactory;
use Zend\Config\Config;

class KeyServiceFactory extends ContentinumServiceFactory
{

    /**
     * Cache key form rules
     *
     * @var string
     */
    const CONTENTINUM_CFG_FILE = 'app_plugins';

    /**
     * Name cache factory
     *
     * @var string
     */
    const CONTENTINUM_CACHE =  'contentinum_cache_struture'; 

    /**
     * Get result from cache or read from php file
     *
     * @param string $file path to file and filename
     * @param string $key template file ident
     * @param ServiceLocatorInterface $sl            
     */
    protected function getFileAsConfig($files, $key, $sl)
    {
        $cache = $sl->get(static::CONTENTINUM_CACHE);
        if (! ($result = $cache->getItem('key_plugins'))) {
            $plugins = array();
            foreach ($files as $file){
                if (empty($plugins)){
                    $plugins = include $file;
                } else {
                    $plugins = array_merge_recursive($plugins, include $file);
                }
            }

            
            //print '<pre>';
            //var_dump($result);
            //exit;      
            $result = new Config($plugins['key_plugins']);
            $cache->setItem('key_plugins', $result);
        }
        return $result;
    }
}