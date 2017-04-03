<?php
namespace Mcwork\Model\Delete;

class Entries extends AbstractEntries
{

    public function execute($id)
    {
        if (false === $this->isEntries($id)) {
            $entity = $this->find($id);
            $this->deleteEntry($entity, $id);
            $this->setMessage('The data set was successfully deleted');
            return 'success';
        } else {
            $this->setMessage('Please check, this data set is already associated with another records: ' . $this->getHasEntriesIn());
            return 'warn';
        }
    }
}