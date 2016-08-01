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

class Parameter extends AbstractContentHelper
{
  
    const VIEW_TEMPLATE = 'events';
    
    /**
     *
     * @var array
     */
    protected $files;
    
    /**
     * 
     * @var array
     */
    protected $displaymonthname;
    
    /**
     *
     * @var array
     */
    protected $toolbar;
    
    /**
     *
     * @var unknown
     */
    protected $schema;
    
    /**
     * 
     * @var array
     */
    protected $datepanel;
    
    /**
     *
     * @var array
     */
    protected $wrapper;
    
    /**
     *
     * @var array
     */
    protected $summary;
    
    /**
     * 
     * @var array
     */
    protected $imagesSource;
    
    /**
     *
     * @var array
     */
    protected $organizer;
    
    /**
     *
     * @var array
     */
    protected $dateStart;
    
    /**
     *
     * @var array
     */
    protected $organisation;
    
    /**
     *
     * @var unknown
     */
    protected $descriptionhead;
    
    /**
     *
     * @var unknown
     */
    protected $description;
    
    /**
     * 
     * @var array
     */
    protected $downloadfile;
    
    /**
     *
     * @var array
     */
    protected $location;
    
    /**
     *
     * @var array
     */
    protected $properties = array(
        'files',
        'displaymonthname',
        'toolbar',
        'wrapper',
        'schema',
        'datepanel',
        'summary',
        'imagesSource',
        'organizer',
        'dateStart',
        'organisation',
        'descriptionhead',
        'description',
        'downloadfile',
        'location'
    );
    
    protected $monthsname = array(
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
    
    protected $dayname = array(
        '1' => 'Montag',
        '2' => 'Dienstag',
        '3' => 'Mittwoch',
        '4' => 'Donnerstag',
        '5' => 'Freitag',
        '6' => 'Samstag',
        '7' => 'Sonntag'
    );  
    
    /**
     * 
     * @param unknown $value
     * @param string $prop
     */
    protected function convert($value, $prop = 'monthsname') 
    {
        if ( isset($this->{$prop}[$value]) ) {
            return $this->{$prop}[$value];
        } else {
            return $value;
        }
    }
}