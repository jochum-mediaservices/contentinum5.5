<?php
namespace Contentinum\Mapper\Content;

use ContentinumComponents\Mapper\Worker;

class Plugin extends Worker
{
    /**
     * 
     * @var string
     */
    private $pluginname;
    
    /**
     * 
     * @var string
     */
    private $orginurl;

    /**
     * @return the $pluginname
     */
    public function getPluginname()
    {
        return $this->pluginname;
    }

    /**
     * @param string $pluginname
     */
    public function setPluginname($pluginname)
    {
        $this->pluginname = $pluginname;
    }

    /**
     * @return the $orginurl
     */
    public function getOrginurl()
    {
        return $this->orginurl;
    }

    /**
     * @param string $orginurl
     */
    public function setOrginurl($orginurl)
    {
        $this->orginurl = $orginurl;
    }

    /**
     * Content query
     * 
     * @param array $params query conditions
     * @return multitype:
     */
    public function fetchContent(array $params = null, $posts = null,$modul = null)
    {
        if (is_array($posts)) {
            $params = array_merge($params, $posts);
        }   
        
        foreach (array('display', 'config','link','format') as $key){
            if (!isset($params[$key])){
                $params[$key] = '';
            }
        }
        $this->setPluginname($params['modul']);
        $this->setOrginurl($params['url']);
        $module[$params['modul']][1]['modulReferer'] = 1;
        $module[$params['modul']][1]['modulParams'] = $params['params'];
        $module[$params['modul']][1]['modulDisplay'] = $params['display'];
        $module[$params['modul']][1]['modulConfig'] = $params['config'];
        $module[$params['modul']][1]['modulLink'] = $params['link'];
        $module[$params['modul']][1]['modulFormat'] = $params['format'];
        $modul->setModul($module);
        $result = $modul->fetchContent();
        
        
        //$result = $params;
        //var_dump($result);exit;
        return $result;
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
    
}