<?php
namespace Contentinum\Factory\Controller;

use Zend\Mvc\Controller\ControllerManager;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Http\PhpEnvironment\Request as HttpRequest;

class ApplicationControllerFactory implements FactoryInterface
{

    /**
     * Create controller
     *
     * @param ControllerManager $serviceLocator
     * @return Contentinum\Controller\ApplicationController
     */
    public function createService(ServiceLocatorInterface $controllerManager)
    {
        $sl = $controllerManager->getServiceLocator();
        /**
         *
         * @var $pageOptions Contentinum\Options\PageOptions
         */
        $pageOptions = $sl->get('contentinum_pages');
        $opt = $sl->get('contentinum_customer');
        if (isset($opt['default']['google_map_apikey'])) {
            define('GOOGLE_API_KEY', $opt['default']['google_map_apikey']);
        }
        $request = new HttpRequest();
        $pageOptions->setHost($request->getUri()->getHost());
        $pageOptions->setQuery($request->getUri()->getPath());
        $pageOptions->setProtocol($request->getUri()->getScheme());
        $pagefiles = $sl->get('contentinum_page_files');
        $page = $pageOptions->split();
        $defaults = $sl->get('contentinum_page_defaults');
        if (isset($pagefiles[$page . '_pages'])) {
            $defaults->setCacheKey($page . '_pages');
            $pages = $defaults->get($pagefiles[$page . '_pages']);
            $pageOptions->addOptions($pages);
            if (isset($pages[$pageOptions->getQuery()])) {
                $pageOptions->addOptions($pages, '/' . $pageOptions->split(null, 5), true);
                $pageOptions->setActive('/' . $pageOptions->split(null, 5));
            } else {
                switch ($page) {
                    case 'mcevent':
                    case 'mcwork':
                    case 'municipal':
                    case 'utilities':
                        if (isset($pages['/' . $pageOptions->split(null, 3)])) {
                            $pageOptions->addOptions($pages, '/' . $pageOptions->split(null, 3), true);
                            $pageOptions->setActive('/' . $pageOptions->split(null, 3));
                        } elseif (isset($pages['/' . $pageOptions->split(null, $pageOptions->getSplitQuery())])) { // ... or isset page ...
                            $pageOptions->addOptions($pages, '/' . $pageOptions->split(null, $pageOptions->getSplitQuery()), true);
                            $pageOptions->setActive('/' . $pageOptions->split(null, $pageOptions->getSplitQuery()));
                        } else { // ... page not found send 404
                            die('not found');
                        }
                    break;
                    default:
                        die('not found');
                        break;
                }
            }
        } elseif (in_array($page, array(
            'login',
            'logout'
        ))) {
            $defaults->setCacheKey('mcuser_pages');
            $pages = $defaults->get($pagefiles['mcuser_pages']);
            $pageOptions->addOptions($pages); // default options
            $pageOptions->addOptions($pages, '/' . $pageOptions->split(null, 2), true);
            $pageOptions->setActive('/' . $pageOptions->split(null, 2));
         } else {           
            $defaults->setCacheKey('app_pages');
            $pageOptions->addOptions($defaults->get($pagefiles['app_pages']));        
            $url = $pageOptions->split($pageOptions->getQuery(), 1);
            switch ($url) {
                case 'sitemap.xml':
                case 'feed':
                case 'pdf':
                case 'emailrecom':
                case 'contentplugin':
                    $pageOptions->addOptions($defaults->get($pagefiles['app_pages']), $url);
                    break;
                default:
                    $preferences = $sl->get('contentinum_preference');
                    $pageOptions->addOptions($preferences);
                    $pageOptions->addOptions($preferences, $pageOptions->getHost());
                    $pages = $sl->get('contentinum_public_pages');
                    $hostId = $pageOptions->getHostId();
                    if (strlen($url) == 0) {
                        $url = 'index';
                    }
                    if (null !== ($page = $pages->$hostId->$url)) {
                        $attribute = $sl->get('contentinum_attribute_pages');
                        $attribute = (is_array($attribute)) ? $attribute : $attribute->toArray();
                        (isset($attribute[$page['parentPage']])) ? $pageOptions->addOptions($attribute, $page['parentPage']) : false;
                        (isset($attribute[$page['id']])) ? $pageOptions->addOptions($attribute, $page['id']) : false;
                        $pageHeaders = $sl->get('contentinum_page_headers');
                        (isset($pageHeaders[$page['parentPage']])) ? $pageOptions->addPageHeaders($pageHeaders, $page['parentPage']) : false;
                        (isset($pageHeaders[$page['id']])) ? $pageOptions->addPageHeaders($pageHeaders, $page['id']) : false;
                        $pageOptions->addPage($page);
                    } else {
                        $preferences = $sl->get('contentinum_preference');
                        $pageOptions->addOptions($preferences);
                        $pageOptions->addOptions($preferences, $pageOptions->getHost());
                        $pages = $sl->get('contentinum_public_pages');
                        $hostId = $pageOptions->getHostId();
                        $page = $pages->$hostId->error;
                        $attribute = $sl->get('contentinum_attribute_pages');
                        $attribute = (is_array($attribute)) ? $attribute : $attribute->toArray();
                        (isset($attribute[$page['parentPage']])) ? $pageOptions->addOptions($attribute, $page['parentPage']) : false;
                        (isset($attribute[$page['id']])) ? $pageOptions->addOptions($attribute, $page['id']) : false;
                        $pageOptions->addPage($page);
                        $pageOptions->addAppOptions('controller', 'Contentinum\Controller\ErrorController');
                    }
                    break;
            }
        }       
        $em = $sl->get($pageOptions->getApp('entitymanager'));
        $workerName = $pageOptions->getApp('worker');
        $worker = new $workerName($em);
        $worker->setSl($sl);
        if (false !== ($entityName = $pageOptions->getApp('entity'))) {
            $worker->setEntity(new $entityName());
        }
        $controllerName = $pageOptions->getApp('controller');
        $controller = new $controllerName($pageOptions);
        $controller->setConfiguration($opt);
        $controller->setWorker($worker);
        $controller->setFormFactory($this->formFactory($sl, $pageOptions, $worker));
        return $controller;
    }

    /**
     *
     * @param ControllerManager $sl
     * @param Contentinum\Options\PageOptions $pageOptions
     * @param ContentinumComponents\Mapper\Worker $worker
     */
    protected function formFactory($sl, $pageOptions, $worker)
    {
        if (false !== ($formName = $pageOptions->getApp('form'))) {           
            if (false !== ($targetEntities = $pageOptions->getApp('targetentities'))) {
                if (is_array($targetEntities) && ! empty($targetEntities)) {
                    foreach ($targetEntities as $key => $tEntity) {
                        $worker->addTargetEntities($key, $tEntity);
                    }
                }
            }         
            $formFactory = new $formName($worker);
            $decorators = $sl->get($pageOptions->getApp('formdecorators'));
            $decorators = $decorators->default->toArray();          
            if (false != ($formAttribs = $pageOptions->getApp('formattributes'))) {
                $decorators['deco-form']['form-attributtes'] = array_merge($decorators['deco-form']['form-attributtes'], $formAttribs);
            }          
            $formFactory->setDecorators($decorators);
            $formFactory->setServiceLocator($sl);           
            return $formFactory;
        } else {
            return false;
        }
    }
}