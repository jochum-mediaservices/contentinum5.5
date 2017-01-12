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
namespace Mcevent\View\Helper\Download;

use Mcevent\View\Helper\Event\Parameter;

class Ics extends Parameter
{

    /**
     *
     * @param unknown $entries            
     * @param unknown $template            
     * @param unknown $media            
     */
    public function __invoke($entries, $template, $media)
    {
        define('DATE_ICAL', 'Ymd\THis'); // \Z
        $vcalendar = 'BEGIN:VCALENDAR';
        $vcalendar .= "\n" . 'METHOD:PUBLISH';
        $vcalendar .= "\n" . 'VERSION:2.0';
        $vcalendar .= "\n" . 'PRODID:-//SPD im Regionalverband//Frankfurt am Main//DE';
        $vcalendar .= "\n" . 'X-MS-OLK-FORCEINSPECTOROPEN:TRUE';
        $vcalendar .= "\n" . 'BEGIN:VTIMEZONE';
        $vcalendar .= "\n" . 'TZID:Europe/Berlin';
        $vcalendar .= "\n" . 'TZURL:http://tzurl.org/zoneinfo-outlook/Europe/Amsterdam';
        $vcalendar .= "\n" . 'X-LIC-LOCATION:Europe/Berlin';
        $vcalendar .= "\n" . 'BEGIN:DAYLIGHT';
        $vcalendar .= "\n" . 'TZOFFSETFROM:+0100';
        $vcalendar .= "\n" . 'TZOFFSETTO:+0200';
        $vcalendar .= "\n" . 'TZNAME:CEST';
        $vcalendar .= "\n" . 'DTSTART:19700329T020000';
        $vcalendar .= "\n" . 'RRULE:FREQ=YEARLY;BYMONTH=3;BYDAY=-1SU';
        $vcalendar .= "\n" . 'END:DAYLIGHT';
        $vcalendar .= "\n" . 'BEGIN:STANDARD';
        $vcalendar .= "\n" . 'TZOFFSETFROM:+0100';
        $vcalendar .= "\n" . 'TZOFFSETTO:+0200';
        $vcalendar .= "\n" . 'TZNAME:CET';
        $vcalendar .= "\n" . 'DTSTART:19701025T030000';
        $vcalendar .= "\n" . 'RRULE:FREQ=YEARLY;BYMONTH=10;BYDAY=-1SU';
        $vcalendar .= "\n" . 'END:STANDARD';
        $vcalendar .= "\n" . 'END:VTIMEZONE';
        $vevent = '';
        foreach ($entries['modulContent'] as $entry) {
            $vevent .= "\n";
            $vevent .= "\n" . 'BEGIN:VEVENT';
            $vevent .= "\n" . 'SUMMARY:' . $entry['summary'];
            $vevent .= "\n" . 'UID:' . $entry['id'];
            $vevent .= "\n" . 'STATUS:CONFIRMED';
            $datestart = new \DateTime($entry['dateStart']);
            $vevent .= "\n" . 'DTSTART;TZID=Europe/Amsterdam:' . date(DATE_ICAL, strtotime($datestart->format("Y-m-d H:i:s")));
            if ('0000-00-00 00:00:00' !== $entry['dateEnd']) {
                $dateend = new \DateTime($entry['dateStart']);
                
                $vevent .= "\n" . 'DTEND;TZID=Europe/Amsterdam:' . date(DATE_ICAL, strtotime($dateend->format("Y-m-d H:i:s")));
            }
            
            $vevent .= "\n" . 'LAST-MODIFIED;TZID=Europe/Amsterdam:' . date(DATE_ICAL, strtotime($entry['dateStart']));
            
            // location new
            if ($entry['accountId'] > 1) {
                $dataLocation = ' ';
                
                if (strlen($entry['accountStreet']) > 1) {
                    $street = $entry['accountStreet'];
                    if (strlen($entry['accountStreetNum']) > 0) {
                        $street .= ' ' . $entry['accountStreetNum'];
                    }
                    $dataLocation .= $street;
                }
                if (strlen($entry['accountZipcode']) > 1) {
                    $zipcode = $entry['accountZipcode'];
                    $dataLocation .= ' ' . $zipcode;
                }
                
                if (strlen($entry['accountCity']) > 1) {
                    $city = $entry['accountCity'];
                    $dataLocation .= ' ' . $city;
                }
                
                $vevent .= "\n" . 'LOCATION:' . $entry['accountName'] . $dataLocation;
            } else {
                $zipcode = '';
                $dataLocation = ' ';
                
                if (strlen($entry['locationAddresse']) > 1) {
                    $address = $entry['locationAddresse'];
                    
                    $dataLocation .= $address;
                }
                if (strlen($entry['locationZipcode']) > 1) {
                    $zipcode = $entry['locationZipcode'];
                    
                    $dataLocation .= ' ' . $zipcode;
                }
                
                if (strlen($entry['locationCity']) > 1) {
                    $city = $entry['locationCity'];
                    $dataLocation .= ' ' . $city;
                }
                
                $vevent .= "\n" . 'LOCATION:' . $entry['location'] . ' ' . $dataLocation;
            }
            
            if ($entry['organizerId'] > 0) {
                $vevent .= "\n" . 'ORGANIZER;CN=' . $entry['organizerName'];
            } elseif (strlen($entry['organizer']) > 1) {
                $vevent .= "\n" . 'ORGANIZER;CN=' . $entry['organizer'];
            }
        }
        
        $vcalendar .= $vevent;
        $vcalendar .= "\n" . 'END:VCALENDAR';
        header('Content-Type: text/calendar; charset=utf-8');
        header('Content-Disposition: attachment; filename="termine.ics"');
        echo $vcalendar;
        exit();
    }
}