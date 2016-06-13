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
 * @category contentinum components
 * @package View
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 * @copyright Copyright (c) 2009-2013 jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 * @license http://www.opensource.org/licenses/bsd-license
 * @since contentinum version 5.0
 * @link      https://github.com/Mikel1961/contentinum-components
 * @version   1.0.0
 */
namespace Contentinum\View\Helper\News\Tags;

use Contentinum\View\Helper\AbstractContentHelper;

class Assigns extends AbstractContentHelper
{
    
    const VIEW_TEMPLATE = 'blogtags';
    
    /**
     *
     * @var string
     */
    protected $headline;
    
    /**
     *
     * @var string
     */
    protected $linktitle;    
    
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
    protected $format;   
    
    
    /**
     *
     * @var unknown
     */
    protected $properties = array(
        'headline',
        'linktitle',        
        'wrapper',
        'elements',
        'format',
    );    
    
    /**
     * 
     * @param unknown $entries
     * @param unknown $template
     * @param unknown $media
     */
    public function __invoke($entries, $template, $media)
    {
        $templateKey = static::VIEW_TEMPLATE;
        if (isset($entries['modulFormat'])){
            $templateKey = $entries['modulFormat'];
        }
        $this->setTemplate($template->plugins->$templateKey);
        $active = false;
        if ( strlen($this->view->paramter['article']) > 1  ){
            $active = $this->view->paramter['article'];
        }
        
        $html = '';
        $elements = $this->elements->toArray();
        foreach ($entries['modulContent'] as $entry){
            $elements = $this->elements->toArray();
            $elements["grid"]["attr"]['href'] = '/'. $entry['url'] . '/tag/' . $entry['tag_scope'];
            $elements["grid"]["attr"]['title'] = $this->linktitle . ' ' . $entry['tag_name'];
            if ($active === $entry['tag_scope']){
                $elements["grid"]["attr"]['class'] .= ' disabled';
            } 
            $html .= $this->deployRow($elements, $entry['tag_name']);
            $elements = null;
        }
        if (strlen($html) > 1){
            $wrapper = $this->wrapper->toArray();
            if (isset($wrapper['row'])){
                $wrapper['row']['content:before'] = '<h3>' . $this->headline . '</h3>';
            }
            $html = $this->deployRow($wrapper, $html);
        }
        return $html;
    }
}