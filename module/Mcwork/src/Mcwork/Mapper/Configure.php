<?php

namespace Mcwork\Mapper;


use ContentinumComponents\Mapper\Worker;

class Configure extends Worker
{
    /**
     * Content query
     * @param array $params query conditions
     * @return multitype:
     */
    public function fetchContent(array $params = null)
    {
        return array();
    }   
    
    /**
     * 
     * @param array $params
     * @param string $posts
     */
    public function processRequest(array $params = null, $posts = null)
    { 
        if ( $this->getSl()->has($posts['service']) ){
            $result = $this->getSl()->get($posts['service']);
            if (is_object($result)){
                return $result->toArray();
            } else {
                return $result;
            }
        } else {
            return array('error' => 'Service not found or there were no parameters passed');
        }
    }
}