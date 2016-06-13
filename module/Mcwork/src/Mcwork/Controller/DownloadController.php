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
 * @category contentinum backend
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

class DownloadController extends AbstractApplicationController
{

    public function application($pageOptions, $role = null, $acl = null)
    {
        $redirectUrl = $pageOptions->getApp('settoroute');
        
        if (false !== ($file = $this->worker->fetchContent($pageOptions->getParams()))) {
            $sm = $this->getServiceLocator()->get('contentinum_files_storage_manager');
            $file['approot'] = $sm->getDocumentRoot();
            $view = new ViewModel($file);
            $view->setTemplate($pageOptions->getTemplate());
            return $view;
        } else {
            $cat = '';
            if (null !== ($cat = $this->params()->fromRoute('categoryvalue', null))) {
                $cat = '/category/' . $cat;
            }
            
            $this->flashMessenger()
                ->setNamespace('mcwork')
                ->addErrorMessage('File not found');
            
            return $this->redirect()->toUrl($redirectUrl . $cat);
        }
    }

    /*
     * (non-PHPdoc)
     * @see \Contentinum\Controller\AbstractApplicationController::process()
     */
    protected function process($pageOptions, $role = null, $acl = null)
    {
        return $this->application($pageOptions, $role, $acl);
    }
}