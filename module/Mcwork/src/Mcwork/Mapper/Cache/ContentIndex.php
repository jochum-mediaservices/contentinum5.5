<?php


namespace Mcwork\Mapper\Cache;


use ContentinumComponents\Storage\StorageDirectory;


class ContentIndex extends StorageDirectory
{
    

    
    const MCWORK_CACHEKEYS = 'mcwork_cache_keys';

    const CACHE_FILESYSTEM = 'mcwork_cache_data';

    const CACHE_FSENTITY = 'Mcwork\Entity\CacheFiles';

    /**
     * Cache keys
     *
     * @var array
     */
    protected $keys = false;
    
    
    public function __construct($storageManager)
    {
        $this->setStorage($storageManager);
    }    

    /**
     * Fetch cache datas
     * if cache available set meta datas
     *
     * @param array $attribs
     * @param AbstractStorageEntity $entity
     * @param ServiceLocatorInterface $sl
     * @throws ParamNotExistsModelException
     * @return array
     */
    public function fetchContent(array $params = null)
    {

            $keys = $this->getCacheKeys($this->getSl());
            foreach ($keys as $key => $datas) {
                $keyCache = $this->getSl()->get( $datas['cache']);
                if ($keyCache->hasItem($key)) {
                    $datas['metas'] = $keyCache->getMetadata($key);
                }
                $cacheData[$key] = $datas;
            }
            unset($datas);
            return $cacheData;
    
    }   
    
    
    /**
     * Get cache keys
     *
     * @param ServiceLocatorInterface $sl
     * @return array
     */
    protected function getCacheKeys($sl)
    {
        if (false === $this->keys) {
            $keys = $sl->get(self::MCWORK_CACHEKEYS);
            $this->keys = $keys->toArray();
        }
        return $this->keys;
    }
       
}