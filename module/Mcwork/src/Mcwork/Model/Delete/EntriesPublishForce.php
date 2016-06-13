<?php
namespace Mcwork\Model\Delete;

class EntriesPublishForce extends AbstractEntries
{

    public function execute($id)
    {
        if (false === $this->isEntries($id)) {
            $entity = $this->find($id);
            if ($entity->publish && 'yes' === $entity->publish) {
                $this->setMessage('Dataset is published and can not be deleted');
                return 'warn';
            } else {
                $this->executeforce($id);
                $this->setMessage('The data set was successfully deleted');
                return 'success';
            }
        } else {
            $this->setMessage('Please check, this data set is already associated with another records: ' . $this->getHasEntriesIn());
            return 'warn';
        }
    }
    
    /**
     *
     * @param unknown $id
     */
    protected function executeforce($id)
    {
        $tableName = $this->getStorage()->getClassMetadata($this->getEntityName())->getTableName();
        $this->executeQuery("SET FOREIGN_KEY_CHECKS=0;");
        $this->executeQuery("DELETE FROM ". $tableName ." WHERE id = '{$id}'");
        $this->executeQuery("SET FOREIGN_KEY_CHECKS=1;");
        return true;
    }    
}