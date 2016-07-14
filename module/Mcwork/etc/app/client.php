<?php
return array(
    
    'fileattribute' => array(
    
        'appoptions' => array(
            'method' => 'ajax',
            'url' => '/mcwork/services/application/saveattribute',
            'app' => array(
                'worker' => 'Mcwork\Model\Files\SaveAttribute',
                'attribute' => 'file',
                'entity' => 'entity_media_table',
            )
        ),
    
        'modal' => array(
    
            'header' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns'
                    )
                ),
                'content' => array(
                    'element' => 'h4',
                    'attr' => array(
                        'id' => 'modalhead'
                    ),
                    'translate' => array(
                        'key' => 'heads',
                        'txt' => 'datainfo'
                    ),
                    'behind' => '<span id="server-process"> </span>'
                )
            ),
    
            'body' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns',
                        'id' => 'modalcontent'
                    )
                ),
                'content' => array(
    
                    'options' => array(
                        'getFieldValSrv' => array(
    
                            'ident' => 'data-ident',
                            'url' => '/mcwork/services/application/attribute',
                            'data' => array(
                                'entity' => 'entity_media_table',
                                'app' => 'fileattribute',
                                'id' => '1'
                            )
                        ),
    
                        'form' => array(
                            'action' => '/mcwork/files/edit',
                            'attributes' => array(
                                'id' => 'appedit'
                            )
                        )
                    ),
                    'form' => array(
    
                        1 => array(
                            'spec' => array(
                                'name' => 'headline',
                                'required' => false,
                                'options' => array(
                                    'label' => 'headline',
                                    'deco-row' => 'text'
                                ),
                                'type' => 'Text',
    
                                'attributes' => array(
                                    'id' => 'headline'
                                )
                            )
                        ),
                        2 => array(
                            'spec' => array(
                                'name' => 'description',
                                'required' => false,
                                'options' => array(
                                    'label' => 'description',
                                    'deco-row' => 'text'
                                ),
                                'type' => 'Textarea',
    
                                'attributes' => array(
                                    'id' => 'description',
                                    'row' => '2'
                                )
                            )
                        ),
                        3 => array(
                            'spec' => array(
                                'name' => 'linkname',
                                'required' => false,
                                'options' => array(
                                    'label' => 'linkname',
                                    'deco-row' => 'text'
                                ),
                                'type' => 'Text',
    
                                'attributes' => array(
                                    'id' => 'linkname'
                                )
                            )
                        )
                    )
                )
            ),
            'footer' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns'
                    )
                ),
                'content' => array(
                    'row' => array(
                        'element' => 'ul',
                        'attr' => array(
                            'class' => 'modal-buttons right'
                        )
                    ),
                    'grids' => array(
                        '1' => array(
                            'element' => 'li'
                        ),
                        '2' => array(
                            'element' => 'li'
                        )
                    ),
                    '1' => array(
                        'element' => 'button',
                        'attr' => array(
                            'id' => 'save-button',
                            'class' => 'button'
                        ),
                        'translate' => array(
                            'key' => 'btn',
                            'txt' => 'save'
                        )
                    ),
                    '2' => array(
                        'element' => 'button',
                        'attr' => array(
                            'id' => 'close-button',
                            'class' => 'button'
                        ),
                        'translate' => array(
                            'key' => 'btn',
                            'txt' => 'close'
                        )
                    )
                )
            )
        )
    ),
    
    'imageattribute' => array(
    
        'appoptions' => array(
            'method' => 'ajax',
            'url' => '/mcwork/services/application/saveattribute',
            'app' => array(
                'worker' => 'Mcwork\Model\Files\SaveAttribute',
                'attribute' => 'file',
                'entity' => 'entity_media_table',
            )
        ),
    
        'modal' => array(
    
            'header' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns'
                    )
                ),
                'content' => array(
                    'element' => 'h4',
                    'attr' => array(
                        'class' => 'test',
                        'id' => 'modalhead'
                    ),
                    'translate' => array(
                        'key' => 'heads',
                        'txt' => 'datainfo'
                    ),
                    'behind' => '<span id="server-process"> </span>'
                )
            ),
    
            'body' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns',
                        'id' => 'modalcontent'
                    )
                ),
                'content' => array(
    
                    'options' => array(
                        'getFieldValSrv' => array(
    
                            'ident' => 'data-ident',
                            'url' => '/mcwork/services/application/attribute',
                            'data' => array(
                                'entity' => 'entity_media_table',
                                'app' => 'fileattribute',
                                'id' => '1'
                            )
                        ),
    
                        'form' => array(
                            'action' => '/mcwork/files/edit',
                            'attributes' => array(
                                'id' => 'appedit'
                            )
                        )
                    ),
                    'form' => array(
    
                        1 => array(
                            'spec' => array(
                                'name' => 'alt',
                                'required' => true,
                                'options' => array(
                                    'label' => 'alt',
                                    'deco-row' => 'text'
                                ),
                                'type' => 'Text',
    
                                'attributes' => array(
                                    'id' => 'alt',
                                    'required' => 'required'
                                )
                            )
                        ),
                        2 => array(
                            'spec' => array(
                                'name' => 'title',
                                'required' => false,
                                'options' => array(
                                    'label' => 'title',
                                    'deco-row' => 'text'
                                ),
                                'type' => 'Text',
    
                                'attributes' => array(
                                    'id' => 'title'
                                )
                            )
    
                        ),
                        3 => array(
                            'spec' => array(
                                'name' => 'caption',
                                'required' => false,
                                'options' => array(
                                    'label' => 'caption',
                                    'deco-row' => 'text'
                                ),
                                'type' => 'Textarea',
    
                                'attributes' => array(
                                    'id' => 'caption',
                                    'row' => '2'
                                )
                            )
                        ),
                        4 => array(
                            'spec' => array(
                                'name' => 'description',
                                'required' => false,
                                'options' => array(
                                    'label' => 'description',
                                    'deco-row' => 'text'
                                ),
                                'type' => 'Textarea',
    
                                'attributes' => array(
                                    'id' => 'description',
                                    'row' => '2'
                                )
                            )
                        ),
                        5 => array(
                            'spec' => array(
                                'name' => 'longdescription',
                                'required' => false,
                                'options' => array(
                                    'label' => 'description',
                                    'deco-row' => 'text'
                                ),
                                'type' => 'Textarea',
    
                                'attributes' => array(
                                    'id' => 'longdescription',
                                    'row' => '3'
                                )
                            )
                        )
                    )
                )
    
            ),
            'footer' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns'
                    )
                ),
                'content' => array(
                    'row' => array(
                        'element' => 'ul',
                        'attr' => array(
                            'class' => 'modal-buttons right'
                        )
                    ),
                    'grids' => array(
                        '1' => array(
                            'element' => 'li'
                        ),
                        '2' => array(
                            'element' => 'li'
                        )
                    ),
                    '1' => array(
                        'element' => 'button',
                        'attr' => array(
                            'id' => 'save-button',
                            'class' => 'button'
                        ),
                        'translate' => array(
                            'key' => 'btn',
                            'txt' => 'save'
                        )
                    ),
                    '2' => array(
                        'element' => 'button',
                        'attr' => array(
                            'id' => 'close-button',
                            'class' => 'button'
                        ),
                        'translate' => array(
                            'key' => 'btn',
                            'txt' => 'close'
                        )
                    )
                )
            )
        )
    ), 
    
    
    'uploadloginuser' => array(
    
        'modal' => array(
            'header' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns'
                    )
                ),
                'content' => array(
                    'element' => 'h4',
                    'attr' => array(
                        'class' => 'test',
                        'id' => 'modalhead'
                    ),
                    'translate' => array(
                        'key' => 'heads',
                        'txt' => 'uploadloginusrfiles'
                    ),
                    'behind' => '<span id="server-process"> </span>'
                )
            ),
            'body' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns',
                        'id' => 'modalcontent'
                    )
                ),
                'content' => array(
                    'options' => array(
                        'form' => array(
                            'action' => '/municipal/files/upload',
                            'attributes' => array(
                                'id' => 'file-ajax-form',
                                'enctype' => 'multipart/form-data'
                            )
                        )
                    ),
                    'form' => array(
    
                        1 => array(
                            'spec' => array(
                                'name' => 'fileUpload',
                                'required' => true,
                                'options' => array(
                                    'label' => 'uploadfile',
                                    'deco-row' => 'text'
                                ),
                                'type' => 'File',
    
                                'attributes' => array(
                                    'id' => 'fileUpload'
                                )
                            )
                        ),
                        2 => array(
                            'spec' => array(
                                'name' => 'uploadprogress',
                                'options' => array(),
                                'type' => 'Note',
                                'attributes' => array(
                                    'id' => 'uploadprogress',
                                    'value' => '<div class="progress"><span id="percent" class="meter" style="width:0%"> </span></div>'
                                )
                            )
                        ),
                        3 => array(
                            'spec' => array(
                                'name' => 'formextension',
                                'options' => array(),
                                'type' => 'Note',
                                'attributes' => array(
                                    'id' => 'formextension',
                                    'value' => '<div id="mediametas"> </div>'
                                )
                            )
                        )                        
                    )
                )
            ),
            'footer' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns'
                    )
                ),
                'content' => array(
                    'row' => array(
                        'element' => 'ul',
                        'attr' => array(
                            'class' => 'modal-buttons right'
                        )
                    ),
                    'grids' => array(
                        '1' => array(
                            'element' => 'li'
                        ),
                        '2' => array(
                            'element' => 'li'
                        )
                    ),
                    '1' => array(
                        'element' => 'button',
                        'attr' => array(
                            'id' => 'upload-button',
                            'class' => 'button'
                        ),
                        'translate' => array(
                            'key' => 'btn',
                            'txt' => 'upload'
                        )
                    ),
                    '2' => array(
                        'element' => 'button',
                        'attr' => array(
                            'id' => 'cancel-button',
                            'class' => 'button'
                        ),
                        'translate' => array(
                            'key' => 'btn',
                            'txt' => 'close'
                        )
                    )
                )
            )
        )
    ),    
    
    
    
    
    
    'uploadnonpublicfiles' => array(
    
        'modal' => array(
            'header' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns'
                    )
                ),
                'content' => array(
                    'element' => 'h4',
                    'attr' => array(
                        'class' => 'test',
                        'id' => 'modalhead'
                    ),
                    'translate' => array(
                        'key' => 'heads',
                        'txt' => 'uploadnopublic'
                    ),
                    'behind' => '<span id="server-process"> </span>'
                )
            ),
            'body' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns',
                        'id' => 'modalcontent'
                    )
                ),
                'content' => array(
                    'options' => array(
                        'form' => array(
                            'action' => '/mcwork/files/upload',
                            'attributes' => array(
                                'id' => 'file-ajax-form',
                                'enctype' => 'multipart/form-data'
                            )
                        )
                    ),
                    'form' => array(
    
                        1 => array(
                            'spec' => array(
                                'name' => 'fileUpload',
                                'required' => true,
                                'options' => array(
                                    'label' => 'uploadfile',
                                    'deco-row' => 'text'
                                ),
                                'type' => 'File',
    
                                'attributes' => array(
                                    'id' => 'fileUpload'
                                )
                            )
                        ),
                        2 => array(
                            'spec' => array(
                                'name' => 'uploadprogress',
                                'options' => array(),
                                'type' => 'Note',
                                'attributes' => array(
                                    'id' => 'uploadprogress',
                                    'value' => '<div class="progress"><span id="percent" class="meter" style="width:0%"> </span></div>'
                                )
                            )
                        ),
                        3 => array(
                            'spec' => array(
                                'name' => 'formextension',
                                'options' => array(),
                                'type' => 'Note',
                                'attributes' => array(
                                    'id' => 'formextension',
                                    'value' => '<div id="mediametas"> </div>'
                                )
                            )
                        )
                    )
                )
            ),
            'footer' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns'
                    )
                ),
                'content' => array(
                    'row' => array(
                        'element' => 'ul',
                        'attr' => array(
                            'class' => 'modal-buttons right'
                        )
                    ),
                    'grids' => array(
                        '1' => array(
                            'element' => 'li'
                        ),
                        '2' => array(
                            'element' => 'li'
                        )
                    ),
                    '1' => array(
                        'element' => 'button',
                        'attr' => array(
                            'id' => 'upload-button',
                            'class' => 'button'
                        ),
                        'translate' => array(
                            'key' => 'btn',
                            'txt' => 'upload'
                        )
                    ),
                    '2' => array(
                        'element' => 'button',
                        'attr' => array(
                            'id' => 'cancel-button',
                            'class' => 'button'
                        ),
                        'translate' => array(
                            'key' => 'btn',
                            'txt' => 'close'
                        )
                    )
                )
            )
        )
    ),    
    
    'addnewcollection' => array(
        'appoptions' => array(
            'method' => 'ajax',
            'url' => '/mcwork/services/application/addcollection',
            'app' => array()
        ),  
        
        'modal' => array(
            'header' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns'
                    )
                ),
                'content' => array(
                    'element' => 'h4',
                    'attr' => array(
                        'id' => 'modalhead'
                    ),
                    'translate' => array(
                        'key' => 'heads',
                        'txt' => 'copyassets'
                    ),
                    'behind' => '<span id="server-process"> </span>'
                )
            ),
        
            'body' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns',
                        'id' => 'modalcontent'
                    )
                ),
                'content' => array(
        
                    'options' => array(
                        'getFieldValue' => array(),
                        'form' => array(
                            'attributes' => array(
                                'id' => 'appedit'
                            )
                        )
                    ),
        
                    'form' => array(
        
                        1 => array(
                            'spec' => array(
                                'name' => 'collectionname',
                                'required' => true,
                                'options' => array(
                                    'label' => 'collectionname',
                                    'deco-row' => 'text'
                                ),
                                'type' => 'Text',
        
                                'attributes' => array(
                                    'id' => 'collectionname',
                                    'required' => 'required'
                                )
                            )
                        ),
                        2 => array(
                            'spec' => array(
                                'name' => 'collectiontype',
                                'required' => true,
                                'options' => array(
                                    'label' => 'collectiontype',
                                    'value_options' => array(
                                        'styles' => 'Stylesheets',
                                        'scripts' => 'Scripts',
                                        'header' => 'Header scripts',
                                    ),
                                    'deco-row' => 'text'
                                ),
                                'type' => 'Select',
                        
                                'attributes' => array(
                                    'id' => 'collectiontype',
                                    'required' => 'required'
                                )
                            )
                        )                        
                    )
                )
            ),
            'footer' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns'
                    )
                ),
                'content' => array(
                    'row' => array(
                        'element' => 'ul',
                        'attr' => array(
                            'class' => 'modal-buttons right'
                        )
                    ),
                    'grids' => array(
                        '1' => array(
                            'element' => 'li'
                        ),
                        '2' => array(
                            'element' => 'li'
                        )
                    ),
                    '1' => array(
                        'element' => 'button',
                        'attr' => array(
                            'id' => 'save-button',
                            'class' => 'button'
                        ),
                        'translate' => array(
                            'key' => 'btn',
                            'txt' => 'save'
                        )
                    ),
                    '2' => array(
                        'element' => 'button',
                        'attr' => array(
                            'id' => 'cancel-button',
                            'class' => 'button'
                        ),
                        'translate' => array(
                            'key' => 'btn',
                            'txt' => 'close'
                        )
                    )
                )
            )
        )        
        
    ),
    
    
    'assetcollection' => array(
        'appoptions' => array(
            'method' => 'ajax',
            'url' => '/mcwork/services/application/savecollection',
            'app' => array()
        ),
        
        'modal' => array(
            'header' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns'
                    )
                ),
                'content' => array(
                    'element' => 'h4',
                    'attr' => array(
                        'id' => 'modalhead'
                    ),
                    'translate' => array(
                        'key' => 'heads',
                        'txt' => 'collectassets'
                    ),
                    'behind' => '<span id="server-process"> </span>'
                )
            ),
            
            'body' => array(
                
                'content' => array(
                    'row' => array(
                        'element' => 'div',
                        'attr' => array(
                            'class' => 'row'
                        )
                    ),
                    'grids' => array(
                        '1' => array(
                            'element' => 'div',
                            'attr' => array(
                                'id' => 'assetlist',
                                'class' => 'medium-6 columns'
                            )
                        ),
                        '2' => array(
                            'element' => 'div',
                            'attr' => array(
                                'id' => 'assetcollection',
                                'class' => 'medium-6 columns'
                            )
                        )
                    ),
                    '1' => array(
                        'element' => 'p',
                        'attr' => array(),
                        'txt' => 'Files'
                    ),
                    '2' => array(
                        'element' => 'ul',
                        'attr' => array(
                            'id' => 'collectionList',
                            'class' => 'nostyle-list',
                        ),
                        'txt' => '<li>add/edit collection here</li>'
                    )

                    
                )
            )
            ,
            'footer' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns'
                    )
                ),
                'content' => array(
                    'row' => array(
                        'element' => 'ul',
                        'attr' => array(
                            'class' => 'modal-buttons right'
                        )
                    ),
                    'grids' => array(
                        '1' => array(
                            'element' => 'li'
                        ),
                        '2' => array(
                            'element' => 'li'
                        )
                    ),
                    '1' => array(
                        'element' => 'button',
                        'attr' => array(
                            'id' => 'save-button',
                            'class' => 'button'
                        ),
                        'translate' => array(
                            'key' => 'btn',
                            'txt' => 'save'
                        )
                    ),
                    '2' => array(
                        'element' => 'button',
                        'attr' => array(
                            'id' => 'cancel-button',
                            'class' => 'button'
                        ),
                        'translate' => array(
                            'key' => 'btn',
                            'txt' => 'close'
                        )
                    )
                )
            )
        )
    ),
    
    'addcollectionfile' => array(
        'appoptions' => array(
            'method' => 'ajax',
            'url' => '/mcwork/services/application/addcollectionfile',
            'app' => array()
        ),
        'modal' => array(
            'header' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns'
                    )
                ),
                'content' => array(
                    'element' => 'h4',
                    'attr' => array(
                        'id' => 'modalhead'
                    ),
                    'translate' => array(
                        'key' => 'heads',
                        'txt' => 'add_collection_file'
                    ),
                    'behind' => '<span id="server-process"> </span>'
                )
            ),
        
            'body' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns',
                        'id' => 'modalcontent'
                    )
                ),
                'content' => array(
        
                    'options' => array(
                        'getFieldValue' => array(),
                        'form' => array(
                            'attributes' => array(
                                'id' => 'appedit'
                            )
                        )
                    ),
        
                    'form' => array(
        
                        1 => array(
                            'spec' => array(
                                'name' => 'collectionfilename',
                                'required' => true,
                                'options' => array(
                                    'label' => 'filename',
                                    'deco-row' => 'collapse'
                                ),
                                'type' => 'Text',
        
                                'attributes' => array(
                                    'id' => 'collectionfilename',
                                    'required' => 'required'
                                )
                            )
                        )
                    )
                )
            ),
            'footer' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns'
                    )
                ),
                'content' => array(
                    'row' => array(
                        'element' => 'ul',
                        'attr' => array(
                            'class' => 'modal-buttons right'
                        )
                    ),
                    'grids' => array(
                        '1' => array(
                            'element' => 'li'
                        ),
                        '2' => array(
                            'element' => 'li'
                        )
                    ),
                    '1' => array(
                        'element' => 'button',
                        'attr' => array(
                            'id' => 'save-button',
                            'class' => 'button'
                        ),
                        'translate' => array(
                            'key' => 'btn',
                            'txt' => 'add'
                        )
                    ),
                    '2' => array(
                        'element' => 'button',
                        'attr' => array(
                            'id' => 'cancel-button',
                            'class' => 'button'
                        ),
                        'translate' => array(
                            'key' => 'btn',
                            'txt' => 'close'
                        )
                    )
                )
            )
        )        
        
    ),
    
    'copycollectionfile' => array(
        'appoptions' => array(
            'method' => 'ajax',
            'url' => '/mcwork/services/application/copycollectionfile',
            'app' => array()
        ),
        'modal' => array(
            'header' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns'
                    )
                ),
                'content' => array(
                    'element' => 'h4',
                    'attr' => array(
                        'id' => 'modalhead'
                    ),
                    'translate' => array(
                        'key' => 'heads',
                        'txt' => 'copy_collection_file'
                    ),
                    'behind' => '<span id="server-process"> </span>'
                )
            ),
    
            'body' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns',
                        'id' => 'modalcontent'
                    )
                ),
                'content' => array(
    
                    'options' => array(
                        'getFieldValue' => array(),
                        'form' => array(
                            'attributes' => array(
                                'id' => 'appedit'
                            )
                        )
                    ),
    
                    'form' => array(
    
                        1 => array(
                            'spec' => array(
                                'name' => 'filename',
                                'required' => true,
                                'options' => array(
                                    'label' => 'filename',
                                    'deco-row' => 'collapse'
                                ),
                                'type' => 'Text',
    
                                'attributes' => array(
                                    'id' => 'filename',
                                    'required' => 'required'
                                )
                            )
                        )
                    )
                )
            ),
            'footer' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns'
                    )
                ),
                'content' => array(
                    'row' => array(
                        'element' => 'ul',
                        'attr' => array(
                            'class' => 'modal-buttons right'
                        )
                    ),
                    'grids' => array(
                        '1' => array(
                            'element' => 'li'
                        ),
                        '2' => array(
                            'element' => 'li'
                        )
                    ),
                    '1' => array(
                        'element' => 'button',
                        'attr' => array(
                            'id' => 'save-button',
                            'class' => 'button'
                        ),
                        'translate' => array(
                            'key' => 'btn',
                            'txt' => 'add'
                        )
                    ),
                    '2' => array(
                        'element' => 'button',
                        'attr' => array(
                            'id' => 'cancel-button',
                            'class' => 'button'
                        ),
                        'translate' => array(
                            'key' => 'btn',
                            'txt' => 'close'
                        )
                    )
                )
            )
        )
    
    ), 
    
    
    'copyrename' => array(
    
        'appoptions' => array(
            'method' => 'ajax',
            'url' => '/mcwork/services/application/copyrename',
            'app' => array(),
            'datatable' => 'html',
            'request' => true,            
        ),
        'modal' => array(
            'header' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns'
                    )
                ),
                'content' => array(
                    'element' => 'h4',
                    'attr' => array(
                        'id' => 'modalhead'
                    ),
                    'translate' => array(
                        'key' => 'heads',
                        'txt' => 'copyassets'
                    ),
                    'behind' => '<span id="server-process"> </span>'
                )
            ),
    
            'body' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns',
                        'id' => 'modalcontent'
                    )
                ),
                'content' => array(
    
                    'options' => array(
                        'getFieldValue' => array(
                            'filename' => 'data-ident'
                        ),
                        'form' => array(
                            'attributes' => array(
                                'id' => 'appedit'
                            )
                        )
                    ),
    
                    'form' => array(
    
                        1 => array(
                            'spec' => array(
                                'name' => 'filename',
                                'required' => true,
                                'options' => array(
                                    'label' => 'rename',
                                    'deco-row' => 'collapse'
                                ),
                                'type' => 'Text',
    
                                'attributes' => array(
                                    'id' => 'filename',
                                    'required' => 'required'
                                )
                            )
                        )
                    )
                )
            ),
            'footer' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns'
                    )
                ),
                'content' => array(
                    'row' => array(
                        'element' => 'ul',
                        'attr' => array(
                            'class' => 'modal-buttons right'
                        )
                    ),
                    'grids' => array(
                        '1' => array(
                            'element' => 'li'
                        ),
                        '2' => array(
                            'element' => 'li'
                        )
                    ),
                    '1' => array(
                        'element' => 'button',
                        'attr' => array(
                            'id' => 'save-button',
                            'class' => 'button'
                        ),
                        'translate' => array(
                            'key' => 'btn',
                            'txt' => 'copy'
                        )
                    ),
                    '2' => array(
                        'element' => 'button',
                        'attr' => array(
                            'id' => 'cancel-button',
                            'class' => 'button'
                        ),
                        'translate' => array(
                            'key' => 'btn',
                            'txt' => 'close'
                        )
                    )
                )
            )
        )
    ),    
    
    'copyassetfile' => array(
        
        'appoptions' => array(
            'method' => 'ajax',
            'url' => '/mcwork/services/application/copyassetfile',
            'app' => array()
        ),
        'modal' => array(
            'header' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns'
                    )
                ),
                'content' => array(
                    'element' => 'h4',
                    'attr' => array(
                        'id' => 'modalhead'
                    ),
                    'translate' => array(
                        'key' => 'heads',
                        'txt' => 'copyassets'
                    ),
                    'behind' => '<span id="server-process"> </span>'
                )
            ),
            
            'body' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns',
                        'id' => 'modalcontent'
                    )
                ),
                'content' => array(
                    
                    'options' => array(
                        'getFieldValue' => array(
                            'filename' => 'data-ident'
                        ),
                        'form' => array(
                            'attributes' => array(
                                'id' => 'appedit'
                            )
                        )
                    ),
                    
                    'form' => array(
                        
                        1 => array(
                            'spec' => array(
                                'name' => 'filename',
                                'required' => true,
                                'options' => array(
                                    'label' => 'rename',
                                    'deco-row' => 'collapse'
                                ),
                                'type' => 'Text',
                                
                                'attributes' => array(
                                    'id' => 'filename',
                                    'required' => 'required'
                                )
                            )
                        )
                    )
                )
            ),
            'footer' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns'
                    )
                ),
                'content' => array(
                    'row' => array(
                        'element' => 'ul',
                        'attr' => array(
                            'class' => 'modal-buttons right'
                        )
                    ),
                    'grids' => array(
                        '1' => array(
                            'element' => 'li'
                        ),
                        '2' => array(
                            'element' => 'li'
                        )
                    ),
                    '1' => array(
                        'element' => 'button',
                        'attr' => array(
                            'id' => 'save-button',
                            'class' => 'button'
                        ),
                        'translate' => array(
                            'key' => 'btn',
                            'txt' => 'copy'
                        )
                    ),
                    '2' => array(
                        'element' => 'button',
                        'attr' => array(
                            'id' => 'cancel-button',
                            'class' => 'button'
                        ),
                        'translate' => array(
                            'key' => 'btn',
                            'txt' => 'close'
                        )
                    )
                )
            )
        )
    ),
    'copyassetfiles' => array(
        'appoptions' => array(
            'method' => 'ajax',
            'url' => '/mcwork/services/application/copyassetfiles',
            'app' => array()
        ),
        'modal' => array(
            'header' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns'
                    )
                ),
                'content' => array(
                    'element' => 'h4',
                    'attr' => array(
                        'id' => 'modalhead'
                    ),
                    'translate' => array(
                        'key' => 'heads',
                        'txt' => 'copyassets'
                    ),
                    'behind' => '<span id="server-process"> </span>'
                )
            ),
            
            'body' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns',
                        'id' => 'modalcontent'
                    )
                ),
                'content' => array(
                    
                    'options' => array(
                        'form' => array(
                            'attributes' => array(
                                'id' => 'appedit'
                            )
                        )
                    ),
                    
                    'form' => array(
                        
                        1 => array(
                            'spec' => array(
                                'name' => 'foldername',
                                'required' => true,
                                'options' => array(
                                    'label' => 'foldername',
                                    'deco-row' => 'text'
                                ),
                                'type' => 'Text',
                                
                                'attributes' => array(
                                    'id' => 'foldername',
                                    'required' => 'required'
                                )
                            )
                        ),
                        2 => array(
                            'spec' => array(
                                'name' => 'makecollection',
                                'options' => array(
                                    'label' => 'makecollection',
                                    'deco-row' => 'text'
                                ),
                                'type' => 'Text',
                                
                                'attributes' => array(
                                    'id' => 'makecollection',
                                    'class' => 'makecheck'
                                )
                            )
                        ),                       
                    )
                )
            ),
            'footer' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns'
                    )
                ),
                'content' => array(
                    'row' => array(
                        'element' => 'ul',
                        'attr' => array(
                            'class' => 'modal-buttons right'
                        )
                    ),
                    'grids' => array(
                        '1' => array(
                            'element' => 'li'
                        ),
                        '2' => array(
                            'element' => 'li'
                        )
                    ),
                    '1' => array(
                        'element' => 'button',
                        'attr' => array(
                            'id' => 'save-button',
                            'class' => 'button'
                        ),
                        'translate' => array(
                            'key' => 'btn',
                            'txt' => 'copy'
                        )
                    ),
                    '2' => array(
                        'element' => 'button',
                        'attr' => array(
                            'id' => 'cancel-button',
                            'class' => 'button'
                        ),
                        'translate' => array(
                            'key' => 'btn',
                            'txt' => 'close'
                        )
                    )
                )
            )
        )
    ),
    
    
    'copyfile' => array(
    
        'appoptions' => array(
            'method' => 'ajax',
            'url' => '/mcwork/services/application/copyfile',
            'app' => array()
        ),
        'modal' => array(
            'header' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns'
                    )
                ),
                'content' => array(
                    'element' => 'h4',
                    'attr' => array(
                        'id' => 'modalhead'
                    ),
                    'translate' => array(
                        'key' => 'heads',
                        'txt' => 'copyfile'
                    ),
                    'behind' => '<span id="server-process"> </span>'
                )
            ),
    
            'body' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns',
                        'id' => 'modalcontent'
                    )
                ),
                'content' => array(
    
                    'options' => array(
                        'getFieldValue' => array(
                            'filename' => 'data-ident'
                        ),
                        'form' => array(
                            'attributes' => array(
                                'id' => 'appedit'
                            )
                        )
                    ),
    
                    'form' => array(
    
                        1 => array(
                            'spec' => array(
                                'name' => 'filename',
                                'required' => true,
                                'options' => array(
                                    'label' => 'new name',
                                    'deco-row' => 'collapse'
                                ),
                                'type' => 'Text',
    
                                'attributes' => array(
                                    'id' => 'filename',
                                    'required' => 'required'
                                )
                            )
                        )
                    )
                )
            ),
            'footer' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns'
                    )
                ),
                'content' => array(
                    'row' => array(
                        'element' => 'ul',
                        'attr' => array(
                            'class' => 'modal-buttons right'
                        )
                    ),
                    'grids' => array(
                        '1' => array(
                            'element' => 'li'
                        ),
                        '2' => array(
                            'element' => 'li'
                        )
                    ),
                    '1' => array(
                        'element' => 'button',
                        'attr' => array(
                            'id' => 'save-button',
                            'class' => 'button'
                        ),
                        'translate' => array(
                            'key' => 'btn',
                            'txt' => 'copy'
                        )
                    ),
                    '2' => array(
                        'element' => 'button',
                        'attr' => array(
                            'id' => 'cancel-button',
                            'class' => 'button'
                        ),
                        'translate' => array(
                            'key' => 'btn',
                            'txt' => 'close'
                        )
                    )
                )
            )
        )
    ),    
    
    
    'copypublicdir' => array(
    
        'appoptions' => array(
            'method' => 'ajax',
            'url' => '/mcwork/services/application/copypublicdir',
            'app' => array(),
            'datatable' => 'html',
            'request' => true, 
        ),
        'modal' => array(
            'header' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns'
                    )
                ),
                'content' => array(
                    'element' => 'h4',
                    'attr' => array(
                        'id' => 'modalhead'
                    ),
                    'translate' => array(
                        'key' => 'heads',
                        'txt' => 'copydirectory'
                    ),
                    'behind' => '<span id="server-process"> </span>'
                )
            ),
    
            'body' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns',
                        'id' => 'modalcontent'
                    )
                ),
                'content' => array(
    
                    'options' => array(
                        'getFieldValue' => array(
                            'foldername' => 'data-ident'
                        ),
                        'form' => array(
                            'attributes' => array(
                                'id' => 'appedit'
                            )
                        )
                    ),
    
                    'form' => array(
    
                        1 => array(
                            'spec' => array(
                                'name' => 'foldername',
                                'required' => true,
                                'options' => array(
                                    'label' => 'new_foldername',
                                    'deco-row' => 'collapse'
                                ),
                                'type' => 'Text',
    
                                'attributes' => array(
                                    'id' => 'foldername',
                                    'required' => 'required'
                                )
                            )
                        )
                    )
                )
            ),
            'footer' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns'
                    )
                ),
                'content' => array(
                    'row' => array(
                        'element' => 'ul',
                        'attr' => array(
                            'class' => 'modal-buttons right'
                        )
                    ),
                    'grids' => array(
                        '1' => array(
                            'element' => 'li'
                        ),
                        '2' => array(
                            'element' => 'li'
                        )
                    ),
                    '1' => array(
                        'element' => 'button',
                        'attr' => array(
                            'id' => 'save-button',
                            'class' => 'button'
                        ),
                        'translate' => array(
                            'key' => 'btn',
                            'txt' => 'copy'
                        )
                    ),
                    '2' => array(
                        'element' => 'button',
                        'attr' => array(
                            'id' => 'cancel-button',
                            'class' => 'button'
                        ),
                        'translate' => array(
                            'key' => 'btn',
                            'txt' => 'close'
                        )
                    )
                )
            )
        )
    ), 
    
    'dropzoneupload' => array(
    
        'modal' => array(
            'header' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns'
                    )
                ),
                'content' => array(
                    'element' => 'h4',
                    'attr' => array(
                        'id' => 'modalhead'
                    ),
                    'translate' => array(
                        'key' => 'heads',
                        'txt' => 'Upload'
                    ),
                    'behind' => '<span id="server-process"> </span>'
                )
            ),
            'body' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns',
                        'id' => 'modalcontent'
                    )
                ),
                'content' => array(
                    'options' => array(
                        'form' => array(
                            'action' => '/mcwork/files/multipleupload',
                            'attributes' => array(
                                'id' => 'contentinumUpload',
                                'enctype' => 'multipart/form-data',
                                'class' => 'dropzone'
                            )
                        )
                    ),
                    'form' => array(
                        
                        
                        1 => array(
                            'spec' => array(
                                'name' => 'imagesize',
                                'required' => false,
                                'options' => array(
                                    'label' => 'Bildgröße',
                                    'empty_option' => 'Bitte auswählen',
                                    'value_options' => array(
                                        '2048' => '2048px',
                                        '1920' => '1920px',
                                        '1440' => '1440px',
                                        '1200' => '1200px',
                                        '1024' => '1024px',
                                        '680' => '680px',
                                        '480' => '480px',
                                        '320' => '320px',
                                    ),
                                    'desc' => 'Bitte Einstellungen vor dem Bildupload setzen'
                                ),
                                'type' => 'Select',
                        
                                'attributes' => array(
                                    'id' => 'imagesize'
                                )
                            )
                        ), 
                        2 => array(
                            'spec' => array(
                                'name' => 'imagequality',
                                'required' => false,
                                'options' => array(
                                    'label' => 'Bildqualität (Nur jpg)',
                                    'empty_option' => 'Bitte auswählen',
                                    'value_options' => array(
                                        '100' => '100% (Standard, keine Komprimierung)',
                                        '90' => '90% Komprimierung',
                                        '80' => '80% Komprimierung',
                                        '70' => '70% Komprimierung',
                                        '60' => '60% Komprimierung',
                                        '50' => '50% Komprimierung',
                                        '40' => '40% Komprimierung',
                                    ),
                                    'desc' => 'Bitte Einstellungen vor dem Bildupload setzen'
                                ),
                                'type' => 'Select',
                        
                                'attributes' => array(
                                    'id' => 'imagequality',
                                )
                            )
                        ),                        
                        
                        
                        3 => array(
                            'spec' => array(
                                'name' => 'file',
                                'required' => true,
                                'options' => array(
                                    'deco-row' => 'dropzone'
                                ),
                                'type' => 'File',
    
                                'attributes' => array(
                                    'id' => 'file',
                                    'multiple' => 'multiple'
                                )
                            )
                        ),
                        
                       
    
                        3 => array(
                            'spec' => array(
                                'name' => 'currentuploadpath',
                                'required' => false,
                                'options' => array(),
                                'type' => 'Hidden',
    
                                'attributes' => array(
                                    'id' => 'currentuploadpath'
                                )
                            )
                        )
                    )
                )
            ),
            'footer' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns'
                    )
                ),
                'content' => array(
                    'row' => array(
                        'element' => 'ul',
                        'attr' => array(
                            'class' => 'modal-buttons right'
                        )
                    ),
                    'grids' => array(
                        '1' => array(
                            'element' => 'li'
                        )
                    ),
                    '1' => array(
                        'element' => 'button',
                        'attr' => array(
                            'id' => 'cancel-button',
                            'class' => 'button'
                        ),
                        'translate' => array(
                            'key' => 'btn',
                            'txt' => 'close'
                        )
                    )
                )
            )
        )
    ),
    'infoapp' => array(
        
        'appoptions' => array(
            'method' => 'ajax',
            'url' => '/mcwork/services/application/chown',
            'app' => array(),
            'datatable' => 'html',
            'request' => true,
        ),        
        
        'modal' => array(
    
            'header' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns'
                    )
                ),
                'content' => array(
                    'element' => 'h4',
                    'attr' => array(
                        'class' => 'test',
                        'id' => 'modalhead'
                    ),
                    'translate' => array(
                        'key' => 'heads',
                        'txt' => 'datainfo'
                    ),
                    'behind' => '<span id="server-process"> </span>'
                )
            ),
    
            'body' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns',
                        'id' => 'modalcontent'
                    )
                ),
                'content' => array(
                    'options' => array(
                        'getFieldValue' => array(
                            'username' => 'data-username',
                            'registerDate' => 'data-registerDate',
                            'upDate' => 'data-upDate',
                            'createBy' => 'data-createby',
                            'updateBy' => 'data-updateby'
                        ),
                        'form' => array(
                            'action' => '/mcwork/services/application/options',
                            'attributes' => array(
                                'id' => 'data-set-info'
                            )
                        )
                    ),
                    'form' => array(
    
                        1 => array(
                            'spec' => array(
                                'name' => 'username',
                                'required' => false,
                                'options' => array(
                                    'label' => 'currentuser'
                                ),
                                'type' => 'Text',
    
                                'attributes' => array(
                                    'id' => 'username',
                                    'readonly' => 'readonly'
                                )
                            )
                        ),
                        2 => array(
                            'spec' => array(
                                'name' => 'registerDate',
                                'required' => false,
                                'options' => array(
                                    'label' => 'registerDate'
                                ),
                                'type' => 'Text',
    
                                'attributes' => array(
                                    'id' => 'registerDate',
                                    'readonly' => 'readonly'
                                )
                            )
                        ),
                        3 => array(
                            'spec' => array(
                                'name' => 'upDate',
                                'required' => false,
                                'options' => array(
                                    'label' => 'upDate'
                                ),
                                'type' => 'Text',
    
                                'attributes' => array(
                                    'id' => 'upDate',
                                )
                            )
                        ),
                        4 => array(
                            'spec' => array(
                                'name' => 'createBy',
                                'required' => false,
                                'options' => array(
                                    'label' => 'Owner',
                                    'value_function' => array(
                                        'method' => 'ajax',
                                        'url' => '/mcwork/services/application/options',
                                        'data' => array(
                                            'entity' => 'Contentinum\Entity\Users5',
                                            'prepare' => 'select',
                                            'value' => 'id',
                                            'label' => 'username'
                                        )
                                    )
                                ),
                                'type' => 'Select',
    
                                'attributes' => array(
                                    'id' => 'createBy'
                                )
                            )
                        ),
                        5 => array(
                            'spec' => array(
                                'name' => 'updateBy',
                                'required' => false,
                                'options' => array(
                                    'label' => 'updateBy',
                                    'value_function' => array(
                                        'method' => 'ajax',
                                        'url' => '/mcwork/services/application/options',
                                        'data' => array(
                                            'entity' => 'Contentinum\Entity\Users5',
                                            'prepare' => 'select',
                                            'value' => 'id',
                                            'label' => 'username'
                                        )
                                    )
                                ),
                                'type' => 'Select',
    
                                'attributes' => array(
                                    'id' => 'updateBy',
                                )
                            )
                        )
                    )
                )
            ),
            'footer' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns'
                    )
                ),
                'content' => array(
                    'row' => array(
                        'element' => 'ul',
                        'attr' => array(
                            'class' => 'modal-buttons right'
                        )
                    ),
                    'grids' => array(
                        '1' => array(
                            'element' => 'li'
                        ),
                        '2' => array(
                            'element' => 'li'
                        )
                    ),
                    '1' => array(
                        'element' => 'button',
                        'attr' => array(
                            'id' => 'save-button',
                            'class' => 'button'
                        ),
                        'translate' => array(
                            'key' => 'btn',
                            'txt' => 'save'
                        )
                    ),
                    '2' => array(
                        'element' => 'button',
                        'attr' => array(
                            'id' => 'cancel-button',
                            'class' => 'button'
                        ),
                        'translate' => array(
                            'key' => 'btn',
                            'txt' => 'close'
                        )
                    )
                )
            )
        )
    ), 
    'addsubmenue' => array(
    
        'modal' => array(
    
            'header' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns'
                    )
                ),
                'content' => array(
                    'element' => 'h4',
                    'attr' => array(
                        'id' => 'modalhead'
                    ),
                    'translate' => array(
                        'key' => 'heads',
                        'txt' => 'addsubmenue'
                    ),
                    'behind' => '<span id="server-process"> </span>'
                )
            ),
    
            'body' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns',
                        'id' => 'modalcontent'
                    )
                ),
                'content' => array(
    
                    'options' => array(
                        'getFieldValue' => array(
                            'submenueHeadline' => 'data-label'
                        ),
                        'form' => array(
                            'attributes' => array(
                                'id' => 'addsubmenueform'
                            )
                        )
                    ),
    
                    'form' => array(
    
                        1 => array(
                            'spec' => array(
                                'name' => 'submenueHeadline',
                                'required' => false,
                                'options' => array(
                                    'label' => 'headline',
                                    'deco-row' => 'text'
                                ),
                                'type' => 'Textarea',
    
                                'attributes' => array(
                                    'id' => 'submenueHeadline',
                                    'row' => '2'
                                )
                            )
                        )
                    )
                )
            ),
            'footer' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'large-12 columns'
                    )
                ),
                'content' => array(
                    'row' => array(
                        'element' => 'ul',
                        'attr' => array(
                            'class' => 'modal-buttons right'
                        )
                    ),
                    'grids' => array(
                        '1' => array(
                            'element' => 'li'
                        ),
                        '2' => array(
                            'element' => 'li'
                        )
                    ),
                    '1' => array(
                        'element' => 'button',
                        'attr' => array(
                            'id' => 'addsub-button',
                            'class' => 'button'
                        ),
                        'translate' => array(
                            'key' => 'btn',
                            'txt' => 'save'
                        )
                    ),
                    '2' => array(
                        'element' => 'button',
                        'attr' => array(
                            'id' => 'cancel-button',
                            'class' => 'button'
                        ),
                        'translate' => array(
                            'key' => 'btn',
                            'txt' => 'close'
                        )
                    )
                )
            )
        )
    ),    
);