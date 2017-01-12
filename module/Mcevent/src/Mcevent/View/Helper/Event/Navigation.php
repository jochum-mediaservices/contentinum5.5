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
 * @category Mcevent
 * @package View
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 * @copyright Copyright (c) 2009-2013 jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 * @license http://www.opensource.org/licenses/bsd-license
 * @since contentinum version 5.0
 * @link      https://github.com/Mikel1961/contentinum-components
 * @version   1.0.0
 */
namespace Mcevent\View\Helper\Event;

use Contentinum\View\Helper\AbstractContentHelper;

class Navigation extends AbstractContentHelper
{

    const VIEW_TEMPLATE = 'eventnavigation';

    /**
     *
     * @var string
     */
    protected $schemakey;

    /**
     *
     * @var array
     */
    protected $topbar;

    /**
     *
     * @var string
     */
    protected $backlink;

    /**
     *
     * @var string
     */
    protected $nextlink;
    
    /**
     * 
     * @var unknown
     */
    protected $yearlinks;

    /**
     *
     * @var array
     */
    protected $wrapper;

    /**
     *
     * @var array
     */
    protected $elements;

    /**
     *
     * @var unknown
     */
    protected $monthshort = array(
        '12' => 'Dez',
        '11' => 'Nov',
        '10' => 'Okt',
        '09' => 'Sep',
        '08' => 'Aug',
        '07' => 'Jul',
        '06' => 'Jun',
        '05' => 'Mai',
        '04' => 'Apr',
        '03' => 'Mär',
        '02' => 'Feb',
        '01' => 'Jan'
    );

    /**
     *
     * @var array
     */
    protected $properties = array(
        'schemakey',
        'backlink',
        'nextlink',
        'yearlinks',
        'topbar',
        'wrapper',
        'elements'
    );

    /**
     *
     * @param unknown $entries
     * @param unknown $template
     * @param unknown $media
     */
    public function __invoke($entries, $template, $media)
    {
        $templateKey = static::VIEW_TEMPLATE;
        if (isset($entries['modulFormat'])) {
            $templateKey = $entries['modulFormat'];
        }
        $this->setTemplate($template->plugins->$templateKey);
        
        if ( strlen($this->view->paramter['section']) > 1 && strlen($this->view->paramter['article']) > 1  ){
            $active = $this->view->paramter['section'] . '/' . $this->view->paramter['article'];
            $base = (int) $this->view->paramter['section'];
        } else {
            $active = date('Y/m');
            $base = (int) date('Y');
        }
        $prevYear = $base - 1;
        $actualYear = $base;
        $nextYear = $base + 1;
        $prevLink = false;
        $nextLink = false;
        $html = '';
        $list = '';
        $elments = $this->elements->toArray();
        foreach ($entries['modulContent'] as $entry) {
            if ($prevYear == $entry['year'] && false === $prevLink) {
                $backElements = $this->elements->toArray();
                $backElements['grid']['attr']['href'] = '/' . $this->view->url . '/' . $prevYear . '/12';
                $backElements['grid']['attr']['data-section'] = $prevYear . '/12';
                $backElements['grid']['attr']['class'] .= '-back';
                $list .= $this->deployRow($backElements, $this->backlink);
                $prevLink = true;
            } elseif ($actualYear == $entry['year'] && false === $nextLink) {
                if ($active === $entry['monthlinks']){
                    $activeElements = $this->elements->toArray();
                    $activeElements['row']['attr']['class'] .= ' active';
                    $activeElements['grid']['attr']['href'] = '/' . $this->view->url . '/' . $entry['monthlinks'];
                    $activeElements['grid']['attr']['data-section'] = $entry['monthlinks'];
                    $list .= $this->deployRow($activeElements, $this->monthshort[$entry['month']]);                    
                } else {
                    $elments['grid']['attr']['href'] = '/' . $this->view->url . '/' . $entry['monthlinks'];
                    $elments['grid']['attr']['data-section'] = $entry['monthlinks'];
                    $list .= $this->deployRow($elments, $this->monthshort[$entry['month']]);
                }
            } elseif ($nextYear == $entry['year'] && false === $nextLink) {
                $elments['grid']['attr']['href'] = '/' . $this->view->url . '/' . $nextYear . '/01';
                $elments['grid']['attr']['data-section'] = $nextYear . '/01';
                $elments['grid']['attr']['class'] .= '-next';
                $list .= $this->deployRow($elments, $this->nextlink);
                $nextLink = true;
            } else {
                continue;
            }
        }
        if (strlen($list) > 1) {
            $html = $this->deployRow($this->wrapper, $list);
            if ('topbar' === $this->schemakey){
                $html = $this->deployRow($this->topbar, $html);
            }
        }
        return $html;
    }
}