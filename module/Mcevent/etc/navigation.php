<?php
return array(
    
    'pages' => array(
        array(
            'label' => 'Termine',
            'uri' => '#',
            'resource' => 'authorresource',
            'listClass' => 'has-dropdown',
            'subUlClass' => 'dropdown',
            'pages' => array(
                array(
                    'label' => 'Termine',
                    'uri' => '/mcevent/eventdate',
                    'resource' => 'authorresource',               
                ),                
                array(
                    'label' => 'Kalender',
                    'uri' => '/mcevent/calendar',
                    'resource' => 'managerresource'
                ),
                array(
                    'label' => 'Kalender Gruppen',
                    'uri' => '/mcevent/calendargroup',
                    'resource' => 'managerresource'
                ),
                array(
                    'label' => 'Anmeldungen zu einem Termin',
                    'uri' => '/mcevent/registrations',
                    'resource' => 'authorresource',
                ),
                array(
                    'label' => 'Konfiguration Teilnehmeranmeldung',
                    'uri' => '/mcevent/configuration',
                    'resource' => 'managerresource'
                ),                
            )
        )
    )
);