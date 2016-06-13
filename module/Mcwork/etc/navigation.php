<?php
return array(
    
    'navigation' => array(
        'default' => array(
            array(
                'label' => 'Mcwork_Controller_Index',
                'uri' => '/mcwork/dashboard',
                'order' => 1
            ),
            array(
                'label' => 'Files',
                'uri' => '#',
                'order' => 2,
                'resource' => 'authorresource',
                'listClass' => 'has-dropdown',
                'subUlClass' => 'dropdown',
                'pages' => array(
                    
                    array(
                        'label' => 'PublicMedias',
                        'uri' => '/mcwork/publicmedias',
                        'resource' => 'authorresource',
                        'listClass' => 'has-dropdown',
                        'subUlClass' => 'dropdown',
                        'pages' => array(
                            array(
                                'label' => 'MediaMetas',
                                'uri' => '/mcwork/mediametas',
                                'resource' => 'authorresource'
                            )
                        )
                    ), // end sub medias
                      // end medias
                    array(
                        'label' => 'NoPublicFiles',
                        'uri' => '/mcwork/filesdenied',
                        'resource' => 'authorresource'
                    ),
                    array(
                        'label' => 'MediaGroup',
                        'uri' => '/mcwork/filegroups',
                        'resource' => 'authorresource',
                        'listClass' => 'has-dropdown',
                        'subUlClass' => 'dropdown',
                        'pages' => array(
                            array(
                                'label' => 'Dateigruppen zusammenfassen',
                                'uri' => '/mcwork/combinefilegroups',
                                'resource' => 'authorresource'
                            )
                        )
                    )
                ) // end sub medias

                
            ),
            array(
                
                'label' => 'mcContent',
                'uri' => '#',
                'order' => 3,
                'resource' => 'authorresource',
                'listClass' => 'has-dropdown',
                'subUlClass' => 'dropdown',
                'pages' => array(
                    
                    array(
                        'label' => 'Pages',
                        'uri' => '/mcwork/pages',
                        'resource' => 'publisherresource',
                        'listClass' => 'has-dropdown',
                        'subUlClass' => 'dropdown',
                        'pages' => array(
                            
                            array(
                                'label' => 'PageAttribute',
                                'uri' => '/mcwork/pageattribute',
                                'resource' => 'managerresource'
                            ),
                            array(
                                'label' => 'Links',
                                'uri' => '/mcwork/links',
                                'resource' => 'managerresource'
                            ),
                            array(
                                'label' => 'Headlinks',
                                'uri' => '/mcwork/pageheader',
                                'resource' => 'managerresource' 
                            )
                        )
                    ), // end pages
                    
                    array(
                        'label' => 'Contribution',
                        'uri' => '/mcwork/contribution',
                        'resource' => 'authorresource',
                        'listClass' => 'has-dropdown',
                        'subUlClass' => 'dropdown',
                        'pages' => array(
                            array(
                                'label' => 'contributionProperties',
                                'uri' => '/mcwork/pagecontent',
                                'resource' => 'publisherresource'
                            )
                        )
                    ),
                    array(
                        'label' => 'News & Blogs',
                        'uri' => '/mcwork/article',
                        'resource' => 'authorresource',
                        'listClass' => 'has-dropdown',
                        'subUlClass' => 'dropdown',
                        'pages' => array(
                            array(
                                'label' => 'News & Blog Categories',
                                'uri' => '/mcwork/blogcategory',
                                'resource' => 'adminresource'
                            ),                            
                            array(
                                'label' => 'News & Blog Settings',
                                'uri' => '/mcwork/blogsettings',
                                'resource' => 'adminresource'
                            ),
                            array(
                                'label' => 'Blog & News Groups',
                                'uri' => '/mcwork/bloggroup',
                                'resource' => 'adminresource'
                            )
                        )
                    ),
                    array(
                        'label' => 'Navigation',
                        'uri' => '/mcwork/navigation',
                        'resource' => 'managerresource'
                    ), // end navigation
                    
                    array(
                        'label' => 'Forms',
                        'uri' => '/mcwork/form',
                        'resource' => 'publisherresource'
                    ),
                    
                    array(
                        'label' => 'Maps',
                        'uri' => '/mcwork/maps',
                        'resource' => 'publisherresource'
                    ),
                    
                    array(
                        'label' => 'Organisationen',
                        'uri' => '/mcwork/accounts', // directory
                        'resource' => 'publisherresource',
                        'listClass' => 'has-dropdown',
                        'subUlClass' => 'dropdown',
                        'pages' => array(                            
                            array(
                                'label' => 'Organizationgroups',
                                'uri' => '/mcwork/accountgroups',
                                'resource' => 'managerresource'
                            ),                            
                        ) // end sub fieldtypes

                        
                    ),  
                    
                    array(
                        'label' => 'Contacts',
                        'uri' => '/mcwork/contacts',
                        'resource' => 'publisherresource',
                        
                        'listClass' => 'has-dropdown',
                        'subUlClass' => 'dropdown',
                        'pages' => array(
                            array(
                                'label' => 'Kontakte gruppieren',
                                'uri' => '/mcwork/contactgroup',
                                'resource' =>  'managerresource'
                            )
                        ), 
                    ),                    
                    
                ) // end sub directories

                
            ) // end directories

            , // end sub content
              
            // end content
            array(
                'label' => 'Administration',
                'uri' => '#',
                'order' => 4,
                'resource' => 'authorresource',
                'listClass' => 'has-dropdown',
                'subUlClass' => 'dropdown',
                'pages' => array(
                    array(
                        'label' => 'Logins',
                        'uri' => '#',
                        'resource' => 'publisherresource',
                        'listClass' => 'has-dropdown',
                        'subUlClass' => 'dropdown',
                        'pages' => array(
                            array(
                                'label' => 'Users',
                                'uri' => '/mcwork/users',
                                'resource' => 'publisherresource'
                            ),
                            array(
                                'label' => 'Usergroups',
                                'uri' => '/mcwork/usrgrp',
                                'resource' => 'managerresource'
                            ),
                            array(
                                'label' => 'User in groups',
                                'uri' => '/mcwork/usringrp',
                                'resource' => 'adminresource'
                            )
                        )
                    ),
                    array(
                        'label' => 'Logs',
                        'uri' => '/mcwork/logs',
                        'resource' => 'adminresource'
                    ),
                    
                    array(
                        'label' => 'Caches',
                        'uri' => '#',
                        'resource' => 'adminresource',
                        'listClass' => 'has-dropdown',
                        'subUlClass' => 'dropdown',
                        'pages' => array(
                            array(
                                'label' => 'Cache',
                                'uri' => '/mcwork/cache',
                                'resource' => 'adminresource'
                            ),
                            array(
                                'label' => 'Cache Settings',
                                'uri' => '/mcwork/cachesettings',
                                'resource' => 'adminresource'
                            ), 
                        )
                    ),                    
                    
                    
                    array(
                        'label' => 'Preferences',
                        'uri' => '/mcwork/preferences',
                        'resource' => 'adminresource'
                    ),
                    array(
                        'label' => 'Redirects',
                        'uri' => '/mcwork/redirects',
                        'resource' => 'adminresource'
                    ),
                    
                    array(
                        'label' => 'Emailtemplates',
                        'uri' => '#',
                        'resource' => 'managerresource',
                        'listClass' => 'has-dropdown',
                        'subUlClass' => 'dropdown',
                        'pages' => array(
                            array(
                                'label' => 'Emailtextemplates',
                                'uri' => '/mcwork/emailtemplates',
                                'resource' => 'managerresource'
                            ),
                            
                            array(
                                'label' => 'Emailsignatures',
                                'uri' => '/mcwork/emailsignatures',
                                'resource' => 'managerresource'
                            )
                        )
                    ),
                    
                    array(
                        'label' => 'Layout',
                        'uri' => '#',
                        'resource' => 'adminresource',
                        'listClass' => 'has-dropdown',
                        'subUlClass' => 'dropdown',
                        'pages' => array(
                            array(
                                'label' => 'Assets',
                                'uri' => '/mcwork/assets',
                                'resource' => 'adminresource'
                            ),
                            array(
                                'label' => 'Assets Collection',
                                'uri' => '/mcwork/assetcollectionfiles',
                                'resource' => 'adminresource'
                            ),
                            array(
                                'label' => 'Asset cache',
                                'uri' => '/mcwork/assetcache',
                                'resource' => 'adminresource'
                            ),
                            array(
                                'label' => 'Templates',
                                'uri' => '/mcwork/templates',
                                'resource' => 'adminresource'
                            ),                            
                        )
                    ),
                    array(
                        'label' => 'Accounttypes',
                        'uri' => '/mcwork/fieldtypes',
                        'resource' => 'adminresource'
                    ),
                    array(
                        'label' => 'About',
                        'uri' => '/mcwork/version',
                        'resource' => 'authorresource'
                    )                    
                )// end fieldtypes
            ), // end sub administration
            // end administration
            array(
                'label' => 'Contentinum_Apps',
                'uri' => '#',
                'order' => 5,
                'resource' => 'authorresource',
                'listClass' => 'has-dropdown',
                'subUlClass' => 'dropdown',
                'pages' => array()
            )
        )
    ) // end apps // end subkey default

    
); // end mainkey navigation

