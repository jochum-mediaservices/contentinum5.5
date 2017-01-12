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

class ContactGroup extends Parameters
{

    const VIEW_TEMPLATE = 'business';

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
            switch ($this->schemakey) {
                case 'Person':
                    $human = $this->view->microdataname($entry);
                    if (1 === $entry->enableImage && '_nomedia' != $entry->contacts->contactImgSource) {
                        $cardData .= $this->deployRow($this->imagesSource, '<img src="' . $entry->contacts->contactImgSource . '" alt="' . $human . '" />');
                    }
                    
                    $cardData .= $this->deployRow($this->person, $human);
                    
                    if (1 === $entry->indexGroup->enableBusinessTitle && null != ($businesTitle = $this->view->microdataoverwrite($entry, 'contacts', 'businessTitle'))) {
                        $cardData .= $this->deployRow($this->businessTitle, $businesTitle);
                    }
                    if (1 === $entry->indexGroup->enableOrganame) {
                        $ext = ($entry->indexGroup->accounts->organisationExt) ? $this->organisation->organisationext . '<span class="organization-further">' . $entry->indexGroup->accounts->organisationExt . '</span>' : '';
                        $cardData .= $this->deployRow($this->organisation, $entry->indexGroup->accounts->organisation . $ext);
                    }
                    
                    break;
                case 'Organization':
                    if (1 === $entry->indexGroup->enableOrganame) {
                        $ext = ($entry->indexGroup->accounts->organisationExt) ? $this->organisation->organisationext . '<span class="organization-further">' . $entry->indexGroup->accounts->organisationExt . '</span>' : '';
                        $cardData .= $this->deployRow($this->organisation, $entry->indexGroup->accounts->organisation . $ext);
                    }  
                    
                    $human = $this->view->microdataname($entry);
                    if (1 === $entry->enableImage && '_nomedia' != $entry->contacts->contactImgSource) {
                        $cardData .= $this->deployRow($this->imagesSource, '<img src="' . $entry->contacts->contactImgSource . '" alt="' . $human . '" />');
                    }
                    
                    $cardData .= $this->deployRow($this->person, $human);
                    
                    if (1 === $entry->indexGroup->enableBusinessTitle && null != ($businesTitle = $this->view->microdataoverwrite($entry, 'contacts', 'businessTitle'))) {
                        $cardData .= $this->deployRow($this->businessTitle, $businesTitle);
                    }                    
                default:
            }
            
