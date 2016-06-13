<?php
return array(
    'plugins' => array(
        'mediablockgrid' => array(
            'viewhelper' => 'mediablockgrid',
            'key' => 'mediagroup',
            'name' => 'Bildergruppe Blockgrid (1-2-3) Foundation 5',
            'gtype' => 'blockgrid',
            'wrapper' => array(
                'grid' => array(
                    'element' => 'ul',
                    'attr' => array(
                        'class' => 'small-block-grid-1 medium-block-grid-2 large-block-grid-3 mediagroup-list'
                    )
                )
            ),
            'elements' => array(
                'row' => array(
                    'element' => 'li',
                    'attr' => array(
                        'class' => 'mediagroup-list-item'
                    )
                ),
                'grid' => array(
                    'element' => 'figure',
                    'attr' => array(
                        'class' => 'mediagroup-list-item-figure'
                    )
                )
            ),
            'caption' => array(
                'grid' => array(
                    'element' => 'figcaption',
                    'attr' => array(
                        'class' => 'mediagroup-list-item-figcaption'
                    )
                )
            )
        ),
        'mediablockgrid4' => array(
            'viewhelper' => 'mediablockgrid',
            'key' => 'mediagroup',
            'name' => 'Bildergruppe Blockgrid (1-2-4) Foundation 5',
            'gtype' => 'blockgrid',
            'wrapper' => array(
                'grid' => array(
                    'element' => 'ul',
                    'attr' => array(
                        'class' => 'small-block-grid-1 medium-block-grid-2 large-block-grid-4 mediagroup-list'
                    )
                )
            ),
            'elements' => array(
                'row' => array(
                    'element' => 'li',
                    'attr' => array(
                        'class' => 'mediagroup-list-item'
                    )
                ),
                'grid' => array(
                    'element' => 'figure',
                    'attr' => array(
                        'class' => 'mediagroup-list-item-figure'
                    )
                )
            ),
            'caption' => array(
                'grid' => array(
                    'element' => 'figcaption',
                    'attr' => array(
                        'class' => 'mediagroup-list-item-figcaption'
                    )
                )
            )
        ),
        
        'mediablockgridhref' => array(
            'viewhelper' => 'mediablockgrid',
            'key' => 'mediagroup',
            'name' => 'Bildergruppe, alle Bilder verlinkt, Blockgrid (1-2-3) Foundation 5',
            'gtype' => 'blockgrid',
            'wrapper' => array(
                'grid' => array(
                    'element' => 'ul',
                    'attr' => array(
                        'class' => 'small-block-grid-1 medium-block-grid-2 large-block-grid-3 mediagroup-list'
                    )
                )
            ),
            'elements' => array(
                'row' => array(
                    'element' => 'li',
                    'attr' => array(
                        'class' => 'mediagroup-list-item'
                    )
                ),
                'grid' => array(
                    'element' => 'figure',
                    'attr' => array(
                        'class' => 'mediagroup-list-item-figure'
                    )
                )
            ),
            'caption' => array(
                'row' => array(
                    'element' => 'figcaption',
                    'attr' => array(
                        'class' => 'mediagroup-list-item-figcaption'
                    )
                ),
                'grid' => array(
                    'label' => 'content',
                    'element' => 'a',
                    'attr' => array(
                        'href' => '',
                        'class' => 'button expand'
                    )
                )
            )
        ),
        'orbitslider' => array(
            'viewhelper' => 'orbitslider',
            'key' => 'mediagroup',
            'name' => 'Slider Foundation 5',
            'gtype' => 'orbitslider',
            'wrapper' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'slideshow-wrapper'
                    )
                ),
                'grid' => array(
                    'element' => 'ul',
                    'attr' => array(
                        'class' => 'contentinum-orbit',
                        'data-orbit' => 'data-orbit',
                        'data-options' => 'animation:slide;timer_speed:2000;pause_on_hover:true;animation_speed:2000;navigation_arrows:true;bullets:false;'
                    )
                )
            ),
            'elements' => array(
                'grid' => array(
                    'element' => 'li',
                    'attr' => array()
                )
            ),
            'caption' => array(
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'orbit-caption'
                    )
                )
            )
        ),
        
        'mediablocklightgallery' => array(
            'viewhelper' => 'mediablocklightgallery',
            'key' => 'mediagroup',
            'name' => 'Bildergallery Blockgrid (1-2-3) Foundation 5',
            'gtype' => 'lightbox',
            'wrapper' => array(
                'grid' => array(
                    'element' => 'ul',
                    'attr' => array(
                        'class' => 'popup-gallery small-block-grid-1 medium-block-grid-2 large-block-grid-3'
                    )
                )
            ),
            'elements' => array(
                'row' => array(
                    'element' => 'li',
                    'attr' => array(
                        'class' => 'mediagroup-list-item'
                    )
                ),
                'grid' => array(
                    'element' => 'figure',
                    'attr' => array(
                        'class' => 'mediagroup-list-item-figure'
                    )
                )
            ),
            'caption' => array(
                'grid' => array(
                    'element' => 'figcaption',
                    'attr' => array(
                        'class' => 'mediagroup-list-item-figcaption'
                    )
                )
            ),      
            'link' => array(
                
                'grid' => array(
                    'element' => 'a',
                    'label' => 'content',
                    'attr' => array()
                )
            )
        )
    )
);