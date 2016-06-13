<?php
return array(
    'plugins' => array(
        'blogcategory' => array(
            'viewhelper' => 'blogcategory',
            'key' => 'blogcategory',
            'name' => 'News or Blog category list',
            'format' => 'standard',
            'headline' => 'Kategorien',
            'linktitle' => 'Alle Artikel der Kategorie',            
            'wrapper' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'callout panel news-category-list-container'
                    )
                ),                
                'grid' => array(
                    'element' => 'ul',
                    'attr' => array(
                        'class' => 'news-category-list plugincategory'
                    )
                )
            ),
            'elements' => array(
                'row' => array(
                    'element' => 'li',
                    'attr' => array(
                        'class' => 'news-category-list-item'
                    )
                ),
                'grid' => array(
                    'element' => 'a',
                    'label' => 'content',
                    'attr' => array(
                        'href' => '',
                        'class' => 'news-category-list-link'
                    )
                )
            ),
            

          
        ),
        
        'blogcategoryblock' => array(
            'viewhelper' => 'blogcategory',
            'key' => 'blogcategory',
            'name' => 'News or Blog category horizontel list',
            'format' => 'block',
            'headline' => 'Kategorien',
            'linktitle' => 'Alle Artikel der Kategorie',            
            'wrapper' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'news-category-block-container'
                    )
                ),
                'grid' => array(
                    'element' => 'ul',
                    'attr' => array(
                        'class' => 'news-category-block pluginblogcategory'
                    )
                )
            ),
            'elements' => array(
                'row' => array(
                    'element' => 'li',
                    'attr' => array(
                        'class' => 'news-category-block-item'
                    )
                ),
                'grid' => array(
                    'element' => 'a',
                    'label' => 'content',
                    'attr' => array(
                        'href' => '',
                        'class' => 'news-category-block-link'
                    )
                )
            ),
            

        )
    )
    
);