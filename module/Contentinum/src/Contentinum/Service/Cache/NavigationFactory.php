<?php
namespace Contentinum\Service\Cache;

use Zend\ServiceManager\FactoryInterface;

class NavigationFactory implements FactoryInterface
{

    /**
     * (non-PHPdoc)
     * @see \Zend\ServiceManager\FactoryInterface::createService()
     */
    public function createService(\Zend\ServiceManager\ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('contentinum_configure');
        return $config['contentinum_navigation_cache'];
    }
}