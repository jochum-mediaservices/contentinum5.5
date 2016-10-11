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
class RegistrationForm extends AbstractForms
{
    
    /**
     * User friendly function for tab header
     * @return string
     */
    protected function tabHeader()
    {
        $html = '<dl class="tabs" data-tab="data-tab">';// tab header start
        $html .= '<dd class="active"><a href="#fieldsetAntragsteller">Einzelteilnehmer und Gruppenanmeldung</a></dd>';// tab1
        $html .= '<dd><a href="#fieldsetFurtherParts">Weitere Bestandteile</a></dd>';// tab4
        $html .= '<dd><a href="#fieldsetPostadresse">Antragsteller abweichende Postadresse</a></dd>';// tab4
        $html .= '</dl><div class="tabs-content">';// finish and start tab content area
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
                    'name' => 'formRowStartfieldsetForm',
                    'options' => array(
            
                    ),
                    'type' => 'ContentinumComponents\Forms\Elements\Note',
                    'attributes' => array(
                        'id' => 'formColumStartfieldsetForm',
                        'value' => '<div class="row"><div class="medium-6 columns">'
                    )
                )
            ),            
             
            
            
            array(
                'spec' => array(
                    'name' => 'mceventIdent',
                    'required' => true,
            
                    'options' => array(
                        'label' => 'Termin wählen',
                        'empty_option' => 'Please select',
                        'value_options' => $this->getServiceLocator()->get('mcevent_options_eventdateinternal'),
                        'description' => 'Reihenfolge Anzahl: Intern/Öffentlich/Bisher vergeben, (*): Noch Frei, (!): Anzahl erreicht.',
            
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
            
                    'type' => 'Select',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'mceventIdent',
                    )
                )
            ),            
            
            
            array(
                'spec' => array(
                    'name' => 'formRowStartfieldsetStreet',
                    'options' => array(
            
                    ),
                    'type' => 'ContentinumComponents\Forms\Elements\Note',
                    'attributes' => array(
                        'id' => 'formColumStartfieldsetStreet',
                        'value' => '<div class="row"><div class="medium-8 columns">'
                    )
                )
            ),            
            
            
            array(
                'spec' => array(
                    'name' => 'street',
                    'required' => true,
            
                    'options' => array(
                        'label' => 'Straße',
            
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'street',
                    )
                )
            ),
            
            
            array(
                'spec' => array(
                    'name' => 'formRowMiddlefieldsetStreet',
                    'options' => array(
            
                    ),
                    'type' => 'ContentinumComponents\Forms\Elements\Note',
                    'attributes' => array(
                        'id' => 'formColumMiddlefieldsetStreet',
                        'value' => '</div><div class="medium-4 columns">'
                    )
                )
            ),            
            
            
            array(
                'spec' => array(
                    'name' => 'number',
                    'required' => true,
            
                    'options' => array(
                        'label' => 'Nummer',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'number'
                    )
                )
            ),
            
            

            array(
                'spec' => array(
                    'name' => 'formRowEndfieldsetStreet',
                    'options' => array(
            
                    ),
                    'type' => 'ContentinumComponents\Forms\Elements\Note',
                    'attributes' => array(
                        'id' => 'formColumEndfieldsetStreet',
                        'value' => '</div></div>'
                    )
                )
            ),
            
            
            array(
                'spec' => array(
                    'name' => 'formRowStartfieldsetCity',
                    'options' => array(
            
                    ),
                    'type' => 'ContentinumComponents\Forms\Elements\Note',
                    'attributes' => array(
                        'id' => 'formColumStartfieldsetCity',
                        'value' => '<div class="row"><div class="medium-5 columns">'
                    )
                )
            ),            
            
            
            array(
                'spec' => array(
                    'name' => 'zipcode',
                    'required' => true,
            
                    'options' => array(
                        'label' => 'Postleitzahl',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'zipcode',
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'formRowMiddlefieldsetCity',
                    'options' => array(
            
                    ),
                    'type' => 'ContentinumComponents\Forms\Elements\Note',
                    'attributes' => array(
                        'id' => 'formColumMiddlefieldsetCity',
                        'value' => '</div><div class="medium-7 columns">'
                    )
                )
            ),            
            
            array(
                'spec' => array(
                    'name' => 'city',
                    'required' => true,
            
                    'options' => array(
                        'label' => 'Ort',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'city',
                    )
                )
            ),            
            
            
            
            
            array(
                'spec' => array(
                    'name' => 'formRowEndfieldsetCity',
                    'options' => array(
            
                    ),
                    'type' => 'ContentinumComponents\Forms\Elements\Note',
                    'attributes' => array(
                        'id' => 'formColumEndfieldsetCity',
                        'value' => '</div></div>'
                    )
                )
            ), 
            
            
            array(
                'spec' => array(
                    'name' => 'description',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Bemerkungen',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'description' => 'Bemerkung, Nachricht an Organisator',
            
                    ),
            
                    'type' => 'Textarea',
                    'attributes' => array(
                        'rows' => '4',
                        'id' => 'description',
            
                    )
                )
            ), 
            
            array(
                'spec' => array(
                    'name' => 'numGroupmember',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Anzahl Teilnehmer (Bei Gruppenanmeldung)',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'description' => 'Anzahl Teilnehmer der Gruppe inklusive des Anprechpartners'
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'numGroupmember',
                        'value' => 0,
                    )
                )
            ),            
            
            
            
            
            
            array(
                'spec' => array(
                    'name' => 'formRowMiddlefieldsetForm',
                    'options' => array(
            
                    ),
                    'type' => 'ContentinumComponents\Forms\Elements\Note',
                    'attributes' => array(
                        'id' => 'formColumMiddlefieldsetForm',
                        'value' => '</div><div class="medium-6 columns">'
                    )
                )
            ),            
            
            
            
            
            
            array(
                'spec' => array(
                    'name' => 'company',
                    'required' => false,
                    
                    'options' => array(
                        'label' => 'Firma, Organisation, Verein',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
                    
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'company'
                    )
                )
            ),
            
            
            
            array(
                'spec' => array(
                    'name' => 'title',
                    'required' => true,
            
                    'options' => array(
                        'label' => 'Anrede',
                        'value_options' => array('Frau' => 'Frau', 'Herr' => 'Herr'),
            
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
            
                    'type' => 'Select',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'title',
                    )
                )
            ), 
            
            
            array(
                'spec' => array(
                    'name' => 'surname',
                    'required' => true,
                    
                    'options' => array(
                        'label' => 'Vorname',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'description' => 'Bei Gruppenanmeldung Vorname des Ansprechpartners der Gruppe',
                    ),
                    
                    'type' => 'Text',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'surname'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'name',
                    'required' => true,
            
                    'options' => array(
                        'label' => 'Name',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'description' => 'Bei Gruppenanmeldung Name des Ansprechpartners der Gruppe',
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'name'
                    )
                )
            ),    
            
            
            
            
            
            array(
                'spec' => array(
                    'name' => 'phone',
                    'required' => true,
            
                    'options' => array(
                        'label' => 'Telefon',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'description' => 'Bei Gruppenanmeldung Telefonummer des Ansprechpartners der Gruppe',
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'phone',
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'email',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'E-Mail',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'description' => 'Bei Gruppenanmeldung E-Mailadresse des Ansprechpartners der Gruppe. Ohne E-Mailadresse kann keine Bestätigungsemail versandt werden.',
                    ),
            
                    'type' => 'Email',
                    'attributes' => array(
                        'id' => 'email'
                    )
                )
            ), 
            
            array(
                'spec' => array(
                    'name' => 'sendConfirm',
                    'required' => false,
            
                    'options' => array(
                        'label' => ' Bestätigungen per E-Mail senden (E-Mailadresse erforderlich)',
                        'label_attributes' => array('for' => 'sendConfirm'),
                    ),
                    'type' => 'Checkbox',
                    'attributes' => array(
                        'id' => 'sendConfirm',
                        'value' => '1',
                    )
                )
            ),            
            
            
            array(
                'spec' => array(
                    'name' => 'formRowEndfieldsetForm',
                    'options' => array(
            
                    ),
                    'type' => 'ContentinumComponents\Forms\Elements\Note',
                    'attributes' => array(
                        'id' => 'formColumEndfieldsetForm',
                        'value' => '</div></div>'
                    )
                )
            ),   

            
            array(
                'spec' => array(
                    'name' => 'modulLink',
                    'required' => false,
                    'options' => array(
                        
                        'fieldset' => array(
                            'legend' => 'Postadresse',
                            'attributes' => array(
                                'class' => 'content active',
                                'id' => 'fieldsetAntragsteller'// tab1
                            )
                        )                        
                        
                    ),
                    'type' => 'Hidden',
                    'attributes' => array(
                        'id' => 'modulLink'
                    )
                )
            ),
            
            
            
            
            
            
            array(
                'spec' => array(
                    'name' => 'stayBreakfast',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Am Frühstück teilnehmen',
                        'value_options' => array('yes' => 'Ja', 'no' => 'Nein', 'perhaps' => 'Noch unentschlossen'),
            
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
            
            
                    ),
            
                    'type' => 'Select',
                    'attributes' => array(
                        'id' => 'stayBreakfast',
                        'value' => 'no',
                    )
                )
            ),
            
            
            
            array(
                'spec' => array(
                    'name' => 'stayLunch',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Am Mittagessen teilnehmen',
                        'value_options' => array('yes' => 'Ja', 'no' => 'Nein', 'perhaps' => 'Noch unentschlossen'),
            
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
            
            
                    ),
            
                    'type' => 'Select',
                    'attributes' => array(
                        'id' => 'stayLunch',
                        'value' => 'no',
                    )
                )
            ),            
            
            
            
            array(
                'spec' => array(
                    'name' => 'stayDinner',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Am Abendessen teilnehmen',
                        'value_options' => array('yes' => 'Ja', 'no' => 'Nein', 'perhaps' => 'Noch unentschlossen'),
            
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
            

                    ),
            
                    'type' => 'Select',
                    'attributes' => array(
                        'id' => 'stayDinner',
                        'value' => 'no',
                    )
                )
            ),            
            
            
            
            array(
                'spec' => array(
                    'name' => 'stayOvernight',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Übernachtung',
                        'value_options' => array('yes' => 'Ja', 'no' => 'Nein', 'perhaps' => 'Noch unentschlossen'),
            
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
            
                        'fieldset' => array(
                            'legend' => 'Weitere Bestandteile',
                            'attributes' => array(
                                'class' => 'content',
                                'id' => 'fieldsetFurtherParts'// tab1
                            )
                        )
                    ),
            
                    'type' => 'Select',
                    'attributes' => array(
                        'id' => 'stayOvernight',
                        'value' => 'no',
                    )
                )
            ),            
            
            

            array(
                'spec' => array(
                    'name' => 'formRowStartfieldsetPostStreet',
                    'options' => array(
            
                    ),
                    'type' => 'ContentinumComponents\Forms\Elements\Note',
                    'attributes' => array(
                        'id' => 'formColumStartfieldsetPostStreet',
                        'value' => '<div class="row"><div class="medium-8 columns">'
                    )
                )
            ),
            
            
            array(
                'spec' => array(
                    'name' => 'poststreet',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Straße',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'poststreet'
                    )
                )
            ),
            
            
            array(
                'spec' => array(
                    'name' => 'formRowMiddlefieldsetPostStreet',
                    'options' => array(
            
                    ),
                    'type' => 'ContentinumComponents\Forms\Elements\Note',
                    'attributes' => array(
                        'id' => 'formColumMiddlefieldsetPostStreet',
                        'value' => '</div><div class="medium-4 columns">'
                    )
                )
            ),
            
            
            array(
                'spec' => array(
                    'name' => 'postnumber',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Nummer',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'postnumber'
                    )
                )
            ),
            
            
            
            array(
                'spec' => array(
                    'name' => 'formRowEndfieldsetPostStreet',
                    'options' => array(
            
                    ),
                    'type' => 'ContentinumComponents\Forms\Elements\Note',
                    'attributes' => array(
                        'id' => 'formColumEndfieldsetPostStreet',
                        'value' => '</div></div>'
                    )
                )
            ),
            
            
            array(
                'spec' => array(
                    'name' => 'formRowStartfieldsetPostCity',
                    'options' => array(
            
                    ),
                    'type' => 'ContentinumComponents\Forms\Elements\Note',
                    'attributes' => array(
                        'id' => 'formColumStartfieldsetPostCity',
                        'value' => '<div class="row"><div class="medium-5 columns">'
                    )
                )
            ),
            
            
            array(
                'spec' => array(
                    'name' => 'postzipcode',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Postleitzahl',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'postzipcode'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'formRowMiddlefieldsetPostCity',
                    'options' => array(
            
                    ),
                    'type' => 'ContentinumComponents\Forms\Elements\Note',
                    'attributes' => array(
                        'id' => 'formColumMiddlefieldsetPostCity',
                        'value' => '</div><div class="medium-7 columns">'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'postcity',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Ort',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'postcity'
                    )
                )
            ),
            
            
            
            
            array(
                'spec' => array(
                    'name' => 'formRowEndfieldsetPostCity',
                    'options' => array(
            
                    ),
                    'type' => 'ContentinumComponents\Forms\Elements\Note',
                    'attributes' => array(
                        'id' => 'formColumEndfieldsetPostCity',
                        'value' => '</div></div>'
                    )
                )
            ), 
            
            array(
                'spec' => array(
                    'name' => 'params',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'Weitere Parameter',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'fieldset' => array(
                            'legend' => 'Abweichende Postadresse',
                            'attributes' => array(
                                'class' => 'content',
                                'id' => 'fieldsetPostadresse'// tab1
                            )
                        )
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'params',
            
                    )
                )
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
        return array(
            'email' => array(
                'required' => false,
            ),            
        );
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