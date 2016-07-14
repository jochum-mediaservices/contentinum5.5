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
 * @package Mapper
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 * @copyright Copyright (c) 2009-2013 jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 * @license http://www.opensource.org/licenses/bsd-license
 * @since contentinum version 5.0
 * @link      https://github.com/Mikel1961/contentinum-components
 * @version   1.0.0
 */
namespace Contentinum\Mapper;

/**
 * Modul Mapper
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class ModulBlog extends AbstractModuls
{
    /**
     *
     * @var unknown
     */
    private $findModul = false;    
    
    private $backlink = null;
    
    private $categorybacklink = null;

    /**
     * (non-PHPdoc)
     *
     * @see \Contentinum\Mapper\AbstractModuls::fetchContent()
     */
    public function fetchContent(array $params = null)
    {
        $this->backlink = null;
        return $this->build($this->query($this->configure['modulParams']));
    }

    /**
     * Build content array from database query result
     * 
     * @param array $entries query result
     * @return multitype:multitype:string unknown multitype:multitype:string unknown
     */
    private function build($entries)
    {
        $result = array();
        $result['news'] = $entries;
        $result['group'] = $this->fetchBlogGroup($this->configure['modulParams']);
        if (false !== ($section = $this->getParameter('section'))) {
            switch ($section) {
                case 'tag':
                case 'category':
                case 'archive':   
                    break;
                default:
                    $this->isModulContent($entries);
                    if (false !== $this->findModul){
                        $result['newsplugins'] = $this->fetchModulContent();
                    }                    
            }
        }
        
        
        if (null !== $this->backlink){
            $result['archivbacklink'] = $this->backlink;
        }
        return $result;
    }
    
    /**
     *
     * @param unknown $entries
     * @return unknown
     */
    private function isModulContent($entries)
    {
        $modul = array();
        foreach ($entries as $entry) {
            if (1 !== (int) $entry->webContent->id){
                if (strlen($entry->webContent->modul) > 1) {
                    $modul[$entry->webContent->modul][$entry->webContent->id]['modulReferer'] = $entry->webContent->id;
                    $modul[$entry->webContent->modul][$entry->webContent->id]['modulParams'] = $entry->webContent->modulParams;
                    $modul[$entry->webContent->modul][$entry->webContent->id]['modulDisplay'] = $entry->webContent->modulDisplay;
                    $modul[$entry->webContent->modul][$entry->webContent->id]['modulConfig'] = $entry->webContent->modulConfig;
                    $modul[$entry->webContent->modul][$entry->webContent->id]['modulLink'] = $entry->webContent->modulLink;
                    $modul[$entry->webContent->modul][$entry->webContent->id]['modulFormat'] = $entry->webContent->modulFormat;
                    $this->findModul = $modul;
                }
                break;
            }
    
        }
    
        return $entries;
    }   
    
    /**
     *
     */
    private function fetchModulContent()
    {
        
        $modul = $this->getSl()->get('contentinum_modul');
        $modul->setPlugins($this->getSl()->get('contentinum_plugin_keys'));
        $modul->setArticle( $this->getArticle());
        $modul->setCategory($this->getCategory());
        $modul->setTag($this->getTag());
        $modul->setTagValue($this->getTagValue());        
        $modul->setIdentity($this->getIdentity());
        $modul->setAcl($this->getAcl());
        $modul->setDefaultRole($this->getDefaultRole());
        $modul->setUrl($this->getUrl());
        $modul->setXmlHttpRequest($this->getXmlHttpRequest());
        $modul->setModul($this->findModul);
        return $modul->fetchContent();        
     
    }    

    /**
     * Database query
     * 
     * @param int $id integer
     */
    private function query($id)
    {
        if (null == $this->configure['modulDisplay']) {
            $limit = 10;
        } else {
            $limit = (int) $this->configure['modulDisplay'];
        }
        
        $em = $this->getStorage();
        $builder = $em->createQueryBuilder();
        $builder->select('main');
        $builder->from('Contentinum\Entity\WebContentGroups', 'main');
        $builder->where('main.webContentgroup = :id');
        $builder->andWhere('main.webContent != 1');
        
        if (false !== ($section = $this->getParameter('section'))) {
            switch ($section) {
                case 'tag':
                    if (false !== ($article = $this->getParameter('article'))) {
                        $limit = null;
                        $builder->leftJoin('Contentinum\Entity\WebContent', 'ref1', \Doctrine\ORM\Query\Expr\Join::WITH, 'ref1.id = main.webContent');
                        $builder->leftJoin('Contentinum\Entity\WebTagAssign', 'ref2', \Doctrine\ORM\Query\Expr\Join::WITH, 'ref2.webItemId = ref1.id');
                        $builder->leftJoin('Contentinum\Entity\WebTags', 'ref3', \Doctrine\ORM\Query\Expr\Join::WITH, 'ref3.id = ref2.webTagId');
                        $builder->andWhere('ref3.tagScope = :tagscope');
                        $builder->setParameter('tagscope', $article);
                        $this->backlink = 'tag/' . $article;
                    }                    
                    break;
                case 'category':
                    if (false !== ($article = $this->getParameter('article'))) {
                        $limit = null;
                        $builder->leftJoin('Contentinum\Entity\WebContent', 'ref1', \Doctrine\ORM\Query\Expr\Join::WITH, 'ref1.id = main.webContent');
                        $builder->leftJoin('Contentinum\Entity\WebTags', 'ref2', \Doctrine\ORM\Query\Expr\Join::WITH, 'ref2.id = ref1.contentCategory');
                        $builder->andWhere('ref2.tagScope = :tagscope');
                        $builder->setParameter('tagscope', $article);
                        $this->backlink = 'category/' . $article;
                    }
                    break;
                case 'archive':
                    if (false !== ($article = $this->getParameter('article'))) {
                        $limit = null;
                        $builder->leftJoin('Contentinum\Entity\WebContent', 'ref1', \Doctrine\ORM\Query\Expr\Join::WITH, 'ref1.id = main.webContent');
                        $builder->andWhere('ref1.publishDate LIKE :date');
                        $builder->setParameter('date', $article . '%');
                        $this->backlink = 'archive/' . $article;
                    }
                    break;
                default:
                    $limit = null;
                    $builder->leftJoin('Contentinum\Entity\WebContent', 'ref1', \Doctrine\ORM\Query\Expr\Join::WITH, 'ref1.id = main.webContent');
                    $builder->andWhere('ref1.source = :source');
                    $builder->setParameter('source', $section);
                    break;
            }
        } else {
            $builder->leftJoin('Contentinum\Entity\WebContent', 'ref1', \Doctrine\ORM\Query\Expr\Join::WITH, 'ref1.id = main.webContent');
        }
        $builder->andWhere('ref1.publish = :publish');
        $builder->andWhere("ref1.publishUp = '0000-00-00 00:00:00' OR ref1.publishUp <= '". date('Y-m-d H:i:s') ."'"); 
        $builder->setParameter('id', $id);
        $builder->setParameter('publish', 'yes');
        $builder->orderBy('main.publishDate', 'DESC');
        if (null === $limit) {
            $builder->setMaxResults($limit);
        }
        return $builder->getQuery()->getResult();
    }

    /**
     * 
     * @param unknown $id
     */
    private function fetchBlogGroup($id)
    {
        $sql = "SELECT main.name, main.group_style, main.group_element, main.group_element_attribute, main.group_params, wpp.url, ";
        $sql .= "wm.media_name, wm.media_link, wm.media_metas ";
        $sql .= "FROM web_content_groups AS main ";
        $sql .= "LEFT JOIN web_pages_parameter AS wpp ON wpp.id = main.content_group_page ";
        $sql .= "LEFT JOIN web_medias AS wm ON wm.id = main.headline_images ";
        $sql .= "WHERE main.id = {$id}";
        return $this->fetchRow($sql);
    }
}