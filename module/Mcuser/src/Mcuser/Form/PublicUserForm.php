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
namespace Mcuser\Form;

use ContentinumComponents\Forms\AbstractForms;

/**
 * contentinum mcwork form fieldtypes
 * 
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class PublicUserForm extends AbstractForms
{

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
                    'name' => 'salutation',
                    'required' => true,
            
                    'options' => array(
                        'label' => 'Anrede',
                        'value_options' => array(
                            'Frau' => 'Frau',
                            'Herr' => 'Herr'
                        ),
            
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
            
                    'type' => 'Select',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'salutation'
                    )
                )
            ),            
            
            array(
                'spec' => array(
                    'name' => 'firstName',
                    'required' => true,
            
                    'options' => array(
                        'label' => 'First name',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'firstName'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'lastName',
                    'required' => true,
            
                    'options' => array(
                        'label' => 'Last name',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'lastName'
                    )
                )
            ),            
            
            
            array(
                'spec' => array(
                    'name' => 'contactEmail',
                    'required' => true,
                    'options' => array(
                        'label' => 'E-Mailadresse',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),   
                       
                                          
                    ),
                    
                    'type' => 'Email',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'contactEmail'
                    )
                )
            ),          
            
            array(
                'spec' => array(
                    'name' => 'send',
                    'type'  => 'Submit',
                    'attributes' => array(
                        'id' => 'sendregister',
                        'class' => 'button expanded',
                        'value' => 'Registrieren',
                    ),
                ),
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
            
            'contactEmail' => array(
                'required' => true,
                //'filters' => array(),
                'validators' => array(
                    array(
                        'name' => 'ContentinumComponents\Validator\Doctrine\NoRecordExists',
                        'options' => array(
                            'storage' => $this->getStorage(),
                            'entity' => 'Contentinum\Entity\Users5',
                            'field' => 'username',
                            'exclude' => array(),
                        )
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