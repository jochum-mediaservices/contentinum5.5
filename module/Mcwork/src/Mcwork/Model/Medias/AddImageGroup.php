<?php




namespace Mcwork\Model\Medias;

use ContentinumComponents\Mapper\Process;

class AddImageGroup extends Process
{
    /**
     *
     * @param array $params
     * @param string $posts
     */
    public function processRequest(array $params = null, $posts = null)
    {
        try {
            if (isset($posts['data']["groupName"])) {
                parent::save(array('groupName' => $posts['data']["groupName"], 'resource' => 'index'), $this->getEntity());
                $groupIdent = $this->getLastInsertId();
                
                $itemRang = 0;
                $date = date('Y-m-d H:i:s');
                
                $this->executeQuery("SET FOREIGN_KEY_CHECKS=0;");
                foreach ($posts['data']['files'] as $fileIdent){
                    $itemRang++;
                    $result = $this->fetchRow("SELECT MAX(id) AS ident FROM web_media_categories;");
                    $ident = (int) $result['ident'];
                    $id = $ident + 1;                    
                    $insert = array(
                        'id' => $id,
                        'web_medias_id' => $fileIdent,                        
                        'web_mediagroup_id' => $groupIdent,
                        'parent_media_file' => '0',
                        'item_rang' => $itemRang,
                        'caption' => '',
                        'description' => '',
                        'media_link_url' => '',
                        'target_link' => '',
                        'resource' => 'index',
                        'alternate_download' => '0',
                        'alternate_linktitle' => '',
                        'alternate_labelname' => '',                        
                        'created_by' => $this->getUserIdent(),
                        'update_by' => $this->getUserIdent(),
                        'register_date' => $date,
                        'up_date' => $date
                    );
                    $this->insertQuery('web_media_categories', $insert);
                }
                $this->executeQuery("SET FOREIGN_KEY_CHECKS=1;");     
                
                return array(
                    'success' => true
                );                
            } else {
                return array(
                    'error' => 'error',
                );                
            }
            
        } catch (\Exception $e) {
            return array(
                'error' => $e->getMessage()
            );
        }        
        
        
    }
}