<?php
return array(
    'plugins' => array(
        'blogtags' => array(
            'viewhelper' => 'blogtags',
            'key' => 'blogtags',
            'name' => 'News or Blog Tag cloud',
            'format' => 'standard',
            'headline' => false,
            'linktitle' => 'Alle Artikel mit dem Tag',            
            'wrapper' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'callout panel news-tag-container'
                    )
                ),                
                'grid' => array(
                    'element' => 'ul',
                    'attr' => array(
                        'class' => 'news-tag-cloud plugintag'
                    )
                )
            ),
            'elements' => array(
                'row' => array(
                    'element' => 'li',
                    'attr' => array(
                        'class' => 'news-tag-cloud-item'
                    )
                ),
                'grid' => array(
                    'element' => 'a',
                    'label' => 'content',
                    'attr' => array(
                        'href' => '',
                        'class' => 'button tiny news-tag-cloud-link'
                    )
                )
            ),
            

          
        ),
        
    )
    
);