<?php
namespace Mcwork\Mapper\Files;

use ContentinumComponents\Storage\StorageDirectory;

class DirectoryIndex extends StorageDirectory
{
    /**
     * 
     * @var interger
     */
    protected $count = 0;
    
    public function __construct($storageManager)
    {
        $this->setStorage($storageManager);
    }

    /**
     * 
     * @param array $params
     */
    public function fetchContent(array $params = null)
    {
        return $this->treeAsArray();
    }

    /**
     *
     * @param array $params
     * @param string $posts
     */
    public function processRequest(array $params = null, $posts = null)
    {
        return $this->fetchContent($params);
    }
    
    /**
     * 
     */
    protected function treeAsArray()
    {
        $tree = $this->getStorage()->getDirectoryTreeArray($this->getEntity()->getCurrentPath(), true);
        $html = '<ul class="directorylist"><li><a class="setlink" data-link="public/medias" href="#">Medias</a><ul>';
        $html .= $this->buildTree($tree, $this->getEntity()->getCurrentPath(), 1);
        $html .= '</ul></li></ul>';
        return $html;
    }
    
    /**
     * 
     * @param unknown $tree
     * @param unknown $dir
     * @param unknown $i
     */
    protected function buildTree($tree, $dir, $i)
    {
        $list = '';
        foreach ($tree as $dirname => $row){
            $list .= '<li><a class="setlink" data-link="'. $dir . DS . $dirname . '"';
            $sublist = '';
            $dataDir = '';
            if (is_array($row) && !empty($row)){
                $this->count++;
                $dataDir = ' data-dir="dir' . $this->count . '"';
                $sublist = '<ul id="dir'. $this->count . '" class="dirsublist">' . self::buildTree($row, $dir . DS . $dirname,$i) . '</ul>';
            }
            $list .= $dataDir . ' href="#"><i class="fa fa-folder" aria-hidden="true"> </i> '.$dirname.'</a>'.$sublist.'</li>';
        }
        return $list;
    }
}