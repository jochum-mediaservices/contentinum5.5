<?php
return array(
    '_default' => array(
        'splitQuery' => 2,
        'title' => 'Contentinum Plugin',
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
            'sets' => array(
                'mcworkstyles',
                'mcworkhead',
                'mcworkcore'
            ),
            'collections' => array(
                'mcworkstyles' => array(
                    'debug' => false,
                    'area' => 'styles',
                    'type' => 'styles',
                    'attr' => array(
                        'media' => 'all',
                        'rel' => 'stylesheet'
                    ),
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
                    'attr' => array(
                        'media' => 'all',
                        'rel' => 'stylesheet'
                    ),
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
                    'attr' => array(
                        'media' => 'all',
                        'rel' => 'stylesheet'
                    ),
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
                'mcworkhead' => array(
                    'debug' => false,
                    'area' => 'head',
                    'type' => 'js',
                    'attr' => array(
                        'type' => 'text/javascript'
                    ),
                    'assets' => array(
                        '/backend/js/vendor/modernizr.js'
                    )
                ),
                'mcworkcore' => array(
                    'debug' => false,
                    'area' => 'inline',
                    'type' => 'js',
                    'attr' => array(
                        'type' => 'text/javascript'
                    ),
                    'assets' => array(
                        '/backend/js/vendor/jquery.js',
                        '/backend/js/vendor/jquery.cookie.js',
                        '/backend/js/foundation.min.js',
                        '/backend/js/mcwork.language.js',
                        '/backend/js/mcwork.app.js',
                        '/backend/js/mcwork.js'
                    )
                ),            
                'gbooktablescripts' => array(
                    'debug' => false,
                    'area' => 'inline',
                    'type' => 'js',
                    'attr' => array(
                        'type' => 'text/javascript'
                    ),
                    'assets' => array(
                        '/backend/js/vendor/jquery.js',
                        '/backend/js/vendor/jquery.cookie.js',
                        '/backend/js/foundation.min.js',
                        '/backend/js/vendor/datatables/jquery.dataTables.js',
                        '/backend/js/vendor/datatables/dataTables.foundation.js',
                        '/backend/js/mcwork.language.js',
                        '/backend/js/mcwork.app.js',
                        '/backend/js/mcwork.table.js',
                        '/backend/js/mcwork.guestbook.js'
                    )
                ),
                'mcworkforms' => array(
                    'debug' => false,
                    'area' => 'inline',
                    'type' => 'js',
                    'attr' => array(
                        'type' => 'text/javascript'
                    ),
                    'assets' => array(
                        '/backend/js/vendor/jquery.js',
                        '/backend/js/vendor/jquery.cookie.js',
                        '/backend/js/vendor/chosen/chosen.jquery.js',
                        '/backend/js/foundation.min.js',
                        '/backend/js/mcwork.language.js',
                        '/backend/js/mcwork.app.js',
                        '/backend/js/mcwork.form.js'
                    )
                )
            )
            
        )
    ),
    
    '/guestbook/configuration' => array(
        'resource' => 'publisherresource',
        'metaTitle' => 'Gästebuch Konfiguration',
        'template' => 'content/book/configindex',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'Gästebuch Konfiguration',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Guestbook\Mapper\Book\Configuration',
            'entity' => 'Guestbook\Entity\GuestbookConfig'
        ),
        'assets' => array(
            'sets' => array(
                'mcworktablestyles',
                'mcworkhead',
                'gbooktablescripts'
            )
        )
    ),
    '/guestbook/configuration/add' => array(
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
            'worker' => 'Guestbook\Model\Book\SaveKonfiguration',
            'entity' => 'Guestbook\Entity\GuestbookConfig',
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Guestbook\Form\GuestbookConfigForm',
            'formaction' => '/guestbook/configuration/add',
            'settoroute' => '/guestbook/configuration'
        ),
        'assets' => array(
            'sets' => array(
                'mcworkformstyles',
                'mcworkhead',
                'mcworkforms'
            )
        )
    ),
    
    
    '/guestbook/configuration/edit' => array(
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
            'worker' => 'Guestbook\Model\Book\SaveKonfiguration',
            'entity' => 'Guestbook\Entity\GuestbookConfig',
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Guestbook\Form\GuestbookConfigForm',
            'formaction' => '/guestbook/configuration/edit',
            'settoroute' => '/guestbook/configuration'
        ),
        'assets' => array(
            'sets' => array(
                'mcworkformstyles',
                'mcworkhead',
                'mcworkforms'
            )
        )
    ),    
    
    // -----------------
    
    
    
    
    
    
    
    
    
    
    '/guestbook/entries' => array(
        'resource' => 'publisherresource',
        'metaTitle' => 'Gästebucheinträge',
        'template' => 'content/book/entryindex',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'Gästebucheinträge',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Guestbook\Mapper\Book\Entries',
            'entity' => 'Guestbook\Entity\Guestbook'
        ),
        'assets' => array(
            'sets' => array(
                'mcworktablestyles',
                'mcworkhead',
                'gbooktablescripts'
            )
        )
    ),
    '/guestbook/entries/add' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'Eintrag hinzufügen',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'Eintrag hinzufügen',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Guestbook\Model\Book\SaveEntry',
            'entity' => 'Guestbook\Entity\Guestbook',
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Guestbook\Form\GuestbookForm',
            'formaction' => '/guestbook/entries/add',
            'settoroute' => '/guestbook/entries'
        ),
        'assets' => array(
            'sets' => array(
                'mcworkformstyles',
                'mcworkhead',
                'mcworkforms'
            )
        )
    ),
    '/guestbook/entries/edit' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'Eintrag bearbeiten',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'Eintrag bearbeiten',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Guestbook\Model\Book\SaveEntry',
            'entity' => 'Guestbook\Entity\Guestbook',
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Guestbook\Form\GuestbookForm',
            'formaction' => '/guestbook/entries/edit',
            'settoroute' => '/guestbook/entries'
        ),
        'assets' => array(
            'sets' => array(
                'mcworkformstyles',
                'mcworkhead',
                'mcworkforms'
            )
        )
    ),
    '/guestbook/entries/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Guestbook\Model\Book\DeleteEntry',
            'entity' => 'Guestbook\Entity\Guestbook',
            
            'settoroute' => '/guestbook/entries'
        )
    ),
    
    '/guestbook/public/entry' => array(
        'splitQuery' => 3,
        'resource' => 'index',
        'metaTitle' => 'Eintrag',
        'template' => 'forms/public',
        'pageContent' => array(
            'headline' => 'Eintrag',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Guestbook\Model\Guests\SaveEntry',
            'entity' => 'Guestbook\Entity\Guestbook',
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Guestbook\Form\PublicGuestbookForm',
            'formaction' => '/guestbook/public/entry',
        ),
    ),    
    
    '/guestbook/entries/validate' => array(
        'resource' => 'publisherresource',
        'template' => 'content/service/publish',
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Guestbook\Model\Book\ValidateEntry',
            'entity' => 'Guestbook\Entity\Guestbook',
        )
    )    
);