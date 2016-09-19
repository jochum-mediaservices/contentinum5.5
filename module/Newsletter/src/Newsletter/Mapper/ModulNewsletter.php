<?php
namespace Newsletter\Mapper;

use Contentinum\Mapper\AbstractModuls;

class ModulNewsletter extends AbstractModuls
{

    public function fetchContent(array $params = null)
    {
        return $this->query($this->configure['modulParams']);
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
     */
    private function query($ident = null)
    {
        return array();
    }
}