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
 * @category Contentinum
 * @package View
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 * @copyright Copyright (c) 2009-2013 jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 * @license http://www.opensource.org/licenses/bsd-license
 * @since contentinum version 5.0
 * @link      https://github.com/Mikel1961/contentinum-components
 * @version   1.0.0
 */
namespace Contentinum\View\Helper\Styles;


use Contentinum\View\Helper\AbstractContentHelper;
use ContentinumComponents\Filter\Url\Prepare;
class Tabs6 extends AbstractContentHelper
{
    protected $tabsnav;
    
    protected $tabstitle;
    
    protected $tabscontent;
    
    protected $tabspanel;
    
    protected $active;
    
    protected $properties = array(
        'tabsnav',
        'tabstitle',
        'tabscontent',
        'tabspanel',
        'active'
    );  
    
    public function __invoke($content, $groupIdent, $template, $contentstyles, array $specified = null)
    {
        $this->setTemplate($template);
        $str = '';
        $i = 0;
        $html = '';
        $headercontent = array();
        $filter = new Prepare();
        $tabspanel = $this->tabspanel;
        foreach ($content as $entry) {
            if ($groupIdent == $entry->webContentgroup) {
                
                $panelId = $filter->filter($entry->webContent->title);
                if (0 === $i) {
                    $headercontent[] = '<a id="' . $panelId . '-label" href="#' . $panelId . '" role="tab" aria-selected="true" aria-controls="' . $panelId . '">' . $entry->webContent->title . '</a>';
                } else {
                    $headercontent[] = '<a id="' . $panelId . '-label" href="#' . $panelId . '" role="tab" aria-controls="' . $panelId . '">' . $entry->webContent->title . '</a>';
                } 
                
                //. '-label';
                if (0 === $i) {
                    $active = $this->tabspanel;
                    $active['grid']['attr']['class'] .= ' ' . $this->active;
                    $active['grid']['attr']['id'] = $panelId;
                    $active['grid']['attr']['aria-labelledby'] = $panelId . '-label';
                    $str .= $this->deployRow($active, $this->view->contribution($entry->webContent, $contentstyles));
                } else {
                    $tabspanel['grid']['attr']['id'] = $panelId;
                    $tabspanel['grid']['attr']['aria-labelledby'] = $panelId . '-label';
                    $str .= $this->deployRow($tabspanel, $this->view->contribution($entry->webContent, $contentstyles));
                }
                $i++;
            }
        }
        $tabstitle = $this->tabstitle;
        $i = 0;
        $navlist = '';
        foreach ($headercontent as $tbtitle){
            if (0 === $i){
                $tabstitle['grid']['attr']['class'] .= ' ' . $this->active;
                $navlist .= $this->deployRow($tabstitle, $tbtitle);
            } else {
                $navlist .= $this->deployRow($this->tabstitle, $tbtitle);
            }
            $i++;
        }
        
        $html .= $this->deployRow($this->tabsnav, $navlist);
        $html .= $this->deployRow($this->tabscontent, $str);
        return $html;
    }
}