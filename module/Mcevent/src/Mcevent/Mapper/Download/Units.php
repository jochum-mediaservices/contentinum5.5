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
namespace Mcevent\Mapper\Download;

use ContentinumComponents\Mapper\Worker;

/**
 * Query contents for this request
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class Units extends Worker
{
    /**
     * 
     * @var string
     */
    private $calendarName;
    
    /**
     * @return the $calendarName
     */
    public function getCalendarName()
    {
        return $this->calendarName;
    }

    /**
     * @param string $calendarName
     */
    public function setCalendarName($calendarName)
    {
        $this->calendarName = $calendarName;
    }

    /**
     * Content query
     * @param array $params query conditions
     * @return multitype:
     */
    public function fetchContent(array $params = null)
    {
        
        $sql = "SELECT mcd.id, mcd.configure_id AS configIdent, mcd.summary, mcd.organizer_id AS organizerId, mcd.organizer, mcd.location, mcd.location_addresse AS locationAddresse, mcd.location_zipcode AS locationZipcode, ";
        $sql .= "mcd.account_id AS accountId, mcd.location_city AS locationCity, mcd.description, mcd.latitude, mcd.longitude, mcd.info_url AS infoUrl, ";
        $sql .= "mcd.web_files_id AS webFilesId, mcd.download_label AS downloadLabel, mcd.date_start AS dateStart, mcd.date_end AS dateEnd, ";
        // organizer
        $sql .= "orga.organisation AS organizerName, orga.organisation_ext organizerNameExt, orga.account_street AS organizerStreet, ";
        $sql .= "orga.account_street_number AS organizerStreetNum, orga.account_zipcode AS organizerZipcode, orga.account_city AS organizerCity, ";
        // location
        $sql .= "account.organisation AS accountName, account.organisation_ext AS accountNameExt, account.account_street AS accountStreet, ";
        $sql .= "account.account_street_number AS accountStreetNum, account.account_zipcode AS accountZipcode, account.account_city AS accountCity, ";
        // medias
        //$sql .= "medias.id AS webMediasId, medias.media_link AS mediaLink, medias.media_metas AS mediaMetas ";
        $sql .= "mcd.up_date AS lastModified ";
        $sql .= "FROM mcevent_dates AS mcd ";
        $sql .= "LEFT JOIN accounts AS orga ON orga.id = mcd.organizer_id ";
        $sql .= "LEFT JOIN accounts AS account ON account.id = mcd.account_id ";
        //$sql .= "LEFT JOIN web_medias AS medias ON medias.id = mcd.web_medias_id ";
        $sql .= "LEFT JOIN mcevent_types AS mcetype ON mcetype.id = mcd.calendar_id ";
        $sql .= "WHERE mcd.calendar_id = 91 ";
        $sql .= "AND mcd.publish = 'yes' ";
        $sql .= "AND mcd.date_start LIKE '2017%' ";
        $sql .= "ORDER BY mcd.date_start ASC;";
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
    
    /**
     *
     * @param unknown $ident
     */
    public function services($params, $remoteIP)
    {
        $result = $this->getStorage()->getRepository( 'Mcevent\Entity\MceventTypes' )->findBy(array('id' => $params['category']));
        if (empty($result)){
            return false;
        } else {
            foreach ($result as $row){
                $this->setCalendarName($row->name);
                return $row->id;
            }
        }
    }
}