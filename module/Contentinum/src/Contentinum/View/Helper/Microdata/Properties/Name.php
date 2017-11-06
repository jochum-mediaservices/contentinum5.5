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
namespace Contentinum\View\Helper\Microdata\Properties;

use Zend\View\Helper\AbstractHelper;

/**
 * Handle layout sequence
 *
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class Name extends AbstractHelper 
{
	
	/**
	 * Converts bytes into KB, MB, GB or TB
	 *
	 * @param int $bytes
	 *        	file size in bytes
	 * @return string
	 */
	public function __invoke($entry, $group = true, $base = 'contacts') 
	{
	    $result = '';
	    if (false === $base){
	        if (strlen($entry->salutation) > 0 ){
	            $result .= $this->salutation($entry->salutation) . ' ';
	        }
	        if ( strlen($entry->title) > 0 ){
	            $result .= $entry->title . ' ';
	        }
	        if ( strlen($entry->firstName) > 0 ){
	            $result .= $entry->firstName . ' ';
	        }	        	
	        if ( strlen($entry->lastName) > 0 ){
	            $result .= $entry->lastName;
	        }	
	        if ( strlen($entry->nameExtension) > 0 ){
	            $result .= ', ' . $entry->nameExtension;
	        }	        
	    } else {
    	    if (1 === $entry->indexGroup->enableSalutation){
    	        $result .= $this->salutation($entry->{$base}->salutation) . ' ';
    	    }
    	    if (1 === $entry->indexGroup->enableTitle){
    	        $result .= $entry->{$base}->title . ' ';
    	    }	    
    	    if (1 === $entry->indexGroup->enableFirstName ){
    	        $result .= $entry->{$base}->firstName . ' ';
    	    }
    	    
    	    if (1 === $entry->indexGroup->enableLastName ){
    	        $result .= $entry->{$base}->lastName;
    	        
    	        if ( strlen($entry->{$base}->nameExtension) > 0 ){
    	            $result .= ', ' . $entry->{$base}->nameExtension;
    	        }    	        
    	        
    	    }	    
	    }
	    return $result;
	}
	
	/**
	 *
	 * @param unknown $var
	 * @return string
	 */
	protected function salutation($var)
	{
	    $str = '';
	    switch ($var) {
	        case 'mr':
	            $str = 'Herr ';
	            break;
	        case 'ms':
	            $str = 'Frau ';
	            break;
	        default:
	            break;
	    }
	    return $str;
	}	
}