<?php
namespace Contentinum\Mapper\Content;

use ContentinumComponents\Mapper\Worker;

class Feed extends Worker
{
    private $feed = array();

    /**
     * Content query
     * 
     * @param array $params query conditions
     * @return multitype:
     */
    public function fetchContent(array $params = null)
    {
        
        return $this->build($this->query($params['section']));
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
     * Build content array from query result
     * @param array $entries database result
     * @return multitype:multitype:string unknown multitype:multitype:string unknown
     */
    private function build($entries)
    {
    
        $result = array();
        if ($entries){
            $result['feed'] = $this->feed;
            $result['feedentries'] = $entries;
        }
        return $result;
    }    

    /**
     * Contribution group query
     * @param int $id
     */    
    private function query($id)
    {
       $newsgroup = $this->groupQuery($id);

       $orWhere = '';
       foreach ($newsgroup as $group){
           
           if ( strlen($orWhere) > 1  ){
               $orWhere .= ' OR ';
           }
           if (empty($this->feed)){
               $this->feed = $group;
           }
           $orWhere .= "main.web_contentgroup_id = '{$group['indexgroup_id']}'";
       }       
        
        if (null == $this->feed['feed_count']){
            $limit = 10;
        } else {
            $limit = (int) $this->feed['feed_count'];
        }
        $sql = "SELECT mainContent.id, mainContent.web_medias_id, mediaContent.media_link, mediaContent.media_sizes, ";
        $sql .= "mainContent.htmlwidgets, mainContent.source, mainContent.headline, DATE_FORMAT(mainContent.publish_date,'%Y/%m/%d') AS lnPublishDate, ";
        $sql .= "mainContent.content_teaser, mainContent.content, mainContent.number_character_teaser, ";
        $sql .= "mainContent.label_read_more, mainContent.publish_date, mainContent.up_date, mainContent.publish_author, ";
        $sql .= "mainContent.author_email, mainContent.overwrite, pageParams.url ";
        $sql .= "FROM web_content_groups AS main ";
        $sql .= "LEFT JOIN web_content AS mainContent ON mainContent.id = main.web_content_id ";
        $sql .= "LEFT JOIN web_medias AS mediaContent ON mediaContent.id = mainContent.web_medias_id ";
        $sql .= "LEFT JOIN web_pages_parameter AS pageParams ON pageParams.id = main.content_group_page ";
        $sql .= "WHERE ({$orWhere}) ";
        $sql .= "ORDER BY main.publish_date DESC ";
        $sql .= "LIMIT 0,{$limit} ";
        return $this->fetchAll($sql);
    } 
    
    /**
     *
     * @param unknown $id
     */
    private function groupQuery($id)
    {
        return $this->fetchAll("SELECT wcn.feed_title, wcn.feed_author, wcn.feed_authoremail, wcn.feed_authorinternet, wcn.feed_count, wcn.feed_url, main.indexgroup_id FROM web_content_indexgroup AS main LEFT JOIN web_content_namegroup AS wcn ON wcn.id = main.groups_id WHERE wcn.feed_url = '{$id}'");
    }    
}