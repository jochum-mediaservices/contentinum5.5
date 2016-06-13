<?php

namespace Mcwork\Model\Delete;

use ContentinumComponents\Mapper\Worker;
abstract class AbstractEntries extends Worker
{
    /**
     * 
     * @var array
     */
    protected $relatedEntries;
    
    /**
     * Success, warn messages
     * @var string
     */
    protected $message;
     
    /**
     * Tablename with entries
     * @var string
     */
    protected $hasEntriesIn;
        
    /**
     * @return the $relatedEntries
     */
    public function getRelatedEntries()
    {
        return $this->relatedEntries;
    }

	/**
     * @param multitype: $relatedEntries
     */
    public function setRelatedEntries($relatedEntries)
    {
        $this->relatedEntries = $relatedEntries;
    }
    
    /**
     *
     * @return the $message
     */
    public function getMessage()
    {
        return $this->message;
    }
    
    /**
     *
     * @param field_type $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }    

    /**
     * @return the $hasEntriesIn
     */
    public function getHasEntriesIn()
    {
        return $this->hasEntriesIn;
    }

    /**
     * @param string $hasEntriesIn
     */
    public function setHasEntriesIn($hasEntriesIn)
    {
        $this->hasEntriesIn = $hasEntriesIn;
    }

    /**
     * 
     * @param unknown $value
     * @return boolean
     */
	protected function isEntries($value)
    {
        $result = false;
        if (is_array($this->relatedEntries) && ! empty($this->relatedEntries)){
            $ifModule = $this->getSl()->get('contentinum_module');
            foreach ($this->relatedEntries as $row){
                if (isset($row['ifmodule']) && ! in_array($row['ifmodule'], $ifModule)){
                    continue;
                }
                if (true === $this->hasEntries($row['tablename'], $row['column'], $value)){
                    if (isset($row['area'])){
                        $this->hasEntriesIn = $row['area'];
                    } else {
                        $this->hasEntriesIn = $row['tablename'];
                    }
                    return true;
                }
                
                
                
            }
        }
        return $result;
    }
    
}