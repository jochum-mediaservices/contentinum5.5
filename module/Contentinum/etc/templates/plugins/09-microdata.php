<?php
return array(
    'plugins' => array(
        
        'accountsmall' => array(
            'viewhelper' => 'microdataorganisation',
            'key' => 'microdataaccount',
            'name' => 'Organisation (small)',
            'schemakey' => 'Organization',
            'files' => array(),
        
        
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
                        'class' => 'hcard-wrapper callout callout-shadow panel',
                        'itemtype' => 'http://schema.org/Organization',
                        'itemscope' => 'itemscope'
                    )
                )
            ),
        
            'organisation' => array(
                'organisation' => false,
                'organisationext' => '',
        
                'grid' => array(
                    'element' => 'h4',
                    'attr' => array(
                        'class' => 'hcard-organization',
                        'itemprop' => 'name'
                    )
                )
            ),
        
            'person' => array(
        
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'hcard-wrapper-person',
                        'itemtype' => 'http://schema.org/Person',
                        'itemscope' => 'itemscope',
                        'itemprop' => 'employee'
                    )
                ),
        
                'grid' => array(
        
                    'element' => 'span',
                    'attr' => array(
                        'class' => 'hcard-name',
                        'itemprop' => 'name'
                    )
                )
            ),
        
            'businessTitle' => array(
                'grid' => array(
        
                    'element' => 'span',
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
                    'content:before' => '<i class="fa fa-phone" aria-hidden="true"> </i> '
                ),
        
                'grid' => array(
                    'label' => 'content',
                    'element' => 'a',
                    'attr' => array(
                        'href' => 'tel:',
                        'itemprop' => 'telephone'
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
                ),
        
                'grid' => array(
                    'label' => 'content',
                    'element' => 'a',
                    'attr' => array(
                        'href' => 'tel:',
                        'itemprop' => 'telephone'
                    )
                )
            ),
        
            'phoneFax' => array(
        
                'row' => array(
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'hcard-phone'
                    ),
                    'content:before' => '<i class="fa fa-fax" aria-hidden="true"> </i> '
                ),
        
                'grid' => array(
                    'label' => 'content',
                    'element' => 'a',
                    'attr' => array(
                        'href' => 'tel:',
                        'itemprop' => 'faxNumber'
                    )
                )
            ),
        
            'accountEmail' => array(
        
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
            ),
        
            'alternateEmail' => array(
        
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
                    'accountStreet' => array(
                        'grid' => array(
                            'element' => 'span',
                            'attr' => array(
                                'itemprop' => 'streetAddress'
                            ),
                            'content:after:outside' => '<br />'
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
        ),        
        
        'account' => array(
            'viewhelper' => 'microdataorganisation',
            'key' => 'microdataaccount',
            'name' => 'Organisation',
            'schemakey' => 'Organization',
            'files' => array(),
        
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
        
            'schema' => array(
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'hcard-wrapper callout callout-shadow panel',
                        'itemtype' => 'http://schema.org/Organization',
                        'itemscope' => 'itemscope'
                    )
                )
            ),
        
            'organisation' => array(
                'organisation' => false,
                'organisationext' => '',
        
                'grid' => array(
                    'element' => 'h3',
                    'attr' => array(
                        'class' => 'hcard-organization',
                        'itemprop' => 'name'
                    )
                )
            ),
        
            'person' => array(
        
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'hcard-wrapper-person',
                        'itemtype' => 'http://schema.org/Person',
                        'itemscope' => 'itemscope',
                        'itemprop' => 'employee'
                    )
                ),
        
                'grid' => array(
        
                    'element' => 'span',
                    'attr' => array(
                        'class' => 'hcard-name',
                        'itemprop' => 'name'
                    )
                )
            ),
        
            'businessTitle' => array(
                'grid' => array(
        
                    'element' => 'span',
                    'attr' => array(
                        'class' => 'hcard-job',
                        'itemprop' => 'jobTitle'
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
                    'label' => 'content',
                    'element' => 'a',
                    'attr' => array(
                        'href' => 'tel:',
                        'itemprop' => 'telephone'
                    )
                )
            ),
        
            'phoneWork' => array(
        
                'row' => array(
        
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'hcard-phone'
                    ),
                    'content:before' => '<i class="fa fa-phone" aria-hidden="true"> </i> '
                ),
        
                'grid' => array(
                    'label' => 'content',
                    'element' => 'a',
                    'attr' => array(
                        'href' => 'tel:',
                        'itemprop' => 'telephone'
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
                ),
        
                'grid' => array(
                    'label' => 'content',
                    'element' => 'a',
                    'attr' => array(
                        'href' => 'tel:',
                        'itemprop' => 'telephone'
                    )
                )
            ),
        
            'phoneFax' => array(
        
                'row' => array(
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'hcard-phone'
                    ),
                    'content:before' => '<i class="fa fa-fax" aria-hidden="true"> </i> '
                ),
        
                'grid' => array(
                    'label' => 'content',
                    'element' => 'a',
                    'attr' => array(
                        'href' => 'tel:',
                        'itemprop' => 'faxNumber'
                    )
                )
            ),
        
            'accountEmail' => array(
        
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
            ),
        
            'alternateEmail' => array(
        
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
                    'accountStreet' => array(
                        'grid' => array(
                            'element' => 'span',
                            'attr' => array(
                                'itemprop' => 'streetAddress'
                            ),
                            'content:after:outside' => '<br />'
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
            'descriptionhead' => array(
                'row' => array(
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'hcard-description-link',
                    ),
            
                ),
                'grid' => array(
                    'element' => 'a',
                    'attr' => array(
                        'class' => 'toogleHcardElement',
                        'data-ident' => '',
                    ),
                    'content:before' => '<i class="fa fa-plus" aria-hidden="true"> </i> ',
                ),
            
            ),            
            'description' => array(
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'hcard-description'
                    )
                )
            ),
            'button' => array(
                'row' => array(
                    'element' => 'p',
                    'attr' => array(), 
                ),
                'grid' => array(
                    'element' => 'a',
                    'attr' => array(
                        'class' => 'button backbutton'
                    )
                )                
            ),
        ),        
        
        'business' => array(
            'viewhelper' => 'microdatagroup',
            'key' => 'microdatagroup',
            'name' => 'Organisation mit Personen',
            'schemakey' => 'Organization',
            'files' => array(),
        
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
        
            'schema' => array(
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'hcard-wrapper callout callout-shadow panel',
                        'itemtype' => 'http://schema.org/Organization',
                        'itemscope' => 'itemscope'
                    )
                )
            ),
        
            'organisation' => array(
                'organisation' => false,
                'organisationext' => '',
        
                'grid' => array(
                    'element' => 'h3',
                    'attr' => array(
                        'class' => 'hcard-organization',
                        'itemprop' => 'name'
                    )
                )
            ),
        
            'person' => array(
        
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'hcard-wrapper-person',
                        'itemtype' => 'http://schema.org/Person',
                        'itemscope' => 'itemscope',
                        'itemprop' => 'employee'
                    )
                ),
        
                'grid' => array(
        
                    'element' => 'p',
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
        
            'phoneHome' => array(
        
                'row' => array(
        
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'hcard-phone'
                    ),
                    'content:before' => '<i class="fa fa-phone" aria-hidden="true"> </i> '
                ),
        
                'grid' => array(
                    'label' => 'content',
                    'element' => 'a',
                    'attr' => array(
                        'href' => 'tel:',
                        'itemprop' => 'telephone'
                    )
                )
            ),
        
            'phoneWork' => array(
        
                'row' => array(
        
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'hcard-phone'
                    ),
                    'content:before' => '<i class="fa fa-phone" aria-hidden="true"> </i> '
                ),
        
                'grid' => array(
                    'label' => 'content',
                    'element' => 'a',
                    'attr' => array(
                        'href' => 'tel:',
                        'itemprop' => 'telephone'
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
                ),
        
                'grid' => array(
                    'label' => 'content',
                    'element' => 'a',
                    'attr' => array(
                        'href' => 'tel:',
                        'itemprop' => 'telephone'
                    )
                )
            ),
        
            'phoneFax' => array(
        
                'row' => array(
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'hcard-phone'
                    ),
                    'content:before' => '<i class="fa fa-fax" aria-hidden="true"> </i> '
                ),
        
                'grid' => array(
                    'label' => 'content',
                    'element' => 'a',
                    'attr' => array(
                        'href' => 'tel:',
                        'itemprop' => 'faxNumber'
                    )
                )
            ),
        
            'accountEmail' => array(
        
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
            ),
        
            'alternateEmail' => array(
        
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
                    'accountStreet' => array(
                        'grid' => array(
                            'element' => 'span',
                            'attr' => array(
                                'itemprop' => 'streetAddress'
                            ),
                            'content:after:outside' => '<br />'
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
            'imagesSource' => array(
                'grid' => array(
        
                    'element' => 'figure',
                    'attr' => array(
                        'class' => 'hcard-images right',
                        'itemprop' => 'image'
                    )
                )
            ),
            'description' => array(
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'hcard-description'
                    )
                )
            )
        ),        
        
        
        
        'contact' => array(
            'viewhelper' => 'microdatagroup',
            'key' => 'microdatagroup',
            'name' => 'Person in einer Organisation',
            'schemakey' => 'Person',
            'files' => array(),
        
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
        
            'organisation' => array(
                'organisation' => false,
                'organisationext' => '',
        
                'row' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'hcard-wrapper-organisation',
                        'itemtype' => 'http://schema.org/Organization',
                        'itemscope' => 'itemscope'
                    )
                ),
        
                'grid' => array(
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'hcard-organization',
                        'itemprop' => 'name'
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
        
            'businessTitle' => array(
                'grid' => array(
        
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'hcard-job',
                        'itemprop' => 'jobTitle'
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
                    'label' => 'content',
                    'element' => 'a',
                    'attr' => array(
                        'href' => 'tel:',
                        'itemprop' => 'telephone'
                    )
                )
            ),
        
            'phoneWork' => array(
        
                'row' => array(
        
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'hcard-phone'
                    ),
                    'content:before' => '<i class="fa fa-phone" aria-hidden="true"> </i> '
                ),
        
                'grid' => array(
                    'label' => 'content',
                    'element' => 'a',
                    'attr' => array(
                        'href' => 'tel:',
                        'itemprop' => 'telephone'
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
                ),
        
                'grid' => array(
                    'label' => 'content',
                    'element' => 'a',
                    'attr' => array(
                        'href' => 'tel:',
                        'itemprop' => 'telephone'
                    )
                )
            ),
        
            'phoneFax' => array(
        
                'row' => array(
                    'element' => 'p',
                    'attr' => array(
                        'class' => 'hcard-phone'
                    ),
                    'content:before' => '<i class="fa fa-fax" aria-hidden="true"> </i> '
                ),
        
                'grid' => array(
                    'label' => 'content',
                    'element' => 'a',
                    'attr' => array(
                        'href' => 'fax:',
                        'itemprop' => 'faxNumber'
                    )
                )
            ),
        
            'accountEmail' => array(
        
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
            ),
        
            'alternateEmail' => array(
        
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
                    'accountStreet' => array(
                        'grid' => array(
                            'element' => 'span',
                            'attr' => array(
                                'itemprop' => 'streetAddress'
                            ),
                            'content:after:outside' => '<br />'
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
        
            'imagesSource' => array(
                'grid' => array(
        
                    'element' => 'figure',
                    'attr' => array(
                        'class' => 'hcard-images right',
                        'itemprop' => 'image'
                    )
                )
            ),
        
            'description' => array(
                'grid' => array(
                    'element' => 'div',
                    'attr' => array(
                        'class' => 'hcard-description'
                    )
                )
            )
        ),        
   
        
    )
    
);