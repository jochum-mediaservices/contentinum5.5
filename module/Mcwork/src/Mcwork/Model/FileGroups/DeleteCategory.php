<?php
namespace Mcwork\Model\FileGroups;

use ContentinumComponents\Mapper\Sequence;
use Mcwork\Model\Medias\InUse;

class DeleteCategory extends InUse
{

    public function execute($id)
    {
        try {
            $entity = $this->find($id);
            $groupId = $entity->webMediagroupId->id;
            $mediaId = $entity->webMediasId->id;
            
            $this->deleteEntry($entity, $id);
            $this->remove($mediaId, $id, 'mediacategories');
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
        $sec->sortItemRang('webMediagroupId', $groupId);
    }
}