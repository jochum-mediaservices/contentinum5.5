<?php

namespace Mcwork\Model\Logs;



use ContentinumComponents\Storage\StorageFiles;

class Clear extends StorageFiles
{
    /**
     * Success, warn messages
     * @var string
     */
    protected $message;
      
    
    /**
     *
     * @return the $message
     */
    public function getMessage()
    {
        return $this->message;
    }
    
    /**
     *
     * @param field_type $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }
    
    /**
     *
     * @param unknown $id
     * @return string
     */
    public function execute($id)
    {
        try {
            $this->clearfile($id);
            $this->setMessage('The cache was successfully cleared');
            return 'success';
        } catch (\Exception $e){
            $this->setMessage($e->getMessage());
            return 'warn';
        }
       
    }  
    
    /**
     * 
     * @param unknown $filename
     */
    public function clearfile($filename)
    {
        $entity = $this->getEntity();
        $src = CON_ROOT_PATH; //$this->getStorage()->getDocumentRoot();
        $src .= '/' . $entity->getCurrentPath();
        $src .= '/' . $filename;
        file_put_contents($src, '');
    }
}