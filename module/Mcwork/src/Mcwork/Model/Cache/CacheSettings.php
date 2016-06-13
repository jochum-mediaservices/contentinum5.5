<?php

namespace Mcwork\Model\Cache;

use Mcwork\Model\Cache\DeleteCache;
use Zend\Config\Config;
use Zend\Config\Writer\PhpArray;

class CacheSettings extends DeleteCache
{

    private $configfile = 'module/Contentinum/config/customer.config.php';

    /**
     *
     * @param array $params
     * @param string $posts
     */
    public function processRequest(array $params = null, $posts = null)
    {
        try {
            if (isset($posts['cachekey']) && isset($posts['status'])) {
                $cachekey = $posts['cachekey'];
                $config = new Config(include CON_ROOT_PATH . '/' . $this->configfile, true); 
                if ('contentinum_navigation_cache' === $cachekey) {
                    if ('off' === $posts['status']) {
                        $config->contentinum_config->contentinum_navigation_cache = true;
                    } else {
                        $config->contentinum_config->contentinum_navigation_cache = false;
                    }
                    $trees = $this->fetchAll("SELECT id FROM web_navigations WHERE (menue = 'std' OR menue = 'helper');");
                    $cache = $this->getSl()->get(static::CONTENTINUM_CACHE);
                    foreach ($trees as $tree){
                        if ($cache->hasItem('navigation' . $tree['id'])) {
                            $cache->removeItem('navigation' . $tree['id']);
                        }
                    }
                } else {
                    if ('off' === $posts['status']) {
                        $config->contentinum_config->db_cache_keys->{$cachekey}->savecache = true;
                    } else {
                        $config->contentinum_config->db_cache_keys->{$cachekey}->savecache = false;
                    }  
                    $this->emptyCache($cachekey);                  
                }
                $write = new PhpArray();
                $write->toFile(CON_ROOT_PATH . '/' . $this->configfile, $config);
                
                return array(
                    'success' => 'success'
                );
            } else {
                return array(
                    'error' => 'miss parameter'
                );
            }
        } catch (\Exception $e) {
            return array(
                'error' => $e->getMessage()
            );
        }
    }
}