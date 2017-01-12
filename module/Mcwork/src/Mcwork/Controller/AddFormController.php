<?php
/**
 * contentinum - accessibility websites
 *
 * LICENSE
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED
 * OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * @category contentinum mcevent
 * @package Controller
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 * @copyright Copyright (c) 2009-2013 jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 * @license http://www.opensource.org/licenses/bsd-license
 * @since contentinum version 5.0
 * @link      https://github.com/Mikel1961/contentinum-components
 * @version   1.0.0
 */
namespace Mcwork\Controller;

use Contentinum\Controller\AbstractApplicationController;
use Zend\View\Model\ViewModel;

class AddFormController extends AbstractApplicationController
{

    /**
     * Parent group ident
     * 
     * @var int
     */
    protected $groupIdent;

    /**
     *
     * @var unknown
     */
    protected $form;

    /**
     *
     * @return the $groupIdent
     */
    public function getGroupIdent()
    {
        return $this->groupIdent;
    }

    /**
     *
     * @param int $groupIdent
     */
    public function setGroupIdent($groupIdent)
    {
        $this->groupIdent = $groupIdent;
    }

    /**
     *
     * @return the $form
     */
    public function getForm()
    {
        return $this->form;
    }

    /**
     *
     * @param unknown $form
     */
    public function setForm($form)
    {
        $this->form = $form;
    }

    public function prepare($pageOptions, $role = null, $acl = null)
    {
        $formFactory = $this->getFormFactory();
        $form = $formFactory->getForm();
        $category = '';
        
        if (false !== ($value = $this->params()->fromRoute('category', false))) {
            $this->setGroupIdent($value);
            $category = '/' . $value;
        }
        
        if ('yes' == $pageOptions->getApp('setcategroryvalue') ){
            if (false !== ($value = $this->params()->fromRoute('categoryvalue', false))) {
                $category .= '/' . $value;
            }
            
        }
                
        if (false !== ( $setcategrory = $pageOptions->getApp('setcategrory') )  ){
            switch ($setcategrory){
                case 'no':
                    $category = '';
                    break;
                default:
                    break;
            }
        }
        
        $form->setAttribute('action', $pageOptions->getApp('formaction') . $category);
        $form->setAttribute('method', 'POST');
        
        if (true == ($deco = $formFactory->getDecorators($formFactory::DECO_FORM))) {
            if (isset($deco['form-attributtes']) && is_array($deco['form-attributtes'])) {
                foreach ($deco['form-attributtes'] as $attribute => $value) {
                    $form->setAttribute($attribute, $value);
                }
            }
        }
        
        $this->setForm($form);
    }

