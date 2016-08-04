<?php
namespace Guestbook;

return array(
    'service_manager' => array(
         
        'factories' => array(
            'entity_guestbook_guestbook' => 'Guestbook\Factory\Entities\GuestbookFactory',

        ),
    ),    
    
    'contentinum_config' => array(
        'contentinum_module' => array('guestbook'),
        'contentinum_version' => 'guestbook',
        'etc_cfg_pages' => array(
            'guestbook_pages' => CON_ROOT_PATH . '/module/' . __NAMESPACE__ . '/etc/pages.php'
        ),
        'etc_cfg_files' => array(
            'app_plugins' => array(CON_ROOT_PATH . '/module/' . __NAMESPACE__ . '/etc/plugins.php'),
            'app_plugin_templates' => array(CON_ROOT_PATH . '/module/' . __NAMESPACE__ . '/etc/templates/plugins'),
            'mcwork_navigation' => array(__NAMESPACE__ => CON_ROOT_PATH . '/module/' . __NAMESPACE__ . '/etc/navigation.php'),
    
        ),
    ), 
    'doctrine' => array(
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(
                    __DIR__ . '/../src/' . __NAMESPACE__ . '/Entity'
                )
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                )
            )
        )
    ),
    'view_manager' => array(      
        'template_path_stack' => array(
            'guestbook' => CON_ROOT_PATH . '/module/' . __NAMESPACE__ . '/view'
        )
    ),    
    
);