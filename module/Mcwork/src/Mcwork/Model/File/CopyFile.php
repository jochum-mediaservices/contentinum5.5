<?php
namespace Mcwork\Model\File;


use ContentinumComponents\Filter\Url\Prepare;
use ContentinumComponents\File\Extension;
use Mcwork\Files\Copy;

class CopyFile extends Copy
{

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
            if (isset($posts['data']['entity'])){
                $this->setEntity($this->getSl()->get($posts['data']['entity']));
            }
            if (isset($posts['data']['current'])){
                $this->setPath(DS . $this->getEntity()->getCurrentPath() . DS . str_replace('_', DS , $posts['data']['current']));
            } else {
                $this->setPath(DS . $this->getEntity()->getCurrentPath());
            }
            $filename = $posts['data']['filename'];
            if (isset($posts['data']['fileextension'])){
                if ($posts['data']['fileextension'] !== Extension::get($posts['data']['filename'])){
                    $filename = $posts['data']['filename'] . '.' . $posts['data']['fileextension'];
                }       
            }
            $filter = new Prepare();
            $this->setDestination( $this->getPath() . DS . $filename);
            if (! is_file($this->getStorage()->getDocumentRoot() . $this->getDestination())) {
                if (is_writable($this->getStorage()->getDocumentRoot() .  $this->getPath())) {
                    $this->setDestination($this->getStorage()->getDocumentRoot()  . $this->getDestination());
                    $this->setFile($posts['data']['ident']);
                    $this->copy();
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
                    'warn' => 'file_exist'
                );
            }
        } catch (\Exception $e) {
            return array(
                'error' => $e->getMessage()
            );
        }
    }
}