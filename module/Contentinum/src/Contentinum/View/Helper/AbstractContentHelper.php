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
namespace Contentinum\View\Helper;

use Zend\View\Helper\AbstractHelper;
use ContentinumComponents\Html\HtmlAttribute;

abstract class AbstractContentHelper extends AbstractHelper
{
    const VIEW_LAYOUT_KEY = 'contribution';
    /**
     * 
     * @var string
     */
    protected $layoutKey;
    
    /**
     * 
     * @var array
     */
    protected $convertparams;
    
    /**
     * 
     * @var array
     */
    protected $properties = array();
    
    
    
    protected function getLayoutKey()
    {
        if (null === $this->layoutKey){
            $this->layoutKey = $this->view->htmllayouts[$this->view->templateKey]->layoutkey;
        }
        return $this->layoutKey;
    }
    
    /**
     * @return the $convertparams
     */
    public function getConvertparams()
    {
        return $this->convertparams;
    }

	/**
     * @param multitype: $convertparams
     */
    public function setConvertparams($convertparams, $return = false)
    {
        if (strlen($convertparams) > 4) {
            $mcSerialize = new \ContentinumComponents\Tools\HandleSerializeDatabase();
            if (false === $return){
                $this->convertparams = $mcSerialize->execUnserialize($convertparams);
            } else {
                return $mcSerialize->execUnserialize($convertparams);
            }
        } else {
            if (false === $return){
                $this->convertparams = array();
            } else {
                return array();
            }
        }
    }

	/**
     * 
     * @param unknown $prop
     * @return boolean
     */
    protected function getProperty($prop)
    {
        if ( isset($this->properties[$prop]) ){
            return $this->{$prop};
        } else {
            return false;
        }
    }
    
    /**
     * 
     * @param unknown $prop
     * @param unknown $value
     * @return unknown|boolean
     */
    protected function setProperty($prop, $value)
    {
        if ( isset($this->properties[$prop]) ){
            return $this->{$prop} = $value;
        } else {
            return false;
        }
    } 

    /**
     * 
     */
    protected function unsetProperties()
    {
        foreach ($this->properties as $prop) {
            $this->{$prop} = null;
        }
    }    
    
    /**
     * 
     * @param unknown $prop
     * @param unknown $key
     * @param unknown $value
     * @return boolean
     */
    protected function setTemplateProperty($prop, $key, $value)
    {
        if (isset($this->{$prop}[$key])) {
            $this->{$prop}[$key] = $value;
        } else {
            return false;
        }
    }    
    
    /**
     *
     * @param unknown $prop
     * @param unknown $key
     * @return boolean
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
     * 
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
     * Get template as array
     * @return multitype:NULL
     */
    protected function getTemplate()
    {
        $template = array();
        foreach ($this->properties as $key){
            $template['key'] = $this->{$key};
        }
        return $template;
    }
    
    /**
     * Format a content row
     * @param unknown $pattern
     * @param unknown $content
     * @param string $beforeGrid
     */
    /**
     * Format a content row
     * @param unknown $pattern
     * @param unknown $content
     * @param string $beforeGrid
     */
    protected function deployRow($pattern, $content, $beforeGrid = '')
    {
        $html = '';
        if (null !== $pattern){
            if (! is_array($pattern)){
                $pattern = $pattern->toArray();
            }
            $html .= $beforeGrid;
            if (isset($pattern['grid'])){
                if (isset($pattern['grid']['format'])){
                    $content = $this->formatContent($pattern['grid']['format'], $content);
                }
                
                $attr = array();
                
                if (isset($pattern['grid']['attr']) && !empty($pattern['grid']['attr'])){
                    $attr = $pattern['grid']['attr'];
                    if ( isset($pattern['grid']['label']) ){
                        if ('content' == $pattern['grid']['label']){
                            $href = '';
                        }
                    } else {
                        $href = $content; 
                    }
                    $attr = $this->deployAttrHref($attr, $href);
                }
                $before = '';
                $after = '';
                if (isset($pattern['grid']['content:after'])){
                    $after = $pattern['grid']['content:after'];
                }  
                if (isset($pattern['grid']['content:before'])){
                    $before = $pattern['grid']['content:before'];
                }                              
                $html .= $this->view->contentelement($pattern['grid']['element'],$before . $content . $after ,$attr);
                if (isset($pattern['grid']['content:before:outside'])){
                    $html = $pattern['grid']['content:before:outside'] . $html;
                }
                if (isset($pattern['grid']['content:after:outside'])){
                    $html .= $pattern['grid']['content:after:outside'];
                }
                
            }
            
            if (isset($pattern['row'])){
                $attr = array();
                if (isset($pattern['row']['attr']) && !empty($pattern['row']['attr'])){
                    $attr = $pattern['row']['attr'];
                }
                $before = '';
                $after = '';
                if (isset($pattern['row']['content:after'])){
                    $after = $pattern['row']['content:after'];
                }  
                if (isset($pattern['row']['content:before'])){
                    $before = $pattern['row']['content:before'];
                }
                $html = $this->view->contentelement($pattern['row']['element'],$before . $html. $after,$attr);  
                if (isset($pattern['row']['content:after:outside'])){
                    $html .= $pattern['row']['content:after:outside'];
                }                              
            }
        }
        return $html;
    }
    
