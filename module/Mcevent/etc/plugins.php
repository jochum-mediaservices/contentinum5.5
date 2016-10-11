<?php
return array(
    'key_plugins' => array(
        'eventnavigation' => 'mcevent_event_navigation',
        'eventdates' => 'mcevent_static_dates',
        'actualdates' => 'mcevent_actual_dates',
        'actualgroupdatesbyday' => 'mcevent_actual_groupbyday',
        'actualgroupdates' => 'mcevent_actual_groupdates',
        'eventapp' => 'mcevent_app_dates',
        'actualdatesregister' => 'mcevent_event_datesregister',
        'actualdatesregistergrp' =>  'mcevent_event_datesregistergrp',
    ),
    'viewhelper_plugins' => array(
        'eventnavigation' => 'eventnavigation',
        'actualdates' => 'eventdates',
        'actualgroupdatesbyday' => 'eventdates',
        'actualgroupdates' => 'eventdates',
        'eventdates' => 'eventdates',
        'eventapp' => 'eventapp',
        'actualdatesregister' => 'eventdatesregister',
        'actualdatesregistergrp' =>  'eventdatesregister',        
    ),
    'default_plugins' => array(
        
        'c' => array(
            'eventnavigation' => array(
                
                'resource' => 'intranet',
                'name' => 'Kalendergruppe Navigation Monat',
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Kalender',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/options',
                                    'data' => array(
                                        'entity' => 'Mcevent\Entity\MceventGroup',
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
                            'name' => 'modulFormat',
                            'required' => false,
                            'options' => array(
                                'label' => 'Template',
                                'empty_option' => 'Please Select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/services',
                                    'data' => array(
                                        'entity' => 'templates_plugin_eventnavigation',
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
                                'id' => 'modulDisplay',
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
            
            'actualdatesregistergrp' => array(
                'resource' => 'intranet',
                'name' => 'Termine Kalendergruppe mit Anmeldung',
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Kalendergruppe',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/options',
                                    'data' => array(
                                        'entity' => 'Mcevent\Entity\MceventTypes',
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
                                'label' => 'Template',
                                'empty_option' => 'Please Select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/services',
                                    'data' => array(
                                        'entity' => 'templates_plugin_events',
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
            ) ,            
            
            
            'actualdatesregister' => array(
                'resource' => 'intranet',
                'name' => 'Kalender Termine mit Anmeldung',
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Kalender',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/options',
                                    'data' => array(
                                        'entity' => 'Mcevent\Entity\MceventTypes',
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
                                'label' => 'Template',
                                'empty_option' => 'Please Select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/services',
                                    'data' => array(
                                        'entity' => 'templates_plugin_events',
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
            ) ,            
            
            
            
            
            'actualgroupdatesbyday' => array(
                'resource' => 'intranet',
                'name' => 'Kalendergruppe (Aktuelle Termine nach Tagen)',
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Kalender',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/options',
                                    'data' => array(
                                        'entity' => 'Mcevent\Entity\MceventGroup',
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
                            'name' => 'modulFormat',
                            'required' => false,
                            'options' => array(
                                'label' => 'Template',
                                'empty_option' => 'Please Select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/services',
                                    'data' => array(
                                        'entity' => 'templates_plugin_events',
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
                            'options' => array(
                                'label' => 'Anzahl Tage',
                                'value_options' => array(
                                    '1' => '+1 Tage',
                                    '2' => '+2 Tage',
                                    '3' => '+3 Tage',
                                    '4' => '+4 Tage',
                                    '5' => '+5 Tage',
                                    '6' => '+6 Tage',
                                    '7' => '+7 Tage',
                                    '8' => '+8 Tage',
                                    '9' => '+9 Tage',
                                    '10' => '+10 Tage',
                                    '11' => '+11 Tage',
                                    '12' => '+12 Tage',
                                    '13' => '+13 Tage',
                                    '14' => '+14 Tage',
                                    '15' => '+15 Tage',
                                    '16' => '+16 Tage',
                                    '17' => '+17 Tage',
                                    '18' => '+18 Tage',
                                    '19' => '+19 Tage',
                                    '20' => '+20 Tage',
                                    '21' => '+21 Tage',
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
            ) ,            
            
            
            'actualdates' => array(
                'resource' => 'intranet',
                'name' => 'Kalender (Aktuelle Termine)',
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Kalender',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/options',
                                    'data' => array(
                                        'entity' => 'Mcevent\Entity\MceventTypes',
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
                                'label' => 'Template',
                                'empty_option' => 'Please Select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/services',
                                    'data' => array(
                                        'entity' => 'templates_plugin_events',
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
            ) ,            
            
            
            'actualgroupdates' => array(
                'resource' => 'intranet',
                'name' => 'Kalendergruppe (Aktuelle Termine)',
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Kalender',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/options',
                                    'data' => array(
                                        'entity' => 'Mcevent\Entity\MceventGroup',
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
                            'name' => 'modulFormat',
                            'required' => false,
                            'options' => array(
                                'label' => 'Template',
                                'empty_option' => 'Please Select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/services',
                                    'data' => array(
                                        'entity' => 'templates_plugin_events',
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
            
            
            'eventapp' => array(
                'resource' => 'intranet',
                'name' => 'Kalender App',
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Kalender',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/options',
                                    'data' => array(
                                        'entity' => 'Mcevent\Entity\MceventGroup',
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
                            'name' => 'modulFormat',
                            'required' => false,
                            'options' => array(
                                'label' => 'Template',
                                'empty_option' => 'Please Select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/services',
                                    'data' => array(
                                        'entity' => 'templates_plugin_events',
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
                            'options' => array(
                                'label' => 'Anzeige',
                                'value_options' => array(
                                    'monthly' => 'Monatlich (Standard)',
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
            
            
            
            'eventdates' => array(
                'resource' => 'intranet',
                'name' => 'Kalender (Einzelkalender)',
                'form' => array(
                    1 => array(
                        'spec' => array(
                            'name' => 'modulParams',
                            'required' => false,
                            'options' => array(
                                'label' => 'Kalender',
                                'empty_option' => 'Please select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/options',
                                    'data' => array(
                                        'entity' => 'Mcevent\Entity\MceventTypes',
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
                                'label' => 'Template',
                                'empty_option' => 'Please Select',
                                'value_function' => array(
                                    'method' => 'ajax',
                                    'url' => '/mcwork/services/application/services',
                                    'data' => array(
                                        'entity' => 'templates_plugin_events',
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
                                'id' => 'modulDisplay'
                            )
                        )
                    ),
                    4 => array(
                        'spec' => array(
                            'name' => 'modulConfig',
                            'required' => false,
                            'options' => array(
                                'label' => 'Ansicht',
                                'value_options' => array(
                                    'std' => 'Standard',
                                    'displaymonthname' => 'Anzeige Monatsüberschrift',
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

        )
    )
);