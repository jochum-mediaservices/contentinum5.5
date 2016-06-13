<?php
namespace Mcwork\Model\Medias;

use Mcwork\Fs\Remove;

class DeleteDirectory extends Remove
{
    /**
     * 
     * @var ContentinumComponents\Mapper\Worker
     */
    private $worker;

    const MEDIA_PATH = '/public/medias';

    /**
     * @return the $worker
     */
    public function getWorker()
    {
        return $this->worker;
    }

    /**
     * @param \ContentinumComponents\Mapper\Worker $worker
     */
    public function setWorker($worker)
    {
        $this->worker = $worker;
    }

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
            foreach ($posts['files'] as $row) {
                $this->setRemoveFsItems($row['name']);
                $this->remove();
            }
            return array(
                'success' => true
            );
        } catch (\Exception $e) {
            return array(
                'error' => $e->getMessage()
            );
        }
    }
}