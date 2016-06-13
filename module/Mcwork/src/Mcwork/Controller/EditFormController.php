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
use ContentinumComponents\Tools\HandleSerializeDatabase;

class EditFormController extends AbstractApplicationController
{
    /**
     * Query parameter,default 'category'
     *
     * @var string
     */
    protected $querykey = 'category'; 
    
    /**
     * Parent group ident
     * @var interger
     */
    protected $groupIdent;
    
    /**
     * 
     * @var int
     */
    protected $ident;
    
    /**
     * Unserialize populate datas
     *
     * @var boolean array
     */
    protected $unserialize = false;
    
    /**
     * Exclude form fields from populate values
     *
     * @var unknown
     */
    protected $notPopulate = false;
    
    /**
     * Populate datas from further entities
     * @var array
     */
    protected $populateentity;    
    
    /**
     *
     * @var unknown
     */
    protected $form;    
    
    
    /**
     * @return the $groupIdent
     */
    public function getGroupIdent()
    {
        return $this->groupIdent;
    }

    /**
     * @param interger $groupIdent
     */
    public function setGroupIdent($groupIdent)
    {
        $this->groupIdent = $groupIdent;
    }

    /**
     * @return the $ident
     */
    public function getIdent()
    {
        return $this->ident;
    }

    
    
    
    /**
     * @param int $ident
     */
    public function setIdent($ident)
    {
        $this->ident = $ident;
    }

 /**
     * @return the $unserialize
     */
    public function getUnserialize()
    {
        return $this->unserialize;
    }

	/**
     * @param boolean $unserialize
     */
    public function setUnserialize($unserialize)
    {
        $this->unserialize = $unserialize;
    }

	/**
     *
     * @return the $notPopulate
     */
    public function getNotPopulate()
    {
        return $this->notPopulate;
    }
    
    /**
     *
     * @param \Mcwork\Controller\unknown $notPopulate
     */
    public function setNotPopulate($notPopulate)
    {
        if (is_string($notPopulate)) {
            $notPopulate[] = $notPopulate;
        }
        $this->notPopulate = $notPopulate;
    }
    /**
     * @return the $populateentity
     */
    public function getPopulateentity()
    {
        return $this->populateentity;
    }
    
    /**
     * @param multitype: $populateentity
     */
    public function setPopulateentity($populateentity)
    {
        $this->populateentity = $populateentity;
    }  
      
    
    /**
     * @return the $form
     */
    public function getForm()
    {
        return $this->form;
    }

    /**
     * @param unknown $form
     */
    public function setForm($form)
    {
        $this->form = $form;
    }

