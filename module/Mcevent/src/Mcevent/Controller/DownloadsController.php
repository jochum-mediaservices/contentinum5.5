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
namespace Mcevent\Controller;

use Contentinum\Controller\AbstractApplicationController;
use Zend\View\Model\ViewModel;

/**
 * form controller backend add a data record in database
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class DownloadsController extends AbstractApplicationController
{

    public function application($pageOptions, $role = null, $acl = null)
    {
        $logger = new \Zend\Log\Logger();
        $writer = new \Zend\Log\Writer\Stream(CON_ROOT_PATH . '/data/logs/events-'.date('Y-m-d').'.log');
        $logger->addWriter($writer);
        
        
        $remote = new \Zend\Http\PhpEnvironment\RemoteAddress();
        $useragent = $_SERVER['HTTP_USER_AGENT'];
        if (false !== ($group = $this->worker->services($pageOptions->getParams(), $remote->getIpAddress()))){
            $params = $pageOptions->getParams();
            $url = '/' . $params['pages'] . '/' . $params['section'] . '/' . $params['article'] . '/' . $params['category'] . '/' . $params['categoryvalue'];
            $logger->log(\Zend\Log\Logger::INFO, 'access permit | user_remote_ip: ' . $remote->getIpAddress() . ' | permit ip: ' . $remote->getIpAddress() . ' | ' . $useragent );
            $view = new ViewModel(array('entries' => $this->worker->fetchContent(array('group' => $group))));
            $view->setVariable('calname', $this->worker->getCalendarName());
            $view->setVariable('url', $pageOptions->getProtocol() .'://'. $pageOptions->getHost() . '/' . $pageOptions->getUrl() . $url);
            $view->setTemplate('content/download/csv');
            return $view;
        } else {
            $str = 'ACCESS DENIED! Request rejected | permit ip: ' . $remote->getIpAddress() . ' | ' . $useragent;
            $logger->log(\Zend\Log\Logger::WARN, $str);
            print false;
            die('no access');
        }
    }

    /**
     * 
     * {@inheritDoc}
     * @see \Contentinum\Controller\AbstractApplicationController::process()
     */
    public function process($pageOptions, $role = null, $acl = null)
    {
        $this->application($pageOptions, $role = null, $acl = null);
    }

}