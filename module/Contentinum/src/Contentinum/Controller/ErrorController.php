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
 * @category contentinum
 * @package Controller
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 * @copyright Copyright (c) 2009-2013 jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 * @license http://www.opensource.org/licenses/bsd-license
 * @since contentinum version 5.0
 * @link      https://github.com/Mikel1961/contentinum-components
 * @version   1.0.0
 */
namespace Contentinum\Controller;

use Zend\View\Model\ViewModel;



class ErrorController extends AbstractApplicationController
{
    
    /**
     * Error message
     *
     * @var string
     */
    protected $message;
    
    /**
     * HTTP status code
     *
     * @var int
     */
    protected $statusCode = 404;
    
    /**
     *
     * @return the $message
     */
    public function getMessage()
    {
        return $this->message;
    }
    
    /**
     *
     * @param string $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }
    
    /**
     *
     * @return the $statusCode
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }
    
    /**
     *
     * @param number $statusCode
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;
    }    
    
    /**
     * Application action display page content
     * @param Contentinum\Options\PageOptions $pageOptions Contentinum\Options\PageOptions
     * @param array $page
     * @param string $defaultRole
     * @param Zend\Permissions\Acl\Acl $acl Zend\Permissions\Acl\Acl
     */
    public function application($pageOptions, $role = null, $acl = null)
    {
        $this->frontendlayout($pageOptions, $role, $acl, $this->layout(), $this->getServiceLocator()
            ->get('viewHelperManager'));
        
        $cookies = $this->getRequest()->getHeaders()->get('Cookie');
        if (isset($cookies['PHPSESSID'])){
            unset($cookies['PHPSESSID']);
        }        
        
        $this->getResponse()->setStatusCode($this->statusCode);
        return $this->buildView(array(
            'entries' => $this->worker->fetchContent($pageOptions->getParams()),
            'widgets' => $this->getServiceLocator()->get('contentinum_content_widgets'),
            'groupstyles' => $this->getServiceLocator()->get('contentinum_group_styles' ),
            'contentstyles' => $this->getServiceLocator()->get('contentinum_content_styles'),
            'pluginstyles' => $this->getServiceLocator()->get('contentinum_template_plugins'),
            'plugins' => array(),
            'identity' => $this->getIdentity(),
            'role' => $role,
            'acl' => $acl,
            'cookies' => $cookies,
            'protocol' => $pageOptions->getProtocol(),
            'url' => $pageOptions->getUrl(),
            'host' => $pageOptions->getHost(),
            'paramter' => $pageOptions->getParams(),
            'xmlHttpRequest' => $this->getXmlHttpRequest(),
            'pluginViewHelper' => array(),
        ), $pageOptions->getTemplate());
    }  
    
    /** (non-PHPdoc)
     * @see \Contentinum\Controller\AbstractApplicationController::process()
     */
    protected function process($pageOptions, $role = null, $acl = null)
    {
        $this->application($pageOptions,$role,$acl);
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
}