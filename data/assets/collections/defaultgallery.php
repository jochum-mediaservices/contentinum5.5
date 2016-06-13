<?php
return array(
    'path' => '/data/assets/default',
    'web' => '/assets/app',
    'collections' => array(
        'defaultgallerystyles' => array(
            'debug' => false,
            'area' => 'styles',
            'type' => 'styles',
            'attr' => array(
                'media' => 'screen',
                'rel' => 'stylesheet'
            ),
            'assets' => array(
                '/css/fontawesome.css',
                '/css/fontawesome/font.size.css',   
                '/css/fontawesome/font.files.css',
                '/css/fontawesome/fa.standard.css',
                '/css/foundation.app.css',
                '/css/grid/foundation.grid.css',
                '/css/grid/foundation.grid.block.css',
                '/css/buttons/foundation.button.css',
                '/css/buttons/foundation.button.group.css',
                '/css/media/foundation.orbit.css',
                '/css/callouts/foundation.panels.css',
                '/css/callouts/foundation.tooltips.css',
                '/css/navigation/foundation.topbar.css',
                '/css/popup/magnific.popup.css',
                '/css/customer.app.css',
                '/css/customer.helper.css',
            ),
            'includes' => array(
                '/data/usr/share/min/css/cssmin-v3.0.1.php'
            )
            ,
            'filters' => array(
                'mincss' => 'Assetic\Filter\CssMinFilter'
            )
        ),
        'defaultheader' => array(
            'debug' => false,
            'area' => 'head',
            'type' => 'js',
            'attr' => array(
                'type' => 'text/javascript'
            ),
            'assets' => array(
                '/js/vendor/modernizr.js'
            )
        ),
        
        'defaultgalleryscripts' => array(
            'debug' => false,
            'area' => 'inline',
            'type' => 'js',
            'onload' => true,
            'attr' => array(
                'type' => 'text/javascript'
            ),
            'assets' => array(
                '/js/vendor/jquery.js',
                '/js/gallery/jquery.magnificpopup.min.js',
                '/js/gallery/contentinum.gallery.js',
                '/js/foundation.js',
                '/js/foundation/foundation.tooltip.js',
                '/js/foundation/foundation.orbit.js',
                '/js/foundation/foundation.topbar.js',               
                '/js/gallery/ini.lightbox.js',
                '/js/app.js',
            ),
            'includes' => array(
                '/data/usr/share/min/js/JSMin.php'
            )
            ,
            'filters' => array(
                'minjs' => 'Assetic\Filter\JSMinFilter'
            )            
        )
    )
);