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
class Slider extends AbstractContentHelper
{
    /**
     *
     * @var unknown
     */
    protected $gtype;
    
    /**
     *
     * @var unknown
     */
    protected $orbitwrapper;
    
    /**
     *
     * @var unknown
     */
    protected $wrapper;
    
    /**
     *
     * @var unknown
     */
    protected $elements;
    
    /**
     *
     * @var unknown
     */
    protected $link;
    
    /**
     *
     * @var unknown
     */
    protected $caption;
    
    /**
     *
     * @var unknown
     */
    protected $imgclass;
    
    /**
     *
     * @var unknown
     */
    protected $nextbtn;
    
    /**
     *
     * @var unknown
     */
    protected $prevbtn;
    
    /**
     *
     * @var unknown
     */
    protected $bulletwarpper;
    
    /**
     *
     * @var unknown
     */
    protected $bulletrow;
    
    /**
     *
     * @var unknown
     */
    protected $properties = array(
        'gtype',
        'orbitwrapper',
        'wrapper',
        'elements',
        'link',
        'caption',
        'imgclass',
        'nextbtn',
        'prevbtn',
        'bulletwarpper',
        'bulletrow',
    );    
    
    
    public function __invoke($content, $groupIdent, $template, $contentstyles, array $specified = null)
    {
        $this->setTemplate($template);
        $bulletrow = null;
        if (null !== $this->bulletrow){
            $bulletrow = $this->bulletrow;
        }
        $list = '';
        $bullets = '';
        $i = 0;   
        foreach ($content as $entry) {
            if ($groupIdent == $entry->webContentgroup) {
                
                if (null !== $bulletrow){
                    if (0 === $i){
                        $bulletrow['row']['attr']['class'] = 'is-active';
                    }
                    $bulletrow['row']['attr']['data-slide'] = $i;
                    $bullets .= $this->deployRow($bulletrow, 'Text');
                    if (0 === $i){
                        unset($bulletrow['row']['attr']['class']);
                    }
                }                
                $list .= $this->deployRow($this->elements, $this->view->contribution($entry->webContent, $contentstyles));
                
                
                $i++;
            }
        }
        
        $html = $this->deployRow($this->wrapper, $list);
        $nav = '';
        if (strlen($bullets) > 1){
            $nav = $this->deployRow($this->bulletwarpper, $bullets);
        }
        $html = $this->deployRow($this->orbitwrapper, $this->prevbtn . $this->nextbtn . $html . $nav);
        return $html;        
    }
}