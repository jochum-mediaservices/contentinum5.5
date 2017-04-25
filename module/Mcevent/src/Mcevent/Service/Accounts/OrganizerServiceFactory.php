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
 * @package Service
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 * @copyright Copyright (c) 2009-2013 jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 * @license http://www.opensource.org/licenses/bsd-license
 * @since contentinum version 5.0
 * @link      https://github.com/Mikel1961/contentinum-components
 * @version   1.0.0
 */
namespace Mcevent\Service\Accounts;

use Contentinum\Service\WebsiteServiceFactory;
use ContentinumComponents\Mapper\Worker;
use Zend\Config\Config;

class OrganizerServiceFactory extends WebsiteServiceFactory
{

    /**
     * Cache key page table
     *
     * @var string
     */
    const CONTENTINUM_DATABASE = 'mcevent_organizer';

    /**
     * Name cache factory
     *
     * @var string
     */
    const CONTENTINUM_CACHE = 'mcwork_cache_data';

    protected function queryDbCacheResult($config, $sl)
    {
        $result = array();
        $cache = $sl->get(static::CONTENTINUM_CACHE);
        $key = $config['cache'];
        if (! ($result = $cache->getItem($key))) {
            $worker = new Worker($sl->get($config['entitymanager']));
            
            $entries = $worker->getStorage()
                ->getRepository($config['entity'])
                ->findBy(array(
                'eventOrganizer' => 1
            ), array(
                'organisation' => 'ASC'
            ));
            
            $tmp = array();
            foreach ($entries as $entry) {
                $ext = '';
                if (strlen($entry->organisationExt) > 1){
                    $ext = $entry->organisationExt;
                }
                
                $tmp[$entry->id] = array(
                    'name' => $entry->organisation . ', ' . $ext,
                );
            }
            $result = new Config($tmp);
            if (isset($config['savecache']) && true === $config['savecache']) {
                $cache->setItem($key, $result);
            }
        }
        return $result;
    }
}