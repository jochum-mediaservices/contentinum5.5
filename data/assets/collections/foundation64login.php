<?php
return array(
    'path' => '/data/assets/foundation64',
    'web' => '/assets/app',
    'collections' => array(
        'foundation64loginstyles' => array(
            'debug' => false,
            'area' => 'styles',
            'type' => 'styles',
            'attr' => array(
                'media' => 'screen',
                'rel' => 'stylesheet'
            ),
            'assets' => array(
                '/css/fontawesome.css',
                '/css/fontawesome/fa.standard.css',
                '/css/opensansbold.css',
                '/css/opensansregular.css',
                '/css/opensanslight.css',
                '/css/foundation.app.css',
                '/css/grid/foundation.grid.full.css',
                '/css/foundation.typo.css',
                '/css/buttons/foundation.buttons.css',
                '/css/content/foundation.callout.css',
                '/css/form/foundation.forms.css',
                '/css/form/customer.forms.css',
                '/css/foundation.helpers.css',
                '/css/customer.app.css',
                '/css/login.app.css'
            ),
            'includes' => array(
                '/data/usr/share/min/css/cssmin-v3.0.1.php'
            )
            ,
            'filters' => array(
                'mincss' => 'Assetic\Filter\CssMinFilter'
            )
        ),
       
        'foundation64loginscripts' => array(
            'debug' => false,
            'area' => 'inline',
            'type' => 'js',
            'onload' => true,
            'attr' => array(
                'type' => 'text/javascript'
            ),
            'assets' => array(
                '/js/vendor/jquery.js',
                '/js/form/jquery.validate.js',
                '/js/vendor/what-input.js',
                '/js/vendor/foundation.js',
                '/js/app.js',
                '/js/login/login.js'
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