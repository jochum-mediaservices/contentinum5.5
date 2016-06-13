<?php
namespace Mcwork\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;




/**
 * Set layout configuration
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class Backendlayout extends AbstractPlugin
{
    public function __invoke($pageOptions, $identity, $role, $acl, $layout, $sl)
    {
        $viewHelperManager = $sl->get('viewHelperManager');
        $this->setAccessRights($layout, $role, $acl);
        $this->navigation($layout, $sl, $identity);
        $this->setAssets($layout, $pageOptions, $viewHelperManager);
        $this->setTitle($pageOptions, $viewHelperManager);
        $this->setAttribute($pageOptions, $viewHelperManager, $layout);
        $this->layoutFile($pageOptions, $layout);
        $this->setAppLocale($pageOptions, $viewHelperManager);   
        
    }
    
    /**
     * Set access right in layout template
     * @param unknown $layout
     * @param unknown $role
     * @param unknown $acl
     */
    protected function setAccessRights($layout,$role, $acl)
    {
        $layout->role = $role;
        $layout->acl = $acl;
    }
    
    protected function navigation($layout, $sl, $identity)
    {
        $navigation = $sl->get('mcwork_navigation_files');
        foreach ($navigation->navigation->default as $entry) {
            if ('Mcwork_Controller_User' == $entry->label) {
                $entry->label = 'Hallo '. $identity->name;
            }
        }
        $layout->mcworknavigation = new \Zend\Navigation\Navigation($navigation->navigation->default->toArray());
    }
    
    /**
     *
     * @param \Contentinum\Options\PageOptions $pageOptions
     * @param Zend\View\HelperPluginManager $viewHelperManager
     */
    protected function setAssets($layout, $pageOptions, $viewHelperManager)
    {
        $am = new \Contentinum\Assets\Manager();
        $am->set($pageOptions->getAssets());
        $layout->stylesheets = $am->getStylesheets();
        $layout->scripthead = $am->getHeadLink();   
        $layout->scriptInline = $am->getInlineLink();
        $str = '';
        if (null !== ($scripts = $pageOptions->getBodyFooterScript())){
            foreach ($scripts['prepend'] as $key => $script){
                $str .= $am->getInlineLinkScript($script);
            }
            $layout->prependScripts = $str;
        }
    }    
    
    /**
     * Set page title
     *
     * @param \Contentinum\Options\PageOptions $pageOptions
     * @param Zend\View\HelperPluginManager $viewHelperManager
     */
    protected function setTitle($pageOptions, $viewHelperManager)
    {
        $seperator = ' - ';
        $appendTitle = 'unkown title';
        $prependTitle = 'unknown';
        if (null !== ($metaTitle = $pageOptions->getMetaTitle())) {
            $prependTitle = $metaTitle;
        }
        
        if (null !== ($title = $pageOptions->getTitle() )) {
            $appendTitle = $title;
        }        
        
        $headTitleHelper = $viewHelperManager->get('headTitle');
        $headTitleHelper->setSeparator($seperator);
        $headTitleHelper->append($appendTitle);
        $headTitleHelper->prepend($prependTitle);
    }    
    
    /**
     * Set layout script
     *
     * @param \Contentinum\Options\PageOptions $pageOptions            
     * @param Zend\View\Model\ViewModel $layout            
     */
    protected function layoutFile($pageOptions, $layout)
    {
        $layout->setTemplate($pageOptions->getLayout());
    }

    /**
     * Set further attributtes:
     * charset
     *
     * @param \Contentinum\Options\PageOptions $pageOptions            
     * @param Zend\View\HelperPluginManager $viewHelperManager            
     * @param Zend\View\Model\ViewModel $layout            
     */
    protected function setAttribute($pageOptions, $viewHelperManager, $layout)
    {
        $layout->charset = $pageOptions->getCharset();
        $layout->viewport = $pageOptions->getMetaViewport();
        if (null !== ($bodyId = $pageOptions->getBodyId())){
            $layout->bodyIdent = ' id="' . $bodyId . '"';
        }
    }

    /**
     *
     * @param \Contentinum\Options\PageOptions $pageOptions             
     * @param Zend\View\HelperPluginManager $viewHelperManager            
     */
    protected function setAppLocale($pageOptions, $viewHelperManager)
    {
        $dateFormat = $viewHelperManager->get('dateFormat');
        $dateFormat->setTimezone($pageOptions->getTimeZone())->setLocale($pageOptions->getLocale());
    }  
}