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

class Organisation extends Parameters
{

    const VIEW_TEMPLATE = 'account';

    /**
     *
     * @param unknown $entries            
     * @param unknown $medias            
     * @param string $template            
     * @return string
     */
    public function __invoke($entries, $template, $media)
    {
        $templateKey = static::VIEW_TEMPLATE;
        if (isset($entries['modulFormat'])) {
            $templateKey = $entries['modulFormat'];
        }
        $this->setTemplate($template->plugins->$templateKey);
        $filterDigits = new \Zend\Filter\Digits();
        $html = '';
        foreach ($entries['modulContent']['account'] as $entry) {
            if ('group' === $entries['modulContent']['grptype']){
                $entry = $entry->accounts;
            }
            $cardData = '';
            if ('_nomedia' != $entry->imgSource) {
                $cardData .= $this->deployRow($this->imagesSource, '<img src="' . $entry->imgSource . '" alt="' . $entry->organisation . '" />' );
            }
            
            $ext = ($entry->organisationExt) ? $this->organisation->organisationext . ' <span class="organization-further">' . $entry->organisationExt . '</span>' : '';
            $cardData .= $this->deployRow($this->organisation, $entry->organisation . $ext);
            
            if (isset($this->address['grids'])) {
                $location = null;
                $grids = $this->address['grids'];
                if (strlen($entry->accountStreet) > 0) {
                    if (isset($grids['accountStreet'])) {
                        $num = ($entry->accountStreetNumber) ? ' ' . $entry->accountStreetNumber . '' : '';
                        $location .= $this->deployRow($grids['accountStreet'], $entry->accountStreet . $num);
                    }
                }
                
                if (strlen($entry->accountZipcode) > 0) {
                    if (isset($grids['accountZipcode'])) {
                        $location .= $this->deployRow($grids['accountZipcode'], $entry->accountZipcode);
                    }
                }
                
                if (strlen($entry->accountCity) > 0) {
                    if (isset($grids['accountCity'])) {
                        $location .= $this->deployRow($grids['accountCity'], $entry->accountCity);
                    }
                }
                if (null !== $location) {
                    $cardData .= $this->deployRow($this->address, $location);
                }
            }
            
            if ($this->phoneWork && strlen($entry->accountPhone) > 0) {
                $phoneWorkTemplate = $this->phoneWork->toArray();
                $phoneWorkTemplate['grid']['attr']['href'] = $phoneWorkTemplate['grid']['attr']['href'] . $filterDigits->filter($entry->accountPhone);
                $cardData .= $this->deployRow($phoneWorkTemplate, $entry->accountPhone);
            }
            
            if ($this->phoneFax && strlen($entry->accountFax) > 0) {
                $phoneFaxTemplate = $this->phoneFax->toArray();
                $phoneFaxTemplate['grid']['attr']['href'] = $phoneFaxTemplate['grid']['attr']['href'] . $filterDigits->filter($entry->accountFax);
                $cardData .= $this->deployRow($phoneFaxTemplate, $entry->accountFax);
            }
            if ($this->accountEmail && strlen($entry->accountEmail) > 0) {
                $cardData .= $this->deployRow($this->accountEmail, $entry->accountEmail);
            }
            
            if ($this->internet && strlen($entry->internet) > 0) {
                $cardData .= $this->deployRow($this->internet, $entry->internet);
            }
            
            if ($this->description && strlen($entry->description) > 0) {
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