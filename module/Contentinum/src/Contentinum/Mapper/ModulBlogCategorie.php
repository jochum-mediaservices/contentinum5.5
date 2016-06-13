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
class ModulBlogCategorie extends AbstractModuls
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
        
        $sql = "SELECT wpp.url, main.id, main.htmlwidgets, main.source, main.headline, main.content_teaser, main.content, main.publish_date, main.publish_author, main.author_email, ";
        $sql .= "DATE_FORMAT(main.publish_date,'%Y/%m/%d') AS lnPublishDate, ";
        $sql .= "main.number_character_teaser, main.label_read_more, wm.media_name, wm.media_link, wm.media_metas ";
        $sql .= "FROM web_content AS main ";
        $sql .= "LEFT JOIN web_content_groups AS wcg ON wcg.web_content_id = main.id ";
        $sql .= "LEFT JOIN web_pages_parameter AS wpp ON wpp.id = wcg.content_group_page ";
        $sql .= "LEFT JOIN web_medias AS wm ON wm.id = main.web_medias_id ";
        $sql .= "WHERE main.content_category = {$id} ";
        $sql .= "ORDER BY main.publish_date DESC ";
        $sql .= "LIMIT 0, {$limit};";
        return $this->fetchAll($sql);
    }
}