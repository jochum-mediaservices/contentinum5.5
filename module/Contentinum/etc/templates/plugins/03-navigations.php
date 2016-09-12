<?php
return array(
    'plugins' => array( 
        'topbar6' => array(    
            'viewhelper' => 'topbar6',
            'key' => 'topbar6',
            'name' => 'Responsive Topbar Foundation 6',            
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
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'id' => 'main-menu',
                        'class' => 'top-bar'
            
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
        
        'topbar' => array(
            'viewhelper' => 'topbar',
            'key' => 'topbar',
            'name' => 'Topbar right Foundation Framework',
            'brand' => '<h2><a href="#">%s1</a></h2>',
            'mobilemenue' => '<a href="#"><span>Menue</span></a>',
            'direction' => 'right',
            'row' => array(
                'element' => 'nav',
                'attr' => array(
                    'class' => 'top-bar',
                    'data-topbar' => 'data-topbar'
                )
            ),
            'grid' => array(
                'element' => 'div',
                'attr' => array(
                    'class' => 'top-bar-section'
                )
            ),
            'list' => array(
                'element' => 'ul',
                'attr' => array(
                    'class' => 'title-area'
                )
            ),
            'listelements' => array(
                '0' => array(
                    'element' => 'li',
                    'attr' => array(
                        'class' => 'name'
                    )
                ),
                '1' => array(
                    'element' => 'li',
                    'attr' => array(
                        'class' => 'toggle-topbar menu-icon'
                    )
                )
            )
        ),
        'topbarleft' => array(
            'viewhelper' => 'topbar',
            'key' => 'topbar',
            'name' => 'Topbar left Foundation Framework',
            'brand' => '<h1><a href="#">%s1</a></h1>',
            'mobilemenue' => '<a href="#"><span>Menue</span></a>',
            'direction' => 'left',
            'row' => array(
                'element' => 'nav',
                'attr' => array(
                    'class' => 'top-bar',
                    'data-topbar' => 'data-topbar'
                )
            ),
            'grid' => array(
                'element' => 'div',
                'attr' => array(
                    'class' => 'top-bar-section'
                )
            ),
            'list' => array(
                'element' => 'ul',
                'attr' => array(
                    'class' => 'title-area'
                )
            ),
            'listelements' => array(
                '0' => array(
                    'element' => 'li',
                    'attr' => array(
                        'class' => 'name'
                    )
                ),
                '1' => array(
                    'element' => 'li',
                    'attr' => array(
                        'class' => 'toggle-topbar menu-icon'
                    )
                )
            )
        ),
        
        'navigation6' => array(
            'viewhelper' => 'navigation',
            'key' => 'navigation',
            'name' => 'Basic Menu (Foundation 6)',
            'ulclass' => 'menu',
            'list' => array(
                'attr' => array(
                    'class' => 'menu'
                )
            ),
            'wrapper' => array(
                'grid' => array(
                    'element' => 'nav',
                    'attr' => array(
                        'class' => 'navigation'
                    )
                )
            )
        ),  
        
        'navigation6right' => array(
            'viewhelper' => 'navigation',
            'key' => 'navigation',
            'name' => 'Basic Menu Right Alignment (Foundation 6)',
            'ulclass' => 'menu align-right',
            'list' => array(
                'attr' => array(
                    'class' => 'menu align-right'
                )
            ),
            'wrapper' => array(
                'grid' => array(
                    'element' => 'nav',
                    'attr' => array(
                        'class' => 'navigation-right'
                    )
                )
            )
        ),  
        
        'navigation6centerresponse' => array(
            'viewhelper' => 'navigation',
            'key' => 'navigation',
            'name' => 'Basic Menu Center Alignment (Foundation 6)',
            'ulclass' => 'medium-horizontal menu',
            'list' => array(
                'attr' => array(
                    'class' => 'medium-horizontal menu'
                )
            ),
            'wrapper' => array(
                'grid' => array(
                    'element' => 'nav',
                    'attr' => array(
                        'class' => 'menu-centered navigation'
                    )
                )
            )
        ),        
        
        'navigation6center' => array(
            'viewhelper' => 'navigation',
            'key' => 'navigation',
            'name' => 'Basic Menu Center Alignment (Foundation 6)',
            'ulclass' => 'menu',
            'list' => array(
                'attr' => array(
                    'class' => 'menu'
                )
            ),
            'wrapper' => array(
                'grid' => array(
                    'element' => 'nav',
                    'attr' => array(
                        'class' => 'menu-centered navigation'
                    )
                )
            )
        ), 
        
        'navigation6vertical' => array(
            'viewhelper' => 'navigation',
            'key' => 'navigation',
            'name' => 'Basic Menu Vertical Alignment (Foundation 6)',
            'ulclass' => 'menu vertical',
            'list' => array(
                'attr' => array(
                    'class' => 'menu vertical'
                )
            ),
            'wrapper' => array(
                'grid' => array(
                    'element' => 'nav',
                    'attr' => array(
                        'class' => 'navigation'
                    )
                )
            )
        ),        
        
        'navigation' => array(
            'viewhelper' => 'navigation',
            'key' => 'navigation',
            'name' => 'Navigation Standard list',
            'ulclass' => 'navigation-list',
            'list' => array(
                'attr' => array(
                    'class' => 'navigation-list'
                )
            ),
            'wrapper' => array(
                'grid' => array(
                    'element' => 'nav',
                    'attr' => array(
                        'class' => 'navigation'
                    )
                )
            )
        ),
        'navigationinline' => array(
            'viewhelper' => 'navigation',
            'key' => 'navigation',
            'name' => 'Navigation Standard Inlinelist',
            'ulclass' => 'navigation-list inline-list',
            'list' => array(
                'attr' => array(
                    'class' => 'navigation-list-inline'
                )
            ),
            'wrapper' => array(
                'grid' => array(
                    'element' => 'nav',
                    'attr' => array(
                        'class' => 'navigation-list'
                    )
                )
            )
        ),
        
        'navigationinlineheader' => array(
            'key' => 'navigation',
            'name' => 'Navigation Header Inlinelist',
            'ulclass' => 'header-list inline-list',
            'list' => array(
                'attr' => array(
                    'class' => 'navigation-list-inline-header'
                )
            ),
            'wrapper' => array(
                'grid' => array(
                    'element' => 'nav',
                    'attr' => array(
                        'class' => 'navigation-list-header'
                    )
                )
            )
        ),
        
        'navigationinlineheaderr' => array(
            'key' => 'navigation',
            'name' => 'Navigation Header Inlinelist right',
            'ulclass' => 'header-list inline-list right',
            'list' => array(
                'attr' => array(
                    'class' => 'navigation-list-inline-header'
                )
            ),
            'wrapper' => array(
                'grid' => array(
                    'element' => 'nav',
                    'attr' => array(
                        'class' => 'navigation-list-header'
                    )
                )
            )
        ),
        
        'navigationinlinefooter' => array(
            'key' => 'navigation',
            'name' => 'Navigation Footer Inlinelist',
            'ulclass' => 'footer-list inline-list',
            'list' => array(
                'attr' => array(
                    'class' => 'navigation-list-inline-footer'
                )
            ),
            'wrapper' => array(
                'grid' => array(
                    'element' => 'nav',
                    'attr' => array(
                        'class' => 'navigation-list-footer'
                    )
                )
            )
        ),
        
        'multilevel' => array(
            'viewhelper' => 'multilevel',
            'key' => 'multilevel',
            'name' => 'Multilevel Navigation',
            
            'ulclass' => 'sidemenu-list',
            'menuattribute' => array(
                'subUlClass' => 'navigation-list-dropdown',
                'listHasDropdown' => 'navigation-list-has-dropdown',
                'linkClassDefault' => 'contentinum-menu-link',
                'linkClassDropdown' => 'toogleSubMenu'
            ),
            'wrapper' => array(
                'grid' => array(
                    'element' => 'nav',
                    'attr' => array(
                        'role' => 'navigation'
                    )
                )
            )
        ),
        'mmenu' => array(
            'key' => 'mmmenue',
            'name' => 'Navigation seitlich (mmenu)',
            'list' => array(
                'attr' => array(
                    'class' => 'mmenu-list'
                )
            ),
            'row' => array()
        ),
        
        'mmenuplus' => array(
            'key' => 'mmplus',
            'name' => 'Navigation seitlich (mmenu)',
            'list' => array(
                'attr' => array(
                    'class' => 'sidemenu-list'
                )
            ),
            'row' => array()
        )
    )
)
;