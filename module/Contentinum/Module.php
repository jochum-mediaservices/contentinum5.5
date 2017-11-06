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
 * @namespace Contentinum
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 * @copyright Copyright (c) 2009-2013 jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 * @license http://www.opensource.org/licenses/bsd-license
 * @since contentinum version 5.0
 * @link      https://github.com/jochum-mediaservices/contentinum5.5
 * @version   1.0.0
 */
namespace Contentinum;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Contentinum\Service\Errors\ErrorHandling;
use Zend\Log\Logger;
use Zend\Log\Writer\Stream as LogWriterStream;

/**
 * Contentinum application start
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class Module
{

    public function onBootstrap(MvcEvent $e)
    {
        $eventManager = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);
        $eventManager->attach('dispatch.error', function ($event) {
            $exception = $event->getResult()->exception;
            if ($exception) {
                $sm = $event->getApplication()
                    ->getServiceManager();
                $service = $sm->get('ContentinumServiceErrorHandling');
                $service->logException($exception);
            }
        });
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php'
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__
                )
            )
        );
    }

    public function getConfig()
    {
        $config = \ContentinumComponents\Tools\ArrayMergeRecursiveDistinct::merge(include __DIR__ . '/config/contentinum.config.php', include __DIR__ . '/config/customer.config.php');
        return $config;
    }

    public function getViewHelperConfig()
    {
        return include __DIR__ . '/config/contentinum.viewhelper.php';
    }

    public function getControllerPluginConfig()
    {
        return array(
            'invokables' => array(
                'Frontendlayout' => 'Contentinum\Controller\Plugin\Frontendlayout'
            )
        );
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'ContentinumServiceErrorHandling' => function ($sm) {
                    $logger = $sm->get('ZendLog');
                    $service = new ErrorHandling($logger);
                    return $service;
                },
                'ZendLog' => function ($sm) {
                    $filename = 'error-' . date('Y-m-d') . '.log';
                    $log = new Logger();
                    $writer = new LogWriterStream('./data/logs/' . $filename);
                    $log->addWriter($writer);
                    
                    return $log;
                }
            )
        );
    }
}