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
namespace Contentinum\View\Helper\Microdata;

use Contentinum\View\Helper\Microdata\Parameters;

class Contact extends Parameters
{

    const VIEW_TEMPLATE = 'person';

    public function __invoke($entries, $template, $media)
    {
        $templateKey = static::VIEW_TEMPLATE;
        if (isset($entries['modulFormat'])) {
            $templateKey = $entries['modulFormat'];
        }
        $this->setTemplate($template->plugins->$templateKey);
        
        $filterDigits = new \Zend\Filter\Digits();
        $html = '';
        
        foreach ($entries['modulContent'] as $entry) {
            $cardData = '';
            
            $human = $this->view->microdataname($entry, false, false);
            if ('_nomedia' != $entry->contactImgSource) {
                $cardData .= $this->deployRow($this->imagesSource, '<img src="' . $entry->contactImgSource . '" alt="' . $human . '" />');
            }
            
            //$personTemplate = $this->person->toArray();

            $cardData .= $this->deployRow($this->person, $human);
            if ($this->businessTitle && strlen($entry->businessTitle) > 1) {
                $cardData .= $this->deployRow($this->businessTitle, $entry->businessTitle);
            }            
            
            if (isset($this->address['grids'])) {
                $location = '';
                $grids = $this->address['grids'];
                if (strlen($entry->contactAddress) > 1) {
                    if (isset($grids['contactAddress'])) {
                        $location .= $this->deployRow($grids['contactAddress'], $entry->contactAddress);
                    } else {
                        $location .= $entry->contactAddress . ' ';
                    }
                }
                
                if (strlen($entry->contactZipcode) > 1) {
                    if (isset($grids['contactZipcode'])) {
                        $location .= $this->deployRow($grids['contactZipcode'], $entry->contactZipcode);
                    } else {
                        $location .= $entry->contactZipcode . ' ';
                    }
                }
                
                if (strlen($entry->contactCity) > 1) {
                    if (isset($grids['contactCity'])) {
                        $location .= $this->deployRow($grids['contactCity'], $entry->contactCity);
                    } else {
                        $location .= $entry->contactCity;
                    }
                }
                if (strlen($location) > 1) {
                    $cardData .= $this->deployRow($this->address, $location);
                }
            }
            if (strlen($entry->phoneHome) > 1) {
                $cardData .= $this->deployRow($this->phoneHome, $entry->phoneHome);
            }
            if (strlen($entry->phoneWork) > 1) {
                $cardData .= $this->deployRow($this->phoneWork, $entry->phoneWork);
            }
            if (strlen($entry->phoneFax) > 1) {
                $cardData .= $this->deployRow($this->phoneFax, $entry->phoneFax);
            }
            if (strlen($entry->contactEmail) > 1) {
                $cardData .= $this->deployRow($this->accountEmail, $entry->contactEmail);
            }
            if (strlen($entry->internet) > 1) {
                $cardData .= $this->deployRow($this->internet, $entry->internet);
            }
            if (strlen($entry->description) > 1) {
                $cardData .= $this->deployRow($this->description, $entry->description);
            }
            
            $html .= $this->deployRow($this->schema, $cardData);
        }
        if (null !== $this->wrapper) {
            $html = $this->deployRow($this->wrapper, $html);
        }
        return $html;
    }
}