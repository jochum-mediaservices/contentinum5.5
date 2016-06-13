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
 * @category Mcwork
 * @package Model
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 * @copyright Copyright (c) 2009-2013 jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 * @license http://www.opensource.org/licenses/bsd-license
 * @since contentinum version 5.0
 * @link https://github.com/Mikel1961/contentinum-components
 * @version 1.0.0
 */
namespace Mcwork\Model\Cache;

use ContentinumComponents\Mapper\Process;

class DeleteCache extends Process
{
    const CONTENTINUM_CACHE = 'contentinum_cache_public';
    
    const CONTENTINUM_CACHE_STRUCTURE = 'contentinum_cache_struture';
    /**
     * 
     * @param string $key
     */
    protected function emptyCache($key = null)
    {
        if (null !== $key){
            $cache = new Content();
            $cache->setSl($this->getSl());
            $cache->emptyCache(array('id' => $key));            
        }
    }
    
    /**
     * 
     * @param string $key
     */
    protected function emptyPublicCache($key = null)
    {
        if (null !== $key){
            try {
                $cache = $this->getSl()->get(static::CONTENTINUM_CACHE);
                if ($cache->hasItem($key)) {
                    $cache->removeItem($key);
                }
            } catch (\Exception $e){
                $e->getMessage();
            }
        }
    }
    
    /**
     *
     * @param string $key
     */
    protected function emptyAppCache($key = null, $cacheKey = 'contentinum_cache_struture')
    {
        if (null !== $key){
            try {
                $cache = $this->getSl()->get($cacheKey);
                if ($cache->hasItem($key)) {
                    $cache->removeItem($key);
                }
            } catch (\Exception $e){
                $e->getMessage();
            }
        }
    }    
}