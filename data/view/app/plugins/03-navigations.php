<?php
return array(
    'plugins' => array(
        
        'topbar6mhm' => array(    
            'viewhelper' => 'topbar6',
            'key' => 'topbar6',
            'name' => 'Responsive Topbar Stadt Mühlheim',            
            'titlebar' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'title-bar',
                        'data-responsive-toggle' => 'main-menu', 
                        'data-hide-for' => 'medium'                    
                    ),
                ),             
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'title-bar-title'
                    ),
                    'content:before:outside' => '<button class="menu-icon" type="button" data-toggle> </button>',
                ),               
            ),
            
            'wrapper' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'id' => 'main-menu',
                        'class' => 'top-bar'
            
                    ),
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row column'
                
                    ),
                ),                
            ),            
            
            
            'titlewrapper' => array(
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'top-bar-left'
                    ),
                ),                
            ),
            
            'sitetitle' => array(
                'row' => array(
                    'element' => 'ul',
                    'attr' => array(
                        'class' => 'dropdown menu',
                        'data-dropdown-menu' => 'data-dropdown-menu',
                    ),
                ),
                'grid' => array(
                    'element' => 'li',
                    'attr' => array(
                        'class' => 'menu-text'
                    ),
                ),
            ),
            
            
            'ulwrapper' => array(
                'grid' => array(
                    'element' => 'nav',
                    'attr' => array(
                        'class' => 'top-bar-right'
                    )
                ),
            ),            
            
            
            'ulclass' => array(
                'grid' => array(
                    'element' => 'ul',
                    'attr' => array(
                        'class' => 'menu',
                        'data-responsive-menu' => 'drilldown medium-dropdown'
                    )
                    
                )
            ),
        ),
    )
);