<?php
return array(
    'path' => '/data/assets/default',
    'web' => '/assets/app',
    'collections' => array(
        'defaulteventregisterstyles' => array(
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
                '/css/fontawesome/font.spinpulse.css',
                '/css/fontawesome/fa.standard.css',                
                '/css/foundation.app.css',
                '/css/grid/foundation.grid.css',
                '/css/grid/foundation.grid.block.css',
                '/css/buttons/foundation.button.css',
                '/css/buttons/foundation.button.group.css',
                '/css/form/foundation.forms.css',
                '/css/callouts/foundation.panels.css',
                '/css/navigation/foundation.topbar.css',
                '/css/form/customer.form.css',
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
            'onload' => true,
            'attr' => array(
                'type' => 'text/javascript'
            ),
            'assets' => array(
                '/js/vendor/modernizr.js'
            )
        ),
        
        'defaulteventregisterscripts' => array(
            'debug' => false,
            'area' => 'inline',
            'type' => 'js',
            'onload' => true,
            'attr' => array(
                'type' => 'text/javascript'
            ),
            'assets' => array(
                '/js/vendor/jquery.js',
                '/js/form/jquery.validate.v1.5.js',
                '/js/form/jquery.mcworkform.js',
                '/js/ics/contentinum.events.js',
                '/js/ics/ics-libs.js',
                '/js/foundation.js',
                '/js/foundation/foundation.topbar.js',
                '/js/form/validate.form.js',
                '/js/app.js',
                '/js/ics/getics.js',
                '/js/content/event.register.js',
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