    /**
     * Register javascript files
     * @param array $files
     */
    protected function deployFiles($files)
    {
        foreach ($files as $index => $file){
            $this->view->inlinescript()->offsetSetFile($index,$file);
        }
    }
    
    /**
     * Configure href attribute set link
     * @param array $attr
     * @param string $content
     * @return string
     */
    protected function deployAttrHref($attr, $content)
    {
        if (isset($attr['href'])){
            $attr['href'] = $attr['href'] . $content;
        }
        return $attr;
    }

    /**
     * format or filter content
     * @param unknown $format
     * @param unknown $content
     * @return unknown
     */
    protected function formatContent($format, $content)
    {
        if (isset($format['dateFormat'])) {
            switch ($format['dateFormat']['attr']) {
                case 'LONG':
                    $content = $this->view->datetimeformat($content,'LONG');
                    break;                    
                case 'MEDIUM':
                    $content = $this->view->datetimeformat($content,'MEDIUM');
                    break;   
                case 'SHORT':
                    $content = $this->view->datetimeformat($content,'SHORT');
                    break;              
                case 'LONGLONG':
                    $content = $this->view->datetimeformat($content,'LONG') . ', ' . $this->view->datetimeformat($content, false,'SHORT') . ' Uhr';
                    break;
                case 'MEDIUMLONG':
                    $content = $this->view->datetimeformat($content,'MEDIUM') . ', ' . $this->view->datetimeformat($content, false,'SHORT') . ' Uhr';
                    break;
                case 'SHORTLONG':
                    $content = $this->view->datetimeformat($content,'SHORT') . ', ' . $this->view->datetimeformat($content, false,'SHORT') . ' Uhr';
                    break;
                case 'FULLLONG':
                    $content = $this->view->datetimeformat($content,'FULL') . ', ' . $this->view->datetimeformat($content, false,'SHORT') . ' Uhr';
                    break;
                case 'FULL':
                default:                    
                    $content = $this->view->datetimeformat($content,'FULL');
                    break;
            }
        }
        
        return $content;
    }
    
    /**
     * Check if a value is contained
     * @param array $array
     * @param string|number $index
     * @return string|boolean
     */
    protected function hasValue($array, $index)
    {
        if (isset($array[$index]) && null != $array[$index]) {
            return $array[$index];
        } else {
            return false;
        }
    }
    
    /**
     * Format element attributes
     * @param string $attr
     * @return array|string
     */
    protected function elementAttribute($attr)
    {
        $params = '';
        if (strlen($attr) > 1) {
            $rows = explode(';', $attr);
            foreach ($rows as $row) {
                $row = trim($row);
                if (strlen($row) > 1) {
                    $parts = explode(':', $row);
                    $params[$parts[0]] = $parts[1];
                }
            }
        }
    
        return $params;
    }    
    
    /**
     * 
     * @param array $array
     * @param integer $id
     * @param integer
     */
    protected function countArrayById($array, $id, $key = 'webContentgroup')
    {
        $i = 0;
        foreach ($array as $row){
            if ($id == $row->{$key}){
                $i++;
            }
        }
        return $i;
    }
    

    /**
     *
     * @param unknown $html
     * @param unknown $content
     */
    protected function formatElement($html, $content)
    {
        if (strlen($content->element) > 0) {
            $attr = '';
            switch ($content->element){
                case 'panel' :
                case 'flexvideo' :
                case 'flexwide':
                case 'flexvimeo':
                case 'column2':
                    $element = 'div';
                    break;
                 default:
                     $element = $content->element;
                     break;
            }
            if (strlen($content->elementAttribute) > 0) {
                $attribute = $this->elementAttribute($content->elementAttribute);
                $attr = HtmlAttribute::attributeArray($attribute);
            }
            $elmContent = '';
            if (strlen($content->elementContent) > 0) {
                $elmContent = $content->elementContent;
            }
            switch ($content->element){
                case 'flexvideo':
                case 'flexwide':
                case 'flexvimeo':
                case 'column2':
                    $html .= '<' . $element . $attr . '>' . $elmContent . '</' . $element . '>';
                    break;             
                default:
                    $html = '<' . $element . $attr . '>' . $html . $elmContent . '</' . $element . '>';
                    break;
            }
        }
        return $html;
    }    
    
}