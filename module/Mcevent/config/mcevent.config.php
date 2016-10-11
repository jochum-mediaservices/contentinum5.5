<?php
namespace Mcevent;

return array(
     'service_manager' => array(
         
         'factories' => array(
             
             'entity_mcevent_calendar' => 'Mcevent\Factory\Entities\CalendarFactory',
             'entity_mcevent_calendargroup' => 'Mcevent\Factory\Entities\CalendarGroupFactory',
             'entity_mcevent_calendargroupindex' => 'Mcevent\Factory\Entities\CalendarGroupIndexFactory',
             'entity_mcevent_dates' => 'Mcevent\Factory\Entities\DatesFactory',
             'entity_mcevent_datesconfig' => 'Mcevent\Factory\Entities\DatesConfigFactory',

             
             'mcevent_locations' => 'Mcevent\Service\Accounts\LocationServiceFactory',
             'mcevent_organizer' => 'Mcevent\Service\Accounts\OrganizerServiceFactory',
             'mcevent_configuration' => 'Mcevent\Service\Configuration\OptionFactory',
             
             'templates_plugin_events' => 'Mcevent\Service\Plugins\DatesTemplateFactory',
             'templates_plugin_eventnavigation' => 'Mcevent\Service\Plugins\NavigationTemplateFactory',
             
             'mcevent_static_dates' => 'Mcevent\Factory\Mapper\ModulDatesFactory',
             'mcevent_app_dates' => 'Mcevent\Factory\Mapper\ModulGroupDatesFactory',
             'mcevent_actual_dates' => 'Mcevent\Factory\Mapper\ModulActualDatesFactory',//
             'mcevent_actual_groupdates' => 'Mcevent\Factory\Mapper\ModulActualGroupDatesFactory',
             'mcevent_actual_groupbyday' => 'Mcevent\Factory\Mapper\ModulActualGroupByDayFactory',
             'mcevent_event_navigation' => 'Mcevent\Factory\Mapper\ModulNavigationFactory',
             
             'mcevent_event_datesregister' => 'Mcevent\Factory\Mapper\ModulActualDatesRegisterFactory',
             'mcevent_event_datesregistergrp' => 'Mcevent\Factory\Mapper\ModulActualGroupDatesFactory',             
             
             'mcevent_options_eventdates' => 'Mcevent\Service\Register\RegisterEventFactory',
             'mcevent_options_eventdateinternal' => 'Mcevent\Service\Register\RegisterEventInternalFactory',    
             'mcevent_options_eventdatepublic' => 'Mcevent\Service\Register\RegisterEventPublicFactory',
         ),
     ),
    
    'contentinum_config' => array(
        'contentinum_module' => array('mcevent'),
        'etc_cfg_pages' => array(
            'mcevent_pages' => CON_ROOT_PATH . '/module/' . __NAMESPACE__ . '/etc/pages.php'
        ),   
        'db_cache_keys' => array(
            'mcevent_location' => array(
                'cache' => 'mcevent_location',
                'entitymanager' => 'doctrine.entitymanager.orm_default',
                'entity' => 'Contentinum\Entity\Accounts',
                'savecache' => false
            ),
            'mcevent_organizer' => array(
                'cache' => 'mcevent_organizer',
                'entitymanager' => 'doctrine.entitymanager.orm_default',
                'entity' => 'Contentinum\Entity\Accounts',
                'savecache' => false                
            ),
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
            'mcevent' => CON_ROOT_PATH . '/module/' . __NAMESPACE__ . '/view'
        )
    ),    
    
);