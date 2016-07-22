<?php
namespace Mcwork\Mapper\Files;

use ContentinumComponents\Storage\StorageFiles;

class LogsDownload extends StorageFiles
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
            $file['filename'] = $params['category'];
            $entity = $this->getEntity();
            $src = $this->getStorage()->getDocumentRoot();
            $src .= '/' . $entity->getCurrentPath();
            $src .= '/' . $params['category'];
            $file['path'] = $src;
        } else {
            $file = false;
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