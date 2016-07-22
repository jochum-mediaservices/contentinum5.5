<?php
namespace Mcwork\Mapper\Files;

use ContentinumComponents\Storage\StorageFiles;

class LogsContent extends StorageFiles
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
        $file = array();
        
        if (isset($params['category']) && strlen($params['category']) > 1) {
            $file['name'] = $params['category'];
            $entity = $this->getEntity();
            $file['content'] = $this->fetchFileContent('/' . $entity->getCurrentPath(), $params['category']);
        } else {
            $file['name'] = '?';
            $file['content'] = 'not found';
        }
        return $file;
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