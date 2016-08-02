<?php
namespace Contentinum\Controller;

use ContentinumComponents\Controller\AbstractContentinumController;
use Zend\Mvc\MvcEvent;

abstract class AbstractApplicationController extends AbstractContentinumController
{

    /**
     * PageOptions
     *
     * @var Contentinum\Options\PageOptions
     */
    protected $pageOptions;
    
    /**
     * AbstractForms
     * @var \ContentinumComponents\Forms\AbstractForms
     */
    protected $formFactory;

    /**
     *
     * @return the $pageOptions
     */
    public function getPageOptions()
    {
        return $this->pageOptions;
    }

    /**
     *
     * @param \Contentinum\Options\PageOptions $pageOptions            
     */
    public function setPageOptions($pageOptions)
    {
        $this->pageOptions = $pageOptions;
    }

    
    /**
     * @return the $formFactory
     */
    public function getFormFactory()
    {
        return $this->formFactory;
    }

    /**
     * @param \ContentinumComponents\Forms\AbstractForms $formFactory
     */
    public function setFormFactory($formFactory)
    {
        $this->formFactory = $formFactory;
    }

    public function __construct($pageOptions)
    {
        $this->setPageOptions($pageOptions);
    }
    
    /**
     * Steps running form display, validation and output status message
     *
     * @param MvcEvent $e
     * @return \Zend\View\Model\ViewModel
     */
    public function onDispatch(MvcEvent $e)
    {
        
        $this->getPageOptions()->addParameter( 'pages', $this->params()->fromRoute('pages', false));
        $this->getPageOptions()->addParameter( 'section', $this->params()->fromRoute('section', false));
        $this->getPageOptions()->addParameter( 'article', $this->params()->fromRoute('article', false));
        $this->getPageOptions()->addParameter( 'category', $this->params()->fromRoute('category', false));
        $this->getPageOptions()->addParameter( 'categoryvalue', $this->params()->fromRoute('categoryvalue', false));    
        $this->getPageOptions()->addParameter( 'query', $this->params()->fromQuery());
        
        $authService = $this->getServiceLocator()->get('user_authentication');
        
        if ('index' !== $this->pageOptions->resource) {    
            if (! $authService->hasIdentity()) {
                return $this->redirect()->toUrl('/login');
            } else {
                $this->setIdentity($authService->getIdentity());
            }
        } 
        
        if (null === $this->getIdentity() && $authService->hasIdentity()){
            $this->setIdentity($authService->getIdentity());
        }
        
        $role = $this->getServiceLocator()->get('contentinum_acl_defaultrole');
        $acl = $this->getServiceLocator()->get('contentinum_acl_acl');        
        $this->setXmlHttpRequest($this->getRequest()->isXmlHttpRequest());
        
        if (method_exists($this, 'prepare')) {
            $this->prepare($this->getPageOptions(), $role, $acl);
        }
        
        $routeMatch = $e->getRouteMatch();
        if ($this->getRequest()->isPost()) {
            $app = $this->process($this->getPageOptions(), $role, $acl);
        } else {
            $e->getRouteMatch()->setParam('action', 'application');
            $app = $this->application($this->getPageOptions(), $role, $acl);
        }
        $e->setResult($app);
        return $app;        
    }
    
    /**
     * Application method
     *
     * @param \Contentinum\Options\PageOptions $pageOptions
     * @param string $role current user role
     * @param \Zend\Acl\Acl $acl
     */    
    abstract protected function application($pageOptions, $role = null, $acl = null);
    
    /**
     * Process method
     *
     * @param \Contentinum\Options\PageOptions $pageOptions
     * @param string $role current user role
     * @param \Zend\Acl\Acl $acl
     */
    abstract protected function process($pageOptions, $role = null, $acl = null);
}