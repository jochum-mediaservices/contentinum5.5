<?php
return array(
    'widgets' => array(
        'footerlarge' => array(
            'name' => 'Footer large-12 (row>column)',
            'row' => array(
                'element' => 'footer',
                'attr' => array(
                    'id' => 'footer',
                    'class' => 'row',
                    'role' => 'contentinfo'
                )
            ),
            'grid' => array(
                'element' => 'div',
                'attr' => array(
                    'class' => 'large-12 columns'
                )
            )
        ),
        'footer' => array(
            'name' => 'Footer medium-12 (row>column)',
            'row' => array(
                'element' => 'footer',
                'attr' => array(
                    'id' => 'footer',
                    'class' => 'row',
                    'role' => 'contentinfo'
                )
            ),
            'grid' => array(
                'element' => 'div',
                'attr' => array(
                    'class' => 'medium-12 columns'
                )
            )
        ),
        'footergridlarge' => array(
            'name' => 'Footer large-12 (footer>row>column)',
            'section' => array(
                'element' => 'footer',
                'attr' => array(
                    'id' => 'footer',
                    'role' => 'contentinfo'
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
        'footergrid' => array(
            'name' => 'Footer medium-12 (footer>row>column)',
            'section' => array(
                'element' => 'footer',
                'attr' => array(
                    'id' => 'footer',
                    'role' => 'contentinfo'
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