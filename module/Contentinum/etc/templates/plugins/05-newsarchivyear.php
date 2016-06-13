<?php
return array(
    'plugins' => array(
        'newsyeararchive' => array(
            'viewhelper' => 'newsyeararchive',
            'key' => 'newsarchivyear',
            'name' => 'News or Blog year archiv list',
            'format' => 'standard',
            'headline' => 'Archiv',
            'linktitle' => 'Alle Artikel des Jahres',
            'wrapper' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'callout panel news-archive-list-container',
                        'data-magellan-expedition' => 'fixed'
                    )
                ),                
                'grid' => array(
                    'element' => 'ul',
                    'attr' => array(
                        'class' => 'news-archive-list'
                    )
                )
            ),
            'elements' => array(
                'row' => array(
                    'element' => 'li',
                    'attr' => array(
                        'class' => 'news-archive-list-item'
                    )
                ),
                'grid' => array(
                    'element' => 'a',
                    'label' => 'content',
                    'attr' => array(
                        'href' => '',
                        'class' => 'news-archive-list-link'
                    )
                )
            ),
            

        ),
        
        'newsyeararchiveblock' => array(
            'viewhelper' => 'newsyeararchive',
            'key' => 'newsarchivyear',
            'name' => 'News or Blog year archiv horizontal list',
            'format' => 'block',
            'headline' => 'Archiv',
            'linktitle' => 'Alle Artikel des Jahres',            
            'wrapper' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'callout panel news-archive-block-container'
                    )
                ),
                'grid' => array(
                    'element' => 'ul',
                    'attr' => array(
                        'class' => 'news-archive-block'
                    )
                )
            ),
            'elements' => array(
                'row' => array(
                    'element' => 'li',
                    'attr' => array(
                        'class' => 'news-archive-block-item'
                    )
                ),
                'grid' => array(
                    'element' => 'a',
                    'label' => 'content',
                    'attr' => array(
                        'href' => '',
                        'class' => 'news-archive-block-link'
                    )
                )
            ),

        )
    )
    
);