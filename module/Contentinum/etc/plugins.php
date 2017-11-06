<?php
return array(
    
    'key_plugins' => array(
        'topbar' => 'contentinum_navigation',
        'topbar6' => 'contentinum_navigation',
        'mmenu' => 'contentinum_navigation',
        'multilevel' => 'contentinum_navigation',
        'megamenu' => 'contentinum_megamenu',
        
        'newsarchive' => 'contentinum_blogs_monthly',
        'newsyeararchive' => 'contentinum_blogs_annually',
        'blogs' => 'contentinum_blogs',
        'blogreversed' => 'contentinum_blogs_reversed',
        'blogcategory' => 'contentinum_blogs_category',
        'blogtags' => 'contentinum_blogs_tags',
        'news' => 'contentinum_blogs_actual',
        'newscategorie' => 'contentinum_blogs_categorie',
        'newsgroup' => 'contentinum_blogs_groups',
        'navigation' => 'contentinum_navigation',
        'mediagroup' => 'contentinum_media_group',
        'filegroup' => 'contentinum_file_group',
        'accountmembers' => 'contentinum_account_members',
        'maps' => 'contentinum_maps',
        'forms' => 'contentinum_forms',
        
        'langswitch' => 'contentinum_lang_switch',
        
        'breadcrumbs' => 'contentinum_navigation',
        'sitemap' => 'contentinum_navigation',
        
        'microdatagroup' => 'contentinum_contact_group',
        'microdatacontact' => 'contentinum_contact',
        'microdataorganisation' => 'contentinum_organisation',
        'microdataaccountlink' => 'contentinum_account_links',
        
        
        'microdataaccountgroup' => 'contentinum_index_accounts',
        'searchform' => 'contentinum_search_forms',
    
    ),
    
    'viewhelper_plugins' => array(
        'topbar' => 'navigationtopbar',
        'topbar6' => 'navigationtopbar6',
        'mmenu' => 'navigationmmenu',
        'megamenu' => 'navigationmegamenu',
        'multilevel' => 'navigationmultilevel',
        
        'newsarchive' => 'newsarchivelist',
        'newsyeararchive' => 'newsarchiveyearlist',
        'news' => 'newsactual',
        'newscategorie' => 'newscategorie',
        'newsgroup' => 'newsactualgroup',
        'blogs' => 'news',
        'blogreversed' => 'news',
        'blogcategory' => 'blogcategory',
        'blogtags' => 'blogtags',
        'navigation' => 'navigationbuild',
        'mediagroup' => 'mediablockgrid',
        'filegroup' => 'filegroup',
        'accountmembers' => 'accountmembers',
        'maps' => 'maps',
        'forms' => 'forms',
        
        'langswitch' => 'langswitch',
        
        'breadcrumbs' => 'breadcrumbnav',
        'sitemap' => 'sitemapbuild',
        
        'microdatagroup' =>  'microdatacontactgroup',
        'microdatacontact' => 'microdatacontact',
        'microdataorganisation' => 'microdataorganisation',
        'microdataaccountlink' => 'microdataaccountlink',
        
        
        
        'microdataaccountgroup' => 'microdataorganisationgroup',
        'searchform' => 'searchform',
    ),    
    
    
    'default_plugins' => array(
        's' => array(
            
            'microdataaccountlink' => array(
                'resource' => 'intranet',
                'name' => 'Steckbrief Organisationen sortiert',
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Organisationgruppe auswählen',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/options',
                                    'data' => array(
                                        'entity' => 'Contentinum\Entity\FieldTypes',
                                        'prepare' => 'select',
                                        'value' => 'id',
                                        'label' => 'name',
                                    )
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
                
                            'attributes' => array(
                                'required' => 'required',
                                'id' => 'modulParams',
                                'class' => 'chosen-select'
                            )
                        )
                    ),
                    2 => array(
                        'spec' => array(
                            'name' => 'modulFormat',
                            'required' => false,
                            'options' => array(
                                'label' => 'Template auswählen',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/services',
                                    'data' => array(
                                        'entity' => 'templates_plugin_microdataaccount',
                                        'prepare' => 'select',
                                        'result' => 'array',
                                        'value' => '1',
                                        'label' => '1'
                                    )
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
                            'attributes' => array(
                                'id' => 'modulFormat'
                            )
                        )
                    ),
                    3 => array(
                        'spec' => array(
                            'name' => 'modulDisplay',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
                
                            'attributes' => array(
                                'id' => 'modulDisplay'
                            )
                        )
                    ),
                    4 => array(
                        'spec' => array(
                            'name' => 'modulConfig',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
                
                            'attributes' => array(
                                'id' => 'modulConfig'
                            )
                        )
                    ),
                    5 => array(
                        'spec' => array(
                            'name' => 'modulLink',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
                
                            'attributes' => array(
                                'id' => 'modulLink'
                            )
                        )
                    )
                )                
            ),
            
            'microdataaccountgroup' => array(
            
                'resource' => 'intranet',
                'name' => 'Steckbrief Organisationgruppe',
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Organisationgruppe auswählen',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/options',
                                    'data' => array(
                                        'entity' => 'Contentinum\Entity\AccountGroups',
                                        'prepare' => 'select',
                                        'value' => 'id',
                                        'label' => 'name',
                                    )
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
            
                            'attributes' => array(
                                'required' => 'required',
                                'id' => 'modulParams',
                                'class' => 'chosen-select'
                            )
                        )
                    ),
                    2 => array(
                        'spec' => array(
                            'name' => 'modulFormat',
                            'required' => false,
                            'options' => array(
                                'label' => 'Template auswählen',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/services',
                                    'data' => array(
                                        'entity' => 'templates_plugin_microdataaccount',
                                        'prepare' => 'select',
                                        'result' => 'array',
                                        'value' => '1',
                                        'label' => '1'
                                    )
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
                            'attributes' => array(
                                'id' => 'modulFormat'
                            )
                        )
                    ),
                    3 => array(
                        'spec' => array(
                            'name' => 'modulDisplay',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulDisplay'
                            )
                        )
                    ),
                    4 => array(
                        'spec' => array(
                            'name' => 'modulConfig',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulConfig'
                            )
                        )
                    ),
                    5 => array(
                        'spec' => array(
                            'name' => 'modulLink',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulLink'
                            )
                        )
                    )
                )
            
            
            ),            
            
            'microdataorganisation' => array(
                
                'resource' => 'intranet',
                'name' => 'Steckbrief (Einzel Organisation)',
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Organisation auswählen',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/options',
                                    'data' => array(
                                        'entity' => 'Contentinum\Entity\Accounts',
                                        'prepare' => 'select',
                                        'value' => 'id',
                                        'label' => array('organisation', 'organisationExt'),
                                        'sortby' => array('organisation' => 'ASC')
                                    )
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
                
                            'attributes' => array(
                                'required' => 'required',
                                'id' => 'modulParams',
                                'class' => 'chosen-select'
                            )
                        )
                    ),
                    2 => array(
                        'spec' => array(
                            'name' => 'modulFormat',
                            'required' => false,
                            'options' => array(
                                'label' => 'Template auswählen',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/services',
                                    'data' => array(
                                        'entity' => 'templates_plugin_microdataaccount',
                                        'prepare' => 'select',
                                        'result' => 'array',
                                        'value' => '1',
                                        'label' => '1'
                                    )
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
                            'attributes' => array(
                                'id' => 'modulFormat'
                            )
                        )
                    ), 
                    3 => array(
                        'spec' => array(
                            'name' => 'modulDisplay',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
                
                            'attributes' => array(
                                'id' => 'modulDisplay'
                            )
                        )
                    ),
                    4 => array(
                        'spec' => array(
                            'name' => 'modulConfig',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
                
                            'attributes' => array(
                                'id' => 'modulConfig'
                            )
                        )
                    ),
                    5 => array(
                        'spec' => array(
                            'name' => 'modulLink',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
                
                            'attributes' => array(
                                'id' => 'modulLink'
                            )
                        )
                    )
                )                
                
                
            ),
            
            'microdatacontact' => array(
                'resource' => 'intranet',
                'name' => 'Steckbrief (Einzel Kontakt)',
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Kontakt auswählen',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/options',
                                    'data' => array(
                                        'entity' => 'Contentinum\Entity\Contacts',
                                        'prepare' => 'select',
                                        'value' => 'id',
                                        'label' => array('lastName', 'firstName', 'objectName', 'businessTitle'),
                                        'sortby' => array('lastName' => 'ASC')
                                    )
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
            
                            'attributes' => array(
                                'required' => 'required',
                                'id' => 'modulParams',
                                'class' => 'chosen-select'
                            )
                        )
                    ),
                    2 => array(
                        'spec' => array(
                            'name' => 'modulFormat',
                            'required' => false,
                            'options' => array(
                                'label' => 'Template',
                                'empty_option' => 'Please Select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/services',
                                    'data' => array(
                                        'entity' => 'templates_plugin_microdatacontact',
                                        'prepare' => 'select',
                                        'prepare' => 'select',
                                        'value' => 'id',
                                        'label' => 'name'
                                    )
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
            
                            'attributes' => array(
                                'required' => 'required',
                                'id' => 'modulFormat'
                            )
                        )
                    ),
                    3 => array(
                        'spec' => array(
                            'name' => 'modulDisplay',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulDisplay'
                            )
                        )
                    ),
                    4 => array(
                        'spec' => array(
                            'name' => 'modulConfig',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulConfig'
                            )
                        )
                    ),
                    5 => array(
                        'spec' => array(
                            'name' => 'modulLink',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulLink'
                            )
                        )
                    )
                )
            
            ),            
            
            'microdatagroup' => array(
                'resource' => 'intranet',
                'name' => 'Steckbrief Kontaktgruppe',
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Kontaktgruppe auswählen',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/options',
                                    'data' => array(
                                        'entity' => 'Contentinum\Entity\ContactGroups',
                                        'prepare' => 'select',
                                        'value' => 'id',
                                        'label' => 'name'
                                    )
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
            
                            'attributes' => array(
                                'required' => 'required',
                                'id' => 'modulParams'
                            )
                        )
                    ),                    
                    2 => array(
                        'spec' => array(
                            'name' => 'modulFormat',
                            'required' => false,
                            'options' => array(
                                'label' => 'Template auswählen',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/services',
                                    'data' => array(
                                        'entity' => 'templates_plugin_microdatagroup',
                                        'prepare' => 'select',
                                        'result' => 'array',
                                        'value' => '1',
                                        'label' => '1'
                                    )
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
                            'attributes' => array(
                                'id' => 'modulFormat'
                            )
                        )
                    ),                    
                    3 => array(
                        'spec' => array(
                            'name' => 'modulDisplay',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulDisplay'
                            )
                        )
                    ),
                    4 => array(
                        'spec' => array(
                            'name' => 'modulConfig',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulConfig'
                            )
                        )
                    ),
                    5 => array(
                        'spec' => array(
                            'name' => 'modulLink',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulLink'
                            )
                        )
                    )
                )
            ),            
            
            
        ),
        
        'n' => array(
            
            'langswitch' => array(
                'resource' => 'intranet',
                'name' => 'Language Switch',
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Language Navigation',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/options',
                                    'data' => array(
                                        'entity' => 'Contentinum\Entity\WebPreferences',
                                        'prepare' => 'select',
                                        'value' => 'id',
                                        'label' => 'host'
                                    )
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
                            'attributes' => array(
                                'required' => 'required',
                                'id' => 'modulParams'
                            )
                        )
                    ),
                    2 => array(
                        'spec' => array(
                            'name' => 'modulDisplay',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
                            'attributes' => array(
                                'id' => 'modulDisplay'
                            )
                        )
                    ),
                    3 => array(
                        'spec' => array(
                            'name' => 'modulLink',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
                            
                            'attributes' => array(
                                'id' => 'modulLink'
                            )
                        )
                    ),
                    4 => array(
                        'spec' => array(
                            'name' => 'modulConfig',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
                            
                            'attributes' => array(
                                'id' => 'modulConfig'
                            )
                        )
                    ),
                    5 => array(
                        'spec' => array(
                            'name' => 'modulFormat',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
                            
                            'attributes' => array(
                                'required' => 'required',
                                'id' => 'modulFormat'
                            )
                        )
                    )
                )
            ),  
            
            
            'megamenu' => array(
                'resource' => 'intranet',
                'name' => 'Navigation Mega Menu',
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Navigation auswählen',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/options',
                                    'data' => array(
                                        'entity' => 'Contentinum\Entity\WebNavigations',
                                        'prepare' => 'select',
                                        'value' => 'id',
                                        'label' => 'title'
                                    )
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
                            'attributes' => array(
                                'required' => 'required',
                                'id' => 'modulParams'
                            )
                        )
                    ),
                    2 => array(
                        'spec' => array(
                            'name' => 'modulDisplay',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
                            'attributes' => array(
                                'id' => 'modulDisplay'
                            )
                        )
                    ),
                    3 => array(
                        'spec' => array(
                            'name' => 'modulLink',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulLink'
                            )
                        )
                    ),
                    4 => array(
                        'spec' => array(
                            'name' => 'modulConfig',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulConfig'
                            )
                        )
                    ),
                    5 => array(
                        'spec' => array(
                            'name' => 'modulFormat',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'required' => 'required',
                                'id' => 'modulFormat'
                            )
                        )
                    )
                )
            ),            
            
            'topbar6' => array(
                'resource' => 'intranet',
                'name' => 'Navigation (Topbar Foundation 6)',
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Navigation auswählen',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/options',
                                    'data' => array(
                                        'entity' => 'Contentinum\Entity\WebNavigations',
                                        'prepare' => 'select',
                                        'value' => 'id',
                                        'label' => 'title'
                                    )
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
                            'attributes' => array(
                                'required' => 'required',
                                'id' => 'modulParams'
                            )
                        )
                    ),
                    2 => array(
                        'spec' => array(
                            'name' => 'modulDisplay',
                            'required' => false,
                            'options' => array(
                                'label' => 'Brand name',
                                'deco-row' => 'text'
                            ),
                            'type' => 'Text',
                            'attributes' => array(
                                'id' => 'modulDisplay'
                            )
                        )
                    ),
                    3 => array(
                        'spec' => array(
                            'name' => 'modulLink',
                            'required' => false,
                            'options' => array(
                                'label' => 'Brand name link',
                                'deco-row' => 'text'
                            ),
                            'type' => 'Text',
                            'attributes' => array(
                                'id' => 'modulLink'
                            )
                        )
                    ),
                    4 => array(
                        'spec' => array(
                            'name' => 'modulConfig',
                            'required' => false,
                            'options' => array(
                                'label' => 'Bild als Brandname',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/configure',
                                    'data' => array(
                                        'service' => 'mcwork_public_mediasrc',
                                        'prepare' => 'select',
                                        'value' => 'id',
                                        'label' => 'name'
                                    )
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
                            'attributes' => array(
                                'id' => 'modulConfig'
                            )
                        )
                    ),
                    5 => array(
                        'spec' => array(
                            'name' => 'modulFormat',
                            'required' => false,
                            'options' => array(
                                'label' => 'Format',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/services',
                                    'data' => array(
                                        'entity' => 'templates_plugin_topbar6',
                                        'prepare' => 'select',
                                        'value' => 'id',
                                        'label' => 'name'
                                    )
                                ),                                
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
                            'attributes' => array(
                                'required' => 'required',
                                'id' => 'modulFormat'
                            )
                        )
                    )
                )
            ),            
            
            'topbar' => array(
                'resource' => 'intranet',
                'name' => 'Navigation (Topbar)',
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Navigation auswählen',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/options',
                                    'data' => array(
                                        'entity' => 'Contentinum\Entity\WebNavigations',
                                        'prepare' => 'select',
                                        'value' => 'id',
                                        'label' => 'title'
                                    )
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
                            'attributes' => array(
                                'required' => 'required',
                                'id' => 'modulParams'
                            )
                        )
                    ),
                    2 => array(
                        'spec' => array(
                            'name' => 'modulDisplay',
                            'required' => false,
                            'options' => array(
                                'label' => 'Brand name',
                                'deco-row' => 'text'
                            ),
                            'type' => 'Text',
                            'attributes' => array(
                                'id' => 'modulDisplay'
                            )
                        )
                    ),
                    3 => array(
                        'spec' => array(
                            'name' => 'modulLink',
                            'required' => false,
                            'options' => array(
                                'label' => 'Brand name link',
                                'deco-row' => 'text'
                            ),
                            'type' => 'Text',
                            'attributes' => array(
                                'id' => 'modulLink'
                            )
                        )
                    ),
                    4 => array(
                        'spec' => array(
                            'name' => 'modulConfig',
                            'required' => false,
                            'options' => array(
                                'label' => 'Bild als Brandname',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/configure',
                                    'data' => array(
                                        'service' => 'mcwork_public_mediasrc',
                                        'prepare' => 'select',
                                        'value' => 'id',
                                        'label' => 'name'
                                    )
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
                            'attributes' => array(
                                'id' => 'modulConfig'
                            )
                        )
                    ),
                    5 => array(
                        'spec' => array(
                            'name' => 'modulFormat',
                            'required' => false,
                            'options' => array(
                                'label' => 'Format',
                                'value_options' => array(
                                    'topbar' => 'Responsive Topbar',
                                    'topbarleft' => 'Responsive Topbar (left)'
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
                            'attributes' => array(
                                'required' => 'required',
                                'id' => 'modulFormat'
                            )
                        )
                    )
                )
            ),
            
            
            'breadcrumbs' => array(
                'resource' => 'intranet',
                'name' => 'Breadcrumb',
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Navigation auswählen',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/options',
                                    'data' => array(
                                        'entity' => 'Contentinum\Entity\WebNavigations',
                                        'prepare' => 'select',
                                        'value' => 'id',
                                        'label' => 'title'
                                    )
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
            
                            'attributes' => array(
                                'required' => 'required',
                                'id' => 'modulParams'
                            )
                        )
                    ),
                    2 => array(
                        'spec' => array(
                            'name' => 'modulDisplay',
                            'required' => false,
                            'options' => array(
                                'label' => 'Branch depth',
                                'empty_option' => 'Max depth',
                                'value_options' => array(
                                    '1' => 'Level 1',
                                    '2' => 'Level 2',
                                    '3' => 'Level 3'
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
            
                            'attributes' => array(
                                'id' => 'modulDisplay'
                            )
                        )
                    ),
                    3 => array(
                        'spec' => array(
                            'name' => 'modulFormat',
                            'required' => false,
                            'options' => array(
                                'label' => 'Template auswählen',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/services',
                                    'data' => array(
                                        'entity' => 'templates_plugin_navigation',
                                        'prepare' => 'select',
                                        'result' => 'array',
                                        'value' => '1',
                                        'label' => '1'
                                    )
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
                            'attributes' => array(
                                'id' => 'modulFormat'
                            )
                        )
                    ),
                    4 => array(
                        'spec' => array(
                            'name' => 'modulConfig',
                            'required' => false,
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulConfig'
                            )
                        )
                    ),
                    5 => array(
                        'spec' => array(
                            'name' => 'modulLink',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulLink'
                            )
                        )
                    )
                )
            ),            
            'sitemap' => array(
                'resource' => 'intranet',
                'name' => 'Sitemap HTML',
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Navigation auswählen',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/options',
                                    'data' => array(
                                        'entity' => 'Contentinum\Entity\WebNavigations',
                                        'prepare' => 'select',
                                        'value' => 'id',
                                        'label' => 'title'
                                    )
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
                
                            'attributes' => array(
                                'required' => 'required',
                                'id' => 'modulParams'
                            )
                        )
                    ),
                    2 => array(
                        'spec' => array(
                            'name' => 'modulDisplay',
                            'required' => false,
                            'options' => array(
                                'label' => 'Branch depth',
                                'empty_option' => 'Max depth',
                                'value_options' => array(
                                    '1' => 'Level 1',
                                    '2' => 'Level 2',
                                    '3' => 'Level 3'
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
                
                            'attributes' => array(
                                'id' => 'modulDisplay'
                            )
                        )
                    ),
                    3 => array(
                        'spec' => array(
                            'name' => 'modulFormat',
                            'required' => false,
                            'options' => array(
                                'label' => 'Template auswählen',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/services',
                                    'data' => array(
                                        'entity' => 'templates_plugin_navigation',
                                        'prepare' => 'select',
                                        'result' => 'array',
                                        'value' => '1',
                                        'label' => '1'
                                    )
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
                            'attributes' => array(
                                'id' => 'modulFormat'
                            )
                        )
                    ),
                    4 => array(
                        'spec' => array(
                            'name' => 'modulConfig',
                            'required' => false,
                            'options' => array(
                                'label' => 'Set display headline',
                                'empty_option' => 'No headline',
                                'value_options' => array(
                                    'displayheadline' => 'Display headline'
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
                
                            'attributes' => array(
                                'id' => 'modulConfig'
                            )
                        )
                    ),
                    5 => array(
                        'spec' => array(
                            'name' => 'modulLink',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
                
                            'attributes' => array(
                                'id' => 'modulLink'
                            )
                        )
                    )
                )                
            ),
            'navigation' => array(
                'resource' => 'intranet',
                'name' => 'Navigation',
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Navigation auswählen',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/options',
                                    'data' => array(
                                        'entity' => 'Contentinum\Entity\WebNavigations',
                                        'prepare' => 'select',
                                        'value' => 'id',
                                        'label' => 'title'
                                    )
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
            
                            'attributes' => array(
                                'required' => 'required',
                                'id' => 'modulParams'
                            )
                        )
                    ),
                    2 => array(
                        'spec' => array(
                            'name' => 'modulDisplay',
                            'required' => false,
                            'options' => array(
                                'label' => 'Branch depth',
                                'empty_option' => 'Max depth',
                                'value_options' => array(
                                    '1' => 'Level 1',
                                    '2' => 'Level 2',
                                    '3' => 'Level 3'
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
            
                            'attributes' => array(
                                'id' => 'modulDisplay'
                            )
                        )
                    ),
                    3 => array(
                        'spec' => array(
                            'name' => 'modulFormat',
                            'required' => false,
                            'options' => array(
                                'label' => 'Template auswählen',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/services',
                                    'data' => array(
                                        'entity' => 'templates_plugin_navigation',
                                        'prepare' => 'select',
                                        'result' => 'array',
                                        'value' => '1',
                                        'label' => '1'
                                    )
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
                            'attributes' => array(
                                'id' => 'modulFormat'
                            )
                        )
                    ),                    
                    4 => array(
                        'spec' => array(
                            'name' => 'modulConfig',
                            'required' => false,
                            'options' => array(
                                'label' => 'Set display headline',
                                'empty_option' => 'No headline',
                                'value_options' => array(
                                    'displayheadline' => 'Display headline'
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
            
                            'attributes' => array(
                                'id' => 'modulConfig'
                            )
                        )
                    ),
                    5 => array(
                        'spec' => array(
                            'name' => 'modulLink',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulLink'
                            )
                        )
                    )
                )
            ),
            'multilevel' => array(
                'resource' => 'intranet',
                'name' => 'Navigation (Multilevel)',
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Navigation auswählen',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/options',
                                    'data' => array(
                                        'entity' => 'Contentinum\Entity\WebNavigations',
                                        'prepare' => 'select',
                                        'value' => 'id',
                                        'label' => 'title'
                                    )
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
                            'attributes' => array(
                                'required' => 'required',
                                'id' => 'modulParams'
                            )
                        )
                    ),
                    2 => array(
                        'spec' => array(
                            'name' => 'modulDisplay',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulDisplay'
                            )
                        )
                    ),
                    3 => array(
                        'spec' => array(
                            'name' => 'modulLink',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulLink'
                            )
                        )
                    ),
                    4 => array(
                        'spec' => array(
                            'name' => 'modulConfig',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulConfig'
                            )
                        )
                    ),
                    5 => array(
                        'spec' => array(
                            'name' => 'modulFormat',
                            'required' => false,
                            'options' => array(
                                'label' => 'Format',
                                'value_options' => array(
                                    'multilevel' => 'Multilevel Navigation'
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
            
                            'attributes' => array(
                                'required' => 'required',
                                'id' => 'modulFormat'
                            )
                        )
                    )
                )
            )            
            
            
            
        ),
        'm' => array(
            
            
            'maps' => array(
                'resource' => 'intranet',
                'name' => 'Karten (Google Maps)',
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Karte auswählen',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/options',
                                    'data' => array(
                                        'entity' => 'Contentinum\Entity\WebMaps',
                                        'prepare' => 'select',
                                        'value' => 'id',
                                        'label' => 'headline'
                                    )
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
            
                            'attributes' => array(
                                'required' => 'required',
                                'id' => 'modulParams'
                            )
                        )
                    ),
                    2 => array(
                        'spec' => array(
                            'name' => 'modulFormat',
                            'required' => false,
                            'options' => array(
                                'label' => 'Headline',
                                'empty_option' => 'No headline',
                                'value_options' => array(
                                    'h1' => 'Level 1',
                                    'h2' => 'Level 2',
                                    'h3' => 'Level 3',
                                    'h4' => 'Level 4'
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
            
                            'attributes' => array(
                                'id' => 'modulFormat'
                            )
                        )
                    ),
                    3 => array(
                        'spec' => array(
                            'name' => 'modulDisplay',
                            'required' => false,
                            'options' => array(
                                'label' => 'Google ApiKey',
                                'deco-row' => 'text'
                            ),
                            'type' => 'Text',
            
                            'attributes' => array(
                                'id' => 'modulDisplay'
                            )
                        )
                    ),
                    4 => array(
                        'spec' => array(
                            'name' => 'modulConfig',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulConfig'
                            )
                        )
                    ),
                    5 => array(
                        'spec' => array(
                            'name' => 'modulLink',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulLink'
                            )
                        )
                    )
                )
            )            
            
            
            
        ),
        
        'b' => array(
            'newsgroup' => array(
               
                'resource' => 'intranet',
                'name' => 'Nachrichtengruppe Aktuell',
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Nachrichtengruppe auswählen',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/options',
                                    'data' => array(
                                        'entity' => 'Contentinum\Entity\WebContentNameGroup',
                                        'prepare' => 'select',
                                        'result' => 'array',
                                        'value' => 'id',
                                        'label' => 'name'
                                    )
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
                
                            'attributes' => array(
                                'required' => 'required',
                                'id' => 'modulParams'
                            )
                        )
                    ),
                    2 => array(
                        'spec' => array(
                            'name' => 'modulFormat',
                            'required' => false,
                            'options' => array(
                                'label' => 'Template auswählen',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/services',
                                    'data' => array(
                                        'entity' => 'templates_plugin_newsactual',
                                        'prepare' => 'select',
                                        'result' => 'array',
                                        'value' => '1',
                                        'label' => '1'
                                    )
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
                            'attributes' => array(
                                'id' => 'modulFormat'
                            )
                        )
                    ),
                    3 => array(
                        'spec' => array(
                            'name' => 'modulDisplay',
                            'required' => false,
                            'options' => array(
                                'label' => 'Display items',
                                'value_options' => array(
                                    '1' => 'Display 1',
                                    '2' => 'Display 2',
                                    '3' => 'Display 3',
                                    '4' => 'Display 4',
                                    '5' => 'Display 5',
                                    '6' => 'Display 6',
                                    '7' => 'Display 7',
                                    '8' => 'Display 8',
                                    '9' => 'Display 9',
                                    '10' => 'Display 10',
                                    '11' => 'Display 11',
                                    '12' => 'Display 12',
                                    '13' => 'Display 13',
                                    '14' => 'Display 14',
                                    '15' => 'Display 15',
                                    '16' => 'Display 16',
                                    '17' => 'Display 17',
                                    '18' => 'Display 18',
                                    '19' => 'Display 19',
                                    '20' => 'Display 20',
                                    '9999' => '&infin;'
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
                
                            'attributes' => array(
                                'id' => 'modulDisplay',
                            )
                        )
                    ),
                
                    4 => array(
                        'spec' => array(
                            'name' => 'modulConfig',
                            'required' => false,
                            'options' => array(
                                'label' => 'Format Datum wählen',
                                'empty_option' => 'Please select',
                                'value_options' => array(
                                    'FULL' => 'Name Wochentag, Name Monat, Jahr 4 stellig',
                                    'LONG' => 'Name Monat, Jahr 4 stellig',
                                    'MEDIUM' => 'Nur Datum, Jahr 4 stellig',
                                    'SHORT' => 'Nur Datum, Jahr 2 stellig',
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
            
                            'attributes' => array(
                                'id' => 'modulConfig'
                            )
                        )
                    ),
                    5 => array(
                        'spec' => array(
                            'name' => 'modulLink',
                            'required' => false,
                            'options' => array(
                                'label' => 'Social Media Buttons',
                                'value_options' => array(
                                    'no' => 'Keine Buttons einblenden',
                                    'yes' => 'Social Media Buttons einblenden',
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
                
                            'attributes' => array(
                                'id' => 'modulLink'
                            )
                        )
                    )
                )                
                
                
            ),
            
            'newscategorie' => array(
                'resource' => 'intranet',
                'name' => 'Nachrichten nach Kategorie',
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Kategorie auswählen',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/blogcategorie',
                                    'data' => array(
                                        'entity' => 'Contentinum\Entity\WebTags',
                                        'prepare' => 'select',
                                        'result' => 'array',
                                        'value' => '1',
                                        'label' => '1'
                                    )
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
            
                            'attributes' => array(
                                'required' => 'required',
                                'id' => 'modulParams'
                            )
                        )
                    ),
                    2 => array(
                        'spec' => array(
                            'name' => 'modulFormat',
                            'required' => false,
                            'options' => array(
                                'label' => 'Template auswählen',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/services',
                                    'data' => array(
                                        'entity' => 'templates_plugin_newsactual',
                                        'prepare' => 'select',
                                        'result' => 'array',
                                        'value' => '1',
                                        'label' => '1'
                                    )
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
                            'attributes' => array(
                                'id' => 'modulFormat'
                            )
                        )
                    ),
                    3 => array(
                        'spec' => array(
                            'name' => 'modulDisplay',
                            'required' => false,
                            'options' => array(
                                'label' => 'Display items',
                                'value_options' => array(
                                    '1' => 'Display 1',
                                    '2' => 'Display 2',
                                    '3' => 'Display 3',
                                    '4' => 'Display 4',
                                    '5' => 'Display 5',
                                    '6' => 'Display 6',
                                    '7' => 'Display 7',
                                    '8' => 'Display 8',
                                    '9' => 'Display 9',
                                    '10' => 'Display 10',
                                    '11' => 'Display 11',
                                    '12' => 'Display 12',
                                    '13' => 'Display 13',
                                    '14' => 'Display 14',
                                    '15' => 'Display 15',
                                    '16' => 'Display 16',
                                    '17' => 'Display 17',
                                    '18' => 'Display 18',
                                    '19' => 'Display 19',
                                    '20' => 'Display 20',
                                    '9999' => '&infin;'
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
            
                            'attributes' => array(
                                'id' => 'modulDisplay',
                            )
                        )
                    ),
            
                    4 => array(
                        'spec' => array(
                            'name' => 'modulConfig',
                            'required' => false,
                            'options' => array(
                                'label' => 'Format Datum wählen',
                                'empty_option' => 'Please select',
                                'value_options' => array(
                                    'FULL' => 'Name Wochentag, Name Monat, Jahr 4 stellig',
                                    'LONG' => 'Name Monat, Jahr 4 stellig',
                                    'MEDIUM' => 'Nur Datum, Jahr 4 stellig',
                                    'SHORT' => 'Nur Datum, Jahr 2 stellig',
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
            
                            'attributes' => array(
                                'id' => 'modulConfig'
                            )
                        )
                    ),
                    5 => array(
                        'spec' => array(
                            'name' => 'modulLink',
                            'required' => false,
                            'options' => array(
                                'label' => 'Format Anzeige wählen',
                                'empty_option' => 'Please select',
                                'value_options' => array(
                                    'full' => 'Überschricht, Nachrichtentextanriß und Bild (Standard)',
                                    'nopictures' => 'Überschricht, Nachrichtentextanriß ohne Bild',
                                    'onlyheadline' => 'Nur Überschrift mit Datum',
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
            
                            'attributes' => array(
                                'id' => 'modulLink'
                            )
                        )
                    )
                )
            ),            
            
            'news' => array(
                'resource' => 'intranet',
                'name' => 'Nachrichten Aktuell',
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Nachrichten auswählen',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/blogselect',
                                    'data' => array(
                                        'entity' => 'Contentinum\Entity\WebContentGroups',
                                        'prepare' => 'select',
                                        'result' => 'array',
                                        'value' => '1',
                                        'label' => '1'
                                    )
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
            
                            'attributes' => array(
                                'required' => 'required',
                                'id' => 'modulParams'
                            )
                        )
                    ),
                    2 => array(
                        'spec' => array(
                            'name' => 'modulFormat',
                            'required' => false,
                            'options' => array(
                                'label' => 'Template auswählen',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/services',
                                    'data' => array(
                                        'entity' => 'templates_plugin_newsactual',
                                        'prepare' => 'select',
                                        'result' => 'array',
                                        'value' => '1',
                                        'label' => '1'
                                    )
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
                            'attributes' => array(
                                'id' => 'modulFormat'
                            )
                        )
                    ),                 
                    3 => array(
                        'spec' => array(
                            'name' => 'modulDisplay',
                            'required' => false,
                            'options' => array(
                                'label' => 'Display items',
                                'value_options' => array(
                                    '1' => 'Display 1',
                                    '2' => 'Display 2',
                                    '3' => 'Display 3',
                                    '4' => 'Display 4',
                                    '5' => 'Display 5',
                                    '6' => 'Display 6',
                                    '7' => 'Display 7',
                                    '8' => 'Display 8',
                                    '9' => 'Display 9',
                                    '10' => 'Display 10',
                                    '11' => 'Display 11',
                                    '12' => 'Display 12',
                                    '13' => 'Display 13',
                                    '14' => 'Display 14',
                                    '15' => 'Display 15',
                                    '16' => 'Display 16',
                                    '17' => 'Display 17',
                                    '18' => 'Display 18',
                                    '19' => 'Display 19',
                                    '20' => 'Display 20',
                                    '9999' => '&infin;'
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
            
                            'attributes' => array(
                                'id' => 'modulDisplay',
                            )
                        )
                    ),
            
                    4 => array(
                        'spec' => array(
                            'name' => 'modulConfig',
                            'required' => false,
                            'options' => array(
                                'label' => 'Format Datum wählen',
                                'empty_option' => 'Please select',
                                'value_options' => array(
                                    'FULL' => 'Name Wochentag, Name Monat, Jahr 4 stellig',
                                    'LONG' => 'Name Monat, Jahr 4 stellig',
                                    'MEDIUM' => 'Nur Datum, Jahr 4 stellig',
                                    'SHORT' => 'Nur Datum, Jahr 2 stellig',
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
            
                            'attributes' => array(
                                'id' => 'modulConfig'
                            )
                        )
                    ),
                    5 => array(
                        'spec' => array(
                            'name' => 'modulLink',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulLink'
                            )
                        )
                    )
                )
            ),
            'blogreversed' => array(
                'resource' => 'intranet',
                'name' => 'Nachrichten (Reversed)',
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Nachrichten auswählen',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/blogselect',
                                    'data' => array(
                                        'entity' => 'Contentinum\Entity\WebContentGroups',
                                        'prepare' => 'select',
                                        'result' => 'array',
                                        'value' => '1',
                                        'label' => '1'
                                    )
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
                
                            'attributes' => array(
                                'required' => 'required',
                                'id' => 'modulParams'
                            )
                        )
                    ),
                    2 => array(
                        'spec' => array(
                            'name' => 'modulDisplay',
                            'required' => false,
                            'options' => array(
                                'label' => 'Display items',
                                'value_options' => array(
                                    '1' => 'Display 1',
                                    '2' => 'Display 2',
                                    '3' => 'Display 3',
                                    '4' => 'Display 4',
                                    '5' => 'Display 5',
                                    '6' => 'Display 6',
                                    '7' => 'Display 7',
                                    '8' => 'Display 8',
                                    '9' => 'Display 9',
                                    '10' => 'Display 10',
                                    '11' => 'Display 11',
                                    '12' => 'Display 12',
                                    '13' => 'Display 13',
                                    '14' => 'Display 14',
                                    '15' => 'Display 15',
                                    '16' => 'Display 16',
                                    '17' => 'Display 17',
                                    '18' => 'Display 18',
                                    '19' => 'Display 19',
                                    '20' => 'Display 20',                                    
                                    '9999' => '&infin;'
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
            
                            'attributes' => array(
                                'required' => 'required',
                                'id' => 'modulFormat'
                            )
                        )
                    ),
                    3 => array(
                        'spec' => array(
                            'name' => 'modulFormat',
                            'required' => false,
                            'options' => array(
                                'label' => 'Abgelaufene Nachrichten',
                                'value_options' => array(
                                    'todate' => 'Am Tag ausblenden',
                                    'totime' => 'Zur Uhrzeit ausblenden',
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
            
                            'attributes' => array(
                                'id' => 'modulFormat'
                            )
                        )
                    ),
                
                    4 => array(
                        'spec' => array(
                            'name' => 'modulConfig',
                            'required' => false,
                            'options' => array(
                                'label' => 'Format Datum wählen',
                                'empty_option' => 'Please select',
                                'value_options' => array(
                                    'FULL' => 'Name Wochentag, Name Monat, Jahr 4 stellig',
                                    'LONG' => 'Name Monat, Jahr 4 stellig',
                                    'MEDIUM' => 'Nur Datum, Jahr 4 stellig',
                                    'SHORT' => 'Nur Datum, Jahr 2 stellig',
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
                
                            'attributes' => array(
                                'id' => 'modulConfig'
                            )
                        )
                    ),
                    5 => array(
                        'spec' => array(
                            'name' => 'modulLink',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
                
                            'attributes' => array(
                                'id' => 'modulLink'
                            )
                        )
                    )
                )                
            ),
            'blogs' => array(
                'resource' => 'intranet',
                'name' => 'Nachrichten (Hauptanwendung)',
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Nachrichten auswählen',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/blogselect',
                                    'data' => array(
                                        'entity' => 'Contentinum\Entity\WebContentGroups',
                                        'prepare' => 'select',
                                        'result' => 'array',
                                        'value' => '1',
                                        'label' => '1'
                                    )
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
            
                            'attributes' => array(
                                'required' => 'required',
                                'id' => 'modulParams'
                            )
                        )
                    ),
                    2 => array(
                        'spec' => array(
                            'name' => 'modulDisplay',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulDisplay',
                            )
                        )
                    ),
                    3 => array(
                        'spec' => array(
                            'name' => 'modulFormat',
                            'required' => false,
                            'options' => array(
                                'label' => 'Set display headline y/n',
                                'empty_option' => 'Headline',
                                'value_options' => array(
                                    'y' => 'Enable',
                                    'n' => 'Disable',
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
                            'attributes' => array(
                                'id' => 'modulFormat'
                            )
                        )
                    ),                   
            
                    4 => array(
                        'spec' => array(
                            'name' => 'modulConfig',
                            'required' => false,
                            'options' => array(
                                'label' => 'Format Datum wählen',
                                'empty_option' => 'Please select',
                                'value_options' => array(
                                    'FULL' => 'Name Wochentag, Name Monat, Jahr 4 stellig',
                                    'LONG' => 'Name Monat, Jahr 4 stellig',
                                    'MEDIUM' => 'Nur Datum, Jahr 4 stellig',
                                    'SHORT' => 'Nur Datum, Jahr 2 stellig',
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
            
                            'attributes' => array(
                                'id' => 'modulConfig'
                            )
                        )
                    ),
                    5 => array(
                        'spec' => array(
                            'name' => 'modulLink',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulLink'
                            )
                        )
                    )
                )
            ), 
            
            'newsarchive' => array(
                'resource' => 'intranet',
                'name' => 'Nachrichten Archiv monatlich',
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Nachrichten auswählen',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/blogselect',
                                    'data' => array(
                                        'entity' => 'Contentinum\Entity\WebContentGroups',
                                        'prepare' => 'select',
                                        'result' => 'array',
                                        'value' => '1',
                                        'label' => '1'
                                    )
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
            
                            'attributes' => array(
                                'required' => 'required',
                                'id' => 'modulParams'
                            )
                        )
                    ),
                    2 => array(
                        'spec' => array(
                            'name' => 'modulFormat',
                            'required' => false,
                            'options' => array(
                                'label' => 'Listentemplate auswählen',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/services',
                                    'data' => array(
                                        'entity' => 'templates_plugin_newsarchive',
                                        'prepare' => 'select',
                                        'result' => 'array',
                                        'value' => '1',
                                        'label' => '1'
                                    )
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
                            'attributes' => array(
                                'id' => 'modulFormat'
                            )
                        )
                    ),
                    3 => array(
                        'spec' => array(
                            'name' => 'modulDisplay',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulDisplay'
                            )
                        )
                    ),
                    4 => array(
                        'spec' => array(
                            'name' => 'modulConfig',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulConfig'
                            )
                        )
                    ),
                    5 => array(
                        'spec' => array(
                            'name' => 'modulLink',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulLink'
                            )
                        )
                    )
                )
            ),
            
            
            'newsyeararchive' => array(
                'resource' => 'intranet',
                'name' => 'Nachrichten Archiv jährlich',
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Nachrichten auswählen',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/blogselect',
                                    'data' => array(
                                        'entity' => 'Contentinum\Entity\WebContentGroups',
                                        'prepare' => 'select',
                                        'result' => 'array',
                                        'value' => '1',
                                        'label' => '1'
                                    )
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
            
                            'attributes' => array(
                                'required' => 'required',
                                'id' => 'modulParams'
                            )
                        )
                    ),
                    2 => array(
                        'spec' => array(
                            'name' => 'modulFormat',
                            'required' => false,
                            'options' => array(
                                'label' => 'Listentemplate auswählen',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/services',
                                    'data' => array(
                                        'entity' => 'templates_plugin_newsyeararchive',
                                        'prepare' => 'select',
                                        'result' => 'array',
                                        'value' => '1',
                                        'label' => '1'
                                    )
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
                            'attributes' => array(
                                'id' => 'modulFormat'
                            )
                        )
                    ),
                    3 => array(
                        'spec' => array(
                            'name' => 'modulDisplay',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulDisplay'
                            )
                        )
                    ),
                    4 => array(
                        'spec' => array(
                            'name' => 'modulConfig',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulConfig'
                            )
                        )
                    ),
                    5 => array(
                        'spec' => array(
                            'name' => 'modulLink',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulLink'
                            )
                        )
                    )
                )
            ), 
            
            'blogtags' => array(
                'resource' => 'intranet',
                'name' => 'Nachrichten Tags anzeigen',
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Nachrichten auswählen',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/blogselect',
                                    'data' => array(
                                        'entity' => 'Contentinum\Entity\WebContentGroups',
                                        'prepare' => 'select',
                                        'result' => 'array',
                                        'value' => '1',
                                        'label' => '1'
                                    )
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
                
                            'attributes' => array(
                                'required' => 'required',
                                'id' => 'modulParams'
                            )
                        )
                    ),
                    2 => array(
                        'spec' => array(
                            'name' => 'modulFormat',
                            'required' => false,
                            'options' => array(
                                'label' => 'Listentemplate auswählen',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/services',
                                    'data' => array(
                                        'entity' => 'templates_plugin_newstags',
                                        'prepare' => 'select',
                                        'result' => 'array',
                                        'value' => '1',
                                        'label' => '1'
                                    )
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
                            'attributes' => array(
                                'id' => 'modulFormat'
                            )
                        )
                    ),
                    3 => array(
                        'spec' => array(
                            'name' => 'modulDisplay',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
                
                            'attributes' => array(
                                'id' => 'modulDisplay'
                            )
                        )
                    ),
                    4 => array(
                        'spec' => array(
                            'name' => 'modulConfig',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
                
                            'attributes' => array(
                                'id' => 'modulConfig'
                            )
                        )
                    ),
                    5 => array(
                        'spec' => array(
                            'name' => 'modulLink',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
                
                            'attributes' => array(
                                'id' => 'modulLink'
                            )
                        )
                    )
                )
                
                                
                
            ),
            
            'blogcategory' => array(
                
                'resource' => 'intranet',
                'name' => 'Nachrichten Kategorien anzeigen',
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Nachrichten auswählen',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/blogselect',
                                    'data' => array(
                                        'entity' => 'Contentinum\Entity\WebContentGroups',
                                        'prepare' => 'select',
                                        'result' => 'array',
                                        'value' => '1',
                                        'label' => '1'
                                    )
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
                
                            'attributes' => array(
                                'required' => 'required',
                                'id' => 'modulParams'
                            )
                        )
                    ),
                    2 => array(
                        'spec' => array(
                            'name' => 'modulFormat',
                            'required' => false,
                            'options' => array(
                                'label' => 'Listentemplate auswählen',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/services',
                                    'data' => array(
                                        'entity' => 'templates_plugin_newscategory',
                                        'prepare' => 'select',
                                        'result' => 'array',
                                        'value' => '1',
                                        'label' => '1'
                                    )
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
                            'attributes' => array(
                                'id' => 'modulFormat'
                            )
                        )
                    ),
                    3 => array(
                        'spec' => array(
                            'name' => 'modulDisplay',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
                
                            'attributes' => array(
                                'id' => 'modulDisplay'
                            )
                        )
                    ),
                    4 => array(
                        'spec' => array(
                            'name' => 'modulConfig',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
                
                            'attributes' => array(
                                'id' => 'modulConfig'
                            )
                        )
                    ),
                    5 => array(
                        'spec' => array(
                            'name' => 'modulLink',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
                
                            'attributes' => array(
                                'id' => 'modulLink'
                            )
                        )
                    )
                )                
                
                
            ),
            
        ),
        
        'e' => array(
            
            'mediagroup' => array(
                'resource' => 'intranet',
                'name' => 'Bildergalerien',
            
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Bildergalerien auswählen',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/options',
                                    'data' => array(
                                        'entity' => 'Contentinum\Entity\WebMediaGroup',
                                        'sortby' => array('groupName' => 'ASC'),
                                        'prepare' => 'select',
                                        'value' => 'id',
                                        'label' => 'groupName'
                                    )
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
            
                            'attributes' => array(
                                'required' => 'required',
                                'id' => 'modulParams'
                            )
                        )
                    ),
                    2 => array(
                        'spec' => array(
                            'name' => 'modulFormat',
                            'required' => false,
                            'options' => array(
                                'label' => 'Template auswählen',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/services',
                                    'data' => array(
                                        'entity' => 'templates_plugin_mediagroup',
                                        'prepare' => 'select',
                                        'result' => 'array',
                                        'value' => '1',
                                        'label' => '1'
                                    )
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
                            'attributes' => array(
                                'id' => 'modulFormat'
                            )
                        )
                    ),
                    3 => array(
                        'spec' => array(
                            'name' => 'modulDisplay',
                            'required' => false,
                            'options' => array(
                                'label' => 'Bulletliste (Nur Orbitslider Foundation 6)',
                                'empty_option' => 'Please select',
                                'value_options' => array(
                                    'yes' => 'Mit Bulletliste (Standard)',
                                    'no' => 'Ohne Bulletliste',
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
                            'attributes' => array(
                                'id' => 'modulDisplay'
                            )
                        )
                    ),
                    4 => array(
                        'spec' => array(
                            'name' => 'modulConfig',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulConfig'
                            )
                        )
                    ),
                    5 => array(
                        'spec' => array(
                            'name' => 'modulLink',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulLink'
                            )
                        )
                    )
                )
            
            ),
            
            
            'filegroup' => array(
                'resource' => 'intranet',
                'name' => 'Dateigruppen (Nicht für Bilder)',
            
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Dateigruppen auswählen',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/options',
                                    'data' => array(
                                        'entity' => 'Contentinum\Entity\WebMediaGroup',
                                        'sortby' => array('groupName' => 'ASC'),
                                        'prepare' => 'select',
                                        'value' => 'id',
                                        'label' => 'groupName'
                                    )
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
            
                            'attributes' => array(
                                'required' => 'required',
                                'id' => 'modulParams'
                            )
                        )
                    ),
                    2 => array(
                        'spec' => array(
                            'name' => 'modulFormat',
                            'required' => false,
                            'options' => array(
                                'label' => 'Template auswählen',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/services',
                                    'data' => array(
                                        'entity' => 'templates_plugin_filegroup',
                                        'prepare' => 'select',
                                        'result' => 'array',
                                        'value' => '1',
                                        'label' => '1'
                                    )
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
                            'attributes' => array(
                                'id' => 'modulFormat'
                            )
                        )
                    ),
                    3 => array(
                        'spec' => array(
                            'name' => 'modulDisplay',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulDisplay'
                            )
                        )
                    ),
                    4 => array(
                        'spec' => array(
                            'name' => 'modulConfig',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulConfig'
                            )
                        )
                    ),
                    5 => array(
                        'spec' => array(
                            'name' => 'modulLink',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulLink'
                            )
                        )
                    )
                )
            
            ),            
            
            
            
        ),      
        
        
        'f' => array(
            
            'forms' => array(
                'resource' => 'intranet',
                'name' => 'Formulare',
            
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Formular auswählen',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/options',
                                    'data' => array(
                                        'entity' => 'Contentinum\Entity\WebForms',
                                        'prepare' => 'select',
                                        'value' => 'id',
                                        'label' => 'headline'
                                    )
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
            
                            'attributes' => array(
                                'required' => 'required',
                                'id' => 'modulParams'
                            )
                        )
                    ),
                    2 => array(
                        'spec' => array(
                            'name' => 'modulFormat',
                            'required' => false,
                            'options' => array(
                                'label' => 'Headline',
                                'empty_option' => 'No headline',
                                'value_options' => array(
                                    'h1' => 'Level 1',
                                    'h2' => 'Level 2',
                                    'h3' => 'Level 3',
                                    'h4' => 'Level 4'
                                ),
                                'deco-row' => 'text'
                            ),
                            'type' => 'Select',
            
                            'attributes' => array(
                                'id' => 'modulFormat'
                            )
                        )
                    ),
                    3 => array(
                        'spec' => array(
                            'name' => 'modulDisplay',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulDisplay'
                            )
                        )
                    ),
                    4 => array(
                        'spec' => array(
                            'name' => 'modulConfig',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulConfig'
                            )
                        )
                    ),
                    5 => array(
                        'spec' => array(
                            'name' => 'modulLink',
                            'required' => false,
                            'options' => array(),
                            'type' => 'Hidden',
            
                            'attributes' => array(
                                'id' => 'modulLink'
                            )
                        )
                    )
                )
            )            
            
        ),
        
    )
);