<?php
namespace Mcwork\Mapper\Files;

use ContentinumComponents\Storage\StorageDirectory;

class LogsIndex extends StorageDirectory
{

    public function __construct($storageManager)
    {
        $this->setStorage($storageManager);
    }

    /**
     * 
     * @param array $params
     */
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
        return $this->fetchContent($params);
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