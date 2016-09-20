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
namespace Guestbook\Form;

use ContentinumComponents\Forms\AbstractForms;

/**
 * contentinum mcwork form fieldtypes
 * 
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class GuestbookConfigForm extends AbstractForms
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
                    'name' => 'name',
                    'required' => true,
                    
                    'options' => array(
                        'label' => 'Name Gästebuch',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
                    
                    'type' => 'Text',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'name',
                        'value' => 'Gästebuch'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'email',
                    'required' => false,
            
                    'options' => array(
                        'label' => 'E-Mailadresse',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'description' => 'Wenn Sie über einen erfolgten Eintrag per E-Mail informiert werden möchten tragen Sie hier Bitte hier die Adressen mit Semikolon getrennt ein'
                    ),
            
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'email',
                    )
                )
            ),            
            
            array(
                'spec' => array(
                    'name' => 'sendEmail',
                    'required' => false,
            
                    'options' => array(
                        'label' => ' Setzen Sie hier einen Haken wenn Sie per E-Mail über Einträge informiert werden möchten',
                        'label_attributes' => array('for' => 'sendEmail'),
                         
                    ),
                    'type' => 'Checkbox',
                    'attributes' => array(
                        'id' => 'sendEmail',
                        'value' => 0
                    )
                )
            ), 
            
            array(
                'spec' => array(
                    'name' => 'markSpamFirst',
                    'required' => false,
            
                    'options' => array(
                        'label' => ' Im Standard werden Gästebucheinträge erst nach Prüfung und freischalten veröffentlicht, entfernen Sie den Haken wenn Sie ohne Prüfung sofort veröffentlichen möchten (nicht zu empfehlen)',
                        'label_attributes' => array('for' => 'markSpamFirst'),
                         
                    ),
                    'type' => 'Checkbox',
                    'attributes' => array(
                        'id' => 'markSpamFirst',
                        'value' => 1
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