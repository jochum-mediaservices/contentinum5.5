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
 * @category contentinum user
 * @package Controller
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 * @copyright Copyright (c) 2009-2013 jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 * @license http://www.opensource.org/licenses/bsd-license
 * @since contentinum version 5.0
 * @link      https://github.com/Mikel1961/contentinum-components
 * @version   1.0.0
 */
namespace Mcuser\Controller;

use Contentinum\Controller\AbstractApplicationController;
use Zend\Authentication\Result;
use Zend\View\Model\ViewModel;


/**
 * Mcuser login controller
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class McuserController extends AbstractApplicationController
{
    /**
     *
     * @var unknown
     */
    protected $form;
    
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
        $formFactory = $this->getFormFactory();
    
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
     * logout application action
     * @param Contentinum\Options\PageOptions $pageOptions Contentinum\Options\PageOptions
     * @param array $page
     * @param string $defaultRole
     * @param Zend\Permissions\Acl\Acl $acl Zend\Permissions\Acl\Acl
     */
    public function application($pageOptions, $role = null, $acl = null)
    {

        $this->frontendlayout($pageOptions, $role, $acl, $this->layout(), $this->getServiceLocator()
            ->get('viewHelperManager'));
        $services = array();
        $version = new \Contentinum\Version\ContentinumVersion();
        return $this->buildView(array(
            'acl' => $acl,
            'role' => $role,
            'resource' => $this->getServiceLocator()
            ->get('mcwork_acl_resource'),
            'current' => $pageOptions->getActive(),
            'services' => $services,
            'form' => $this->getForm(),
            'version' => $version->getHtml(),
            'content' => $pageOptions->getPageContent(),
            'category' => $this->params()->fromRoute('cat', false),
            'paramter' => $pageOptions->getParams(),
            'appparameter' => $pageOptions->getApp('appparameter'),
            'xmlHttpRequest' => $this->getXmlHttpRequest(),
        ), $pageOptions);        
    }

    /**
     * Login forms-processing
     * @return Ambigous <\Zend\Http\Response, \Zend\Stdlib\ResponseInterface>
     */
    public function process($pageOptions, $role = null, $acl = null)
    {
        $loginForm = $this->getForm();        
        $loginForm->setInputFilter($loginForm->getInputFilter());
        $loginForm->setData($this->getRequest()
            ->getPost());
        
        if ($loginForm->isValid()) {
            $formDatas = $loginForm->getData();
            try {
                if (false === ($user = $this->worker->userexists($formDatas['username']))) {
                    $this->flashMessenger()
                        ->setNamespace('frontend')
                        ->addErrorMessage('Your user entries are not correct!');
                    return $this->redirect()->toUrl('/login');
                }                
                $authService = $this->getServiceLocator()->get('user_authentication');               
                /* @var $authAdapter Database */
                $authAdapter = $this->getServiceLocator()->get('user_authentication_adapter');                
                $authAdapter->setLoginDatas($formDatas['username'], $formDatas['loginPassword'], $this->worker, $user);
                $authAdapter->setSalt($user['verify_string']);
                $authService->setAdapter($authAdapter);                
                $result = $authService->authenticate();
                if (! $result->isValid()) {
                    switch ($result->getCode()) {
                        case Result::FAILURE_CREDENTIAL_INVALID:
                            $this->worker->updateCountLogin($user);
                            $message = $result->getMessages();
                            break;
                        default:
                            $message = $result->getMessages();
                            break;
                    }
                    $this->flashMessenger()
                        ->setNamespace('frontend')
                        ->addErrorMessage($message);
                    return $this->redirect()->toUrl('/login');
                } else {                 
                    if (false !== ($identity = $authAdapter->getIdentityResult($this->getServiceLocator()))){
                        $identity->usergroups = $this->worker->usergroups($user['id']);
                        $authService->getStorage()->write($identity);             
                        $location = '/';
                        
                        $cookies = $this->getRequest()->getHeaders()->get('Cookie');
                        if (isset($cookies['linkredirect']) && 7 == $identity->roleident ){
                            $location = $cookies['linkredirect'];
                        } elseif (isset($user['login_homedir']) && strlen($user['login_homedir']) > 0) {
                            $location = $user['login_homedir'];
                        }
                        $this->worker->updateLogin($user);
                        return $this->redirect()->toUrl($location);
                    } else {
                        $this->flashMessenger()
                        ->setNamespace('frontend')
                        ->addErrorMessage('Your user entries are not correct!');
                        return $this->redirect()->toUrl('/login');                        
                    }
                }
            } catch (\Exception $e) {} 
        } else {
            $this->flashMessenger()
                ->setNamespace('frontend')
                ->addErrorMessage('Your user entries are not correct!');
            return $this->redirect()->toUrl('/login');
        }
    }

    /**
     * View settings
     * @param array $variables
     * @return \Zend\View\Model\ViewModel
     */
    protected function buildView(array $variables, $pageOptions)
    {
        $view = new ViewModel($variables);
        
        $msg = false;
        $msgType = false;
        
        if (true === $this->flashMessenger()->setNamespace('frontend')->hasCurrentErrorMessages()){
            $msg = $this->flashMessenger()->setNamespace('frontend')->getErrorMessages();
            $msgType = 'error';
        } elseif (true === $this->flashMessenger()->setNamespace('frontend')->hasCurrentSuccessMessages() ){
            $msg = $this->flashMessenger()->setNamespace('frontend')->getSuccessMessages();
            $msgType = 'success';
        } elseif (true === $this->flashMessenger()->setNamespace('frontend')->hasCurrentWarningMessages() ) {
            $msg = $this->flashMessenger()->setNamespace('frontend')->getWarningMessages();
            $msgType = 'warning';
        }
        $view->setVariable('messages', $msg);
        $view->setVariable('msgtype', $msgType);        
        
        $view->setTemplate($pageOptions->getTemplate());
        return $view;
    }
}