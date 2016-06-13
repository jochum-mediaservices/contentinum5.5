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
namespace Mcwork\Files;

use ContentinumComponents\Storage\StorageFiles;

/**
 * Provide methods for fs operation
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
abstract class AbstractFiles extends StorageFiles
{

    /**
     * Current fs location
     *
     * @var string
     */
    private $fsCurrent = '';

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
}