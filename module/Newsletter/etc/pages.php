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
    
    '/newsletter/tags' => array(
        'resource' => 'publisherresource',
        'metaTitle' => 'Tags',
        'template' => 'content/tags/tagsindex',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'Tags',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Newsletter\Mapper\Tags\Tags',
            'entity' => 'Newsletter\Entity\NewsletterTags'
        ),
        'assets' => array(
            'sets' => array(
                'mcworktablestyles',
                'mcworkhead',
                'mcworktablescripts'
            )
        )
    ),
    '/newsletter/tags/add' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'Tag hinzufügen',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'Tag hinzufügen',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Newsletter\Model\Tags\SaveTag',
            'entity' => 'Newsletter\Entity\NewsletterTags',
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Newsletter\Form\Tags\TagForm',
            'formaction' => '/newsletter/tags/add',
            'settoroute' => '/newsletter/tags'
        ),
        'assets' => array(
            'sets' => array(
                'mcworkformstyles',
                'mcworkhead',
                'mcworkforms'
            )
        )
    ),
    
    
    '/newsletter/tags/edit' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'Tag bearbeiten',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'Tag bearbeiten',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Newsletter\Model\Tags\SaveTag',
            'entity' => 'Newsletter\Entity\NewsletterTags',
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Newsletter\Form\Tags\TagForm',
            'formaction' => '/newsletter/tags/edit',
            'settoroute' => '/newsletter/tags'
        ),
        'assets' => array(
            'sets' => array(
                'mcworkformstyles',
                'mcworkhead',
                'mcworkforms'
            )
        )
    ), 
    
    '/newsletter/tags/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Newsletter\Model\Tags\DeleteTag',
            'entity' => 'Newsletter\Entity\NewsletterTags',
            'hasEntries' => array(
                'webPages' => array(
                    'tablename' => 'Contentinum\Entity\WebPagesContent',
                    'column' => 'webPages'
                ),
            ),
    
            'settoroute' => '/mcwork/pages'
        )
    ), 
    
    '/newsletter/users' => array(
        'resource' => 'publisherresource',
        'metaTitle' => 'Interessenten',
        'template' => 'content/users/usersindex',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'Interessenten',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Newsletter\Mapper\Users\Users',
            'entity' => 'Newsletter\Entity\NewsletterUsers'
        ),
        'assets' => array(
            'sets' => array(
                'mcworktablestyles',
                'mcworkhead',
                'mcworktablescripts'
            )
        )
    ),
    '/newsletter/users/add' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'Interessent hinzufügen',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'Interessent hinzufügen',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Newsletter\Model\Users\SaveUser',
            'entity' => 'Newsletter\Entity\NewsletterUsers',
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Newsletter\Form\Users\UserForm',
            'formaction' => '/newsletter/users/add',
            'settoroute' => '/newsletter/users'
        ),
        'assets' => array(
            'sets' => array(
                'mcworkformstyles',
                'mcworkhead',
                'mcworkforms'
            )
        )
    ),
    
    '/newsletter/users/edit' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'Interessent bearbeiten',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'Interessent bearbeiten',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Newsletter\Model\Users\SaveUser',
            'entity' => 'Newsletter\Entity\NewsletterUsers',
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Newsletter\Form\Users\UserEditForm',
            'formaction' => '/newsletter/users/edit',
            'settoroute' => '/newsletter/users'
        ),
        'assets' => array(
            'sets' => array(
                'mcworkformstyles',
                'mcworkhead',
                'mcworkforms'
            )
        )
    ), 
    
    '/newsletter/users/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Newsletter\Model\Users\DeleteUser',
            'entity' => 'Newsletter\Entity\NewsletterUsers',

    
            'settoroute' => '/mcwork/pages'
        )
    ), 
    
    '/newsletter/tagbyuser' => array(
        'resource' => 'publisherresource',
        'metaTitle' => 'Tags by User',
        'template' => 'content/users/tagbyusrindex',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'Tags by User',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Newsletter\Mapper\Users\Tags',
            'entity' => 'Newsletter\Entity\NewsletterTagsByUser',
        ),
        'assets' => array(
            'sets' => array(
                'mcworktablestyles',
                'mcworkhead',
                'mcworktablescripts'
            )
        )
    ),
    '/newsletter/tagbyuser/add' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'Tag zu Benutzer hinzufügen',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'Tag zu Benutzer hinzufügen',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Newsletter\Model\Users\SaveTagByUser',
            'entity' => 'Newsletter\Entity\NewsletterTagsByUser',
            'targetentities' => array(
                'userIdent' => 'Newsletter\Entity\NewsletterUsers',
                'tagIdent' => 'Newsletter\Entity\NewsletterTags',
            ),            
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Newsletter\Form\Users\UserTagForm',
            'formaction' => '/newsletter/tagbyuser/add',
            'settoroute' => '/newsletter/tagbyuser'
        ),
        'assets' => array(
            'sets' => array(
                'mcworkformstyles',
                'mcworkhead',
                'mcworkforms'
            )
        )
    ), 
    
    '/newsletter/tagbyuser/edit' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'Tag bearbeiten',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'Tag bearbeiten',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Newsletter\Model\Users\SaveTagByUser',
            'entity' => 'Newsletter\Entity\NewsletterTagsByUser',
            'targetentities' => array(
                'userIdent' => 'Newsletter\Entity\NewsletterUsers',
                'tagIdent' => 'Newsletter\Entity\NewsletterTags',
            ),
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Newsletter\Form\Users\UserTagForm',
            'formaction' => '/newsletter/tagbyuser/edit',
            'settoroute' => '/newsletter/tagbyuser'
        ),
        'assets' => array(
            'sets' => array(
                'mcworkformstyles',
                'mcworkhead',
                'mcworkforms'
            )
        )
    ), 
    
    '/newsletter/public/usersubscribe' => array(
        'splitQuery' => 3,
        'resource' => 'index',
        'template' => 'forms/public',
        'pageContent' => array(
            'headline' => 'Newsletter abonnieren',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Newsletter\Model\Users\SavePublicUser',
            'entity' => 'Newsletter\Entity\NewsletterUsers',
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Newsletter\Form\Open\UserForm',
            'formaction' => '/newsletter/public/usersubscribe',
        ),
    ),
    
    '/newsletter/confirm/subscription' => array(
  
            'resource' => 'index',
            'template' => 'content/subscribe/confirm',
            'app' => array(
                'controller' => 'Mcwork\Controller\McworkAppController',
                'worker' => 'Newsletter\Model\Users\ConfirmPublicUser',
                'entity' => 'Newsletter\Entity\NewsletterUsers',
            )
    
        
    )
    
);