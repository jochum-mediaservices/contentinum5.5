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
class ModulBlogActual extends AbstractModuls
{

    /**
     * (non-PHPdoc)
     * 
     * @see \Contentinum\Mapper\AbstractModul::fetchContent()
     */
    public function fetchContent(array $params = null)
    {
        return $this->build($this->query($this->configure['modulParams']));
    }

    /**
     * Build content array from query result
     * 
     * @param array $entries database result
     * @return multitype:multitype:string unknown multitype:multitype:string unknown
     */
    private function build($entries)
    {
        $result = array();
        if ($entries) {
            $result['news'] = $entries;
            $result['group'] = $this->fetchBlogGroup($this->configure['modulParams']);
        }
        return $result;
    }

    /**
     * Build query string and execute this
     * 
     * @param int $id blog or news ident
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
        $builder->setParameter('id', $id);
        $builder->orderBy('main.publishDate', 'DESC');
        $builder->setMaxResults($limit);
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