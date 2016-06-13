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

use Mcwork\Model\Exception\ParamNotExistsModelException;
/**
 * Save model provides method to prepae insert and update datas
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class SaveAddContribution extends AbstractContentGroup
{
    /**
     * Prepare datas before save
     * Insert the category with the correct sequnce number in this group
     *
     * @see \ContentinumComponents\Mapper\Process::save()
     */
    public function save($datas, $entity = null, $stage = '', $id = null)
    {
        if (isset($datas['ident']) && $datas['webPages']){
            $group = $this->fetchRow("SELECT * FROM web_content_groups WHERE id = {$datas['ident']}");
            $date = date('Y-m-d H:i:s');
            $insert = array(
                'id' =>  $this->sequence() + 1,
                'web_pages_id' => $datas['webPages'],
                'web_contentgroup_id' => $datas['ident'],
                'item_rang' => $this->sequence('webPages', $datas['webPages'], 'itemRang') + 1,
                'content_rang' => $this->getContentRang($datas['adjustments']),
                'adjustments' => $datas['adjustments'],
                'htmlwidgets' => $datas['htmlwidgets'],
                'publish' => 'yes',
                'tpl_assign' => 'allcontent',
                'created_by' => $this->getUserIdent(),
                'update_by' => $this->getUserIdent(),
                'register_date' => $date,
                'up_date' => $date
            ); 
            $this->insertQuery('web_pages_content', $insert);
            
        } else {
            throw new ParamNotExistsModelException('The ID of the group was not passed');
        }
    } 
}