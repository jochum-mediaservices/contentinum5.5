<?php

namespace Contentinum\Service\Pages;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;



class ConfigurationFilesFactory implements FactoryInterface
{
    /**
     * Contentinum logger configuration key
     *
     * @var string
     */
    const CONTENTINUM_CONFIG = 'etc_cfg_pages';
    
    /**
     * Get contentinum configuration parameters
     *
     * @see \Zend\ServiceManager\FactoryInterface::createService()
     * @return array
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Config');
        return $config['contentinum_config']['etc_cfg_pages'];
    }    
}