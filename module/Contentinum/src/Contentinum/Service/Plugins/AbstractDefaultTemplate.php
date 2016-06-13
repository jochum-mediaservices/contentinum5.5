<?php
namespace Contentinum\Service\Plugins;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

abstract class AbstractDefaultTemplate implements FactoryInterface
{

    const PLUGIN_KEY = '0';

    /**
     * (non-PHPdoc)
     * 
     * @see \Zend\ServiceManager\FactoryInterface::createService()
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $plugins = $serviceLocator->get('contentinum_template_plugins');
        $options = array();
        if ('0' !== static::PLUGIN_KEY) {
            foreach ($plugins->plugins as $key => $row) {
                if (isset($row['name']) && isset($row['key']) && static::PLUGIN_KEY === $row['key']) {
                    $options[$key] = $row['name'];
                }
            }
            if (! empty($options)) {
                ksort($options);
            }
        }
        return $options;
    }
}