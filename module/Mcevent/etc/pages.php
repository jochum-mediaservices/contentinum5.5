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
    
);