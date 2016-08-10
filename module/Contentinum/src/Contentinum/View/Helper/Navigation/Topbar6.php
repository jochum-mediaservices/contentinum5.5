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
namespace Contentinum\View\Helper\Navigation;

use Contentinum\View\Helper\AbstractContentHelper;

class Topbar6 extends AbstractContentHelper
{
    const VIEW_TEMPLATE = 'topbar6';
    /**
     * 
     * @var array
     */
    protected $titlebar;
    
    /**
     *
     * @var array
     */    
    protected $wrapper;
    
    /**
     *
     * @var array
     */    
    protected $titlewrapper;
    
    /**
     *
     * @var array
     */    
    protected $sitetitle;
    
    /**
     *
     * @var array
     */    
    protected $ulwrapper;
    
    /**
     *
     * @var array
     */    
    protected $ulclass;

    /**
     * 
     * @var unknown
     */
    protected $properties = array(
        'titlebar',
        'wrapper',
        'titlewrapper',
        'sitetitle',
        'ulwrapper',
        'ulclass'
    );

    /**
     *
     * @param array $content
     * @param unknown $medias
     * @param array $template
     * @return Ambigous <string, multitype:>
     */
    public function __invoke($entries, $template, $media)
    {
        $templateKey = static::VIEW_TEMPLATE;
        if (isset($entries['modulFormat'])) {
            $templateKey = $entries['modulFormat'];
        }
        $this->setTemplate($template->plugins->$templateKey);    
        
        $html = '';
        if (isset($entries['modulDisplay']) && strlen($entries['modulDisplay']) > 0){
            $label = $entries['modulDisplay'];
            if (isset($entries['modulConfig']) && strlen($entries['modulConfig']) > 0){
                $label = '<img src="' . $entries['modulConfig'] . '" alt="'.$label.'" />';
            }
            
            if (isset($entries['modulLink'])){
                $label = '<a href="'.$entries['modulLink'].'">'.$label.'</a>';
            }
            $html .= $this->deployRow($this->titlewrapper, $this->deployRow($this->sitetitle, $label));
        }
        $ulclass = $this->ulclass->toArray();
        $setUlClass = null;
        $attribute = array();
        if ( isset($ulclass['grid']['attr']['class']) ){
            $setUlClass = $ulclass['grid']['attr']['class'];
            unset($ulclass['grid']['attr']['class']);
        }
        if ( isset($ulclass['grid']['attr']) ){
            $attribute = $ulclass['grid']['attr'];
        }
        
        //print '<pre>';
        //var_dump($entries['modulContent']);exit();
        $container = new \Zend\Navigation\Navigation($entries['modulContent']);
        
        
        
        $topbar = $this->view->navigationcontentinum($container,$attribute)->setAcl($this->view->acl)->setRole($this->view->role)->setUlClass('menu');   
        $html .= $this->deployRow($this->ulwrapper, $topbar);
        $html = $this->deployRow($this->wrapper, $html);
        $titlebar = $this->deployRow($this->titlebar, 'Menu');
        return $titlebar . $html;
        
    }
}