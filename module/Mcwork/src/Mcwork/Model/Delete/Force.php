<?php
namespace Mcwork\Model\Delete;

class Force extends AbstractEntries
{

    /**
     *
     * @param unknown $id
     */
    public function execute($id)
    {
        try {
            $tableName = $this->getStorage()
                ->getClassMetadata($this->getEntityName())
                ->getTableName();
            $this->executeQuery("SET FOREIGN_KEY_CHECKS=0;");
            $this->executeQuery("DELETE FROM " . $tableName . " WHERE id = '{$id}'");
            $this->executeQuery("SET FOREIGN_KEY_CHECKS=1;");
            $this->setMessage('The data set was successfully deleted');
            return 'success';
        } catch (\Exception $e) {
            $this->setMessage('ERROR: ' . $e->getMessage());
            return 'error';
        }
    }
}