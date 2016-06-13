<?php
namespace Contentinum\Assets;

use Assetic\AssetManager;
use Assetic\Asset\FileAsset;
use Assetic\Asset\AssetCollection;
use Assetic\AssetWriter;
use Assetic\Factory\Worker\CacheBustingWorker;
use Assetic\Factory\AssetFactory;
use Assetic\FilterManager;
use ContentinumComponents\Html\HtmlAttribute;
use Zend\Config\Config;

class Manager
{

    const ASSETS_LASTMODIFIED = '/data/cache/app/assets/lastmodifiedstamp';

    /**
     * Assetic\FilterManager
     *
     * @var Assetic\FilterManager
     */
    protected $fm;

    /**
     * Path to assets
     *
     * @var string
     */
    protected $assetPath;

    /**
     * Webpath to assets
     *
     * @var string
     */
    protected $assetWeb;

    /**
     * Stylesheets
     *
     * @var string
     */
    protected $stylesheets;

    /**
     * Script header link
     *
     * @var string
     */
    protected $headLink;

    /**
     * script inline link
     *
     * @var string
     */
    protected $inlineLink;

    /**
     *
     * @return \Assetic\FilterManager $fm
     */
    public function getFm()
    {
        if (null === $this->fm) {
            $this->setFm(new FilterManager());
        }
        return $this->fm;
    }

    /**
     *
     * @param \Assetic\FilterManager $fm
     */
    public function setFm(\Assetic\FilterManager $fm)
    {
        $this->fm = $fm;
    }

    /**
     *
     * @return the $assetPath
     */
    public function getAssetPath()
    {
        return $this->assetPath;
    }

    /**
     *
     * @param string $assetPath
     */
    public function setAssetPath($assetPath)
    {
        $this->assetPath = $assetPath;
    }

    /**
     *
     * @return the $assetWeb
     */
    public function getAssetWeb()
    {
        return $this->assetWeb;
    }

    /**
     *
     * @param string $assetWeb
     */
    public function setAssetWeb($assetWeb)
    {
        $this->assetWeb = $assetWeb;
    }

    /**
     *
     * @return the $stylesheets
     */
    public function getStylesheets()
    {
        return $this->stylesheets;
    }

    /**
     *
     * @param string $stylesheets
     */
    public function setStylesheets($stylesheets)
    {
        $this->stylesheets = $stylesheets;
    }

    /**
     *
     * @return the $headLink
     */
    public function getHeadLink()
    {
        return $this->headLink;
    }

    /**
     *
     * @param string $headLink
     */
    public function setHeadLink($headLink)
    {
        $this->headLink = $headLink;
    }

    /**
     *
     * @return the $inlineLink
     */
    public function getInlineLink()
    {
        return $this->inlineLink;
    }

    /**
     *
     * @param string $inlineLink
     */
    public function setInlineLink($inlineLink)
    {
        $this->inlineLink = $inlineLink;
    }

    /**
     * Create assets collections
     *
     * @param array $assets
     * @return array $ln with path to web recources
     */
    public function set($assets)
    {
        if (isset($assets['template'])){
            $assets = new Config(include CON_ROOT_PATH . $assets['template']);
            $assets = $assets->toArray();
        }
        /*
        $test = CON_ROOT_PATH . '/data/assets/foundation.5.5.2/css/app.css'; //assets/foundation552/css/app.css';
        if (is_file($test)){
            print 'yes';
            print '<br>';
            print $test;            
        } else {
            print 'no<br>';
            print $test;
        }
        exit;*/
        foreach ($assets['collections'] as $key => $collection) {
            
            if (isset($assets['sets']) && !in_array($key, $assets['sets'])){
                continue;
            }
            
            switch ($collection['type']) {
                case 'styles':
                    $this->setAssetPath($assets['path']);
                    $this->setAssetWeb($assets['web']);
                    $this->styleAssets($collection, $key, $assets['path'], $assets['web']);
                    break;
                case 'js':
                    $this->setAssetPath($assets['path']);
                    $this->setAssetWeb($assets['web']);
                    $this->scriptAssets($collection, $key, $assets['path'], $assets['web']);
                    break;
                default:
                    break;
            }
        }
        return true;
    }

