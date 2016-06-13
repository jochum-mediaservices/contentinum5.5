<?php
namespace Mcwork\Model\Content;

use Mcwork\Model\Delete\AbstractEntries;

class TrashContribution extends AbstractEntries
{

    /**
     * Move contribution trash
     * 
     * @param unknown $id
     * @return string
     */
    public function execute($id)
    {
        $entity = $this->find($id);
        if ($entity->publish && 'yes' === $entity->publish) {
            $this->setMessage('publish_in_page');
            return 'warn';
        } else {        
            // contribution group
            $grpRow = $this->fetchRow("SELECT * FROM web_content_groups WHERE web_content_id = '{$id}'");
            if ('none' !== $grpRow['group_style']){
                $this->setMessage('contribution_in_group');
                return 'warn';                
            }
            if (true === $this->removeAssociatedEntries($entity->id, $grpRow)) {
                if (1 === $entity->webMediasId->id) {
                    $this->executeQuery("UPDATE web_content SET deleted = '1' WHERE id = '{$entity->id}'");
                } else {
                    $media = $entity->webMediasId->id;
                    $this->executeQuery("UPDATE web_content SET web_medias_id = '1', deleted = '1' WHERE id = '{$entity->id}'");
                    $this->executeQuery("DELETE FROM mediainuse WHERE groupname = 'mediacontent' AND inuseid = {$entity->id} AND mediasid = {$media}");
                }       
                $this->setMessage('success_remove');
                return 'success';
            } else {
                $this->setMessage('unknownerror');
                return 'warn';
            }
        }
    }

    /**
     *
     * @param integer $id
     * @return boolean
     */
    protected function removeAssociatedEntries($id, $grpRow)
    {
        // in page (page content)
        $inPageRow = $this->fetchRow("SELECT * FROM web_pages_content WHERE web_contentgroup_id = '{$grpRow['id']}'");
        if ($inPageRow && is_array($inPageRow)) {
            $this->executeQuery("SET FOREIGN_KEY_CHECKS=0;");
            $this->executeQuery("DELETE FROM web_pages_content WHERE id = '{$inPageRow['id']}'");
            $this->executeQuery("SET FOREIGN_KEY_CHECKS=1;");
        }
        
        $this->executeQuery("SET FOREIGN_KEY_CHECKS=0;");
        $this->executeQuery("DELETE FROM web_content_groups WHERE id = '{$grpRow['id']}'");
        $this->executeQuery("SET FOREIGN_KEY_CHECKS=1;");
        
        return true;
    }
}