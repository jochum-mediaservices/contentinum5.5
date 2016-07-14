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

/**
 * form controller backend add a data record in database
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class FsMultipleUploadController extends AbstractApplicationController
{

    public function application($pageOptions, $role = null, $acl = null)
    {
        return $this->process($pageOptions, $role, $acl);
    }

    /**
     *
     * @param unknown $pageOptions
     * @param string $role
     * @param string $acl
     */
    public function process($pageOptions, $role = null, $acl = null)
    {
        if (! empty($_FILES) && is_array($_FILES['file']['tmp_name'])) {
            $datas = $this->getRequest()->getPost();
            if (isset($datas['currentuploadpath']) && strlen($datas['currentuploadpath']) > 1) {
                $this->worker->setFsCurrent(str_replace('_', DS, $datas['currentuploadpath']) . DS);
            }
            
            if (isset($datas['imagesize']) && strlen($datas['imagesize']) > 2) {
                $this->worker->setResizeImage($datas['imagesize']);
            }
            
            if (isset($datas['imagequality']) && strlen($datas['imagequality']) > 1) {
                $this->worker->setImageQuality($datas['imagequality']);
            }            
            
            $save = new \Mcwork\Model\Medias\SaveUpload($this->getServiceLocator()->get('doctrine.entitymanager.orm_default'));
            $save->setEntity(new \Contentinum\Entity\WebMedias());
            if (method_exists($save, 'setIdentity')) {
                $save->setIdentity($this->getIdentity());
            }            
            $entityName = $save->getEntityName();
            $ret = array();
            foreach ($_FILES['file']['tmp_name'] as $k => $file) {
                $this->worker->multipleUpload($_FILES, $k, $file);             
                $this->worker->addInsert('resource', 'index');
                $save->save($this->worker->preparedInsert($datas->toArray())
                    ->emptyInserts(), new $entityName());      
                $ret[$_FILES['file']['name'][$k]]['filename'] = $this->worker->getTargetFileName();
            }
            $view = $view = new ViewModel(array(
                'data' => $ret
            ));
            $view->setTemplate($pageOptions->template);
            return $view;
        } else {
            $view = new ViewModel(array(
                'error' => 'wrong_param_to_upload_files'
            ));
            $view->setTemplate('content/medias/response');
            return $view;
        }
    }
}