<?php
return array(
    'styles' => array(
        
        'textslider' => array(
            'viewhelper' => 'contentslider',
            'name' => 'Text Slider (Nur Foundation 6)',
            'orbitwrapper' => array(
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'orbit',
                        'role' => 'region',
                        'aria-label' => 'Favorite Text',
                        'data-orbit' => 'data-orbit'
                    )
                )
            ),
            'wrapper' => array(
                'grid' => array(
                    'element' => 'ul',
                    'attr' => array(
                        'class' => 'orbit-container contentinum-orbit'
                    )
                )
            ),
            'elements' => array(
                'row' => array(
                    'element' => 'li',
                    'attr' => array(
                        'class' => 'orbit-slide'
                    )
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(),
                ),
            ),
            'nextbtn' => '<button class="orbit-next"><span class="show-for-sr">N&auml;chster Beitrag</span>&#9654;&#xFE0E;</button>',
            'prevbtn' => '<button class="orbit-previous"><span class="show-for-sr">Vorheriger Beitrag</span>&#9664;&#xFE0E;</button>',
            'bulletwarpper' => array(            
                'grid' => array(
                    'element' => 'nav',
                    'attr' => array(
                        'class' => 'orbit-bullets'
                    )
                )
            ),
            'bulletrow' => array(
                'row' => array(
                    'element' => 'button',
                    'attr' => array(
                        'data-slide' => '0'
                    )
                ),
                
                'grid' => array(
                    'element' => 'span',
                    'attr' => array(
                        'class' => 'show-for-sr'
                    )
                )
            )
        )
    )
    
);