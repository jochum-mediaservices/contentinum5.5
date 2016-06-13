<?php
return array(
    'widgets' => array(
        'navcontaingrid' => array(
            'name' => 'Topbar contain to grid',
            'row' => array(
                'element' => 'div',
                'attr' => array(
                    'class' => 'contain-to-grid'
                )
            )
        ),
        'navcontainstickygrid' => array(
            'name' => 'Topbar contain to grid + sticky (row>grid>sticky)',
            'section' => array(
                'element' => 'div',
                'attr' => array(
                    'class' => 'row'
                )
                
            ),
            'row' => array(
                'element' => 'div',
                'attr' => array(
                    'class' => 'large-12 columns'
                )
            ),
            'grid' => array(
                'element' => 'div',
                'attr' => array(
                    'class' => 'contain-to-grid sticky'
                )
            )
        )
    )
);