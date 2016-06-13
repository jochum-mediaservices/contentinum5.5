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
 * @package Mapper
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 * @copyright Copyright (c) 2009-2013 jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 * @license http://www.opensource.org/licenses/bsd-license
 * @since contentinum version 5.0
 * @link      https://github.com/Mikel1961/contentinum-components
 * @version   1.0.0
 */
namespace Contentinum\Mapper;

/**
 * Mapper
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class ModulNavigation extends AbstractModuls
{
    const ENTITY_NAME = 'Contentinum\Entity\WebNavigationTree';
    
    const TABLE_NAME = 'web_navigation_tree';
    
    const CONTENTINUM_CACHE = 'contentinum_cache_public';
    
    /**
     * Navigation level
     * @var integer
     */
    private $level = 0;
    
    /**
     * Counter loop
     * @var interger
     */
    private $currentlevel = 0;
    
    /**
     * Set level
     */
    public function setLevel()
    {
        if (isset($this->configure['modulDisplay']) && $this->configure['modulDisplay'] > '0'){
            if (is_numeric($this->configure['modulDisplay'])){
                $this->level = (int) $this->configure['modulDisplay'];
            } else {
                $this->level = 9999;
            }
        } else {
            $this->level = 9999;
        }
    }

    /**
     * (non-PHPdoc)
     * 
     * @see \Contentinum\Mapper\AbstractModuls::fetchContent()
     */
    public function fetchContent(array $params = null)
    {
        $cache = $this->getSl()->get(static::CONTENTINUM_CACHE);
        $cachekey = 'navigation' . $this->configure['modulParams'];  
        $toArray = true;
        if (! ($result = $cache->getItem($cachekey))) {
            $toArray = false;
            $this->setLevel();
            if ('topbar' === $this->key){
                $result = $this->build($this->query($this->configure['modulParams']));
            } elseif ('topbar6' === $this->key){
                $result = $this->build($this->query($this->configure['modulParams']));
            } elseif ('multilevel' === $this->key){
                $result = $this->multilevel($this->query($this->configure['modulParams']));
            } else {
                $nav = $this->build($this->query($this->configure['modulParams']));
                if ('displayheadline' === $this->configure['modulConfig']) {
                    $headline = $this->fetchRow("SELECT * FROM web_navigations WHERE id = '{$this->configure['modulParams']}'");
                    $result['headline'] = $headline['headline'];
                    $result['tags'] = $headline['tags'];
                }
                $result['nav'] = $nav;
    
            }
            if (true === $this->getSl()->get('contentinum_cache_navigation')){
                $cache->setItem($cachekey, $result);
            }
        }
        if (true === $toArray){
            //$result = $result->toArray();
        }
        
        return $result;        
    }
    
    /**
     * 
     * @param unknown $entries
     * @return multitype:multitype:string unknown multitype:multitype:string unknown
     */
    private function build($entries)
    {
        $this->currentlevel = $this->currentlevel + 1;
        $nav = array();
        foreach ($entries as $entry){
            $page = array();
            $page['label'] = $entry['label'];
            if (null != $entry['alternate_labelname']){
                $page['label'] = $entry['alternate_labelname'];
            }
            if ('#' == $entry['url']){
                $uri = '#';
                if (strlen($entry['class_link']) > 1){
                    $entry['class_link'] .= ' onlylink';
                } else {
                    $entry['class_link'] = 'onlylink';
                }
            } elseif ('_link' == $entry['scope']){
                $uri = $entry['url'];
            } elseif ('index' == $entry['url']){
                $uri = '/';
            } else {
                $uri = '/' . $entry['url'];
            }
            
            //if ($entry['url'] == $this->getUrl()){
                //$page['active'] = 1;
            //}   
            
            if ( $entry['target_link'] > '0' ){
                $page['target'] = $entry['target_link'];
            }
            
            $page['aIdent'] = $this->currentlevel;
            $page['uri'] = $uri;
            $page['resource'] = $entry['resource'];
            $page['listIdent'] = $entry['dom_id'];
            $page['listClass'] = $entry['style_class'];
            $page['aClass'] = $entry['class_link'];
            $page['aData'] = $entry['data_link'];
        
            if ($entry['parent_from'] > '0' && $this->currentlevel <= $this->level){
                if (null !== ($pages = $this->build($this->query($entry['parent_from'])))) {
                    if ('topbar' === $this->key){
                        $listStyle = (null != $entry['style_class']) ? ' ' .  $entry['style_class'] : '';
                        $page['listClass'] = 'has-dropdown' . $listStyle;
                        $page['subUlClass'] = 'dropdown';
                        $page['pages'] = $pages;
                    } elseif ('topbar6' === $this->key){   
                        $listStyle = (null != $entry['style_class']) ? ' ' .  $entry['style_class'] : '';
                        $page['listClass'] = 'has-submenu' . $listStyle;
                        $page['subUlClass'] = 'submenu menu vertical';
                        $page['subUlAttribute'] = array('data-submenu' => 'data-submenu');
                        $page['pages'] = $pages;                      
                    } else {
                        if (! empty($pages)){
                            $listStyle = (null != $entry['style_class']) ? ' ' .  $entry['style_class'] : '';
                            $page['listClass'] = 'navigation-list-has-dropdown' . $listStyle;
                            $page['listSubIdent'] = $this->currentlevel;
                            $page['subUlClass'] = 'navigation-list-dropdown';                        
                            $page['pages'] = $pages;
                        }
                    }
                }
            }
            $nav[] = $page;
        }
  
        return $nav;        
        
    }  
    


    
    private function multilevel($entries)
    {
        $this->currentlevel = $this->currentlevel + 1;
        $nav = array();
        foreach ($entries as $entry){
            $page = array();
            $page['label'] = $entry['label'];
            if (null != $entry['alternate_labelname']){
                $page['label'] = $entry['alternate_labelname'];
            }
    
            if ('#' == $entry['url']){
                $uri = '#';
            } elseif ('_link' == $entry['scope']){
                $uri = $entry['url'];
            } elseif ('index' == $entry['url']){
                $uri = '/';
            } else {
                $uri = '/' . $entry['url'];
            }
       
            if ($entry['url'] == $this->getUrl()){
                $page['active'] = 1;
            }
            
            $page['aIdent'] = $this->currentlevel;
            $page['uri'] = $uri;
            $page['resource'] = $entry['resource'];
            $page['listIdent'] = $entry['dom_id'];
            $page['listClass'] = $entry['style_class'];
            $page['aData'] = $entry['data_link'];
    
            if ($entry['parent_from'] > '0' && $this->currentlevel <= $this->level){
                if (null !== ($pages = $this->build($this->query($entry['parent_from'])))) {
                        if (! empty($pages)){
                            $page['listSubIdent'] = $this->currentlevel;
                            $page['pages'] = $pages;
                        }
                }
            }
            $nav[] = $page;
        }
    
        return $nav;
    
    }    
    
    /**
     * 
     * @param unknown $id
     */
    private function query($id)
    {
        $sql = "SELECT main.id, main.rel_link, main.alternate_labelname, main.target_link, main.class_link, ";
        $sql .= "main.data_link, main.resource, main.parent_from, main.dom_id, main.style_class, ";
        $sql .= "wpp.label, wpp.url, wpp.scope ";
        $sql .= "FROM web_navigation_tree AS main ";
        $sql .= "LEFT JOIN web_pages_parameter AS wpp ON wpp.id = main.web_pages_id ";
        $sql .= "WHERE main.publish = 'yes' ";
        $sql .= "AND wpp.publish = 'yes' ";
        $sql .= "AND main.web_navigation_id = '".$id."' ";
        $sql .= "ORDER BY main.item_rang";
        return $this->fetchAll($sql);
    }
    
}