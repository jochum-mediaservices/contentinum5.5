<?php
namespace Contentinum\Mapper\Sitemap;

use ContentinumComponents\Mapper\Worker;

class SitemapIndex extends Worker
{
    /**
     * Navigation level
     * @var integer
     */
    private $level = 9999;
    
    /**
     * Counter loop
     * @var interger
     */
    private $currentlevel = 0;
    
    /**
     *
     * @var unknown
     */
    private $rang = 2;
    
    /**
     *
     * @var unknown
     */
    private $nav = array();    
    
    /**
     * Content query
     *
     * @param array $params query conditions
     * @return multitype:
     */
    public function fetchContent(array $params = null)
    {
        $navs = $this->fetchSitemapTrees();
        foreach ($navs as $nav){
            $this->build($this->query($nav['id']));
        }
        ksort($this->nav);
        return $this->nav;
    }   
    

    /**
     *
     * @param array $params
     * @param string $posts
     */
    public function processRequest(array $params = null, $posts = null)
    {
        if (is_array($posts)) {
            $params = array_merge($params, $posts);
        }
        return $this->fetchContent($params);
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
            $this->format($entry);
            if ($entry['parent_from'] > '0' && $this->currentlevel <= $this->level){
                $this->build($this->query($entry['parent_from']));
            }
        }
    }
    
    /**
     *
     * @param unknown $entry
     */
    private function format($entry)
    {
        if ('#' !== $entry['url']){
            $page = array();
            $page['label'] = $entry['label'];
            $page['lastmod'] = $entry['lastmod'];
            $page['changefreq'] = $entry['changefreq'];
            $page['priority'] = $entry['priority'];
    
            if ('index' == $entry['url']){
                $uri = '/';
                $i = 1;
            } else {
                $uri = '/' . $entry['url'];
                $this->rang++;
                $i = $this->rang;
            }
    
            $page['uri'] = $uri;
            $page['resource'] = $entry['resource'];
            $this->nav[$i] = $page;
        }
    }
    
    /**
     *
     * @param unknown $id
     */
    private function query($id)
    {
        return $this->fetchAll($this->queryString($id));
    }
    
    /**
     *
     * @param int $id
     * @return string
     */
    private function queryString($id)
    {
        $sql = "SELECT main.rel_link, main.target_link, main.resource, main.parent_from, ";
        $sql .= "wpp.label, wpp.url, DATE_FORMAT(wpp.up_date,'%Y-%m-%d') AS lastmod, wpp.changefreq, wpp.priority ";
        $sql .= "FROM web_navigation_tree AS main ";
        $sql .= "LEFT JOIN web_pages_parameter AS wpp ON wpp.id = main.web_pages_id ";
        $sql .= "WHERE main.publish = 'yes' ";
        $sql .= "AND wpp.publish = 'yes' ";
        $sql .= "AND main.web_navigation_id = '".$id."' ";
        $sql .= "ORDER BY main.item_rang";
        return $sql;
    }
    
    /**
     *
     * @return Ambigous <\ContentinumComponents\Mapper\multitype:, multitype:>
     */
    private function fetchSitemapTrees()
    {
        return $this->fetchAll("SELECT id FROM web_navigations WHERE sitemap = 'yes'");
    }    
}