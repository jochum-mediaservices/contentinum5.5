<?php
namespace Mcwork\Model\Files;


use ContentinumComponents\Filter\Url\Prepare;
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
                $entity = $posts['data']['entity'];
                $this->setEntity(new $entity());
            }
            if (isset($posts['data']['current'])){
                $this->setPath(DS . $this->getEntity()->getCurrentPath() . DS . str_replace('_', DS , $posts['data']['current']));
            } else {
                $this->setPath(DS . $this->getEntity()->getCurrentPath() . DS);
            }
            $filter = new Prepare();
            $this->setDestination( $this->getPath() . $posts['data']['filename']);
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