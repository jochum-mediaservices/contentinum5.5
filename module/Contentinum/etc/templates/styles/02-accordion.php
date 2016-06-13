<?php
return array(
    'styles' => array(
        'accordion6' => array(
            'viewhelper' => 'contentaccordion',
            'name' => 'Accordion elements (Foundation 6)',
            'active' => 'is-active',
            'wrapper' => array(
                'grid' => array(
                    'element' => 'ul',
                    'attr' => array(
                        'class' => 'accordion',
                        'data-accordion' => 'data-accordion',
                        'data-allow-all-closed' => 'true'
        
                    )
                )
            ),
            'body' => array(
                'row' => array(
                    'element' => 'li',
                    'attr' => array(
                        'class' => 'accordion-item',
                        'data-accordion-item' => 'data-accordion-item'
        
                    )
                ),
                'grid' => array(
                    'element' => 'a',
                    'label' => 'content',
                    'attr' => array(
                        'class' => 'accordion-title',
                        'href' => '#'
                    )
                )
            ),
            'content' => array(
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'accordion-content',
                        'data-tab-content' => 'data-tab-content',
                    )
                )
            )
        ),        
        'accordionallclose' => array(
            'viewhelper' => 'contentaccordion',
            'name' => 'Accordion (Alle geschlossen, nur Foundation 5)',
            'active' => false,
            'wrapper' => array(
                'grid' => array(
                    'element' => 'dl',
                    'attr' => array(
                        'class' => 'accordion',
                        'data-accordion' => 'data-accordion',
                        'role' => 'tablist'
                    )
                ),
        
            ),
        
            'body' => array(
                'row' => array(
                    'element' => 'dd',
                    'attr' => array(
                        'class' => 'accordion-navigation',
                        'role' => 'presentational',
                        'aria-hidden' => 'true',
                    )
                ),
                'grid' => array(
                    'element' => 'a',
                    'label' => 'content',
                    'attr' => array(
                        'controls' => '#',
                        'aria-selected' => 'false',
                        'tabindex' => '0',
                        'role' => 'tab',
                        'href' => '#',
                    )
                ),
        
            ),
        
            'content' => array(
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'id' => '#',
                        'class' => 'content',
                    )
                ),
            ),
        
        ),       
        
        'accordion' => array(
            'viewhelper' => 'contentaccordion',
            'name' => 'Accordion elements (Foundation 5)',
            'active' => 'active',
            'wrapper' => array(
                'grid' => array(
                    'element' => 'dl',
                    'attr' => array(
                        'class' => 'accordion',
                        'data-accordion' => 'data-accordion',
                        'role' => 'tablist'
                    )
                )
            ),
            'body' => array(
                'row' => array(
                    'element' => 'dd',
                    'attr' => array(
                        'class' => 'accordion-navigation',
                        'role' => 'presentational',
                        'aria-hidden' => 'true'
                    )
                ),
                'grid' => array(
                    'element' => 'a',
                    'label' => 'content',
                    'attr' => array(
                        'controls' => '#',
                        'aria-selected' => 'false',
                        'tabindex' => '0',
                        'role' => 'tab',
                        'href' => '#'
                    )
                )
            ),
            'content' => array(
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'id' => '#',
                        'class' => 'content'
                    )
                )
            )
        )
    )
);