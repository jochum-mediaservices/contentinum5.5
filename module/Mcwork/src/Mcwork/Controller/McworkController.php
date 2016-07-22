<?php
namespace Mcwork\Controller;

use Contentinum\Controller\AbstractApplicationController;
use Zend\View\Model\ViewModel;

class McworkController extends AbstractApplicationController
{

    public function application($pageOptions, $role = null, $acl = null)
    {
        $this->backendlayout($pageOptions, $this->getIdentity(), $role, $acl, $this->layout(), $this->getServiceLocator());
        
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
        $this->processlayout($pageOptions, $this->getIdentity(), $role, $acl, $this->layout(), $this->getServiceLocator());
        
        if (method_exists($this->worker, 'setIdentity')) {
            $this->worker->setIdentity($this->getIdentity());
        }
        return $this->buildView(array(
            'acl' => $acl,
            'role' => $role,
            'resource' => $this->getServiceLocator()
                ->get('mcwork_acl_resource'),
            'current' => $pageOptions->getActive(),
            'services' => $this->iniServices($pageOptions),
            'identity' => $this->getIdentity(),
            'usergroups' => $this->getServiceLocator()->get('contentinum_acl_usrgrp'),
            'entries' => $this->worker->processRequest($pageOptions->getParams(), $this->params()->fromPost()),
            'paramter' => $pageOptions->getParams(),
            'appparameter' => $pageOptions->getApp('appparameter'),
            'xmlHttpRequest' => $this->getXmlHttpRequest()
        ), $pageOptions);
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
        
        $msg = false;
        $msgType = false;
        
        if (true === $this->flashMessenger()->setNamespace('mcwork')->hasCurrentErrorMessages()) {
            $msg = $this->flashMessenger()->setNamespace('mcwork')->getErrorMessages();
            $msgType = 'error';
        } elseif (true === $this->flashMessenger()->setNamespace('mcwork')->hasCurrentSuccessMessages()) {
            $msg = $this->flashMessenger()->setNamespace('mcwork')->getSuccessMessages();
            $msgType = 'success';
        } elseif (true === $this->flashMessenger()->setNamespace('mcwork')->hasCurrentWarningMessages()) {
            $msg = $this->flashMessenger()->setNamespace('mcwork')->getWarningMessages();
            $msgType = 'warning';
        }
        $view->setVariable('messages', $msg);
        $view->setVariable('msgtype', $msgType);
        
        if (1 === $pageOptions->getToolbar()) {
            $view->setVariable('toolbarcontent', $this->getServiceLocator()
                ->get('mcwork_toolbar'));
        }
        if (1 === $pageOptions->getTableedit()) {
            $view->setVariable('tableeditcontent', $this->getServiceLocator()
                ->get('mcwork_tableedit'));
        }
        
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