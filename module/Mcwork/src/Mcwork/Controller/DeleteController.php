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

class DeleteController extends AbstractApplicationController
{

    /**
     * Query parameter,default 'category'
     *
     * @var string
     */
    protected $querykey = 'category';

    public function application($pageOptions, $role = null, $acl = null)
    {
        if (false !== $pageOptions->getApp('querykey')) {
            $this->querykey = $pageOptions->getApp('querykey');
        }
        
        $redirectUrl = $pageOptions->getApp('settoroute');
        $id = $this->params()->fromRoute($this->querykey, 0);
        
        $cat = '';
        if (null !== ($cat = $this->params()->fromRoute('categoryvalue', null))) {
            $cat = '/category/' . $cat;
        }
        
        if (false === $id) {
            if (true === $this->getXmlHttpRequest()) {
                return $this->buildView(array('error' => 'miss_parmeter'));
            } else {
            return $this->redirect()->toUrl($redirectUrl . $cat);
            }
        }
        
        try {
            
            if (false !== ($relatedEntries = $pageOptions->getApp('hasEntries'))){
                $this->worker->setRelatedEntries($relatedEntries);
            }            
            
            switch ($this->worker->execute($id)) {
                case 'success':
                    if (true === $this->getXmlHttpRequest()) {
                        return $this->buildView(array('success' => $this->worker->getMessage()));
                    } else {
                       $this->flashMessenger()
                        ->setNamespace('mcwork')
                        ->addSuccessMessage($this->worker->getMessage());
                    }
                    break;
                case 'warn':
                default:
                    if (true === $this->getXmlHttpRequest()) {
                        return $this->buildView(array('warn' => $this->worker->getMessage()));
                    } else {            
                        $this->flashMessenger()
                            ->setNamespace('mcwork')
                            ->addWarningMessage($this->worker->getMessage());
                    }
            }
        } catch (\Exception $e) {
            if (true === $this->getXmlHttpRequest()) {
                return $this->buildView(array('error' => $e->getMessage()));
            } else {
            $this->flashMessenger()
                ->setNamespace('mcwork')
                ->addErrorMessage($e->getMessage());
            }
        }
        
        return $this->redirect()->toUrl($redirectUrl . $cat);
    }

    /*
     * (non-PHPdoc)
     * @see \Contentinum\Controller\AbstractApplicationController::process()
     */
    protected function process($pageOptions, $role = null, $acl = null)
    {
        return $this->application($pageOptions, $role, $acl);
    }
    
    /**
     * 
     * @param unknown $datas
     */
    protected function buildView($datas)
    {
        $view = $view = new ViewModel(array(
            'entries' => $datas
        ));
        $view->setTemplate('content/service/delete');
        return $view;
    }
}