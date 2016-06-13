<?php
return array(
    'path' => '/data/assets/foundation6',
    'web' => '/assets/app',
    'collections' => array(
        'foundation6loginstyles' => array(
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
                '/css/form/foundation.forms.css',
                '/css/form/customer.form.css',
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
       
        'foundation6loginscripts' => array(
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
                '/js/form/jquery.mcworkform.js',
                '/js/vendor/what-input.js',
                '/js/foundation/foundation.core.js',
                '/js/foundation/foundation.util.mediaQuery.js',
                '/js/foundation/foundation.util.touch.js',
                '/js/form/validate.form.js',
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