<?php
return array(
    
    'acl_resource' => array(
        'cache' => 'mcwork_cache_structures',
        'groupkey' => 'configuration',
        'group' => 'Configuration',
        'label' => 'Zugriffsliste auf Ressourcen (ACL)',
        'metas' => null
    ),
    
    'attribute_charset' => array(
        'cache' => 'mcwork_cache_data',
        'groupkey' => 'configuration',
        'group' => 'Configuration',
        'label' => 'Liste Zeichensätze',
        'metas' => null
    ),
    
    'attribute_httpstatuscode' => array(
        'cache' => 'mcwork_cache_data',
        'groupkey' => 'configuration',
        'group' => 'Configuration',
        'label' => 'Liste HTTP Status Codes',
        'metas' => null
    ),
    
    'attribute_link_rel' => array(
        'cache' => 'mcwork_cache_data',
        'groupkey' => 'configuration',
        'group' => 'Configuration',
        'label' => 'Liste Link (rel) Attribute',
        'metas' => null
    ),
    
    'attribute_link_target' => array(
        'cache' => 'mcwork_cache_data',
        'groupkey' => 'configuration',
        'group' => 'Configuration',
        'label' => 'Liste Link (target) Attribute',
        'metas' => null
    ),
    
    'attribute_publish' => array(
        'cache' => 'mcwork_cache_data',
        'groupkey' => 'configuration',
        'group' => 'Configuration',
        'label' => 'Liste (Publish) Attribute',
        'metas' => null
    ),
    
    'attribute_robots' => array(
        'cache' => 'mcwork_cache_data',
        'groupkey' => 'configuration',
        'group' => 'Configuration',
        'label' => 'Liste (Robots) Attribute',
        'metas' => null
    ),
    
    

    
    
    'mcwork_elements_buttons' => array(
        'cache' => 'mcwork_cache_structures',
        'groupkey' => 'configuration',
        'group' => 'Configuration',
        'label' => 'Backend Formular Buttons',
        'metas' => null        
    ),
    
    'mcwork_elements_tableedit' => array(
        'cache' => 'mcwork_cache_structures',
        'groupkey' => 'configuration',
        'group' => 'Configuration',
        'label' => 'Backend Toolbar Tabellenreihe',
        'metas' => null
    ), 

    'mcwork_elements_toolbar' => array(
        'cache' => 'mcwork_cache_structures',
        'groupkey' => 'configuration',
        'group' => 'Configuration',
        'label' => 'Backend Toolbar Tabellenkopf',
        'metas' => null    
    ),
    
    
    'mcwork_form_decorators' => array(
        'cache' => 'mcwork_cache_data',
        'groupkey' => 'configuration',
        'group' => 'Configuration',
        'label' => 'Backend Formular Decorators',
        'metas' => null
    ),  



    'locale_i18n' => array(
        'cache' => 'mcwork_cache_data',
        'groupkey' => 'configuration',
        'group' => 'Configuration',
        'label' => 'Liste (Locale) Attribute',
        'metas' => null
    ),  

    'locale_language' => array(
        'cache' => 'mcwork_cache_data',
        'groupkey' => 'configuration',
        'group' => 'Configuration',
        'label' => 'Liste Sprachen',
        'metas' => null
    ),    
    
    
    
    'content_groups' => array(
        'cache' => 'mcwork_cache_data',
        'groupkey' => 'structures',
        'group' => 'Structure content data',
        'label' => 'Daten Inhaltsgruppen',
        'metas' => null    
    ),
    
    
    'content_pages_links' => array(
        'cache' => 'mcwork_cache_data',
        'groupkey' => 'structures',
        'group' => 'Structure content data',
        'label' => 'Liste Seiten und Links',
        'metas' => null
    ),
    
    'mcwork_directory_accounts' => array(
        'cache' => 'mcwork_cache_structures',
        'groupkey' => 'structures',
        'group' => 'Structure content data',
        'label' => 'Lists Directory Daten',
        'metas' => null    
    ),

    
    
    'mcwork_pages' => array(
        'cache' => 'contentinum_cache_struture',
        'groupkey' => 'backend',
        'group' => 'Backend',
        'label' => 'Backend Seiten Konfiguration und Inhalte',
        'metas' => null
    ),  
    
    'mcwork_client_apps' => array(
        'cache' => 'mcwork_cache_data',
        'groupkey' => 'backend',
        'group' => 'Backend',
        'label' => 'Client Applikation',
        'metas' => null
    ), 
    
    'mcwork_form_rules' => array(
        'cache' => 'mcwork_cache_data',
        'groupkey' => 'backend',
        'group' => 'Backend',
        'label' => 'Backend Formular Regeln',
        'metas' => null
    ),    
    
    
    'mcwork_plugins' => array(
        'cache' => 'mcwork_cache_data',
        'groupkey' => 'backend',
        'group' => 'Backend',
        'label' => 'Buttons',
        'metas' => null
    ),   

    'contentinum_domain_preference' => array(
        'cache' => 'contentinum_cache_public',
        'groupkey' => 'frontend',
        'group' => 'Frontend',
        'label' => 'Domain Konfiguration',
        'metas' => null
    ), 
    
    'contentinum_public_pages' => array(
        'cache' => 'contentinum_cache_public',
        'groupkey' => 'frontend',
        'group' => 'Frontend',
        'label' => 'Seiten',
        'metas' => null    
    ),  
    
    'contentinum_public_navigation' => array(
        'cache' => 'contentinum_cache_public',
        'groupkey' => 'frontend',
        'group' => 'Frontend',
        'label' => 'Navigationen',
        'metas' => null
    ),    
    
    'contentinum_attribute_pages' => array(
        'cache' => 'contentinum_cache_public',
        'groupkey' => 'frontend',
        'group' => 'Frontend',
        'label' => 'Seiten Eigenschaften',
        'metas' => null        
    ),
    
    'contentinum_page_header' => array(
        'cache' => 'contentinum_cache_public',
        'groupkey' => 'frontend',
        'group' => 'Frontend',
        'label' => 'Seiten Headerlinks',
        'metas' => null        
    ),
        
    'app_plugin_templates' => array(
        'cache' => 'contentinum_cache_struture',
        'groupkey' => 'frontend',
        'group' => 'Frontend',
        'label' => 'Templates Plugins',
        'metas' => null        
    ),
        
    'content_contribution_styles'=> array(
        'cache' => 'contentinum_cache_struture',
        'groupkey' => 'frontend',
        'group' => 'Frontend',
        'label' => 'Eigenschaften Beitrag',
        'metas' => null      
    ),
    
    'content_group_styles' => array(
        'cache' => 'contentinum_cache_struture',
        'groupkey' => 'frontend',
        'group' => 'Frontend',
        'label' => 'Eigenschaften Beitragsgruppen',
        'metas' => null      
    ),
    
    'content_widgets_styles'=> array(
        'cache' => 'contentinum_cache_struture',
        'groupkey' => 'frontend',
        'group' => 'Frontend',
        'label' => 'Seiten Content Eigenschaften',
        'metas' => null      
    ),
    
    'content_template_assign' => array(
        'cache' => 'contentinum_cache_struture',
        'groupkey' => 'frontend',
        'group' => 'Frontend',
        'label' => 'Templates Assigns',
        'metas' => null
    ),    
    
    'content_form_decorators' => array(
        'cache' => 'contentinum_cache_struture',
        'groupkey' => 'frontend',
        'group' => 'Frontend',
        'label' => 'Frontend Formular Decorators',
        'metas' => null
    ),    
    
    'opt_customer' => array(
        'cache' => 'contentinum_cache_struture',
        'groupkey' => 'frontend',
        'group' => 'Frontend',
        'label' => 'Kunden Konfiguration',
        'metas' => null        
    ),

);