    /**
     * Build script collection add filter return link to web recource
     *
     * @param array $assets file collection
     * @param string $key collection name
     * @param string $path path to assets recources
     * @param string $web path to web resource
     */
    public function scriptAssets($collection, $key, $path, $web)
    {
        if (true === $collection['debug']) {
            $this->debugWriteAssets(CON_ROOT_PATH, DOCUMENT_ROOT, $web, $collection);
            return true;
        }
        
        $am = $this->setAssetsCollection($collection['assets'], $key, $path);
        $this->fm = null;
        $factory = new AssetFactory(DOCUMENT_ROOT . $web, $collection['debug']);
        $factory->setAssetManager($am);
        $filters = array();
        if (false === $collection['debug']) {
            if (isset($collection['includes'])) {
                $this->includeResources($collection['includes']);
            }
            if (isset($collection['filters'])) {
                foreach ($collection['filters'] as $alias => $filter) {
                    $filters[] = '?' . $alias;
                    $this->getFm()->set($alias, new $filter());
                }
                $factory->setFilterManager($this->getFm());
                $factory->addWorker(new CacheBustingWorker());
            }
        }
        $js = $factory->createAsset(array(
            '@' . $key
        ), $filters);
        $js->setTargetPath($key . '.js');
        
        $this->writeAssets($js, self::ASSETS_LASTMODIFIED . $key, DOCUMENT_ROOT . $web, '/' . $key . '.js');
        $src = '';
        if (isset($collection['onload']) && true === $collection['onload']) {
            $src = $this->onloadScript($web . '/' . $key . '.js', $collection);
        } else {
            $src = $this->linkScript($web . '/' . $key . '.js', $collection['attr']);
        }
        if (isset($collection['area']) && 'head' === $collection['area']) {
            $this->setHeadLink($src);
        } else {
            $this->setInlineLink($src);
        }
        return true;
    }

    /**
     * Build styles collection add filter return link to web recource
     *
     * @param array $assets file collection
     * @param string $key collection name
     * @param string $path path to assets recources
     * @param string $web path to web resource
     */
    public function styleAssets($collection, $key, $path, $web)
    {
        if (true === $collection['debug']) {
            $this->debugWriteAssets(CON_ROOT_PATH, DOCUMENT_ROOT, $web, $collection);
            return true;
        }
        
        $am = $this->setAssetsCollection($collection['assets'], $key, $path);
        $this->fm = null;
        $factory = new AssetFactory(DOCUMENT_ROOT . $web, $collection['debug']);
        $factory->setAssetManager($am);
        $filters = array();
        if (false === $collection['debug']) {
            if (isset($collection['includes'])) {
                $this->includeResources($collection['includes']);
            }
            
            if (isset($collection['filters'])) {
                foreach ($collection['filters'] as $alias => $filter) {
                    $filters[] = '?' . $alias;
                    $this->getFm()->set($alias, new $filter());
                }
                $factory->setFilterManager($this->getFm());
                $factory->addWorker(new CacheBustingWorker());
            }
        }
        $css = $factory->createAsset(array(
            '@' . $key
        ), $filters);
        $css->setTargetPath($key . '.css');
        $this->writeAssets($css, self::ASSETS_LASTMODIFIED . $key, DOCUMENT_ROOT . $web, '/' . $key . '.css');
        $this->setStylesheets($this->linkStylesheet($web . '/' . $key . '.css', $collection['attr']));
        return true;
    }

