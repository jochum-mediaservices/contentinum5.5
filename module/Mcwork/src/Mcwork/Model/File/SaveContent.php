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
 * @link      https://github.com/Mikel1961/contentinum-components
 * @version   1.0.0
 */
namespace Mcwork\Model\File;

use ContentinumComponents\Storage\StorageDirectory;
use ContentinumComponents\Filter\Url\Prepare;
use ContentinumComponents\File\Name;
use ContentinumComponents\File\Extension;

class SaveContent extends StorageDirectory
{
    
    /**
     * Prepare datas before save
     *
     * @see \ContentinumComponents\Mapper\Process::save()
     */
    /**
     * Prepare datas before save
     *
     * @see \ContentinumComponents\Mapper\Process::save()
     */
    public function save($datas, $entity = null, $stage = '', $id = null)
    {

        $filter = new Prepare();// 
        $filename = $this->getStorage(   $this->getSl()->get('contentinum_files_storage_manager')   )->getDocumentRoot() . DS . $this->entity->getCurrentPath();
        $filename .= DS . $filter->filter(Name::get($datas['name'])) . '.' . Extension::get($datas['name']);
        file_put_contents($filename, $datas['content']);
                
    }
    
    /**
     * 
     * @param unknown $filename
     * @return unknown
     */
    public function fetchPopulateValues($filename)
    {
        $datas['name'] = $filename;
        $dir = $this->getStorage(   $this->getSl()->get('contentinum_files_storage_manager')   )->getDocumentRoot() . DS . $this->entity->getCurrentPath();
        $datas['content'] = file_get_contents($dir . DS . $filename);
        return $datas;
    }

}