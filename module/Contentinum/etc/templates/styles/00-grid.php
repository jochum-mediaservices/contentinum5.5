<?php
return array(
    'styles' => array(
        'nonestyle' => array(
            'name' => 'No style'
        ),       
        'gridlarge' => array(
            'viewhelper' => 'contentgrid',
            'name' => 'Large grid (split in equally large columns)',
            'grids' => 12,
            'auto' => true,
            'row' => 'div',
            'attribute' => array(
                'class' => 'row'
            ),
            'grid' => array(
                0 => 'div'
            ),
            'gridAttribute' => array(
                0 => array(
                    'class' => 'large-12 columns'
                )
            ),
            'content' => array()
        ),
        'grid' => array(
            'viewhelper' => 'contentgrid',
            'name' => 'Medium grid (split in equally columns)',
            'grids' => 12,
            'auto' => true,
            'row' => 'div',
            'attribute' => array(
                'class' => 'row'
            ),
            'grid' => array(
                0 => 'div'
            ),
            'gridAttribute' => array(
                0 => array(
                    'class' => 'medium-12 columns'
                )
            ),
            'content' => array()
        ),
        'grid39' => array(
            'viewhelper' => 'contentgrid',
            'name' => 'Grid (split in 3-9 medium columns)',
            'grids' => 12,
            'auto' => false,
            'row' => 'div',
            'attribute' => array(
                'class' => 'row content'
            ),
            'grid' => array(
                0 => 'div',
                1 => 'div'
            ),
            'gridAttribute' => array(
                0 => array(
                    'class' => 'medium-3 columns'
                ),
                1 => array(
                    'class' => 'medium-9 columns'
                )
            ),
            'content' => array()
        ),
        'grid93' => array(
            'viewhelper' => 'contentgrid',
            'name' => 'Grid (split in 9-3 medium columns)',
            'grids' => 12,
            'auto' => false,
            'row' => 'div',
            'attribute' => array(
                'class' => 'row content'
            ),
            'grid' => array(
                0 => 'div',
                1 => 'div'
            ),
            'gridAttribute' => array(
                0 => array(
                    'class' => 'medium-9 columns'
                ),
                1 => array(
                    'class' => 'medium-3 columns'
                )
            ),
            'content' => array()
        ),
        'grid48' => array(
            'viewhelper' => 'contentgrid',
            'name' => 'Grid (split in 4-8 medium columns)',
            'grids' => 12,
            'auto' => false,
            'row' => 'div',
            'attribute' => array(
                'class' => 'row content'
            ),
            'grid' => array(
                0 => 'div',
                1 => 'div'
            ),
            'gridAttribute' => array(
                0 => array(
                    'class' => 'medium-4 columns'
                ),
                1 => array(
                    'class' => 'medium-8 columns'
                )
            ),
            'content' => array()
        ),
        'grid84' => array(
            'viewhelper' => 'contentgrid',
            'name' => 'Grid (split in 8-4 medium columns)',
            'grids' => 12,
            'auto' => false,
            'row' => 'div',
            'attribute' => array(
                'class' => 'row content'
            ),
            'grid' => array(
                0 => 'div',
                1 => 'div'
            ),
            'gridAttribute' => array(
                0 => array(
                    'class' => 'medium-8 columns'
                ),
                1 => array(
                    'class' => 'medium-4 columns'
                )
            ),
            'content' => array()
        ),
        'grid57' => array(
            'viewhelper' => 'contentgrid',
            'name' => 'Grid (split in 5-7 medium columns)',
            'grids' => 12,
            'auto' => false,
            'row' => 'div',
            'attribute' => array(
                'class' => 'row content'
            ),
            'grid' => array(
                0 => 'div',
                1 => 'div'
            ),
            'gridAttribute' => array(
                0 => array(
                    'class' => 'medium-5 columns'
                ),
                1 => array(
                    'class' => 'medium-7 columns'
                )
            ),
            'content' => array()
        ),
        'grid75' => array(
            'viewhelper' => 'contentgrid',
            'name' => 'Grid (split in 7-5 medium columns)',
            'grids' => 12,
            'auto' => false,
            'row' => 'div',
            'attribute' => array(
                'class' => 'row content'
            ),
            'grid' => array(
                0 => 'div',
                1 => 'div'
            ),
            'gridAttribute' => array(
                0 => array(
                    'class' => 'medium-7 columns'
                ),
                1 => array(
                    'class' => 'medium-5 columns'
                )
            ),
            'content' => array()
        )
    )
);