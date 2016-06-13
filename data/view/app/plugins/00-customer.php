<?php
return array(
    'plugins' => array(
        'example' => array(
            'viewhelper' => 'example',
            'key' => 'pluginarea',
            'name' => 'Kurze Templatebeschreibung',
            'element' => array(
                'row' => array(
                    'element' => 'tag',
                    'attr' => array(
                        'id' => 'tagid',
                        'class' => 'tagclass'
                    ),
                    'content:before' => 'Diesen Inhalt davor einfügen',
                    'content:after' => 'Diesen Inhalt danach einfügen'
                ),
                'grid' => array(
                    'element' => 'tag',
                    'attr' => array(
                        'id' => 'tagid',
                        'class' => 'tagclass'
                    ),
                    'content:before' => 'Diesen Inhalt davor einfügen',
                    'content:after' => 'Diesen Inhalt danach einfügen'
                )
            )
        )
    )
);