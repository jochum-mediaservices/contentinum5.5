<?php
namespace Contentinum\Mapper\Content;







use ContentinumComponents\Mapper\Worker;
use Zend\I18n\Filter\Alnum;

class JsonPageContent extends Worker
{
    /**
     * Content query
     *
     * @param array $params query conditions
     * @return multitype:
     */
    public function fetchContent(array $params = null)
    {
        $filter = new Alnum();
        $scope = $filter->filter($params['section']);

        $sql = "SELECT wc.content FROM web_content AS wc ";
        $sql .= "LEFT JOIN web_content_groups AS wcg ON wcg.web_content_id = wc.id ";
        $sql .= "LEFT JOIN web_pages_content AS wpc ON wpc.web_contentgroup_id = wcg.id ";
        $sql .= "LEFT JOIN web_pages_parameter AS wpp ON wpp.id = wpc.web_pages_id ";
        $sql .= "WHERE wpp.scope = '{$scope}'";
        $sql .= "ORDER BY wpc.item_rang, wcg.item_rang ";
        
        return $this->fetchAll($sql);
        
    }
    
    /**
     *
     * @param array $params
     * @param string $posts
     */
    public function processRequest(array $params = null, $posts = null)
    {
        if (is_array($posts)){
            $params = array_merge($params,$posts);
        }
        return $this->fetchContent($params);
    }    
}