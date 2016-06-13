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
 * @category contentinum components
 * @package View
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 * @copyright Copyright (c) 2009-2013 jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 * @license http://www.opensource.org/licenses/bsd-license
 * @since contentinum version 5.0
 * @link      https://github.com/Mikel1961/contentinum-components
 * @version   1.0.0
 */
namespace Contentinum\View\Helper;

class Contribution extends AbstractContentHelper
{

    /**
     *
     * @var unknown
     */
    protected $row;

    /**
     *
     * @var unknown
     */
    protected $grid;

    /**
     *
     * @var unknown
     */
    protected $media;

    /**
     *
     * @var unknown
     */
    protected $content;

    /**
     *
     * @var unknown
     */
    protected $properties = array(
        'row',
        'grid',
        'media',
        'content'
    );

    /**
     *
     * @param array $content
     * @param unknown $medias
     * @param array $template
     * @return Ambigous <string, multitype:>
     */
    public function __invoke($content, $template = null)
    {
        
        if ($content->webMediasId->id > 1) {
            $html = $this->view->images($content, $content->webMediasId, $template);
        } else {
            $html = $this->formatElement($content->content, $content);
        }
        
        if ($content->modul && isset($this->view->pluginViewHelper[$content->modul])) {
            $pluginViewHelper = $this->view->pluginViewHelper[$content->modul];
            if (isset($this->view->plugins[$content->modul][$content->id])) {
                $html .= $this->view->$pluginViewHelper($this->view->plugins[$content->modul][$content->id], $this->view->pluginstyles, $content->webMediasId);
            }
        }
        
        $this->unsetProperties();
        return $html;
    }
}