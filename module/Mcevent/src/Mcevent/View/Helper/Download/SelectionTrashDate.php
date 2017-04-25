<?php


namespace Municipal\View\Helper\Downloads;






use Contentinum\View\Helper\AbstractContentHelper;

class SelectionCalendar extends AbstractContentHelper
{
    
    /**
     *
     * @param unknown $entries
     * @param unknown $medias
     * @param string $template
     * @return string
     */
    public function __invoke($entries, $template, $media)
    {
        $options = '<option value="">Bitte Stra&szlig;e w&auml;hlen</option>';
        foreach ($entries['modulContent'] as $entry) {
            $options .= '<option value="' . $entry['id'] . '">' . $entry['street'] . '</option>';
        }
        $html = '';
        $html .= '<form id="prepare-abfall-termine" class="form-customer trashcalendar callout" accept-charset="UTF-8" method="post" action="#" enctype="application/x-www-form-urlencoded" role="application">';
        $html .= '<fieldset><legend>Ihre M&uuml;llkalender Einstellungen zum Download oder abonnieren</legend>';
        $html .= '<p id="fieldselectbezirk" class="formElement"><label for="selectbezirk">Anzeige nach Stra&szlig;e</label>';
        $html .= '<select id="selectbezirk" name="selectbezirk">'.$options.'</select>';
        $html .= '</p>'; 
        $html .= '<div id="cptext"> </div>';
        $html .= '<div class="row collapse"><div class="small-10 columns">';
        $html .= '<input type="text" name="calurl" id="calurl" /></div>';
        $html .= '<div class="small-2 columns"><a id="copyclip" href="#" class="button postfix disabled" data-clipboard-target="#calurl"><i class="fa fa-clipboard" aria-hidden="true"></i></a></div></div>';
        $html .= '<p id="downbtn"> </p>';
        $html .= '</fieldset>';
        $html .= '</form>';
        return $html;
    }
    
    
}