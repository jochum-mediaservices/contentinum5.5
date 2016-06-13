<?php
namespace Mcwork\Model\Content;

use Mcwork\Model\Delete\AbstractEntries;

class DissolveGroup extends AbstractEntries
{

    /**
     * Move contribution trash
     *
     * @param unknown $id
     * @return string
     */
    public function execute($id)
    {
        try {
            
            $groupIdent = $id;
            $inGroup = $this->fetchAll('SELECT * FROM web_content_groups WHERE web_contentgroup_id = ' . $id);
            $groupPage = $this->fetchRow('SELECT * FROM web_pages_content WHERE web_contentgroup_id = ' . $id);
            if (isset($groupPage['web_pages_id'])) {
                
                $date = date('Y-m-d H:i:s');
                $identity = $this->getUserIdent();
                foreach ($inGroup as $groupItem) {
                    if ($groupItem['id'] === $groupItem['web_contentgroup_id']) {
                        $sql = "UPDATE web_content_groups ";
                        $sql .= "SET group_style = 'none', ";
                        $sql .= "group_element = '', ";
                        $sql .= "group_element_attribute = '', ";
                        $sql .= "update_by = '{$identity}', ";
                        $sql .= "up_date = '{$date}' ";
                        $sql .= "WHERE id = " . $groupItem['id'] . ";";
                        $this->executeQuery($sql);
                    } else {
                        $sql = "UPDATE web_content_groups ";
                        $sql .= "SET group_style = 'none', ";
                        $sql .= "web_contentgroup_id = " . $groupItem['id'] . ", ";
                        $sql .= "group_element = '', ";
                        $sql .= "group_element_attribute = '', ";
                        $sql .= "item_rang = 1, ";
                        $sql .= "update_by = '{$identity}', ";
                        $sql .= "up_date = '{$date}' ";
                        $sql .= "WHERE id = " . $groupItem['id'] . ";";
                        $this->executeQuery($sql);
                        
                        $lastInsertId = $this->sequence() + 1;
                        $itemRang = $this->sequence('webPages', $groupPage['web_pages_id'], 'itemRang') + 1;
                        $insert = array(
                            'id' => $lastInsertId,
                            'web_pages_id' => $groupPage['web_pages_id'],
                            'web_contentgroup_id' => $groupItem['id'],
                            'item_rang' => $itemRang,
                            'content_rang' => $groupPage['content_rang'],
                            'htmlwidgets' => $groupPage['htmlwidgets'],
                            'content_rang' => $groupPage['content_rang'],
                            'adjustments' => $groupPage['adjustments'],
                            'file' => $groupPage['file'],
                            'tpl_assign' => $groupPage['tpl_assign'],
                            'medias' => $groupPage['medias'],
                            'publish' => $groupPage['publish'],
                            'publish_up' => $groupPage['publish_up'],
                            'publish_down' => $groupPage['publish_down'],
                            'created_by' => $identity,
                            'update_by' => $identity,
                            'register_date' => $date,
                            'up_date' => $date
                        );
                        $this->insertQuery('web_pages_content', $insert);
                    }
                }
                $this->setMessage('The contribution group was successfully dissolve!');
                return 'success';
            } else {
                $this->setMessage('Miss parameter!');
                return 'warn';
            }
        } catch (\Exception $e) {
            $this->setMessage('EORROR:' . $e->getMessage());
            return 'error';
        }
    }
}