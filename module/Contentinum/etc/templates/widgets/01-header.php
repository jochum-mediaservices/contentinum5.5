<?php
return array(
    'widgets' => array(
        'headerlarge' => array(
            'name' => 'Header large-12 (row>column)',
            'row' => array(
                'element' => 'header',
                'attr' => array(
                    'id' => 'header',
                    'class' => 'row',
                    'role' => 'banner'
                )
            ),
            'grid' => array(
                'element' => 'div',
                'attr' => array(
                    'class' => 'large-12 columns'
                )
            )
        ),
        'header' => array(
            'name' => 'Header medium-12 (row>column)',
            'row' => array(
                'element' => 'header',
                'attr' => array(
                    'id' => 'header',
                    'class' => 'row',
                    'role' => 'banner'
                )
            ),
            'grid' => array(
                'element' => 'div',
                'attr' => array(
                    'class' => 'medium-12 columns'
                )
            )
        ),
        'headergridlarge' => array(
            'name' => 'Header large-12 (header>row>column)',
            'section' => array(
                'element' => 'header',
                'attr' => array(
                    'id' => 'header',
                    'role' => 'banner'
                )
            ),
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
        'headergrid' => array(
            'name' => 'Header medium-12 (header>row>column)',
            'section' => array(
                'element' => 'header',
                'attr' => array(
                    'id' => 'header',
                    'role' => 'banner'
                )
            ),
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
        )
    )
);