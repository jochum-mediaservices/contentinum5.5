<?php
namespace Mcuser;

return array(
    
    
    
    'service_manager' => array(
        'invokables' => array('user_auth_adapter' => 'Mcuser\Authentication\Adapter\Database',),
        'factories' => array(
             

            'user_form_decorators' => 'Mcuser\Service\Form\DecoratorsServiceFactory',

            
            
            
            'user_identity'   => 'Mcuser\Factory\IdentityFactory',
            'user_authentication'   => 'Mcuser\Factory\AuthenticationServiceFactory',
            'user_authentication_adapter'   => 'Mcuser\Authentication\Factory\AdapterServiceFactory',
    
    
        ),
    
    ),
    
    'view_manager' => array(
        'template_map' => array(
            'user/layout' => CON_ROOT_PATH . '/data/view/login/layout/login.phtml'
        ),
        'template_path_stack' => array(
            'mcuser' => CON_ROOT_PATH . '/data/view',
        )
    ),    
    
  
    
    'contentinum_config' => array(
        'contentinum_module' => array('mcuser'),
        'etc_cfg_pages' => array(
            'mcuser_pages' => CON_ROOT_PATH . '/module/' . __NAMESPACE__ . '/etc/pages.php'
        ),
        'etc_cfg_files' => array(
            'mcwork_navigation' => array(__NAMESPACE__ => CON_ROOT_PATH . '/module/' . __NAMESPACE__ . '/etc/navigation.php'),
            'user_form_decorators' => CON_ROOT_PATH . '/module/' . __NAMESPACE__ . '/etc/form/decorators.php',
        ),
    ),    
    
);