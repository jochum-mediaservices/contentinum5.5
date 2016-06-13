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
namespace Contentinum\View\Helper\News;

use Contentinum\View\Helper\AbstractNewsHelper;
use ContentinumComponents\Images\CalculateResize;


class Images extends AbstractNewsHelper
{
    protected function imagesrc($content, $media, $template, $mediaStyle = null, $setSize = null)
    {
        $mediaMetas = $this->setConvertparams($media->mediaMetas, true);
        $src = $media->mediaLink;
        $img = '<img src="' . $src . '"';
        
        if (null !== $setSize) {
            if (is_array($setSize) && isset($setSize['landscape']) && false !== $setSize['landscape']) {
                $landscape = $setSize['landscape'];
                $styleAttr = ' landscape';
                if (isset($setSize['portrait']) && false !== $setSize['portrait']) {
                    $styleAttr = ' portrait';
                    $portrait = $setSize['portrait'];
                } else {
                    $styleAttr = ' portrait';
                    $portrait = $landscape;
                }
            } else {
                $portrait = $landscape = $setSize;
            }
            $resize = new CalculateResize($landscape);
            $resize->setFile(DOCUMENT_ROOT . DS . $src);
            $resize->getNewSize();
            if ('portrait' == $resize->getFormat()) {
                $resize->setTarget($portrait);
                $resize->getNewSize();
            }
            $img .= ' ' . $resize->getHtmlString();
        }
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

        
        $mediarows = $template;
        if (null !== $mediaStyle){
            $mediarows['row']['attr']['class'] .= ' ' . $mediaStyle;
        }
        if (false !== ($caption = $this->hasValue($mediaMetas, 'caption'))) {
            $mediarows['row']['content:before'] = $img;
            $images = $this->deployRow($mediarows, $caption);
        } else {
            $images = $this->deployRow(array(
                'grid' => $mediarows['row']
            ), $img);
        }
        
        return $images;
        
    }
}