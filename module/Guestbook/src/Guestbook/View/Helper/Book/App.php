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
        $filter = new TextToHtml();
        $html .= $html = '<div class="server-process"> </div><div id="orderform"> </div>';
        $html .= '<p class="orderinfo"><a href="#" class="button guestbookentry">Wir freuen uns &uuml;ber einen Eintrag</a></p>';
        foreach ($entries['modulContent'] as $entry) {
            $html .= '<div class="callout callout-shadow panel bookentry">';
            $html .= $filter->filter(stripslashes($entry->com));
            $html .= '<p>' . $entry->name  . ', ' . $entry->registerDate->format('d.m.Y') . '</p>';
            $html .= '</div>';
        }
        return $html;
    }
}