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
namespace Mcwork\Model\Tags;

use ContentinumComponents\Mapper\Process;

class SaveTags extends Process
{
    /**
     * 
     * @var string
     */
    private $tagGroup;
    
    /**
     * 
     * @var array
     */
    private $assigsTags = array();
    
    
    /**
     * @return the $tagGroup
     */
    public function getTagGroup()
    {
        return $this->tagGroup;
    }

    /**
     * @param string $tagGroup
     */
    public function setTagGroup($tagGroup)
    {
        $this->tagGroup = $tagGroup;
    }
    
    /**
     * @return the $assigsTags
     */
    public function getAssigsTags()
    {
        return $this->assigsTags;
    }
      
    /**
     * @param array $assigsTags
     */
    public function setAssigsTags($assigsTags)
    {
        $this->assigsTags = $assigsTags;
    }

    /**
     * Prepare datas before save
     * decide is it a insert or update
     *
     * @see \ContentinumComponents\Mapper\Process::save()
     */
    public function prepareDatas($tags, $id)
    {
        foreach ($tags as $tagName) {
            //$entity = $this->handleEntity($this->getEntity());
            $entries = $this->fetchEntries($this->getEntityName(), 'tagName', $tagName);
            $date = date('Y-m-d H:i:s');
            if (false === $entries) {
                //$msg = $this->save(array(),$entity);
                
                $lastInsertId = $this->sequence() + 1;
                $insert = array(
                    'id' => $lastInsertId,
                    'tag_name' => $tagName,
                    'tag_group' => $this->getTagGroup(),
                    'created_by' => $this->getUserIdent(),
                    'update_by' => $this->getUserIdent(),
                    'register_date' => $date,
                    'up_date' => $date
                );                
                
                
                $this->insertQuery('web_tags', $insert);//$this->getLastInsertId();
            } else {
                $lastInsertId = $entries[0]->id;
            }
            $this->assigsTags[$id][] = $lastInsertId;
        }
        if (! empty($this->assigsTags)) {
            $this->assigns($id);
        }
        return true;
    } 
    
    /**
     * Delete and create a new tag assign
     *
     * @param int $id item ident
     */
    public function assigns($id)
    {
        try {
            // delete former assigns ...
            $sql = "DELETE FROM web_tags_assign ";
            $sql .= "WHERE web_item_id = " . $id . " ";
            $sql .= "AND tag_area = '" . $this->getTagGroup() . "';";
            $this->executeQuery($sql);
            // ... and insert new assigns
            $date = date('Y-m-d H:i:s');
            foreach ($this->assigsTags as $itemId => $tagIds) {
                foreach ($tagIds as $tagId) {
                    $insert = array(
                        'tag_area' => $this->getTagGroup(),
                        'web_item_id' => $itemId,
                        'web_tag_id' => $tagId,
                        'register_date' => $date,
                        'up_date' => $date
                    );
                    $this->insertQuery('web_tags_assign', $insert);
                }
            }
            if (true === $this->hasLogger()) {
                $this->logger->info('Assignment success in web_tags_assign with ' . $id);
            }
        } catch (\Exception $e) {
            if (true === $this->hasLogger()) {
                $this->logger->crit('Error assignment web_tags_assign : ' . $e->getMessage());
            }
        }
    }     

    /**
     *
     * @param array $params
     * @param string $posts
     */
    public function processRequest(array $params = null, $posts = null)
    {
        if (is_array($posts)) {
            $params = array_merge($params, $posts);
        }      
        if (isset($params['group']) && strlen($params['group']) > 0){
            $this->setTagGroup($params['group']);
            if (isset($params['tags']) && isset($params['ident'])){
                return $this->prepareDatas($params['tags'], $params['ident']);
            }
        }

    }
}