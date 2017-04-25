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



class DatesRow extends Parameter
{


    /**
     * 
     * @param unknown $entries
     * @param unknown $template
     * @param unknown $media
     */
    public function __invoke($entries, $template, $media)
    {
        $templateKey = static::VIEW_TEMPLATE;
        if (isset($entries['modulFormat'])) {
            $templateKey = $entries['modulFormat'];
        }
        $this->setTemplate($template->plugins->$templateKey);   
        $events = '';
        $format = $entries['modulConfig'];
        $displaymonthname = false;
        $dataProp = array();
        $host = str_replace('www.', '', $this->view->host);
        foreach ($entries['modulContent'] as $entry) {
            $dateData = '';           
            $dataProp['data-summary'] = $entry['summary'];
            $dateData .= $this->deployRow($this->summary, $entry['summary']);
            if ( $entry['organizerId'] > 0 ){
                $organizerExt = '';
                if (strlen($entry['organizerNameExt']) > 1) {
                    $organizerExt = ' ' . $entry['organizerNameExt'];
                }
                $dataProp['data-attendee'] = $entry['organizerName'] . $organizerExt;                
                $dateData .= $this->deployRow($this->organizer, $entry['organizerName'] . $organizerExt);                
            } elseif (strlen($entry['organizer']) > 1){
                $dataProp['data-attendee'] = $entry['organizer'];
                $dateData .= $this->deployRow($this->organizer, $entry['organizer']);
            }         
            $datetime = new \DateTime($entry['dateStart']);        
            $dataProp['data-dstart'] = $datetime->format("Ymd\\THis");
            $dataProp['data-uuid'] = $datetime->format("Ymd\\THis") . '-IC'. $entry['id'] . '@' . $host;
            $dataProp['data-dend'] = '00000000T000000';
            $dateEndStr = '';
            $dateEndMeta = '';
            if ('0000-00-00 00:00:00' !== $entry['dateEnd']){
                if ($entry['dateEnd'] !== $entry['dateStart']){
                    $dateTimeEnd = new \DateTime($entry['dateEnd']);
                    $dataProp['data-dend'] = $dateTimeEnd->format("Ymd\\THis");
                    $dateEndMeta = '<meta content="' . $dateTimeEnd->format("Y-m-d\\TH:i:s\\Z+01:00") . '" itemprop="endDate">';
                    if ($datetime->format("Y-m-d") === $dateTimeEnd->format("Y-m-d")){
                        $dateEndStr = ' &dash; ' . $dateTimeEnd->format("H:i");
                    } else {
                        $endtime = '';
                        if ('00:00' != $dateTimeEnd->format("H:i")){
                            $endtime .= ', ' . $dateTimeEnd->format("H:i");
                        }
                        $dateEndStr = ' &dash; ' . $this->convert($dateTimeEnd->format('N'),'dayname')  . ', ' . $dateTimeEnd->format('d') . '. ' . $this->convert($dateTimeEnd->format('m')) . ' ' . $dateTimeEnd->format('Y') . $endtime;
                    }
                }
            }
            $mthNum = $datetime->format('m');           
            $content = $this->convert($datetime->format('N'),'dayname')  . ', ' . $datetime->format('d') . '. ' . $this->convert($datetime->format('m')) . ' ' . $datetime->format('Y');
            if ('00:00' !== $datetime->format("H:i")) {
                $content .= ', ' . $datetime->format("H:i") . $dateEndStr;
                $dateStartTemplate = $this->dateStart->toArray();
            } else {
                $content .= $dateEndStr;
                $dateStartTemplate = $this->dateStart->toArray();
                if (isset($dateStartTemplate["grid"]["content:after"])) {
                    unset($dateStartTemplate["grid"]["content:after"]);
                }
            }
            $dateStartTemplate['grid']['attr']['datetime'] = $entry['dateStart'];
            $dateData .= $this->deployRow($dateStartTemplate, $content, '<meta content="' . $datetime->format("Y-m-d\\TH:i:s\\Z+01:00") . '" itemprop="startDate">'.$dateEndMeta);          
            // location new
            if ( $entry['accountId'] > 1 ) {
                $location = '';
                $dataLocation = ' ';                
                if (isset($this->location['grids'])) {
                    $grids = $this->location['grids'];
                    if (strlen($entry['accountStreet']) > 1) {
                        $street = $entry['accountStreet'];
                        if (strlen($entry['accountStreetNum']) > 0 ){
                            $street .= ' ' . $entry['accountStreetNum'];
                        }                        
                        if (isset($grids['accountStreet'])) {
                            $dataLocation .= $street;
                            $location .= $this->deployRow($grids['accountStreet'], $street);
                        } 
                        $dataLocation .= $street;
                    }
                    if (strlen($entry['accountZipcode']) > 1) {
                        $zipcode = $entry['accountZipcode'];
                        if (isset($grids['accountZipcode'])) {
                            $location .= $this->deployRow($grids['accountZipcode'], $zipcode);
                        } 
                        $dataLocation .= ' ' . $zipcode;
                    }
                    
                    if (strlen($entry['accountCity']) > 1) {
                        $city = $entry['accountCity'];
                        if (isset($grids['accountZipcode'])) {
                            $location .= $this->deployRow($grids['accountCity'], $city);
                        } 
                        $dataLocation .= ' ' . $city;
                    }
                }
                $orgaExt = '';
                if (strlen($entry['accountNameExt']) > 1) {
                    $orgaExt = ' ' . $entry['accountNameExt'];
                }                
                $locationName = $this->deployRow($this->organisation, $entry['accountName'] . $orgaExt);                
                $dateData .= $this->deployRow($this->location, $location, $locationName);               
                $dataProp['data-location'] = $entry['accountName'] . $orgaExt . $dataLocation;
            } else {
                $location = $zipcode = '';
                $dataLocation = ' ';
                if (isset($this->location['grids'])) {
                    $grids = $this->location['grids'];
                    if (strlen($entry['locationAddresse']) > 1) {
                        $address = $entry['locationAddresse'];
                        if (isset($grids['accountStreet'])) {
                            $location .= $this->deployRow($grids['accountStreet'], $address);
                        } 
                        $dataLocation .= $address;
                    }
                    if (strlen($entry['locationZipcode']) > 1) {
                        $zipcode = $entry['locationZipcode'];
                        if (isset($grids['accountZipcode'])) {
                            $location .= $this->deployRow($grids['accountZipcode'], $zipcode);
                        }
                        $dataLocation .= ' ' . $zipcode;
                    }
                    
                    if (strlen($entry['locationCity']) > 1) {
                        $city = $entry['locationCity'];
                        if (isset($grids['accountZipcode'])) {
                            $location .= $this->deployRow($grids['accountCity'], $city);
                        } 
                        $dataLocation .= ' ' . $city;
                    }
                }              
                $locationName = $this->deployRow($this->organisation, $entry['location']);                
                $dateData .= $this->deployRow($this->location, $location, $locationName);               
                $dataProp['data-location'] = $entry['location'] . ' ' . $dataLocation;
            }
            $description = '';
            if ( strlen($entry['description']) > 4 ){
                $description = $entry['description'];
            }
            
            if ($this->imagesSource && $entry['webMediasId'] > 1 ){
                $description .= $this->image($entry); //$this->deployRow($this->convertparams, $this->image($entry));
            }
            
            if ($this->downloadfile && $entry['webFilesId'] > 1 ){
                $downloadfile = $this->downloadfile->toArray();
                $downloadfile['grid']['attr']['href'] .= $entry['webFilesId'];
                $label = ( strlen($entry['downloadLabel']) > 1 ) ? $entry['downloadLabel'] : 'Download Flyer';
                $description .= $this->deployRow($downloadfile, $label);
            }
            
            if ($this->descriptionhead && '' != $description){
                $descriptionHead = $this->descriptionhead->toArray();
                $descriptionBody = $this->description->toArray();
                $descriptionHead['grid']['attr']['data-ident'] = 'event' . $entry['id'];
                $descriptionBody['grid']['attr']['id'] = 'event' . $entry['id'];
                $dateData .= $this->deployRow($descriptionHead, 'Weitere Informationen');
                $dateData .= $this->deployRow($descriptionBody, $description);                
            }
            
            if ( strlen($entry['infoUrl']) > 1 ){
                $dateData .= '<p class="event-url"><a class="event-url" itemprop="url" href="' . $entry['infoUrl'] . '">' . $entry['infoUrl'] . '</a></p>';
            }            
            
            $toolbar = '';
            if (null !== $this->toolbar) {
                $toolbar = $this->view->contenttoolbar(array(
                    'getevent' => array(
                        'attr' => $dataProp
                    )
                ), $this->toolbar->toArray());
            }
            if ($this->displaymonthname &&  'displaymonthname' == $format && $displaymonthname != $mthNum){
                $displaymonthname = $mthNum;
                $events .= $this->deployRow($this->displaymonthname, $this->convert($mthNum));
            }
            $datepanel = '';
            if (null !== $this->datepanel){
                $datepaneltemplate = $this->datepanel->toArray();
                $schema = $this->schema->toArray();
                $datepaneltemplate['row']['attr']['class'] .= ' medium-2 columns';
                $datepaneltemplate['grid']['content:before:outside'] = $datetime->format('d');
                $datepanel = $this->deployRow($datepaneltemplate, $datetime->format('M') );
                $events .= $this->deployRow($schema, '<div class="row">'. $datepanel . '<div class="medium-10 columns">'. $toolbar . $dateData . '</div></div>');
            } else {
                $events .= $this->deployRow($this->schema, $toolbar . $datepanel . $dateData );
            }
            
            
            $dataProp = array();
        }
        
        if (strlen($events) < 10){
            return '<p><i class="fa fa-calendar" aria-hidden="true"> </i> Zur Zeit ist in dieser Rubrik kein Termin vorhanden.</p>';
        }
        
        $events = $this->deployRow($this->wrapper, $events);
        
        if (null !== $this->files) {
            $this->deployFiles($this->files);
        }
        
        return $events;
    }
    
    /**
     * Images
     * @param Contentinum\Entity\WebMedias $media Contentinum\Entity\WebMedias
     */
    protected function image($media)
    {
        $mediaMetas = $this->setConvertparams($media['mediaMetas'], true);
        $src = $media['mediaLink'];
        $img = '<img src="' . $src . '"';
        if (isset($mediaMetas['alt'])) {
            $img .= ' alt="' . $mediaMetas['alt'] . '"';
        }
        
        if (false !== ($title = $this->hasValue($mediaMetas, 'title'))) {
            $img .= ' title="' . $title . '"';
        }
        $img .= ' />';
        return $img;
    }
}