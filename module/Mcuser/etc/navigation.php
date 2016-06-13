<?php
return array(
    'navigation' => array(
        'default' => array(
            array(
                'label' => 'Mcwork_Controller_User',
                'uri' => '#',
                'order' => 99,
                'resource' => 'authorresource',
                'listClass' => 'has-dropdown',
                'subUlClass' => 'dropdown',
                'pages' => array(
                    array(
                        'label' => 'Logout',
                        'uri' => '/logout',
                        'resource' => 'memberresource'
                    )
                )
            )
        )
    )
);