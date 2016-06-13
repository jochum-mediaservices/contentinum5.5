<?php

namespace Mcwork\Model\Configuration;

use Mcwork\Model\Cache\DeleteCache;
use Zend\Config\Config;
use Zend\Config\Writer\PhpArray;

class Settings extends DeleteCache
{
    /**
     * Path to customer config file
     * @var string
     */
    private $configfile = 'module/Contentinum/config/customer.config.php';

    /**
     *
     * @param array $params
     * @param string $posts
     */
    public function processRequest(array $params = null, $posts = null)
    {
        try {
            if (isset($posts['confkey']) && isset($posts['confval'])) {
                $confkey = $posts['confkey'];
                $config = new Config(include CON_ROOT_PATH . '/' . $this->configfile, true); 
                $config->contentinum_config->{$confkey} = $posts['confval'];
                $write = new PhpArray();
                $write->toFile(CON_ROOT_PATH . '/' . $this->configfile, $config);
                if (isset($posts['cachekey'])){
                    $this->emptyAppCache();
                }               
                return array(
                    'success' => 'success'                  
                );
            } else {
                return array(
                    'error' => 'miss_parameter'
                );
            }
        } catch (\Exception $e) {
            return array(
                'error' => $e->getMessage()
            );
        }
    }
}