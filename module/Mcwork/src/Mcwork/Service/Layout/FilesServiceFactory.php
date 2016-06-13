<?php
namespace Mcwork\Service\Layout;

use Contentinum\Service\ContentinumServiceFactory;
use ContentinumComponents\File\Name;

class FilesServiceFactory extends ContentinumServiceFactory
{

    /**
     * Cache key form rules
     *
     * @var string
     */
    const CONTENTINUM_CFG_FILE = 'layout_files';

    /**
     * Name cache factory
     *
     * @var string
     */
    const CONTENTINUM_CACHE = 'mcwork_cache_data';

    /**
     * Get result from cache or read from php file
     *
     * @param string $file path to file and filename
     * @param string $key template file ident
     * @param ServiceLocatorInterface $sl
     */
    protected function getFileAsConfig($dir, $key, $sl)
    {
        $result = array();
        foreach (scandir($dir) as $file) {
            if ('.' != $file && '..' != $file) {
                $file = Name::get($file);
                $result['app/templates/' . $file] = ucfirst($file);
            }
        }
        return $result;
    }
}