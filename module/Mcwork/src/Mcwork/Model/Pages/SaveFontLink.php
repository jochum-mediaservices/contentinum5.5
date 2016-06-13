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
namespace Mcwork\Model\Pages;

use Mcwork\Model\Cache\DeleteCache;

/**
 * Save model provides method to prepae insert and update datas
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class SaveFontLink extends DeleteCache
{

    /**
     * Prepare datas before save
     *
     * @see \ContentinumComponents\Mapper\Process::save()
     */
    public function save($datas, $entity = null, $stage = '', $id = null)
    {
        $date = date('Y-m-d H:i:s');
        $insert = array(
            'id' =>  $this->sequence() + 1,
            'web_pages_id' => $datas['webPages'],
            'web_medias_id' => 1,
            'linkgroup' => 1,
            'name' => $datas['name'],
            'meta_rel' => 'stylesheet',
            'meta_type' => 'text/css',
            'meta_title' => '',
            'meta_link' =>  $datas['metaLink'],
            'item_rang' => $this->sequence('linkgroup', 1, 'itemRang') + 1,
            'created_by' => $this->getUserIdent(),
            'update_by' => $this->getUserIdent(),
            'register_date' => $date,
            'up_date' => $date
        );
        $this->insertQuery('web_pages_headlinks', $insert);
        $this->emptyCache('contentinum_page_header');
    }
}