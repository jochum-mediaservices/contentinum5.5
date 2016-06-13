<?php
return array(
    'plugins' => array(
        'newsarchiv' => array(
            'viewhelper' => 'newsarchiv',
            'key' => 'newsarchiv',
            'name' => 'News or Blog archiv list',
            'format' => 'standard',
            'headline' => 'Archiv',
            'linktitle' => 'Alle Artikel des Monats',
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
                        'class' => 'news-archive-list pluginarchive'
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
                        'class' => 'element-toogle',
                        'data-ident' => '',
                    )
                )
            ),
            
            'subwrapper' => array(
                'grid' => array(
                    'element' => 'ul',
                    'attr' => array(
                        'class' => 'news-archive-sublist'
                    )
                )
            ),
            'subelements' => array(
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
                        'class' => 'news-archive-sublist-link'
                    )
                )
            )
        ),
        'newsarchivblock' => array(
            'viewhelper' => 'newsarchiv',
            'key' => 'newsarchiv',
            'name' => 'News or Blog archiv horizontal list',
            'format' => 'block',
            'headline' => 'Archiv',
            'linktitle' => 'Alle Artikel des Monats',            
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
                        'class' => 'news-archive-block pluginarchive'
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
            
            'hassub' => array(
                'attr' => array(
                    'class' => 'element-toogle',
                    'data-ident' => ''
                )
            ),
            
            'sublistswrapper' => array(
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'news-archive-subcontainer'
                    )
                )
            ),
            
            'subwrapper' => array(
                'grid' => array(
                    'element' => 'ul',
                    'attr' => array(
                        'class' => 'news-archive-subblock'
                    )
                )
            ),
            'subelements' => array(
                'row' => array(
                    'element' => 'li',
                    'attr' => array(
                        'class' => 'news-archive-subblock-item'
                    )
                ),
                'grid' => array(
                    'element' => 'a',
                    'label' => 'content',
                    'attr' => array(
                        'href' => '',
                        'class' => 'news-archive-subblock-link'
                    )
                )
            )
        )
    )
);