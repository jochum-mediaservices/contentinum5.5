<?php
return array(
    '_default' => array(
        'splitQuery' => 2,
        'title' => 'Login',
        'resource' => 'index',
        'charset' => 'utf-8',
        'locale' => 'de_DE',
        'timeZone' => 'Europa/Berlin',
        'metaViewport' => 'width=device-width, initial-scale=1.0',
        'layout' => 'user/layout',
        'app' => array(
            'entitymanager' => 'doctrine.entitymanager.orm_default'
        ),
        
        'assets' => array(
            'template' => '/data/assets/collections/foundation6login.php',
        ),

    ),
    '/login' => array(
        'resource' => 'index',
        'metaTitle' => 'Login',
        'template' => 'login/templates/userlogin',
        'bodyId' => 'mcusrlogin',
        'pageContent' => array(
            'headline' => '<h2>Benutzer Login</h2>',
            'content' => '<p>Loggen Sie sich Bitte mit Ihrem Benutzernamen und Passwort ein.</p>'
        ),
        'app' => array(
            'controller' => 'Mcuser\Controller\McuserController',
            'worker' => 'Mcuser\Model\Auth\User',
            'entity' => 'Contentinum\Entity\Users5',
            'formdecorators' => 'user_form_decorators',
            'form' => 'Mcuser\Form\LoginFrom',
            'formaction' => '/login',          
        )        
    ),
    '/logout' => array(
        'resource' => 'member',
        'metaTitle' => 'Logout',
        'template' => 'login/templates/userlogin',
        'bodyId' => 'mcusrlogout',
        'pageContent' => array(
            'headline' => '',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcuser\Controller\LogoutController',
            'worker' => 'Mcuser\Model\Auth\User',
            'entity' => 'Contentinum\Entity\Users5',
        )
    ),    
);