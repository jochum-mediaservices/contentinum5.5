<?php

return array(
    
    '_default' => array(
        'splitQuery' => 2,
        'title' => 'contentinum backend',
        'resource' => 'index',
        'charset' => 'utf-8',
        'locale' => 'de_DE',
        'timeZone' => 'Europa/Berlin',
        'metaViewport' => 'width=device-width, initial-scale=1.0',
        'layout' => 'mcwork/layout/admin',
        'app' => array(
            'entitymanager' => 'doctrine.entitymanager.orm_default'
        ),
        
        'assets' => array(
            
            'path' => '/module/Mcwork/assets',
            'web' => '/assets/app',
            'sets' => array('mcworkstyles','mcworkhead','mcworkcore'),
            'collections' => array(
                'mcworkstyles' => array(
                    'debug' => false,
                    'area' => 'styles',
                    'type' => 'styles',
                    'attr' => array('media' => 'all', 'rel' => 'stylesheet'),
                    'assets' => array(
                        '/backend/css/font-awesome.css',
                        '/backend/css/mcwork.foundation.css',
                        '/backend/css/mcworkapp.css'
                    ),
                    'includes' => array(
                        '/data/usr/share/min/css/cssmin-v3.0.1.php'
                    ),
                    'filters' => array(
                        'mincss' => 'Assetic\Filter\CssMinFilter'
                    )
                ),
                
                'mcworkformstyles' => array(
                    'debug' => false,
                    'area' => 'styles',
                    'type' => 'styles',
                    'attr' => array('media' => 'all', 'rel' => 'stylesheet'),
                    'assets' => array(
                        '/backend/css/font-awesome.css',
                        '/backend/css/vendor/chosen/chosen.css',
                        '/backend/css/mcwork.foundation.css',
                        '/backend/css/mcworkapp.css',
                        '/backend/css/mcworkform.css'
                    ),
                    'includes' => array(
                        '/data/usr/share/min/css/cssmin-v3.0.1.php'
                    ),
                    'filters' => array(
                        'mincss' => 'Assetic\Filter\CssMinFilter'
                    )
                ),
                
                'mcworktablestyles' => array(
                    'debug' => false,
                    'area' => 'styles',
                    'type' => 'styles',
                    'attr' => array('media' => 'all', 'rel' => 'stylesheet'),
                    'assets' => array(
                        '/backend/css/font-awesome.css',
                        '/backend/css/mcwork.foundation.css',
                        '/backend/css/vendor/datatables/dataTables.foundation.css',
                        '/backend/css/mcworkapp.css'
                    ),
                    'includes' => array(
                        '/data/usr/share/min/css/cssmin-v3.0.1.php'
                    ),
                    'filters' => array(
                        'mincss' => 'Assetic\Filter\CssMinFilter'
                    )
                ),
                
                'mcworkformstylesdtpick' => array(
                    'debug' => false,
                    'area' => 'styles',
                    'type' => 'styles',
                    'attr' => array('media' => 'all', 'rel' => 'stylesheet'),
                    'assets' => array(
                        '/backend/css/font-awesome.css',
                        '/backend/css/vendor/chosen/chosen.css',
                        '/backend/css/vendor/jquery.datetimepicker.css',
                        '/backend/css/mcwork.foundation.css',
                        '/backend/css/mcworkapp.css',
                        '/backend/css/mcworkform.css'
                    ),
                    'includes' => array(
                        '/data/usr/share/min/css/cssmin-v3.0.1.php'
                    ),
                    'filters' => array(
                        'mincss' => 'Assetic\Filter\CssMinFilter'
                    )
                ),                
                
                'mcworkhead' => array(
                    'debug' => false,
                    'area' => 'head',
                    'type' => 'js',
                    'attr' => array( 'type' => 'text/javascript'),
                    'assets' => array(
                        '/backend/js/vendor/modernizr.js'
                    )
                ),
                'mcworkcore' => array(
                    'debug' => false,
                    'area' => 'inline',
                    'type' => 'js',
                    'attr' => array( 'type' => 'text/javascript'),
                    'assets' => array(
                        '/backend/js/vendor/jquery.js',
                        '/backend/js/vendor/jquery.cookie.js',
                        '/backend/js/foundation.min.js',
                        '/backend/js/mcwork.language.js',
                        '/backend/js/mcwork.app.js',
                        '/backend/js/mcwork.js'
                    )
                ),
                
                'mcworktablescripts' => array(
                    'debug' => false,
                    'area' => 'inline',
                    'type' => 'js',
                    'attr' => array( 'type' => 'text/javascript'),
                    'assets' => array(
                        '/backend/js/vendor/jquery.js',
                        '/backend/js/vendor/jquery.cookie.js',
                        '/backend/js/foundation.min.js',
                        '/backend/js/vendor/datatables/jquery.dataTables.js',
                        '/backend/js/vendor/datatables/dataTables.foundation.js',
                        '/backend/js/mcwork.language.js',
                        '/backend/js/mcwork.app.js',
                        '/backend/js/mcwork.table.js'
                    )
                
                ),
                
                'mcworkforms' => array(
                    'debug' => false,
                    'area' => 'inline',
                    'type' => 'js',
                    'attr' => array( 'type' => 'text/javascript'),
                    'assets' => array(
                        '/backend/js/vendor/jquery.js',
                        '/backend/js/vendor/jquery.cookie.js',
                        '/backend/js/vendor/chosen/chosen.jquery.js',
                        '/backend/js/foundation.min.js',
                        '/backend/js/mcwork.language.js',
                        '/backend/js/mcwork.app.js',
                        '/backend/js/mcwork.form.js',
                    )
                ),  
                
                'mcworkformseventdates' => array(
                    'debug' => false,
                    'area' => 'inline',
                    'type' => 'js',
                    'attr' => array( 'type' => 'text/javascript'),
                    'assets' => array(
                        '/backend/js/vendor/jquery.js',
                        '/backend/js/vendor/jquery.cookie.js',
                        '/backend/js/vendor/chosen/chosen.jquery.js',
                        '/backend/js/vendor/jquery.datetimepicker.full.js',
                        '/backend/js/foundation.min.js',
                        '/backend/js/mcwork.language.js',
                        '/backend/js/mcwork.app.js',
                        '/backend/js/mcwork.form.js',
                        '/backend/js/vendor/tinymce/smalleditor.js',
                    )
                ),                
                
            ),
        ),
        
        ),
        '/mcevent/calendar' => array(
            'resource' => 'publisherresource',
            'metaTitle' => 'Calendar',
            'template' => 'content/calendar/calendarindex',
            'toolbar' => 1,
            'tableedit' => 1,
            'pageContent' => array(
                'headline' => 'Calendar',
                'content' => ''
            ),
            'app' => array(
                'controller' => 'Mcwork\Controller\McworkController',
                'worker' => 'Mcevent\Mapper\Calendar\CalendarIndex',
                'entity' => 'Mcevent\Entity\MceventTypes'
            ),
            'assets' => array(
                'sets' => array('mcworktablestyles','mcworkhead','mcworktablescripts'),
            ),
        ),
        
        '/mcevent/calendar/add' => array(
            'splitQuery' => 3,
            'resource' => 'publisherresource',
            'metaTitle' => 'add_Calendar',
            'template' => 'forms/standard',
            'toolbar' => 1,
            'tableedit' => 1,
            'pageContent' => array(
                'headline' => 'add_Calendar',
                'content' => ''
            ),
            'app' => array(
                'controller' => 'Mcwork\Controller\AddFormController',
                'worker' => 'Mcevent\Model\Calendar\SaveCalendar',
                'entity' => 'Mcevent\Entity\MceventTypes',
                'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcevent\Form\Calendar',
            'formaction' => '/mcevent/calendar/add',
            'settoroute' => '/mcevent/calendar'
        
            ),
            'assets' => array(
                'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
            ),
        ), 
    
    '/mcevent/calendar/edit' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'edit_Calendar',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'edit_Calendar',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcevent\Model\Calendar\SaveCalendar',
            'entity' => 'Mcevent\Entity\MceventTypes',
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcevent\Form\Calendar',
            'formaction' => '/mcevent/calendar/edit',
            'settoroute' => '/mcevent/calendar'
    
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ),    
        
       
    '/mcevent/calendar/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcevent\Model\Calendar\DeleteCalendar',
            'entity' => 'Mcevent\Entity\MceventTypes',
    
            'hasEntries' => array(
                'calendar' => array(
                    'tablename' => 'Mcevent\Entity\MceventDates',
                    'column' => 'calendar'
                ),
            ),
    
            'settoroute' => '/mcevent/calendar'
        )
    ),    
    
    '/mcevent/eventdate' => array(
        'resource' => 'publisherresource',
        'metaTitle' => 'Dates',
        'template' => 'content/dates/datesindex',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'Dates',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcevent\Mapper\Events\DatesIndex',
            'entity' => 'Mcevent\Entity\MceventDates'
        ),
        'assets' => array(
            'sets' => array('mcworktablestyles','mcworkhead','mcworktablescripts'),
        ),
    ), 
    
    '/mcevent/eventdate/add' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'add_Date',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'bodyFooterScript' => array(
            'prepend' => array(
                '/assets/app/tinymce/js/tinymce/tinymce.min.js',
            ),
        ),        
        'pageContent' => array(
            'headline' => 'add_Date',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcevent\Model\Events\SaveDates',
            'entity' => 'Mcevent\Entity\MceventDates',
            'targetentities' => array(
                'calendar' => 'Mcevent\Entity\MceventTypes',
                'account' => 'Contentinum\Entity\Accounts',
                'webMediasId' => 'Contentinum\Entity\WebMedias',
            ),   
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcevent\Form\Dates',
            'formaction' => '/mcevent/eventdate/add',
            'formattributes' => array(
                'data-rules' => 'eventdates',
                'data-process' => 'add',
                'data-editor' => 'tinymce',
            ),            
            'formbuttons' => array(
                'save' => array(),
                'saveplus' => array(),
                'cancel' => array('label' => 'Cancel', 'attribs' => array('data-back' => '' )),
            ),
            'populate' => array(
                'account' => '1',
                'organizerId' => '1',
                'webMediasId' => '1',
                'webFilesId' => '1',
            ),            
            'settoroute' => '/mcevent/eventdate'
    
        ),
        'assets' => array(
            'sets' => array('mcworkformstylesdtpick','mcworkhead','mcworkformseventdates'),
        ),
    ), 
    
    '/mcevent/eventdate/edit' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'edit_Date',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'bodyFooterScript' => array(
            'prepend' => array(
                '/assets/app/tinymce/js/tinymce/tinymce.min.js',
            ),
        ),
        'pageContent' => array(
            'headline' => 'edit_Date',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcevent\Model\Events\SaveDates',
            'entity' => 'Mcevent\Entity\MceventDates',
            'targetentities' => array(
                'calendar' => 'Mcevent\Entity\MceventTypes',
                'account' => 'Contentinum\Entity\Accounts',
                'webMediasId' => 'Contentinum\Entity\WebMedias',
            ),   
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcevent\Form\Dates',
            'formaction' => '/mcevent/eventdate/edit',
            'settoroute' => '/mcevent/eventdate'
    
        ),
        'assets' => array(
            'sets' => array('mcworkformstylesdtpick','mcworkhead','mcworkformseventdates'),
        ),
    ),  
    
    '/mcevent/eventdate/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcevent\Model\Events\DeleteDates',
            'entity' => 'Mcevent\Entity\MceventDates',
            'settoroute' => '/mcevent/eventdate'
        )
    ),  
    
    '/mcevent/calendargroup' => array(
        'resource' => 'publisherresource',
        'metaTitle' => 'Calendargroup',
        'template' => 'content/calendar/calendargroupindex',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'Calendargroup',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcevent\Mapper\Calendar\CalendarGroupIndex',
            'entity' => 'Mcevent\Entity\MceventGroup'
        ),
        'assets' => array(
            'sets' => array('mcworktablestyles','mcworkhead','mcworktablescripts'),
        ),
    ),
    
    '/mcevent/calendargroup/add' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'add_Calendargroup',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'add_Calendargroup',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcevent\Model\Calendar\SaveCalendarGroup',
            'entity' => 'Mcevent\Entity\MceventGroup',
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcevent\Form\CalendarGroup',
            'formaction' => '/mcevent/calendargroup/add',
            'settoroute' => '/mcevent/calendargroup'
    
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ),
    
    '/mcevent/calendargroup/edit' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'edit_Calendargroup',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'edit_Calendargroup',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcevent\Model\Calendar\SaveCalendarGroup',
            'entity' => 'Mcevent\Entity\MceventGroup',
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcevent\Form\CalendarGroup',
            'formaction' => '/mcevent/calendargroup/edit',
            'settoroute' => '/mcevent/calendargroup'
    
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ), 
    
    '/mcevent/calendargroup/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcevent\Model\Events\DeleteCalendarGroup',
            'entity' => 'Mcevent\Entity\MceventGroup',
    
            'hasEntries' => array(
                'calendargroup' => array(
                    'tablename' => 'Mcevent\Entity\MceventIndex',
                    'column' => 'groupsId'
                ),
            ),
    
            'settoroute' => '/mcevent/calendargroup'
        )
    ),  
    
    '/mcevent/calgroups/category' => array(
        'resource' => 'publisherresource',
        'metaTitle' => 'Calendargroup',
        'template' => 'content/calendar/calendarcategoryindex',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'Calendargroup',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcevent\Mapper\Calendar\Categories',
            'entity' => 'Mcevent\Entity\MceventIndex'
        ),
        'assets' => array(
            'sets' => array('mcworktablestyles','mcworkhead','mcworktablescripts'),
        ),
    ),
    
    '/mcevent/calgroups/add' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'add_Calendargroup',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'add_Calendargroup',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcevent\Model\Calendar\SaveCalendarCategory',
            'entity' => 'Mcevent\Entity\MceventIndex',
            'targetentities' => array(
                'groups' => 'Mcevent\Entity\MceventGroup',
                'calendar' => 'Mcevent\Entity\MceventTypes',
            ),  
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcevent\Form\GroupIndex',
            'formaction' => '/mcevent/calgroups/add',
            'settoroute' => '/mcevent/calgroups',
            'populateFromRoute' => array('category' => 'groups'),
    
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ),
    
    '/mcevent/calgroups/edit' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'edit_Calendargroup',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'edit_Calendargroup',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcevent\Model\Calendar\SaveCalendarCategory',
            'entity' => 'Mcevent\Entity\MceventIndex',
            'targetentities' => array(
                'groups' => 'Mcevent\Entity\MceventGroup',
                'calendar' => 'Mcevent\Entity\MceventTypes',
            ),
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcevent\Form\GroupIndex',
            'formaction' => '/mcevent/calgroups/edit',
            'settoroute' => '/mcevent/calgroups'
    
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ),
    
    '/mcevent/calgroups/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcevent\Model\Events\DeleteCalendarCategory',
            'entity' => 'Mcevent\Entity\MceventIndex',
   
    
            'settoroute' => '/mcevent/calgroups/category'
        )
    ), 
    
    
    
    '/mcevent/configuration' => array(
        'resource' => 'publisherresource',
        'metaTitle' => 'Konfiguration Teilnehmeranmeldung',
        'template' => 'content/dates/configurationindex',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'Konfiguration Teilnehmeranmeldung',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcevent\Mapper\Events\Configuration',
            'entity' => 'Mcevent\Entity\MceventDatesConfig'
        ),
        'assets' => array(
            'sets' => array('mcworktablestyles','mcworkhead','mcworktablescripts'),
        ),
    ),
    
    '/mcevent/configuration/add' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'Konfiguration hinzufügen',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'Konfiguration hinzufügen',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcevent\Model\Calendar\SaveConfiguration',
            'entity' => 'Mcevent\Entity\MceventDatesConfig',
            'targetentities' => array(
                'contacts' => 'Contentinum\Entity\Contacts',
            ),            
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcevent\Form\Dates\ConfigForm',
            'formaction' => '/mcevent/configuration/add',
            'settoroute' => '/mcevent/configuration'
    
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ),
    
    '/mcevent/configuration/edit' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'Konfiguration bearbeiten',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'Konfiguration bearbeiten',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcevent\Model\Calendar\SaveConfiguration',
            'entity' => 'Mcevent\Entity\MceventDatesConfig',
            'targetentities' => array(
                'contacts' => 'Contentinum\Entity\Contacts',
            ),            
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcevent\Form\Dates\ConfigEditForm',
            'populateSerializeFields' => array('settingsFormular'),
            'formaction' => '/mcevent/configuration/edit',
            'settoroute' => '/mcevent/configuration'
    
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ),
    
     
    '/mcevent/configuration/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcevent\Model\Calendar\DeleteConfiguration',
            'entity' => 'Mcevent\Entity\MceventDatesConfig',
    
            'hasEntries' => array(
                'calendar' => array(
                    'tablename' => 'Mcevent\Entity\MceventDates',
                    'column' => 'configureIdent'
                ),
            ),
    
            'settoroute' => '/mcevent/configuration'
        )
    ),    
    
    '/mcevent/registrations' => array(
        'resource' => 'publisherresource',
        'metaTitle' => 'Teilnehmer',
        'template' => 'content/dates/registrations',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'Teilnehmer',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcevent\Mapper\Events\Registrations',
            'entity' => 'Mcevent\Entity\MceventDatesRegister',
        ),
        'assets' => array(
            'sets' => array('mcworktablestyles','mcworkhead','mcworktablescripts'),
        ),
    ),
    

    
    '/mcevent/registrations/add' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'Anmeldung aufnehmen',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'Anmeldung aufnehmen',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcevent\Model\Events\SaveRegistration',
            'entity' => 'Mcevent\Entity\MceventDatesRegister',
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcevent\Form\Dates\RegistrationForm',
            'formaction' => '/mcevent/registrations/add',
            'settoroute' => '/mcevent/registrations'
    
    
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ),
    
    '/mcevent/registrations/edit' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'Antrag bearbeiten',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'Antrag bearbeiten',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcevent\Model\Events\SaveRegistration',
            'entity' => 'Mcevent\Entity\MceventDatesRegister',
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcevent\Form\Dates\RegistrationForm',
            'formaction' => '/mcevent/registrations/edit',
            'settoroute' => '/mcevent/registrations'
    
    
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ),
    
    '/mcevent/registrations/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcevent\Model\Events\DeleteRegistration',
            'entity' => 'Mcevent\Entity\MceventDatesRegister',
             
    
            'settoroute' => '/mcevent/registrations'
        )
    ),
    
    '/mcevent/registrations/cancel' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcevent\Model\Events\CancelPublicRegistration',
            'entity' => 'Mcevent\Entity\MceventDatesRegister',
             
    
            'settoroute' => '/municipal/bookingdashboard'
        )
    ),    
    
    
    
    '/mcevent/public/register' => array(
        'splitQuery' => 3,
        'resource' => 'index',
        'metaTitle' => 'Orders',
        'template' => 'forms/public',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'Anmeldung Termin',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcevent\Model\Events\SavePublicRegistration',
            'entity' => 'Mcevent\Entity\MceventDatesRegister',
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcevent\Form\Dates\RegistrationPublicForm',
            'formaction' => '/mcevent/public/register',
            //'setcategrory' => 'no',
            'setcategroryvalue' => 'yes',
            'populateFromRoute' => array('category' => 'mceventIdent'),
        ),
    ), 
    
    
    '/mcevent/listparticipants' => array(
        'resource' => 'publisherresource',
        'metaTitle' => 'Download Teilnehmerlisten',
        'template' => 'content/dates/registerdownloadindex',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'Download Teilnehmerlisten',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcevent\Mapper\Events\RegistrationsDownload',
            'entity' => 'Mcevent\Entity\MceventDatesRegister',
        ),
        'assets' => array(
            'sets' => array('mcworktablestyles','mcworkhead','mcworktablescripts'),
        ),
    ),
    
    '/mcevent/listparticipants/download' => array(
        'resource' => 'publisherresource',
        'template' => 'content/dates/downloadadparticipant',
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcevent\Mapper\Events\ParticipantDownloads',
            'entity' => 'Mcevent\Entity\MceventDatesRegister',
        )
    
    ),
    
    '/mcevent/downloadorders/orderlist' => array(
        'resource' => 'publisherresource',
        'template' => 'content/trash/downloadorderlist',
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Municipal\Mapper\Trash\OrderDownloads',
            'entity' => 'Municipal\Entity\TrashOrders',
        )
    
    ),    
    
    '/mcevent/download/calendar' => array(
        'resource' => 'index',
        'template' => 'content/download/ics',
        'app' => array(
            'controller' => 'Mcevent\Controller\DownloadsController',
            'worker' => 'Mcevent\Mapper\Download\Calendar',
            'entity' => 'Mcevent\Entity\MceventDates',
        )
    
    ), 
    
    '/mcevent/download/calendargroup' => array(
        'resource' => 'index',
        'template' => 'content/download/ics',
        'app' => array(
            'controller' => 'Mcevent\Controller\DownloadsController',
            'worker' => 'Mcevent\Mapper\Download\Group',
            'entity' => 'Mcevent\Entity\MceventDates',
        )
    
    ),  
    '/mcevent/download/calendarunits' => array(
        'resource' => 'index',
        'template' => 'content/download/csv',
        'app' => array(
            'controller' => 'Mcevent\Controller\DownloadsController',
            'worker' => 'Mcevent\Mapper\Download\Units',
            'entity' => 'Mcevent\Entity\MceventDates',
        )
    
    ),
    '/mcevent/downloads/events' => array(
        'resource' => 'index',
        'template' => 'content/download/icsevenets',
        'app' => array(
            'controller' => 'Mcevent\Controller\DownloadEventsController',
            'worker' => 'Mcevent\Mapper\Download\Events',
            'entity' => 'Mcevent\Entity\MceventDates',
        )
    
    ),
    
    '/mcevent/subscribe/events' => array(
        'resource' => 'index',
        'template' => 'content/download/icsevenets',
        'app' => array(
            'controller' => 'Mcevent\Controller\StreamController',
            'worker' => 'Mcevent\Mapper\Download\Events',
            'entity' => 'Mcevent\Entity\MceventDates',
        )
    ),    
    
);