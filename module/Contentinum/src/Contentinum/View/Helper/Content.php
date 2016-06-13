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
class Content extends AbstractHelper 
{
	
	/**
	 * Converts bytes into KB, MB, GB or TB
	 *
	 * @param int $bytes
	 *        	file size in bytes
	 * @return string
	 */
	public function __invoke($entries, $adjustments = 'CONTENT') 
	{
	    
	    $html = '';
	    $overwrite = '';
	    foreach ($entries['content'] as $row){
	        if ($adjustments === $row->adjustments){

    	        switch ($row->webContentgroup->groupStyle){
    	            case 'none':
    	                if (1 === $row->webContentgroup->webContent->overwrite){
    	                   $overwrite .= $this->view->contribution($row->webContentgroup->webContent,$this->view->contentstyles);
    	                } else {
    	                   $html .= $this->view->contribution($row->webContentgroup->webContent,$this->view->contentstyles);
    	                }
    	                break;
    	            default:
    	                if ('nonestyle' == $row->webContentgroup->groupStyle) {
    	                    $html .= $this->view->nonestyle($entries['groups'],$row->webContentgroup->webContentgroup,array(),$this->view->contentstyles);
    	                } elseif (null !== ($groupstyles = $this->view->groupstyles->styles->{$row->webContentgroup->groupStyle})){
    	                    $viewHelper = $groupstyles->viewhelper;
    	                    $html .= $this->view->$viewHelper($entries['groups'],$row->webContentgroup->webContentgroup,$groupstyles->toArray(),$this->view->contentstyles);
    	                }
    	                break;
    	        }
    	        
    	        if ('none' !== $row->htmlwidgets){
    	            if (null !== ($widgets = $this->view->widgets->widgets->{$row->htmlwidgets})){
    	                $html = $this->view->contentrow($html,$widgets);
    	            }
    	        }
	    
	        }
	    }
	    if (strlen($html) == 0){
	        $html = $overwrite;
	    }
	    return $html;
	}
}