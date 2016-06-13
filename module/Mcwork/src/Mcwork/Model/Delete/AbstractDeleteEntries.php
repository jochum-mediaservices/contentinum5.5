<?php

namespace Mcwork\Model\Delete;

use ContentinumComponents\Mapper\Sequence;
use Mcwork\Model\Delete\AbstractEntries;


abstract class AbstractDeleteEntries extends AbstractEntries
{
    const SORT_COLUMN = false;
    
    const SORT_COLUMN_VAL = false;
    
    const PUBLISH_COLUMN = false;
    
    const EMPTY_CACHE = false;
    
    /**
     * 
     * @param unknown $id
     * @return string
     */
    public function execute($id)
    {

        if (false === $this->isEntries($id)) {
            $entity = $this->find($id);
            if (true === static::PUBLISH_COLUMN &&  'yes' === $entity->publish) {
                $this->setMessage('data_is_publish');
                return 'warn';
            } else {
                $column = static::SORT_COLUMN;
                if (false !== $column & false === static::SORT_COLUMN_VAL ){
                    $ident = $entity->{$column}->id;
                } elseif (false !== $column & false !== static::SORT_COLUMN_VAL){
                    $ident = static::SORT_COLUMN_VAL;
                }
                $this->deleteEntry($entity, $id);
                if (false !== $column){
                    $this->itemsort($ident);
                }
                if (false !== static::EMPTY_CACHE ){
                    $this->emptyCache();
                }
                $this->setMessage('success_delete');
                return 'success';
            }       
        } else {
            $this->setMessage('[ ' . $this->getHasEntriesIn() . ' ]');
            return 'warn';
        }
    }
    
    /**
     * 
     * @param unknown $ident
     */
    protected function itemsort($ident)
    {
        $sec = new Sequence($this->getStorage());
        $entity = $this->getEntityName();
        $sec->setEntity(new $entity());
        $sec->sortItemRang(static::SORT_COLUMN , $ident);
    }  
    
    /**
     * 
     */
    protected function emptyCache()
    {
        $cache = new \Mcwork\Model\Cache\DeleteCache($this->getStorage());
        $cache->setSl($this->getSl());
        $cache->emptyPublicCache(static::EMPTY_CACHE );
    }
}