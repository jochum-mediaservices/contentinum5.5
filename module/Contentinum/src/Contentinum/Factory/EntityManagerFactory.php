<?php
namespace Contentinum\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;



class EntityManagerFactory implements FactoryInterface
{
    
    const MC_ENTITYMANAGER = 'doctrine.entitymanager.orm_default';

    /**
     * (non-PHPdoc)
     *
     * @see \Zend\ServiceManager\FactoryInterface::createService()
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return $serviceLocator->get(self::MC_ENTITYMANAGER);
    }
}