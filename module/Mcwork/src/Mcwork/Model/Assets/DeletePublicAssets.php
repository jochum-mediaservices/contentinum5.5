<?php
namespace Mcwork\Model\Assets;

use Mcwork\Fs\Remove;
use ContentinumComponents\File\Name;

class DeletePublicAssets extends Remove
{

    const ASSET_PATH = '/public/assets/app';
    
    const ASSET_CACHE_PATH = '/data/cache/app/assets';

    /**
     *
     * @param array $params
     * @param string $posts
     */
    public function processRequest(array $params = null, $posts = null)
    {
        try {
            if (isset($posts['data']['current'])) {
                $this->setFsCurrent(str_replace('_', DS, $posts['data']['current']));
            }
            $messages = array();
            foreach ($posts['files'] as $row) {
                $id = $row['ident'];
                $this->setRemoveFsItems($row['name']);
                $this->remove();
                $this->delCacheFile($row['name']);
                $messages[$id] = $row['name'];
            }
            return array(
                'success' => $messages
            );
        } catch (\Exception $e) {
            return array(
                'error' => $e->getMessage()
            );
        }
    }
    
    /**
     * 
     * @param unknown $filename
     */
    protected function delCacheFile($filename)
    {
        try {
            $this->getStorage()->delete($this->getDocumentRoot() .  self::ASSET_CACHE_PATH . DS . 'lastmodifiedstamp' . Name::get($filename));
        } catch (\Exception $e){
            $e->getMessage();
        }
    }
}