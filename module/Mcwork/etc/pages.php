<?php
return array(
    '_default' => array(
        'splitQuery' => 2,
        'title' => 'contentinum backend',
        'resource' => 'index',
        'charset' => 'utf-8',
        'locale' => 'de_DE',
        'timeZone' => 'Europa/Berlin',
        'metaViewport' => 'width=device-width, initial-scale=1.0',
        'layout' => 'mcwork/layout/admin',
        'app' => array(
            'entitymanager' => 'doctrine.entitymanager.orm_default'
        ),
        'assets' => array(
            'path' => '/module/Mcwork/assets',
            'web' => '/assets/app',
            'sets' => array('mcworkstyles','mcworkhead','mcworkcore'),
            'collections' => array(
                'mcworkstyles' => array(
                    'debug' => false,
                    'area' => 'styles',
                    'type' => 'styles',
                    'attr' => array('media' => 'all', 'rel' => 'stylesheet'),
                    'assets' => array(
                    '/backend/css/font-awesome.css',
                    '/backend/css/mcwork.foundation.css',
                    '/backend/css/mcworkapp.css'
                    ),
                    'includes' => array(
                        '/data/usr/share/min/css/cssmin-v3.0.1.php'
                    ),
                    'filters' => array(
                        'mincss' => 'Assetic\Filter\CssMinFilter'
                    )
                ),
                
                'mcworkdashboradstyles' => array(
                    'debug' => false,
                    'area' => 'styles',
                    'type' => 'styles',
                    'attr' => array('media' => 'all', 'rel' => 'stylesheet'),
                    'assets' => array(
                        '/backend/css/font-awesome.css',
                        '/backend/css/mcwork.foundation.css',
                        '/backend/css/vendor/datatables/dataTables.foundation.css',
                        '/backend/css/mcwork.minitiles.css',
                        '/backend/css/mcworkapp.css'
                    ),
                    'includes' => array(
                        '/data/usr/share/min/css/cssmin-v3.0.1.php'
                    ),
                    'filters' => array(
                        'mincss' => 'Assetic\Filter\CssMinFilter'
                    )
                ),                
                
                'mcworkformstyles' => array(
                    'debug' => false,
                    'area' => 'styles',
                    'type' => 'styles',
                    'attr' => array('media' => 'all', 'rel' => 'stylesheet'),
                    'assets' => array(
                        '/backend/css/font-awesome.css',
                        '/backend/css/vendor/chosen/chosen.css',
                        '/backend/css/mcwork.foundation.css',
                        '/backend/css/mcworkapp.css',
                        '/backend/css/mcworkform.css'
                    ),
                    'includes' => array(
                        '/data/usr/share/min/css/cssmin-v3.0.1.php'
                    ),
                    'filters' => array(
                        'mincss' => 'Assetic\Filter\CssMinFilter'
                    )
                ), 
                
                'mcworkformexplorstyles' => array(
                    'debug' => false,
                    'area' => 'styles',
                    'type' => 'styles',
                    'attr' => array('media' => 'all', 'rel' => 'stylesheet'),
                    'assets' => array(
                        '/backend/css/font-awesome.css',
                        '/backend/css/vendor/chosen/chosen.css',
                        '/backend/css/mcwork.foundation.css',
                        '/backend/css/mcworkapp.css',
                        '/backend/css/mcworkform.css',
                        '/backend/css/mcwork.explorer.css',
                    ),
                    'includes' => array(
                        '/data/usr/share/min/css/cssmin-v3.0.1.php'
                    ),
                    'filters' => array(
                        'mincss' => 'Assetic\Filter\CssMinFilter'
                    )
                ),                
                
                'mcworkformstylesdtpick' => array(
                    'debug' => false,
                    'area' => 'styles',
                    'type' => 'styles',
                    'attr' => array('media' => 'all', 'rel' => 'stylesheet'),
                    'assets' => array(
                        '/backend/css/font-awesome.css',
                        '/backend/css/vendor/chosen/chosen.css',
                        '/backend/css/vendor/jquery.datetimepicker.css',
                        '/backend/css/mcwork.foundation.css',
                        '/backend/css/mcworkapp.css',
                        '/backend/css/mcworkform.css'
                    ),
                    'includes' => array(
                        '/data/usr/share/min/css/cssmin-v3.0.1.php'
                    ),
                    'filters' => array(
                        'mincss' => 'Assetic\Filter\CssMinFilter'
                    )
                ), 
                
                'mcworkformstylescontent' => array(
                    'debug' => false,
                    'area' => 'styles',
                    'type' => 'styles',
                    'attr' => array('media' => 'all', 'rel' => 'stylesheet'),
                    'assets' => array(
                        '/backend/css/font-awesome.css',
                        '/backend/css/vendor/chosen/chosen.css',
                        '/backend/css/vendor/jquery.datetimepicker.css',
                        '/backend/css/mcwork.foundation.css',
                        '/backend/css/mcworkapp.css',
                        '/backend/css/mcworkform.css',
                        '/backend/css/mcwork.explorer.css',
                    ),
                    'includes' => array(
                        '/data/usr/share/min/css/cssmin-v3.0.1.php'
                    ),
                    'filters' => array(
                        'mincss' => 'Assetic\Filter\CssMinFilter'
                    )
                ),                
                
                'mcworkformblogstyles' => array(
                    'debug' => false,
                    'area' => 'styles',
                    'type' => 'styles',
                    'attr' => array('media' => 'all', 'rel' => 'stylesheet'),
                    'assets' => array(
                        '/backend/css/font-awesome.css',
                        '/backend/css/vendor/chosen/chosen.css',
                        '/backend/css/vendor/jquery.datetimepicker.css',
                        '/backend/css/mcwork.foundation.css',
                        '/backend/css/mcworkapp.css',
                        '/backend/css/mcworkform.css',
                        '/backend/css/mcwork.explorer.css',
                    ),
                    'includes' => array(
                        '/data/usr/share/min/css/cssmin-v3.0.1.php'
                    ),
                    'filters' => array(
                        'mincss' => 'Assetic\Filter\CssMinFilter'
                    )
                ),                
                
                'mcworktablestyles' => array(
                    'debug' => false,
                    'area' => 'styles',
                    'type' => 'styles',
                    'attr' => array('media' => 'all', 'rel' => 'stylesheet'),
                    'assets' => array(
                        '/backend/css/font-awesome.css',
                        '/backend/css/mcwork.foundation.css',
                        '/backend/css/vendor/datatables/dataTables.foundation.css',                        
                        '/backend/css/mcworkapp.css'
                    ),
                    'includes' => array(
                        '/data/usr/share/min/css/cssmin-v3.0.1.php'
                    ),
                    'filters' => array(
                        'mincss' => 'Assetic\Filter\CssMinFilter'
                    )
                ),                
                
                'mcworkstylefiles' => array(
                    'debug' => false,
                    'area' => 'styles',
                    'type' => 'styles',
                    'attr' => array('media' => 'all', 'rel' => 'stylesheet'),
                    'assets' => array(
                        '/backend/css/font-awesome.css',
                        '/backend/css/mcwork.foundation.css',                      
                        '/backend/css/vendor/datatables/dataTables.foundation.css',
                        '/backend/css/mcworkapp.css'
                    ),
                    'includes' => array(
                        '/data/usr/share/min/css/cssmin-v3.0.1.php'
                    ),
                    'filters' => array(
                        'mincss' => 'Assetic\Filter\CssMinFilter'
                    )
                ), 
                
                'mcworkwookmarkstyles' => array(
                    'debug' => false,
                    'area' => 'styles',
                    'type' => 'styles',
                    'attr' => array('media' => 'all', 'rel' => 'stylesheet'),
                    'assets' => array(
                        '/backend/css/font-awesome.css',
                        '/backend/css/mcwork.foundation.css',
                        '/backend/css/mcworkapp.css',
                        '/backend/css/mcwork.dyngrid.css'
                    ),
                    'includes' => array(
                        '/data/usr/share/min/css/cssmin-v3.0.1.php'
                    ),
                    'filters' => array(
                        'mincss' => 'Assetic\Filter\CssMinFilter'
                    )
                ),                
                
                'mcworkstylefilesdenied' => array(
                    'debug' => false,
                    'area' => 'styles',
                    'type' => 'styles',
                    'attr' => array('media' => 'all', 'rel' => 'stylesheet'),
                    'assets' => array(
                        '/backend/css/font-awesome.css',
                        '/backend/css/mcwork.foundation.css',
                        '/backend/css/vendor/tagging/tag-basic-style.css',
                        '/backend/css/vendor/jquery-ui-autocomplete.css',
                        '/backend/css/vendor/datatables/dataTables.foundation.css',
                        '/backend/css/mcworkapp.css',
                    ),
                    'includes' => array(
                        '/data/usr/share/min/css/cssmin-v3.0.1.php'
                    ),
                    'filters' => array(
                        'mincss' => 'Assetic\Filter\CssMinFilter'
                    )
                ),                
                
                'mcworkstyledropzone' => array(
                    'debug' => false,
                    'area' => 'styles',
                    'type' => 'styles',
                    'attr' => array('media' => 'all', 'rel' => 'stylesheet'),
                    'assets' => array(
                        '/backend/css/font-awesome.css',
                        '/backend/css/mcwork.foundation.css',
                        '/backend/css/vendor/upload/dropzone.4.0.min.css',
                        '/backend/css/vendor/datatables/dataTables.foundation.css',
                        '/backend/css/mcworkapp.css'
                    ),
                    'includes' => array(
                        '/data/usr/share/min/css/cssmin-v3.0.1.php'
                    ),
                    'filters' => array(
                        'mincss' => 'Assetic\Filter\CssMinFilter'
                    )
                ),                
                
                'mcworkhead' => array(
                    'debug' => false,
                    'area' => 'head',
                    'type' => 'js',
                    'attr' => array( 'type' => 'text/javascript'),
                    'assets' => array(
                        '/backend/js/vendor/modernizr.js'
                    )
                ),
                'mcworkcore' => array(
                    'debug' => false,
                    'area' => 'inline',
                    'type' => 'js',
                    'attr' => array( 'type' => 'text/javascript'),
                    'assets' => array(
                        '/backend/js/vendor/jquery.js',
                        '/backend/js/vendor/jquery.cookie.js',
                        '/backend/js/foundation.min.js',
                        '/backend/js/mcwork.language.js',
                        '/backend/js/mcwork.app.js',
                        '/backend/js/mcwork.js'
                    )
                ),
                
                'mcworkdashboard' => array(
                    'debug' => false,
                    'area' => 'inline',
                    'type' => 'js',
                    'attr' => array( 'type' => 'text/javascript'),
                    'assets' => array(
                        '/backend/js/vendor/jquery.js',
                        '/backend/js/vendor/jquery.cookie.js',
                        '/backend/js/foundation.min.js',
                        '/backend/js/vendor/datatables/jquery.dataTables.js',
                        '/backend/js/vendor/datatables/dataTables.foundation.js',                        
                        '/backend/js/mcwork.language.js',
                        '/backend/js/mcwork.app.js',
                        '/backend/js/mcwork.js',
                        '/backend/js/mcwork.dashboard.js',
                        '/backend/js/mcwork.table.js'
                    )
                ),                
                
                'mcworktablescripts' => array(
                    'debug' => false,
                    'area' => 'inline',
                    'type' => 'js',
                    'attr' => array( 'type' => 'text/javascript'),
                    'assets' => array(
                        '/backend/js/vendor/jquery.js',
                        '/backend/js/vendor/jquery.cookie.js',
                        '/backend/js/foundation.min.js',
                        '/backend/js/vendor/datatables/jquery.dataTables.js',
                        '/backend/js/vendor/datatables/dataTables.foundation.js',                        
                        '/backend/js/mcwork.language.js',
                        '/backend/js/mcwork.app.js',
                        '/backend/js/mcwork.table.js'
                    )                    
                    
                ),
                
                'mcworktusrcripts' => array(
                    'debug' => false,
                    'area' => 'inline',
                    'type' => 'js',
                    'attr' => array( 'type' => 'text/javascript'),
                    'assets' => array(
                        '/backend/js/vendor/jquery.js',
                        '/backend/js/vendor/jquery.cookie.js',
                        '/backend/js/foundation.min.js',
                        '/backend/js/vendor/datatables/jquery.dataTables.js',
                        '/backend/js/vendor/datatables/dataTables.foundation.js',
                        '/backend/js/mcwork.language.js',
                        '/backend/js/mcwork.app.js',
                        '/backend/js/mcwork.table.js',
                        '/backend/js/mcwork.users.js'
                    )
                
                ),                
                
                'mcworktablemenuscripts' => array(
                    'debug' => false,
                    'area' => 'inline',
                    'type' => 'js',
                    'attr' => array( 'type' => 'text/javascript'),
                    'assets' => array(
                        '/backend/js/vendor/jquery.js',
                        '/backend/js/vendor/jquery.cookie.js',
                        '/backend/js/foundation.min.js',
                        '/backend/js/vendor/datatables/jquery.dataTables.js',
                        '/backend/js/vendor/datatables/dataTables.foundation.js',
                        '/backend/js/mcwork.language.js',
                        '/backend/js/mcwork.app.js',
                        '/backend/js/mcwork.menu.js',
                        '/backend/js/mcwork.table.js'
                    )
                
                ),                
                
                'mcworkforms' => array(
                    'debug' => false,
                    'area' => 'inline',
                    'type' => 'js',
                    'attr' => array( 'type' => 'text/javascript'),
                    'assets' => array(
                        '/backend/js/vendor/jquery.js',
                        '/backend/js/vendor/jquery.cookie.js',
                        '/backend/js/vendor/chosen/chosen.jquery.js',
                        '/backend/js/foundation.min.js',
                        '/backend/js/mcwork.language.js',
                        '/backend/js/mcwork.app.js',
                        '/backend/js/mcwork.form.js',
                    )
                ),
                
                'mcworkformsdtpick' => array(
                    'debug' => false,
                    'area' => 'inline',
                    'type' => 'js',
                    'attr' => array( 'type' => 'text/javascript'),
                    'assets' => array(
                        '/backend/js/vendor/jquery.js',
                        '/backend/js/vendor/jquery.cookie.js',
                        '/backend/js/vendor/chosen/chosen.jquery.js',
                        '/backend/js/vendor/jquery.datetimepicker.full.js',
                        '/backend/js/foundation.min.js',
                        '/backend/js/mcwork.language.js',
                        '/backend/js/mcwork.app.js',
                        '/backend/js/mcwork.form.js',
                    )
                ), 
                               
                
                'mcworkmapforms' => array(
                    'debug' => false,
                    'area' => 'inline',
                    'type' => 'js',
                    'attr' => array( 'type' => 'text/javascript'),
                    'assets' => array(
                        '/backend/js/vendor/jquery.js',
                        '/backend/js/vendor/jquery.cookie.js',
                        '/backend/js/vendor/chosen/chosen.jquery.js',
                        '/backend/js/vendor/map/locationpicker.jquery.js',
                        '/backend/js/vendor/map/maps.js',
                        '/backend/js/foundation.min.js',
                        '/backend/js/mcwork.language.js',
                        '/backend/js/mcwork.app.js',
                        '/backend/js/mcwork.form.js',
                    )
                ), 
                
                'mcworkformsaccounts' => array(
                    'debug' => false,
                    'area' => 'inline',
                    'type' => 'js',
                    'attr' => array( 'type' => 'text/javascript'),
                    'assets' => array(
                        '/backend/js/vendor/jquery.js',
                        '/backend/js/vendor/jquery.cookie.js',
                        '/backend/js/vendor/chosen/chosen.jquery.js',
                        '/backend/js/vendor/map/locationpicker.jquery.js',
                        '/backend/js/vendor/map/maps.js',                        
                        '/backend/js/foundation.min.js',
                        '/backend/js/mcwork.language.js',
                        '/backend/js/mcwork.app.js',
                        '/backend/js/mcwork.form.js',
                        '/backend/js/mcwork.explorer.js',
                        '/backend/js/vendor/tinymce/smalleditor.js',
                    )
                ),  
                
                'mcworkformstinymcesmallexlp' => array(
                    'debug' => false,
                    'area' => 'inline',
                    'type' => 'js',
                    'attr' => array( 'type' => 'text/javascript'),
                    'assets' => array(
                        '/backend/js/vendor/jquery.js',
                        '/backend/js/vendor/jquery.cookie.js',
                        '/backend/js/vendor/chosen/chosen.jquery.js',
                        '/backend/js/foundation.min.js',
                        '/backend/js/mcwork.language.js',
                        '/backend/js/mcwork.app.js',
                        '/backend/js/mcwork.form.js',
                        '/backend/js/mcwork.explorer.js',
                        '/backend/js/vendor/tinymce/smalleditor.js',
                    )
                ),                
                
                'mcworkformstinymcesmall' => array(
                    'debug' => false,
                    'area' => 'inline',
                    'type' => 'js',
                    'attr' => array( 'type' => 'text/javascript'),
                    'assets' => array(
                        '/backend/js/vendor/jquery.js',
                        '/backend/js/vendor/jquery.cookie.js',
                        '/backend/js/vendor/chosen/chosen.jquery.js',
                        '/backend/js/foundation.min.js',
                        '/backend/js/mcwork.language.js',
                        '/backend/js/mcwork.app.js',
                        '/backend/js/mcwork.form.js',
                        '/backend/js/vendor/tinymce/smalleditor.js',
                    )
                ), 
                
                'mcworkformscontent' => array(
                    
                    'debug' => false,
                    'area' => 'inline',
                    'type' => 'js',
                    'attr' => array( 'type' => 'text/javascript'),
                    'assets' => array(
                        '/backend/js/vendor/jquery.js',
                        '/backend/js/vendor/jquery.cookie.js',
                        '/backend/js/vendor/chosen/chosen.jquery.js',
                        '/backend/js/vendor/jquery.datetimepicker.full.js',
                        '/backend/js/foundation.min.js',
                        '/backend/js/mcwork.language.js',
                        '/backend/js/mcwork.app.js',
                        '/backend/js/mcwork.form.js',
                        '/backend/js/mcwork.explorer.js',
                        '/backend/js/mcwork.plugins.js',
                        '/backend/js/vendor/tinymce/content.js',
                    )                    
                    
                ),
                
                
                'mcworkfilegroupindexform' => array(
                    'debug' => false,
                    'area' => 'inline',
                    'type' => 'js',
                    'attr' => array( 'type' => 'text/javascript'),
                    'assets' => array(
                        '/backend/js/vendor/jquery.js',
                        '/backend/js/vendor/jquery.cookie.js',
                        '/backend/js/vendor/chosen/chosen.jquery.js',
                        '/backend/js/foundation.min.js',
                        '/backend/js/mcwork.language.js',
                        '/backend/js/mcwork.app.js',
                        '/backend/js/mcwork.form.js',
                        '/backend/js/mcwork.explorer.js',
                        '/backend/js/mcwork.filegrp.js',
                    )
                ),                
                
                'mcworkformsblogadd' => array(
                
                    'debug' => false,
                    'area' => 'inline',
                    'type' => 'js',
                    'attr' => array( 'type' => 'text/javascript'),
                    'assets' => array(
                        '/backend/js/vendor/jquery.js',
                        '/backend/js/vendor/jquery.cookie.js',
                        '/backend/js/vendor/chosen/chosen.jquery.js',
                        '/backend/js/vendor/jquery.datetimepicker.full.js',
                        '/backend/js/foundation.min.js',
                        '/backend/js/mcwork.language.js',
                        '/backend/js/mcwork.app.js',
                        '/backend/js/mcwork.form.js',
                        '/backend/js/mcwork.explorer.js',
                        '/backend/js/mcwork.plugins.js',
                        '/backend/js/vendor/tinymce/blog.js',
                        '/backend/js/vendor/tinymce/articlesettings.js',
                    )
                
                ),  
                
                'mcworkformsblog' => array(
                
                    'debug' => false,
                    'area' => 'inline',
                    'type' => 'js',
                    'attr' => array( 'type' => 'text/javascript'),
                    'assets' => array(
                        '/backend/js/vendor/jquery.js',
                        '/backend/js/vendor/jquery.cookie.js',
                        '/backend/js/vendor/chosen/chosen.jquery.js',
                        '/backend/js/vendor/jquery.datetimepicker.full.js',
                        '/backend/js/foundation.min.js',
                        '/backend/js/mcwork.language.js',
                        '/backend/js/mcwork.app.js',
                        '/backend/js/mcwork.form.js',
                        '/backend/js/mcwork.explorer.js',
                        '/backend/js/mcwork.plugins.js',
                        '/backend/js/vendor/tinymce/blog.js',
                    )
                
                ),                

                'mcworkfiles' => array(
                    'debug' => false,
                    'area' => 'inline',
                    'type' => 'js',
                    'attr' => array( 'type' => 'text/javascript'),
                    'assets' => array(
                        '/backend/js/vendor/jquery.js',
                        '/backend/js/vendor/jquery.cookie.js',                       
                        '/backend/js/foundation.min.js',
                        '/backend/js/vendor/datatables/jquery.dataTables.js',
                        '/backend/js/vendor/datatables/dataTables.foundation.js',
                        '/backend/js/mcwork.language.js',
                        '/backend/js/mcwork.app.js',
                        '/backend/js/mcwork.files.js',
                    )
                ),
                
                'mcworkcache' => array(             
                    'debug' => false,
                    'area' => 'inline',
                    'type' => 'js',
                    'attr' => array( 'type' => 'text/javascript'),
                    'assets' => array(
                        '/backend/js/vendor/jquery.js',
                        '/backend/js/vendor/jquery.cookie.js',
                        '/backend/js/foundation.min.js',
                        '/backend/js/vendor/datatables/jquery.dataTables.js',
                        '/backend/js/vendor/datatables/dataTables.foundation.js',
                        '/backend/js/mcwork.language.js',
                        '/backend/js/mcwork.app.js',
                        '/backend/js/mcwork.files.js',
                        '/backend/js/mcwork.cache.js',
                    )                                       
                ),
                
                'mcworkassetsfiles' => array(
                    'debug' => false,
                    'area' => 'inline',
                    'type' => 'js',
                    'attr' => array( 'type' => 'text/javascript'),
                    'assets' => array(
                        '/backend/js/vendor/jquery.js',
                        '/backend/js/vendor/jquery.cookie.js',
                        '/backend/js/foundation.min.js',
                        '/backend/js/vendor/datatables/jquery.dataTables.js',
                        '/backend/js/vendor/datatables/dataTables.foundation.js',
                        '/backend/js/mcwork.language.js',
                        '/backend/js/mcwork.app.js',
                        '/backend/js/mcwork.files.js',
                        '/backend/js/mcwork.assets.js',
                    )
                ),                
                
                'mcworkwookmark' => array(
                    'debug' => false,
                    'area' => 'inline',
                    'type' => 'js',
                    'attr' => array( 'type' => 'text/javascript'),
                    'assets' => array(
                        '/backend/js/vendor/jquery.js',
                        '/backend/js/vendor/jquery.cookie.js',
                        '/backend/js/vendor/wookmark/imagesloaded.pkgd.min.js',
                        '/backend/js/vendor/wookmark/wookmark.min.js',                        
                        '/backend/js/foundation.min.js',
                        '/backend/js/mcwork.language.js',
                        '/backend/js/mcwork.app.js',
                        '/backend/js/mcwork.files.js',
                        '/backend/js/mcwork.wookmarkserver.js',
                    )
                ),                
                
                'mcworkfilesdenied' => array(
                    'debug' => false,
                    'area' => 'inline',
                    'type' => 'js',
                    'attr' => array( 'type' => 'text/javascript'),
                    'assets' => array(
                        '/backend/js/vendor/jquery.js',
                        '/backend/js/vendor/jquery.cookie.js',
                        '/backend/js/vendor/jquery-ui-autocomplete.js',
                        '/backend/js/vendor/upload/jquery.file-ajax.js',
                        '/backend/js/vendor/tagging/mcwork.tagging.js',
                        '/backend/js/foundation.min.js',
                        '/backend/js/vendor/datatables/jquery.dataTables.js',
                        '/backend/js/vendor/datatables/dataTables.foundation.js',
                        '/backend/js/mcwork.language.js',
                        '/backend/js/mcwork.app.js',
                        '/backend/js/mcwork.upload.js',
                        '/backend/js/mcwork.tagging.js',
                        '/backend/js/mcwork.files.js',
                        '/backend/js/mcwork.table.js',
                    )
                ),                
                
                'mcworkfiledropzone' => array(
                    
                    'debug' => false,
                    'area' => 'inline',
                    'type' => 'js',
                    'attr' => array( 'type' => 'text/javascript'),
                    'assets' => array(
                        '/backend/js/vendor/jquery.js',
                        '/backend/js/vendor/jquery.cookie.js',
                        '/backend/js/vendor/upload/dropzone.js',
                        '/backend/js/foundation.min.js',
                        '/backend/js/vendor/datatables/jquery.dataTables.js',
                        '/backend/js/vendor/datatables/dataTables.foundation.js',
                        '/backend/js/mcwork.language.js',
                        '/backend/js/mcwork.app.js',
                        '/backend/js/mcwork.files.js',
                        '/backend/js/mcwork.makefilegrp.js',
                    )                    
                    
                ),
                
            )
        ),
    ),
    '/mcwork/dashboard' => array(
        'resource' => 'authorresource',
        'metaTitle' => 'Dashboard',
        'template' => 'content/dashboard/index',
        'toolbar' => 1,
        'tableedit' => 1,        
        'bodyId' => 'mcworkdashboard',
        'pageContent' => array(
            'headline' => 'Dashboard',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Dashboard',
            'entity' => 'Contentinum\Entity\WebContent',           
        ),
        'assets' => array(
            'sets' => array('mcworkdashboradstyles','mcworkhead','mcworkdashboard'),
        ),        
        
    ),
    
    
    '/mcwork/dashboard/tabledata' => array(
        'resource' => 'authorresource',
        'template' => 'content/dashboard/tabledata',
        'toolbar' => 1,
        'tableedit' => 1,        
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Dashboard\Datatable',
            'entity' => 'Contentinum\Entity\WebContent',
            'services' => array(
                'pages' => 'mcwork_pageurls',
            ),
        ),
    ), 
    
    '/mcwork/validate/changes' => array(
        'resource' => 'authorresource',
        'template' => 'content/service/validate',
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Model\Publish\Validation',
        ),        
    ),
    
    
    '/mcwork/version' => array(
        'resource' => 'authorresource',
        'metaTitle' => 'Version',
        'template' => 'content/dashboard/version',
        'bodyId' => 'mcworkdashboard',
        'pageContent' => array(
            'headline' => 'Version',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Versions',
            'entity' => 'Contentinum\Entity\WebPreferences',
        ),
        'assets' => array(
            'sets' => array('mcworkstyles','mcworkhead', 'mcworkcore'),
        ),
    
    ),    
    
    
    
    '/mcwork/pages' => array(
        'resource' => 'publisherresource',
        'metaTitle' => 'Pages',
        'template' => 'content/pages/pagesindex',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'Pages',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Pages\PageIndex',
            'entity' => 'Contentinum\Entity\WebPagesParameter'
        ),
        'assets' => array(
            'sets' => array('mcworktablestyles','mcworkhead','mcworktablescripts'),
        ),
    ),    
    
    '/mcwork/pages/add' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'add_Pages',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'add_Pages',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\Pages\SavePage',
            'entity' => 'Contentinum\Entity\WebPagesParameter',
            'targetentities' => array(
                'webPreferences' => 'Contentinum\Entity\WebPreferences',
                'webNavigations' => 'Contentinum\Entity\WebNavigations',
                'webPages' => 'Contentinum\Entity\WebPagesParameter',
            ),            
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\PageAddForm',
            'formaction' => '/mcwork/pages/add',
            'formattributes' => array(
                'data-rules' => 'pages',
                'data-process' => 'add',
            ),
            'populate' => array(
                'resource' => 'index',
                'webPreferences' => '1',
                'robots' => 'index,follow',
                'language' => 'de',
                'publish' => 'yes',
            ),            
            
            'settoroute' => '/mcwork/pages',

        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ),    
    
    '/mcwork/pages/edit' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'edit_Pages',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'edit_Pages',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Pages\SavePage',
            'entity' => 'Contentinum\Entity\WebPagesParameter',
            'targetentities' => array(
                'webPreferences' => 'Contentinum\Entity\WebPreferences',
                'webNavigations' => 'Contentinum\Entity\WebNavigations',
                'webPages' => 'Contentinum\Entity\WebPagesParameter',
            ),
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\PageEditForm',
            'formaction' => '/mcwork/pages/edit',
            'formattributes' => array(
                'data-rules' => 'pages',
                'data-process' => 'edit',
            ),

    
            'settoroute' => '/mcwork/pages',
    
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ),    
    
    
    '/mcwork/pages/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Delete\EntriesPublish',
            'entity' => 'Contentinum\Entity\WebPagesParameter',
            'hasEntries' => array(
                'webPages' => array(
                    'tablename' => 'Contentinum\Entity\WebPagesContent',
                    'column' => 'webPages'
                ),
    
                'webPages2' => array(
                    'tablename' => 'Contentinum\Entity\WebNavigationTree',
                    'column' => 'webPages'
                )
            ),
    
            'settoroute' => '/mcwork/pages'
        )
    ),  
    
    '/mcwork/pageattribute' => array(
        'resource' => 'publisherresource',
        'metaTitle' => 'PageAttribute',
        'template' => 'content/pages/attributesindex',
        'layout' => 'mcwork/layout/admin',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'PageAttribute',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Pages\Attribute',
            'entity' => 'Contentinum\Entity\WebPagesAttributes'
        ),
        'assets' => array(
            'sets' => array('mcworktablestyles','mcworkhead','mcworktablescripts'),
        ),        
    ),   
    
    '/mcwork/pageattribute/add' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'add_PageAttribute',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'add_PageAttribute',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\Pages\SaveAttribute',
            'entity' => 'Contentinum\Entity\WebPagesAttributes',
            'targetentities' => array(
                'webPages' => 'Contentinum\Entity\WebPagesParameter',
            ),
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\PageAttributeForm',
            'formaction' => '/mcwork/pageattribute/add',
            'formattributes' => array(
                'data-rules' => 'pageattribute',
                'data-process' => 'add',
            ),
            'populate' => array(
                'charset' => 'utf-8',
                'metaViewport' => 'width=device-width, initial-scale=1.0',
            ),
    
            'settoroute' => '/mcwork/pageattribute',
    
        ),
        'assets' => array(
            'sets' => array('mcworkformstylesdtpick','mcworkhead','mcworkformsdtpick'),
        ),
    ),
    
    
    '/mcwork/pageattribute/edit' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'edit_PageAttribute',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'edit_PageAttribute',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Pages\SaveAttribute',
            'entity' => 'Contentinum\Entity\WebPagesAttributes',
            'targetentities' => array(
                'webPages' => 'Contentinum\Entity\WebPagesParameter',
            ),
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\PageAttributeForm',
            'formaction' => '/mcwork/pageattribute/edit',
            'formattributes' => array(
                'data-rules' => 'pageattribute',
                'data-process' => 'edit',
            ),   
            'settoroute' => '/mcwork/pageattribute',
    
        ),
        'assets' => array(
            'sets' => array('mcworkformstylesdtpick','mcworkhead','mcworkformsdtpick'),
        ),
    ),    

    '/mcwork/pageattribute/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Delete\Entries',
            'entity' => 'Contentinum\Entity\WebPagesAttributes',
            'settoroute' => '/mcwork/pageattribute'
        )
    ), 
    
    '/mcwork/links' => array(
        'resource' => 'publisherresource',
        'metaTitle' => 'Links',
        'template' => 'content/pages/linksindex',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'Links',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Pages\Links',
            'entity' => 'Contentinum\Entity\WebPagesParameter'
        ),
        'assets' => array(
            'sets' => array('mcworktablestyles','mcworkhead','mcworktablescripts'),
        ),
    ),
    
    '/mcwork/links/add' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'add_Links',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'add_Links',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\Pages\SaveLinks',
            'entity' => 'Contentinum\Entity\WebPagesParameter',
            'targetentities' => array(
                'webPreferences' => 'Contentinum\Entity\WebPreferences',
            ),
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\LinksForm',
            'formaction' => '/mcwork/links/add',
            'formattributes' => array(
                'data-rules' => 'links',
                'data-process' => 'add',
            ),
            'populate' => array(
                'resource' => 'index',
                'webPreferences' => '1',
                'robots' => 'index,follow',
                'publish' => 'yes',
            ),
    
            'settoroute' => '/mcwork/links',
    
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ),  
    
    '/mcwork/links/edit' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'edit_Links',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'edit_Links',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Pages\SaveLinks',
            'entity' => 'Contentinum\Entity\WebPagesParameter',
            'targetentities' => array(
                'webPreferences' => 'Contentinum\Entity\WebPreferences',
            ),
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\LinksForm',
            'formaction' => '/mcwork/links/edit',
            'formattributes' => array(
                'data-rules' => 'links',
                'data-process' => 'edit',
            ),
    
            'settoroute' => '/mcwork/links',
    
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ),   
    
    '/mcwork/links/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Delete\EntriesPublish',
            'entity' => 'Contentinum\Entity\WebPagesParameter',
    
            'hasEntries' => array(
    
                'webPages' => array(
                    'tablename' => 'Contentinum\Entity\WebNavigationTree',
                    'column' => 'webPages'
                )
            ),
    
            'settoroute' => '/mcwork/links'
        )
    ),
    
    '/mcwork/pageheader' => array(
        'resource' => 'publisherresource',
        'metaTitle' => 'Headlinks',
        'template' => 'content/pages/headlinksindex',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'Headlinks',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Pages\Headlinks',
            'entity' => 'Contentinum\Entity\WebPagesHeadlinks'
        ),
        'assets' => array(
            'sets' => array('mcworktablestyles','mcworkhead','mcworktablescripts'),
        ),
    ),
    
    '/mcwork/pageheader/add' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'add_Headlinks',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'add_Headlinks',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\Pages\SaveHeaderLinks',
            'entity' => 'Contentinum\Entity\WebPagesHeadlinks',
            'targetentities' => array(
                'webPages' => 'Contentinum\Entity\WebPagesParameter',
                'webMedias' => 'Contentinum\Entity\WebMedias',
            ),
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\PageHeadLinksForm',
            'formaction' => '/mcwork/pageheader/add',
            'formattributes' => array(
                'data-rules' => 'links',
                'data-process' => 'add',
            ),
    
            'settoroute' => '/mcwork/pageheader',
    
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ), 
    
    '/mcwork/pageheader/addfeed' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'Feedlink einfügen',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'Feedlink einfügen',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\Pages\SaveFeedLinks',
            'entity' => 'Contentinum\Entity\WebPagesHeadlinks',
            'targetentities' => array(
                'webPages' => 'Contentinum\Entity\WebPagesParameter',
                'namegroup' => 'Contentinum\Entity\WebContentNameGroup',
            ),
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\PageHeadFeedsForm',
            'formaction' => '/mcwork/pageheader/addfeed',
            'formattributes' => array(
                'data-rules' => 'feedlink',
                'data-process' => 'add',
            ),
    
            'settoroute' => '/mcwork/pageheader',
    
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ), 
    
    '/mcwork/pageheader/addfont' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'Feedlink einfügen',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'Feedlink einfügen',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\Pages\SaveFontLink',
            'entity' => 'Contentinum\Entity\WebPagesHeadlinks',
            'targetentities' => array(
                'webPages' => 'Contentinum\Entity\WebPagesParameter',
            ),
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\PageHeadFontForm',
            'formaction' => '/mcwork/pageheader/addfont',
            'formattributes' => array(
                'data-rules' => 'fontlink',
                'data-process' => 'add',
            ),
    
            'settoroute' => '/mcwork/pageheader',
    
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ), 
    
    '/mcwork/pageheader/addsitemap' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'Sitemaplink einfügen',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'Sitemaplink einfügen',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\Pages\SaveSitemapLink',
            'entity' => 'Contentinum\Entity\WebPagesHeadlinks',
            'targetentities' => array(
                'webPages' => 'Contentinum\Entity\WebPagesParameter',
            ),
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\PageHeadSitemapForm',
            'formaction' => '/mcwork/pageheader/addsitemap',
            'formattributes' => array(
                'data-rules' => 'sitemaplink',
                'data-process' => 'add',
            ),
    
            'settoroute' => '/mcwork/pageheader',
    
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ),    
    
    '/mcwork/pageheader/edit' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'edit_Headlinks',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'edit_Headlinks',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Pages\SaveHeaderLinks',
            'entity' => 'Contentinum\Entity\WebPagesHeadlinks',
            'targetentities' => array(
                'webPages' => 'Contentinum\Entity\WebPagesParameter',
                'webMedias' => 'Contentinum\Entity\WebMedias',
            ),
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\PageHeadLinksForm',
            'formaction' => '/mcwork/pageheader/edit',
            'formattributes' => array(
                'data-rules' => 'links',
                'data-process' => 'edit',
            ),
    
            'settoroute' => '/mcwork/pageheader',
    
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ),  
    
    '/mcwork/pageheader/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Pages\DeleteHeadlinks',
            'entity' => 'Contentinum\Entity\WebPagesHeadlinks',
            'settoroute' => '/mcwork/pageheader'
        )
    ),
    
    
    '/mcwork/navigation' => array(
        'resource' => 'publisherresource',
        'metaTitle' => 'Navigation',
        'template' => 'content/navigation/treeindex',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'Navigation',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Navigation\Trees',
            'entity' => 'Contentinum\Entity\WebNavigations'
        ),
        'assets' => array(
            'sets' => array('mcworktablestyles','mcworkhead','mcworktablescripts'),
        ),
    ),
    
    '/mcwork/navigation/add' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'add_Navigation',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'add_Navigation',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\Navigation\SaveNavigation',
            'entity' => 'Contentinum\Entity\WebNavigations',
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\NavigationAddForm',
            'formaction' => '/mcwork/navigation/add',
            'formattributes' => array(
                'data-rules' => 'navigation',
                'data-process' => 'add',
            ),
            'populate' => array(
                'menue' => 'helper'
            ),
            'settoroute' => '/mcwork/navigation',
    
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ),    
    
    '/mcwork/navigation/edit' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'edit_Navigation',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'edit_Navigation',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Navigation\SaveNavigation',
            'entity' => 'Contentinum\Entity\WebNavigations',
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\NavigationEditForm',
            'formaction' => '/mcwork/navigation/edit',
            'formattributes' => array(
                'data-rules' => 'navigation',
                'data-process' => 'edit',
            ),
    
            'settoroute' => '/mcwork/navigation',
    
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ), 
    
    '/mcwork/navigation/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Navigation\DeleteNavigation',
            'entity' => 'Contentinum\Entity\WebNavigations',
            'hasEntries' => array(
                'webNavigations' => array(
                    'tablename' => 'Contentinum\Entity\WebNavigationTree',
                    'column' => 'webNavigations'
                ),
            ),
            'settoroute' => '/mcwork/navigation'
        )
    ),
    
    
    '/mcwork/menue/category' => array(
        'resource' => 'publisherresource',
        'metaTitle' => 'Menus',
        'template' => 'content/navigation/menuindex',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'Menus',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Navigation\Menu',
            'entity' => 'Contentinum\Entity\WebNavigationTree'
        ),
        'assets' => array(
            'sets' => array('mcworktablestyles','mcworkhead','mcworktablemenuscripts'),
        ),
    ),
    
    '/mcwork/menue/add' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'add_Menu',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'add_Menu',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\Navigation\SaveMenu',
            'entity' =>  'Contentinum\Entity\WebNavigationTree',
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\NavigationMenuForm',
            'formaction' => '/mcwork/menue/add',
            'formattributes' => array(
                'data-rules' => 'navigationcategories',
                'data-process' => 'add',
            ),
            'targetentities' => array(
                'webPages' => 'Contentinum\Entity\WebPagesParameter',
                'webNavigations' => 'Contentinum\Entity\WebNavigations',
            ),    
            'settoroute' => '/mcwork/menue',
            'populate' => array(
                'resource' => 'index',
                'publish' => 'yes',
            ),
            'populateFromRoute' => array('category' => 'webNavigations'),
    
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ), 
    
    '/mcwork/menue/edit' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'edit_Menu',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'edit_Menu',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Navigation\SaveMenu',
            'entity' =>  'Contentinum\Entity\WebNavigationTree',
            'targetentities' => array(
                'webPages' => 'Contentinum\Entity\WebPagesParameter',
                'webNavigations' => 'Contentinum\Entity\WebNavigations',
            ),            
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\NavigationMenuForm',
            'formaction' => '/mcwork/menue/edit',
            'formattributes' => array(
                'data-rules' => 'navigationcategories',
                'data-process' => 'edit',
            ),

            'settoroute' => '/mcwork/menue',
    
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ), 
    
    '/mcwork/menue/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Delete\EntriesPublish',
            'entity' => 'Contentinum\Entity\WebNavigationTree',
            'settoroute' => '/mcwork/menue',
        )
    ), 
    
    '/mcwork/contribution' => array(
        'resource' => 'publisherresource',
        'metaTitle' => 'Contribution',
        'template' => 'content/content/contributionindex',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'Contribution',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Content\Contribution',
            'entity' => 'Contentinum\Entity\WebContent',
            'services' => array(
                'pages' => 'mcwork_pagelabels',
            ),            
        ),
        'assets' => array(
            'sets' => array('mcworktablestyles','mcworkhead','mcworktablescripts'),
        ),
    ), 
    
    '/mcwork/contribution/trashcontent' => array(
        'resource' => 'publisherresource',
        'metaTitle' => 'Contribution Trash',
        'template' => 'content/content/trashindex',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'Contribution Trash',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Content\Trash',
            'entity' => 'Contentinum\Entity\WebContent',
        ),
        'assets' => array(
            'sets' => array('mcworktablestyles','mcworkhead','mcworktablescripts'),
        ),
    ),    
    
    '/mcwork/contribution/add' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'add_Contribution',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'bodyFooterScript' => array(
            'prepend' => array(
                '/assets/app/tinymce/js/tinymce/tinymce.min.js',
            ),
        ),
        'pageContent' => array(
            'headline' => 'add_Contribution',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\Content\SaveContribution',
            'entity' => 'Contentinum\Entity\WebContent',
            'targetentities' => array(
                'webPages' => 'Contentinum\Entity\WebPagesParameter',
                'webContentgroup' => 'Contentinum\Entity\WebContentGroups',
                'webMediasId' => 'Contentinum\Entity\WebMedias',
            ),
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\ContributionForm',
            'formaction' => '/mcwork/contribution/add',
            'settoroute' => '/mcwork/contribution',
            'formattributes' => array(
                'data-rules' => 'contribution',
                'data-process' => 'add',
            ),
            'populate' => array(
                'resource' => 'index',
                'webMediasId' => '1',
                'htmlwidgets' => 'content',
                'adjustments' => 'CONTENT',
                'mediaStyle' => 'media-image',
                'publish' => 'yes',
            ),
            'settoroute' => '/mcwork/contribution'
        ),
        'assets' => array(
            'sets' => array('mcworkformstylescontent','mcworkhead','mcworkformscontent'),
        ),
    ), 
    
    '/mcwork/contribution/recycle' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'recycle_Contribution',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'bodyFooterScript' => array(
            'prepend' => array(
                '/assets/app/tinymce/js/tinymce/tinymce.min.js',
            ),
        ),
        'pageContent' => array(
            'headline' => 'recycle_Contribution',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Content\RecycleContribution',
            'entity' => 'Contentinum\Entity\WebContent',
            'targetentities' => array(
                'webPages' => 'Contentinum\Entity\WebPagesParameter',
                'webContentgroup' => 'Contentinum\Entity\WebContentGroups',
                'webMediasId' => 'Contentinum\Entity\WebMedias',
            ),
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\ContributionForm',
            'formaction' => '/mcwork/contribution/recycle',
            'settoroute' => '/mcwork/contribution',
            'formattributes' => array(
                'data-rules' => 'contribution',
                'data-process' => 'recycle',
            ),
            'populate' => array(
                'resource' => 'index',
                'webMediasId' => '1',
                //'htmlwidgets' => 'content',
                'adjustments' => 'CONTENT',
                'mediaStyle' => 'media-image',
                'publish' => 'yes',
            ),
            'settoroute' => '/mcwork/contribution/trashcontent'
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkformscontent'),
        ),
    ),    
    
    
    '/mcwork/contribution/edit' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'edit_Contribution',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'bodyFooterScript' => array(
            'prepend' => array(
                '/assets/app/tinymce/js/tinymce/tinymce.min.js',
            ),
        ),
        'pageContent' => array(
            'headline' => 'edit_Contribution',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Content\SaveContribution',
            'entity' => 'Contentinum\Entity\WebContent',
            'targetentities' => array(
                'webContentgroup' => 'Contentinum\Entity\WebContentGroups',
                'webMediasId' => 'Contentinum\Entity\WebMedias',
            ),
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\ContributionEditForm',
            'formaction' => '/mcwork/contribution/edit',
            'settoroute' => '/mcwork/contribution',
            'formattributes' => array(
                'data-rules' => 'contribution',
                'data-process' => 'edit',
            ),
            'populateFromFactory' => array(
                'mcwork_contribution_page' => array('populate' => 'webPages', 'query' => 'web_content_id', 'result' => 'web_pages_id')
            ),
            'settoroute' => '/mcwork/contribution'
        ),
        'assets' => array(
            'sets' => array('mcworkformstylescontent','mcworkhead','mcworkformscontent'),
        ),
    ), 
    
    '/mcwork/contribution/trash' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Content\TrashContribution',
            'entity' => 'Contentinum\Entity\WebContent',
    
            'settoroute' => '/mcwork/contribution'
        )
    ),
    
    
    '/mcwork/contribution/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Delete\Force',
            'entity' => 'Contentinum\Entity\WebContent',
    
            'settoroute' => '/mcwork/contribution'
        )
    ),   
    
    '/mcwork/pagecontent' => array(
        'resource' => 'publisherresource',
        'metaTitle' => 'contributionProperties',
        'template' => 'content/content/pagecontentindex',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'contributionProperties',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Content\Page',
            'entity' => 'Contentinum\Entity\WebPagesContent'
        ),
        'assets' => array(
            'sets' => array('mcworktablestyles','mcworkhead','mcworktablescripts'),
        ),
    ), 
    
     '/mcwork/pagecontent/category' => array(
        'resource' => 'publisherresource',
        'metaTitle' => 'sort_Contribution',
        'template' => 'content/content/contributionsort',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'sort_Contribution',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Content\ContributionSort',
            'entity' => 'Contentinum\Entity\WebPagesContent'
        ),
        'assets' => array(
            'sets' => array('mcworktablestyles','mcworkhead','mcworktablescripts'),
        ),
    ),
    
    '/mcwork/pagecontent/add' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'add_Properties',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'add_Properties',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\Content\SaveAddContribution',
            'entity' => 'Contentinum\Entity\WebPagesContent',
            'targetentities' => array(
                'webPages' => 'Contentinum\Entity\WebPagesParameter',
            ),
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\ContentPageAddForm',
            'formaction' => '/mcwork/pagecontent/add',
            'formattributes' => array(
                'data-rules' => 'pagecontent',
                'data-process' => 'edit',
            ),
            'populateFromRoute' => array('category' => 'ident'),
            'setcategrory' => 'no',
            'settoroute' => '/mcwork/pagecontent'
    
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ),    
    
    '/mcwork/pagecontent/edit' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'edit_Properties',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'edit_Properties',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Content\SaveContributionGroup',
            'entity' => 'Contentinum\Entity\WebPagesContent',
            'targetentities' => array(
                'webPages' => 'Contentinum\Entity\WebPagesParameter',
            ),            
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\ContentPageForm',
            'formaction' => '/mcwork/pagecontent/edit',
            'formattributes' => array(
                'data-rules' => 'pagecontent',
                'data-process' => 'edit',
            ),
            'settoroute' => '/mcwork/pagecontent'
    
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ),
    
    '/mcwork/contentgroup/edit' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'edit_Contentgroup',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'edit_Contentgroup',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Content\SaveContentGroups',
            'entity' => 'Contentinum\Entity\WebContentGroups',
            'targetentities' => array(
                'webPages' => 'Contentinum\Entity\WebPagesParameter',
            ),
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\ContentPageGroup',
            'formaction' => '/mcwork/contentgroup/edit',
            'formattributes' => array(
                'data-rules' => 'contentgroup',
                'data-process' => 'edit',
            ),
            'settoroute' => '/mcwork/pagecontent'
    
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ),
    
    '/mcwork/contentgroup/category' => array(
        'resource' => 'publisherresource',
        'metaTitle' => 'sort_Contentgroup',
        'template' => 'content/content/groupcategoriessort',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'sort_Contentgroup',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Content\GroupCategories',
            'entity' => 'Contentinum\Entity\WebContentGroups'
        ),
        'assets' => array(
            'sets' => array('mcworktablestyles','mcworkhead','mcworktablescripts'),
        ),
    ), 
    
    '/mcwork/contentgroup/dissolve' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Content\DissolveGroup',
            'entity' => 'Contentinum\Entity\WebPagesContent',
    
            'settoroute' => '/mcwork/pagecontent'
        )
    ),
    
    '/mcwork/article' => array(
        'resource' => 'publisherresource',
        'metaTitle' => 'News or Blog Article',
        'template' => 'content/blog/articleindex',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'News or Blog Article',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Blog\Article',
            'entity' => 'Contentinum\Entity\WebContentGroups',
            'services' => array(
                'categories' => 'mcwork_article_category',
            ),            
        ),
        'assets' => array(
            'sets' => array('mcworktablestyles','mcworkhead','mcworktablescripts'),
        ),
    ),    
    
    '/mcwork/article/add' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'add_Article',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'bodyFooterScript' => array(
            'prepend' => array(
                '/assets/app/tinymce/js/tinymce/tinymce.min.js',
            ),
        ),        
        'pageContent' => array(
            'headline' => 'add_Article',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\Blog\SaveArticle',
            'entity' => 'Contentinum\Entity\WebContent',
            'targetentities' => array(
                'webContentgroup' => 'Contentinum\Entity\WebContentGroups',
                'webMediasId' => 'Contentinum\Entity\WebMedias',
            ),  
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\ArticleForm',
            'formaction' => '/mcwork/article/add',
            'formattributes' => array(
                'data-rules' => 'news',
                'data-process' => 'add',
            ),
            'populate' => array(
                'resource' => 'index',
				'webMediasId' => '1',
				'htmlwidgets' => 'content',
				'mediaStyle' => 'media-image',
				'publish' => 'yes',
            ),
            'settoroute' => '/mcwork/article'
    
        ),
        'assets' => array(
            'sets' => array('mcworkformblogstyles','mcworkhead','mcworkformsblogadd'),
        ),
    ),  
    
    '/mcwork/article/edit' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'edit_Article',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'bodyFooterScript' => array(
            'prepend' => array(
                '/assets/app/tinymce/js/tinymce/tinymce.min.js',
            ),
        ),
        'pageContent' => array(
            'headline' => 'edit_Article',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Blog\SaveArticle',
            'entity' => 'Contentinum\Entity\WebContent',
            'targetentities' => array(
                'webContentgroup' => 'Contentinum\Entity\WebContentGroups',
                'webMediasId' => 'Contentinum\Entity\WebMedias',
            ),
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\ArticleForm',
            'formaction' => '/mcwork/article/edit',
            'formattributes' => array(
                'data-rules' => 'news',
                'data-process' => 'edit',
            ),
            'populateentity' => array(
                'webContent' => array(
                    'entity' => 'Contentinum\Entity\WebContentGroups',
                    'columns' => array('webContentgroup'),
                ),
            ),   
            'populateFromFactory' => array(
                'mcwork_tags_by_article' => array('populate' => 'contentTags', 'query' => 'web_item_id', 'result' => 'tags')
            ),
            
            'settoroute' => '/mcwork/article'
    
        ),
        'assets' => array(
            'sets' => array('mcworkformblogstyles','mcworkhead','mcworkformsblog'),
        ),
    ),  
    
    '/mcwork/article/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Blog\DeleteArticle',
            'entity' => 'Contentinum\Entity\WebContent',
    
            'settoroute' => '/mcwork/article'
        )
    ),  
    
    '/mcwork/blogcategory' => array(
        'resource' => 'publisherresource',
        'metaTitle' => 'News or Blog categories',
        'template' => 'content/blog/categoriesindex',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'News or Blog categories',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Blog\Categories',
            'entity' => 'Contentinum\Entity\WebTags'
        ),
        'assets' => array(
            'sets' => array('mcworktablestyles','mcworkhead','mcworktablescripts'),
        ),
    ),
    
    '/mcwork/blogcategory/add' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'add_Blogcategory',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'add_Blogcategory',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\Blog\SaveCategory',
            'entity' => 'Contentinum\Entity\WebTags',
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\BlogTagsForm',
            'formaction' => '/mcwork/blogcategory/add',
            'settoroute' => '/mcwork/blogcategory'
    
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ), 
    
    '/mcwork/blogcategory/edit' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'edit_Blogcategory',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'edit_Blogcategory',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Blog\SaveCategory',
            'entity' => 'Contentinum\Entity\WebTags',
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\BlogTagsForm',
            'formaction' => '/mcwork/blogcategory/edit',
            'settoroute' => '/mcwork/blogcategory'
    
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ),
    
    '/mcwork/blogcategory/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Blog\DeleteCategory',
            'entity' =>  'Contentinum\Entity\WebTags',
            
            'hasEntries' => array(
                'webTagId' => array(
                    'tablename' => 'Contentinum\Entity\WebTagAssign',
                    'column' => 'webTagId'
                ),
            ),            
    
            'settoroute' => '/mcwork/blogsettings'
        )
    ),   
    
    '/mcwork/blogsettings' => array(
        'resource' => 'publisherresource',
        'metaTitle' => 'News or Blog Settings',
        'template' => 'content/blog/settingsindex',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'News or Blog Settings',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Blog\Settings',
            'entity' => 'Contentinum\Entity\WebContentGroups'
        ),
        'assets' => array(
            'sets' => array('mcworktablestyles','mcworkhead','mcworktablescripts'),
        ),
    ),
       
        
    '/mcwork/blogsettings/add' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'add_BlogNews',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'add_BlogNews',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\Blog\SaveSettings',
            'entity' => 'Contentinum\Entity\WebContentGroups',
            'targetentities' => array(
                'webContent' => 'Contentinum\Entity\WebContent',
                'webPages' => 'Contentinum\Entity\WebPagesParameter',
            ),            
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\NewsBlogSettingsForm',
            'formaction' => '/mcwork/blogsettings/add',
            'formattributes' => array(
                'data-rules' => 'contributiongroup',
                'data-process' => 'add',
            ),
            'populate' => array(
                'numberCharacterTeaser' => '250',
                'htmlwidgets' => 'news',
                'tplAssign' => 'allcontent',
                
            ),
            'settoroute' => '/mcwork/blogsettings'
    
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ),  
    
    '/mcwork/blogsettings/edit' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'edit_BlogNews',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'edit_BlogNews',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Blog\SaveSettings',
            'entity' => 'Contentinum\Entity\WebContentGroups',
            'targetentities' => array(
                'webContent' => 'Contentinum\Entity\WebContent',
                'webPages' => 'Contentinum\Entity\WebPagesParameter',
            ),
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\NewsBlogSettingsForm',
            'formaction' => '/mcwork/blogsettings/edit',
            'formattributes' => array(
                'data-rules' => 'contributiongroup',
                'data-process' => 'edit',
            ),
            'populateSerializeFields' => array('groupParams'),
            'settoroute' => '/mcwork/blogsettings'
    
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ), 
    
    '/mcwork/blogsettings/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Blog\DeleteSettings',
            'entity' =>  'Contentinum\Entity\WebContentGroups',          
    
            'settoroute' => '/mcwork/blogsettings'
        )
    ), 
    
    
    '/mcwork/bloggroup' => array(
        'resource' => 'publisherresource',
        'metaTitle' => 'News or Blog Groups',
        'template' => 'content/blog/groupindex',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'News or Blog Groups',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Blog\Group',
            'entity' => 'Contentinum\Entity\WebContentNameGroup'
        ),
        'assets' => array(
            'sets' => array('mcworktablestyles','mcworkhead','mcworktablescripts'),
        ),
    ),
    
    '/mcwork/bloggroup/add' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'add_Bloggroup',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'add_Bloggroup',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\Blog\SaveGroup',
            'entity' => 'Contentinum\Entity\WebContentNameGroup',
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\BlogGroupForm',
            'formaction' => '/mcwork/bloggroup/add',
            'settoroute' => '/mcwork/bloggroup'
    
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ),
    
    '/mcwork/bloggroup/edit' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'edit_Bloggroup',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'edit_Bloggroup',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Blog\SaveGroup',
            'entity' => 'Contentinum\Entity\WebContentNameGroup',
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\BlogGroupForm',
            'formaction' => '/mcwork/bloggroup/edit',
            'settoroute' => '/mcwork/bloggroup'
    
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ), 
    
    '/mcwork/bloggroup/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Delete\Entries',
            'entity' => 'Contentinum\Entity\WebContentNameGroup',
    
            'hasEntries' => array(
                'namegroup' => array(
                    'tablename' => 'Contentinum\Entity\WebContentIndexgroup',
                    'column' => 'groups'
                ),
            ),
    
            'settoroute' => '/mcwork/bloggroup'
        )
    ), 
    
    
    '/mcwork/bloggroupindex/category' => array(
        'resource' => 'publisherresource',
        'metaTitle' => 'News or Blog Groupindex',
        'template' => 'content/blog/bloggroupindex',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'News or Blog Groupindex',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Blog\GroupIndex',
            'entity' => 'Contentinum\Entity\WebContentIndexgroup'
        ),
        'assets' => array(
            'sets' => array('mcworktablestyles','mcworkhead','mcworktablescripts'),
        ),
    ), 
    
    '/mcwork/bloggroupindex/add' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'add_Bloggroupindex',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'add_Bloggroupindex',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' =>  'Mcwork\Model\Blog\SaveGroupIndex',
            'entity' => 'Contentinum\Entity\WebContentIndexgroup',
            'targetentities' => array(
                'groups' => 'Contentinum\Entity\WebContentNameGroup',
                'indexgroup' => 'Contentinum\Entity\WebContentGroups',
            ),
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\BlogGroupIndexForm',
            'formaction' => '/mcwork/bloggroupindex/add',
            'settoroute' => '/mcwork/bloggroupindex',
            'populateFromRoute' => array('category' => 'groups'),
    
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ),
        
    '/mcwork/bloggroupindex/edit' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'edit_Bloggroupindex',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'add_Bloggroupindex',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' =>  'Mcwork\Model\Blog\SaveGroupIndex',
            'entity' => 'Contentinum\Entity\WebContentIndexgroup',
                'targetentities' => array(
                    'groups' => 'Contentinum\Entity\WebContentNameGroup',
                    'indexgroup' => 'Contentinum\Entity\WebContentGroups',
                ),
                'formdecorators' => 'mcwork_form_decorators',
                'form' => 'Mcwork\Form\BlogGroupIndexForm',
                'formaction' => '/mcwork/bloggroupindex/edit',
                'settoroute' => '/mcwork/bloggroupindex',
    
            ),
            'assets' => array(
                'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
            ),
      ),  
        
    
    '/mcwork/bloggroupindex/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Delete\Force',
            'entity' => 'Contentinum\Entity\WebContentIndexgroup',
            'settoroute' => '/mcwork/bloggroupindex'
        )
    ),
    
    
    '/mcwork/form' => array(
        'resource' => 'publisherresource',
        'metaTitle' => 'Form',
        'template' => 'content/forms/formindex',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'Form',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Forms\Forms',
            'entity' => 'Contentinum\Entity\WebForms'
        ),
        'assets' => array(
            'sets' => array('mcworktablestyles','mcworkhead','mcworktablescripts'),
        ),
    ),
        
    '/mcwork/form/add' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'add_Form',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'add_Form',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\Forms\SaveForms',
            'entity' => 'Contentinum\Entity\WebForms',
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\DesigningForm',
            'formaction' => '/mcwork/form/add',
            'formattributes' => array(
                'data-rules' => 'form',
                'data-process' => 'add',
            ),
            'populate' => array(
                'resource' => 'index',
            ),
            'settoroute' => '/mcwork/form'
    
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ), 
    
    '/mcwork/form/edit' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'edit_Form',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'edit_Form',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Forms\SaveForms',
            'entity' => 'Contentinum\Entity\WebForms',
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\DesigningForm',
            'formaction' => '/mcwork/form/edit',
            'formattributes' => array(
                'data-rules' => 'form',
                'data-process' => 'edit',
            ),
            'settoroute' => '/mcwork/form'
    
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ), 
    
    '/mcwork/form/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Delete\Entries',
            'entity' => 'Contentinum\Entity\WebForms',
            'hasEntries' => array(
                'webForms' => array(
                    'tablename' => 'Contentinum\Entity\WebFormsField',
                    'column' => 'webForms'
                ),
            ),
    
            'settoroute' => '/mcwork/form'
        )
    ),  
    
    
    '/mcwork/formfields/category' => array(
        'resource' => 'publisherresource',
        'metaTitle' => 'Formfields',
        'template' => 'content/forms/fieldsindex',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'Formfields',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Forms\Fields',
            'entity' => 'Contentinum\Entity\WebFormsField'
        ),
        'assets' => array(
            'sets' => array('mcworktablestyles','mcworkhead','mcworktablescripts'),
        ),
    ),
    
    '/mcwork/formfields/add' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'add_Formfields',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'add_Formfields',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\Forms\SaveFields',
            'entity' => 'Contentinum\Entity\WebFormsField',
            'targetentities' => array(
                'webForms' => 'Contentinum\Entity\WebForms',
                'webMedias' => 'Contentinum\Entity\WebMedias',
            ),            
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\DesigningFieldsForm',
            'formaction' => '/mcwork/formfields/add',
            'formattributes' => array(
                'data-rules' => 'formfields',
                'data-process' => 'add',
            ),
            'settoroute' => '/mcwork/formfields',
            'populate' => array(
                'publish' => 'yes',
                'fieldRequired' => 'no',
                'resource' => 'index',
                'webMedias' => '1'
            ),
            'populateFromRoute' => array('category' => 'webForms'),
    
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ),
    
    
    '/mcwork/formfields/edit' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'edit_Formfields',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'edit_Formfields',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Forms\SaveFields',
            'entity' => 'Contentinum\Entity\WebFormsField',
            'targetentities' => array(
                'webForms' => 'Contentinum\Entity\WebForms',
                'webMedias' => 'Contentinum\Entity\WebMedias',
            ),            
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\DesigningFieldsForm',
            'formaction' => '/mcwork/formfields/edit',
            'formattributes' => array(
                'data-rules' => 'formfields',
                'data-process' => 'edit',
            ),
            'settoroute' => '/mcwork/formfields',
    
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ),
    
    '/mcwork/formfields/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Delete\EntriesPublish',
            'entity' => 'Contentinum\Entity\WebFormsField',
            'settoroute' => '/mcwork/formfields',
            'hasEntries' => array(
                'formField' => array(
                    'tablename' => 'Contentinum\Entity\WebFieldOptions',
                    'column' => 'formField'
                ),
            ),
        )
    ),
    
    
    '/mcwork/fieldsoption/category' => array(
        'resource' => 'publisherresource',
        'metaTitle' => 'Fieldoptions',
        'template' => 'content/forms/fieldoptionsindex',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'Fieldoptions',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Forms\Fieldoptions',
            'entity' => 'Contentinum\Entity\WebFieldOptions'
        ),
        'assets' => array(
            'sets' => array('mcworktablestyles','mcworkhead','mcworktablescripts'),
        ),
    ),
    
    '/mcwork/fieldsoption/add' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'add_Fieldoptions',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'add_Fieldoptions',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\Forms\SaveFieldoptions',
            'entity' => 'Contentinum\Entity\WebFieldOptions',
            'targetentities' => array(
                'formField' => 'Contentinum\Entity\WebFormsField',
            ),            
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\DesigningFieldoptionsForm',
            'formaction' => '/mcwork/fieldsoption/add',
            'formattributes' => array(
                'data-rules' => 'fieldsoption',
                'data-process' => 'add',
            ),
            'settoroute' => '/mcwork/fieldsoption',
            'populateFromRoute' => array('category' => 'formField'),
    
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ),
    
    '/mcwork/fieldsoption/edit' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'edit_Fieldoptions',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'edit_Fieldoptions',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Forms\SaveFieldoptions',
            'entity' => 'Contentinum\Entity\WebFieldOptions',
            'targetentities' => array(
                'formField' => 'Contentinum\Entity\WebFormsField',
            ),
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\DesigningFieldoptionsForm',
            'formaction' => '/mcwork/fieldsoption/edit',
            'formattributes' => array(
                'data-rules' => 'fieldsoption',
                'data-process' => 'add',
            ),
            'settoroute' => '/mcwork/fieldsoption',
            'populateFromRoute' => array('cat' => 'formField'),
    
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ), 
    
    '/mcwork/fieldsoption/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Delete\Entries',
            'entity' => 'Contentinum\Entity\WebFieldOptions',
            'settoroute' => '/mcwork/fieldsoption',
        )
    ), 
    
    
    '/mcwork/maps' => array(
        'resource' => 'publisherresource',
        'metaTitle' => 'Maps',
        'template' => 'content/maps/mapsindex',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'Maps',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Maps\Maps',
            'entity' => 'Contentinum\Entity\WebMaps'
        ),
        'assets' => array(
            'sets' => array('mcworktablestyles','mcworkhead','mcworktablescripts'),
        ),
    ),
    
    '/mcwork/maps/add' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'add_Maps',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'bodyFooterScript' => array(
            'prepend' => array('https://maps.google.com/maps/api/js?libraries=places&key=' . GOOGLE_API_KEY
            ),
        ),        
        'pageContent' => array(
            'headline' => 'add_Maps',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\Maps\SaveMaps',
            'entity' => 'Contentinum\Entity\WebMaps',
            'targetentities' => array(
                'webPagesId' => 'Contentinum\Entity\WebPagesParameter',
            ),            
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\MapsForm',
            'formaction' => '/mcwork/maps/add',
            'formattributes' => array(
                'data-rules' => 'maps',
                'data-process' => 'add',
            ),  
            'populate' => array(
                'centerlatitude' => '51.165691',
                'centerlongitude' => '10.451526000000058',
                'startzoom' => '6',
            ),                      
            'settoroute' => '/mcwork/maps'
    
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkmapforms'),
        ),
    ),
    
    '/mcwork/maps/edit' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'edit_Maps',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'bodyFooterScript' => array(
            'prepend' => array('https://maps.google.com/maps/api/js?libraries=places&key=' . GOOGLE_API_KEY,)
       ),        
        'pageContent' => array(
            'headline' => 'edit_Maps',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Maps\SaveMaps',
            'entity' => 'Contentinum\Entity\WebMaps',
            'targetentities' => array(
                'webPagesId' => 'Contentinum\Entity\WebPagesParameter',
            ),
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\MapsForm',
            'formaction' => '/mcwork/maps/edit',
            'formattributes' => array(
                'data-rules' => 'maps',
                'data-process' => 'edit',
            ),
            'settoroute' => '/mcwork/maps'
    
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkmapforms'),
        ),
    ), 
    
    '/mcwork/maps/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Delete\Entries',
            'entity' => 'Contentinum\Entity\WebMaps',
            'hasEntries' => array(
                'webMaps' => array(
                    'tablename' => 'Contentinum\Entity\WebMapsData',
                    'column' => 'webMaps'
                ),
            ),
    
            'settoroute' => '/mcwork/maps'
        )
    ), 
    
    '/mcwork/mapmarker/category' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'Mapmarker',
        'template' => 'content/maps/markerindex',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'Mapmarker',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Maps\Marker',
            'entity' => 'Contentinum\Entity\WebMapsData'
        ),
        'assets' => array(
            'sets' => array('mcworktablestyles','mcworkhead','mcworktablescripts'),
        ),
    ),
    
    '/mcwork/mapmarker/add' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'add_Mapmarker',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'bodyFooterScript' => array(
            'prepend' => array(
                'https://maps.google.com/maps/api/js?libraries=places&key=' . GOOGLE_API_KEY,
            ),
        ),
        'pageContent' => array(
            'headline' => 'add_Mapmarker',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\Maps\SaveMarker',
            'entity' => 'Contentinum\Entity\WebMapsData',
            'targetentities' => array(
                'webMaps' => 'Contentinum\Entity\WebMaps',
                'webMediasId' => 'Contentinum\Entity\WebMedias',
            ),
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\MapMarkerForm',
            'formaction' => '/mcwork/mapmarker/add',
            'formattributes' => array(
                'data-rules' => 'mapmarker',
                'data-process' => 'add',
            ),
            'settoroute' => '/mcwork/mapmarker',
            'populate' => array(
                'webMedias' => '1',
                'latitude' => '51.165691',
                'longitude' => '10.451526000000058'
            ),
            'parentGroup' => array('entity_maps'),
            'populateFromRoute' => array('category' => 'webMaps'),  
            'populateFromGroup' => array( 'entity_maps' => array(
                'centerlatitude' => 'latitude',
                'centerlongitude' => 'longitude',
                'startzoom' => 'startzoom',)
            ),
    
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkmapforms'),
        ),
    ), 
    
    
    '/mcwork/mapmarker/edit' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'edit_Mapmarker',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'bodyFooterScript' => array(
            'prepend' => array(
                'https://maps.google.com/maps/api/js?libraries=places&key=' . GOOGLE_API_KEY,
            ),
        ),
        'pageContent' => array(
            'headline' => 'edit_Mapmarker',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Maps\SaveMarker',
            'entity' => 'Contentinum\Entity\WebMapsData',
            'targetentities' => array(
                'webMaps' => 'Contentinum\Entity\WebMaps',
                'webMediasId' => 'Contentinum\Entity\WebMedias',
            ),
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\MapMarkerForm',
            'formaction' => '/mcwork/mapmarker/edit',
            'formattributes' => array(
                'data-rules' => 'mapmarker',
                'data-process' => 'edit',
            ),
            'settoroute' => '/mcwork/mapmarker',
    
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkmapforms'),
        ),
    ),    
    
    '/mcwork/mapmarker/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Maps\DeleteMarker',
            'entity' => 'Contentinum\Entity\WebMapsData',
            'settoroute' => '/mcwork/mapmarker'
        )
    ),    
    
    
    // ---- accounts ----
    
    '/mcwork/usringrp' => array(
        'resource' => 'adminresource',
        'metaTitle' => 'Useringroups',
        'template' => 'content/accounts/usringrpindex',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'Useringroups',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Useringroups',
            'entity' => 'Contentinum\Entity\UserAclIndex'
        ),
        'assets' => array(
            'sets' => array('mcworktablestyles','mcworkhead','mcworktablescripts'),
        ),        
    ), 
    
    '/mcwork/usringrp/add' => array(
        'splitQuery' => 3,
        'resource' => 'adminresource',
        'metaTitle' => 'add_Useringroups',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'add_Useringroups',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\Accounts\SaveUseringroups',
            'entity' => 'Contentinum\Entity\UserAclIndex',
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\UserInGroupForm',
            'formaction' => '/mcwork/usringrp/add',
            'settoroute' => '/mcwork/usringrp',
            'targetentities' => array(
                'users' => 'Contentinum\Entity\Users5',
                'aclGroup' => 'Contentinum\Entity\UserAclGroups'
            ),            
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ),  
    
    '/mcwork/usringrp/edit' => array(
        'splitQuery' => 3,
        'resource' => 'adminresource',
        'metaTitle' => 'edit_Useringroups',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'edit_Useringroups',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Accounts\SaveUseringroups',
            'entity' => 'Contentinum\Entity\UserAclIndex',
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\UserInGroupForm',
            'formaction' => '/mcwork/usringrp/edit',
            'settoroute' => '/mcwork/usringrp',
            'targetentities' => array(
                'users' => 'Contentinum\Entity\Users5',
                'aclGroup' => 'Contentinum\Entity\UserAclGroups'
            ),
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ),  
    
    '/mcwork/usringrp/delete' => array(
        'resource' => 'adminresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Accounts\DeleteUseringroups',
            'entity' => 'Contentinum\Entity\UserAclIndex',

            'settoroute' => '/mcwork/usringrp'
        )
    ),    
    
    '/mcwork/usrgrp' => array(      
        'resource' => 'adminresource',
        'metaTitle' => 'Usergroups',
        'template' => 'content/accounts/usrgrpindex',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'Usergroups',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Usergroups',
            'entity' => 'Contentinum\Entity\UserAclGroups'
        ),
        'assets' => array(
            'sets' => array('mcworktablestyles','mcworkhead','mcworktablescripts'),
        ),        
    ), 
    
    '/mcwork/usrgrp/add' => array(
        'splitQuery' => 3,
        'resource' => 'adminresource',
        'metaTitle' => 'add_Usergroups',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'add_Usergroups',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\Accounts\SaveUsergroups',
            'entity' => 'Contentinum\Entity\UserAclGroups',
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\UserGroupForm',
            'formaction' => '/mcwork/usrgrp/add',
            'settoroute' => '/mcwork/usrgrp',
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ),
    
    '/mcwork/usrgrp/edit' => array(
        'splitQuery' => 3,
        'resource' => 'adminresource',
        'metaTitle' => 'edit_Usergroups',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'edit_Usergroups',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Accounts\SaveUsergroups',
            'entity' => 'Contentinum\Entity\UserAclGroups',
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\UserGroupForm',
            'formaction' => '/mcwork/usrgrp/edit',
            'settoroute' => '/mcwork/usrgrp',
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ),  
    
    '/mcwork/usrgrp/delete' => array(
        'resource' => 'adminresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Delete\Entries',
            'entity' => 'Contentinum\Entity\UserAclGroups',
            'querykey' => 'category',
            'hasEntries' => array(
                'groups' => array(
                    'tablename' => 'Contentinum\Entity\UserAclIndex',
                    'column' => 'aclGroup'
                ),
            ),
            'settoroute' => '/mcwork/usrgrp'
        )
    ),    
    
    
    
    
    '/mcwork/users' => array(
        'resource' => 'publisherresource',
        'metaTitle' => 'Users',
        'template' => 'content/accounts/userindex',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'Users',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Users',
            'entity' => 'Contentinum\Entity\Users5'
        ),
        'assets' => array(
            'sets' => array('mcworktablestyles','mcworkhead','mcworktusrcripts'),
        ),
    ),
    
    '/mcwork/users/add' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'add_User',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'add_User',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\Accounts\SaveUsers',
            'entity' => 'Contentinum\Entity\Users5',
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\UserAddForm',
            'formaction' => '/mcwork/users/add',
            'settoroute' => '/mcwork/users',
            'targetentities' => array(
                'userRoles' => 'Contentinum\Entity\UserRoles',
                'contacts' => 'Contentinum\Entity\Contacts',
                'webPages' => 'Contentinum\Entity\WebPagesParameter',
            ),            
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ),
    
    '/mcwork/users/edit' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'edit_User',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'edit_User',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Accounts\SaveUsers',
            'entity' => 'Contentinum\Entity\Users5',
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\UserEditForm',
            'formaction' => '/mcwork/users/edit',
            'settoroute' => '/mcwork/users',
            'querykey' => 'category',
            'setexclude' => array(
                'field' => 'id'
            
            ),            
            'targetentities' => array(
                'userRoles' => 'Contentinum\Entity\UserRoles',
                'contacts' => 'Contentinum\Entity\Contacts',
                'webPages' => 'Contentinum\Entity\WebPagesParameter',
            ), 
            'notpopulate' => array(
                'loginPassword'
            )            
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ),  
    
    '/mcwork/users/usredit' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'edit_User',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'edit_User',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Accounts\SaveUsers',
            'entity' => 'Contentinum\Entity\Users5',
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\UserOwnerEditForm',
            'formaction' => '/mcwork/users/usredit',
            'settoroute' => '/mcwork/users',
            'querykey' => 'category',
            'setexclude' => array(
                'field' => 'id'
    
            ),
            'targetentities' => array(
                'userRoles' => 'Contentinum\Entity\UserRoles',
                'contacts' => 'Contentinum\Entity\Contacts',
                'webPages' => 'Contentinum\Entity\WebPagesParameter',
            ),
            'notpopulate' => array(
                'loginPassword'
            )
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ),  
    
    '/mcwork/users/delete' => array(
        'resource' => 'adminresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Accounts\DeleteUsers',
            'entity' => 'Contentinum\Entity\Users5',
            'settoroute' => '/mcwork/users',
            
            'hasEntries' => array(
                'createdBy1' => array(
                    'area' => 'Der Benutzer*in hat noch Beiträge',
                    'tablename' => 'Contentinum\Entity\WebContent',
                    'column' => 'createdBy'
                ),
                'createdBy2' => array(
                    'area' => 'Der Benutzer*in hat noch Seiten',
                    'tablename' => 'Contentinum\Entity\WebPagesParameter',
                    'column' => 'createdBy'
                ), 
                'createdBy2' => array(
                    'area' => 'Der Benutzer*in hat noch Dateigruppen',
                    'tablename' => 'Contentinum\Entity\WebMediaGroup',
                    'column' => 'createdBy'
                ),                
            ),
        )
    ),    
    
    '/mcwork/contactgroupindex/category' => array(
        
        'resource' => 'publisherresource',
        'metaTitle' => 'ContactsInGroup',
        'template' => 'content/contacts/categoryindex',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'ContactsInGroup',
            'content' => '<div class="panel"><h5>Hinweis:</h5><p>Liste der Kontakte in einer Gruppe oder ein Kontakt verk&uuml;pft mit einer Organisation</p></div>',
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Contacts\Categories',
            'entity' => 'Contentinum\Entity\ContactGroupIndex'
        ),
        'assets' => array(
            'sets' => array('mcworktablestyles','mcworkhead','mcworktablescripts'),
        ),        
        
        
    ),
    
    '/mcwork/contactgroupindex/add' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'add_contactingrp',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'bodyFooterScript' => array(
            'prepend' => array(
                '/assets/app/tinymce/js/tinymce/tinymce.min.js',
            ),
        ),        
        'pageContent' => array(
            'headline' => 'add_contactingrp',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\Contacts\SaveCategory',
            'entity' => 'Contentinum\Entity\ContactGroupIndex',
            'targetentities' => array(
                'indexGroup' => 'Contentinum\Entity\ContactGroups',
                 'contacts' => 'Contentinum\Entity\Contacts',
            ),
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\ContactCategoryForm',
            'formaction' => '/mcwork/contactgroupindex/add',
            'formattributes' => array(
                'data-rules' => 'contactcategories',
                'data-process' => 'add',
            ),
            'settoroute' => '/mcwork/contactgroupindex',
            'populate' => array(
                'publish' => 'yes',
            ),
            'populateFromRoute' => array('category' => 'indexGroup'),
    
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkformstinymcesmall'),
        ),
    ), 
    
    '/mcwork/contactgroupindex/edit' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'edit_contactingrp',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'bodyFooterScript' => array(
            'prepend' => array(
                '/assets/app/tinymce/js/tinymce/tinymce.min.js',
            ),
        ),        
        'pageContent' => array(
            'headline' => 'edit_contactingrp',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Contacts\SaveCategory',
            'entity' => 'Contentinum\Entity\ContactGroupIndex',
            'targetentities' => array(
                'indexGroup' => 'Contentinum\Entity\ContactGroups',
                'contacts' => 'Contentinum\Entity\Contacts',
            ),
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\ContactCategoryForm',
            'formaction' => '/mcwork/contactgroupindex/edit',
            'formattributes' => array(
                'data-rules' => 'contactcategories',
                'data-process' => 'edit',
            ),
            'settoroute' => '/mcwork/contactgroupindex',

    
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkformstinymcesmall'),
        ),
    ), 
    
    '/mcwork/contactgroupindex/delete' => array(
        'resource' => 'adminresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Contacts\DeleteCategory',
            'entity' => 'Contentinum\Entity\ContactGroupIndex',
            'settoroute' => '/mcwork/contactgroupindex'
        )
    ),    
    
    
    '/mcwork/contactgroup' => array(
        'resource' => 'publisherresource',
        'metaTitle' => 'Contactgroups',
        'template' => 'content/contacts/groupindex',
        'toolbar' => 1,
        'tableedit' => 1,      
        'pageContent' => array(
            'headline' => 'Contactgroups',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Contacts\Groups',
            'entity' => 'Contentinum\Entity\ContactGroups'
        ),
        'assets' => array(
            'sets' => array('mcworktablestyles','mcworkhead','mcworktablescripts'),
        ),
    ), 
    
    '/mcwork/contactgroup/add' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'add_Contactgroup',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'add_Contactgroup',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\Contacts\SaveGroup',
            'entity' => 'Contentinum\Entity\ContactGroups',
            'targetentities' => array(
                'accounts' => 'Contentinum\Entity\Accounts',
            ),            
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\ContactGroupForm',
            'formaction' => '/mcwork/contactgroup/add',
            'settoroute' => '/mcwork/contactgroup',
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ),   
    
    '/mcwork/contactgroup/edit' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'edit_Contactgroup',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'edit_Contactgroup',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Contacts\SaveGroup',
            'entity' => 'Contentinum\Entity\ContactGroups',
            'targetentities' => array(
                'accounts' => 'Contentinum\Entity\Accounts',
            ),
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\ContactGroupForm',
            'formaction' => '/mcwork/contactgroup/edit',
            'settoroute' => '/mcwork/contactgroup',
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ), 
    
    '/mcwork/contactgroup/delete' => array(
        'resource' => 'adminresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Contacts\DeleteGroup',
            'entity' => 'Contentinum\Entity\ContactGroups',
            'hasEntries' => array(
                'indexGroup' => array(
                    'tablename' => 'Contentinum\Entity\ContactGroupIndex',
                    'column' => 'indexGroup'
                ),
            ),
            'settoroute' => '/mcwork/contactgroup'
        )
    ),    
    
    
    
    '/mcwork/contacts' => array(
        'resource' => 'publisherresource',
        'metaTitle' => 'Contacts',
        'template' => 'content/accounts/contactindex',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'Contacts',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Contacts',
            'entity' => 'Contentinum\Entity\Contacts'
        ),
        'assets' => array(
            'sets' => array('mcworktablestyles','mcworkhead','mcworktablescripts'),
        ),
    ), 
    
    '/mcwork/contacts/add' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'add_Contact',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'bodyFooterScript' => array(
            'prepend' => array(
                '/assets/app/tinymce/js/tinymce/tinymce.min.js',
            ),
        ),
        'pageContent' => array(
            'headline' => 'add_Contact',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\Accounts\SaveContacts',
            'entity' => 'Contentinum\Entity\Contacts',
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\ContactForm',
            'formaction' => '/mcwork/contacts/add',
            'settoroute' => '/mcwork/contacts',
            'populate' => array(
                'contactImgSource' => '_nomedia',
            ),            
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkformstinymcesmallexlp'),
        ),
    ),
    
    '/mcwork/contacts/edit' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'edit_Contact',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'bodyFooterScript' => array(
            'prepend' => array(
                '/assets/app/tinymce/js/tinymce/tinymce.min.js',
            ),
        ),
        'pageContent' => array(
            'headline' => 'edit_Contact',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Accounts\SaveContacts',
            'entity' => 'Contentinum\Entity\Contacts',
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\ContactForm',
            'formaction' => '/mcwork/contacts/edit',
            'settoroute' => '/mcwork/contacts',
            'querykey' => 'category',
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkformstinymcesmallexlp'),
        ),
    ), 
    
    '/mcwork/contacts/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Accounts\DeleteContacts',
            'entity' => 'Contentinum\Entity\Contacts',
    
            'hasEntries' => array(
                'users' => array(
                    'area' => 'Kontakt ist als Login Benutzer registriert',
                    'tablename' => 'Contentinum\Entity\Users5',
                    'column' => 'contacts'
                ),                
                'contacts' => array(
                    'area' => 'Kontakt ist in einem Steckbrief vorhanden',
                    'tablename' => 'Contentinum\Entity\ContactGroupIndex',
                    'column' => 'contacts'
                ),
                'municipal' => array(
                    'ifmodule' => 'municipal',
                    'area' => 'Kontakt ist in einem Fachbereich vorhanden',
                    'tablename' => 'Municipal\Entity\FachbereichContacts',
                    'column' => 'contact'
                ),  
                'municipal2' => array(
                    'ifmodule' => 'municipal',
                    'area' => 'Kontakt ist in einem Sachgebiet vorhanden',
                    'tablename' => 'Municipal\Entity\Organisation',
                    'column' => 'contact'
                ),                
            ),
    
            'settoroute' => '/mcwork/contacts'
        )
    ), 
    
    
    '/mcwork/accountgroupindex/category' => array(
    
        'resource' => 'publisherresource',
        'metaTitle' => 'Organizationgroup',
        'template' => 'content/accounts/categoryindex',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'Organizationgroup',
            'content' => '',
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Account\Categories',
            'entity' => 'Contentinum\Entity\AccountGroupIndex'
        ),
        'assets' => array(
            'sets' => array('mcworktablestyles','mcworkhead','mcworktablescripts'),
        ),
    
    
    ),
    
    '/mcwork/accountgroupindex/add' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'add_orgingrp',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'add_orgingrp',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\Accounts\SaveCategory',
            'entity' => 'Contentinum\Entity\AccountGroupIndex',
            'targetentities' => array(
                'indexGroup' => 'Contentinum\Entity\AccountGroups',
                'accounts' => 'Contentinum\Entity\Accounts',
            ),
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\AccountGroupIndex',
            'formaction' => '/mcwork/accountgroupindex/add',
            'formattributes' => array(
                'data-rules' => 'accountgroupindex',
                'data-process' => 'add',
            ),
            'settoroute' => '/mcwork/accountgroupindex',
            'populateFromRoute' => array('category' => 'indexGroup'),
    
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ),  
    
    '/mcwork/accountgroupindex/edit' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'edit_orgingrp',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'edit_orgingrp',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Accounts\SaveCategory',
            'entity' => 'Contentinum\Entity\AccountGroupIndex',
            'targetentities' => array(
                'indexGroup' => 'Contentinum\Entity\AccountGroups',
                'accounts' => 'Contentinum\Entity\Accounts',
            ),
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\AccountGroupIndex',
            'formaction' => '/mcwork/accountgroupindex/edit',
            'formattributes' => array(
                'data-rules' => 'accountgroupindex',
                'data-process' => 'edit',
            ),
            'settoroute' => '/mcwork/accountgroupindex',
    
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ),   
    
    '/mcwork/accountgroupindex/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Accounts\DeleteCategory',
            'entity' => 'Contentinum\Entity\AccountGroupIndex',
    
    
            'settoroute' => '/mcwork/accountgroupindex'
        )
    ),    
    
    
    
    '/mcwork/accountgroups' => array(
        'resource' => 'publisherresource',
        'metaTitle' => 'Organizationgroups',
        'template' => 'content/accounts/groupsindex',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' =>  'Organizationgroups',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Account\Groups',
            'entity' => 'Contentinum\Entity\AccountGroups'
        ),
        'assets' => array(
            'sets' => array('mcworktablestyles','mcworkhead','mcworktablescripts'),
        ),
    ), 
    
    '/mcwork/accountgroups/add' => array(
        'splitQuery' => 3,
        'resource' => 'adminresource',
        'metaTitle' => 'add_orgagrp',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'add_orgagrp',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\Accounts\SaveGroup',
            'entity' => 'Contentinum\Entity\AccountGroups',
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\AccountGroup',
            'formaction' => '/mcwork/accountgroups/add',
            'settoroute' => '/mcwork/accountgroups',
            'formattributes' => array(
                'data-rules' => 'accountgroups',
                'data-process' => 'add',
            ),
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ), 
    
    '/mcwork/accountgroups/edit' => array(
        'splitQuery' => 3,
        'resource' => 'adminresource',
        'metaTitle' => 'edit_orgagrp',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'edit_orgagrp',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Accounts\SaveGroup',
            'entity' => 'Contentinum\Entity\AccountGroups',
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\AccountGroup',
            'formaction' => '/mcwork/accountgroups/edit',
            'settoroute' => '/mcwork/accountgroups',
            'formattributes' => array(
                'data-rules' => 'accountgroups',
                'data-process' => 'edit',
            ),
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ), 
    
    '/mcwork/accountgroups/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Accounts\DeleteGroup',
            'entity' => 'Contentinum\Entity\AccountGroups',
    
            'hasEntries' => array(
                'indexGroup' => array(
                    'area' => 'Die Gruppe enthält noch Elemente',
                    'tablename' => 'Contentinum\Entity\AccountGroupIndex',
                    'column' => 'indexGroup'
                ),
            ),
    
            'settoroute' => '/mcwork/accountgroups'
        )
    ),    
     
    '/mcwork/accounts' => array(
        'resource' => 'publisherresource',
        'metaTitle' => 'Organizations',
        'template' => 'content/accounts/accountindex',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'Organizations',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Account\Organizations',
            'entity' => 'Contentinum\Entity\Accounts'
        ),
        'assets' => array(
            'sets' => array('mcworktablestyles','mcworkhead','mcworktablescripts'),
        ),
    ), 
    
    '/mcwork/accounts/add' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'add_Organizations',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'bodyFooterScript' => array(
            'prepend' => array(
                'https://maps.google.com/maps/api/js?libraries=places&key=' . GOOGLE_API_KEY,
                '/assets/app/tinymce/js/tinymce/tinymce.min.js',
            ),
        ),
        'pageContent' => array(
            'headline' => 'add_Organizations',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\Accounts\SaveAccounts',
            'entity' => 'Contentinum\Entity\Accounts',
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\AccountForm',
            'formaction' => '/mcwork/accounts/add',
            'settoroute' => '/mcwork/accounts',
            'targetentities' => array(
                'fieldtypes' => 'Contentinum\Entity\FieldTypes'
            ), 
            'populate' => array(
                'imgSource' => '_nomedia',
            ),            
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkformsaccounts'),
        ),
     ),
    
    '/mcwork/accounts/edit' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'edit_Organizations',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'bodyFooterScript' => array(
            'prepend' => array(
                'https://maps.google.com/maps/api/js?libraries=places&key=' . GOOGLE_API_KEY,
                '/assets/app/tinymce/js/tinymce/tinymce.min.js',
            ),
        ),
        'pageContent' => array(
            'headline' => 'edit_Organizations',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Accounts\SaveAccounts',
            'entity' => 'Contentinum\Entity\Accounts',
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\AccountForm',
            'formaction' => '/mcwork/accounts/edit',
            'settoroute' => '/mcwork/accounts',
            'querykey' => 'category',
            'targetentities' => array(
                'fieldtypes' => 'Contentinum\Entity\FieldTypes'
            ),
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkformsaccounts'),
        ),
    ), 
    
    // --- admin ---
    
    '/mcwork/preferences' => array(
        'resource' => 'adminresource',
        'metaTitle' => 'Preferences',
        'template' => 'content/admin/preferencesindex',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'Preferences',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Admin\Preferences',
            'entity' => 'Contentinum\Entity\WebPreferences'
        ),
        'assets' => array(
            'sets' => array('mcworktablestyles','mcworkhead','mcworktablescripts'),
        ),        
    ),
    
    '/mcwork/preferences/add' => array(
        'splitQuery' => 3,
        'resource' => 'adminresource',
        'metaTitle' => 'add_Preferences',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'add_Preferences',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\Admin\SavePreferences',
            'entity' => 'Contentinum\Entity\WebPreferences',
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\PreferencesForm',
            'formaction' => '/mcwork/preferences/add',
            'settoroute' => '/mcwork/preferences',
            'formattributes' => array(
                'data-rules' => 'preferences',
                'data-process' => 'add',
            ),            
            'targetentities' => array(
                'webPagesId' => 'Contentinum\Entity\WebPagesParameter',
            ),
            'populate' => array(
                'standardDomain' => 'no',
                'hostId' => '_default',
                'locale' => 'de_DE'
            )            
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ), 
    
    '/mcwork/preferences/edit' => array(
        'splitQuery' => 3,
        'resource' => 'adminresource',
        'metaTitle' => 'edit_Preferences',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'edit_Preferences',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Admin\SavePreferences',
            'entity' => 'Contentinum\Entity\WebPreferences',
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\PreferencesForm',
            'formaction' => '/mcwork/preferences/edit',
            'settoroute' => '/mcwork/preferences',
            'formattributes' => array(
                'data-rules' => 'preferences',
                'data-process' => 'edit',
            ),
            'targetentities' => array(
                'webPagesId' => 'Contentinum\Entity\WebPagesParameter',
            ),
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ), 
    
    '/mcwork/preferences/delete' => array(
        'resource' => 'adminresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Delete\Entries',
            'entity' => 'Contentinum\Entity\WebPreferences',
            'hasEntries' => array(
                'webPagesId' => array(
                    'tablename' => 'Contentinum\Entity\WebPagesParameter',
                    'column' => 'webPagesId'
                ),
            ),
            'settoroute' => '/mcwork/preferences'
        )
             
    ), 
    
    
    '/mcwork/redirects' => array(
        'resource' => 'adminresource',
        'metaTitle' => 'Redirects',
        'template' => 'content/admin/redirectsindex',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'Redirects',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Admin\Redirects',
            'entity' => 'Contentinum\Entity\WebRedirect'
        ),
        'assets' => array(
            'sets' => array('mcworktablestyles','mcworkhead','mcworktablescripts'),
        ),
    ),
    
    '/mcwork/redirects/add' => array(
        'splitQuery' => 3,
        'resource' => 'adminresource',
        'metaTitle' => 'add_Redirects',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'add_Redirects',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\Admin\SaveRedirect',
            'entity' => 'Contentinum\Entity\WebRedirect',
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\RedirectsForm',
            'formaction' => '/mcwork/redirects/add',
            'settoroute' => '/mcwork/redirects',
            'formattributes' => array(
                'data-rules' => 'redirects',
                'data-process' => 'add',
            ),
            'targetentities' => array(
                'webPagesId' => 'Contentinum\Entity\WebPagesParameter',
            ),
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ), 
    
    '/mcwork/redirects/edit' => array(
        'splitQuery' => 3,
        'resource' => 'adminresource',
        'metaTitle' => 'edit_Redirects',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'edit_Redirects',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Admin\SaveRedirect',
            'entity' => 'Contentinum\Entity\WebRedirect',
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\RedirectsForm',
            'formaction' => '/mcwork/redirects/edit',
            'settoroute' => '/mcwork/redirects',
            'formattributes' => array(
                'data-rules' => 'redirects',
                'data-process' => 'edit',
            ),
            'targetentities' => array(
                'webPagesId' => 'Contentinum\Entity\WebPagesParameter',
            ),
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ), 
    
    '/mcwork/redirects/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Delete\Entries',
            'entity' => 'Contentinum\Entity\WebRedirect',
            'settoroute' => '/mcwork/redirects'
        )
    ), 
    
    '/mcwork/emailtemplates' => array(
        'resource' => 'publisherresource',
        'metaTitle' => 'Emailtemplates',
        'template' => 'content/templates/emailindex',
        'toolbar' => 1,
        'tableedit' => 1,   
        'pageContent' => array(
            'headline' => 'Emailtemplates',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Templates\Files',
            'entitymanager' =>  'contentinum_files_storage_manager',
            'entity' => 'Mcwork\Entity\EmailTemplates',
        ),
        'assets' => array(
            'sets' => array('mcworkstylefiles','mcworkhead','mcworkfiles'),
        )
    
    ),  
    
    '/mcwork/emailtemplates/add' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'add_Emailtemplates',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'add_Emailtemplates',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\Templates\SaveFiles',
            'entity' => 'Mcwork\Entity\EmailTemplates',
            'entitymanager' =>  'contentinum_files_storage_manager',
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\TemplateFileForm',
            'formaction' => '/mcwork/emailtemplates/add',
            'settoroute' => '/mcwork/emailtemplates'
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ),
    
    '/mcwork/emailtemplates/write' => array(        
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'add_Emailtemplates',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'add_Emailtemplates',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Templates\SaveFiles',
            'entity' => 'Mcwork\Entity\EmailTemplates',
            'entitymanager' =>  'contentinum_files_storage_manager',
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\TemplateFileForm',
            'formaction' => '/mcwork/emailtemplates/write',
            'settoroute' => '/mcwork/emailtemplates'
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
              
    ),    
    
    '/mcwork/emailtemplates/delete' => array(
        'splitQuery' => 3,
        'resource' => 'authorresource',
        'template' => 'content/templates/filedelete',
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Model\Templates\DeleteTemplates',
            'entitymanager' => 'contentinum_files_storage_manager',
            'entity' => 'Mcwork\Entity\EmailTemplates',
        )
    ),   
    
    
    '/mcwork/emailsignatures' => array(
        'resource' => 'publisherresource',
        'metaTitle' => 'Emailsignatures',
        'template' => 'content/templates/signatureindex',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'Emailsignatures',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Templates\Files',
            'entitymanager' =>  'contentinum_files_storage_manager',
            'entity' => 'Mcwork\Entity\EmailSignatures',
        ),
        'assets' => array(
            'sets' => array('mcworkstylefiles','mcworkhead','mcworkfiles'),
        )
    
    ),
    
    '/mcwork/emailsignatures/add' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'add_Emailsignatures',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'add_Emailsignatures',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\Templates\SaveFiles',
            'entity' => 'Mcwork\Entity\EmailSignatures',
            'entitymanager' =>  'contentinum_files_storage_manager',
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\TemplateFileForm',
            'formaction' => '/mcwork/emailsignatures/add',
            'settoroute' => '/mcwork/emailsignatures'
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ),
    
    '/mcwork/emailsignatures/write' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'add_Emailsignatures',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'add_Emailsignatures',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Templates\SaveFiles',
            'entity' => 'Mcwork\Entity\EmailSignatures',
            'entitymanager' =>  'contentinum_files_storage_manager',
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\TemplateFileForm',
            'formaction' => '/mcwork/emailsignatures/write',
            'settoroute' => '/mcwork/emailsignatures'
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    
    ),
    
    '/mcwork/emailsignatures/delete' => array(
        'splitQuery' => 3,
        'resource' => 'authorresource',
        'template' => 'content/templates/filedelete',
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Model\Templates\DeleteTemplates',
            'entitymanager' => 'contentinum_files_storage_manager',
            'entity' => 'Mcwork\Entity\EmailSignatures',
        )
    ),    
    
    
    '/mcwork/fieldtypes' => array(
        'resource' => 'publisherresource',
        'metaTitle' => 'Accounttypes',
        'template' => 'content/admin/fieldtypesindex',
        'toolbar' => 1,
        'tableedit' => 1,   
        'pageContent' => array(
            'headline' => 'Accounttypes',
            'content' => ''
        ), 
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Admin\AccountTypes',
            'entity' => 'Contentinum\Entity\FieldTypes'
        ),
        'assets' => array(
            'sets' => array('mcworktablestyles','mcworkhead','mcworktablescripts'),
        ),        
    ),  
    
    '/mcwork/fieldtypes/add' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'add_Accounttypes',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'add_Accounttypes',
            'content' => ''
        ),        
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\Accounts\SaveTypes',
            'entity' => 'Contentinum\Entity\FieldTypes',
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\AccountTypesForm',
            'formaction' => '/mcwork/fieldtypes/add',
            'settoroute' => '/mcwork/fieldtypes'
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),        
    ),  
    
    '/mcwork/fieldtypes/edit' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'edit_Accounttypes',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'edit_Accounttypes',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\Accounts\SaveTypes',
            'entity' => 'Contentinum\Entity\FieldTypes',
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\AccountTypesForm',
            'formaction' => '/mcwork/fieldtypes/edit',
            'settoroute' => '/mcwork/fieldtypes',
            'querykey' => 'category',
            'setexclude' => array(
                'field' => 'id'
                
            ),
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ), 
    
    
    '/mcwork/fieldtypes/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Delete\Entries',
            'entity' => 'Contentinum\Entity\FieldTypes',
            'querykey' => 'category',
            'hasEntries' => array(
                'groups' => array(
                    'tablename' => 'Contentinum\Entity\IndexGroups',
                    'column' => 'fieldTypes'
                ),
                'accounts' => array(
                    'tablename' => 'Contentinum\Entity\Accounts',
                    'column' => 'fieldtypes'
                )
            ),
            'settoroute' => '/mcwork/fieldtypes'
        )
    ),    
    
    
    // ---- medias and files ---- 
    
    '/mcwork/combinefilegroups' => array(
        'resource' => 'publisherresource',
        'metaTitle' => 'CombineFilegroups',
        'template' => 'content/filegroups/combineindex',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'CombineFilegroups',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\FileGroups\CombineGroups',
            'entity' => 'Contentinum\Entity\WebMediaGroups'            
        ),
        'assets' => array(
            'sets' => array('mcworktablestyles','mcworkhead','mcworktablescripts'),
        ),
    ),
    
    '/mcwork/combinefilegroups/add' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'add_CombineFilegroups',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'add_CombineFilegroups',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\FileGroups\SaveCombineGroup',
            'entity' => 'Contentinum\Entity\WebMediaGroups',
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\FileGroupsForm',
            'formaction' => '/mcwork/combinefilegroups/add',
            'formattributes' => array(
                'data-rules' => 'mediagroups',
                'data-process' => 'add',
            ),
            'populate' => array(
                'resource' => 'index',
            ),
            'settoroute' => '/mcwork/combinefilegroups'
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ), 
    
    
    '/mcwork/combinefilegroups/edit' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'edit_CombineFilegroups',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'edit_CombineFilegroups',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\FileGroups\SaveCombineGroup',
            'entity' => 'Contentinum\Entity\WebMediaGroups',
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\FileGroupsForm',
            'formaction' => '/mcwork/combinefilegroups/edit',
            'formattributes' => array(
                'data-rules' => 'mediagroups',
                'data-process' => 'edit',
            ),
            'settoroute' => '/mcwork/combinefilegroups'
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ), 
    
    '/mcwork/combinefilegroups/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Delete\Entries',
            'entity' => 'Contentinum\Entity\WebMediaGroups',
            'querykey' => 'category',
            'hasEntries' => array(
                'webMediagroupId' => array(
                    'tablename' => 'Contentinum\Entity\WebMediaGroupsCombine',
                    'column' => 'webGroupsId'
                ),
            ),
            'settoroute' => '/mcwork/combinefilegroups'
        )
    ),  
    
    '/mcwork/combinefilegroupindex/category' => array(
        'resource' => 'publisherresource',
        'metaTitle' => 'Filegroups_categories',
        'template' => 'content/filegroups/combinecategoryindex',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'Filegroups_categories',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\FileGroups\CombineCategories',
            'entity' => 'Contentinum\Entity\WebMediaGroupsCombine',
        ),
    
        'assets' => array(
            'sets' => array('mcworktablestyles','mcworkhead','mcworktablescripts'),
        ),
    ),
    
    '/mcwork/combinefilegroupindex/add' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'add_Filegroups_category',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'add_Filegroups_category',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\FileGroups\SaveCombineCategories',
            'entity' => 'Contentinum\Entity\WebMediaGroupsCombine',
            'targetentities' => array(
                'webMediagroupId' => 'Contentinum\Entity\WebMediaGroup',
                'webGroupsId' => 'Contentinum\Entity\WebMediaGroups',
            ),
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\FileCombineCategoryForm',
            'formaction' => '/mcwork/combinefilegroupindex/add',
            'formattributes' => array(
                'data-rules' => 'mediagroupscombine',
                'data-process' => 'add',
            ),
            'settoroute' => '/mcwork/combinefilegroupindex',
            'populate' => array(
                'resource' => 'index',
    
            ),
            'populateFromRoute' => array('category' =>  'webGroupsId'),
    
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkfilegroupindexform'),
        ),
    ),  
    
    '/mcwork/combinefilegroupindex/edit' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'edit_Filegroups_category',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'edit_Filegroups_category',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\FileGroups\SaveCombineCategories',
            'entity' => 'Contentinum\Entity\WebMediaGroupsCombine',
            'targetentities' => array(
                'webMediagroupId' => 'Contentinum\Entity\WebMediaGroup',
                'webGroupsId' => 'Contentinum\Entity\WebMediaGroups',
            ),
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\FileCombineCategoryForm',
            'formaction' => '/mcwork/combinefilegroupindex/edit',
            'formattributes' => array(
                'data-rules' => 'mediagroupscombine',
                'data-process' => 'edit',
            ),
            'settoroute' => '/mcwork/combinefilegroupindex',
            'populate' => array(
                'resource' => 'index',
    
            ),
    
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkfilegroupindexform'),
        ),
    ), 
    
    '/mcwork/combinefilegroupindex/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\FileGroups\DeleteCombineCategory',
            'entity' => 'Contentinum\Entity\WebMediaGroupsCombine',
            'settoroute' => '/mcwork/combinefilegroupindex/category'
        )
    ),    
    

    '/mcwork/filegroups' => array(
        'resource' => 'publisherresource',
        'metaTitle' => 'Filegroups',
        'template' => 'content/filegroups/groupindex',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'Filegroups',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\FileGroups\Groups',
            'entity' => 'Contentinum\Entity\WebMediaGroup'
        ),
        'assets' => array(
            'sets' => array('mcworktablestyles','mcworkhead','mcworktablescripts'),
        ),
    ),  
    
    '/mcwork/filegroups/add' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'add_Filegroup',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'add_Filegroup',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\FileGroups\SaveGroup',
            'entity' => 'Contentinum\Entity\WebMediaGroup',
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\FileGroupForm',
            'formaction' => '/mcwork/filegroups/add',
            'formattributes' => array(
                'data-rules' => 'mediagroup',
                'data-process' => 'add',
            ),
            'populate' => array(
                'resource' => 'index',
            ),
            'settoroute' => '/mcwork/filegroups'
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ), 
    
    '/mcwork/filegroups/edit' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'edit_Filegroup',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'edit_Filegroup',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\FileGroups\SaveGroup',
            'entity' => 'Contentinum\Entity\WebMediaGroup',
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\FileGroupForm',
            'formaction' => '/mcwork/filegroups/edit',
            'formattributes' => array(
                'data-rules' => 'mediagroup',
                'data-process' => 'edit',
            ),
            'populate' => array(
                'resource' => 'index',
            ),
            'settoroute' => '/mcwork/filegroups'
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    ), 
    
    '/mcwork/filegroups/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Delete\Entries',
            'entity' => 'Contentinum\Entity\WebMediaGroup',
            'querykey' => 'category',
            'hasEntries' => array(
                'groups' => array(
                    'tablename' => 'Contentinum\Entity\WebMediaCategories',
                    'column' => 'webMediagroupId'
                ),
            ),
            'settoroute' => '/mcwork/filegroups'
        )
    ),  
    
    '/mcwork/filegroupindex/category' => array(
        'resource' => 'publisherresource',
        'metaTitle' => 'Filegroup_categories',
        'template' => 'content/filegroups/groupcategoryindex',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'Filegroup_categories',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\FileGroups\Categories',
            'entity' => 'Contentinum\Entity\WebMediaCategories',
        ),
        
        'assets' => array(
            'sets' => array('mcworktablestyles','mcworkhead','mcworktablescripts'),
        ),
    ),
    
    '/mcwork/filegroupindex/add' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'add_Filegroup_category',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'add_Filegroup_category',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\AddFormController',
            'worker' => 'Mcwork\Model\FileGroups\SaveCategories',
            'entity' => 'Contentinum\Entity\WebMediaCategories',
            'targetentities' => array(
                'webMediagroupId' => 'Contentinum\Entity\WebMediaGroup',
                'webMediasId' => 'Contentinum\Entity\WebMedias',
            ),
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\FileCategoryForm',
            'formaction' => '/mcwork/filegroupindex/add',
            'formattributes' => array(
                'data-rules' => 'mediacategories',
                'data-process' => 'add',
            ),
            'settoroute' => '/mcwork/filegroupindex',
            'populate' => array(
                'resource' => 'index',

            ),
            'populateFromRoute' => array('category' => 'webMediagroupId'),
    
        ),
        'assets' => array(
            'sets' => array('mcworkformexplorstyles','mcworkhead','mcworkfilegroupindexform'),
        ),
    ), 
    
    '/mcwork/filegroupindex/edit' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'edit_Filegroup_category',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'edit_Filegroup_category',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\FileGroups\SaveCategories',
            'entity' => 'Contentinum\Entity\WebMediaCategories',
            'targetentities' => array(
                'webMediagroupId' => 'Contentinum\Entity\WebMediaGroup',
                'webMediasId' => 'Contentinum\Entity\WebMedias',
            ),
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\FileCategoryForm',
            'formaction' => '/mcwork/filegroupindex/edit',
            'formattributes' => array(
                'data-rules' => 'mediacategories',
                'data-process' => 'edit',
            ),
            'settoroute' => '/mcwork/filegroupindex',
    
        ),
        'assets' => array(
            'sets' => array('mcworkformexplorstyles','mcworkhead','mcworkfilegroupindexform'),
        ),
    ), 
    
    '/mcwork/filegroupindex/savenext' => array(
        'resource' => 'authorresource',
        'template' => 'content/service/savenext',
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Model\FileGroups\SaveCategoryNext',
            'entity' => 'Contentinum\Entity\WebMediaCategories',
        )        
    ),
    
    '/mcwork/filegroupindex/delete' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\FileGroups\DeleteCategory',
            'entity' => 'Contentinum\Entity\WebMediaCategories',
            'settoroute' => '/mcwork/filegroupindex/category'
        )
    ),
    
    '/mcwork/cachesettings' => array(
        'resource' => 'publisherresource',
        'metaTitle' => 'Cache Settings',
        'template' => 'content/cache/settingsindex',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'Cache Settings',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Cache\Settings',
            'entity' => 'Mcwork\Entity\CacheFiles',
        ),
        'assets' => array(
            'sets' => array('mcworkstylefiles','mcworkhead','mcworkcache'),
        ),
    ),    
    
    '/mcwork/cache' => array(
        'resource' => 'publisherresource',
        'metaTitle' => 'Cache',
        'template' => 'content/cache/fileindex',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'Cache',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Cache\ContentIndex',
            'entitymanager' => 'contentinum_files_storage_manager',
             'entity' => 'Mcwork\Entity\CacheFiles',
        ),
        'assets' => array(
            'sets' => array('mcworkstylefiles','mcworkhead','mcworkfiles'),
        ),        
    ),
    '/mcwork/cache/clear' => array(
        'splitQuery' => 4,
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Cache\Content',
            'entitymanager' => 'contentinum_files_storage_manager',
            'entity' => 'Mcwork\Entity\CacheFiles',
            'settoroute' => '/mcwork/cache'
        )
    ),    
     
    
    '/mcwork/logs' => array(
        'resource' => 'adminresource',
        'metaTitle' => 'Logs',
        'template' => 'content/logs/logfileindex',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'Logs',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Files\LogsIndex',
            'entitymanager' => 'contentinum_files_storage_manager',
            'entity' => 'Mcwork\Entity\LogFiles',
        ),
        'assets' => array(
            'sets' => array('mcworkstylefiles','mcworkhead','mcworkfiles'),
        ),
    ), 
    
    '/mcwork/logs/display' => array(
        'resource' => 'adminresource',
        'metaTitle' => 'Logs',
        'template' => 'content/logs/logfilecontent',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'Logs',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Files\LogsContent',
            'entitymanager' => 'contentinum_files_storage_manager',
            'entity' => 'Mcwork\Entity\LogFiles',
        ),
        'assets' => array(
            'sets' => array('mcworkstylefiles','mcworkhead','mcworkfiles'),
        ),
    ),
    
    '/mcwork/logs/download' => array(
        'resource' => 'adminresource',
        'metaTitle' => 'Logs',
        'template' => 'content/logs/logfiledownload',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'Logs',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Files\LogsDownload',
            'entitymanager' => 'contentinum_files_storage_manager',
            'entity' => 'Mcwork\Entity\LogFiles',
        ),
        'assets' => array(
            'sets' => array('mcworkstylefiles','mcworkhead','mcworkfiles'),
        ),
    ),  
    
    '/mcwork/logs/clear' => array(
        'splitQuery' => 4,
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\DeleteController',
            'worker' => 'Mcwork\Model\Logs\Clear',
            'entitymanager' => 'contentinum_files_storage_manager',
            'entity' =>  'Mcwork\Entity\LogFiles',
            'settoroute' => '/mcwork/logs'
        )
    ),    
    
    '/mcwork/filesdenied' => array(
        'resource' => 'publisherresource',
        'metaTitle' => 'NoPublicFiles',
        'template' => 'content/files/deniedindex',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'NoPublicFiles',
            'content' => ''
        ), 
        
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Files\DeniedIndex',
            'entitymanager' => 'contentinum_files_storage_manager',
            'entity' => 'Mcwork\Entity\FsDenied',
            'services' => array(
                'medias' => 'mcwork_media',
                'assigntags' => 'file_tags_assign',
            ),
            'appparameter' => array(
                'mediapath' => 'data/files/upload'
            ),
        ),
        'assets' => array(
            'sets' => array('mcworkstylefilesdenied','mcworkhead','mcworkfilesdenied'),
        ),        
        
    ), 
    
    '/mcwork/files/upload' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'template' => 'content/files/upload',
        'app' => array(
            'controller' => 'Mcwork\Controller\FsUploadController',
            'worker' => 'Mcwork\Model\Medias\Upload',
            'entitymanager' => 'contentinum_files_storage_manager',
            'entity' => 'Mcwork\Entity\FsDenied'
        )
    ), 
    
    '/mcwork/files/download' => array(
        'resource' => 'index',
        'template' => 'content/files/download',
        'app' => array(
            'controller' => 'Mcwork\Controller\DownloadController',
            'worker' => 'Mcwork\Mapper\Files\Download',
            'entity' => 'Contentinum\Entity\WebMedias',
            'settoroute' => '/mcwork/filesdenied',
        )
    ),
    
    '/mcwork/filesdenied/download' => array(
        'resource' => 'index',
        'template' => 'content/files/download',
        'app' => array(
            'controller' => 'Mcwork\Controller\DownloadController',
            'worker' => 'Mcwork\Mapper\Files\Download',
            'entity' => 'Contentinum\Entity\WebMedias',
            'settoroute' => '/mcwork/filesdenied',
        )
    ), 
    
    '/mcwork/filesdenied/delete' => array(
        'splitQuery' => 3,
        'resource' => 'authorresource',
        'template' => 'content/files/rmfile',
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Model\Files\Delete',
            'entity' => 'Contentinum\Entity\WebMedias'
        )
    ),  
    
    '/mcwork/mediametas' => array(
       
        'resource' => 'authorresource',
        'metaTitle' => 'Metas',
        'template' => 'content/medias/mediametaindex',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'Metas',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Files\MediaMetas',
            'entity' => 'Contentinum\Entity\WebMedias',
        ),
        'assets' => array(
            'sets' => array('mcworkwookmarkstyles','mcworkhead','mcworkwookmark'),
        ),        
        
    ), 
    
    '/mcwork/medias/wookmark' => array(
        'resource' => 'publisherresource',
        'app' => array(
            'controller' => 'Mcwork\Controller\WookmarkController',
            'worker' => 'Mcwork\Mapper\Files\Wookmark',
            'entity' => 'Contentinum\Entity\WebMedias'
        )
    ),    
    
    '/mcwork/publicmedias' => array(
        'resource' => 'authorresource',
        'metaTitle' => 'Medias',
        'template' => 'content/medias/publicindex',
        'toolbar' => 1,
        'tableedit' => 1,   
        'pageContent' => array(
            'headline' => 'Medias',
            'content' => ''
        ), 
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Files\MediaIndex',
            'entitymanager' => 'contentinum_files_storage_manager',
            'entity' => 'Mcwork\Entity\FsPublic',
            'services' => array(
                'medias' => 'mcwork_media',
                'inusemedias' => 'mcwork_mediainuse',
                'assigntags' => 'media_tags_assign',
            ),
            'appparameter' => array(
                'mediapath' => 'public/medias'
            ),
        ),
        'assets' => array(
            'sets' => array('mcworkstyledropzone','mcworkhead','mcworkfiledropzone'),
        ),        
        
    ),
    '/mcwork/publicmedias/delete' => array(
        'splitQuery' => 3,
        'resource' => 'authorresource',
        'template' => 'content/files/rmfile',
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Model\Files\Delete',
            'entity' => 'Contentinum\Entity\WebMedias'
        )
    ),
    
    '/mcwork/publicmedias/creategroup' => array(
        'splitQuery' => 3,
        'resource' => 'authorresource',
        'template' => 'content/medias/creategroup',
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Model\Medias\CreateImageGroup',
            'entitymanager' => 'contentinum_files_storage_manager',
            'entity' => 'Mcwork\Entity\FsPublic',
        )
    ),  
    
    '/mcwork/publicmedias/addfilegroup' => array(
        'splitQuery' => 3,
        'resource' => 'authorresource',
        'template' => 'content/medias/creategroup',
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Model\Medias\AddImageGroup',
            'entity' => 'Contentinum\Entity\WebMediaGroup',
        )        
    ),
    
    '/mcwork/publicmedias/rmdir' => array(
        'splitQuery' => 3,
        'resource' => 'authorresource',
        'template' => 'content/medias/rmdir',
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Model\Medias\DeleteDirectory',
            'entitymanager' => 'contentinum_files_storage_manager',
            'entity' => 'Mcwork\Entity\FsPublic',
        )
    ),  
    
    '/mcwork/publicmedias/download' => array(
        'resource' => 'index',
        'template' => 'content/files/download',
        'app' => array(
            'controller' => 'Mcwork\Controller\DownloadController',
            'worker' => 'Mcwork\Mapper\Files\Download',
            'entity' => 'Contentinum\Entity\WebMedias',
            'settoroute' => '/mcwork/filesdenied',
        )
    ),    
    
    '/mcwork/files/multipleupload' => array(
        'splitQuery' => 3,
        'resource' => 'authorresource',
        'template' => 'content/medias/multipleupload',
        'app' => array(
            'controller' => 'Mcwork\Controller\FsMultipleUploadController',
            'worker' => 'Mcwork\Model\Medias\MultipleUpload',
            'entitymanager' => 'contentinum_files_storage_manager',
            'entity' => 'Mcwork\Entity\FsPublic'
        )        
        
    ),
    
    '/mcwork/files/makedir' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'templateWidget' => '',
        'app' => array(
            'controller' => 'Mcwork\Controller\FsMakeDirController',
            'worker' => 'Mcwork\Fs\MakeDir',
            'entitymanager' => 'contentinum_files_storage_manager',
            'entity' => 'Mcwork\Entity\FsPublic',
            'settoroute' => '/mcwork/publicmedias',
        )
    ),    
    
    
    // ---- assets start ----
    '/mcwork/templates' => array(
        'resource' => 'authorresource',
        'metaTitle' => 'Organize Templates',
        'template' => 'content/assets/templateindex',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'Templates',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Assets\Files',
            'entitymanager' => 'contentinum_files_storage_manager',
            'entity' => 'Mcwork\Entity\TemplateFiles',
        ),
        'assets' => array(
            'sets' => array('mcworkstylefiles','mcworkhead','mcworkfiles'),
        ),
    ), 
    
    

    '/mcwork/templates/write' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'edit_templates',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'edit_templates',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\File\SaveContent',
            'entity' => 'Mcwork\Entity\TemplateFiles',
            'entitymanager' =>  'contentinum_files_storage_manager',
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\TemplateFileForm',
            'formaction' => '/mcwork/templates/write',
            'settoroute' => '/mcwork/templates'
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    
    ),    
    
    '/mcwork/templates/delete' => array(
        'splitQuery' => 3,
        'resource' => 'authorresource',
        'template' => 'content/assets/delete',
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Model\File\Delete',
            'entitymanager' => 'contentinum_files_storage_manager',
            'entity' => 'Mcwork\Entity\TemplateFiles',
        )
    ),    
    
    
    
    '/mcwork/assets' => array(
        'resource' => 'authorresource',
        'metaTitle' => 'Organize Assets',
        'template' => 'content/assets/assetsindex',
        'toolbar' => 1,
        'tableedit' => 1,        
        'pageContent' => array(
            'headline' => 'Assets',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Assets\Files',
            'entitymanager' => 'contentinum_files_storage_manager',
            'entity' => 'Mcwork\Entity\AssetsFiles',
            'services' => array(
                'defasset' => 'contentinum_defassets',
            ),            
        ),
        'assets' => array(
            'sets' => array('mcworkstylefiles','mcworkhead','mcworkassetsfiles'),
        ),        
    ), 
    
    
    '/mcwork/assetcache' => array(
        'resource' => 'authorresource',
        'metaTitle' => 'Asset cache',
        'template' => 'content/assets/cacheindex',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'Asset cache',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Assets\PublicFiles',
            'entitymanager' => 'contentinum_files_storage_manager',
            'entity' => 'Mcwork\Entity\PublicAssetFiles',
        ),
        'assets' => array(
            'sets' => array('mcworkstylefiles','mcworkhead','mcworkassetsfiles'),
        ),
    ),
    
    '/mcwork/assetcache/delete' => array(
        'splitQuery' => 3,
        'resource' => 'authorresource',
        'template' => 'content/assets/delete',
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Model\Assets\DeletePublicAssets',
            'entitymanager' => 'contentinum_files_storage_manager',
            'entity' => 'Mcwork\Entity\PublicAssetFiles',
        )        
    ),
    
    '/mcwork/assets/delete' => array(
        'splitQuery' => 3,
        'resource' => 'authorresource',
        'template' => 'content/assets/delete',
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Model\Assets\DeleteAssets',
            'entitymanager' => 'contentinum_files_storage_manager',
            'entity' => 'Mcwork\Entity\AssetsFiles',
        )
    ),
    
    '/mcwork/assetcollectionfiles' => array(
        'resource' => 'authorresource',
        'metaTitle' => 'assets collection files',
        'template' => 'content/assets/collectionfiles',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'assets collection files',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Assets\Files',
            'entitymanager' => 'contentinum_files_storage_manager',
            'entity' => 'Mcwork\Entity\AssetCollections',
        ),
        'assets' => array(
            'sets' => array('mcworkstylefiles','mcworkhead','mcworkassetsfiles'),
        ),        
    ), 
    
    
    '/mcwork/assetcollectionfiles/write' => array(
        'splitQuery' => 3,
        'resource' => 'publisherresource',
        'metaTitle' => 'edit_collection',
        'template' => 'forms/standard',
        'toolbar' => 1,
        'tableedit' => 1,
        'pageContent' => array(
            'headline' => 'edit_collection',
            'content' => ''
        ),
        'app' => array(
            'controller' => 'Mcwork\Controller\EditFormController',
            'worker' => 'Mcwork\Model\File\SaveContent',
            'entity' => 'Mcwork\Entity\AssetCollections',
            'entitymanager' =>  'contentinum_files_storage_manager',
            'formdecorators' => 'mcwork_form_decorators',
            'form' => 'Mcwork\Form\TemplateFileForm',
            'formaction' => '/mcwork/assetcollectionfiles/write',
            'settoroute' => '/mcwork/assetcollectionfiles'
        ),
        'assets' => array(
            'sets' => array('mcworkformstyles','mcworkhead','mcworkforms'),
        ),
    
    ),    
    
    '/mcwork/assetcollectionfiles/delete' => array(
        'splitQuery' => 3,
        'resource' => 'authorresource',
        'template' => 'content/assets/delete',
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Model\File\Delete',
            'entitymanager' => 'contentinum_files_storage_manager',
            'entity' => 'Mcwork\Entity\AssetCollections',
        )
    ), 

    
    
    // --- assets end --- service links start -----
    
    '/mcwork/services/application/filegroup' => array(
        'splitQuery' => 4,
        'resource' => 'authorresource',
        'template' => 'content/service/filegroupindex',
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\FileGroups\Categories',
            'entity' => 'Contentinum\Entity\WebMediaCategories',
        )
    ),    
    
    '/mcwork/services/application/savetags' => array(
        'splitQuery' => 4,
        'resource' => 'authorresource',
        'template' => 'content/service/tagindex',
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Model\Tags\SaveTags',
            'entity' => 'Contentinum\Entity\WebTags',
        )        
        
    ),
    
    '/mcwork/services/application/alltags' => array(
        'splitQuery' => 4,
        'resource' => 'authorresource',
        'template' => 'content/service/tagindex',
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Tags\TagIndex',
            'entity' => 'Contentinum\Entity\WebTags',
        )        
    ),
    
    '/mcwork/services/application/saveblogtags' => array(
        'splitQuery' => 4,
        'resource' => 'authorresource',
        'template' => 'content/service/tagindex',
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Model\Blog\SaveTags',
            'entity' => 'Contentinum\Entity\WebTags',
        )
    ),    
    
    '/mcwork/services/application/saveattribute' => array(
        'splitQuery' => 4,
        'resource' => 'authorresource',
        'template' => 'content/service/attribute',
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Model\Files\SaveAttribute',
            'entity' => 'Contentinum\Entity\WebMedias',
        )        
        
    ),
    
    '/mcwork/services/application/attribute' => array(
        'splitQuery' => 4,
        'resource' => 'authorresource',
        'template' => 'content/service/attribute',
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Files\Attribute',
            'entity' => 'Contentinum\Entity\WebMedias',
        )        
    ),
    

    
    '/mcwork/services/application/articlesettings' => array(
        'splitQuery' => 4,
        'resource' => 'authorresource',
        'template' => 'content/service/articlesettings',
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Blog\ArticleSettings',
            'entity' => 'Contentinum\Entity\WebContentGroups',
        )
    ),    
    
    '/mcwork/services/application/contentgroup' => array(
        'splitQuery' => 4,
        'resource' => 'authorresource',
        'template' => 'content/service/contentgroup',
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Content\GroupByPage',
            'entity' => 'Contentinum\Entity\WebPagesContent',
        )
    ),    
    
    '/mcwork/services/application/explorer' => array(
        'splitQuery' => 4,
        'resource' => 'authorresource',
        'template' => 'content/service/explorer',
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Files\Explorer',
            'entitymanager' => 'contentinum_files_storage_manager',
            'entity' => 'Mcwork\Entity\FsPublic',
        )
    ),    
    
    '/mcwork/services/application/dirlist' => array(
        'splitQuery' => 4,
        'resource' => 'authorresource',
        'template' => 'content/service/directoryindex',
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Files\DirectoryIndex',
            'entitymanager' => 'contentinum_files_storage_manager',
            'entity' => 'Mcwork\Entity\FsPublic',
        )        
    ),
        
    '/mcwork/services/application/copypublicdir' => array(
        'splitQuery' => 4,
        'resource' => 'authorresource',
        'template' => 'content/service/configure',
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Model\Medias\CopyDirectory',
            'entitymanager' => 'contentinum_files_storage_manager',
            'entity' => 'Mcwork\Entity\FsPublic',
        )
    ), 

    '/mcwork/services/application/copycollectionfile' => array(
        'splitQuery' => 4,
        'resource' => 'authorresource',
        'template' => 'content/service/configure',
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Model\Assets\CopyCollectionFile',
            'entitymanager' => 'contentinum_files_storage_manager',
            'entity' => 'Mcwork\Entity\AssetCollections',
        )    
    
    ),   
    
    '/mcwork/services/application/copyrename' => array(
        'splitQuery' => 4,
        'resource' => 'authorresource',
        'template' => 'content/service/configure',
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Model\File\CopyFile',
            'entitymanager' => 'contentinum_files_storage_manager',
        )
    ),    
    
    '/mcwork/services/application/copyassetfile' => array(
        'splitQuery' => 4,
        'resource' => 'authorresource',
        'template' => 'content/service/configure',
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Model\Assets\CopyFile',
            'entitymanager' => 'contentinum_files_storage_manager',
            'entity' => 'Mcwork\Entity\AssetsFiles',
        )
    ),
    
    '/mcwork/services/application/copyfile' => array(
        
        'splitQuery' => 4,
        'resource' => 'authorresource',
        'template' => 'content/service/configure',
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Model\Files\CopyFile',
            'entitymanager' => 'contentinum_files_storage_manager',
        )        
        
    ),
    
    '/mcwork/services/application/copyassetfiles' => array(
        'splitQuery' => 4,
        'resource' => 'authorresource',
        'template' => 'content/service/configure',
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Model\Assets\CopyFiles',
            'entitymanager' => 'contentinum_files_storage_manager',
            'entity' => 'Mcwork\Entity\AssetsFiles',
        )
    ),
    
    '/mcwork/services/application/publishitem' => array(
        'splitQuery' => 4,
        'resource' => 'authorresource',
        'template' => 'content/service/publish',
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Model\Publish\Item',
        )
    ),  
    
    '/mcwork/services/application/options' => array(
        'splitQuery' => 4,
        'resource' => 'authorresource',
        'template' => 'content/service/options',
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Model\Options\Values',
        )
    ), 
    
    '/mcwork/services/application/blogcategorie' => array(
        'splitQuery' => 4,
        'resource' => 'authorresource',
        'template' => 'content/service/options',
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Model\Options\BlogCategories',
        )        
    ),
    
    '/mcwork/services/application/blogselect' => array(
        'splitQuery' => 4,
        'resource' => 'authorresource',
        'template' => 'content/service/options',
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Model\Options\Blogs',
        )
    ), 
    
    '/mcwork/services/application/services' => array(
        'splitQuery' => 4,
        'resource' => 'authorresource',
        'template' => 'content/service/options',
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Model\Options\Services',
        )
    ),    
    
    '/mcwork/services/application/chown' => array(
        'splitQuery' => 4,
        'resource' => 'authorresource',
        'template' => 'content/service/chown',
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Model\Publish\Chown',
        )
    ),
    
    '/mcwork/services/application/rang' => array(
        'splitQuery' => 4,
        'resource' => 'authorresource',
        'template' => 'content/service/rang',
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Model\Publish\Rang',
        )
    ), 
    
    '/mcwork/services/application/submenue' => array(
        'splitQuery' => 4,
        'resource' => 'authorresource',
        'template' => 'content/service/submenu',
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Model\Navigation\SubMenu',
        )        
        
    ),
    
    '/mcwork/services/application/configure' => array(
        'splitQuery' => 4,
        'resource' => 'authorresource',
        'template' => 'content/service/configure',
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Configure',
            'entity' => 'Contentinum\Entity\WebPreferences',
        )
    ), 
    
    '/mcwork/services/application/unlock' => array(
        'splitQuery' => 4,
        'resource' => 'authorresource',
        'template' => 'content/service/configure',
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Model\Accounts\UnLockUser',
            'entity' => 'Contentinum\Entity\Users5',
        )
    ),    
    
    '/mcwork/services/application/linklist' => array(
        'splitQuery' => 4,
        'resource' => 'authorresource',
        'template' => 'content/service/options',
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Mapper\Pages\PagesLinks',
        )        
    ),
    
    '/mcwork/services/application/configuration' => array(
        'splitQuery' => 4,
        'resource' => 'authorresource',
        'template' => 'content/service/configuration',
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Model\Configuration\Settings',
        )
    ),    
    
    '/mcwork/services/application/setcache' => array(
        'splitQuery' => 4,
        'resource' => 'authorresource',
        'template' => 'content/service/publish',
        'app' => array(
            'controller' => 'Mcwork\Controller\McworkController',
            'worker' => 'Mcwork\Model\Cache\CacheSettings',
        )
    ),    
);