<?php
namespace Contentinum\Controller;

use Zend\View\Model\ViewModel;

class ApplicationController extends AbstractApplicationController
{

    /**
     * (non-PHPdoc)
     * 
     * @see \Contentinum\Controller\AbstractApplicationController::application()
     */
    public function application($pageOptions, $role = null, $acl = null)
    {
        
        $this->frontendlayout($pageOptions, $role, $acl, $this->layout(), $this->getServiceLocator()
            ->get('viewHelperManager'));
        
        $cookies = $this->getRequest()->getHeaders()->get('Cookie');
        if (isset($cookies['PHPSESSID'])){
            unset($cookies['PHPSESSID']);
        }    

        if (method_exists($this->worker, 'setIdentity')) {
            $this->worker->setIdentity($this->getIdentity());
        }        

        return $this->buildView(array(
            'entries' => $this->worker->fetchContent($pageOptions->getParams()),
            'widgets' => $this->getServiceLocator()->get('contentinum_content_widgets'),
            'groupstyles' => $this->getServiceLocator()->get('contentinum_group_styles' ),
            'contentstyles' => $this->getServiceLocator()->get('contentinum_content_styles'),
            'pluginstyles' => $this->getServiceLocator()->get('contentinum_template_plugins'),
            'plugins' => $this->iniPlugins($pageOptions,$role,$acl),
            'identity' => $this->getIdentity(),
            'role' => $role,
            'acl' => $acl,      
            'cookies' => $cookies,
            'protocol' => $pageOptions->getProtocol(),
            'url' => $pageOptions->getUrl(),
            'host' => $pageOptions->getHost(),
            'paramter' => $pageOptions->getParams(),
            'xmlHttpRequest' => $this->getXmlHttpRequest(),            
            'pluginViewHelper' => $this->getServiceLocator()->get('contentinum_plugin_views')
        ), $pageOptions->getTemplate());
    }

    /**
     * (non-PHPdoc)
     * 
     * @see \Contentinum\Controller\AbstractApplicationController::process()
     */
    protected function process($pageOptions, $role = null, $acl = null)
    {
        $datas = $this->getRequest()->getPost();
        
        
        $formIdent = $datas['formident'];
        $formFactory = $this->getServiceLocator()->get('contentinum_forms');
        $formFactory->setConfigure(array('modulParams' => $formIdent));
        unset($datas['formident']);
        $result = $formFactory->fetchContent();
        $form = $result['form'];
        $form->setInputFilter($form->getInputFilter());
        $form->setData($datas);
        if ($form->isValid()) {
            $response = array();
            $configuration = $this->getServiceLocator()->get('contentinum_customer');
            $process = $this->getServiceLocator()->get('contentinum_form_process');
            /**
             * @var \Contentinum\Model\Sendmail $mail
            */
            $mail = $this->getServiceLocator()->get('contentinum_sendmail');
            $mail->setFormConfigure($process->find($formIdent));
            $mail->setFormFields($formFactory->getFormFields());
            $mail->setFormDatas($form->getData());
            $mail->setConfigure($configuration->default->support_mail);
            $mail->send();
            $response['success'] = $result['responsetext'];
        } else {
            $response['error'] = array('fields' => $form->getMessages());
        }
        $view = new ViewModel(array(
            'data' => $response
        ));
        $view->setTemplate('app/response/json');
        return $view;        
        
    }

    /**
     * Prepare view renderer
     * 
     * @param array $variables
     * @param string $template template script and source
     * @return \Zend\View\Model\ViewModel
     */
    public function buildView($variables, $template = null)
    {
        $view = new ViewModel($variables);
        if (null !== $template) {
            $view->setTemplate($template);
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
    
    /**
     * 
     * @param unknown $pageOptions
     * @param string $role
     * @param string $acl
     */
    protected function iniPlugins($pageOptions,$role = null, $acl = null)
    {
        $modul = $this->getServiceLocator()->get('contentinum_modul');
        $modul->setPlugins($this->getServiceLocator()->get('contentinum_plugin_keys'));
        $modul->setParams($pageOptions->getParams());
        $modul->setIdentity($this->getIdentity());
        $modul->setAcl($acl);
        $modul->setDefaultRole($role);
        $modul->setUrl($pageOptions->getUrl());
        $modul->setXmlHttpRequest($this->getXmlHttpRequest()); 
        $mapper = $this->getServiceLocator()->get('contentinum_modul_parameter');
        $modul->setModul($mapper->fetchContent($pageOptions->getParams()));   
        return $modul->fetchContent();
    }
}