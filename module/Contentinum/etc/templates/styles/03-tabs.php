<?php
return array(
    'styles' => array(
        
        'tabs6' => array(
            'viewhelper' => 'contenttabs6',
            'name' => 'Tab elements (Foundation 6)',
            'active' => 'is-active',
            'tabsnav' => array(
                'grid' => array(
                    'element' => 'ul',
                    'attr' => array(
                        'id' =>'contentinum-tab',
                        'class' => 'tabs',
                        'data-tabs' => 'contentinum-tab',
                    )
                ),
            ),
            'tabstitle' => array(
                'grid' => array(
                    'element' => 'li',
                    'attr' => array(
                        'class' => 'tabs-title',
                        'role' => 'presentation'
                    )
                )
            ),            
            'tabscontent' => array(
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'tabs-content',
                        'data-tabs-content' => 'contentinum-tab',
                    )
                ),                
            ),
            'tabspanel' => array(

                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'tabs-panel',
                        'id' => 'panel',
                    )
                )
            )
        ),        
        
        
        'tabs' => array(
            'viewhelper' => 'contenttabs',
            'name' => 'Tab elements (Foundation 5)',
            'active' => 'active',
            'header' => array(
                'row' => array(
                    'element' => 'dl',
                    'attr' => array(
                        'class' => 'tabs',
                        'data-tab' => 'data-tab',
                        'role' => 'tablist'
                    )
                ),
                'grid' => array(
                    'element' => 'dd',
                    'attr' => array(
                        'class' => 'tab-title',
                        'role' => 'presentational'
                    )
                )
            ),
            'body' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'tabs-content'
                    )
                ),
                'grid' => array(
                    'element' => 'section',
                    'attr' => array(
                        'class' => 'content',
                        'id' => 'panel',
                        'role' => 'tabpanel'
                    )
                )
            )
        ),
        'tabsvertical' => array(
            'viewhelper' => 'contenttabs',
            'name' => 'Vertical tab elements (Foundation 5)',
            'active' => 'active',
            'header' => array(
                'row' => array(
                    'element' => 'dl',
                    'attr' => array(
                        'class' => 'tabs vertical',
                        'data-tab' => 'data-tab',
                        'role' => 'tablist'
                    )
                ),
                'grid' => array(
                    'element' => 'dd',
                    'attr' => array(
                        'class' => 'tab-title',
                        'role' => 'presentational'
                    )
                )
            ),
            'body' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'tabs-content'
                    )
                ),
                'grid' => array(
                    'element' => 'section',
                    'attr' => array(
                        'class' => 'content',
                        'id' => 'panel',
                        'role' => 'tabpanel'
                    )
                )
            )
        ),
));