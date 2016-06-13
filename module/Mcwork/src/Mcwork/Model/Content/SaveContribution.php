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
namespace Mcwork\Model\Content;

use Mcwork\Model\Content\AbstractContribution;

/**
 * 
 * @author mike
 *
 */
class SaveContribution extends AbstractContribution
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
            $datas['deleted'] = '0';
            $datas['updateflag'] = '1';
            $msg = parent::save($datas, $entity, $stage, $id);
            $lastInsertId = $this->getLastInsertId();
            $this->inUseMedia($datas['webMediasId'], $lastInsertId);
            $this->assignGroup($datas, $lastInsertId);
        } else {
            if (isset($datas['id'])){
                unset($datas['id']);
            }
            $this->inUseMedia($entity->webMediasId->id, $entity->id, self::INUSE_GROUP, 'delete');
            $datas['updateflag'] = '1';
            parent::save($datas, $entity, $stage, $id);
            $this->inUseMedia($datas['webMediasId'], $entity->id);
            $this->updateGroup($datas, $entity, $entity->id);
        }
        return true;
    }   
    
    /**
     * 
     * @param unknown $datas
     * @param unknown $entity
     * @param unknown $id
     */
    protected function updateGroup($datas, $entity, $id)
    {
        if (false != $datas['webContentgroup']) {
            $this->unsetTargetEntities();
            $this->unsetEntity();
            $this->setEntity($this->getSl()->get('entity_content_groups'));  
            $group = $this->fetchContentGroup($id);
            if ($datas['webContentgroup'] !== $group['web_contentgroup_id']){
                $this->removeEntryPageContent($group['web_contentgroup_id']);
                $parent = $this->fetchContentGroupByGroup($datas['webContentgroup'], 1);
                $rang = $this->sequence('webContentgroup', $datas['webContentgroup'], 'itemRang') + 1;
                $groupStyle = 'nonestyle';
                $updateGroup = false;
                if (is_array($parent) && !empty($parent) ){
                    $groupStyle = $this->findGroupStyles($parent['group_style']);
                    if ($groupStyle !== $parent['group_style']){
                        $updateGroup = true;
                    }
                }
                $sql = "UPDATE web_content_groups SET ";
                $sql .= "item_rang = '" .  $rang  . "', ";
                $sql .= "web_contentgroup_id = '" . $datas['webContentgroup'] . "', ";
                $sql .= "group_style = '" . $groupStyle . "' ";
                $sql .= "WHERE id = {$group['id']}";             
                $this->executeQuery($sql); 
                if (true === $updateGroup){
                    $this->updateGroupStyle($groupStyle, $datas['webContentgroup']);
                }                
            }
        }
        return true;
    }
    
    /**
     * 
     * @param unknown $id
     */
    protected function removeEntryPageContent($id)
    {
        $page = $this->fetchRow("SELECT * FROM web_pages_content WHERE web_contentgroup_id = '{$id}'");
        if (isset($page['web_contentgroup_id'])){
            $this->executeQuery("DELETE FROM web_pages_content WHERE id = '{$page['id']}'");
            $rang = new \Mcwork\Model\Publish\Rang($this->getStorage());
            $rang->setEntity($this->getSl()->get('entity_page_content'));
            $rang->sortItemRang('webPages', $page['web_pages_id']);
        }
    }

    /**
     * 
     * @param unknown $datas
     * @param unknown $lastInsertId
     */
    protected function assignGroup($datas, $lastInsertId)
    {
        $insert['webContent'] = $this->find($lastInsertId, true);
        $this->unsetTargetEntities();
        $this->setTargetEntities(array('webContent' => $this->getEntityName()));
        $this->unsetEntity();
        $this->setEntity($this->getSl()->get('entity_content_groups'));
        if (false == $datas['webContentgroup']) {
            $insert['itemRang'] = 1;
            $insert['webContentgroup'] = $this->sequence() + 1;
            $assignInPage = true; 
        } else {
            $group = $this->fetchContentGroupByGroup($datas['webContentgroup'], 1);
            $updateGroup = false;
            $groupStyle = 'nonestyle';
            if (is_array($group) && !empty($group) ){
                $groupStyle = $this->findGroupStyles($group['group_style']);
                if ($groupStyle !== $group['group_style']){
                    $updateGroup = true;
                }
            }
            $insert['groupStyle'] = $groupStyle;
            $insert['webContentgroup'] = $datas['webContentgroup'];
            $insert['itemRang'] = $this->sequence('webContentgroup', $insert['webContentgroup'], 'itemRang') + 1;
            if (true === $updateGroup){
                $this->updateGroupStyle($groupStyle, $datas['webContentgroup']);
            }
            $assignInPage = false;
        }
        
        parent::save($insert,$this->getSl()->get('entity_content_groups'));
        if (true === $assignInPage) {
            $lastInsertId = $this->getLastInsertId();
            $datas['webContentgroup'] = $this->getLastInsertId();
            $inPage = new SaveContributionGroup($this->getStorage());
            $inPage->setSl($this->getSl());
            $inPage->setEntity($this->getSl()->get('entity_page_content'));
            $inPage->insertContribution($datas);
        }        
    }
    
    /**
     *
     * @param unknown $id
     */
    protected function fetchContentGroup($id, $rang = null)
    {
        $itemRang = '';
        if (null !== $rang){
            $itemRang = " AND item_rang = '{$rang}'";
        }
        return $this->fetchRow("SELECT * FROM web_content_groups WHERE web_content_id = '{$id}'{$itemRang}");
    } 
    
    /**
     *
     * @param unknown $id
     */
    protected function fetchContentGroupByGroup($id, $rang = null)
    {
        $itemRang = '';
        if (null !== $rang){
            $itemRang = " AND item_rang = '{$rang}'";
        }
        return $this->fetchRow("SELECT * FROM web_content_groups WHERE web_contentgroup_id = '{$id}'{$itemRang}");
    }

    /**
     *
     * @param unknown $string
     */
    protected function findGroupStyles($string)
    {
        if ('nonestyle' === $string) {
            return $string;
        } else {
            foreach (array(
                'gridlarge',
                'grid',
                'gridsmall',
                'accordion',
                'accordion6',
                'accordionallclose',
                'blockgrid',
                'tabs',
                'tabs6',
                'tabsvertical'
            ) as $style) {
                if (1 === preg_match('/^' . $string . '/', $style)) {
                    return $string;
                }
            }
        }
        return 'nonestyle';
    }
    
    /**
     * 
     * @param unknown $groupStyle
     * @param unknown $groupIdent
     */
    protected function updateGroupStyle($groupStyle, $groupIdent)
    {
       $this->executeQuery("UPDATE web_content_groups SET group_style = '{$groupStyle}' WHERE web_contentgroup_id = {$groupIdent};");
    }

}