    /**
     *
     * @param array $assets
     * @param string $key
     * @param string $path
     * @return \Assetic\AssetManager $am Assetic\AssetManager
     */
    protected function setAssetsCollection($assets, $key, $path)
    {
        $am = new AssetManager();
        $collection = array();
        foreach ($assets as $file) {
            $collection[] = new FileAsset(CON_ROOT_PATH . $path . $file);
        }
        $am->set($key, new AssetCollection($collection));
        return $am;
    }

    /**
     * Write collection in web folder
     *
     * @param Assetic\Factory\AssetFactory $assetFactory
     * @param string $file
     */
    protected function writeAssets($assetFactory, $file, $web, $tragetFile)
    {
        if (true === $this->lastModifedHandler($assetFactory->getLastModified(), $file, $web . $tragetFile)) {
            $writer = new AssetWriter($web);
            $writer->writeAsset($assetFactory);
        }
    }

    /**
     * 
     * @param unknown $rootPath
     * @param unknown $docRoot
     * @param unknown $web
     * @param unknown $collection
     */
    protected function debugWriteAssets($rootPath, $docRoot, $web, $collection)
    {
        foreach ($collection['assets'] as $assets) {
            $filename = basename($rootPath . $this->getAssetPath() . $assets);
            file_put_contents($docRoot . $web . '/debug_' . $filename, file_get_contents($rootPath . $this->getAssetPath() . $assets));
            switch ($collection['area']) {
                case 'head':
                    $this->setHeadLink($this->getHeadLink() . $this->linkScript($web . '/debug_' . $filename, $collection['attr']));
                    break;
                case 'inline':
                    $this->setInlineLink($this->getInlineLink() . $this->linkScript($web . '/debug_' . $filename, $collection['attr']));
                    break;
                case 'styles':
                    $this->setStylesheets($this->getStylesheets() . $this->linkStylesheet($web . '/debug_' . $filename, $collection['attr']));
                    break;
                default:
                    break;
            }
        }
    }

    /**
     * Compare time stamp assets recource and collection
     *
     * @param string $lastModified time stamp last modified collection
     * @param string $file path to lastmodified file last changes
     */
    protected function lastModifedHandler($lastModified, $file, $targetFile)
    {
        $filename = CON_ROOT_PATH . $file;
        if (! is_file($filename)) {
            file_put_contents($filename, '');
        }
        if (file_get_contents($filename) != $lastModified) {
            file_put_contents($filename, $lastModified);
            return true;
        } elseif (! is_file($targetFile)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     *
     * @param string $stylesheet path to stylesheet
     * @param array $attribute
     */
    protected function linkStylesheet($href, $attribute = array())
    {
        return '<link href="' . $href . '"' . HtmlAttribute::attributeArray($attribute) . ' />';
    }

    /**
     *
     * @param unknown $script
     * @param unknown $attribute
     */
    protected function linkScript($src, $attribute = array())
    {
        return '<script src="' . $src . '"' . HtmlAttribute::attributeArray($attribute) . '></script>';
    }
    
    /**
     * 
     * @param unknown $src
     * @param unknown $attribute
     */
    public function getInlineLinkScript($src, $attribute = array())
    {
        return $this->linkScript($src,$attribute);
    }

    /**
     *
     * @param unknown $src
     */
    protected function onloadScript($src, $collection)
    {
        $str = '<script>function downloadJSAtOnload(){var element=document.createElement("script");';
        if (isset($collection['area']) && 'head' === $collection['area']) {
            $str .= 'element.src="' . $src . '";document.head.appendChild(element);}';
        } else {
            $str .= 'element.src="' . $src . '";document.body.appendChild(element);}';
        }
        $str .= 'if(window.addEventListener){window.addEventListener("load",downloadJSAtOnload,false);}';
        $str .= 'else if(window.attachEvent){window.attachEvent("onload",downloadJSAtOnload);}else{window.onload=downloadJSAtOnload;}</script>';
        return $str;
    }   

    /**
     *
     * @param array $resources
     */
    protected function includeResources(array $resources)
    {
        foreach ($resources as $resource) {
            include CON_ROOT_PATH . $resource;
        }
    }
}