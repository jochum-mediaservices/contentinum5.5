<?php
namespace Mcwork\Model\Assets;


use ContentinumComponents\Filter\Url\Prepare;
use Mcwork\Files\Copy;
use ContentinumComponents\File\Extension;

class CopyFile extends Copy
{

    const ASSET_PATH = '/data/assets';

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
                $this->setPath(self::ASSET_PATH . DS . str_replace('_', DS , $posts['data']['current']));
            }
            $filter = new Prepare();
            
            if ('php' !== Extension::get($posts['data']['filename'])){
                $filename = $posts['data']['filename'] . '.php';
            } else {
                $filename = $posts['data']['filename'];
            }
            $this->setDestination( $this->getPath() . DS . $filename);
            if (! is_file($this->getStorage()->getDocumentRoot() . DS . $this->getDestination())) {
                if (is_writable($this->getStorage()->getDocumentRoot() . DS .  $this->getPath())) {
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