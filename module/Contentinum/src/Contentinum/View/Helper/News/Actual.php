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
namespace Contentinum\View\Helper\News;

use Contentinum\View\Helper\News\Images;

class Actual extends Images
{

    const VIEW_TEMPLATE = 'newsactual';

    /**
     *
     * @param array $content            
     * @param unknown $medias            
     * @param string $template            
     * @param string $teasers            
     * @return string
     */
    public function __invoke($entries, $template, $media)
    {  
        $html = '';
        $this->convertGroupParams($entries['modulContent']['group']);
        $templateKey = static::VIEW_TEMPLATE;
        if (isset($entries['modulFormat'])){
            $templateKey = $entries['modulFormat'];
        }
        $this->setTemplate($template->plugins->$templateKey);        
        $labelReadMore = $this->labelReadMore->toArray();
        $publishDate = $this->publishDate->toArray();
        $publishDate['grid']['format']['dateFormat']['attr'] = $this->getDateFormat($entries);
        $header = $this->header->toArray();
        $filter = new \Zend\Filter\HtmlEntities();
        $urlFiler = new \ContentinumComponents\Filter\Url\Prepare();     
        $i = 0;
        foreach ($entries['modulContent']['news'] as $entry) {
            $head = '';
            $article = '';
            $blogId = 'blog' . $entry->webContent->id;
            $publishDate['grid']['attr']['datetime'] = $entry->webContent->publishDate;
            $head .= $this->deployRow($publishDate, $entry->webContent->publishDate);
            $head .= $this->deployRow($this->publishAuthor, $entry->webContent->publishAuthor);

            if (null !== $this->toolbar) {
                
                $links['pdf'] = array(
                    'href' => '/' . $entry->webContent->id . '/' . $entry->webContentgroup,
                );
                $links['facebook'] = array(
                    'href' => '?u=' . urlencode($this->view->protocol . '://' . $this->view->host . '/' . $this->groupurl . '/' . $entry->webContent->source . '/' . $entry->webContent->publishDate . '#' . $blogId)
                );
                $links['sendmail'] = array(
                    'href' => '/' . $entry->webContent->id
                );
                $head .= $this->view->contenttoolbar($links, $this->toolbar->toArray());                
                
            }
            
            $head .= $this->deployRow($this->headline, $entry->webContent->headline);
            $header['grid']['attr']['id'] = $blogId;
            $article .= $this->deployRow($header, $head); 
 
            if (1 !== $entry->webContent->webMediasId->id){
                $setSizes = null;
                if ('mediateaserleft' == $entry->webContent->htmlwidgets) {
                    $mediaTemplate = $this->mediateaserleft->toArray();
                } else {
                    $mediaTemplate = $this->mediateaserright->toArray();
                } 
                
                if (false !== $this->teaserLandscapeSize){
                    $mediaStyle = '';
                    $setSizes = array(
                        'landscape' => $this->teaserLandscapeSize,
                        'portrait' => $this->teaserPortraitSize
                    );
                } else {
                    $setSizes = null;
                    $mediaStyle = 'teaser-imageitem-size';
                }
                
                $article .= $this->imagesrc($entry->webContent, $entry->webContent->webMediasId, $mediaTemplate, $mediaStyle, $setSizes);
                
            }
            
            if (isset($entries['modulContent']['archivbacklink'])){
                $labelReadMore["grid"]["attr"]['data-backlink'] = '/' . $this->groupurl . '/' . $entries['modulContent']['archivbacklink'];
                $labelReadMore["grid"]["attr"]['class'] = $labelReadMore["grid"]["attr"]['class'] . ' setBacklink';                    
            }
            
            $labelReadMore["grid"]["attr"]['href'] = '/' . $this->groupurl . '/' . $entry->webContent->source . '/' . $this->convertPublishDate($entry->webContent->publishDate) . '#' . $blogId;
            $labelReadMore["grid"]["attr"]['title'] = $entry->webContent->labelReadMore . ' zu ' . $filter->filter($entry->webContent->headline);                
                    
            if (strlen($entry->webContent->contentTeaser) > 1) {
                $article .= $entry->webContent->contentTeaser;
                $article .= $this->deployRow($labelReadMore, $entry->webContent->labelReadMore);
            } else {
                $content = $entry->webContent->content;
                if ($entry->webContent->numberCharacterTeaser > 0 && strlen($content) > $entry->webContent->numberCharacterTeaser) {
                    $content = substr($content, 0, $entry->webContent->numberCharacterTeaser);
                    $content = substr($content, 0, strrpos($content, " "));
                    $content = $content . ' ...</p>';
                    $article .= $content;
                    $article .= $this->deployRow($labelReadMore, $entry->webContent->labelReadMore);
                } else {
                    $article .= $this->formatElement($content, $entry->webContent);
                }
            }                
           $html .= $this->deployRow($this->news, $article);
           $i++;
        }        
        return $html;
    }
}