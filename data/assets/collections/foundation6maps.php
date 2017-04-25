<?php
return array(
    'path' => '/data/assets/foundation6',
    'web' => '/assets/app',
    'collections' => array(
        'foundation6mapsstyles' => array(
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
                '/css/opensansbold.css',
                '/css/opensansregular.css',
                '/css/opensanslight.css',
                '/css/foundation.app.css',
                '/css/grid/foundation.grid.full.css',
                '/css/foundation.typo.css',
                '/css/buttons/foundation.buttons.css',
                '/css/content/foundation.callout.css',
                '/css/content/foundation.accordion.css',
                '/css/menu/foundation.menu.css',
                '/css/menu/foundation.menuicon.css',
                '/css/menu/foundation.drilldown.css',
                '/css/menu/foundation.dropdown.css',
                '/css/menu/foundation.topbar.css',
                '/css/content/foundation.titlebar.css',
                '/css/customer.maps.css',                
                '/css/customer.app.css',
                '/css/foundation.helpers.css',
            ),
            'includes' => array(
                '/data/usr/share/min/css/cssmin-v3.0.1.php'
            )
            ,
            'filters' => array(
                'mincss' => 'Assetic\Filter\CssMinFilter'
            )
        ),
       
        'foundation6mapsscripts' => array(
            'debug' => false,
            'area' => 'inline',
            'type' => 'js',
            'onload' => true,
            'attr' => array(
                'type' => 'text/javascript'
            ),
            'assets' => array(
                '/js/vendor/jquery.js',
                '/js/vendor/what-input.js',
                '/js/maps/contentinum.map.js',
                '/js/foundation/foundation.core.js',
                '/js/foundation/foundation.util.mediaQuery.js',
                '/js/foundation/foundation.util.touch.js',
                '/js/foundation/foundation.util.keyboard.js',
                '/js/foundation/foundation.util.box.js',
                '/js/foundation/foundation.util.nest.js',
                '/js/foundation/foundation.util.triggers.js',
                '/js/foundation/foundation.accordionMenu.js',
                '/js/foundation/foundation.drilldown.js',
                '/js/foundation/foundation.dropdownMenu.js',
                '/js/foundation/foundation.responsiveMenu.js',
                '/js/foundation/foundation.responsiveToggle.js',
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