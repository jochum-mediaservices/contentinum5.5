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
 * @category contentinum backend
 * @package Forms
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 * @copyright Copyright (c) 2009-2013 jochum-mediaservices, Katja Jochum (http://www.jochum-mediaservices.de)
 * @license http://www.opensource.org/licenses/bsd-license
 * @since contentinum version 5.0
 * @link      https://github.com/Mikel1961/contentinum-components
 * @version   1.0.0
 */
namespace Mcevent\Form\Dates;

use ContentinumComponents\Forms\AbstractForms;

/**
 * contentinum mcwork form fieldtypes
 * 
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class ConfigForm extends AbstractForms
{
    
    /**
     * User friendly function for tab header
     * @return string
     */
    protected function tabHeader()
    {
        $html = '<dl class="tabs" data-tab="data-tab">';// tab header start
        $html .= '<dd class="active"><a href="#fieldsetAccount">Basiseinstellungen</a></dd>';// tab1
        $html .= '<dd><a href="#fieldsetParticipant">E-Mail an Teilnehmer</a></dd>';// tab2
        $html .= '<dd><a href="#fieldsetOrganizer">E-Mail an Organisator</a></dd>';// tab3
        $html .= '<dd><a href="#fieldsetFormular">Anmeldeformular</a></dd>';// tab3
        $html .= '</dl><div class="tabs-content">';// finish and start tab content area
        return $html;
    }  
    
    protected function explainparticipant()
    {
        $html = '<dl><dt>Platzhalter für das E-Mailtemplate:<dt>';       
        $html .= '<dd>{DATETIME} - Wird ersetzt durch Datum und Uhrzeit</dd>';
        $html .= '<dd>{ANDREDE} - Wird ersetzt durch die Anrede Herr, Frau</dd>';
        $html .= '<dd>{NAME} - Wird ersetzt durch den Namen des Teilnehmers</dd>';
        $html .= '<dd>{TERMIN} - Wird ersetzt durch den Veranstaltungstermin</dd>';
        $html .= '<dd>{LOCATION} - Wird ersetzt durch den Veranstaltungsort/Treffpunkt</dd>';
        $html .= '<dd>{STORNOLINK} - Wird ersetzt durch ein Link mitdem die Teilnahme storniert werden kann</dd>';
        $html .= '<dd>Bei Platzhalter die Sie nicht setzen, wird die Information nicht in der E-Mail angezeigt.</dd>';      
        $html .= '</dl>';
        return $html;
    }
    
    protected function explainorganizer()
    {
        $html = '<dl><dt>Platzhalter für das E-Mailtemplate:<dt>';
        $html .= '<dd>{DATETIME} - Wird ersetzt durch Datum und Uhrzeit</dd>';
        $html .= '<dd>{TERMIN} - Wird ersetzt durch den Veranstaltungstermin</dd>';
        $html .= '<dd>{TEILNEHMER} - Wird ersetzt durch den Namen und Kontaktdaten des Teilnehmers</dd>';
        $html .= '<dd>Bei Platzhalter die Sie nicht setzen, wird die Information nicht in der E-Mail angezeigt.</dd>';
        $html .= '</dl>';
        return $html;
    }    

    /**
     * form field elements
     * 
     * @see \ContentinumComponents\Forms\AbstractForms::elements()
     */
    public function elements()
    {
        return array(
            
            array(
                'spec' => array(
                    'name' => 'formpreftab',
                    'options' => array(
                        'fieldset' => array(
                            'nofieldset' => 1
                        )
                    ),
                    'type' => 'ContentinumComponents\Forms\Elements\Note',
                    'attributes' => array(
                        'id' => 'formpreftab',
                        'value' => $this->tabHeader(),
                    )
                )
            ),            
            
            array(
                'spec' => array(
                    'name' => 'name',
                    'required' => true,
                    
                    'options' => array(
                        'label' => 'Name Einstellungen',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
                    
                    'type' => 'Text',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'name',
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'organizer',
                    'required' => true,
            
                    'options' => array(
                        'label' => 'Organisator',
                        'empty_option' => 'Please select',
                        'value_options' => $this->getSelectOptions('contacts', array(
                            'value' => 'id',
                            'label' => array('lastName', 'firstName')
                        )),
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
            
                    'type' => 'Select',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'organizer',
                        'class' => 'chosen-select',
                    )
                )
            ),            
            
            array(
                'spec' => array(
                    'name' => 'emailsubject',
                    'required' => false,
                    
                    'options' => array(
                        'label' => 'Betreff bei E-Mailversand',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
                    
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'emailsubject',
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'emailsignature',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'E-Mail Signatur',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'fieldset' => array(
                            'legend' => 'Basiseinstellungen',
                            'attributes' => array(
                                'class' => 'content active',
                                'id' => 'fieldsetAccount'// tab1
                            )
                        )                        
                    ),
            
                    'type' => 'Textarea',
                    'attributes' => array(
                        'rows' => '2',
                        'id' => 'emailsignature',
                        'value' => '[ Dies ist eine automatisch durch das Webformular generierte E-Mail. ]',
                    )
                )
            ), 
            
            
            array(
                'spec' => array(
                    'name' => 'sendEmailParticipant',
                    'required' => false,
            
                    'options' => array(
                        'label' => ' Setzen Sie hier einen Haken wenn Teilnehmer eine E-Mail bei Anmeldung erhalten sollen',
                        'label_attributes' => array('for' => 'sendEmailParticipant'),
            
                         
                    ),
                    'type' => 'Checkbox',
                    'attributes' => array(
                        'id' => 'sendEmailParticipant',
                        'value' => 0
                    )
                )
            ),            
            
            array(
                'spec' => array(
                    'name' => 'emailParticipant',
                    'required' => false,
                    'options' => array(
                        'label' => 'E-Mail Template für Teilnehmer',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
                    'type' => 'Textarea',
                    'attributes' => array(
                        'rows' => '10',
                        'id' => 'emailParticipant',
                    )
                )
            ), 
            
            array(
                'spec' => array(
                    'name' => 'plathalterteilnehmer',
                    'options' => array(
                        'fieldset' => array(
                            'legend' => 'E-Mail an Teilnehmer',
                            'attributes' => array(
                                'class' => 'content',
                                'id' => 'fieldsetParticipant'// tab1
                            )
                        )                        
                    ),
                    'type' => 'ContentinumComponents\Forms\Elements\Note',
                    'attributes' => array(
                        'id' => 'plathalterteilnehmer',
                        'value' => $this->explainparticipant(),
                    )
                )
            ),            
            
            array(
                'spec' => array(
                    'name' => 'sendEmailOrganizer',
                    'required' => false,
            
                    'options' => array(
                        'label' => ' Setzen Sie hier einen Haken der Organisator eine E-Mail bei Anmeldung eines Teilnehmers erhalten sollen',
                        'label_attributes' => array('for' => 'sendEmailOrganizer'),
            
                         
                    ),
                    'type' => 'Checkbox',
                    'attributes' => array(
                        'id' => 'sendEmailOrganizer',
                        'value' => 0
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'emailOrganizer',
                    'required' => false,
                    'options' => array(
                        'label' => 'E-Mail Template für den Organisator',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
                    'type' => 'Textarea',
                    'attributes' => array(
                        'rows' => '10',
                        'id' => 'emailOrganizer',
                    )
                )
            ),            
            

            
            
            array(
                'spec' => array(
                    'name' => 'plathalterOrganisator',
                    'options' => array(
                        'fieldset' => array(
                            'legend' => 'E-Mail an Organisator',
                            'attributes' => array(
                                'class' => 'content',
                                'id' => 'fieldsetOrganizer'// tab1
                            )
                        )
                    ),
                    'type' => 'ContentinumComponents\Forms\Elements\Note',
                    'attributes' => array(
                        'id' => 'plathalterOrganisator',
                        'value' => $this->explainorganizer(),
                    )
                )
            ),            
            
            
            array(
                'spec' => array(
                    'name' => 'settingsFormular',
                    'required' => false,
            
                    'options' => array(
                        'value_options' => array(
                            'onlysingle' => ' Nur Einzelanmeldungen erlauben',
                            'fieldcompany' => ' Formfeld: Name Organisation',
                            'fieldtitle' => ' Formfeld: Anrede auswählen',
                            'fieldsurname' => ' Formfeld: Vorname',
                            'fieldname' => ' Formfeld: Name (Kann auch genutzt werden um Vorname und Nachname in einem Feld anzugeben)',
                            'fieldstreet' => ' Formfeld: Straße',
                            'fieldcity' => ' Formfeld: Ort',
                            'fieldphone' => ' Formfeld: Telefon',
                            'fieldemail' => ' Formfeld: E-Mail (ohne E-Mailadresse keine Bestätingungsmail)',
                            'fieldpostadresse' => ' Formfeld: Abweichende Postadresse angeben, wenn per Briefpost weitere Materialien verschickt werden sollen',
                            'fielddescription' => ' Formfeld: Nachricht, der Teilnehmer kann eine Nachricht hinterlassen',
                            'fieldstayBreakfast' => ' Formfeld: Teilnahme an einem Frühstück betsätigen',
                            'fieldstayLunch' => ' Formfeld: Teilnahme an einem Mittagessen betsätigen',
                            'fieldstayDinner' => ' Formfeld: Teilnahme an einem Abendessen betsätigen',
                            'fieldstayOvernight' => ' Formfeld: Übernachtung bestätigen',
                        ),
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'description' => 'Bitte wählen Sie die Felder aus derren Daten Sie zur Ermittlung der Anmeldung benötigen. Diese Felder müssen dann vom Teilnhemer ausgefüllt werden. Das Feld nur Einzelanmeldung bedeuted das sich jeder Teilnehmer mit Namen einzeln anmelden muss und es keine Gruppenanmeldung gibt.',
                        'fieldset' => array(
                            'legend' => 'Anmeldeformular formatieren',
                            'attributes' => array(
                                'class' => 'content',
                                'id' => 'fieldsetFormular'// tab1
                            )
                        )                        
                    ),
                    'type' => 'MultiCheckbox',
                    'attributes' => array(
                        'class' => 'settingsFormular'
                    )
                ),            
            ),
            array(
                'spec' => array(
                    'name' => 'formtabend',
                    'options' => array(
                        'fieldset' => array(
                            'nofieldset' => 1
                        )
                    ),
                    'type' => 'ContentinumComponents\Forms\Elements\Note',
                    'attributes' => array(
                        'id' => 'formtabend',
                        'value' => '</div>'
                    )
                )
            ),            

        );
    }

    /**
     * form input filter and validation
     * 
     * @see \ContentinumComponents\Forms\AbstractForms::filter()
     */
    public function filter()
    {
        return array();
    }

    /**
     * initiation and get form
     * 
     * @see \ContentinumComponents\Forms\AbstractForms::getForm()
     */
    public function getForm()
    {
        return $this->factory->createForm(array(
            'hydrator' => 'Zend\Stdlib\Hydrator\ArraySerializable',
            'elements' => $this->elements(),
            'input_filter' => $this->filter()
        ));
    }
}