<?php
namespace Mcwork\Model\Assets;

use Mcwork\Fs\Copy;
use ContentinumComponents\Filter\Url\Prepare;

class CopyFiles extends Copy
{

    const ASSET_PATH = '/data/assets';

    
    const COLLECTION_PATH = '/data/assets/collections';
    /**
     *
     * @var unknown
     */
    private $current = '';

    /**
     *
     * @return the $current
     */
    public function getCurrent()
    {
        return $this->current;
    }

    /**
     *
     * @param unknown $current
     */
    public function setCurrent($current)
    {
        $this->current = $current;
    }

    /**
     *
     * @param array $params
     * @param string $posts
     */
    public function processRequest(array $params = null, $posts = null)
    {

        try {
            if (isset($posts['data']['current'])){
                $this->setCurrent(str_replace('_', DS , $posts['data']['current']));
            }
            $filter = new Prepare();
            $foldername = $filter->filter($posts['data']['foldername']);
            $this->setDestination($this->getCurrent() . $foldername);
            if (! is_dir($this->getStorage()->getDocumentRoot() . self::ASSET_PATH . DS . $this->getDestination())) {
                if (is_writable($this->getStorage()->getDocumentRoot() . self::ASSET_PATH . DS . $this->getCurrent())) {
                    $this->makeDirectory($this->getDestination());
                    $this->setDestination(self::ASSET_PATH . DS . $this->getDestination());
                    $this->setFsCurrent($this->getCurrent() . $posts['data']['ident']);
                    $this->readAndCopy();
                    if ( strlen($posts['data']['makecollection']) >= 2 ){ 
                        $this->createAssetCollection($posts['data']['makecollection'],$posts['data']['ident']);
                    }
                    return array(
                        'success' => true
                    );
                } else {
                    return array(
                        'error' => 'no_write_permissions'
                    );
                }
            } else {
                return array(
                    'warn' => 'folder_name_exist'
                );
            }
        } catch (\Exception $e) {
            return array(
                'error' => $e->getMessage()
            );
        }
    }

    /**
     * Read asset directory content and copy this
     */
    protected function readAndCopy()
    {
        foreach (scandir($this->getStorage()->getDocumentRoot() . self::ASSET_PATH . DS . $this->getFsCurrent()) as $entry) {
            if ('.' != $entry && '..' != $entry) {
                $this->setCopyItems($entry);
                $this->copy();
            }
        }
        return true;
    }
    
    
    /**
     * Create template
     * @param unknown $name
     */
    protected function createAssetCollection($name, $current)
    {
        $dir = CON_ROOT_PATH . self::COLLECTION_PATH;
        foreach (scandir($dir) as $file) {
            if ('.' != $file && '..' != $file) {
                if(strpos($file,$current)!==false){
                    $filecontent = file_get_contents($dir . DS . $file);
                    file_put_contents($dir . DS . str_replace($current, $name, $file), str_replace($current, $name, $filecontent));
                }            
            }
        }
        return true;
    }    
    
    /**
     * Create template
     * @param unknown $name
     */
    protected function createAssetTemplate($name)
    {
        
        $worker = new \Mcwork\Model\Assets\Collection( $this->getSl()->get('contentinum_files_storage_manager') );
        $worker->setEntity(new \Mcwork\Entity\AssetCollections());
        $worker->create($name);
        
    }
}