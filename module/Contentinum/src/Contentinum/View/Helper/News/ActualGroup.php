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

use ContentinumComponents\Images\CalculateResize;

class ActualGroup extends Images
{

    const VIEW_TEMPLATE = 'newsactual';

    public function __invoke($entries, $template, $media)
    {
        
        $templateKey = static::VIEW_TEMPLATE;
        if (isset($entries['modulFormat'])){
            $templateKey = $entries['modulFormat'];
        }
        
        if (isset($entries['modulLink'])){
            $this->shariff = $entries['modulLink'];
        } else {
            $this->shariff = 'no';
        }
        
        $this->setTemplate($template->plugins->$templateKey);   

        $labelReadMore = $this->labelReadMore->toArray();
        $publishDate = $this->publishDate->toArray();
        $publishDate['grid']['format']['dateFormat']['attr'] = $this->getDateFormat($entries);
        $filter = new \Zend\Filter\HtmlEntities();
        $html = '';
        foreach ($entries['modulContent']['news'] as $entry) {
         
                
                $article = '';
                $head = '';
                $arr = preg_split('/[\s]+/', $entry['publish_date']);
                $lnPublishDate = $arr[0];                 
                $publishDate['grid']['attr']['datetime'] = $entry['publish_date'];
                
                $head .= $this->deployRow($publishDate, $entry['publish_date']);
                if (isset($entry['publish_author'])) {
                    $head .= $this->deployRow($this->publishAuthor, $entry['publish_author']);
                }
                $blogId = 'blog' . $entry['id'];
                if (null !== $this->toolbar) {
                    $links['pdf'] = array(
                        'href' => '/' . $entry['id']
                    );
                    if ('no' == $this->shariff){
                        $links['facebook'] = array(
                            'href' => '?u=' . urlencode($this->view->protocol . '://' . $this->view->host . '/' . $entry['url'] . '/' . $entry['source'] . '/' . $entry['lnPublishDate'] . '#'.$blogId)
                        );
                    }
                    $links['sendmail'] = array(
                        'href' => '/' . $entry['id']
                    );                    
                    $head .= $this->view->contenttoolbar($links, $this->toolbar->toArray());   
                }
                
                $head .= $this->deployRow($this->headline, $entry['headline']);
                $article .= $this->deployRow($this->header, $head);
                
                if (1 !==  (int) $entry['web_medias_id'] && 'no' !== $this->displayimage) {
                    
                    if ('mediateaserleft' == $entry['htmlwidgets']) {
                        $mediaTemplate = $this->mediateaserleft->toArray();
                    } else {
                        $mediaTemplate = $this->mediateaserright->toArray();
                    }
                    $setSize = array(
                        'landscape' => $this->teaserLandscapeSize,
                        'portrait' => $this->teaserPortraitSize
                    );
                    $mediaMetas = $this->setConvertparams($entry['media_metas'], true);
                    $img = '<img src="' . $entry['media_link'] . '"';
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
                    $resize->setFile(DOCUMENT_ROOT . DS . $entry['media_link']);
                    $resize->getNewSize();
                    if ('portrait' == $resize->getFormat()) {
                        $resize->setTarget($portrait);
                        $resize->getNewSize();
                    }
                    $img .= ' ' . $resize->getHtmlString();    
                    
                    if (isset($mediaMetas['alt'])) {
                        $img .= ' alt="' . $mediaMetas['alt'] . '"';
                    }
                    
                    if (false !== ($title = $this->hasValue($mediaMetas, 'title'))) {
                        $img .= ' title="' . $title . '"';
                    }
                    
                    $img .= ' />';
                    $mediaTemplate['row']['attr']['class'] .= ' teaser-imageitem-size';
            
                    if (false !== ($caption = $this->hasValue($mediaMetas, 'caption'))) {
                        $mediaTemplate['row']['content:before'] = $img;
                        $images = $this->deployRow($mediaTemplate, $caption);
                    } else {
                        $images = $this->deployRow(array(
                            'grid' => $mediaTemplate['row']
                        ), $img);
                    } 
                    $article .= $images;
                }
                $labelReadMore["grid"]["attr"]['href'] = '/' . $entry['url'] . '/' . $entry['source'] . '/' . $entry['lnPublishDate'] . '#'.$blogId;
                $labelReadMore["grid"]["attr"]['title'] = $entry['label_read_more'] . ' zu ' . $filter->filter($entry['headline']); 
                
                
                $shariff = '';
                if ('111111' == $this->shariff){
                    $surl = $this->view->protocol . '://' . $this->view->host . '/' . $entry['url'] . '/' . $entry['source'] . '/' . $entry['lnPublishDate'] . '#'.$blogId;
                    $shariff .= '<div data-services="[&quot;facebook&quot;,&quot;twitter&quot;,&quot;googleplus&quot;,&quot;info&quot;]" data-theme="standard" data-lang="de" class="shariff" data-url="'.$surl.'" data-title="'.$entry['headline'].'" data-info-url="/social-media-buttons"></div>';
                }
                
                
                if (strlen($entry['content_teaser']) > 1) {
                    $article .= $entry['content_teaser'];
                    $article .= '<footer class="news-article-footer">';
                    $article .= $this->deployRow($labelReadMore, $entry['label_read_more']);
                    $article .= $shariff;
                    $article .= '</footer>';
                } else {
                    $content = $entry['content'];
                    if ($entry['number_character_teaser'] > 0 && strlen($content) > $entry['number_character_teaser']) {
                        $content = substr($content, 0, $entry['number_character_teaser']);
                        $content = substr($content, 0, strrpos($content, " "));
                        $content = $content . ' ...</p>';
                        $article .= $content;
                        $article .= '<footer class="news-article-footer">';
                        $article .= $this->deployRow($labelReadMore, $entry['label_read_more']);
                        $article .= $shariff;
                        $article .= '</footer>';
                    } else {
                        $article .= $content;
                        $article .= '<footer class="news-article-footer">';
                        $article .= $shariff;
                        $article .= '</footer>';
                    }
                }
                //$article .= '<p><a class="button expand" title="Lesen Sie mehr" href="#">Lesen Sie mehr</a></p>';
                //$newtemplate = $this->news->toArray();
                //$newtemplate['grid']['content:after:outside'] = '<p><a class="button expand" title="Lesen Sie mehr" href="#">Lesen Sie mehr</a></p>';
                $html .= $this->deployRow($this->news, $article);
            
        }
        
        if (null !== $this->wrapper) {
            $html = $this->deployRow($this->wrapper, $html);
        }
        
        return $html;
    }
}