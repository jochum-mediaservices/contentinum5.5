<?php
namespace Mcwork\Model\Assets;


use ContentinumComponents\Filter\Url\Prepare;
use Mcwork\Files\Copy;
use ContentinumComponents\File\Extension;
use ContentinumComponents\File\Name;

class CopyCollectionFile extends Copy
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
            $ident = Name::get($posts['data']['ident']);
            if ('php' === Extension::get($posts['data']['filename'])){
                $filename = Name::get($posts['data']['filename']); 
            } else {
                $filename = $posts['data']['filename'];
            }
            $this->setDestination( $this->getPath() . DS . $filename . '.php');
            if (! is_file($this->getStorage()->getDocumentRoot() . DS . $this->getDestination())) {
                if (is_writable($this->getStorage()->getDocumentRoot() . DS .  $this->getPath())) {
                    $dir = $this->getStorage()->getDocumentRoot() . DS .  $this->getPath();
                    $filecontent = file_get_contents($dir . DS . $ident . '.php');
                    file_put_contents($dir . DS . $filename . '.php', str_replace($ident, $filename, $filecontent));
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