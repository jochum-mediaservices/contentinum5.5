<?php
namespace Mcwork\Mapper\Assets;

use ContentinumComponents\Storage\StorageDirectory;

class Collections extends StorageDirectory
{

    public function __construct($storageManager)
    {
        $this->setStorage($storageManager);
    }

    public function fetchContent(array $params = null)
    {
        $file = null;
        if (isset($params['article']) && strlen($params['article']) > 1) {
            return new \Zend\Config\Config(include $this->getStorage()->getDocumentRoot() . DS . $this->getEntity()->getCurrentPath() . DS . $params['article'] . '.php', true);
        } else {
            return new \Zend\Config\Config(array());
        }
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
}