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
 * @package View
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 * @copyright Copyright (c) 2009-2013 jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 * @license http://www.opensource.org/licenses/bsd-license
 * @since contentinum version 5.0
 * @link      https://github.com/Mikel1961/contentinum-components
 * @version   1.0.0
 */
namespace Contentinum\View\Helper\Medias;



use Contentinum\View\Helper\AbstractContentHelper;
class Blockgrid extends AbstractContentHelper
{

    const VIEW_TEMPLATE = 'mediablockgrid';
    
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
    
    
    public function __invoke($entries, $template, $media)
    {
        $templateKey = static::VIEW_TEMPLATE;
        if (isset($entries['modulFormat'])){
            $templateKey = $entries['modulFormat'];
        }
        $this->setTemplate($template->plugins->$templateKey);
        
        $imgClass = '';
        if (null !== $this->imgclass){
            $imgClass = ' ' . $this->imgclass;
        }
        $bulletrow = null;
        if (null !== $this->bulletrow && 'orbitslider6' === $this->gtype && 'no' !== $entries['modulDisplay']){
            $bulletrow = $this->bulletrow->toArray();
        }
        $list = '';
        $bullets = '';
        $i = 0;
        foreach ($entries['modulContent'] as $media => $entryRow) {
            
            
            if (null !== $bulletrow){
                if (0 === $i){
                    $bulletrow['row']['attr']['class'] = 'is-active';
                }
                $bulletrow['row']['attr']['data-slide'] = $i;
                $bullets .= $this->deployRow($bulletrow, $entryRow['attr']['alt']);
                if (0 === $i){
                    unset($bulletrow['row']['attr']['class']);
                }                
            }

            $img = '<img'.$imgClass.' src="' . $media . '" alt="' . $entryRow['attr']['alt'] . '" />';
            if (null === $this->link && 'orbitslider6' !== $this->gtype) {
                if ( strlen($entryRow['mediaLinkUrl']) > 1 ){
                    $target = '';
                    if ($entryRow['targetLink'] > '0'){
                        $target = ' target="' . $entryRow['targetLink'] . '"';
                    }
                    $img = '<a href="'.$entryRow['mediaLinkUrl'].'"'.$target.'>' . $img . '</a>';
                }
            }
            $title = $entryRow['attr']['alt'];
            if (isset($entryRow['caption'])) {
                $title = $entryRow['caption'];
                if ($this->caption) {

                    if ( strlen($entryRow['mediaLinkUrl']) > 1  && 'lightbox' !== $this->gtype){
                        $captionStyles = $this->caption->toArray();
                        $caption = $entryRow['caption'];
                        if ('a' === $captionStyles['grid']['element']){
                            $captionStyles['grid']['attr']['href'] = $entryRow['mediaLinkUrl'];
                            if ($entryRow['targetLink'] > '0'){
                                $captionStyles['grid']['attr']['target'] =  $entryRow['targetLink'];
                            }                            
                        } else {
                            if ($entryRow['targetLink'] > '0'){
                                $target = ' target="' . $entryRow['targetLink'] . '"';
                            }
                            $caption = '<a href="'.$entryRow['mediaLinkUrl'].'"'.$target.'>' . $caption . '</a>';                            
                        }
                        $img .= $this->deployRow($captionStyles, $caption);
                    } else {
                        $img .= $this->deployRow($this->caption, $entryRow['caption']);
                    }
                   
                }
            }
        
            if ($this->link) {
                $link = $this->link->toArray();
                $link['grid']['attr']['title'] = $title;
                $link['grid']['attr']['data-groupname'] = $entryRow['name'];
                $link['grid']['attr']['href'] = $media;
                $list .= $this->deployRow($this->elements, $this->deployRow($link, $img) );
            } else {
                if ('orbitslider6' === $this->gtype && 0 === $i){
                    $elements = $this->elements->toArray();
                    $elements[ 'row']['attr']['class'] = 'is-active ' . $elements[ 'row']['attr']['class'];
                    $list .= $this->deployRow($elements, $img );
                } else {
                    $list .= $this->deployRow($this->elements, $img );
                }
            }
            
            $i++;
        }

        $html = $this->deployRow($this->wrapper, $list);  
        
        if ('orbitslider6' === $this->gtype){
            $nav = '';
            if (strlen($bullets) > 1){
                $nav = $this->deployRow($this->bulletwarpper, $bullets);
            }
            $html = $this->deployRow($this->orbitwrapper, $this->prevbtn . $this->nextbtn . $html . $nav); 
        }
        
        
        $this->unsetProperties();
        return $html;
    }
}