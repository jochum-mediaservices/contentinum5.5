<?php
namespace Mcwork\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;

/**
 * Set layout configuration
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class Process extends AbstractPlugin
{

    public function __invoke($pageOptions, $identity, $role, $acl, $layout, $sl)
    {
        $viewHelperManager = $sl->get('viewHelperManager');
        
        $this->setAppLocale($pageOptions, $viewHelperManager);
    }

    /**
     *
     * @param \Contentinum\Options\PageOptions $pageOptions
     * @param Zend\View\HelperPluginManager $viewHelperManager
     */
    protected function setAppLocale($pageOptions, $viewHelperManager)
    {
        $dateFormat = $viewHelperManager->get('dateFormat');
        $dateFormat->setTimezone($pageOptions->getTimeZone())
            ->setLocale($pageOptions->getLocale());
    }
}