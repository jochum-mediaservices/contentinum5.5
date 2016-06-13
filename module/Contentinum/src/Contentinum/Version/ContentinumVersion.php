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
 * @package Mapper
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 * @copyright Copyright (c) 2009-2013 jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 * @license http://www.opensource.org/licenses/bsd-license
 * @since contentinum version 5.0
 * @link      https://github.com/Mikel1961/contentinum-components
 * @version   1.0.0
 */
namespace Contentinum\Version;

use Zend\Config\Config;

class ContentinumVersion
{

    const BRAND_NAME = 'contentinum';

    const VERSIONS_NAME = 'crazy-cat';

    const VERSIONS_MAJOR_NUM = '5';

    const VERSIONS_NUM = '5';

    const VERSIONS_DATE = '03.05.2016';

    const VERSIONS_COPY = 'jochum-mediaservices';

    /**
     *
     * @var unknown
     */
    private $buildDate;
    
    /**
     *
     * @var integer
     */
    private $build;

    /**
     *
     * @return the $build
     */
    public function getBuild()
    {
        if (null === $this->build) {
            $builds = $this->getNotes();
            list ($firstKey) = array_keys($builds->toArray());
            $this->build = $firstKey;
        }
        
        return $this->build;
    }

    /**
     *
     * @param integer $build
     */
    public function addBuild($build)
    {
        $this->build = $this->build + (int) $build;
    }

    /**
     *
     * @param integer $build
     */
    public function setBuild($build)
    {
        $this->build = $build;
    }

    /**
     *
     * @return string html
     */
    public function getHtml()
    {
        $html = '<p class="con-vnumber">' . $this->get('<sup>&reg;</sup>', 'build ') . ' ' . $this->convertBuildDate() . '<br />';
        $html .= '&copy; ' . date('Y') . ' ' . self::VERSIONS_COPY . '</p>';
        return $html;
    }

    /**
     *
     * @param string $num
     */
    public function get($sign = '', $build = '')
    {
        $str = self::BRAND_NAME . $sign . ' ' . $build . self::VERSIONS_MAJOR_NUM . '.' . self::VERSIONS_NUM . '.' . $this->getBuild();
        return $str;
    }

    /**
     * Covert build date from unix timestamp
     */
    protected function convertBuildDate()
    {
        if (null === $this->buildDate) {
            $this->generatebuildDate();
        }
        return date("d. M Y H:i", $this->buildDate);
    }

    /**
     * get last build date from last write access notes file
     */
    protected function generatebuildDate()
    {
        $this->buildDate = filemtime(CON_ROOT_PATH . '/module/Contentinum/release/notes.php');
    }

    /**
     * get notes from notes php
     */
    public function getNotes()
    {
        return new Config(include CON_ROOT_PATH . '/module/Contentinum/release/notes.php');
    }

    /**
     *
     * @return array all properties
     */
    public function getArray()
    {
        $build['brand'] = self::BRAND_NAME;
        $build['major'] = self::VERSIONS_MAJOR_NUM;
        $build['name'] = self::VERSIONS_NAME;
        $build['number'] = self::VERSIONS_NUM;
        $build['date'] = $this->convertBuildDate();
        $build['copy'] = self::VERSIONS_COPY;
        $build['build'] = $this->getBuild();
        return $build;
    }
}