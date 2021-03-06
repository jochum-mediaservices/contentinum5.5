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
 * @category Mcevent
 * @package Mapper
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 * @copyright Copyright (c) 2009-2013 jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 * @license http://www.opensource.org/licenses/bsd-license
 * @since contentinum version 5.0
 * @link      https://github.com/Mikel1961/contentinum-components
 * @version   1.0.0
 */
namespace Mcevent\Mapper;

class ModulGroupDates extends AbstactEventQueries
{

    /**
     * (non-PHPdoc)
     *
     * @see \Contentinum\Mapper\AbstractModuls::fetchContent()
     */
    public function fetchContent(array $params = null)
    {
        return $this->query($this->configure['modulParams']);
    }

    /**
     *
     * @param unknown $id
     */
    private function query($id)
    {
        $calenders = $this->groupQuery($id);
        $orWhere = '';
        foreach ($calenders as $calender) {
            if (strlen($orWhere) > 1) {
                $orWhere .= ' OR ';
            }
            $orWhere .= "mcd.calendar_id = '{$calender['calendar_id']}'";
        }        
  
        $sql = $this->eventquery();
        $sql .= "WHERE (" . $orWhere . ") ";
        if (false !== ($section = $this->getParameter('section')) && false !== ($article = $this->getParameter('article'))  ) {
            $sql .= "AND mcd.date_start LIKE '" . $section . '-' . $article . "%' ";
        } else {
            $sql .= "AND mcd.date_start LIKE '" . date('Y-m') . "%' ";
        }      
        $sql .= "AND mcd.publish = 'yes' ";
        $sql .= "ORDER BY mcd.date_start ASC;";
        $result = $this->fetchAll($sql);
        if ('html' === $this->getXmlHttpRequest()){
            return $result;
        }        
        return $result;
    }
    
    /**
     *
     * @param unknown $id
     */
    private function groupQuery($id)
    {
        return $this->fetchAll("SELECT calendar_id FROM mcevent_index WHERE groups_id = '{$id}'");
    }    
}