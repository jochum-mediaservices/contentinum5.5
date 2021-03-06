<?php
namespace Contentinum\Service\Cache;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class StrutureContentFactory implements FactoryInterface
{

    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $cache = \Zend\Cache\StorageFactory::factory(array(
            'adapter' => array(
                'name' => 'filesystem',
                'ttl' => 14400,
                'options' => array(
                    'namespace' => 'structure',
                    'cache_dir' => CON_ROOT_PATH . '/data/cache/frontend'
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