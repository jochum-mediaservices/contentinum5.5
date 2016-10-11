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
use ContentinumComponents\Mapper\Worker;
use ContentinumComponents\Tools\HandleSerializeDatabase;

/**
 * contentinum mcwork form fieldtypes
 * 
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class RegistrationPublicForm extends AbstractForms
{
    
  

    /**
     * form field elements
     * 
     * @see \ContentinumComponents\Forms\AbstractForms::elements()
     */
    public function elements()
    {
        $sl = $this->getServiceLocator();
        $pageOptions = $sl->get('contentinum_pages');
        $configuration = $pageOptions->getParameter('categoryvalue');

        $con = new Worker($sl->get('doctrine.entitymanager.orm_default'));
        $result = $con->fetchRow("SELECT * FROM mcevent_dates_config WHERE id = {$configuration};");

        if (isset($result['settings_formular']) && strlen($result['settings_formular']) > 1){
            $mcSerialize = new HandleSerializeDatabase();
            $formSettings = $mcSerialize->execUnserialize($result['settings_formular']);
            $onlysingle = false;
            $fields = array();
            
            $fields[] = array(
                'spec' => array(
                    'name' => 'mceventIdent',
                    'required' => true,
            
                    'options' => array(
                        'label' => 'Termin wählen',
                        'empty_option' => 'Please select',
                        'value_options' => $this->getServiceLocator()->get('mcevent_options_eventdatepublic'),
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
            
                    'type' => 'Select',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'mceventIdent',
                    )
                )
            );            
            
            
            
            
            foreach ($formSettings as $setting){
                if ('onlysingle' == $setting){
                    $onlysingle = true;
                }
                
                if ('fieldname' == $setting){
                    $field = '';
                    $field['name'] = 'name';
                    $field['required'] = true;
                    $field['options'] = array();
                    $field['options']['label'] = 'Name';
                    $field['options']['deco-row'] = $this->getDecorators(self::DECO_ELM_ROW);
                    $field['type'] = 'Text';
                    $field['attributes'] = array();
                    $field['attributes']['id'] = 'name';
                    $field['attributes']['required'] = 'required';

                    $fields[] = array(
                        'spec' => $field
                    );                    
                }
                
                
                if ('fieldphone' == $setting){
                    $field = '';
                    $field['name'] = 'phone';
                    $field['required'] = true;
                    $field['options'] = array();
                    $field['options']['label'] = 'Telefon';
                    $field['options']['deco-row'] = $this->getDecorators(self::DECO_ELM_ROW);
                    $field['type'] = 'ContentinumComponents\Forms\Elements\Tel';
                    $field['attributes'] = array();
                    $field['attributes']['id'] = 'phone';
                    $field['attributes']['required'] = 'required';
                
                    $fields[] = array(
                        'spec' => $field
                    );
                } 
                
                if ('fieldemail' == $setting){
                    $field = '';
                    $field['name'] = 'email';
                    $field['required'] = true;
                    $field['options'] = array();
                    $field['options']['label'] = 'E-Mailadresse';
                    $field['options']['deco-row'] = $this->getDecorators(self::DECO_ELM_ROW);
                    $field['type'] = 'Email';
                    $field['attributes'] = array();
                    $field['attributes']['id'] = 'email';
                    $field['attributes']['required'] = 'required';
                
                    $fields[] = array(
                        'spec' => $field
                    );
                } 
                
                if ('fielddescription' == $setting){
                    $field = '';
                    $field['name'] = 'description';
                    $field['required'] = false;
                    $field['options'] = array();
                    $field['options']['label'] = 'Bemerkung';
                    $field['options']['deco-row'] = $this->getDecorators(self::DECO_ELM_ROW);
                    $field['options']['description'] = 'Bemerkung zur Anmeldung, Nachricht an Organisator';
                    $field['type'] = 'Textarea';
                    $field['attributes'] = array();
                    $field['attributes']['id'] = 'description';
                    $field['attributes']['row'] = '2';
                
                    $fields[] = array(
                        'spec' => $field
                    );
                } 
                
                if ('fieldstayOvernight' == $setting){
                    $field = '';
                    $field['name'] = 'stayOvernight';
                    $field['required'] = true;
                    $field['options'] = array();
                    $field['options']['label'] = 'Übernachtung bestätigen';
                    $field['options']['value_options'] = array('yes' => 'Ja, ich nutze das Übernachtungsangebot', 'no' => 'Nein, keine Übernachtung', 'perhaps' => 'Noch unentschlossen');
                    $field['options']['deco-row'] = $this->getDecorators(self::DECO_ELM_ROW);
                    $field['options']['description'] = 'Bestätigen Sie Bitte ob Sie übernachten möchten';
                    $field['type'] = 'Select';
                    $field['attributes'] = array();
                    $field['attributes']['id'] = 'stayOvernight';
                    $field['attributes']['required'] = 'required';
                    $field['attributes']['value'] = 'yes';
                
                    $fields[] = array(
                        'spec' => $field
                    );
                }
                
             
                
            }
            
           $fields[] = array(
                    'spec' => array(
                        'name' => 'send',
                        'type' => 'Submit',
                        'attributes' => array(
                            'class' => 'button expand',
                            'value' => 'Absenden',
                            'id' => 'sendbutton'
                        )
                    )
                );   
            return $fields;
        } else {
            print '<p><strong>Formularfehler, wenden Sie sich Bitte an den Administrator</strong></p>';
            exit;
        }
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