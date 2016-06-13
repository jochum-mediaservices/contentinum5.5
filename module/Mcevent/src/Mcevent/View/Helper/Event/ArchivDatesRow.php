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
namespace Mcevent\View\Helper\Event;

use Zend\View\Helper\AbstractHelper;
use ContentinumComponents\Html\HtmlAttribute;


class ArchivDatesRow extends AbstractHelper
{
    /**
     * 
     * @var array
     */
    private $list = array('element' => 'ul', 'attr' => array('class' => 'event-archive-list'));
    
    /**
     *
     * @var unknown
     */
    private $row = array('element' => 'ul', array('class' => 'event-archive-sublist'));
    
    /**
     *
     * @var unknown
     */
    private $grid = array('element' => 'li', 'attr' => array('class' => 'event-archive-list-item'));
    
    /**
     *
     * @var unknown
     */
    private $media;
    
    /**
     *
     * @var unknown
     */
    private $content;
    
    /**
     *
     * @var unknown
     */
    private $properties = array(
        'list',
        'row',
        'grid',
        'media',
        'content'
    );

    private $monthsname = array(
        '01' => 'Januar',
        '02' => 'Februar',
        '03' => 'März',
        '04' => 'April',
        '05' => 'Mai',
        '06' => 'Juni',
        '07' => 'Juli',
        '08' => 'August',
        '09' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Dezember'
    );

    /**
     * Build archive list
     * @param array $content
     * @param unknown $medias
     * @param array $template
     * @return Ambigous <string, multitype:>
     */
    public function __invoke($entries, $medias, $template = null)
    {
        
        $row = $this->getTemplateProperty('list', 'element');
        $html = '';
        $html .= '<' . $row;
        if (false !== ($attr = $this->getTemplateProperty('list', 'attr')) ){
            $html .= HtmlAttribute::attributeArray($attr);
            $attr = false;
        }
        $html .= '>';
	    $html .= $this->listitems($entries['modulContent']);
        $html .= '</' . $row . '>';
        return $html;
        
    }
    
    /**
     * List years
     * @param array $entries
     * @return string html
     */
    protected function listitems($entries)
    {
        $grid = $this->getTemplateProperty('grid', 'element');
        $row = $this->getTemplateProperty('row', 'element');
        $html = '';
        foreach ($entries as $year => $url){
            $html .= '<' . $grid;
            $attr = array();
            $html .= HtmlAttribute::attributeArray($attr);
            $html .= '><a class="getArchivEvent" ';
            $attr = array();
            $attr['href'] = '/' . $url . '/archive/' . $year;
            $html .= HtmlAttribute::attributeArray($attr);
            $html .= '>' . $this->view->translate('Year') . ' ' . $year . '</a>'; 
            $html .= '</' . $grid . '>'; 
        }
        return $html;
    }
    
    
    /**
     * Assign a template
     * @param unknown $row
     * @param unknown $template
     */
    protected function assignTemplate($row, $template)
    {
        if (isset($row['htmlwidgets'])) {
            if (isset($template[$row['htmlwidgets']])) {
                $this->setTemplate($template[$row['htmlwidgets']]->toArray());
            } else {
                $this->unsetProperties();
            }
        }
    }
    
    /**
     * Get a template property
     * @param string $prop
     * @param string $key
     * @return boolean|array
     */
    protected function getTemplateProperty($prop, $key)
    {
        if (isset($this->{$prop}[$key])) {
            return $this->{$prop}[$key];
        } else {
            return false;
        }
    }
    
    /**
     * Set template properties
     * @param unknown $template
     */
    protected function setTemplate($template)
    {
        if (null !== $template) {
    
            foreach ($template as $key => $values) {
                if (in_array($key, $this->properties)) {
                    $this->{$key} = $values;
                }
            }
        }
    }
    
    /**
     * unset properties
     */
    protected function unsetProperties()
    {
        foreach ($this->properties as $prop) {
            $this->{$prop} = null;
        }
    }    
}