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
 * @package View
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 * @copyright Copyright (c) 2009-2013 jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 * @license http://www.opensource.org/licenses/bsd-license
 * @since contentinum version 5.0
 * @link      https://github.com/Mikel1961/contentinum-components
 * @version   1.0.0
 */
namespace Contentinum\View\Helper\Medias;

use ContentinumComponents\Tools\HandleSerializeDatabase;
use Contentinum\View\Helper\AbstractContentHelper;

class Images extends AbstractContentHelper
{

    const VIEW_TEMPLATE = '_defaultimages';

    /**
     *
     * @var unknown
     */
    protected $direction;

    /**
     *
     * @var unknown
     */
    protected $wrapper;

    /**
     *
     * @var unknown
     */
    protected $block;

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
        'direction',
        'wrapper',
        'block',
        'media',
        'content'
    );

    /**
     *
     * @param unknown $article
     * @param unknown $medias
     * @param string $template
     * @param string $setSize
     * @return string
     */
    public function __invoke($content, $media, $template, $setSize = null, $onlyImg = false)
    {
        $htmlwidgets = '';
        if ('nomediastyle' !== $content->htmlwidgets) {
            $htmlwidgets = $content->htmlwidgets;
            if ($template->contribution->$htmlwidgets) {
                $this->setTemplate($template->contribution->$htmlwidgets);
            } elseif ($template->contribution->_defaultimages) {
                $this->setTemplate($template->contribution->_defaultimages);
            } else {
                $onlyImg = true;
            }
        }
        
        $size = null;
        $src = $media->mediaLink;
        $unserialize = new HandleSerializeDatabase();
        $mediaMetas = $unserialize->execUnserialize($media->mediaMetas);
        $styleAttr = '';
        $img = '<img src="' . $src . '"';
        

        if (isset($mediaMetas['alt'])) {
            $img .= ' alt="' . $mediaMetas['alt'] . '"';
        }
        
        if (false !== ($title = $this->hasValue($mediaMetas, 'title'))) {
            $img .= ' title="' . $title . '"';
        }
        
        $img .= ' />';
        
        if (strlen($content->mediaLinkUrl) > 0) {
            $img = '<a href="' . $content->mediaLinkUrl . '">' . $img . '</a>';
        }
        
        if (true === $onlyImg || 'nomediastyle' === $content->htmlwidgets) {
            $this->unsetProperties();
            return $this->formatElement($img . $content->content, $content);
        }
        
        $mediarows = $this->media->toArray();
        $mediarows['row']['attr']['class'] .= ' ' . $content->mediaStyle;
        if (false !== ($caption = $this->hasValue($mediaMetas, 'caption'))) {
            $mediarows['row']['content:before'] = $img;
            $images = $this->deployRow($mediarows, $caption);
        } else {
            $images = $this->deployRow(array(
                'grid' => $mediarows['row']
            ), $img);
        }
        
        switch ($this->direction) {
            case 'left':
                $html = $this->deployRow($this->wrapper, $this->deployRow($this->block, $images) . $this->deployRow($this->content, $this->formatElement($content->content, $content)));
                break;
            case 'right':
                $html = $this->deployRow($this->wrapper, $this->deployRow($this->content, $this->formatElement($content->content, $content)) . $this->deployRow($this->block, $images));
                break;
            default:
                if (1 === $content->mediaPlaceholder) {
                    $html = $this->formatElement(str_replace('{MEDIAPLACE}', $images, $content->content), $content);
                } else {
                    $html = $this->formatElement($images . $content->content, $content);
                }
                break;
        }
        $this->unsetProperties();
        $mediarows = null;
        $images = null;
        return $html;
    }

}