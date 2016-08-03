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
 * @category Contentinum
 * @package View
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 * @copyright Copyright (c) 2009-2013 jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 * @license http://www.opensource.org/licenses/bsd-license
 * @since contentinum version 5.0
 * @link      https://github.com/Mikel1961/contentinum-components
 * @version   1.0.0
 */
namespace Contentinum\View\Helper\Navigation;

use Contentinum\View\Helper\AbstractContentHelper;


class Sitemap extends AbstractContentHelper
{
    const VIEW_TEMPLATE = 'navigation';
    /**
     * 
     * @var unknown
     */
    protected $ulclass;
    
    /**
     * 
     * @var unknown
     */
    protected $list;
    
    /**
     * 
     * @var unknown
     */
    protected $wrapper;


    /**
     *
     * @var unknown
     */
    protected $properties = array(
        'ulclass',
        'list',
        'wrapper',
    );

    /**
     *
     * @param array $content
     * @param unknown $medias
     * @param array $template
     * @return Ambigous <string, multitype:>
     */
    public function __invoke($entry, $template)
    {
        
        $templateKey = static::VIEW_TEMPLATE;
        if (isset($entry['modulFormat'])){
            $templateKey = $entry['modulFormat'];
        }
        $this->setTemplate($template->plugins->$templateKey);        

        $html = '';
        if (isset($entry['modulContent']['headline'])){
            $html = '<' . $entry['modulContent']['tags'] . '>' . $entry['modulContent']['headline'] . '</' . $entry['modulContent']['tags'] . '>';
        }
        
        $navlist = $entry['modulContent']['nav'];
        
        $ulClass = 'sitemap-html';
        
        
        $container = new \Zend\Navigation\Navigation($navlist);
        $html .= $this->view->navigationcontentinum($container)->setAcl($this->view->acl)->setRole($this->view->role)->setUlClass($ulClass);
        
        if ($this->wrapper){
            $html = $this->deployRow($this->wrapper, $html);
        }
        
        $this->unsetProperties();
        return $html;
    }
}