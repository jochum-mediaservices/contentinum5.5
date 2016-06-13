<?php

namespace Contentinum\Mapper\Content;



use ContentinumComponents\Mapper\Worker;
class Recommendation extends Worker
{
    /**
     * Content query
     * @param array $params query conditions
     * @return multitype:
     */
    public function fetchContent(array $params = null)
    {
        
        $sql = "SELECT wpp.url, main.id, main.source, main.headline, DATE_FORMAT(main.publish_date,'%Y/%m/%d') AS lnPublishDate FROM web_content AS main ";
        $sql .= "LEFT JOIN web_content_groups AS wcg ON wcg.web_content_id = main.id ";
        $sql .= "LEFT JOIN web_pages_parameter AS wpp ON wpp.id = wcg.content_group_page ";
        $sql .= "WHERE main.id = " . $params['section'] . ";";
        
        return $this->fetchRow($sql);
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