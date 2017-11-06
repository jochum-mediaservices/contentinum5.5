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
namespace Mcwork\Mapper\Pages;

use ContentinumComponents\Mapper\Worker;

/**
 * Query contents for this request
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class Groups extends Worker
{
    /**
     * Content query
     * @param array $params query conditions
     * @return multitype:
     */
    public function fetchContent(array $params = null)
    {
        
        $sql = "SELECT main.id, wppgroup.label AS pagegroup, wpppage.label AS pagelabel, ";
        $sql .= "wppgroup.language AS grouplang, wpppage.language AS pagelang, ";
        $sql .= "wpgroup.host AS grouphost, wppage.host AS pagehost, ";
        $sql .= "wppgroup.url AS groupurl, wpppage.url AS pageurl, ";
        $sql .= "main.created_by, main.update_by, main.register_date, main.up_date ";
        $sql .= "FROM web_pages_groups AS main ";
        $sql .= "LEFT JOIN web_pages_parameter AS wppgroup ON wppgroup.id = main.group_id ";
        $sql .= "LEFT JOIN web_pages_parameter AS wpppage ON wpppage.id = main.web_pages_id ";
        $sql .= "LEFT JOIN web_preferences AS wpgroup ON wpgroup.id = wppgroup.web_preferences_id ";
        $sql .= "LEFT JOIN web_preferences AS wppage ON wppage.id = wpppage.web_preferences_id ";
        $sql .= "ORDER BY grouphost DESC, pagegroup ASC, pagelang ASC;";
        return $this->fetchAll($sql);
    }
    
    /**
     *
     * @param array $params
     * @param string $posts
     */
    public function processRequest(array $params = null, $posts = null)
    {
        return $this->fetchContent($params);
    }   
}