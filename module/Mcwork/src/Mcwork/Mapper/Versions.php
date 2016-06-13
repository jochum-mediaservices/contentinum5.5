<?php

namespace Mcwork\Mapper;

use ContentinumComponents\Mapper\Worker;
use Contentinum\Version\ContentinumVersion;
class Versions extends Worker
{
    /**
     * Content query
     * @param array $params query conditions
     * @return multitype:
     */
    public function fetchContent(array $params = null)
    {
        $version = new ContentinumVersion();
        $data = $version->getArray();
        $data['contentinum_version'] = $this->getSl()->get('contentinum_name');
        $data['notes'] = $version->getNotes();
        return $data;
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