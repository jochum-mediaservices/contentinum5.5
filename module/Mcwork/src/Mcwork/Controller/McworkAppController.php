<?php
namespace Mcwork\Controller;

use Contentinum\Controller\AbstractApplicationController;
use Zend\View\Model\ViewModel;

class McworkAppController extends AbstractApplicationController
{

    public function application($pageOptions, $role = null, $acl = null)
    {
        if (method_exists($this->worker, 'setIdentity')) {
            $this->worker->setIdentity($this->getIdentity());
        }        
        
        return $this->buildView(array(
            'acl' => $acl,
            'role' => $role,
            'protocol' => $pageOptions->getProtocol(),
            'url' => $pageOptions->getUrl(),
            'host' => $pageOptions->getHost(),            
            'resource' => $this->getServiceLocator()
                ->get('mcwork_acl_resource'),
            'current' => $pageOptions->getActive(),
            'services' => $this->iniServices($pageOptions),
            'identity' => $this->getIdentity(),
            'usergroups' => $this->getServiceLocator()->get('contentinum_acl_usrgrp'),
            'entries' => $this->worker->fetchContent($pageOptions->getParams()),
            'content' => $pageOptions->getPageContent(),
            'paramter' => $pageOptions->getParams(),
            'appparameter' => $pageOptions->getApp('appparameter'),
            'xmlHttpRequest' => $this->getXmlHttpRequest()
        ), $pageOptions);
    }

    /**
     * (non-PHPdoc)
     *
     * @see \Contentinum\Controller\AbstractApplicationController::process()
     */
    protected function process($pageOptions, $role = null, $acl = null)
    {
        return $this->application($pageOptions, $role, $acl);
    }

    /**
     * Prepare view renderer
     *
     * @param array $variables
     * @param \Contentinum\Options\PageOptions $pageOptions
     * @return \Zend\View\Model\ViewModel
     */
    public function buildView($variables, $pageOptions)
    {
        $view = new ViewModel($variables);
                
        if (null !== $pageOptions->getTemplate()) {
            $view->setTemplate($pageOptions->getTemplate());
        }
        return $view;
    }

    /**
     *
     * @param unknown $pageOptions
     */
    protected function iniServices($pageOptions)
    {
        $services = array();
        
        if (false !== ($getServices = $pageOptions->getApp('services'))) {
            foreach ($getServices as $key => $service) {
                $services[$key] = $this->getServiceLocator()->get($service);
            }
        }
        
        return $services;
    }
}