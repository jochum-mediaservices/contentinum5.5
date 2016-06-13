<?php
namespace Mcwork\Model\Assets;



use Mcwork\Files\Delete;
class DeleteCollectionFile extends Delete
{
    const ASSET_PATH = '/data/assets/templates';
    
    
    /**
     *
     * @param array $params
     * @param string $posts
     */
    public function processRequest(array $params = null, $posts = null)
    {
        try {
            if (isset($posts['data']['current'])) {
                $this->setFsCurrent(str_replace('_', DS, $posts['data']['current']));
            }

            foreach ($posts['files'] as $row) {
                $this->setPathToFile(self::ASSET_PATH);
                $this->setDeleteFile($row['value']);
                $this->rm();
            }
            return array(
                'success' => true
            );
        } catch (\Exception $e) {
            return array(
                'error' => $e->getMessage()
            );
        }        
    }
}