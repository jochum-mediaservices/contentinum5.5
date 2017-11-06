<?php
namespace Mcwork;

return array(
    
    'service_manager' => array(
        'invokables' => array(),
        'factories' => array(
            'acl_resource' => 'Mcwork\Service\Acl\ResourceServiceFactory',
            
            'locale_language' => 'Mcwork\Service\Locale\LanguageServiceFactory',
            'locale_i18n' => 'Mcwork\Service\Locale\i18nServiceFactory',    
            
            'attribute_charset' => 'Mcwork\Service\Attribute\CharsetServiceFactory',
            'attribute_httpstatuscode' => 'Mcwork\Service\Attribute\HttpstatuscodeServiceFactory',
            'attribute_linkAttrRel' => 'Mcwork\Service\Attribute\LinkRelServiceFactory',
            'attribute_linkAttrTarget' => 'Mcwork\Service\Attribute\LinkTargetServiceFactory',
            'attribute_publish' => 'Mcwork\Service\Attribute\PublishServiceFactory',
            'attribute_robots' => 'Mcwork\Service\Attribute\RobotsServiceFactory',  
            
            'mcwork_templatefiles_entity' => 'Mcwork\Factory\Entities\TemplateFileFactory',
            
            'assets_files' => 'Mcwork\Service\Assets\AssetFilesServiceFactory',
            'layout_files' => 'Mcwork\Service\Layout\FilesServiceFactory',
            
            'templates_types' => 'Mcwork\Service\Templates\TypesServiceFactory',
            'templates_contribution' => 'Mcwork\Service\Templates\ContributionServiceFactory',
            'templates_page_content' => 'Mcwork\Service\Templates\PagecontentServiceFactory',
            'templates_styles' => 'Mcwork\Service\Templates\StylesServiceFactory',
            
            'templates_plugin_navigation' => 'Mcwork\Service\Plugins\TemplateNavigationFactory',
            'templates_plugin_news' => 'Mcwork\Service\Plugins\TemplateNewsFactory',
            'templates_plugin_newsactual' => 'Mcwork\Service\Plugins\TemplateNewsActualFactory',
            'templates_plugin_newsarchive' => 'Mcwork\Service\Plugins\TemplateNewsArchiveFactory',
            'templates_plugin_newsyeararchive' => 'Mcwork\Service\Plugins\TemplateNewsArchivYearFactory',
            'templates_plugin_newscategory' => 'Mcwork\Service\Plugins\TemplateNewsCategoryFactory',
            'templates_plugin_newstags' => 'Mcwork\Service\Plugins\TemplateNewsTagsFactory',
            'templates_plugin_mediagroup' => 'Mcwork\Service\Plugins\TemplateMediaGroupFactory',
            'templates_plugin_filegroup' => 'Mcwork\Service\Plugins\TemplateFileGroupFactory',
            'templates_plugin_microdatagroup' => 'Mcwork\Service\Plugins\TemplateContactGroupFactory',
            'templates_plugin_microdatacontact' => 'Mcwork\Service\Plugins\TemplateContactFactory',
            'templates_plugin_microdataaccount'  => 'Mcwork\Service\Plugins\TemplateAccountFactory',
            'templates_plugin_topbar6' => 'Mcwork\Service\Plugins\TemplateTopbar6Factory',
            
            'mcwork_cache_keys' => 'Mcwork\Service\Cache\RegisterServiceFactory',
            
            'content_links_pages' => 'Mcwork\Service\Content\PagesLinksServiceFactory',
             
            'mcwork_navigation_files' => 'Mcwork\Service\Navigation\FileDataServiceFactory',
            'mcwork_acl_resource' => 'Mcwork\Service\Acl\ResourceServiceFactory',
            'mcwork_acl_resourcegroup' => 'Mcwork\Service\Acl\MemberGroupOptionFactory',
            'backend_client_app' => 'Mcwork\Service\Client\AppServiceFactory',
            'mcwork_cache_data' => 'Mcwork\Service\Cache\DataFactory',

            'mcwork_buttons' => 'Mcwork\Service\Elements\ButtonsServiceFactory',
            'mcwork_tableedit' => 'Mcwork\Service\Elements\TableeditServiceFactory',
            'mcwork_toolbar' => 'Mcwork\Service\Elements\ToolbarServiceFactory',            

            'mcwork_cache_structures' => 'Mcwork\Service\Cache\StructuresFactory',

            'mcwork_media_administration' => 'Mcwork\Factory\Model\MediaAdministrateFactory',
            'mcwork_media' => 'Mcwork\Service\Media\TableServiceFactory',
            'mcwork_mediainuse' => 'Mcwork\Service\Media\InUseServiceFactory',
            'media_tags_assign' => 'Mcwork\Factory\Model\MediaTagsFactory',
            'file_tags_assign' => 'Mcwork\Factory\Mapper\FileTagsFactory',
            'mcwork_pagelabels' => 'Mcwork\Service\Pages\LabelsServiceFactory',
            'mcwork_pagehost' => 'Mcwork\Service\Pages\PageHostFactory',
            'mcwork_pagedefaultshost' => 'Mcwork\Service\Pages\PageDefaultsHostFactory',
            'mcwork_pageurls' => 'Mcwork\Service\Pages\UrlsServiceFactory',
            
            'mcwork_blog_categories' => 'Mcwork\Factory\Mapper\BlogCategoriesFactory',
            'mcwork_blog_tags' => 'Mcwork\Factory\Mapper\BlogTagsFactory',
            'mcwork_article_category' => 'Mcwork\Service\Blog\CategoryFactory',
            'mcwork_article_tags' => 'Mcwork\Service\Blog\TagsFactory',
            
            'mcwork_upload_max_file_size' =>  'Mcwork\Factory\Service\FsUploadMaxSizeFactory',
            'mcwork_allowed_upload_files' => 'Mcwork\Factory\Service\FsUploadAllowedFactory',  
             
            'mcwork_contribution_page' => 'Mcwork\Factory\Mapper\ContributionPageFactory', 
            'mcwork_tags_by_article' => 'Mcwork\Factory\Mapper\ArticleTagsFactory',
            
            'mcwork_form_decorators' => 'Mcwork\Service\Form\DecoratorsServiceFactory',
            'mcwork_form_standard' => 'Mcwork\Factory\Form\McworkFormFactory',  
            'mcwork_form_rules' => 'Mcwork\Service\Form\RulesServiceFactory',
            
            'accounts' => 'Mcwork\Service\Directory\AccountServiceFactory',
            'mcwork_public_media' => 'Mcwork\Factory\Service\PublicImagesFactory',
            'mcwork_public_mediasrc' => 'Mcwork\Factory\Service\PublicImageSourceFactory',
            'mcwork_public_pdf' => 'Mcwork\Factory\Service\PublicPdfFactory',
            'mcwork_nonpublic_media' => 'Mcwork\Factory\Service\DeniedFileFactory',
            'mcwork_plugins' => 'Mcwork\Service\Plugins\DefaultServiceFactory',
          
        ),        
        
    ),
    
    'view_manager' => array(
        'template_map' => array(
            'mcwork/layout/admin' => CON_ROOT_PATH . '/module/' . __NAMESPACE__ . '/view/layout/admin.phtml'
        ),
        'template_path_stack' => array(
            'mcwork' => CON_ROOT_PATH . '/module/' . __NAMESPACE__ . '/view'
        )
    ),
    
    'translator' => array(
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),    
    
    'contentinum_config' => array(
        'contentinum_module' => array('mcwork'),
        'templates_files' => array(
            'mcwork_acl_resource' => CON_ROOT_PATH . '/module/' . __NAMESPACE__ . '/etc/acl/resource.data.xml',
            
            'locale_i18n' => CON_ROOT_PATH . '/module/' . __NAMESPACE__ . '/etc/locale/i18n.data.xml',
            'locale_language' => CON_ROOT_PATH . '/module/' . __NAMESPACE__ . '/etc/locale/language.data.xml',  
            
            'attribute_charset' => CON_ROOT_PATH . '/module/' . __NAMESPACE__ . '/etc/attribute/charset.data.xml',
            'attribute_httpstatuscode' => CON_ROOT_PATH . '/module/' . __NAMESPACE__ . '/etc/attribute/httpstatuscode.data.xml',
            'attribute_link_rel' =>  CON_ROOT_PATH . '/module/' . __NAMESPACE__ . '/etc/attribute/link_rel.data.xml',
            'attribute_link_target' =>  CON_ROOT_PATH . '/module/' . __NAMESPACE__ . '/etc/attribute/link_target.data.xml',
            'attribute_publish' => CON_ROOT_PATH . '/module/' . __NAMESPACE__ . '/etc/attribute/publish.data.xml',
            'attribute_robots' => CON_ROOT_PATH . '/module/' . __NAMESPACE__ . '/etc/attribute/robots.data.xml',            
        ),        
        
        'etc_cfg_pages' => array(
            'mcwork_pages' => CON_ROOT_PATH . '/module/' . __NAMESPACE__ . '/etc/pages.php'
            
        ),
        'etc_cfg_files' => array(
            'mcwork_navigation' => array(__NAMESPACE__ => CON_ROOT_PATH . '/module/' . __NAMESPACE__ . '/etc/navigation.php'),
            'mcwork_client_apps' => CON_ROOT_PATH . '/module/' . __NAMESPACE__ . '/etc/app/client.php',
            'mcwork_elements_toolbar' => CON_ROOT_PATH . '/module/' . __NAMESPACE__ . '/etc/elements/toolbar.php',
            'mcwork_elements_buttons' => CON_ROOT_PATH . '/module/' . __NAMESPACE__ . '/etc/elements/buttons.php',
            'mcwork_elements_tableedit' => CON_ROOT_PATH . '/module/' . __NAMESPACE__ . '/etc/elements/tableedit.php',  
            
            'mcwork_form_decorators' => CON_ROOT_PATH . '/module/' . __NAMESPACE__ . '/etc/form/decorators.php',
            'mcwork_form_rules' => array(CON_ROOT_PATH . '/module/' . __NAMESPACE__ . '/etc/form/rules.php'),
            'mcwork_cache_register' => CON_ROOT_PATH . '/module/' . __NAMESPACE__ . '/etc/cache/register.php',
            
            'assets_files' => CON_ROOT_PATH . '/data/assets/collections',
            'layout_files' => CON_ROOT_PATH . '/data/view/app/templates',
            
        ),
        
        'db_cache_keys' => array(
            'mcwork_media' => array(
                'cache' => 'mcwork_media',
                'entitymanager' => 'doctrine.entitymanager.orm_default',
                'entity' => 'Contentinum\Entity\WebMedias',
                'sortby' => 'media_source',
                'savecache' => false,
            ),
            'mcwork_pagelabels' => array(
                'cache' => 'mcwork_pagelabels',
                'entitymanager' => 'doctrine.entitymanager.orm_default',
                'entity' => 'Contentinum\Entity\WebPagesParameter',
                'savecache' => false,                
            ),
            'mcwork_pagedefaultshost' => array(
                'cache' => 'mcwork_pagehost',
                'entitymanager' => 'doctrine.entitymanager.orm_default',
                'entity' => 'Contentinum\Entity\WebPagesParameter',
                'savecache' => false,
            ),
            'mcwork_pagehost' => array(
                'cache' => 'mcwork_pagehost',
                'entitymanager' => 'doctrine.entitymanager.orm_default',
                'entity' => 'Contentinum\Entity\WebPagesParameter',
                'savecache' => false,
            ),
            'mcwork_pageurls' => array(
                'cache' => 'mcwork_pageurls',
                'entitymanager' => 'doctrine.entitymanager.orm_default',
                'entity' => 'Contentinum\Entity\WebPagesParameter',
                'savecache' => false,
            ),            
            'content_pages_links' => array(
                'cache' => 'content_pages_links',
                'entitymanager' => 'doctrine.entitymanager.orm_default',
                'entity' => 'Contentinum\Entity\WebPagesParameter',
                'orderBy' => array('label' => 'ASC'),
                'savecache' => false,
            ),            
            'mcwork_inuse_medias' => array(
                'cache' =>  'mcwork_inuse_medias',
                'entitymanager' => 'doctrine.entitymanager.orm_default',
                'savecache' => false,
            ),
            'mcwork_directory_accounts' => array(
                'cache' => 'mcwork_directory_accounts',
                'entitymanager' => 'doctrine.entitymanager.orm_default',
                'entity' => 'Contentinum\Entity\Accounts',
                'savecache' => false,
            ),            
        ),
    ),
    
);