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
namespace Contentinum\View\Helper\Account;

use Contentinum\View\Helper\Microdata\Parameters;

class LinkSort extends Parameters
{
    
    const VIEW_TEMPLATE = 'orga';   
    
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
        $html = '';        
        $breakloop = false;
        $character = false;
        $characters = array();
        $list = '';
        $datas = array();
        $i = 1;
        foreach ($entries['modulContent'] as $entry) {
            $cardData = '';
            $orga = $entry->account->organisationExt;
            
            if ( strlen($this->view->paramter['section']) < 1  &&  false !== $character && $character != $orga{0}){
                $breakloop = true;
            }
            
            $character = $orga{0};
            $characters[$character] = $character;     
            $dataKey = ' data-sortkey="' . $character . '"';
            
            if (false === $breakloop) {
                $organame = $entry->account->organisation . ' ' . $entry->account->organisationExt;
                $cardData .= $this->deployRow($this->organisation, $organame);
                if (strlen($entry->account->imgSource) > 0 &&  '_nomedia' != $entry->account->imgSource){
                    $img = '<img src="'.$entry->account->imgSource . '" alt="'.$organame.'" />';
                    $cardData .= $this->deployRow($this->imagesSource, $img);
                
                }                
                
                
                
                
                if ( strlen($entry->contact->lastName) > 1 ){
                    $firstName = '';
                    if ( strlen($entry->contact->firstName) > 1 ){
                        $firstName = $entry->contact->firstName . ' ';
                    }
                    $cardData .= $this->deployRow($this->person, $firstName . $entry->contact->lastName);
                }
                
                $location = null;
                $addressgrids = $this->address['grids'];
                
                if (strlen($entry->contact->contactAddress) > 1){
                    $location .= $this->deployRow($addressgrids['accountStreet'], $entry->contact->contactAddress);
                }
                
                if (strlen($entry->contact->contactZipcode) > 1){
                    $location .= $this->deployRow($addressgrids['accountZipcode'], $entry->contact->contactZipcode);
                }
                
                if (strlen($entry->contact->contactCity) > 1){
                    $location .= $this->deployRow($addressgrids['accountCity'], $entry->contact->contactCity);
                }
                
                if (null !== $location) {
                    $cardData .= $this->deployRow($this->address, $location);
                }  
                
                if (strlen($entry->contact->phoneWork) > 1){
                    $cardData .= $this->deployRow($this->phoneWork, $entry->contact->phoneWork);                    
                }

                if (strlen($entry->contact->phoneMobile) > 1){
                    $cardData .= $this->deployRow($this->phoneMobile, $entry->contact->phoneMobile);
                }                
                
                if (strlen($entry->contact->contactEmail) > 1){
                    $cardData .= $this->deployRow($this->accountEmail, $entry->contact->contactEmail);
                }   
                
                if (strlen($entry->account->internet) > 1){
                    $cardData .= $this->deployRow($this->internet, $entry->account->internet);
                }      
                
                if ( strlen($entry->account->description) > 0) {
                    $descriptionHead = $this->descriptionhead->toArray();
                    $descriptionBody = $this->description->toArray();
                    $descriptionHead['grid']['attr']['data-ident'] = 'toogleElement' . $entry->id;
                    $descriptionBody['grid']['attr']['id'] = 'toogleElement' . $entry->id;
                    $descriptionBody['grid']['attr']['class'] .= ' toogleDescription';
                    $cardData .= $this->deployRow($descriptionHead, 'Weitere Informationen');
                    $cardData .= $this->deployRow($descriptionBody, $entry->account->description);
                }                
                
                $list .= $this->deployRow($this->schema, $cardData);
            }
            $i++;
        }
        
        if ('html' === $this->view->xmlHttpRequest){
            return $list;
        }        
        if ( strlen($this->view->paramter['section']) < 1  ){
            $html .= '<h3 class="abstand-top3">Musikgruppen in Hessen nach Kommunen</h3>';
            $html .= $this->navigation($characters);
        } else {
            $html .= '<h3 class="abstand-top3">Musikgruppen in Hessen zum ausgewählten Kreis</h3>';
        }
        
        $wrapper = $this->wrapper->toArray();
        $wrapper['grid']['attr']['id'] = 'account-listing';
        $wrapper['grid']['attr']['data-modul'] = $entries['modul'];
        $wrapper['grid']['attr']['data-params'] = $entries['modulParams'];
        $wrapper['grid']['attr']['data-display'] = $entries['modulDisplay'];
        $wrapper['grid']['attr']['data-config'] = $entries['modulConfig'];
        $wrapper['grid']['attr']['data-link'] = $entries['modulLink'];
        $wrapper['grid']['attr']['data-format'] = $entries['modulFormat'];
        $wrapper['grid']['attr']['data-url'] = $this->view->url;        
        $html .=  $this->deployRow($wrapper, $list);     
        return $html;
    }
    
    
    /**
     *
     * @param unknown $characters
     * @return string
     */
    protected function navigation($characters)
    {
        $list = '<div class="small button-group member-list-buttons">';
        foreach (range('A', 'Z') as $letter) {
            //$list .= '<li>'; // class="nav-letter-list-item';
            if (isset($characters[$letter])) {
                //$list .= ' hascontent">';
                $list .= '<a href="#" class="button displaythis" data-letterkey="' . $letter . '">' . strtoupper($letter) . '</a>';
            } else {
                //$list .= '<a href="#" class="button disabled">' . strtoupper($letter) . '</a>';
            }
            //$list .= '</li>';
        }
        $list .= '</div>';
        return $list;
    }    
}