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

/**
 * Directory and path file system model
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 *        
 */
class MakeDir extends AbstractFs
{

    /**
     * Name of the folder to create in fs
     * 
     * @var string
     */
    private $newDirectory = false;

    /**
     * Create a new directory
     */
    public function mkdir()
    {
        return $this->makeDirectory($this->getNewDirectory(), $this->getEntity(), $this->getFsCurrent());
    }

    /**
     *
     * @return the $newDirectory
     */
    public function getNewDirectory()
    {
        return $this->newDirectory;
    }

    /**
     * Set new directory name and
     * 
     * @param string $newDirectory
     */
    public function setNewDirectory($newDirectory, $clean = true)
    {
        if (true === $clean) {
            $newDirectory = $this->filterNames($newDirectory);
        }
        $this->newDirectory = $newDirectory;
    }
}