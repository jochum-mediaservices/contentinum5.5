<?php
/**
 * contentinum - accessibility websites
 *
 * LICENSE
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED
 * OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * @category Mcwork
 * @package Model
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 * @copyright Copyright (c) 2009-2013 jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 * @license http://www.opensource.org/licenses/bsd-license
 * @since contentinum version 5.0
 * @link      https://github.com/Mikel1961/contentinum-components
 * @version   1.0.0
 */
namespace Mcwork\Model\Blog;

use Mcwork\Model\Content\AbstractContribution;

/**
 * Save model provides method to prepae insert and update datas
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class SaveArticle extends AbstractContribution
{

    /**
     * Prepare datas before save
     *
     * @see \ContentinumComponents\Mapper\Process::save()
     */
    public function save($datas, $entity = null, $stage = '', $id = null)
    {
        $entity = $this->handleEntity($entity);
        if (null === $entity->getPrimaryValue()) {
            $datas['title'] = $datas['headline'];
            $datas['source'] = $this->prepareLink($datas['headline']);
            $msg = parent::save($datas, $entity, $stage, $id);
            $lastInsertId = $this->getLastInsertId();
            $this->inUseMedia($datas['webMediasId'], $lastInsertId);
            $this->assignGroup($datas, $lastInsertId);
            $this->assignTags($datas, $lastInsertId, $datas['webContentgroup']);
        } else {
            $this->inUseMedia($entity->webMediasId->id, $entity->id, self::INUSE_GROUP, 'delete');
            if ($datas['headline'] != $entity->headline) {
                $datas['title'] = $datas['headline'];
                $datas['source'] = $this->prepareLink($datas['headline']);
            }
            parent::save($datas, $entity, $stage, $id);
            $this->inUseMedia($datas['webMediasId'], $entity->id);
            $this->updateGroup($datas, $entity->id);
            $this->assignTags($datas, $entity->id, $datas['webContentgroup']);
        }
        return true;
    }

    /**
     *
     * @param unknown $datas
     * @param unknown $lastInsertId
     */
    public function assignGroup($datas, $lastInsertId)
    {
        $row = $this->fetchRow("SELECT * FROM web_content_groups WHERE web_contentgroup_id = '{$datas['webContentgroup']}' AND web_content_id = '1'");
        $date = date('Y-m-d H:i:s');
        $maxID = $this->fetchRow("SELECT MAX(id) FROM web_content_groups;");
        $insert['id'] = $maxID["MAX(id)"] + 1; 
        $insert['name'] = $row['name'];
        $insert['scope'] = $row['scope'];
        $insert['content_group_name'] = $row['content_group_name'];
        $insert['content_group_page'] = $row['content_group_page'];
        $insert['group_style'] = $row['group_style'];
        $insert['item_rang'] = 1;
        $insert['web_content_id'] = $lastInsertId;
        $insert['web_contentgroup_id'] = $datas['webContentgroup'];
        $insert['publish_date'] = $datas['publishDate'];
        $insert['created_by'] = $this->getUserIdent();
        $insert['update_by'] = $this->getUserIdent();
        $insert['register_date'] = $date;
        $insert['up_date'] = $date;        

        $this->insertQuery('web_content_groups', $insert);
    }    
    
    
    public function xxxxxassignGroup($datas, $lastInsertId)
    {
        $row = $this->fetchRow("SELECT * FROM web_content_groups WHERE web_contentgroup_id = '{$datas['webContentgroup']}' AND web_content_id = '1'");
        
        $insert['name'] = $row['name'];
        $insert['scope'] = $row['scope'];
        $insert['contentGroupName'] = $row['content_group_name'];
        $insert['contentGroupPage'] = $row['content_group_page'];
        $insert['groupStyle'] = $row['group_style'];
        $insert['itemRang'] = 1;
        $insert['webContent'] = $lastInsertId;
        $insert['webContentgroup'] = $datas['webContentgroup'];
        $insert['publishDate'] = $datas['publishDate'];
        $this->unsetTargetEntities();
        $this->setTargetEntities(array(
            'webContent' => $this->getEntityName()
        ));
        parent::save($insert, $this->getSl()->get('entity_content_groups'));
    }

    /**
     * Only publish update
     *
     * @param array $datas
     * @param integer $webContent
     */
    public function updateGroup($datas, $webContent)
    {
        $row = $this->fetchRow("SELECT * FROM web_content_groups WHERE web_contentgroup_id = '{$datas['webContentgroup']}' AND web_content_id = '1'");
        $this->executeQuery("UPDATE web_content_groups SET name = '{$row['name']}', content_group_page = '{$row['content_group_page']}', web_contentgroup_id = '{$datas['webContentgroup']}', publish_date = '{$datas['publishDate']}' WHERE web_content_id = '{$webContent}'");
    }

    /**
     *
     * @param unknown $datas
     * @param unknown $id
     * @param unknown $group
     */
    protected function assignTags($datas, $id, $group)
    {
        $assigns = array();
        if (! empty($datas['contentTags'])) {
            $assigns = $datas['contentTags'];
        }
        if (isset($datas['newTags']) && strlen($datas['newTags']) > 1) {
            $newTags = explode(',', $datas['newTags']);
            $handleTags = new \Mcwork\Model\Blog\SaveTags($this->getStorage());
            $handleTags->setEntity($this->getSl()
                ->get('entity_tags'));
            $date = date('Y-m-d H:i:s');
            $filter = new \ContentinumComponents\Filter\Url\Prepare();
            foreach ($newTags as $tagName) {
                if (strlen($tagName) > 1) {
                    $tagName = trim($tagName);
                    $tagScope = $filter->filter($tagName);
                    $entries = $this->fetchRow("SELECT * FROM web_tags WHERE tag_group = 'newsblogstags' AND  tag_scope = '" . $tagScope . "'");
                    if (false === $entries) {
                        $lastInsertId = $handleTags->sequence() + 1;                        
                        $insert = array(
                            'id' => $lastInsertId,
                            'tag_name' => $tagName,
                            'tag_group' => 'newsblogstags',
                            'tag_scope' => $tagScope,
                            'created_by' => $this->getUserIdent(),
                            'update_by' => $this->getUserIdent(),
                            'register_date' => $date,
                            'up_date' => $date
                        );                       
                        $this->insertQuery('web_tags', $insert);
                        $assigns[] = $lastInsertId;
                    } else {
                        $assigns[] = $entries['id'];
                    }
                }
            }
        }
        if (! empty($assigns)) {
            $this->assignArticleTags($assigns, $id, $group);
        }
        return true;
    }

    /**
     * Delete and create a new tag assign
     *
     * @param int $id item ident
     */
    public function assignArticleTags($assigsTags, $id, $group)
    {
        try {
            // delete former assigns ...
            $sql = "DELETE FROM web_tags_assign ";
            $sql .= "WHERE web_item_id = " . $id . " ";
            $sql .= "AND web_itemgroup_id = " . $group . " ";
            $sql .= "AND tag_area = 'newsblogstags';";
            $this->executeQuery($sql);
            // ... and insert new assigns
            $date = date('Y-m-d H:i:s');
            foreach ($assigsTags as $tagId) {
                $insert = array(
                    'tag_area' => 'newsblogstags',
                    'web_item_id' => $id,
                    'web_tag_id' => $tagId,
                    'web_itemgroup_id' => $group,
                    'register_date' => $date,
                    'up_date' => $date
                );
                $this->insertQuery('web_tags_assign', $insert);
            }
            if (true === $this->hasLogger()) {
                $this->logger->info('Assignment success in web_tags_assign with ' . $id);
            }
        } catch (\Exception $e) {
            if (true === $this->hasLogger()) {
                $this->logger->crit('Error assignment web_tags_assign : ' . $e->getMessage());
            }
        }
        return true;
    }
}