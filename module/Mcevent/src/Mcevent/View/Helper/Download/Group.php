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
 * @category Mcevent
 * @package View
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 * @copyright Copyright (c) 2009-2013 jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 * @license http://www.opensource.org/licenses/bsd-license
 * @since contentinum version 5.0
 * @link      https://github.com/Mikel1961/contentinum-components
 * @version   1.0.0
 */
namespace Mcevent\View\Helper\Download;

use Mcevent\View\Helper\Event\Parameter;

class Group extends Parameter
{

    /**
     *
     * @param unknown $entries            
     * @param unknown $template            
     * @param unknown $media            
     */
    public function __invoke($entries, $template, $media)
    {
        $html = '';///mcevent/download/calendar
        if (is_array($entries['modulContent']) && !empty($entries['modulContent'])){
            $html .= '<p>Klicken Sie auf den Button zum Download der Kalenderdatei (ICS) oder ...</p>';
            $html .= '<p><a class="button" href="/mcevent/download/calendargroup/'.$entries['modulContent']['id'].'/';
            $html .= $entries['modulContent']['calc_key'] . '">Download ' . $entries['modulContent']['title'] . '</a></p>'; 
            $html .= '<p>... kopieren Sie sich den Link unten und abonnieren Sie den Kalender in Outlook etc.</p>';
            $html .= '<pre>'.$this->view->protocol.'://'.$this->view->host.'/mcevent/download/calendargroup/'.$entries['modulContent']['id'].'/'. $entries['modulContent']['calc_key'] .'</pre>';
        } else {
            $html .= '<p>Parameter konnten nicht ausgelesen werden.</p>';
        }
        return $html;
    }
}