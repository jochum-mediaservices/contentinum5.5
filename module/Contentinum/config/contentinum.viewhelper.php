<?php
return array(
    
    'invokables' => array(
        
        'renderForm' => 'ContentinumComponents\Forms\View\Helper\FormBuild',
        'formelement' => 'ContentinumComponents\Forms\View\Helper\FormElement',
        'formNote' => 'ContentinumComponents\Forms\View\Helper\FormNote',
        
        'navigationcontentinum' => 'Contentinum\View\Helper\Navigation\Contentinum',
        'buildsmultilevel' => 'Contentinum\View\Helper\Navigation\Builds\Multilevel',
        'buildsmmenu' => 'Contentinum\View\Helper\Navigation\Builds\Mmenu',        
        'buildsbreadcrumb' => 'Contentinum\View\Helper\Navigation\Builds\Crumbs',
        
        'navigationbuild' => 'Contentinum\View\Helper\Navigation\Build',
        'navigationtopbar'  => 'Contentinum\View\Helper\Navigation\Topbar',
        'navigationtopbar6' => 'Contentinum\View\Helper\Navigation\Topbar6',
        'navigationmegamenu' => 'Contentinum\View\Helper\Navigation\MegaMenu',
        'navigationmmenu'  => 'Contentinum\View\Helper\Navigation\Mmenu',
        'navigationmultilevel'  => 'Contentinum\View\Helper\Navigation\Multilevel',  
        'breadcrumbnav' => 'Contentinum\View\Helper\Navigation\Breadcrumbs',
        'sitemapbuild' => 'Contentinum\View\Helper\Navigation\Sitemap',
        
        'images' => 'Contentinum\View\Helper\Medias\Images',
        'getmedialink' => 'Contentinum\View\Helper\Medias\ImageLink',
        'mediadownload' => 'Contentinum\View\Helper\Medias\Download',
        'contentelement' => 'Contentinum\View\Helper\Element',        
        'pagecontent' => 'Contentinum\View\Helper\Content',
        'contribution' => 'Contentinum\View\Helper\Contribution',
        
        'nonestyle' => 'Contentinum\View\Helper\Styles\NoStyles',
        'contentrow' => 'Contentinum\View\Helper\Styles\Row',
        'contentgrid' => 'Contentinum\View\Helper\Styles\Grid',
        'contentblockgrid' => 'Contentinum\View\Helper\Styles\BlockGrid',
        'contentaccordion' => 'Contentinum\View\Helper\Styles\Accordion',
        'contenttabs' => 'Contentinum\View\Helper\Styles\Tabs',
        'contenttabs6' => 'Contentinum\View\Helper\Styles\Tabs6',
        'contentslider' => 'Contentinum\View\Helper\Styles\Slider',
        
        'filesize' => 'Contentinum\View\Helper\Filesize',
        'datetimeformat' => 'Contentinum\View\Helper\DateTimeFormat',
        
        'langswitch' =>  'Contentinum\View\Helper\LanguageSwitch',
        
        'contenttoolbar' => 'Contentinum\View\Helper\Toolbar',
        
        'news' => 'Contentinum\View\Helper\News\App',
        'newsactual' => 'Contentinum\View\Helper\News\Actual',  
        'newscategorie' => 'Contentinum\View\Helper\News\Categories',  
        'newsactualgroup' => 'Contentinum\View\Helper\News\ActualGroup',   
        'newsarchivelist' => 'Contentinum\View\Helper\News\Archive\Monthly',
        'newsarchiveyearlist' => 'Contentinum\View\Helper\News\Archive\Annually',
        'blogcategory' => 'Contentinum\View\Helper\News\Tags\Categories',
        'blogtags' => 'Contentinum\View\Helper\News\Tags\Assigns',
        
        'mediablockgrid' => 'Contentinum\View\Helper\Medias\Blockgrid',
        'orbitslider' => 'Contentinum\View\Helper\Medias\Orbitslider',
        'mediablocklightgallery' => 'Contentinum\View\Helper\Medias\Lightbox',
        'filegroup' => 'Contentinum\View\Helper\Files\Group',  
        
        'accountmembers' => 'Contentinum\View\Helper\Account\Members',
        'accountgroup' => 'Contentinum\View\Helper\Account\Group', 
        'microdataaccountlink' => 'Contentinum\View\Helper\Account\LinkSort',
        
        'maps' => 'Contentinum\View\Helper\Maps',
        'forms' => 'Contentinum\View\Helper\Forms',
        'searchform' => 'Contentinum\View\Helper\SearchForm',
        'searchhighlight' => 'Contentinum\View\Helper\Search\HighlightPhrase',
        
        'microdatacontactgroup' => 'Contentinum\View\Helper\Microdata\ContactGroup',
        'microdatacontact' => 'Contentinum\View\Helper\Microdata\Contact',
        'microdataorganisation' => 'Contentinum\View\Helper\Microdata\Organisation',
        'microdataorganisationgroup' => 'Contentinum\View\Helper\Microdata\OrganisationGroup',
        'microdataoverwrite' => 'Contentinum\View\Helper\Microdata\Properties\Values',
        'microdataname' => 'Contentinum\View\Helper\Microdata\Properties\Name',
    )  
);