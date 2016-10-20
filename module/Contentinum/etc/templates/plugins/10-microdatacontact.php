<?php
return array(
    'plugins' => array(
        
        'person' => array(
            'viewhelper' => 'microdatacontact',
            'key' => 'microdatacontact',
            'name' => 'Person',
            'schemakey' => 'Person',
            'files' => array()
        
            ,
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
                    )
                ),
                'elements' => array(
                    'getevent' => array(
                        'icon' => '<i class="fa fa-download" aria-hidden="true"> </i>',
                        'href' => '#',
                        'attr' => array(
                            'class' => 'getics',
                            'title' => 'Diesen Termin im Kalender speichern'
                        )
                    )
                )
            ),
        
            'wrapper' => array(
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'hcards'
                    )
                )
            ),
        
            'organisation' => array(
                'organisation' => false,
                'organisationext' => '',
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'hcard-memberOf',
                        'itemtype' => 'http://schema.org/Organization',
                        'itemscope' => 'itemscope'
                    )
                )
                ,
        
                'grid' => array(
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'hcard-organization',
                        'itemprop' => 'name'
                    )
                )
            )
            ,
        
            'schema' => array(
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'hcard-wrapper callout callout-shadow panel',
                        'itemtype' => 'http://schema.org/Person',
                        'itemscope' => 'itemscope'
                    )
                )
            ),
            'person' => array(
                'grid' => array(
        
                    'element' => 'h3',
                    'attr' => array(
                        'class' => 'hcard-name',
                        'itemprop' => 'name'
                    )
                )
            ),
        
            'internet' => array(
                'row' => array(
        
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'hcard-internet'
                    ),
                    'content:before' => '<i class="fa fa-home" aria-hidden="true"> </i> '
                ),
        
                'grid' => array(
        
                    'element' => 'a',
                    'attr' => array(
                        'href' => 'http://',
                        'target' => '_blank',
                        'itemprop' => 'url'
                    )
                )
            ),
        
            'imagesSource' => array(
                'grid' => array(
        
                    'element' => 'figure',
                    'attr' => array(
                        'class' => 'hcard-images right',
                        'itemprop' => 'image'
                    )
                )
            ),
            'businessTitle' => array(
                'grid' => array(
        
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'hcard-job',
                        'itemprop' => 'jobTitle'
                    )
                )
            ),
        
            'phoneMobile' => array(
        
                'row' => array(
        
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'hcard-phone'
                    ),
                    'content:before' => '<i class="fa fa-mobile" aria-hidden="true"> </i> '
                )
                ,
        
                'grid' => array(
                    'label' => 'content',
                    'element' => 'a',
                    'attr' => array(
                        'href' => 'tel:',
                        'itemprop' => 'telephone'
                    )
                )
            ),
        
            'phoneHome' => array(
        
                'row' => array(
        
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'hcard-phone'
                    ),
                    'content:before' => '<i class="fa fa-phone" aria-hidden="true"> </i> '
                ),
        
                'grid' => array(
        
                    'element' => 'a',
                    'attr' => array(
                        'href' => 'tel:',
                        'itemprop' => 'telephone'
                    )
                )
            )
            ,
        
            'phoneWork' => array(
        
                'row' => array(
        
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'hcard-phone'
                    ),
                    'content:before' => '<i class="fa fa-phone" aria-hidden="true"> </i> '
                ),
        
                'grid' => array(
        
                    'element' => 'a',
                    'attr' => array(
                        'href' => 'tel:',
                        'itemprop' => 'telephone'
                    )
                )
            )
            ,
        
            'phoneFax' => array(
        
                'row' => array(
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'hcard-phone type-fax'
                    ),
                    'content:before' => '<i class="fa fa-fax" aria-hidden="true"> </i> '
                ),
        
                'grid' => array(
        
                    'element' => 'a',
                    'attr' => array(
                        'href' => 'tel:',
                        'itemprop' => 'faxNumber'
                    )
                )
            )
            ,
        
            'contactEmail' => array(
        
                'row' => array(
        
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'hcard-email'
                    ),
        
                    'content:before' => '<i class="fa fa-envelope" aria-hidden="true"> </i> '
                ),
        
                'grid' => array(
        
                    'element' => 'a',
                    'attr' => array(
                        'href' => 'mailto:',
                        'itemprop' => 'email'
                    )
                )
            )
            ,
        
            'organisation' => array(
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'hcard-memberOf',
                        'itemtype' => 'http://schema.org/Organization',
                        'itemscope' => 'itemscope'
                    )
                )
                ,
        
                'grid' => array(
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'hcard-organization',
                        'itemprop' => 'name'
                    )
                )
            )
            ,
        
            'address' => array(
                'grid' => array(
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'hcard-address',
                        'itemtype' => 'http://schema.org/PostalAddress',
                        'itemscope' => 'itemscope',
                        'itemprop' => 'address'
                    ),
                    'content:before' => '<i class="fa fa-map-marker" aria-hidden="true"> </i> '
                ),
                'grids' => array(
                    'contactAddress' => array(
                        'grid' => array(
                            'element' => 'span',
                            'attr' => array(
                                'itemprop' => 'streetAddress'
                            ),
                            'content:after' => ', '
                        )
                    ),
        
                    'contactZipcode' => array(
                        'grid' => array(
                            'element' => 'span',
                            'attr' => array(
                                'itemprop' => 'postalCode'
                            )
                        )
                    ),
        
                    'contactCity' => array(
                        'grid' => array(
                            'element' => 'span',
                            'attr' => array(
                                'itemprop' => 'addressLocality'
                            )
                        )
                    )
                )
        
            )
            ,
        
            'description' => array(
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'hcard-description'
                    )
                )
            )
        
        ),        
              
        'personsmall' => array(
            'viewhelper' => 'microdatacontact',
            'key' => 'microdatacontact',
            'name' => 'Person small',
            'schemakey' => 'Person',
        
            'files' => array()
        
            ,
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
                    )
                ),
                'elements' => array(
                    'getevent' => array(
                        'icon' => '<i class="fa fa-download" aria-hidden="true"> </i>',
                        'href' => '#',
                        'attr' => array(
                            'class' => 'getics',
                            'title' => 'Diesen Termin im Kalender speichern'
                        )
                    )
                )
            ),
        
            'wrapper' => array(
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'hcards small'
                    )
                )
            ),
        
            'schema' => array(
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'hcard-wrapper callout callout-shadow panel',
                        'itemtype' => 'http://schema.org/Person',
                        'itemscope' => 'itemscope'
                    )
                )
            ),
            'person' => array(
                'grid' => array(
        
                    'element' => 'h4',
                    'attr' => array(
                        'class' => 'hcard-name',
                        'itemprop' => 'name'
                    )
                )
            ),
        
            'businessTitle' => array(
                'grid' => array(
        
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'hcard-job',
                        'itemprop' => 'jobTitle'
                    )
                )
            ),
        
            'phoneWork' => array(
        
                'row' => array(
        
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'hcard-phone'
                    ),
                    'content:before' => '<i class="fa fa-phone" aria-hidden="true"></i> '
                )
                ,
        
                'grid' => array(
                    'label' => 'content',
                    'element' => 'a',
                    'attr' => array(
                        'href' => 'tel:',
                        'itemprop' => 'telephone'
                    )
                )
            )
            ,
        
            'phoneFax' => array(
        
                'row' => array(
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'hcard-phone type-fax'
                    ),
                    'content:before' => '<i class="fa fa-fax" aria-hidden="true"></i> '
                )
                ,
        
                'grid' => array(
                    'label' => 'content',
                    'element' => 'a',
                    'attr' => array(
                        'href' => 'tel:',
                        'itemprop' => 'faxNumber'
                    )
                )
            )
            ,
        
            'contactEmail' => array(
        
                'row' => array(
        
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'hcard-email'
                    ),
        
                    'content:before' => '<i class="fa fa-envelope" aria-hidden="true"></i> '
                ),
        
                'grid' => array(
        
                    'element' => 'a',
                    'attr' => array(
                        'href' => 'mailto:',
                        'itemprop' => 'email'
                    )
                )
            )
            ,
        
            'organisation' => array(
                'organisation' => false,
                'organisationext' => '',
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'hcard-memberOf',
                        'itemtype' => 'http://schema.org/Organization',
                        'itemscope' => 'itemscope'
                    )
                )
                ,
        
                'grid' => array(
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'hcard-organization',
                        'itemprop' => 'name'
                    )
                )
            )
            ,
        
            'building' => array(
                'grid' => array(
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'building'
                    )
                ),
                'grids' => array(
                    'floor' => array(
                        'grid' => array(
                            'element' => 'span',
                            'attr' => array(
                                'class' => 'building-floor'
                            ),
                            'content:after:outside' => ', '
                        )
                    ),
                    'room' => array(
                        'grid' => array(
                            'element' => 'span',
                            'attr' => array(
                                'class' => 'building-room'
                            ),
                            'content:before' => 'Raum: '
                        )
                    )
                )
        
            )
        ),        
             
   
        
    )
    
);