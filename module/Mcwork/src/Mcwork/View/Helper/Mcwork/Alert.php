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
 * @category Mcwork
 * @package View
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 * @copyright Copyright (c) 2009-2013 jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 * @license http://www.opensource.org/licenses/bsd-license
 * @since contentinum version 5.0
 * @link      https://github.com/Mikel1961/contentinum-components
 * @version   1.0.0
 */
namespace Mcwork\View\Helper\Mcwork;

use Zend\Form\View\Helper\AbstractHelper;

/**
 * Handle content
 * 
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class Alert extends AbstractHelper
{

    public function __invoke($messages, $key = null, $close = true)
    {
        if ($messages) {
            $msg = '';
            foreach ($messages as $message) {
                if (is_array($message)){
                    $tmp = $message;
                    $message = '';
                    foreach ($tmp as $tval){
                        $message .= $tval . ' ';
                    }
                    $message = trim($message);
                }
                $msg .= '<p>' . $this->view->translate($message) . '</p>';
            }
            switch ($key){
                case 'warning':
                    $html = '<div data-alert class="alert-box warn" role="alert">';
                    break;                
                case 'error':
                    $html = '<div data-alert class="alert-box error" role="alert">';
                    break;
                case 'success':
                    $html = '<div data-alert class="alert-box success" role="alert">';
                    break;                    
                default:
                    $html = '<div data-alert class="alert-box secondary" role="alert">';
                    break;
            }
            $html .= $msg;
            if (true === $close){
                $html .= '<a href="#" class="close">&times;</a>';
            }
            $html .= '</div>';
            return $html;
        } else {
            return '';
        }
    }
}