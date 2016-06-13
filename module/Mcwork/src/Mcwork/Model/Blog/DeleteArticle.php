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

use Mcwork\Model\Delete\AbstractEntries;

class DeleteArticle extends AbstractEntries
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
            $this->setMessage('data_is_publish');
            return 'warn';
        } else {
            $group = $this->fetchRow("SELECT web_contentgroup_id FROM  web_content_groups WHERE web_content_id = '{$id}'");
            if (true === $this->removeAssociatedEntries($entity->id)) {
                if (1 === $entity->webMediasId->id) {
                    $this->executeQuery("UPDATE web_content SET deleted = '1' WHERE id = '{$entity->id}'");
                } else {
                    $media = $entity->webMediasId->id;
                    $this->executeQuery("UPDATE web_content SET web_medias_id = '1', deleted = '1' WHERE id = '{$entity->id}'");
                    $this->executeQuery("DELETE FROM mediainuse WHERE groupname = 'mediacontent' AND inuseid = {$entity->id} AND mediasid = {$media}");
                }
                $this->executeQuery("DELETE FROM mediainuse WHERE tag_area = 'newsblogstags' AND web_itemgroup_id = {$group['web_contentgroup_id']} AND web_item_id = {$entity->id}");
            }
            $this->setMessage('The article was successfully move in trash');
            return 'success';
        }
    }

    /**
     *
     * @param integer $id
     * @return boolean
     */
    protected function removeAssociatedEntries($id)
    {
        $this->executeQuery("SET FOREIGN_KEY_CHECKS=0;");
        $this->executeQuery("DELETE FROM web_content_groups WHERE web_content_id = '{$id}'");
        $this->executeQuery("SET FOREIGN_KEY_CHECKS=1;");
        
        return true;
    }
}