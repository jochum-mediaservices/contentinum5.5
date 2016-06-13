<?php
return array(
    'plugins' => array(
        
        
        'filegroup' => array(
            'viewhelper' => 'filegroup',
            'key' => 'filegroup',
            'name' => 'Öffentliche Dateigruppe als Liste zum downlaod anbieten',
            
            'gtype' => 'filegroup', 
            
            'wrapper' => array(
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'callout panel'
                    )
                )
            ),            
            
            'headline' => array(
                'grid' => array(
                    'element' => 'h3',
                    'attr' => array()
                )
            ),
            
            'description' => array(
                'grid' => array(
                    'element' => 'p',
                    'attr' => array()
                )
            ),
            
            'list' => array(
                'grid' => array(
                    'element' => 'ul',
                    'attr' => array(
                        'class' => 'filegroup-list'
                    )
                )
            ),
            'listelement' => array(
                'grid' => array(
                    'element' => 'li',
                    'attr' => array(
                        'class' => 'filegroup-list-element'
                    )
                )
            ),
            'files' => array(
                
                'row' => array(
                    
                    'element' => 'p',
                    'attr' => array(),
                    
                    'content:before' => '<i class="fa fa-file-o" aria-hidden="true"> </i> '
                ),
                'grid' => array(
                    
                    'element' => 'a',
                    'attr' => array(
                        'href' => '/mcwork/files/download/',
                        'class' => 'has-tip tip-top filegroup-list-element-link',
                        'data-tooltip' => 'data-tooltip',
                        'aria-haspopup' => 'true',
                        'role' => 'tooltip'
                    )
                )
            )
        ),       

        
    )
    
);