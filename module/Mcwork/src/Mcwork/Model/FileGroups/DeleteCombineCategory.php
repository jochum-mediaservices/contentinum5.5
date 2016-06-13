<?php
namespace Mcwork\Model\FileGroups;

use ContentinumComponents\Mapper\Sequence;
use Mcwork\Model\Medias\InUse;

class DeleteCombineCategory extends InUse
{

    public function execute($id)
    {
        try {
            $entity = $this->find($id);
            $groupId = $entity->webGroupsId->id;
            
            $this->deleteEntry($entity, $id);
            $this->itemsort($groupId);
            $this->setMessage('The data set was successfully deleted');
            return 'success';
        } catch (\Exception $e){
            $this->setMessage($e->getMessage());
            return 'warn';
        }
    }

    protected function itemsort($groupId)
    {
        $sec = new Sequence($this->getStorage());
        $entity = $this->getEntityName();
        $sec->setEntity(new $entity());
        $sec->sortItemRang('webGroupsId', $groupId);
    }
}