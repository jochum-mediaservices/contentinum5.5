<?php
namespace Mcwork\Service\Cache;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class DataFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $cache = \Zend\Cache\StorageFactory::factory(array(
            'adapter' => array(
                'name' => 'filesystem',
                'ttl' => 28800,
                'options' => array(
                    'namespace' => 'mcworkdata',
                    'cache_dir' => CON_ROOT_PATH . '/data/cache/mcwork'
                )
            ),
            'plugins' => array(
                
                // Don't throw exceptions on cache errors
                'exception_handler' => array(
                    'throw_exceptions' => true
                ),
                'serializer'
            )
        ));
        return $cache;
    }
}