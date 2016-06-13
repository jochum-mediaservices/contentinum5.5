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
 * @category contentinum
 * @package Service
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 * @copyright Copyright (c) 2009-2013 jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 * @license http://www.opensource.org/licenses/bsd-license
 * @since contentinum version 5.0
 * @link      https://github.com/Mikel1961/contentinum-components
 * @version   1.0.0
 */
namespace Mcwork\Model\Admin;

use ContentinumComponents\Unique\Id;
use Mcwork\Model\Cache\DeleteCache;

/**
 * Save model provides method to prepae insert and update datas
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class SavePreferences extends DeleteCache
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
            $newHost = false;
            if ('createnewhost' == $datas['hostId']) {
                $datas['hostId'] = Id::get();
                $datas['standardDomain'] = 'yes';
                $newHost = true;
            } else {
                $datas['standardDomain'] = 'no';
                $newHost = false;
            }
            $msg = parent::save($datas, $entity, $stage, $id);
            
            if (true === $newHost) {
                $this->addDefaultPage($datas, $this->lastInsertId);
            }
            $this->emptyCache('contentinum_domain_preference');
            return $msg;
        } else {
            unset($datas['standardDomain']);
            if (1 === $entity->getPrimaryValue()){
                unset($datas['host']);
            }
            $this->emptyCache('contentinum_domain_preference');
            parent::save($datas, $entity, $stage, $id);
        }
    }
    
    /**
     * Prepare insert a new default page
     *
     * @param array $datas
     * @param int $id host ident
     * @return boolean
     */
    protected function addDefaultPage($datas, $id)
    {
        /*$insert['webPreferences'] = $this->find($id, true);
        $insert['scope'] = '_default';
        $insert['resource'] = 'index';
        $insert['label'] = '_default ' . $datas['host'];
        $insert['title'] = '';
        $insert['url'] = '_default';
        $insert['publish'] = 'no';
        $insert['onlylink'] = '9';
        $page = new Page($this->getStorage());
        $entity = $page::ENTITY_MODEL;
        $page->addDefaults($insert, new $entity());
        return true;*/
    }  
}