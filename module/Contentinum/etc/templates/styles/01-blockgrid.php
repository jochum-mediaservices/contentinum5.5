<?php
return array(
    'styles' => array(
        'blockgrid6' => array(
            'viewhelper' => 'contentblockgrid',
            'name' => 'Blockgrid (Foundation 6)',
            'row' => array(
                'element' => 'ul',
                'attr' => array(
                    'class' => 'row small-up-1 medium-up-2 large-up-3',
                ),
            ),
            'grid' => array(
                'element' => 'li',
                'attr' => array(
                    'class' => 'column block-grid-element'
                ),
            ),
        ),
        
        'blockgrid6callout' => array(
            'viewhelper' => 'contentblockgrid',
            'name' => 'Blockgrid mit Panel (Foundation 6)',
            'row' => array(
                'element' => 'ul',
                'attr' => array(
                    'class' => 'row small-up-1 medium-up-2 large-up-3',
                ),
            ),
            'grid' => array(
                'element' => 'li',
                'attr' => array(
                    'class' => 'column block-grid-element'
                ),
            ),
            'inner' => array(
                'element' => 'div',
                'attr' => array(
                    'class' => 'callout callout-shadow'
                ),
            ),            
        ),        
        
        
        'blockgrid64' => array(
            'viewhelper' => 'contentblockgrid',
            'name' => 'Blockgrid 1-2-4 (Foundation 6)',
            'row' => array(
                'element' => 'ul',
                'attr' => array(
                    'class' => 'row small-up-1 medium-up-2 large-up-4',
                ),
            ),
            'grid' => array(
                'element' => 'li',
                'attr' => array(
                    'class' => 'column block-grid-element'
                ),
            ),
        ),        
        
        'blockgrid64callout' => array(
            'viewhelper' => 'contentblockgrid',
            'name' => 'Blockgrid 1-2-4 mit Panel (Foundation 6)',
            'row' => array(
                'element' => 'ul',
                'attr' => array(
                    'class' => 'row small-up-1 medium-up-2 large-up-4',
                ),
            ),
            'grid' => array(
                'element' => 'li',
                'attr' => array(
                    'class' => 'column block-grid-element'
                ),
            ),
            'inner' => array(
                'element' => 'div',
                'attr' => array(
                    'class' => 'callout callout-shadow'
                ),
            ),
        ),        
        
        
        'blockgrid' => array(
              'viewhelper' => 'contentblockgrid',
              'name' => 'Blockgrid (Foundation 5)',
              'row' => array(
                    'element' => 'ul',
                    'attr' => array(
                        'class' => 'small-block-grid-1 medium-block-grid-2 large-block-grid-3',
                    ),
              ),
              'grid' => array(
                   'element' => 'li',
                  'attr' => array(
                       'class' => 'block-grid-element'
                  ),
              ),
        ),
        'blockgrid4' => array(
            'viewhelper' => 'contentblockgrid',
            'name' => 'Blockgrid 1-2-4 (Foundation 5)',
            'row' => array(
                'element' => 'ul',
                'attr' => array(
                    'class' => 'small-block-grid-1 medium-block-grid-2 large-block-grid-4',
                ),
            ),
            'grid' => array(
                'element' => 'li',
                'attr' => array(
                    'class' => 'block-grid-element'
                ),
            ),
        ),        
));