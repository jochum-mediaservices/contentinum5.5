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

/**
 * The application controller
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class PluginController extends AbstractApplicationController
{

    /**
     * Application action display page content
     * @param Contentinum\Options\PageOptions $pageOptions Contentinum\Options\PageOptions
     * @param string $defaultRole
     * @param Zend\Permissions\Acl\Acl $acl Zend\Permissions\Acl\Acl
     */
    public function application($pageOptions, $role = null, $acl = null)
    {
        $viewHelperManager = $this->getServiceLocator()->get('viewHelperManager');
        $dateFormat = $viewHelperManager->get('dateFormat');
        $dateFormat->setTimezone("Europa/Berlin")->setLocale("de_DE");
        
        $modul = $this->getServiceLocator()->get('contentinum_modul');
        $modul->setPlugins($this->getServiceLocator()->get('contentinum_plugin_keys'));
        $modul->setParams($pageOptions->getParams());
        $modul->setIdentity($this->getIdentity());
        $modul->setAcl($acl);
        $modul->setDefaultRole($role);
        $modul->setUrl($pageOptions->getUrl());
        $modul->setXmlHttpRequest('html'); 
        
        $variables = array();
        $variables['pluginstyles'] = $this->getServiceLocator()->get('contentinum_template_plugins');
        $variables['pluginViewHelper'] = $this->getServiceLocator()->get('contentinum_plugin_views');
        $variables['plugins'] = $this->worker->fetchContent($pageOptions->getParams(), $this->params()->fromPost(),$modul);
        $variables['parameter'] = $pageOptions->getParams();        
        $variables['xmlHttpRequest'] = 'html';
        $variables['modul'] = $this->worker->getPluginname();
        $variables['url'] = $this->worker->getOrginurl();

        return $this->buildView($variables,$pageOptions->template);
    }


    /** (non-PHPdoc)
     * @see \Contentinum\Controller\AbstractApplicationController::process()
     */
    protected function process($pageOptions, $role = null, $acl = null)
    {
        return $this->application($pageOptions,$role,$acl);
    }

    /**
     * Prepare view renderer
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