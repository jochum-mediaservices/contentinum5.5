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
class Registrations extends Worker
{

    /**
     * Content query
     * 
     * @param array $params query conditions
     * @return multitype:
     */
    public function fetchContent(array $params = null)
    {
        
        $sql = "SELECT mdr.id, mdr.name, mdr.surname, mdr.phone, mdr.email, ";
        $sql .= "md.date_start, md.summary, ";
        $sql .= "mdr.created_by, mdr.update_by, mdr.register_date, mdr.up_date ";
        $sql .= "FROM mcevent_dates_register AS mdr ";
        $sql .= "LEFT JOIN mcevent_dates AS md ON md.id = mdr.mcevent_id ";
        $sql .= "ORDER BY md.date_start DESC, mdr.name ASC;";
        return $this->fetchAll($sql);
    }

    /**
     *
     * @param array $params
     * @param string $posts
     */
    public function processRequest(array $params = null, $posts = null)
    {
        if (is_array($posts)) {
            $params = array_merge($params, $posts);
        }
        return $this->fetchContent($params);
    }
}