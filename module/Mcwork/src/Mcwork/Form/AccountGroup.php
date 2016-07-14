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
namespace Mcwork\Form;

use ContentinumComponents\Forms\AbstractForms;

/**
 * contentinum mcwork form fieldmetas
 * 
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class AccountGroup extends AbstractForms
{
    
    /**
     * User friendly function for tab header
     * @return string
     */
    protected function tabHeader()
    {
        $html = '<dl class="tabs" data-tab="data-tab">';// tab header start
        $html .= '<dd class="active"><a href="#fieldsetName">Organisationsgruppe</a></dd>';// tab1
        $html .= '<dd><a href="#fieldsetEnable">Parameter</a></dd>';// tab4
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
                    'name' => 'name',
                    'required' => true,
                    
                    'options' => array(
                        'label' => 'Groupname',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'fieldset' => array(
                            'legend' => 'Organisationsgruppe',
                            'attributes' => array(
                                'class' => 'content active',
                                'id' => 'fieldsetName'// tab1
                            )
                        )                        
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
                    'name' => 'enableOrganisationExt',
                    'required' => false,
            
                    'options' => array(
                        'label' => ' Zusatz Organisationsname anzeigen ',
                        'label_attributes' => array('for' => 'enableOrganisationExt'),
                         
                    ),
                    'type' => 'Checkbox',
                    'attributes' => array(
                        'id' => 'enableOrganisationExt',
                        'value' => 0
                    )
                )
            ),            
            
            
            array(
                'spec' => array(
                    'name' => 'enableImages',
                    'required' => false,
            
                    'options' => array(
                        'label' => ' Bild/Logo anzeigen ',
                        'label_attributes' => array('for' => 'enableImages'),
                         
                    ),
                    'type' => 'Checkbox',
                    'attributes' => array(
                        'id' => 'enableImages',
                        'value' => 0
                    )
                )
            ),            
            
            array(
                'spec' => array(
                    'name' => 'enableAccountFax',
                    'required' => false,
            
                    'options' => array(
                        'label' => ' Faxnummer anzeigen ',
                        'label_attributes' => array('for' => 'enableAccountFax'),
                         
                    ),
                    'type' => 'Checkbox',
                    'attributes' => array(
                        'id' => 'enableAccountFax',
                        'value' => 0
                    )
                )
            ),            
            
            array(
                'spec' => array(
                    'name' => 'enableAccountPhone',
                    'required' => false,
            
                    'options' => array(
                        'label' => ' Telefonummer anzeigen ',
                        'label_attributes' => array('for' => 'enableAccountPhone'),
                         
                    ),
                    'type' => 'Checkbox',
                    'attributes' => array(
                        'id' => 'enableAccountPhone',
                        'value' => 0
                    )
                )
            ),            
            
            array(
                'spec' => array(
                    'name' => 'enablePhoneAlternate',
                    'required' => false,
            
                    'options' => array(
                        'label' => ' Alternative Telefonummer anzeigen ',
                        'label_attributes' => array('for' => 'enablePhoneAlternate'),
                         
                    ),
                    'type' => 'Checkbox',
                    'attributes' => array(
                        'id' => 'enablePhoneAlternate',
                        'value' => 0
                    )
                )
            ),            
            
            array(
                'spec' => array(
                    'name' => 'enableAccountEmail',
                    'required' => false,
            
                    'options' => array(
                        'label' => ' E-Mail anzeigen ',
                        'label_attributes' => array('for' => 'enableAccountEmail'),
                         
                    ),
                    'type' => 'Checkbox',
                    'attributes' => array(
                        'id' => 'enableAccountEmail',
                        'value' => 1
                    )
                )
            ),            
            
            array(
                'spec' => array(
                    'name' => 'enableAccountStreet',
                    'required' => false,
            
                    'options' => array(
                        'label' => ' Straße anzeigen ',
                        'label_attributes' => array('for' => 'enableAccountStreet'),
                         
                    ),
                    'type' => 'Checkbox',
                    'attributes' => array(
                        'id' => 'enableAccountStreet',
                        'value' => 1
                    )
                )
            ),            
            
            array(
                'spec' => array(
                    'name' => 'enableAccountAddresss',
                    'required' => false,
            
                    'options' => array(
                        'label' => ' Alternatives Adressfeld anzeigen ',
                        'label_attributes' => array('for' => 'enableAccountAddresss'),
                         
                    ),
                    'type' => 'Checkbox',
                    'attributes' => array(
                        'id' => 'enableAccountAddresss',
                        'value' => 0
                    )
                )
            ),            
            
            
            array(
                'spec' => array(
                    'name' => 'enableAccountCity',
                    'required' => false,
            
                    'options' => array(
                        'label' => ' Ortsnamen anzeigen ',
                        'label_attributes' => array('for' => 'enableAccountCity'),
                         
                    ),
                    'type' => 'Checkbox',
                    'attributes' => array(
                        'id' => 'enableAccountCity',
                        'value' => 1
                    )
                )
            ),
            
            
            array(
                'spec' => array(
                    'name' => 'enableDescription',
                    'required' => false,
            
                    'options' => array(
                        'label' => ' Beschreibung anzeigen',
                        'label_attributes' => array('for' => 'enableDescription'),
                    ),
                    'type' => 'Checkbox',
                    'attributes' => array(
                        'id' => 'enableDescription',
                        'value' => 1
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'enableInternet',
                    'required' => false,
            
                    'options' => array(
                        'label' => ' Internetadresse anzeigen',
                        'label_attributes' => array('for' => 'enableInternet'),
                        'fieldset' => array(
                            'legend' => 'Parameter ein- oder ausblenden',
                            'attributes' => array(
                                'class' => 'content',
                                'id' => 'fieldsetEnable'// tab1
                            )
                        )
                         
                    ),
                    'type' => 'Checkbox',
                    'attributes' => array(
                        'id' => 'enableInternet',
                        'value' => 1
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
            'name' => array(
                'required' => true,
                'filters' => array(
                    array(
                        'name' => 'Zend\Filter\StringTrim'
                    )
                )
            )
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