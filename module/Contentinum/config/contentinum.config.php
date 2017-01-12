<?php
namespace Contentinum;

return array( 
    'router' => array(
        'routes' => array(
            'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/',
                    'defaults' => array(
                        'controller' => 'Contentinum',
                        'action' => 'index'
                    )
                )
            ),
            'page_app' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route' => '/:pages[/:section][/:article][/:category][/:categoryvalue]',
                    'constraints' => array(
                        'pages' => '[a-zA-Z0-9._-]+',
                        'section' => '[a-zA-Z0-9._-]+',
                        'article' => '[a-zA-Z0-9._-]+',
                        'category' => '[a-zA-Z0-9.,_-]+',
                        'categoryvalue' => '[a-zA-Z0-9,_-]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Contentinum',
                        'action' => 'index'
                    )
                )
            )
        )
        
    ),
    'service_manager' => array(
        'invokables' => array(),
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'factories' => array(
            'assets_minified_css' => '',
            'contentinum_acl_settings' => 'Contentinum\Service\Acl\SettingsServiceFactory',
            'contentinum_acl_acl' => 'Contentinum\Service\AclServiceFactory',
            'contentinum_acl_defaultrole' => 'Contentinum\Service\Acl\DefaultRoleServiceFactory',
            'contentinum_acl_usrgrp' => 'Contentinum\Service\Acl\UserGroupsFactory',
            
            'contentinum_authservice' => 'Contentinum\Service\Domains\AuthServiceFactory',
            
            'contentinum_module' => 'Contentinum\Service\RegisteredModules',
            'contentinum_name' => 'Contentinum\Service\VersionsName',
            'contentinum_defassets' => 'Contentinum\Service\DefaultAsset',
            'contentinum_configure' => 'Contentinum\Service\ConfigurationServiceFactory',
            'contentinum_customer' => 'Contentinum\Service\Opt\CustomerServiceFactory',
            'contentinum_pages'  => 'Contentinum\Factory\Options\PagesFactory',
            'contentinum_page_files'  => 'Contentinum\Service\Pages\ConfigurationFilesFactory',
            'contentinum_page_defaults'  => 'Contentinum\Factory\Pages\DefaultPageFactory',

            'contentinum_preference' => 'Contentinum\Service\Domains\PreferenceServiceFactory',
            'contentinum_page_headers' => 'Contentinum\Service\Domains\PageHeadersServiceFactory',
            'contentinum_public_pages' => 'Contentinum\Service\Pages\PublicServiceFactory',
            'contentinum_attribute_pages' => 'Contentinum\Service\Pages\AttributeServiceFactory',            
            
            'contentinum_template_assign' => 'Contentinum\Service\Templates\TemplateAssignServiceFactory',
            'contentinum_template_plugins' => 'Contentinum\Service\Templates\PluginTemplateServiceFactory',
            'contentinum_content_styles' => 'Contentinum\Service\Templates\ContentStylesServiceFactory',
            'contentinum_content_widgets' => 'Contentinum\Service\Templates\WidgetsStylesServiceFactory',
            'contentinum_group_styles' => 'Contentinum\Service\Templates\GroupStylesServiceFactory',
            
            'contentinum_modul_parameter' => 'Contentinum\Factory\Mapper\ModulParamterFactory',
            'contentinum_modul' => 'Contentinum\Factory\Mapper\ModulFactory',
            'contentinum_plugin_keys' => 'Contentinum\Service\Plugins\KeyServiceFactory',
            'contentinum_plugin_views' => 'Contentinum\Service\Plugins\ViewHelperServiceFactory',            
            
            'translator' => 'Zend\Mvc\Service\TranslatorServiceFactory',
            
            'contentinum_cache_public' => 'Contentinum\Service\Cache\PublicContentFactory',           
            'contentinum_cache_struture' => 'Contentinum\Service\Cache\StrutureContentFactory',            
            'contentinum_cache_navigation' => 'Contentinum\Service\Cache\NavigationFactory',
            
            
            'contentinum_files_storage_manager' => 'Contentinum\Factory\StorageManagerFactory',   
            
            'entity_preferences' => 'Contentinum\Factory\Entities\PreferencesFactory',
            'entity_redirect' => 'Contentinum\Factory\Entities\RedirectFactory',
            'entity_navigation' => 'Contentinum\Factory\Entities\NavigationFactory',
            'entity_tree' => 'Contentinum\Factory\Entities\NavigationTreeFactory',
            
            'entity_fieldtypes' => 'Contentinum\Factory\Entities\FieldtypesFactory',
            'entity_accounts' => 'Contentinum\Factory\Entities\AccountsFactory',
            'entity_accountgroup' => 'Contentinum\Factory\Entities\AccountGroupFactory',
            'entity_accountgroupindex' => 'Contentinum\Factory\Entities\AccountGroupIndexFactory',
            'entity_user' => 'Contentinum\Factory\Entities\UserFactory',
            'entity_user_role' => 'Contentinum\Factory\Entities\UserRolesFactory',
            'entity_user_aclgrp' => 'Contentinum\Factory\Entities\UserAclGroupFactory',
            'entity_contacts' => 'Contentinum\Factory\Entities\ContactsFactory',
            'entity_contactgroup' => 'Contentinum\Factory\Entities\ContactGroupFactory',
            'entity_contactgroupindex' => 'Contentinum\Factory\Entities\ContactGroupIndexFactory',
            
            'entity_content' => 'Contentinum\Factory\Entities\ContentFactory', 
            'entity_content_groups' => 'Contentinum\Factory\Entities\ContentGroupsFactory',
            'entity_page_content' => 'Contentinum\Factory\Entities\ContentPageFactory',
            
            'entity_blog_group' => 'Contentinum\Factory\Entities\BlogGroupFactory',
            'entity_blog_groupindex' => 'Contentinum\Factory\Entities\BlogGroupIndexFactory',
            
            'entity_pages' => 'Contentinum\Factory\Entities\PagesFactory',
            'entity_pageattribute'=> 'Contentinum\Factory\Entities\PageAttributeFactory',
            'entity_pageheadlinks' => 'Contentinum\Factory\Entities\PageHeadLinksFactory',
            
            'entity_media_table' => 'Contentinum\Factory\Entities\MediaTableFactory',
            
            'entity_file_group' => 'Contentinum\Factory\Entities\FileGroupFactory',
            'entity_file_groupindex' => 'Contentinum\Factory\Entities\FileGroupIndexFactory',
            'entity_file_combinegroup' => 'Contentinum\Factory\Entities\CombineFileGroupFactory',
            'entity_file_combinegroupindex' => 'Contentinum\Factory\Entities\CombineFileGroupIndexFactory',            
            
            'entity_maps' => 'Contentinum\Factory\Entities\MapsFactory',
            'entity_mapmarker' => 'Contentinum\Factory\Entities\MapmarkerFactory',   
            
            'entity_forms' => 'Contentinum\Factory\Entities\FormsFactory',
            'entity_formfields' => 'Contentinum\Factory\Entities\FormFieldsFactory',
            'entity_formfieldoptions' => 'Contentinum\Factory\Entities\FormFieldOptionsFactory', 
            
            'entity_tags' => 'Contentinum\Factory\Entities\TagsFactory',
            
            // module plugins factories
            'contentinum_navigation' => 'Contentinum\Factory\Mapper\ModulNavigationFactory',
            'contentinum_megamenu' => 'Contentinum\Factory\Mapper\ModulMegaMenuFactory',
            
            'contentinum_blogs' => 'Contentinum\Factory\Mapper\ModulBlogFactory',
            'contentinum_blogs_reversed' => 'Contentinum\Factory\Mapper\ModulBlogReversedFactory',
            'contentinum_blogs_actual' => 'Contentinum\Factory\Mapper\ModulBlogActualFactory',
            'contentinum_blogs_categorie' => 'Contentinum\Factory\Mapper\ModulBlogCategorieFactory',
            'contentinum_blogs_groups' => 'Contentinum\Factory\Mapper\ModulBlogGroupsFactory',
            'contentinum_blogs_monthly' => 'Contentinum\Factory\Mapper\ModulBlogsMonthlyFactory',
            'contentinum_blogs_annually' => 'Contentinum\Factory\Mapper\ModulBlogsAnnuallyFactory',
            'contentinum_search_news' => 'Contentinum\Factory\Mapper\ModulBlogSearchFactory',
            'contentinum_blogs_category' => 'Contentinum\Factory\Mapper\ModulBlogsCategoriesFactory',
            'contentinum_blogs_tags' => 'Contentinum\Factory\Mapper\ModulBlogTagsFactory',
            
            'contentinum_media_group' => 'Contentinum\Factory\Mapper\ModulMediaGroupFactory',
             
            'contentinum_file_group' => 'Contentinum\Factory\Mapper\ModulFileGroupFactory',
            'contentinum_account_members' => 'Contentinum\Factory\Mapper\ModulAccountMembersFactory',
            'contentinum_maps' => 'Contentinum\Factory\Mapper\ModulMapsFactory',
            'contentinum_forms' => 'Contentinum\Factory\Mapper\ModulFormsFactory',
            'contentinum_contact' => 'Contentinum\Factory\Mapper\ModulContactFactory',
            'contentinum_organisation' => 'Contentinum\Factory\Mapper\ModulOrganisationFactory',
            'contentinum_contact_group' => 'Contentinum\Factory\Mapper\ModulContactGroupFactory',
            'contentinum_index_accounts' => 'Contentinum\Factory\Mapper\ModulIndexAccountsFactory',
            'contentinum_search_forms' => 'Contentinum\Factory\Mapper\ModulSearchFormFactory',   
            
            // form factories
            'recommendation_forms' => 'Contentinum\Factory\Form\RecommendationFormFactory',
            'search_forms' => 'Contentinum\Factory\Form\SearchFormFactory',
            'contentinum_form_factory' => 'Contentinum\Factory\Form\CustomersFormFactory',
            'contentinum_form_process' => 'Contentinum\Factory\Form\ProcessFormFactory',
            'contentinum_form_decorators' => 'Contentinum\Service\Form\DecoratorsServiceFactory',
            'contentinum_select_fieldfactory' => 'Contentinum\Factory\Mapper\Form\FieldOptionsFactory',
            'contentinum_smtp_transport' => 'Contentinum\Service\Mail\TransportServiceFactory',
            'contentinum_sendmail' => 'Contentinum\Service\Mail\SendmailServiceFactory',            
        ),
    ),
    'translator' => array(
        'locale' => 'de_DE',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'factories' => array(
            'Contentinum' => 'Contentinum\Factory\Controller\ApplicationControllerFactory',
        ),        
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'contentinum/layout' => CON_ROOT_PATH . '/data/view/app/layout/application.phtml',
            'layout/layout' => __DIR__ . '/../view/layout/foundation.phtml',
            'error/404' => CON_ROOT_PATH . '/data/view/app/templates/error.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',            
            
        ),
        'template_path_stack' => array(
            CON_ROOT_PATH . '/data/view',
        ),
    ),
        
    // Placeholder for console routes
    'console' => array(
        'router' => array(
            'routes' => array(
            ),
        ),
    ),
    
    'doctrine' => array(
    
        'driver' => array(
            __NAMESPACE__ . '_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
            ),
            'orm_default' => array(
                'drivers' => array(
                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                )
            )
        )
    
    ),    
    
    
    'contentinum_config' => array(
        'contentinum_module' => array('contentinum'),
        'contentinum_version' => 'standard',
        'contentinum_navigation_cache' => false,
        'etc_cfg_pages' => array(
            'app_pages' => CON_ROOT_PATH . '/module/' . __NAMESPACE__ . '/etc/pages.php',
         ),
        'etc_cfg_files' => array( 
            'app_plugins' => array(CON_ROOT_PATH . '/module/' . __NAMESPACE__ . '/etc/plugins.php'),
            'app_plugin_templates' => array(CON_ROOT_PATH . '/module/' . __NAMESPACE__ . '/etc/templates/plugins', CON_ROOT_PATH . '/data/view/app/plugins'),
            'opt_customer' => CON_ROOT_PATH . '/module/' . __NAMESPACE__ . '/etc/customer.config.php',
            'content_template_assign' => CON_ROOT_PATH . '/module/' . __NAMESPACE__ . '/etc/templates/assigns',
            'content_contribution_styles' => CON_ROOT_PATH . '/module/' . __NAMESPACE__ . '/etc/templates/contributions',
            'content_widgets_styles' => CON_ROOT_PATH . '/module/' . __NAMESPACE__ . '/etc/templates/widgets',
            'content_group_styles' => CON_ROOT_PATH . '/module/' . __NAMESPACE__ . '/etc/templates/styles',
            
            'content_form_decorators' => CON_ROOT_PATH . '/module/' . __NAMESPACE__ . '/etc/form',
         ),
        
        'db_cache_keys' => array(
            'contentinum_domain_preference' => array(
                'name' => 'Domain Konfiguration',
                'cache' => 'contentinum_domain_preference',
                'entitymanager' => 'doctrine.entitymanager.orm_default',
                'entity' => 'Contentinum\Entity\WebPreferences',
                'sortby' => 'host',
                'savecache' => false,
            ),
            'contentinum_public_pages' => array(
                'name' => 'Seiten im Webauftritt',
                'cache' => 'contentinum_public_pages',
                'entitymanager' => 'doctrine.entitymanager.orm_default',
                'entity' => 'Contentinum\Entity\WebPagesParameter',
                'findBy' => array('onlylink' => '0', 'publish' => 'yes'),
                'savecache' => false,
            ),
            'contentinum_attribute_pages' => array(
                'name' => 'Seiten Eigenschaften',
                'cache' => 'contentinum_attribute_pages',
                'entitymanager' => 'doctrine.entitymanager.orm_default',
                'entity' => 'Contentinum\Entity\WebPagesAttributes',
                'savecache' => false,
            ),
            'contentinum_page_header' => array(
                'name' => 'Seiten Headerlinks',
                'cache' => 'contentinum_page_header',
                'entitymanager' => 'doctrine.entitymanager.orm_default',
                'entity' => 'Contentinum\Entity\WebPagesHeadlinks',
                //'sortby' => 'host',
                'savecache' => false,
            ),
            'contentinum_acl_usrgrp' => array(
                'name' => 'Benutzergruppen',
                'cache' => 'contentinum_acl_usrgrp',
                'entitymanager' => 'doctrine.entitymanager.orm_default',
                'entity' => 'Contentinum\Entity\UserAclIndex',
                //'sortby' => 'host',
                'savecache' => false,
            ),            
        ),        
        
        'contentinum_acl' => array(
            'acl_default_role' => 'guest',
            'acl_settings' => array(
                'roles' => array(
                    'guest',
                    'member',
                    'intranet',
                    'author',
                    'publisher',
                    'manager',
                    'admin',
                    'root'
                ),
                'parent' => array(
                    'member' => 'guest',
                    'intranet' => 'member',
                    'author' => 'intranet',
                    'publisher' => 'author',
                    'manager' => 'publisher',
                    'admin' => 'manager',
                    'root' => 'admin'
                ),
        
                'resources' => array(
                    'index',
                    'error',
                    'medias',
                    'memberresource',
                    'intranetresource',
                    'authorresource',
                    'publisherresource',
                    'managerresource',
                    'adminresource',
                    'rootresource'
                ),
        
                'rules' => array(
                    'allow' => array(
                        'guest' => array(
                            'index' => 'all',
                            'error' => 'all',
                            'medias' => 'all'
                        ),
                        'member' => array(
                            'memberresource' => 'all'
                        ),
                        'intranet' => array(
                            'intranetresource' => 'all'
                        ),
                        'author' => array(
                            'authorresource' => 'all'
                        ),
                        'publisher' => array(
                            'publisherresource' => 'all'
                        ),
                        'manager' => array(
                            'managerresource' => 'all'
                        ),
                        'admin' => array(
                            'adminresource' => 'all'
                        ),
                        'root' => array(
                            'rootresource' => 'all'
                        )
                    )
                )
            )
        ),        
        
    ),
);