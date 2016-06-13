<?php
namespace Mcwork\Model\Files;

use ContentinumComponents\Mapper\Worker;




class Delete extends Worker
{
    
    
    /**
     * Content query
     *
     * @param array $params query conditions
     * @return multitype:
     */
    public function fetchContent(array $params = null)
    {
        
        
        if ( isset($params['files']) ){
            $storage = $this->getSl()->get('contentinum_files_storage_manager');
            $messages = array();
            foreach ($params['files'] as $files){
                $id = $files['ident'];
                if (empty($this->isUse($id))){
                    $entity = $this->find($id,true);
                    $mediaSource = $entity->mediaSource;
                    $mediaName = $entity->mediaName;
                    $storage->delete($storage->getDocumentRoot() . $mediaSource);
                    $this->removeTags($id);
                    $this->deleteEntry($entity, $id); 
                    $messages[$id] = $mediaName;
                } else {
                    $messages['warn'][$id] = $files['name'];
                }
            }
            return array(
                'success' => $messages
            );            
        } else {
            return array(
                'error' => 'miss_paramter'
            );
        }
        

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
    
    
    protected function isUse($id)
    {
        return $this->fetchAll("SELECT * FROM mediainuse WHERE mediasid = {$id}");
    }
    
    protected function removeTags($id)
    {
        return $this->executeQuery("DELETE FROM web_tags_assign WHERE web_item_id = {$id}");
    }
    
}