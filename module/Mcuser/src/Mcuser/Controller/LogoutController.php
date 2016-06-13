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
use Mcuser\Model\Auth\User;

/**
 * Mcuser logout controller
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class LogoutController extends AbstractApplicationController
{

    /**
     * logout application action
     * @param Contentinum\Options\PageOptions $pageOptions Contentinum\Options\PageOptions
     * @param array $page
     * @param string $defaultRole
     * @param Zend\Permissions\Acl\Acl $acl Zend\Permissions\Acl\Acl
     */
    public function application($pageOptions, $role = null, $acl = null)
    {
        $authService = $this->getServiceLocator()->get('user_authentication');
        if ($authService->hasIdentity()) {
            $identity = $authService->getIdentity();
            $update['lastLogout'] = date('Y-m-d H:i:s');
            $usr = new User($this->worker->getStorage());
            $usr->save($update, $this->worker->find($identity->userid));
            $authService->clearIdentity();
        }
        return $this->redirect()->toUrl('/');
    }
    
    /* (non-PHPdoc)
     * @see \Contentinum\Controller\AbstractApplicationController::process()
     */
    protected function process($pageOptions, $role = null, $acl = null)
    {
        // TODO Auto-generated method stub
        
    }

}