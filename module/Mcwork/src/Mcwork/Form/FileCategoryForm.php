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
 * contentinum mcwork form fieldtypes
 * 
 * @author Michael Jochum, michael.jochum@jochum-mediaservices.de
 */


class FileCategoryForm extends AbstractForms
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
                    'name' => 'formcolumn',
                    'options' => array(
                        'fieldset' => array(
                            'nofieldset' => 1
                        )
                    ),
                    'type' => 'ContentinumComponents\Forms\Elements\Note',
                    'attributes' => array(
                        'id' => 'formcolumn',
                        'value' => '<div class="row"><div class="large-8 columns">'
                    )
                )
            ),            
            array(
                'spec' => array(
                    'name' => 'webMediagroupId',
                    'required' => true,
                    
                    'options' => array(
                        'label' => 'Filegroup',
                        'empty_option' => 'Please select',
                        'value_options' => $this->getSelectOptions('webMediagroupId', array(
                            'value' => 'id',
                            'label' => 'groupName'                            
                        )),                   
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
                    
                    'type' => 'Select',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'webMediagroupId'
                    )
                )
            ),
            
            
            array(
                'spec' => array(
                    'name' => 'webMediasId',
                    'required' => true,
                    'options' => array(
                        'label' => 'Datei in Gruppe einfügen',
                        'empty_option' => 'Please select',
                        'value_options' => $this->getSelectOptions('webMediasId', array(
                            'value' => 'id',
                            'label' => 'mediaName',
                        ), array('main.id != :id' => array(':id', '1'),'andWhere' => 'main.parentMedia = \'0\''),
                            null, false, array(), array('main.mediaName' => 'ASC')
                        ),
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
            
                    'type' => 'Select',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'webMediasId',
                        'class' => 'chosen-select',
                    )
                )
            ), 
            array(
                'spec' => array(
                    'name' => 'selectfile',
                    'options' => array(
                        'fieldset' => array(
                            'nofieldset' => 1
                        )
                    ),
                    'type' => 'ContentinumComponents\Forms\Elements\Note',
                    'attributes' => array(
                        'id' => 'selectfile',
                        'value' => '<a id="viewSelectFile" href="#" class="button tiny"><i class="fa fa-file-o"></i></a>'
                    )
                )
            ),
            array(
                'spec' => array(
                    'name' => 'resource',
                    'required' => true,
                    'options' => array(
                        'label' => 'Access resources',
                        'empty_option' => 'Please select',
                        'value_options' => $this->getOptions('acl_resource'),
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
                    'type' => 'Select',
                    'attributes' => array(
                        'required' => 'required',
                        'id' => 'resource'
                    )
                )
            ),           
            array(
                'spec' => array(
                    'name' => 'caption',
                    'required' => false,
                    'options' => array(
                        'label' => 'Bildunterschrift',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'description' => 'Bildunterschrift erscheint unterhalb der Datei und &uuml;berschreibt die Bildunterschrift in den Metaangaben',
                    ),
                    'type' => 'Textarea',
                    'attributes' => array(
                        'rows' => '4',
                        'id' => 'caption'
                    )
                )
            ),            
            array(
                'spec' => array(
                    'name' => 'description',
                    'required' => false,
                    'options' => array(
                        'label' => 'Description',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'description' => 'Beschreibung erscheint unterhalb der Datei und &uuml;berschreibt die Beschreibung in den Metaangaben',
                    ),
                    'type' => 'Textarea',
                    'attributes' => array(
                        'rows' => '4',
                        'id' => 'description'
                    )
                )
            ),
            
            
            array(
                'spec' => array(
                    'name' => 'mediaLinkUrl',
                    'required' => false,
                    'options' => array(
                        'label' => 'Media Link',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW)
                    ),
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'mediaLinkUrl',
                        
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'mediaLinkPage',
                    'required' => false,
            
                    'options' => array(
                        'empty_option' => 'Search and select',
                        'value_options' => $this->getOptions('content_links_pages'),
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'description' => 'Search and set a link to a page or set an external link'
                    ),
            
                    'type' => 'Select',
                    'attributes' => array(
                        'id' => 'mediaLinkPage',
                        'class' => 'chosen-select'
                    )
                )
            ),  
            
            array(
                'spec' => array(
                    'name' => 'targetLink',
                    'required' => false,
                    'options' => array(
                        'label' => 'Link target attribute',
                        'empty_option' => 'Please select',
                        'value_options' => $this->getOptions('attribute_linkAttrTarget'),
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
                    'type' => 'Select',
                    'attributes' => array(
                        'id' => 'targetLink'
                    )
                )
            ),          
            
            
            array(
                'spec' => array(
                    'name' => 'parentMediaFile',
                    'required' => false,
                    'options' => array(
                        'label' => 'In Liste einrücken',
                        'value_options' => array(
                          0 => 'Nein',
                            1 => 'Ja'
                        ),
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
                    'type' => 'Select',
                    'attributes' => array(
                        'id' => 'parentMediaFile',
                    )
                )
            ),          
            
            array(
                'spec' => array(
                    'name' => 'alternateDownload',
                    'required' => false,
                    'options' => array(
                        'label' => 'Alternativer Download anbieten',
                        'empty_option' => 'Keine Datei angegeben',
                        'value_options' => $this->getSelectOptions('webMediasId', array(
                            'value' => 'id',
                            'label' => 'mediaName',
                        ), array('main.id != :id' => array(':id', '1'),'andWhere' => 'main.parentMedia = \'0\''),
                            null, false, array(), array('main.mediaName' => 'ASC')
                        ),
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                        'description' => 'Nutzen Sie diesen Punkt wenn sie eine Datei mit gleichem Inhalt, in zwei verschiedenen Formen zum Download anbieten m&ouml;chten',
                    ),
            
                    'type' => 'Select',
                    'attributes' => array(
                        'id' => 'alternateDownload',
                        'class' => 'chosen-select',
                    )
                )
            ), 

            array(
                'spec' => array(
                    'name' => 'alternateLinktitle',
                    'required' => false,
                    'options' => array(
                        'label' => 'Alternativer Linktitel',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'alternateLinktitle'
                    )
                )
            ),
            
            array(
                'spec' => array(
                    'name' => 'alternateLabelname',
                    'required' => false,
                    'options' => array(
                        'label' => 'Alternativer Labelname',
                        'deco-row' => $this->getDecorators(self::DECO_ELM_ROW),
                    ),
                    'type' => 'Text',
                    'attributes' => array(
                        'id' => 'alternateLabelname'
                    )
                )
            ),  
            
            array(
                'spec' => array(
                    'name' => 'id',
                    'required' => false,
                    'options' => array(),
                    'type' => 'Hidden',
                    'attributes' => array(
                        'id' => 'id'
                    )
                )
            ),            

            
            
            array(
                'spec' => array(
                    'name' => 'formcolumnEnd',
                    'options' => array(
                        'fieldset' => array(
                            'nofieldset' => 1
                        )
                    ),
                    'type' => 'ContentinumComponents\Forms\Elements\Note',
                    'attributes' => array(
                        'id' => 'formcolumnEnd',
                        'value' => '</div><div id="getfilegroupmembers" data-category="entity_file_groupindex" class="large-4 columns">   </div></div>'
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
            'webMediasId' => array('required' => true,),
            'parentMediaFile' => array('required' => false,),
            'description' => array(
                'required' => false,
                'filters' => array(
                    array(
                        'name' => 'Zend\Filter\StringTrim'
                    )
                )
            ),
            'mediaLinkPage' => array(
                'required' => false
            ),
            'targetLink' => array(
                'required' => false,
            ),            
            'alternateDownload' => array(
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