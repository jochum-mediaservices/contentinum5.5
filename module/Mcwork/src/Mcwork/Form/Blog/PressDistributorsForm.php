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
namespace Mcwork\Form\Blog;

use ContentinumComponents\Forms\AbstractForms;

/**
 * contentinum mcwork form fieldtypes
 * 
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */
class PressDistributorsForm extends AbstractForms
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
                        'label' => 'Name',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
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
                    'name' => 'settingsFormular',
                    'required' => true,
            
                    'options' => array(
                        'label' => 'Verteilerliste',
                        'value_options' => array(),
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),

                    ),
                    'type' => 'MultiCheckbox',
                    'attributes' => array(
                        'required' => 'required',
                        'class' => 'settingsFormular'
                    )
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
        return array( );
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