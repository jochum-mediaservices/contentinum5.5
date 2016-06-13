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
namespace Mcwork\Fs;

use ContentinumComponents\Storage\StorageDirectory;

/**
 * Provide methods for fs operation
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
abstract class AbstractFs extends StorageDirectory
{
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
     * Current fs location
     *
     * @var string
     */
    private $fsCurrent = '';
    
    /**
     * Path to file system ( extension to $documentRoot )
     * Shortname: fs
     *
     * @var string
     */
    private $fsPath = false;    
    
    /**
     * Document root application (not the typical dc)
     *
     * @var string
     */
    private $documentRoot = false;    
    
    /**
     * Directory seperator
     *
     * @var unknown
     */
    private $ds = false;    

    /**
     *
     * @return the $fsCurrent
     */
    public function getFsCurrent()
    {
        return $this->fsCurrent;
    }

    /**
     *
     * @param string $fsCurrent
     */
    public function setFsCurrent($fsCurrent)
    {
        $this->fsCurrent = $fsCurrent;
    }
    
    
    /**
     *
     * @return the $documentRoot
     */
    public function getDocumentRoot()
    {
        if (false === $this->documentRoot) {
            $this->documentRoot = $this->getStorage()->getDocumentRoot();
        }
        return $this->documentRoot;
    }
    
    /**
     *
     * @param string $documentRoot
     */
    public function setDocumentRoot($documentRoot = null)
    {
        if (null === $documentRoot) {
            $documentRoot = $this->getStorage()->getDocumentRoot();
        }
        $this->documentRoot = $documentRoot;
    } 
    
    /**
     *
     * @return the $fsPath
     */
    public function getFsPath()
    {
        if (false === $this->fsPath) {
            $this->fsPath = $this->getEntity()->getCurrentPath();
        }
        return $this->fsPath;
    }
    
    /**
     *
     * @param string $fsPath
     */
    public function setFsPath($fsPath = null)
    {
        if (null === $fsPath) {
            $fsPath = $this->getEntity()->getCurrentPath();
        }
        $this->fsPath = $fsPath;
    }    
    
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
     *
     * @return the $ds
     */
    public function getDs()
    {
        if (false === $this->ds) {
            $this->ds = DS;
        }
        return $this->ds;
    }
    
    /**
     *
     * @param \Mcwork\Model\unknown $ds
     */
    public function setDs($ds = null)
    {
        if (null === $ds) {
            $ds = DS;
        }
        $this->ds = $ds;
    }
    
    /**
     *
     * @param unknown $path
     * @return Ambigous <string, mixed>
     */
    public function cleanPath($path)
    {
        return \ContentinumComponents\Path\Clean::get($path);
    }    

    /**
     *
     * @param string $storage
     * @param string $entity
     */
    public function __construct($storage = null, $entity = null, $area = false)
    {
        if (null !== $storage) {
            $this->setStorage($storage);
        }
        if (null !== $entity) {
            $this->setEntity($entity);
        }
    }
    
    /**
     * Warpper for ContentinumComponents\File\Extension
     *
     * @param string $file
     * @return string
     */
    public function fileExtension($filename)
    {
        return \ContentinumComponents\File\Extension::get($filename);
    }  
    
    
    /**
     *
     * @param unknown $filename
     * @return Ambigous <string, mixed>
     */
    public function fileName($filename)
    {
        return \ContentinumComponents\File\Name::get($filename);
    }
    
    /**
     * Filter and prepare file and directory names before us in fs
     *
     * @param string $value
     * @return Ambigous <unknown, \Zend\Filter\mixed, mixed>
     */
    public function filterNames($value)
    {
        $filter = new \ContentinumComponents\Filter\Url\Prepare();
        $value = $filter->filter($value);
        unset($filter);
        return $value;
    }    
}