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

class FsMakeDirController extends AbstractApplicationController
{

    /**
     * (non-PHPdoc)
     *
     * @see \ContentinumComponents\Controller\AbstractMcworkController::application()
     */
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
        $datas = $this->getRequest()->getPost();
        $current = $cat = '';
        $current = str_replace('_', DS, $datas['currentpath']);
        if (strlen($current) > 0) {
            $cat = '/' . $datas['currentpath'];
        }
        
        $redirectUrl = $pageOptions->getApp('settoroute');
        if (isset($datas['new-folder']) && strlen($datas['new-folder']) > 1) {
            $this->worker->setFsCurrent($current);
            $this->worker->setNewDirectory($datas['new-folder']);
            $this->worker->mkdir();
            $this->flashMessenger()
                ->setNamespace('mcwork')
                ->addSuccessMessage('Successfully created a new directory');
        } else {
            $this->flashMessenger()
                ->setNamespace('mcwork')
                ->addErrorMessage('Error while create a new directory');
        }
        
        return $this->redirect()->toUrl($redirectUrl . $cat);
    }
}