<?php
return array(
    'widgets' => array(
        'none' => array(
            'name' => 'Display content',
        ),        
        '_default' => array(
            'row' => array(
                'element' => 'div',
                'attr' => array(
                    'class' => 'row'
                )
            ),
            'grid' => array(
                'element' => 'div',
                'attr' => array(
                    'class' => 'medium-12 columns'
                )
            )
        ),        
        'contentlarge' => array(
            'name' => 'Standard large-12 (row>column)',
            'row' => array(
                'element' => 'div',
                'attr' => array(
                    'class' => 'row'
                )
            ),
            'grid' => array(
                'element' => 'div',
                'attr' => array(
                    'class' => 'large-12 columns'
                )
            )
        ),
        'content' => array(
            'name' => 'Standard medium-12 (row>column)',
            'row' => array(
                'element' => 'div',
                'attr' => array(
                    'class' => 'row'
                )
            ),
            'grid' => array(
                'element' => 'div',
                'attr' => array(
                    'class' => 'medium-12 columns'
                )
            )
        ), 
        'contentgridlarge' => array(
            'name' => 'Standard large-12 (div>row>column)',
            'section' => array(
                'element' => 'div',
                'attr' => array(
                    'class' => 'content-section',
                )
            ),
            'row' => array(
                'element' => 'div',
                'attr' => array(
                    'class' => 'row',
        
                )
            ),
            'grid' => array(
                'element' => 'div',
                'attr' => array(
                    'class' => 'large-12 columns'
                )
            )
        ),
        'contentgrid' => array(
            'name' => 'Standard medium-12 (div>row>column)',
            'section' => array(
                'element' => 'div',
                'attr' => array(
                    'class' => 'content-section',
                )
            ),
            'row' => array(
                'element' => 'div',
                'attr' => array(
                    'class' => 'row',
        
                )
            ),
            'grid' => array(
                'element' => 'div',
                'attr' => array(
                    'class' => 'medium-12 columns'
                )
            )
        ),        
    )
);