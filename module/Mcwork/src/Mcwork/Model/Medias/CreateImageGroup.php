<?php
namespace Mcwork\Model\Medias;

use ContentinumComponents\Storage\StorageDirectory;
use ContentinumComponents\File\Extension;

class CreateImageGroup extends StorageDirectory
{
    /**
     * 
     * @var ContentinumComponents\Mapper\Worker
     */
    private $worker;

    /**
     * Image file extensions
     *
     * @var array
     */
    protected $imageExtensions = array(
        "JPG",
        "JPEG",
        "jpg",
        "jpeg",
        "PNG",
        "png",
        "GIF",
        "gif"
    );

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
            if (isset($posts['current'])) {
                $medias = $this->getSl()->get('mcwork_media');
                $files = array();
                $dir = str_replace('_', DS, $posts['current']);
                foreach (scandir(CON_ROOT_PATH .'/public/medias/'. $dir) as $file) {
                    if ('.' != $file && '..' != $file &&  in_array(Extension::get($file), $this->imageExtensions)  ) {
                        if ( isset($medias['/public/medias/' . $dir . '/' . $file])  ){
                            $files['/medias/' . $dir . '/' . $file] = $medias['/public/medias/' . $dir . '/' . $file];
                        }                       
                    }             
                }
                if (empty($files)){
                    return array(
                        'error' => 'Keine Bilder in diesem Verzeichnis gefunden',
                    );                    
                } else {
                    return $files;
                }
            }
        } catch (\Exception $e) {
            return array(
                'error' => $e->getMessage()
            );
        }
    }
}