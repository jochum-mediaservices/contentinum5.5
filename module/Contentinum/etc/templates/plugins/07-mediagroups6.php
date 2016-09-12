<?php
return array(
    'plugins' => array(
        'mediablockgridf6' => array(
            'viewhelper' => 'mediablockgrid',
            'key' => 'mediagroup',
            'name' => 'Bildergruppe Blockgrid (1-2-3) Foundation 6',
            'gtype' => 'blockgrid',
            'wrapper' => array(
                'grid' => array(
                    'element' => 'ul',
                    'attr' => array(
                        'class' => 'row small-up-1 medium-up-2 large-up-3 mediagroup-list'
                    )
                )
            ),
            'elements' => array(
                'row' => array(
                    'element' => 'li',
                    'attr' => array(
                        'class' => 'column mediagroup-list-item'
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
        'mediablockgrid4f6' => array(
            'viewhelper' => 'mediablockgrid',
            'key' => 'mediagroup',
            'name' => 'Bildergruppe Blockgrid (1-2-4) Foundation 6',
            'gtype' => 'blockgrid',
            'wrapper' => array(
                'grid' => array(
                    'element' => 'ul',
                    'attr' => array(
                        'class' => 'row small-up-1 medium-up-2 large-up-4 mediagroup-list'
                    )
                )
            ),
            'elements' => array(
                'row' => array(
                    'element' => 'li',
                    'attr' => array(
                        'class' => 'column mediagroup-list-item'
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
        'mediablockgridhreff6' => array(
            'viewhelper' => 'mediablockgrid',
            'key' => 'mediagroup',
            'name' => 'Bildergruppe, alle Bilder verlinkt, Blockgrid (1-2-3) Foundation 6',
            'gtype' => 'blockgrid',
            'wrapper' => array(
                'grid' => array(
                    'element' => 'ul',
                    'attr' => array(
                        'class' => 'row small-up-1 medium-up-2 large-up-3 mediagroup-list'
                    )
                )
            ),
            'elements' => array(
                'row' => array(
                    'element' => 'li',
                    'attr' => array(
                        'class' => 'column mediagroup-list-item'
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
                        'class' => 'button expanded'
                    )
                )
            )
        ),
        
        'orbitslider6' => array(
            'viewhelper' => 'orbitslider',
            'key' => 'mediagroup',
            'name' => 'Slider Foundation 6',
            'gtype' => 'orbitslider6',
            'orbitwrapper' => array(
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'orbit',
                        'role' => 'region',
                        'aria-label' => 'Favorite Space Pictures',
                        'data-orbit' => 'data-orbit',
                    )
                ),
            ),            
            'wrapper' => array(
                'grid' => array(
                    'element' => 'ul',
                    'attr' => array(
                        'class' => 'orbit-container contentinum-orbit',
                    )
                )
            ),
            'elements' => array(
                'row' => array(
                    'element' => 'li',
                    'attr' => array(
                        'class' => 'orbit-slide',
                    )
                ),
                'grid' => array(
                    'element' => 'figure',
                    'attr' => array(
                        'class' => 'orbit-figure',
                    )
                )                
            ),
            'caption' => array(
                'grid' => array(
                    'element' => 'figcaption',
                    'attr' => array(
                        'class' => 'orbit-caption'
                    )
                )
            ),
            
            'imgclass' => 'class="orbit-image"',
            
            'nextbtn' => '<button class="orbit-next"><span class="show-for-sr">N&auml;chstes Bild</span>&#9654;&#xFE0E;</button>',            
            
            'prevbtn' => '<button class="orbit-previous"><span class="show-for-sr">Vorheriges Bild</span>&#9664;&#xFE0E;</button>',
            'bulletwarpper' => array(

                'grid' => array(
                    'element' => 'nav',
                    'attr' => array(
                        'class' => 'orbit-bullets'
                    ),
                ),                
                
            ),
            'bulletrow' => array(
                'row' => array(
                    'element' => 'button',
                    'attr' => array(
                        'data-slide' => '0',
                    ),
                ),
                
                'grid' => array(
                    'element' => 'span',
                    'attr' => array(
                        'class' => 'show-for-sr'
                    ),
                ),                
            ),
        ),        
        
        
        
        'mediablocklightgalleryf6' => array(
            'viewhelper' => 'mediablocklightgallery',
            'key' => 'mediagroup',
            'name' => 'Bildergallery Blockgrid (1-2-3) Foundation 6',
            'gtype' => 'lightbox',
            'wrapper' => array(
                'grid' => array(
                    'element' => 'ul',
                    'attr' => array(
                        'class' => 'popup-gallery row small-up-1 medium-up-2 large-up-3'
                    )
                )
            ),
            'elements' => array(
                'row' => array(
                    'element' => 'li',
                    'attr' => array(
                        'class' => 'column mediagroup-list-item'
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