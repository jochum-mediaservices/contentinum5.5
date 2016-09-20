<?php
return array(
    
    'pages' => array(
        array(
            'label' => 'Guestbook',
            'uri' => '#',
            'resource' => 'authorresource',
            'listClass' => 'has-dropdown',
            'subUlClass' => 'dropdown',
            'pages' => array(
                array(
                    'label' => 'Einträge',
                    'uri' => '/guestbook/entries',
                    'resource' => 'authorresource',               
                ),  
                array(
                    'label' => 'Konfiguration',
                    'uri' => '/guestbook/configuration',
                    'resource' => 'authorresource',
                ),                
            )
        )
    )
);