    public function prepare($pageOptions, $role = null, $acl = null)
    {
        if (false !== $pageOptions->getApp('querykey')){
            $this->querykey = $pageOptions->getApp('querykey');
        }
        if (false !== $pageOptions->getApp('notpopulate')){
            $this->notPopulate = $pageOptions->getApp('notpopulate');
        }  
        if (false !==( $populateentity = $pageOptions->getApp('populateentity')) ){
            $this->populateentity = $populateentity;
        }        
        if (false != ($populateSerializeFields = $pageOptions->getApp('populateSerializeFields'))) {
            $this->unserialize = $populateSerializeFields;
        }        
        $this->setIdent($this->params()->fromRoute($this->querykey, 0));
        $this->setGroupIdent($this->params()->fromRoute('categoryvalue', null));
        $formFactory = $this->getFormFactory();
        if (false != ($setexclude = $pageOptions->getApp('setexclude'))) {
            $setexclude['value'] = $this->getIdent();
            $formFactory->setExclude($setexclude);
        } 

        $form = $formFactory->getForm();
        $form->setAttribute('action', $pageOptions->getApp('formaction'));
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
     * @see \ContentinumComponents\Controller\AbstractMcworkController::application()
     */
    public function application($pageOptions, $role = null, $acl = null)
    {
        $this->backendlayout($pageOptions, $this->getIdentity(), $role, $acl, $this->layout(), $this->getServiceLocator());
        
        $services = array();
        $id = $this->params()->fromRoute($this->querykey, 0);
        $form = $this->getForm();
        $category = '';
        if (null !== $this->groupIdent){
            $category = '/' . $this->getGroupIdent();
        }  
        
        
        $form->setAttribute('action', $pageOptions->getApp('formaction') . '/' . $this->getIdent(). $category);
        $datas = $this->populate($this->getIdent(), $pageOptions);
        $form->populateValues($datas);

        
        return $this->buildView(array(
            'acl' => $acl,
            'role' => $role,
            'resource' => $this->getServiceLocator()
            ->get('mcwork_acl_resource'),
            'current' => $pageOptions->getActive(),
            'services' => $services,
            'identity'=> $this->getIdentity(),
            'usergroups' => $this->getServiceLocator()->get('contentinum_acl_usrgrp'),
            'content' => $pageOptions->getPageContent(),
            'form' => $form,
            'category' => $this->getGroupIdent(),
            'paramter' => $pageOptions->getParams(),
            'appparameter' => $pageOptions->getApp('appparameter'),
            'xmlHttpRequest' => $this->getXmlHttpRequest(),
        ), $pageOptions);        
    }

    /**
     * 
     * @param unknown $pageOptions
     * @param unknown $defaultRole
     * @param unknown $acl
     * @return Ambigous <\Zend\Http\Response, \Zend\Stdlib\ResponseInterface>|\Zend\View\Model\ViewModel
     */
    public function process($pageOptions, $role = null, $acl = null)
    {
        $category = '';
        if (null !== $this->groupIdent){
            $category = '/category/' . $this->getGroupIdent();
        }  
        $form = $this->getForm();
        $form->setInputFilter($form->getInputFilter());
        $form->setData($this->getRequest()->getPost());
        if ($form->isValid()) {
            $formDatas = $form->getData();
            try {
                if (method_exists($this->worker, 'setIdentity')) {
                    $this->worker->setIdentity($this->getIdentity());
                }
                $msg = $this->worker->save($form->getData(), $this->worker->fetchPopulateValues($this->getIdent(), false));              
                return $this->redirect()->toUrl($pageOptions->getApp('settoroute') . $category);
            } catch (\Exception $e) {
                exit($e->getMessage());
            }
        } else {
           $this->backendlayout($pageOptions, $this->getIdentity(), $role, $acl, $this->layout(), $this->getServiceLocator());
            $services = array();

            return $this->buildView(array(
            'acl' => $acl,
            'role' => $role,
            'resource' => $this->getServiceLocator()
            ->get('mcwork_acl_resource'),
            'current' => $pageOptions->getActive(),
            'services' => $services,
            'identity'=> $this->getIdentity(),
            'usergroups' => $this->getServiceLocator()->get('contentinum_acl_usrgrp'),
            'content' => $pageOptions->getPageContent(),
            'form' => $form,
            'category' => $this->getGroupIdent(),
            'paramter' => $pageOptions->getParams(),
            'appparameter' => $pageOptions->getApp('appparameter'),
            'xmlHttpRequest' => $this->getXmlHttpRequest(),
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
        
        //$view->setVariable('customconfig', $this->getConfiguration());
        //$view->setVariable('usergroups', $this->getServiceLocator()->get('Mcwork\Groups\User'));
        
        if (false !== ($toRoute = $pageOptions->getApp('settoroute'))) {
            $view->setVariable('abortation', $toRoute);
        }        
        
        if (false !== ($formbuttons = $pageOptions->getApp('formbuttons'))){
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
        
        if (null !== $pageOptions->getTemplate()) {
            $view->setTemplate($pageOptions->getTemplate());
        }
        return $view;
    }
    
    
    /**
     * Populate database entries in form fields
     */
    protected function populate($id, $pageOptions)
    {
        $datas = $this->worker->fetchPopulateValues($id);
        if ($this->populateentity){
            $furtherDatas = array();
            foreach ($this->populateentity as $column => $row){
                $furtherDatas = $this->worker->populateFurtherEntities($row['entity'], $column, $id, $row['columns'], $datas);
            }
            if (is_array($furtherDatas) && ! empty($furtherDatas)){
                $datas = array_merge($datas,$furtherDatas);
            }
        }
        if (false !== ($populateFromFactory = $pageOptions->getApp('populateFromFactory')) ) {
            $factoryDatas = array();
            foreach ($populateFromFactory as $key => $row){
                $result = array();
                $mapper = $this->getServiceLocator()->get($key);
                $result = $mapper->fetchContent(array($row['query'] => $id));
                if (isset($result[$row['result']])){
                    $factoryDatas[$row['populate']] = $result[$row['result']];
                }
            }
            if ( is_array($factoryDatas) && !empty($factoryDatas) ){
                $datas = array_merge($datas,$factoryDatas);
            }
        }        
        if (false !== $this->notPopulate) {
            foreach ($this->notPopulate as $field) {
                if (isset($datas[$field])) {
                    unset($datas[$field]);
                }
            }
        }
        
        if (is_array($this->unserialize)){
            $mcSerialize = new HandleSerializeDatabase();
            foreach ($this->unserialize as $field){
                if (isset($datas[$field]) && strlen($datas[$field]) > 1){
                    $datas = array_merge($datas, $mcSerialize->execUnserialize($datas[$field]) );
                }
            }
        }
        
        return $datas;
    } 
}