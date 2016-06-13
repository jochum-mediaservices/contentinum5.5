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

use ContentinumComponents\Filter\Url\Prepare;
use Mcwork\Model\Cache\DeleteCache;

/**
 * Save model provides method to prepae insert and update datas
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class SavePage extends DeleteCache
{

    const ENTITY_MODEL = 'Contentinum\Entity\WebPagesParameter';

    /**
     * Get entity name to have access of the publish property
     * 
     * @return string
     */
    public function getPublishEntity()
    {
        return self::ENTITY_MODEL;
    }

    /**
     * Prepare datas before save
     *
     * @see \ContentinumComponents\Mapper\Process::save()
     */
    public function save($datas, $entity = null, $stage = '', $id = null)
    {
        $entity = $this->handleEntity($entity);
        if (null === $entity->getPrimaryValue()) {
            if (strlen($datas['url']) == 0) {
                $filter = new Prepare();
                $datas['url'] = $filter->filter($datas['label']);
            }
            $datas['scope'] = $datas['url'];
            $msg = parent::save($datas, $entity);
            if (isset($datas['webNavigations']) && $datas['webNavigations'] > '0') {
                $this->addPageInNavigation($datas, $this->getLastInsertId());
            }
            $this->emptyCache('contentinum_public_pages');
            return $msg;
        } else {
            $setRedirect = false;
            if (isset($datas['redirect']) && '1' === $datas['redirect']) {
                $insert['redirect'] = $entity->url;
                $insert['webPagesId'] = $entity;
                $insert['statuscode'] = '301';
                $setRedirect = true;
            }
            if ('index' === $entity->url) {
                unset($datas['url']);
            }
            $msg = parent::save($datas, $entity, $stage, $id);
            if (true === $setRedirect) {
                $this->setRedirect($insert);
            }
            $this->emptyCache('contentinum_public_pages');
            return $msg;
        }
    }
    
    
    public function createDefaultPage($params, $datas)
    {
        if (isset($params['targetentities']) && is_array($params['targetentities'])  ){
            $this->setTargetEntities($params['targetentities']);
        }
        $insert = array();
        $insert['webPreferences'] = $datas['webPreferences'];
        $insert['label'] = '_default ' . $datas['label'];        
        $insert['scope'] = '_default';
        $insert['resource'] = 'index';
        $insert['title'] = '';
        $insert['url'] = '_default';
        $insert['publish'] = 'no';
        $insert['parent_page'] = $datas['webPages'];
        $insert['onlylink'] = '9';    
        parent::save($insert);
        $lastInsertId = $this->getLastInsertId();
        $this->unsetEntity();
        $this->setEntity(new \Contentinum\Entity\WebPagesAttributes());
        $this->setTargetEntities(array('webPages' => 'Contentinum\Entity\WebPagesParameter')); 
        parent::save(array('webPages' => $lastInsertId));
        return true;   
    }

    /**
     * Set redirect after change page url
     *
     * @param unknown $insert
     */
    public function setRedirect($insert)
    {
        $handle = new \Mcwork\Model\Admin\SaveRedirect($this->getStorage());
        $handle->save($insert, $this->getSl()->get('entity_redirect'));
    }

    /**
     * Add host default page
     * 
     * @param array $datas data to insert
     * @param AbstractEntity $entity
     */
    public function addDefaults($datas, $entity)
    {
        $entity = $this->handleEntity($entity);
        parent::save($datas, $entity);
    }

    /**
     * Add a page in a navigation tree
     * 
     * @param array $datas
     * @param int $id page ident
     */
    protected function addPageInNavigation($datas, $id)
    {
        $datas['webPages'] = $id;
        $datas['publish'] = 'yes';
        $this->unsetEntity();
        $this->setEntity($this->getSl()->get('entity_tree'));
        $datas['itemRang'] = $this->sequence('webNavigations', $datas['webNavigations'], 'itemRang') + 1;
        parent::save($datas, $this->getSl()->get('entity_tree'));
        return true;
    }   
}