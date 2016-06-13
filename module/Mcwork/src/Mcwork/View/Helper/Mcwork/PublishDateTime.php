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
 * @category Mcwork
 * @package View
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 * @copyright Copyright (c) 2009-2013 jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 * @license http://www.opensource.org/licenses/bsd-license
 * @since contentinum version 5.0
 * @link      https://github.com/Mikel1961/contentinum-components
 * @version   1.0.0
 */
namespace Mcwork\View\Helper\Mcwork;

use Zend\View\Helper\AbstractHelper;

/**
 * Select form element
 * Created a selection form field with the number of data sets of a group
 * Displays the number in the order of the group
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class PublishDateTime extends AbstractHelper
{

    const NO_DATE_TEXT = 'Kein Datum festgelegt';
    
    private $monthsname = array(
        '01' => 'Januar',
        '02' => 'Februar',
        '03' => 'März',
        '04' => 'April',
        '05' => 'Mai',
        '06' => 'Juni',
        '07' => 'Juli',
        '08' => 'August',
        '09' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Dezember'
    );
    
    private $dayname = array(
        '1' => 'Montag',
        '2' => 'Dienstag',
        '3' => 'Mittwoch',
        '4' => 'Donnerstag',
        '5' => 'Freitag',
        '6' => 'Samstag',
        '7' => 'Sonntag'
    );    

    private $status = array(
        'isup' => 'Online seit',
        'isdown' => 'Offline seit',
        'goup' => 'Online ab',
        'godown' => 'Offline ab',
        'up' => 'Online',
        'down' => 'Offline'
    )
    ;

    private $statusicon = array(
        'isup' => '<i class="fa fa-globe emerald-color"> </i>',
        'isdown' => '<i class="fa fa-ban alizarin-color"></i>',
        'goup' => '<i class="fa fa-clock-o emerald-color"></i>',
        'godown' => '<i class="fa fa-clock-o alizarin-color"></i>'
    )
    ;

    public function __invoke($value, $switch, $status)
    {
        if ('0000-00-00 00:00:00' === $value) {
            return $this->status[$switch] . ': ' . self::NO_DATE_TEXT . '<i class="fa fa-check emerald-color"></i>';
        } else {
            
            $actual = date('Y-m-d H:i:s');
            $datetime = new \DateTime($value);
            $date = $this->dayname[$datetime->format('N')] . ', ' . $datetime->format('d') . '. ' . $this->monthsname[$datetime->format('m')] . ' ' . $datetime->format('Y');
            $str = '';
            if ('up' === $switch) {
               
                if ($actual > $value) {
                    $str .= $this->status['isup'] . ' <time>' . $date . '</time> ' . $this->statusicon['isup'];
                } elseif ($actual < $value) {
                    $str .= $this->status['goup'] . ' <time>' . $date . '</time> ' . $this->statusicon['goup'];
                }
            } elseif ('down' === $switch) {
                if ($actual >= $value) {
                    $str .= $this->status['isdown'] . ' <time>' . $date . '</time> ' . $this->statusicon['isdown'];
                } elseif ($actual < $value) {
                    $str .= $this->status['godown'] . ' <time>' . $date . '</time> ' . $this->statusicon['godown'];
                }
            }
            return $str;
        }
    }
}