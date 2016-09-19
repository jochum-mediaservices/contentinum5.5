<?php
return array(
    
    'pages' => array(
        array(
            'label' => 'Newsletter',
            'uri' => '#',
            'resource' => 'authorresource',
            'listClass' => 'has-dropdown',
            'subUlClass' => 'dropdown',
            'pages' => array( 
                array(
                    'label' => 'Tags',
                    'uri' => '/newsletter/tags',
                    'resource' => 'authorresource',
                ),
                array(
                    'label' => 'Interessenten',
                    'uri' => '/newsletter/users',
                    'resource' => 'authorresource',
                ),
                array(
                    'label' => 'Tags, Interessenten',
                    'uri' => '/newsletter/tagbyuser',
                    'resource' => 'authorresource',
                ),                
            )
        )
    )
);