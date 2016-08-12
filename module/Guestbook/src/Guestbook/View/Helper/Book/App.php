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
 * @category Municipal
 * @package View
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 * @copyright Copyright (c) 2009-2013 jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 * @license http://www.opensource.org/licenses/bsd-license
 * @since contentinum version 5.0
 * @link      https://github.com/Mikel1961/contentinum-components
 * @version   1.0.0
 */
namespace Guestbook\View\Helper\Book;

use Contentinum\View\Helper\AbstractContentHelper;
use ContentinumComponents\Filter\TextToHtml;

class App extends AbstractContentHelper
{
    const VIEW_TEMPLATE = 'guestbook';    
    
    /**
     *
     * @var unknown
     */
    protected $schemakey;
    
    /**
     *
     * @var array
     */
    protected $properties = array(
        'schemakey',
    );    
    
    /**
     *
     * @param unknown $entries
     * @param unknown $medias
     * @param string $template
     * @return string
     */
    public function __invoke($entries, $template, $media)
    {
        $html = '';
        $total = 0;
        if (isset($entries['modulContent']['count'])){
            $total = $entries['modulContent']['count'];
        }
        $i = 0;        
        $filter = new TextToHtml();
        foreach ($entries['modulContent']['entries'] as $entry) {
            $html .= '<div class="bookentry callout callout-shadow panel">';
            $html .= $filter->filter(stripslashes($entry->com));
            $html .= '<p>' . $entry->name  . ', ' . $entry->registerDate->format('d.m.Y') . '</p>';
            $html .= '</div>';
            $i++;
        }
        if ('html' === $this->view->xmlHttpRequest){
            return $html;
        }   
        
        $form = '<div class="server-process"> </div><div id="orderform"> </div>';
        $form .= '<p class="orderinfo"><a href="#" class="button guestbookentry">Wir freuen uns &uuml;ber einen Eintrag</a></p>';
        
        $html = $form . '<div id="guestbookentries">' . $html . '</div>';
        $html .= $this->pagination($entries,$total);
        return $html;
    }
    
    /**
     *
     * @param unknown $numberOfRows
     * @param number $resultsPerPage
     */
    protected function pagination($entries, $numberOfRows, $resultsPerPage = 5)
    {
        $totalPages = ceil($numberOfRows / $resultsPerPage);
    
        $wrapper = array();
        $wrapper['data-modul'] = $entries['modul'];
        $wrapper['data-params'] = $entries['modulParams'];
        $wrapper['data-display'] = $entries['modulDisplay'];
        $wrapper['data-config'] = $entries['modulConfig'];
        $wrapper['data-link'] = $entries['modulLink'];
        $wrapper['data-format'] = $entries['modulFormat'];
        $wrapper['data-url'] = $this->view->url;
        $dataAttr = '';
        foreach ($wrapper as $attr => $v){
            if (strlen($v) > 0 ){
                $dataAttr .= ' ' . $attr . '="' . $v . '"';
            }
        }
    
    
        $html = '<ul id="pagination"'.$dataAttr.'>';
        $firstResult = 0;
        for($i = 1; $i <= $totalPages; $i++)
        {
            $next = '';
            if (2 == $i){
                $next = ' class="next"';
            }
            $firstResult =  $firstResult + $resultsPerPage;
            $html .= '<li'.$next.' data-url="set/' . $firstResult . '"><a href="/' . $this->view->url . '/set/' . $firstResult . '" data-url="set/' . $firstResult . '">' . $i . '</a></li>';
        }
        $html .= '</ul>';
        //$html .= '<p><a href="#" class="btn-floating btn-large waves-effect waves-light red addcontent"> <i class="fa fa-plus" aria-hidden="true"> </i></a></p>';
        //$html .= '<p><a href="#" class="btn-floating btn-large waves-effect waves-light red addcontent"> <i class="material-icons" aria-hidden="true">add</i></a></p>';
        return $html;
    }    
}