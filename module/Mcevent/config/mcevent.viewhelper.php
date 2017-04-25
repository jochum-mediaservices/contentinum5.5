<?php
return array(
    'invokables' => array(
        'eventdates' => 'Mcevent\View\Helper\Event\DatesRow',
        'eventdatesregister' => 'Mcevent\View\Helper\Event\DatesRowRegister', 
        'eventapp' => 'Mcevent\View\Helper\Event\App',
        'eventyeararchive' => 'Mcevent\View\Helper\Event\ArchivDatesRow',
        'eventnavigation' => 'Mcevent\View\Helper\Event\Navigation', 
        'eventdatedwnlnk' => 'Mcevent\View\Helper\Download\Calendar', 
        'eventgroupdwnlnk' => 'Mcevent\View\Helper\Download\Group', 
    )
);