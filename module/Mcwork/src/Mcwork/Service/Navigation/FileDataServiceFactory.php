<?php
namespace Mcwork\Service\Navigation;

use Contentinum\Service\ContentinumServiceFactory;
use Zend\Config\Config;

class FileDataServiceFactory extends ContentinumServiceFactory
{

    /**
     * Cache key form rules
     *
     * @var string
     */
    const CONTENTINUM_CFG_FILE = 'mcwork_navigation';

    /**
     * Name cache factory
     *
     * @var string
     */
    const CONTENTINUM_CACHE = 'mcwork_cache_data';

    /**
     * Get result from cache or read from php file
     *
     * @param string $file
     *            path to file and filename
     * @param string $key
     *            template file ident
     * @param ServiceLocatorInterface $sl            
     */
    protected function getFileAsConfig($files, $key, $sl)
    {
        $cache = $sl->get(static::CONTENTINUM_CACHE);
        if (! ($result = $cache->getItem($key))) {
            if (isset($files['Mcwork'])) {
                $navigations = include $files['Mcwork'];
                unset($files['Mcwork']);
                $navigations = array_merge_recursive($navigations, include $files['Mcuser']);
                unset($files['Mcuser']);
                $result = new Config($navigations, true);
            }
            $apps = array();
            foreach ($files as $file) {
                $apps = array_merge_recursive($apps, include $file);
            }
            
            foreach ($result->navigation->default as $entry) {
                if ('Contentinum_Apps' == $entry->label) {
                    $entry->pages = $apps['pages'];
                }
            }
            $cache->setItem($key, $result);
        }
        return $result;
    }
}