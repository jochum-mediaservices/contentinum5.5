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

use Contentinum\View\Helper\News\Images;

class App extends Images
{

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
        $numbernews = 10;
        if (false !== ($numbers = $this->getGroupParameter('numbernews'))){
            $numbernews = (int) $numbers;
        }
        $templateKey = static::VIEW_TEMPLATE;
        if (false !== ($htmlwidgets = $this->getGroupParameter('htmlwidgets'))){
            $templateKey = $htmlwidgets;
        }
        $this->setTemplate($template->plugins->$templateKey);        
        if (false !== ($headline = $this->getGroupParameter('headlineGroup'))){
            $this->groupName = $headline;
        }
        $html .= $this->groupHeader('<h1>' . $this->groupName . '</h1>');
        
        $readMoreView = false;
        if ( strlen($this->view->paramter['section']) > 1  ){
            switch ($this->view->paramter['section']){
                case 'tag':
                case 'archive':
                case 'category':
                    $numbernews = 9999; 
                    break;
                default:
                $backLink = $this->backlink->toArray();
                $readMoreView = true;
                break;
            }
        }
        
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
            
            $head .= $this->deployRow($this->headline, stripslashes($entry->webContent->headline));
            $header['grid']['attr']['id'] = $blogId;
            $article .= $this->deployRow($header, $head); 
            
            if (false === $readMoreView) {
                
                if (1 !== $entry->webContent->webMediasId->id){
                    $setSizes = null;
                    if ('mediateaserright' == $entry->webContent->htmlwidgets) {
                        $mediaTemplate = $this->mediateaserright->toArray();
                    } else {
                        $mediaTemplate = $this->mediateaserleft->toArray();
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
            } else {
                $article .= $entry->webContent->contentTeaser;
                if (1 !== $entry->webContent->webMediasId->id){
                    $article .= $this->imagesrc($entry->webContent, $entry->webContent->webMediasId, $this->media->toArray());
                }
                $article .= $this->formatElement($entry->webContent->content, $entry->webContent);
                
                $backLink["grid"]["attr"]['href'] = '/' . $this->groupurl;
                
                if ( isset($this->view->cookies['backlinkarchiv']) ) {
                    $backLink["grid"]["attr"]['class'] = $backLink["grid"]["attr"]['class'] . ' unsetBacklink';
                    $backLink["grid"]["attr"]['href'] = $this->view->cookies['backlinkarchiv'];
                }
                
                $backLink["grid"]["attr"]['title'] = $this->view->translate('Back');
                $foot = $this->deployRow($backLink, $this->view->translate('Back'));
                
                if (null !== $this->footer) {
                    $article .= $this->deployRow($this->footer, $foot);
                }                
            }
            
            
            
           $html .= $this->deployRow($this->news, $article);
           $i++;
           if ($i === $numbernews){
               break;
           }
        }        

        return $html;
    }
    
    /**
     * 
     * @param unknown $headline
     */
    protected function groupHeader($headline)
    {
        
 
        if (isset($this->groupImages['media_name']) && '_nomedia' != $this->groupImages['media_link'] ){
            
            $mediaMetas = $this->setConvertparams($this->groupImages['media_metas'], true);
            $img = '<figure class="newsgroup-images"><img src="' . $this->groupImages['media_link'] . '"';
            if (isset($mediaMetas['alt'])) {
                $img .= ' alt="' . $mediaMetas['alt'] . '"';
            }
            
            if (false !== ($title = $this->hasValue($mediaMetas, 'title'))) {
                $img .= ' title="' . $title . '"';
            }
            
            $img .= ' />';
            
            if (false !== ($caption = $this->hasValue($mediaMetas, 'caption'))) {
                $img = $img . '<figcaption class="newsgroup-images-caption">' . $caption . '</figcaption>';
            }
            
            $img .= '</figure>';
            switch ($this->getGroupParameter('imageStyles')){
                case 'above':
                    $headline = $img . $headline;
                    break;
                case 'below':
                default:
                    $headline = $headline . $img;
                    break;
            }
        }
        return $headline;
    }
    
}