<?php
namespace Mcwork\Mapper\Assets;

use ContentinumComponents\Storage\StorageDirectory;

class Files extends StorageDirectory
{

    public function __construct($storageManager)
    {
        $this->setStorage($storageManager);
    }

    public function fetchContent(array $params = null)
    {
        $cd = null;
        if (isset($params['article']) && strlen($params['article']) > 1) {
            $cd = $this->prepare($params['article']);
        }
        return $this->fetchAll($this->getEntity(), $cd);
    }

    /**
     *
     * @param array $params
     * @param string $posts
     */
    public function processRequest(array $params = null, $posts = null)
    {
        
        if ( isset($posts['dir']) ){
            return $this->fetchContent(array(
                'article' => $posts['dir']
            ));
        } else {
            return $this->fetchContent();            
        }
    }

    /**
     *
     * @param unknown $val
     */
    protected function prepare($val)
    {
        return str_replace('_', DS, $val);
    }
}