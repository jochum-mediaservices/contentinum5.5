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
namespace Contentinum\View\Helper;

use Zend\View\Helper\AbstractHelper;

/**
 * Handle layout sequence
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class DateTimeFormat extends AbstractHelper
{


    /**
     * 
     * @param string $time
     * @param string $formatDate
     * @param string $formatTime
     * @param string $seperator
     * @return string
     */
    public function __invoke($time = null, $formatDate = null, $formatTime = null, $pattern = null)
    {
        if (null === $time) {
            $datetime = new \DateTime();
        } else {
            $datetime = new \DateTime($time);
        }
        
        if (null === $formatDate) {
            $formatDate = \IntlDateFormatter::LONG;
        }
        
        if ('LONG' === $formatDate) {
            $formatDate = \IntlDateFormatter::LONG;
        }        
        
        if ('FULL' === $formatDate) {
            $formatDate = \IntlDateFormatter::FULL;
        }        
        
        if ('MEDIUM' === $formatDate) {
            $formatDate = \IntlDateFormatter::MEDIUM;
        } 
        
        if ('SHORT' === $formatDate) {
            $formatDate = \IntlDateFormatter::SHORT;
        }        

        if (false === $formatDate) {
            $formatDate = \IntlDateFormatter::NONE;
        } 

        if ('LONG' === $formatTime) {
            $formatTime = \IntlDateFormatter::LONG;
        }        
        
        if ('SHORT' === $formatTime) {
            $formatTime = \IntlDateFormatter::SHORT;
        }        
        
        if (null === $formatTime) {
            $formatTime = \IntlDateFormatter::NONE;
        }
        
        $fmt = new \IntlDateFormatter("de-DE", $formatDate, $formatTime); // , "Europe/Berlin", \IntlDateFormatter::GREGORIAN );
        if (null !== $pattern){
            $fmt->setPattern($pattern);
        }
        
        return $fmt->format($datetime);
    }
}