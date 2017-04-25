<?php
return array(
    
    '_default' => array(
        'splitQuery' => 1,
        'title' => 'contentinum frontend',
        'resource' => 'index',
        'charset' => 'utf-8',
        'locale' => 'de_DE',
        'timeZone' => 'Europa/Berlin',
        'metaViewport' => 'width=device-width, initial-scale=1.0',
        'layout' => 'contentinum/layout',
        'template' => 'app/templates/application',
        'app' => array(
            'controller' => 'Contentinum\Controller\ApplicationController',
            'worker' => 'Contentinum\Mapper\Content\PageContent',
            'entity' => 'Contentinum\Entity\WebPagesContent',
            'entitymanager' => 'doctrine.entitymanager.orm_default'
        ),
        'assets' => array(
            'template' => '/data/assets/collections/default.php',
        )
    ),
    'emailrecom' => array(
        'splitQuery' => 1,
        'resource' => 'index',
        'layout' => 'contentinum/layout',
        'template' => 'app/email/recommendation',
        'app' => array(
            'controller' => 'Contentinum\Controller\RecommendationController',
            'worker' => 'Contentinum\Mapper\Content\Recommendation',
            'entity' => 'Contentinum\Entity\WebContent',
        )       
    ), 
    'pdf' => array(
        'splitQuery' => 1,
        'resource' => 'index',
        'layout' => 'contentinum/layout',
        'template' => 'app/pdf/news',
        'app' => array(
            'controller' => 'Contentinum\Controller\PDFController',
            'worker' => 'Contentinum\Mapper\Content\Pdf',
            'entity' => 'Contentinum\Entity\WebContentGroups',
        )
    ), 
    'feed' => array(
        'splitQuery' => 1,
        'resource' => 'index',
        'layout' => 'contentinum/layout',
        'template' => 'app/feed/feeds',
        'app' => array(
            'controller' => 'Contentinum\Controller\FeedController',
            'worker' =>  'Contentinum\Mapper\Content\Feed',
            'entity' => 'Contentinum\Entity\WebContentGroups',
            'entitymanager' => 'doctrine.entitymanager.orm_default',
        )
    ), 
    'contentplugin' => array(
        'splitQuery' => 1,
        'resource' => 'index',
        'layout' => 'contentinum/layout',
        'template' => 'app/datas/contentplugins',
        'app' => array(
            'controller' => 'Contentinum\Controller\PluginController',
            'worker' => 'Contentinum\Mapper\Content\Plugin',
            'entity' => 'Contentinum\Entity\WebContentGroups',
        )
    ), 
    'jsonpages' => array(
        'splitQuery' => 1,
        'resource' => 'index',
        'template' => 'app/response/jsonpages',
        'app' => array(
            'controller' => 'Contentinum\Controller\JsonController',
            'worker' => 'Contentinum\Mapper\Content\JsonPageContent',
            'entity' => 'Contentinum\Entity\WebContentGroups',
        )        
    ),
    'sitemap.xml' => array(
        'splitQuery' => 1,
        'resource' => 'index',
        'layout' => 'contentinum/layout',
        'template' => 'app/sitemap/sitemap',
        'app' => array(
            'controller' => 'Contentinum\Controller\SitemapController',
            'worker' => 'Contentinum\Mapper\Sitemap\SitemapIndex',
            'entity' => 'Contentinum\Entity\WebNavigationTree',
            'entitymanager' => 'doctrine.entitymanager.orm_default',
        )
    ),    
);