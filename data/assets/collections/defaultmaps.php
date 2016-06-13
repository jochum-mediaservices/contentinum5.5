<?php
return array(
    'path' => '/data/assets/default',
    'web' => '/assets/app',
    'collections' => array(
        'defaultmapsstyles' => array(
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
                '/css/fontawesome/fa.standard.css', 
                '/css/foundation.app.css',
                '/css/grid/foundation.grid.css',
                '/css/grid/foundation.grid.block.css',
                '/css/buttons/foundation.button.css',
                '/css/buttons/foundation.button.group.css',
                '/css/navigation/foundation.topbar.css',
                '/css/customer.maps.css',
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
        
        'defaultmapsscripts' => array(
            'debug' => false,
            'area' => 'inline',
            'type' => 'js',
            'onload' => true,
            'attr' => array(
                'type' => 'text/javascript'
            ),
            'assets' => array(
                '/js/vendor/jquery.js',
                '/js/maps/contentinum.map.js',
                '/js/foundation.js',
                '/js/foundation/foundation.topbar.js',
                '/js/maps/ini.maps.js',
                '/js/app.js'
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