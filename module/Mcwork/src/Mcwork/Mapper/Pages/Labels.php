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
class Labels extends Worker
{

    /**
     * 
     */
    public function fetchPageLabels($grpName = 'content')
    {
        $sql = "SELECT wpp.label, wpp.url, wcg.web_content_id ";
        $sql .= "FROM web_content_groups AS wcg ";
        $sql .= "LEFT JOIN web_pages_content AS wpc ON wpc.web_contentgroup_id = wcg.web_contentgroup_id ";
        $sql .= "LEFT JOIN web_pages_parameter AS wpp ON wpp.id = wpc.web_pages_id ";
        if (false !== $grpName){
            $sql .= "WHERE wcg.content_group_name = '{$grpName}' ";
        }
        $sql .= "LIMIT 0,10000";
        return $this->fetchAll($sql);
    }
}