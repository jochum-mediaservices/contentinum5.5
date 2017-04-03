<?php
namespace Mcwork\Model\Accounts;

use ContentinumComponents\Mapper\Process;

class SaveAccountLink extends Process
{
    /**
     * Prepare datas before save
     *
     * @see \ContentinumComponents\Mapper\Process::save()
     */
    public function save($datas, $entity = null, $stage = '', $id = null)
    {
        $entity = $this->handleEntity($entity);
        if (null === $entity->getPrimaryValue()) {
            parent::save($datas, $entity, $stage, $id);
        } else {
            parent::save($datas, $entity, $stage, $id);
        }
    }    
}