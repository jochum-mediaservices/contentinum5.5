<?php
return array(
    'key_plugins' => array(
        'guestbook' => 'modul_guestbook_guestbook',
    ),
    'viewhelper_plugins' => array(
        'guestbook' => 'guestbook',
    ),
    'default_plugins' => array(
        'v' => array(
        
            'guestbook' => array(
        
                'resource' => 'intranet',
                'name' => 'Gästebuch',
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Gästebuch',
                                'value_options' => array(
                                    '1' => 'Gästebuch einblenden',
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
                                'label' => 'Template',
                                'empty_option' => 'Please Select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/services',
                                    'data' => array(
                                        'entity' => 'templates_plugin_guestbook',
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
        
        ),
    )
);