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
namespace Mcevent\Mapper\Events;

use ContentinumComponents\Mapper\Worker;

/**
 * Query contents for this request
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class DatesIndex extends Worker
{
    /**
     * Content query
     * @param array $params query conditions
     * @return multitype:
     */
    public function fetchContent(array $params = null)
    {
        
        $sql = "SELECT mcd.id, mcd.summary, mcd.organizer, mcd.organizer_id AS organizerId, mcd.account_id AS accountId, mct.name, ";
        $sql .= "mcd.location, mcd.publish, mcd.date_start, mcd.date_end, mcd.created_by, mcd.update_by, mcd.register_date, mcd.up_date, ";
        $sql .= "orga.organisation AS organizerName, orga.organisation_ext organizerNameExt, orga.account_street AS organizerStreet, ";
        $sql .= "account.organisation AS accountName, account.organisation_ext AS accountNameExt, account.account_street AS accountStreet ";
        $sql .= "FROM mcevent_dates AS mcd ";
        $sql .= "LEFT JOIN accounts AS orga ON orga.id = mcd.organizer_id ";
        $sql .= "LEFT JOIN accounts AS account ON account.id = mcd.account_id ";
        $sql .= "LEFT JOIN mcevent_types AS mct ON mct.id = mcd.calendar_id ";
        $sql .= "ORDER BY mcd.date_start DESC;";
        return $this->fetchAll($sql);
    }
    
    /**
     *
     * @param array $params
     * @param string $posts
     */
    public function processRequest(array $params = null, $posts = null)
    {
        if (is_array($posts)){
            $params = array_merge($params,$posts);
        }
        return $this->fetchContent($params);
    }    
}