    /**
     * (non-PHPdoc)
     * 
     * @see \Contentinum\Controller\AbstractApplicationController::application()
     */
    public function application($pageOptions, $role = null, $acl = null)
    {
        if (true !== $this->getXmlHttpRequest()){
            $this->backendlayout($pageOptions, $this->getIdentity(), $role, $acl, $this->layout(), $this->getServiceLocator());
        }
        
        $services = array();
        
        $form = $this->getForm();
        
        $this->populate($form, $pageOptions);

        return $this->buildView(array(
            'acl' => $acl,
            'role' => $role,
            'resource' => $this->getServiceLocator()
                ->get('mcwork_acl_resource'),
            'current' => $pageOptions->getActive(),
            'services' => $services,
            'identity' => $this->getIdentity(),
            'usergroups' => $this->getServiceLocator()->get('contentinum_acl_usrgrp'),
            'form' => $form,
            'content' => $pageOptions->getPageContent(),
            'category' => $this->getGroupIdent(),
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
    public function process($pageOptions, $role = null, $acl = null)
    {
        $form = $this->getForm();
        
        $category = '';
        if (false !== ($value = $this->params()->fromRoute('category', false))) {
            $category = '/category/' . $value;
        }
        
        $form->setInputFilter($form->getInputFilter());
        $form->setData($this->getRequest()
            ->getPost());
        
        if ($form->isValid()) {
            $formDatas = $form->getData();
            try {
                if (method_exists($this->worker, 'setIdentity')) {
                    $this->worker->setIdentity($this->getIdentity());
                }
                $msg = $this->worker->save($form->getData(), $this->worker->getEntity());
                if (false !== $this->getXmlHttpRequest()) {
                    echo json_encode($msg);
                    exit();
                } else {
                    return $this->redirect()->toUrl($pageOptions->getApp('settoroute') . $category);
                }
            } catch (\Exception $e) {
                exit($e->getMessage());
            }
        } else {
            if (true !== $this->getXmlHttpRequest()){
                $this->backendlayout($pageOptions, $this->getIdentity(), $role, $acl, $this->layout(), $this->getServiceLocator(),$this->getConfiguration());
            } else {
                $response['error'] = array('fields' => $form->getMessages());
                $view = new ViewModel(array(
                    'data' => $response
                ));
                $view->setTemplate('app/response/json');
                return $view;                
            }
            $services = array();
            
            
            return $this->buildView(array(
                'acl' => $acl,
                'role' => $role,
                'resource' => $this->getServiceLocator()
                ->get('mcwork_acl_resource'),
                'current' => $pageOptions->getActive(),
                'services' => $services,
                'identity' => $this->getIdentity(),
                'usergroups' => $this->getServiceLocator()->get('contentinum_acl_usrgrp'),
                'form' => $form,
                'content' => $pageOptions->getPageContent(),
                'category' => $this->getGroupIdent(),
                'paramter' => $pageOptions->getParams(),
                'appparameter' => $pageOptions->getApp('appparameter'),
                'xmlHttpRequest' => $this->getXmlHttpRequest()                
            ), $pageOptions);
        }
    }

    /**
     * View settings
     *
     * @param array $variables
     * @return \Zend\View\Model\ViewModel
     */
    protected function buildView(array $variables, $pageOptions)
    {
        $view = new ViewModel($variables);
        
        // $view->setVariable('customconfig', $this->getConfiguration());
        // $view->setVariable('usergroups', $this->getServiceLocator()->get('Mcwork\Groups\User'));
        
        if (false !== ($toRoute = $pageOptions->getApp('settoroute'))) {
            $view->setVariable('abortation', $toRoute);
        }
        
        if (false !== ($formbuttons = $pageOptions->getApp('formbuttons'))) {
            $view->setVariable('btnconfiguration', $formbuttons);
        }
        
        $view->setVariable('formbuttons', $this->getServiceLocator()
            ->get('mcwork_buttons'));
        
        if (1 === $pageOptions->getToolbar()) {
            $view->setVariable('toolbarcontent', $this->getServiceLocator()
                ->get('mcwork_toolbar'));
        }
        if (1 === $pageOptions->getTableedit()) {
            $view->setVariable('tableeditcontent', $this->getServiceLocator()
                ->get('mcwork_tableedit'));
        }
        
        $view->setVariable('setcategrory', $pageOptions->getApp('setcategrory'));
        
        if (null !== $pageOptions->getTemplate()) {
            $view->setTemplate($pageOptions->getTemplate());
        }
        return $view;
    }

    /**
     * Populate entries in form fields from configuration file
     */
    protected function populate($form, $pageOptions)
    {
        $populate = false;
        if (false != ($populateFromRoute = $pageOptions->getApp('populateFromRoute'))) {
            foreach ($populateFromRoute as $formRoute => $key) {
                $populate[$key] = $this->params()->fromRoute($formRoute);
            }
        }
        if (false !== ($populateAdd = $pageOptions->getApp('populate'))) {
            if (false !== $populate) {
                $populate = array_merge($populateAdd, $populate);
            } else {
                $populate = $populateAdd;
            }
        }
        if (false !== ($populateGroup = $pageOptions->getApp('populateFromGroup')) && false !== ($parentGroup = $pageOptions->getApp('parentGroup'))) {
            if (null !== $this->groupIdent) {
                if (false === $populate) {
                    $populate = array();
                }           
                foreach ($parentGroup as $entityService) {
                    if (isset($populateGroup[$entityService])) {
                        $entity = $this->getServiceLocator()->get($entityService);
                        $worker = $this->worker;
                        $worker->setEntity($entity);
                        $groupResult = $worker->find($this->getGroupIdent(), true);
                        $populateData = array();
                        foreach ($populateGroup[$entityService] as $grpColumn => $column) {
                            $populate[$column] = $groupResult->{$grpColumn};
                        }
                    }
                }
            }
        }
        if (false !== $populate) {
            $form->populateValues($populate);
        }
    }
}