<?php
return array(
    'plugins' => array(
        'eventnavigation' => array(
            
            'viewhelper' => 'eventnavigation',
            'key' => 'eventnavigation',
            'name' => 'Monats Navigation Termine (Button Gruppe)',            
            'schemakey' => 'buttongroup',
            'backlink' => '<i class="fa fa-angle-double-left" aria-hidden="true"> </i>',
            'nextlink' => '<i class="fa fa-angle-double-right" aria-hidden="true"> </i>',          
            
            'wrapper' => array(
                'row' => array(
                    'element' => 'nav',
                    'attr' => array(
                        'class' => 'event-navigation-buttons'
                    )
                ),
                'grid' => array(
                    'element' => 'ul',
                    'attr' => array(
                        'class' => 'event-navigation-list button-group'
                    )
                ),               
            ), 
            
            'elements' => array(
                'row' => array(
                    'element' => 'li',
                    'attr' => array(
                        'class' => 'list-element'
                    )
                ),
                'grid' => array(
                    'element' => 'a',
                    'label' => 'content',
                    'attr' => array(
                        'href' => '#',
                        'class' => 'button tiny list-element-link',
                    )
                )
            ),
            
        ),
        'eventnavigationlist' => array(
        
            'viewhelper' => 'eventnavigation',
            'key' => 'eventnavigation',
            'name' => 'Monats Navigation Termine Inline Liste',
            'schemakey' => 'inlinelist',
           
            'backlink' => '<i class="fa fa-angle-double-left" aria-hidden="true"> </i>',
            'nextlink' => '<i class="fa fa-angle-double-right" aria-hidden="true"> </i>',            
            
            'wrapper' => array(
                'row' => array(
                    'element' => 'nav',
                    'attr' => array(
                        'class' => 'event-navigation'
                    )
                ),
                'grid' => array(
                    'element' => 'ul',
                    'attr' => array(
                        'class' => 'event-navigation-list inline-list'
                    )
                ),
            ),
        
            'elements' => array(
                'row' => array(
                    'element' => 'li',
                    'attr' => array(
                        'class' => 'list-element'
                    )
                ),
                'grid' => array(
                    'element' => 'a',
                    'label' => 'content',
                    'attr' => array(
                        'href' => '#',
                        'class' => 'list-element-link',
                    )
                )
            ),
        
        ),    
        'eventnavigationtbar' => array(
            'viewhelper' => 'eventnavigation',
            'key' => 'eventnavigation',
            'name' => 'Monats Navigation Termine Topbar',
            'schemakey' => 'topbar', 
            
            'backlink' => '<i class="fa fa-angle-double-left" aria-hidden="true"> </i>',
            'nextlink' => '<i class="fa fa-angle-double-right" aria-hidden="true"> </i>', 
            
            'topbar' => array(
                'grid' => array(
                    'element' => 'nav',
                    'attr' => array(
                        'class' => 'top-bar',
                        'data-topbar' => 'data-topbar',
                    ),
                    'content:before' => '<ul class="title-area"><li class="name"></li><li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li></ul>',
                ),
                
            ),

            'wrapper' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'top-bar-section'
                    )
                ),
                'grid' => array(
                    'element' => 'ul',
                    'attr' => array(
                        'class' => 'left'
                    )
                ),
            ),            
            
            'elements' => array(
                'row' => array(
                    'element' => 'li',
                    'attr' => array()
                ),
                'grid' => array(
                    'element' => 'a',
                    'label' => 'content',
                    'attr' => array(
                        'href' => '#',
                        'class' => 'list-element-link',
                    )
                )
            ),            
        ),
        
        
        'eventrow3actual' => array(
            'viewhelper' => 'events',
            'key' => 'events',
            'name' => 'Aktuelle Termine als 3er Blockgrid',
             
            'schemakey' => 'calenderrow',
        
        
            'toolbar' => array(
                'row' => array(
                    'element' => 'ul',
                    'attr' => array(
                        'class' => 'inline-list right'
                    )
                ),
                'grid' => array(
                    'element' => 'li',
                    'attr' => array(
                        'class' => 'toolbar-list-element'
                    ),
                ),
                'elements' => array(
                    'getevent' => array('icon' => '<i class="fa fa-download" aria-hidden="true"> </i>', 'href' => '#', 'attr' => array( 'class' => 'getics',  'title' => 'Diesen Termin im Kalender speichern')),
                ),
            ),
        
            'wrapper' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'id' => 'eventapp',
                        'class' => 'events'
                    ),
                ),
                'grid' => array(
                    'element' => 'ul',
                    'attr' => array(
                        'class' => 'small-block-grid-1 medium-block-grid-2 large-block-grid-3',
                    ),
                )
            ),
        
            'schema' => array(
                'row' => array(
                    'element' => 'li',
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'event-wrapper callout callout-shadow panel',
                        'itemtype' => 'http://schema.org/Event',
                        'itemscope' => 'itemscope',
                    )
                )
            ),
            'summary' => array(
                'row' => array(
                    'element' => 'h3',
                    'attr' => array(
                        'class' => 'event-summary'
                    )
                ),
                'grid' => array(
                     
                    'element' => 'span',
                    'attr' => array(
                        'class' => 'summary',
                        'itemprop' => 'name',
                    ),
                ),
            ),
            'imagesSource' => array(
                'grid' => array(
        
                    'element' => 'figure',
                    'attr' => array(
                        'class' => 'event-images right',
                        'itemprop' => 'image'
                    )
                )
            ),
            'organizer' => array(
                'row' => array(
                    'element' => 'h5',
                    'attr' => array(
                        'class' => 'event-location-organizer'
                    )
                ),
                'grid' => array(
                     
                    'element' => 'span',
                    'attr' => array(
                        'class' => 'attendee',
                        'itemprop' => 'attendee',
                    ),
                ),
            ),
            'dateStart' => array(
                'row' => array(
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'event-date',
                    )
                ),
                'grid' => array(
                     
                    'element' => 'time',
                    'attr' => array(
                        'class' => 'event-time'
                    ),
                    'content:after' => ' Uhr'
                ),
            ),
        
        
        
            'organisation' => array(
                'grid' => array(
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'event-location-name',
                        'itemprop' => 'name',
                    )
                ),
        
            ),
        
            'location' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'location',
                        'itemtype' => 'http://schema.org/Place',
                        'itemscope' => 'itemscope',
                        'itemprop' => 'location',
                    )
                ),
                'grid' => array(
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'event-location-address',
                        'itemtype' => 'http://schema.org/PostalAddress',
                        'itemscope' => 'itemscope',
                        'itemprop' => 'address',
                    )
                ),
                'grids' => array(
                    'accountStreet' => array(
                        'grid' => array(
                            'element' => 'span',
                            'attr' => array(
                                'itemprop' => 'streetAddress',
                            ),
                            'content:after' => '<br />'
                        )
                    ),
        
                    'accountZipcode' => array(
                        'grid' => array(
                            'element' => 'span',
                            'attr' => array(
                                'itemprop' => 'postalCode',
                            ),
                        )
                    ),
        
                    'accountCity' => array(
                        'grid' => array(
                            'element' => 'span',
                            'attr' => array(
                                'itemprop' => 'addressLocality',
                            ),
                        )
                    ),
        
                ),
        
            ),
        
        ),        
        
        
        
        'eventrow' => array(
            'viewhelper' => 'events',
            'key' => 'events',
            'name' => 'Termine als Blockgrid',
             
            'schemakey' => 'calenderrow',
        
        
            'toolbar' => array(
                'row' => array(
                    'element' => 'ul',
                    'attr' => array(
                        'class' => 'inline-list right'
                    )
                ),
                'grid' => array(
                    'element' => 'li',
                    'attr' => array(
                        'class' => 'toolbar-list-element'
                    ),
                ),
                'elements' => array(
                    'getevent' => array('icon' => '<i class="fa fa-download" aria-hidden="true"> </i>', 'href' => '#', 'attr' => array( 'class' => 'getics',  'title' => 'Diesen Termin im Kalender speichern')),
                ),
            ),
        
            'wrapper' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'id' => 'eventapp',
                        'class' => 'events'
                    ),
                ),
                'grid' => array(
                    'element' => 'ul',
                    'attr' => array(
                        'class' => 'small-block-grid-1 medium-block-grid-2 large-block-grid-4',
                    ),
                )                
            ),
        
            'schema' => array(
                'row' => array(
                    'element' => 'li',
                ),
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'event-wrapper callout callout-shadow panel',
                        'itemtype' => 'http://schema.org/Event',
                        'itemscope' => 'itemscope',
                    )
                )
            ),
            'summary' => array(
                'row' => array(
                    'element' => 'h3',
                    'attr' => array(
                        'class' => 'event-summary'
                    )
                ),
                'grid' => array(
                     
                    'element' => 'span',
                    'attr' => array(
                        'class' => 'summary',
                        'itemprop' => 'name',
                    ),
                ),
            ),
            'imagesSource' => array(
                'grid' => array(
        
                    'element' => 'figure',
                    'attr' => array(
                        'class' => 'event-images right',
                        'itemprop' => 'image'
                    )
                )
            ),
            'organizer' => array(
                'row' => array(
                    'element' => 'h5',
                    'attr' => array(
                        'class' => 'event-location-organizer'
                    )
                ),
                'grid' => array(
                     
                    'element' => 'span',
                    'attr' => array(
                        'class' => 'attendee',
                        'itemprop' => 'attendee',
                    ),
                ),
            ),
            'dateStart' => array(
                'row' => array(
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'event-date',
                    )
                ),
                'grid' => array(
                     
                    'element' => 'time',
                    'attr' => array(
                        'class' => 'event-time'
                    ),
                    'content:after' => ' Uhr'
                ),
            ),
        
        
            'descriptionhead' => array(
                'row' => array(
                    'element' => 'h4',
                    'attr' => array(
                        'class' => 'event-description',
                    ),
        
                ),
                'grid' => array(
                    'element' => 'a',
                    'attr' => array(
                        'class' => 'toogleEventElement',
                        'data-ident' => '',
                    ),
                    'content:before' => '<i class="fa fa-plus" aria-hidden="true"> </i> ',
                ),
        
            ),
             
            'description' => array(
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'event-description-element',
                        'itemprop' => 'description',
                    )
                ),
        
            ),
        
            'downloadfile' => array(
                'row' => array(
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'event-download-file-button',
                    )
                ),
                'grid' => array(
                    'element' => 'a',
                    'label' => 'content',
                    'attr' => array(
                        'href' => '/mcwork/files/download/',
                        'class' => 'button expand',
                    )
                ),
        
            ),
        
        
            'organisation' => array(
                'grid' => array(
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'event-location-name',
                        'itemprop' => 'name',
                    )
                ),
        
            ),
        
            'location' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'location',
                        'itemtype' => 'http://schema.org/Place',
                        'itemscope' => 'itemscope',
                        'itemprop' => 'location',
                    )
                ),
                'grid' => array(
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'event-location-address',
                        'itemtype' => 'http://schema.org/PostalAddress',
                        'itemscope' => 'itemscope',
                        'itemprop' => 'address',
                    )
                ),
                'grids' => array(
                    'accountStreet' => array(
                        'grid' => array(
                            'element' => 'span',
                            'attr' => array(
                                'itemprop' => 'streetAddress',
                            ),
                            'content:after' => ', '
                        )
                    ),
        
                    'accountZipcode' => array(
                        'grid' => array(
                            'element' => 'span',
                            'attr' => array(
                                'itemprop' => 'postalCode',
                            ),
                        )
                    ),
        
                    'accountCity' => array(
                        'grid' => array(
                            'element' => 'span',
                            'attr' => array(
                                'itemprop' => 'addressLocality',
                            ),
                        )
                    ),
        
                ),
        
            ),
        
        ),        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        'events' => array(
            'viewhelper' => 'events',
            'key' => 'events',
            'name' => 'Termine untereinander',    
           
            'schemakey' => 'calenderrow', 
            
            'displaymonthname' => array(
                'grid' => array(
                    'element' => 'h3',
                    'attr' => array(
                        'class' => 'event-mounth-headline',
                    ),
                    'content:before' => '<i class="fa fa-calendar" aria-hidden="true"> </i> ',
                ),                
            ),
        
            'toolbar' => array(
                'row' => array(
                    'element' => 'ul',
                    'attr' => array(
                        'class' => 'inline-list right'
                    )
                ),
                'grid' => array(
                    'element' => 'li',
                    'attr' => array(
                        'class' => 'toolbar-list-element'
                    ),
                ),
                'elements' => array(
                    'getevent' => array('icon' => '<i class="fa fa-download" aria-hidden="true"> </i>', 'href' => '#', 'attr' => array( 'class' => 'getics',  'title' => 'Diesen Termin im Kalender speichern')),
                ),
            ),
        
            'wrapper' => array(
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'id' => 'eventapp',
                        'class' => 'events'
                    ),
                )
            ),
        
            'schema' => array(
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'event-wrapper callout callout-shadow panel',
                        'itemtype' => 'http://schema.org/Event',
                        'itemscope' => 'itemscope',
                    )
                )
            ),
            'summary' => array(
                'row' => array(
                    'element' => 'h3',
                    'attr' => array(
                        'class' => 'event-summary'
                    )
                ),
                'grid' => array(
                     
                    'element' => 'span',
                    'attr' => array(
                        'class' => 'summary',
                        'itemprop' => 'name',
                    ),
                ),
            ),
            'imagesSource' => array(
                'grid' => array(
            
                    'element' => 'figure',
                    'attr' => array(
                        'class' => 'event-images right',
                        'itemprop' => 'image'
                    )
                )
            ),            
            'organizer' => array(
                'row' => array(
                    'element' => 'h5',
                    'attr' => array(
                        'class' => 'event-location-organizer'
                    )
                ),
                'grid' => array(
                     
                    'element' => 'span',
                    'attr' => array(
                        'class' => 'attendee',
                        'itemprop' => 'attendee',
                    ),
                ),
            ),
            'dateStart' => array(
                'row' => array(
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'event-date',
                    )
                ),
                'grid' => array(
                     
                    'element' => 'time',
                    'attr' => array(
                        'class' => 'event-time'
                    ),
                    'content:after' => ' Uhr'
                ),
            ),
                      
        
            'descriptionhead' => array(
                'row' => array(
                    'element' => 'h4',
                    'attr' => array(
                        'class' => 'event-description',
                    ),
        
                ),
                'grid' => array(
                    'element' => 'a',
                    'attr' => array(
                        'class' => 'toogleEventElement',
                        'data-ident' => '',
                    ),
                    'content:before' => '<i class="fa fa-plus" aria-hidden="true"> </i> ',
                ),
        
            ),
             
            'description' => array(
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'event-description-element',
                        'itemprop' => 'description',
                    )
                ),
        
            ),
            
            'downloadfile' => array(
                'row' => array(
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'event-download-file-button',
                    )
                ),
                'grid' => array(
                    'element' => 'a',
                    'label' => 'content',
                    'attr' => array(
                        'href' => '/mcwork/files/download/',
                        'class' => 'button expand',
                    )
                ),                
            
            ),            
        
        
            'organisation' => array(
                'grid' => array(
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'event-location-name',
                        'itemprop' => 'name',
                    )
                ),
        
            ),
        
            'location' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'location',
                        'itemtype' => 'http://schema.org/Place',
                        'itemscope' => 'itemscope',
                        'itemprop' => 'location',
                    )
                ),
                'grid' => array(
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'event-location-address',
                        'itemtype' => 'http://schema.org/PostalAddress',
                        'itemscope' => 'itemscope',
                        'itemprop' => 'address',
                    )
                ),
                'grids' => array(
                    'accountStreet' => array(
                        'grid' => array(
                            'element' => 'span',
                            'attr' => array(
                                'itemprop' => 'streetAddress',
                            ),
                            'content:after' => ', '
                        )
                    ),
        
                    'accountZipcode' => array(
                        'grid' => array(
                            'element' => 'span',
                            'attr' => array(
                                'itemprop' => 'postalCode',
                            ),
                        )
                    ),
        
                    'accountCity' => array(
                        'grid' => array(
                            'element' => 'span',
                            'attr' => array(
                                'itemprop' => 'addressLocality',
                            ),
                        )
                    ),
        
                ),
        
            ),
        
        ),
));