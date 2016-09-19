<?php
namespace Newsletter;


return array(
    'service_manager' => array(
        'factories' => array(
            'entity_newsletter_users' => 'Newsletter\Factory\Entities\NewsletterUsers',
            'entity_newsletter_tags' => 'Newsletter\Factory\Entities\NewsletterTags',
            'entity_newsletter_tagsbyuser' => 'Newsletter\Factory\Entities\NewsletterTagsByUser',
            
            
            
            'modul_newsletter_newsletter' => 'Newsletter\Factory\Mapper\ModulNewsletterFactory',


        ),
    ),
    'contentinum_config' => array(
        'contentinum_module' => array('newsletter'),
        'contentinum_version' => 'newsletter',
        'etc_cfg_pages' => array(
            'newsletter_pages' => CON_ROOT_PATH . '/module/' . __NAMESPACE__ . '/etc/pages.php'
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
            'newsletter' => CON_ROOT_PATH . '/module/' . __NAMESPACE__ . '/view'
        )
    ),
);