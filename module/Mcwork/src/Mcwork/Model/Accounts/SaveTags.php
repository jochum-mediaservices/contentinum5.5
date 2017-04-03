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
namespace Mcwork\Model\Accounts;

use ContentinumComponents\Mapper\Process;

class SaveTags extends Process
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
            
            $filter = new \ContentinumComponents\Filter\Url\Prepare();
            $tags = explode(';', $datas['tagName']);
            
            foreach ($tags as $tag) {
                if (strlen($tag) > 1) {
                    $tagScope = $filter->filter(trim($tag));
                    if (false == $this->fetchRow("SELECT * FROM web_tags WHERE tag_scope = '{$tagScope}';")) {
                        $date = date('Y-m-d H:i:s');
                        $insert = array(
                            'id' => $this->sequence() + 1,
                            'tag_group' => 'accounts',
                            'tag_name' => $tag,
                            'tag_scope' => $tagScope,
                            'created_by' => $this->getUserIdent(),
                            'update_by' => $this->getUserIdent(),
                            'register_date' => $date,
                            'up_date' => $date
                        );
                        
                        $this->insertQuery('web_tags', $insert);
                    }
                }
            }
            return true;
        } else {
            $filter = new \ContentinumComponents\Filter\Url\Prepare();
            $datas['typescope'] = $filter->filter($datas['typescope']);
            unset($filter);
            parent::save($datas, $entity, $stage, $id);
        }
    }
}