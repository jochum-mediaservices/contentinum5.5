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
namespace Mcwork\Mapper\Files;

use ContentinumComponents\Path\Clean;
use ContentinumComponents\Storage\StorageDirectory;

/**
 * File explorer file system model
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 *        
 */
class Explorer extends StorageDirectory
{
    /**
     * 
     * @var unknown
     */
    private $filetype = false;
    
    /**
     * Contains images that can be displayed in the browser
     *
     * @var array
     */
    private $validImagesTypes = array(
        'image/gif',
        'image/jpeg',
        'image/png'
    );
    
    /**
     * Array of files which should not be displayed
     *
     * @var array
     */
    private $excludedFiles = array(
        'index.html'
    );
    
    /**
     * Includes available file icons
     *
     * @var array
    */
    private $fileIcons = array(
        'file' => 'fa-file'
    );    
    
    /**
     * 
     * @var unknown
     */
    private $documentRoot;

    /**
     * Mcwork\Model\Medias\Administration
     *
     * @var \Mcwork\Model\Medias\Administration
     */
    private $mediaAdministration = array();
    
    
    /**
     * Get the image types that can be displayed in the browser
     *
     * @return the $validImagesTypes
     */
    public function getValidImagesTypes()
    {
        return $this->validImagesTypes;
    }
    
    /**
     * Check if this image file has the correct image type to display in the browser
     *
     * @param string $type
     * @return boolean
     */
    public function isValidImages($type)
    {
        if (in_array($type, $this->validImagesTypes)) {
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * Check is this file icon avaibale and return
     * or check if a standard is available and return this
     * otherwise return false
     *
     * @param string $key
     * @return multitype:|boolean
     */
    public function isFileIcon($key)
    {
        if (! empty($this->fileIcons) && isset($this->fileIcons[$key])) {
            return $this->fileIcons[$key];
        } elseif (! empty($this->fileIcons) && isset($this->fileIcons['file'])) {
            return $this->fileIcons['file'];
        } else {
            return false;
        }
    }    

    /**
     * @return the $documentRoot
     */
    public function getDocumentRoot()
    {
        return $this->documentRoot;
    }

    /**
     * @param unknown $documentRoot
     */
    public function setDocumentRoot($documentRoot)
    {
        $this->documentRoot = $documentRoot;
    }

    /**
     *
     * @return the $mediaAdministration
     */
    public function getMediaAdministration()
    {
        return $this->mediaAdministration;
    }

    /**
     *
     * @param \Mcwork\Model\Medias\Administration $mediaAdministration            
     */
    public function setMediaAdministration($mediaAdministration)
    {
        $this->mediaAdministration = $mediaAdministration;
    }
    
    public function __construct($storageManager)
    {
        $this->setStorage($storageManager);
    }
    
    /**
     *
     * @param array $params
     */
    public function fetchContent(array $params = null)
    {
        /**
         * @var Mcwork\Model\Medias\Administration $mediaAdmin
         */
        $mediaAdmin = $this->getSl()->get('mcwork_media_administration');
        $this->setMediaAdministration($mediaAdmin->fetchContent());        
        
        $dir = '';
        if (isset($params['dir']) && $this->getEntity()->getCurrentPath() != $params['dir'] . '/') {
            $dir = str_replace($this->getEntity()->getCurrentPath(), '', $params['dir']);
        }
        return $this->ls($dir);
    }
    
    /**
     *
     * @param array $params
     * @param string $posts
     */
    public function processRequest(array $params = null, $posts = null)
    {
        if (isset($posts['filetype']) && false !== $posts['filetype']){
            $this->filetype = $posts['filetype'];
        }
        
        return $this->fetchContent($posts);
    }    

    /**
     * Read the contents of directory
     *
     * @param string $dir            
     * @param string $type            
     * @param string $resource            
     * @param number $usr            
     * @return Ambigous <\Mcwork\Model\multitype:Ambigous, multitype:Ambigous <\Mcwork\Model\Ambigous, boolean, \Mcwork\Model\the, multitype:> >
     */
    public function ls($dir = null, $type = 'file', $resource = 'index', $usr = 1)
    {
        return $this->buildFilesArray($this->fetchAll($this->getEntity(), $dir), $type, $resource, $usr);
    }

    /**
     * Create an array with files and or directories that are available
     * and the access is the user allowed
     *
     * @param array $entries            
     * @param string $type            
     * @param string $resource            
     * @param number $usr            
     * @return multitype:Ambigous <\Mcwork\Model\Ambigous, boolean, \Mcwork\Model\the, multitype:>
     */
    protected function buildFilesArray($entries, $type = 'file', $resource = 'index', $usr = 1)
    {
        $mediaTable = $this->getMediaAdministration(); // media table
        $this->setDocumentRoot($this->getStorage()->getDocumentRoot());
        $files = array();
        foreach ($entries as $entry) {  
            if ('pdf' === $this->filetype && 1 == preg_match('/image/', $entry->mimetype) ){
               continue;
            }
            if (false !== ($file = $this->checkAccess($entry->filename, $entry, $type, $resource, $usr, $mediaTable))) {
                if (true === $this->isValidImages($file->mediaType)) {
                    $files[$entry->filename] = array(
                        'src' => $file->mediaLink,
                        'mediaIdent' => $file->id,
                        'mediaLink' => $file->mediaLink
                    );
                } else {
                    $files[$entry->filename] = array(
                        'icon' => $this->isFileIcon('file'),
                        'mediaIdent' => $file->id,
                        'mediaLink' => 'noop'
                    );
                }
            }
        }
        return $files;
    }

    /**
     * Check if the file is present in the database and
     * whether they should be displayed this user
     *
     * @param string $filename            
     * @param ContentinumComponents\Entity\AbstractEntity $entry            
     * @param string $type            
     * @param string $resource            
     * @param number $usr            
     * @return Ambigous <\Mcwork\Model\the, boolean, multitype:>|boolean
     */
    protected function checkAccess($filename, $entry, $type, $resource, $usr, $files)
    {
        if (false === $type || $type == $entry->type) {
            $fileKey = str_replace($this->getDocumentRoot(), '', Clean::get($entry->pathname));
            if (isset($files[$fileKey]) && 0 == $files[$fileKey]->parentMedia) {
                return $this->checkAcl($files[$fileKey], $resource, $usr);
            } else {
                return false;
            }
        } else {
            return false;
        }
        return false;
    }

    /**
     * Check if the user is authorized to access this resource
     *
     * @param string $type            
     * @param string $resource            
     * @param number $usr            
     * @return boolean
     */
    protected function checkAcl($file, $resource, $usr)
    {
        return $file;
    }
}