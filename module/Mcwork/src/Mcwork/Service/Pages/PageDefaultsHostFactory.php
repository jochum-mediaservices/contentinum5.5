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
namespace Mcwork\Service\Pages;

use Contentinum\Service\WebsiteServiceFactory;
use Zend\Config\Config;



/**
 * Content of full media table to use in backend
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class PageDefaultsHostFactory extends WebsiteServiceFactory
{

    /**
     * Cache key media table
     *
     * @var string
     */
    const CONTENTINUM_DATABASE = 'mcwork_pagedefaultshost';

    /**
     * Name cache factory
     *
     * @var string
     */
    const CONTENTINUM_CACHE = 'mcwork_cache_structures';

    /**
     * (non-PHPdoc)
     *
     * @see \Contentinum\Service\WebsiteServiceFactory::queryDbCacheResult()
     */
    protected function queryDbCacheResult($config, $sl)
    {
        $result = array();
        $cache = $sl->get(static::CONTENTINUM_CACHE);
        $key = $config['cache'];
        if (! ($result = $cache->getItem($key))) {
            $worker = new \Mcwork\Mapper\Pages\PageHost($sl->get($config['entitymanager']));
            $datas = $worker->fetchPageLabels(array('defaults' => true));
            $tmp = array();
            foreach ($datas as $row) {
                $tmp[$row['id']] = array( 'name' => $row['label'] . ' /' . $row['url'] . ' (' . $row['language'] . ') ' . $row['host']);
            }
            $result = new Config($tmp);
            if (isset($config['savecache']) && true === $config['savecache']){
                $cache->setItem($key, $result);
            }
        }
        return $result;
    }
}