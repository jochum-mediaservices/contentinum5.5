<?php
namespace Mcwork\Model\File;

use Mcwork\Fs\Remove;

class Delete extends Remove
{

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
                $this->setRemoveFsItems($row['name']);
                $this->remove();
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