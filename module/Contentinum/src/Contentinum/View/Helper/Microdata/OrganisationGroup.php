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

class OrganisationGroup extends Parameters
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
            $cardData = '';
            if (1 === $entry->indexGroup->enableImages && '_nomedia' != $entry->accounts->imgSource) {
                $cardData .= $this->deployRow($this->imagesSource, '<img src="' . $entry->accounts->imgSource . '" alt="' . $entry->accounts->organisation . '" />' );
            }
            $ext = '';
            if (1 === $entry->indexGroup->enableOrganisationExt) {
                $ext = ($entry->accounts->organisationExt) ? $this->organisation->organisationext . ' <span class="organization-further">' . $entry->accounts->organisationExt . '</span>' : '';
            }
            $cardData .= $this->deployRow($this->organisation, $entry->accounts->organisation . $ext);
            
            if (isset($this->address['grids'])) {
                $location = null;
                $grids = $this->address['grids'];
                if (1 === $entry->indexGroup->enableAccountStreet && strlen($entry->accounts->accountStreet) > 0) {
                    if (isset($grids['accountStreet'])) {
                        $num = ($entry->accounts->accountStreetNumber) ? ' ' . $entry->accounts->accountStreetNumber . '' : '';
                        $location .= $this->deployRow($grids['accountStreet'], $entry->accounts->accountStreet . $num);
                    }
                }
                if (1 === $entry->indexGroup->enableAccountCity ) {
                    if (strlen($entry->accounts->accountZipcode) > 0) {
                        if (isset($grids['accountZipcode'])) {
                            $location .= $this->deployRow($grids['accountZipcode'], $entry->accounts->accountZipcode);
                        }
                    }
                    
                    if (strlen($entry->accounts->accountCity) > 0) {
                        if (isset($grids['accountCity'])) {
                            $location .= $this->deployRow($grids['accountCity'], $entry->accounts->accountCity);
                        }
                    }
                }
                if (null !== $location) {
                    $cardData .= $this->deployRow($this->address, $location);
                }
            }
            
            if (1 === $entry->indexGroup->enableAccountPhone && $this->phoneWork && strlen($entry->accounts->accountPhone) > 0) {
                $phoneWorkTemplate = $this->phoneWork->toArray();
                $phoneWorkTemplate['grid']['attr']['href'] = $phoneWorkTemplate['grid']['attr']['href'] . $filterDigits->filter($entry->accounts->accountPhone);
                $cardData .= $this->deployRow($phoneWorkTemplate, $entry->accounts->accountPhone);
            }
            
            if (1 === $entry->indexGroup->enableAccountFax && $this->phoneFax && strlen($entry->accounts->accountFax) > 0) {
                $phoneFaxTemplate = $this->phoneFax->toArray();
                $phoneFaxTemplate['grid']['attr']['href'] = $phoneFaxTemplate['grid']['attr']['href'] . $filterDigits->filter($entry->accounts->accountFax);
                $cardData .= $this->deployRow($phoneFaxTemplate, $entry->accounts->accountFax);
            }
            if (1 === $entry->indexGroup->enableAccountEmail && $this->accountEmail && strlen($entry->accounts->accountEmail) > 0) {
                $cardData .= $this->deployRow($this->accountEmail, $entry->accounts->accountEmail);
            }
            
            if (1 === $entry->indexGroup->enableInternet  &&  $this->internet && strlen($entry->accounts->internet) > 0) {
                $cardData .= $this->deployRow($this->internet, $entry->accounts->internet);
            }
            
            if (1 === $entry->indexGroup->enableDescription && $this->description && strlen($entry->accounts->description) > 0) {
                
                
                
                $descriptionHead = $this->descriptionhead->toArray();
                $descriptionBody = $this->description->toArray();
                $descriptionHead['grid']['attr']['data-ident'] = 'toogleElement' . $entry->id;
                $descriptionBody['grid']['attr']['id'] = 'toogleElement' . $entry->id;
                $descriptionBody['grid']['attr']['class'] .= ' toogleDescription';
                $cardData .= $this->deployRow($descriptionHead, 'Weitere Informationen');
                $cardData .= $this->deployRow($descriptionBody, $entry->accounts->description);                
                
                
                
                
                //$cardData .= $this->deployRow($this->description, $entry->accounts->description);
            }
            
            $html .= $this->deployRow($this->schema, $cardData);
        }
        if (null !== $this->wrapper) {
            $html = $this->deployRow($this->wrapper, $html);
        }
        return $html;
    }
}