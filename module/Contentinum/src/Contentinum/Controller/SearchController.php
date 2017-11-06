<?php
namespace Contentinum\Controller;

use Zend\View\Model\ViewModel;

class SearchController extends AbstractApplicationController
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
        $entries = $this->worker->fetchContent($pageOptions->getParams());
        try {
            $plugin = $this->iniPlugins($pageOptions,$role,$acl);
        } catch ( \Exception $e ) {
            header("HTTP/1.1 403 Forbidden" );
            $str = '<html><body>';
            $str .= '<h1>Nicht erlaubt / Forbidden</h1>';     
            $str .= '<p>Sie sind nicht berechtigt, auf diesen Server '.$pageOptions->getHost().' zuzugreifen!</p>';
            $str .= '<p>You don\'t have permission to access '.$pageOptions->getHost().' on this server!</p>';
            $str .= '</body></html>';
            print $str;
            exit();
        }        

        $variables['entries'] = $entries;
        $variables['widgets'] = $this->getServiceLocator()->get('contentinum_content_widgets');
        $variables['groupstyles'] = $this->getServiceLocator()->get('contentinum_group_styles' );
        $variables['contentstyles'] = $this->getServiceLocator()->get('contentinum_content_styles');
        $variables['pluginstyles'] = $this->getServiceLocator()->get('contentinum_template_plugins');
        $variables['plugins'] = $plugin;
        $variables['identity'] = $this->getIdentity();
        $variables['role'] = $role;
        $variables['acl'] = $acl;      
        $variables['cookies'] = $cookies;
        $variables['protocol'] = $pageOptions->getProtocol();
        $variables['url'] = $pageOptions->getUrl();
        $variables['host'] = $pageOptions->getHost();
        $variables['paramter'] = $pageOptions->getParams();
        $variables['xmlHttpRequest'] = $this->getXmlHttpRequest();            
        $variables['pluginViewHelper'] = $this->getServiceLocator()->get('contentinum_plugin_views');
        
        
        if (false !==( $contentsearch = $this->getRequest()->getPost('contentsearch', false) )){
            $variables['contentsearch'] = $contentsearch;
            $search = $this->getServiceLocator()->get('contentinum_search_news');
            $variables['contentToSearch'] = $search->fetchContent($pageOptions->getParameter('section') );
        }

        
        return $this->buildView($variables,$pageOptions->getTemplate());
    }

    /**
     * (non-PHPdoc)
     * 
     * @see \Contentinum\Controller\AbstractApplicationController::process()
     */
    protected function process($pageOptions, $role = null, $acl = null)
    {       
        return $this->application($pageOptions,$role,$acl);
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