            switch ($this->schemakey) {
                case 'Person':
                    if ($this->address) {
                        $location = null;
                        $addressgrids = $this->address['grids'];
                        if (1 === $entry->indexGroup->enableOrgaddress) {
                            $account = $entry->indexGroup->accounts;
                            
                            if (strlen($account->accountStreet) > 0) {
                                $street = $account->accountStreet;
                                if (strlen($account->accountStreetNumber) > 0) {
                                    $street .= ' ' . $account->accountStreetNumber;
                                }
                                
                                if (isset($addressgrids['accountStreet'])) {
                                    $location .= $this->deployRow($addressgrids['accountStreet'], $street);
                                }
                            }
                            if (strlen($account->accountZipcode) > 0) {
                                if (isset($addressgrids['accountZipcode'])) {
                                    $location .= $this->deployRow($addressgrids['accountZipcode'], $account->accountZipcode);
                                }
                            }
                            
                            if (strlen($account->accountCity) > 0) {
                                if (isset($addressgrids['accountCity'])) {
                                    $location .= $this->deployRow($addressgrids['accountCity'], $account->accountCity);
                                }
                            }
                        } elseif (1 === $entry->indexGroup->enableAddress) {

                            if (null != ($contactAdress = $this->view->microdataoverwrite($entry, 'contacts', 'contactAddress'))) {
                                if (isset($addressgrids['accountStreet'])) {
                                    $location .= $this->deployRow($addressgrids['accountStreet'], $contactAdress);
                                }
                            }
                            if (null != ($contactZipcode = $this->view->microdataoverwrite($entry, 'contacts', 'contactZipcode'))) {
                                if (isset($addressgrids['accountZipcode'])) {
                                    $location .= $this->deployRow($addressgrids['accountZipcode'], $contactZipcode);
                                }
                            }
                            if (null != ($contactCity = $this->view->microdataoverwrite($entry, 'contacts', 'contactCity'))) {
                                if (isset($addressgrids['accountCity'])) {
                                    $location .= $this->deployRow($addressgrids['accountCity'], $contactCity);
                                }
                            }
                        }
                        if (null !== $location) {
                            $cardData .= $this->deployRow($this->address, $location);
                        }
                    }
                    
                    if (1 === $entry->enablePhoneHome && null != $entry->contacts->phoneHome) {
                        $phoneHomeTemplate = $this->phoneHome->toArray();
                        $phoneHomeTemplate['grid']['attr']['href'] = $phoneHomeTemplate['grid']['attr']['href'] . $filterDigits->filter($entry->contacts->phoneHome);
                        $cardData .= $this->deployRow($phoneHomeTemplate, $entry->contacts->phoneHome);
                    }
                    if (1 === $entry->enablePhoneMobile && null != ($phoneMobile = $this->view->microdataoverwrite($entry, 'contacts', 'phoneMobile'))) {
                        $phoneMobileTemplate = $this->phoneMobile->toArray();
                        $phoneMobileTemplate['grid']['attr']['href'] = $phoneMobileTemplate['grid']['attr']['href'] . $filterDigits->filter($phoneMobile);
                        $cardData .= $this->deployRow($phoneMobileTemplate, $phoneMobile);
                    }
                    
                    if (1 === $entry->enablePhoneWork && null != ($phoneWork = $this->view->microdataoverwrite($entry, 'contacts', 'phoneWork'))) {
                        $phoneWorkTemplate = $this->phoneWork->toArray();
                        $phoneWorkTemplate['grid']['attr']['href'] = $phoneWorkTemplate['grid']['attr']['href'] . $filterDigits->filter($phoneWork);
                        $cardData .= $this->deployRow($phoneWorkTemplate, $phoneWork);
                    }
                    if (1 === $entry->enablePhoneFax && null != ($phoneFax = $this->view->microdataoverwrite($entry, 'contacts', 'phoneFax'))) {
                        $phoneFaxTemplate = $this->phoneFax->toArray();
                        $phoneFaxTemplate['grid']['attr']['href'] = $phoneFaxTemplate['grid']['attr']['href'] . $filterDigits->filter($phoneFax);
                        $cardData .= $this->deployRow($phoneFaxTemplate, $phoneFax);
                    }
                    
                    if (1 === $entry->enableContactEmail && null != ($contactEmail = $this->view->microdataoverwrite($entry, 'contacts', 'contactEmail'))) {
                        $cardData .= $this->deployRow($this->accountEmail, $contactEmail);
                    } elseif (1 === $entry->enableContactEmail && strlen($entry->indexGroup->accounts->accountEmail) > 0) {
                        $cardData .= $this->deployRow($this->accountEmail, $entry->indexGroup->accounts->accountEmail);
                    }
                    if (1 === $entry->enableAlternateEmail && null != $entry->contacts->alternateEmail) {
                        $cardData .= $this->deployRow($this->alternateEmail, $entry->contacts->alternateEmail);
                    }
                    if (1 === $entry->enableInternet && null != ($internet = $this->view->microdataoverwrite($entry, 'contacts', 'internet'))) {
                        $cardData .= $this->deployRow($this->internet, $internet);
                    } elseif (1 === $entry->enableInternet && strlen($entry->indexGroup->accounts->internet) > 0) {
                        $cardData .= $this->deployRow($this->internet, $entry->indexGroup->accounts->internet);
                    }
                    if (1 === $entry->enableDescription && null != ($description = $this->view->microdataoverwrite($entry, 'contacts', 'description'))) {
                        $cardData .= $this->deployRow($this->description, $description);
                    }
                    
                    break;
                case 'Organization':
                    if ($this->address) {
                        if (1 === $entry->indexGroup->enableOrgaddress) {
                            $account = $entry->indexGroup->accounts;
                        
                            if (strlen($account->accountStreet) > 0) {
                                $street = $account->accountStreet;
                                if (strlen($account->accountStreetNumber) > 0) {
                                    $street .= ' ' . $account->accountStreetNumber;
                                }
                        
                                if (isset($grids['accountStreet'])) {
                                    $location .= $this->deployRow($addressgrids['accountStreet'], $street);
                                }
                            }
                        
                            if (strlen($account->accountZipcode) > 0) {
                                if (isset($addressgrids['accountZipcode'])) {
                                    $location .= $this->deployRow($addressgrids['accountZipcode'], $account->accountZipcode);
                                }
                            }
                        
                            if (strlen($account->accountCity) > 0) {
                                if (isset($grids['accountCity'])) {
                                    $location .= $this->deployRow($addressgrids['accountCity'], $account->accountCity);
                                }
                            }
                        }                        
                    }
                    $account = $entry->indexGroup->accounts;
                    if (1 === $entry->enablePhoneWork){
                        if (strlen($entry->contacts->phoneWork) > 1 ){
                            $workPhone = $entry->contacts->phoneWork;
                        } elseif (strlen($account->accountPhone) > 0){
                            $workPhone = $account->accountPhone;
                        }
                        $phoneWorkTemplate = $this->phoneWork->toArray();
                        $phoneWorkTemplate['grid']['attr']['href'] = $phoneWorkTemplate['grid']['attr']['href'] . $filterDigits->filter($account->accountPhone);
                        $cardData .= $this->deployRow($phoneWorkTemplate, $workPhone);                        
                    }
                    /*
                    if (1 === $entry->enablePhoneWork && strlen($account->accountPhone) > 0) {
                        $phoneWorkTemplate = $this->phoneWork->toArray();
                        $phoneWorkTemplate['grid']['attr']['href'] = $phoneWorkTemplate['grid']['attr']['href'] . $filterDigits->filter($account->accountPhone);
                        $cardData .= $this->deployRow($phoneWorkTemplate, $account->accountPhone);
                    }*/
                    if (1 === $entry->enablePhoneFax && strlen($account->accountFax) > 0) {
                        $phoneFaxTemplate = $this->phoneFax->toArray();
                        $phoneFaxTemplate['grid']['attr']['href'] = $phoneFaxTemplate['grid']['attr']['href'] . $filterDigits->filter($account->accountFax);
                        $cardData .= $this->deployRow($phoneFaxTemplate, $account->accountFax);
                    }
                    
                    if (1 === $entry->enableContactEmail && strlen($account->accountEmail) > 0) {
                        $cardData .= $this->deployRow($this->accountEmail, $account->accountEmail);
                    } elseif (1 === $entry->enableContactEmail && null != ($contactEmail = $this->view->microdataoverwrite($entry, 'contacts', 'contactEmail'))) {
                        $cardData .= $this->deployRow($this->accountEmail, $contactEmail);
                    }
                    if (1 === $entry->enableAlternateEmail && null != $entry->contacts->alternateEmail) {
                        $cardData .= $this->deployRow($this->alternateEmail, $entry->contacts->alternateEmail);
                    }
                    if (1 === $entry->enableInternet && strlen($account->internet) > 0) {
                        $cardData .= $this->deployRow($this->internet, $account->internet);
                    }                    
                    
                default:
            }
            
            $html .= $this->deployRow($this->schema, $cardData);
        }
        if (null !== $this->wrapper) {
            $html = $this->deployRow($this->wrapper, $html);
        }
        return $html;
    }
}