<?php
return array(
    'contribution' => array(
        'content' => array(
            'name' => 'Display content'
        ),
        '_defaultimages' => array(
            'key' => 'defaults',
            'name' => false,
            'content' => array(),
            'media' => array(
                'row' => array(
                    'element' => 'figure',
                    'attr' => array(
                        'class' => 'imageitem'
                    )
                ),
                'grid' => array(
                    'element' => 'figcaption',
                    'attr' => array(
                        'class' => 'imagecaption'
                    )
                )
            )
        ),
        
        'nomediastyle' => array(
            'key' => 'contribution',
            'name' => 'No media template',
            'media' => array(
                'row' => array(),
                'grid' => array()
            )
        ),
        
        'mediabanner' => array(
            'key' => 'contribution',
            'name' => 'Media banner',
            'content' => array(),
            'media' => array(
                'row' => array(
                    'element' => 'figure',
                    'attr' => array(
                        'class' => 'banner-images'
                    )
                ),
                'grid' => array(
                    'element' => 'figcaption',
                    'attr' => array(
                        'class' => 'banner-images-caption'
                    )
                )
            )
        ),        
        
        'medialeft' => array(
            'key' => 'contribution',
            'name' => 'Contribution with media left',
            'content' => array(),
            'media' => array(
                'row' => array(
                    'element' => 'figure',
                    'attr' => array(
                        'class' => 'imageitem left'
                    )
                ),
                'grid' => array(
                    'element' => 'figcaption',
                    'attr' => array(
                        'class' => 'imagecaption'
                    )
                )
            )
        ),
        'mediaright' => array(
            'key' => 'contribution',
            'name' => 'Contribution with media right',
            'content' => array(),
            'media' => array(
                'row' => array(
                    'element' => 'figure',
                    'attr' => array(
                        'class' => 'imageitem right'
                    )
                ),
                'grid' => array(
                    'element' => 'figcaption',
                    'attr' => array(
                        'class' => 'imagecaption'
                    )
                )
            )
        ),
        'mediacenter' => array(
            'key' => 'contribution',
            'name' => 'Contribution with media center',
            'content' => array(),
            'media' => array(
                'row' => array(
                    'element' => 'figure',
                    'attr' => array(
                        'class' => 'imageitem center'
                    )
                ),
                'grid' => array(
                    'element' => 'figcaption',
                    'attr' => array(
                        'class' => 'imagecaption'
                    )
                )
            )
        ),

        'contentblockmedialeft' => array(
            'key' => 'contribution',
            'name' => 'Contribution block with media left',
            'direction' => 'left',
            'wrapper' => array(
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),                
            ),
            'content' => array(
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'medium-8 columns'
                    )
                ),
                
            ),
            'block' => array(
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'medium-4 columns'
                    )
                ),
            ),
            'media' => array(
                'row' => array(
                    'element' => 'figure',
                    'attr' => array(
                        'class' => 'imageitem'
                    )
                ),
                'grid' => array(
                    'element' => 'figcaption',
                    'attr' => array(
                        'class' => 'imagecaption'
                    )
                )
            )
        ),
        'contentblockmediaright' => array(
            'key' => 'contribution',
            'name' => 'Contribution block with media right',
            'direction' => 'right',
            'wrapper' => array(
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'row'
                    )
                ),
            ),            
            'content' => array(
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'medium-8 columns'
                    )
                ),
                
            ),
            'block' => array(
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'medium-4 columns'
                    )
                ),
            ),
            'media' => array(
                'row' => array(
                    'element' => 'figure',
                    'attr' => array(
                        'class' => 'imageitem'
                    )
                ),
                'grid' => array(
                    'element' => 'figcaption',
                    'attr' => array(
                        'class' => 'imagecaption'
                    )
                )
            )
        ),        
        
        
        
        

       
        

        

        'simplelist' => array(
            'key' => false,
            'name' => false,
            'list' => array(
                'element' => 'ul',
                'attr' => array()
            ),
            'listelements' => array(
                '0' => array(
                    'element' => 'li',
                    'attr' => array()
                )
            )
        ),
        

        

        

        
        'organisation' => array(
            'key' => 'organisations',
            'name' => 'Organisation vollständig',
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
                        'icon' => '<i class="fa fa-download"> </i>',
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
            
            'schema' => array(
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'hcard-wrapper panel',
                        'itemtype' => 'http://schema.org/Organization',
                        'itemscope' => 'itemscope'
                    )
                )
            ),
            
            'organisation' => array(
                
                'grid' => array(
                    'element' => 'h3',
                    'attr' => array(
                        'class' => 'hcard-organization',
                        'itemprop' => 'name'
                    )
                )
            )
            ,
            
            'member' => array(
                'grid' => array(
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'hcard-organization-member',
                        'itemtype' => 'http://schema.org/Organization',
                        'itemprop' => 'member'
                    )
                )
            ),
            
            'accountFax' => array(
                
                'row' => array(
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'hcard-phone'
                    ),
                    'content:before' => '<i class="fa fa-fax"></i> '
                ),
                
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
            
            'accountPhone' => array(
                
                'row' => array(
                    
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'hcard-phone'
                    ),
                    'content:before' => '<i class="fa fa-phone"></i> '
                ),
                
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
            
            'accountEmail' => array(
                
                'row' => array(
                    
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'hcard-email'
                    ),
                    
                    'content:before' => '<i class="fa fa-envelope"></i> '
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
                    'content:before' => '<i class="fa fa-home"> </i> '
                ),
                
                'grid' => array(
                    
                    'element' => 'a',
                    'attr' => array(
                        'href' => 'http://',
                        'itemprop' => 'url',
                        'target' => '_blank'
                    )
                )
            ),
            
            'imgSource' => array(
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
                    'content:before' => '<i class="fa fa-mobile"></i> '
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
            
            'phoneWork' => array(
                
                'row' => array(
                    
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'hcard-phone'
                    ),
                    'content:before' => '<i class="fa fa-phone"></i> '
                ),
                
                'grid' => array(
                    'filter' => 'digit',
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
                        'class' => 'hcard-phone'
                    ),
                    'content:before' => '<i class="fa fa-fax"></i> '
                ),
                
                'grid' => array(
                    'filter' => 'digit',
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
                    
                    'content:before' => '<i class="fa fa-envelope"></i> '
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
            
            'address' => array(
                'grid' => array(
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'hcard-address',
                        'itemtype' => 'http://schema.org/PostalAddress',
                        'itemscope' => 'itemscope',
                        'itemprop' => 'address'
                    ),
                    'content:before' => '<i class="fa fa-map-marker"></i> '
                ),
                'grids' => array(
                    'accountStreet' => array(
                        'grid' => array(
                            'element' => 'span',
                            'attr' => array(
                                'itemprop' => 'streetAddress'
                            ),
                            'content:after' => ', '
                        )
                    ),
                    
                    'accountZipcode' => array(
                        'grid' => array(
                            'element' => 'span',
                            'attr' => array(
                                'itemprop' => 'postalCode'
                            )
                        )
                    ),
                    
                    'accountCity' => array(
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
            
        )
        ,
        
        'orga' => array(
            'key' => 'wanted',
            'name' => 'Organisation vollständig',
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
                        'icon' => '<i class="fa fa-download"> </i>',
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
            
            'schema' => array(
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'hcard-wrapper panel',
                        'itemtype' => 'http://schema.org/Organization',
                        'itemscope' => 'itemscope'
                    )
                )
            ),
            
            'organisation' => array(
                
                'grid' => array(
                    'element' => 'h3',
                    'attr' => array(
                        'class' => 'hcard-organization',
                        'itemprop' => 'name'
                    )
                )
            )
            ,
            
            'member' => array(
                'grid' => array(
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'hcard-organization-member',
                        'itemtype' => 'http://schema.org/Organization',
                        'itemprop' => 'member'
                    )
                )
            ),
            
            'accountFax' => array(
                
                'row' => array(
                    'element' => 'span',
                    'attr' => array(
                        'class' => 'hcard-phone'
                    ),
                    'content:before' => '<i class="fa fa-fax"></i> '
                ),
                
                'grid' => array(
                    'filter' => 'digit',
                    'element' => 'a',
                    'attr' => array(
                        'href' => 'tel:',
                        'itemprop' => 'faxNumber'
                    )
                )
            )
            ,
            
            'accountPhone' => array(
                
                'row' => array(
                    
                    'element' => 'span',
                    'attr' => array(
                        'class' => 'hcard-phone'
                    ),
                    'content:before' => '<i class="fa fa-phone"></i> '
                ),
                
                'grid' => array(
                    'filter' => 'digit',
                    'element' => 'a',
                    'attr' => array(
                        'href' => 'tel:',
                        'itemprop' => 'telephone'
                    )
                )
            )
            ,
            
            'accountEmail' => array(
                
                'row' => array(
                    
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'hcard-email'
                    ),
                    
                    'content:before' => '<i class="fa fa-envelope"></i> '
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
                    'content:before' => '<i class="fa fa-home"> </i> '
                ),
                
                'grid' => array(
                    
                    'element' => 'a',
                    'attr' => array(
                        'href' => 'http://',
                        'itemprop' => 'url',
                        'target' => '_blank'
                    )
                )
            ),
            
            'imgSource' => array(
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
                    'content:before' => '<i class="fa fa-mobile"></i> '
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
            
            'phoneWork' => array(
                
                'row' => array(
                    
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'hcard-phone'
                    ),
                    'content:before' => '<i class="fa fa-phone"></i> '
                ),
                
                'grid' => array(
                    'filter' => 'digit',
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
                        'class' => 'hcard-phone'
                    ),
                    'content:before' => '<i class="fa fa-fax"></i> '
                ),
                
                'grid' => array(
                    'filter' => 'digit',
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
                    
                    'content:before' => '<i class="fa fa-envelope"></i> '
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
            
            'address' => array(
                'grid' => array(
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'hcard-address',
                        'itemtype' => 'http://schema.org/PostalAddress',
                        'itemscope' => 'itemscope',
                        'itemprop' => 'address'
                    ),
                    'content:before' => '<i class="fa fa-map-marker"></i> '
                ),
                'grids' => array(
                    'accountStreet' => array(
                        'grid' => array(
                            'element' => 'span',
                            'attr' => array(
                                'itemprop' => 'streetAddress'
                            ),
                            'content:after' => ', '
                        )
                    ),
                    
                    'accountZipcode' => array(
                        'grid' => array(
                            'element' => 'span',
                            'attr' => array(
                                'itemprop' => 'postalCode'
                            )
                        )
                    ),
                    
                    'accountCity' => array(
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
            
        )
        ,
        

        

        
 
        

        
       
        

    )
    
);