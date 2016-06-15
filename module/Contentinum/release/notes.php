<?php
return array(
    5511 => array(
        'Zugriffsrechte Backendnavigation auf Organisationsgruppen und Kontaktgruppen',
    ),    
    5510 => array(
        "ALTER TABLE `municipal_user_acls` CHANGE `login_group` `login_group` INT(5) UNSIGNED NOT NULL DEFAULT '0';",
        "ALTER TABLE `web_content` ADD `resource_group` INT(5) UNSIGNED NOT NULL DEFAULT '0' AFTER `resource`;"
    ),
    5509 => array(
        'Revision: Enable/Disable Parameters in Organisation Gruppen, neuer ViewHelper',
        "ALTER TABLE `account_groups`  ADD `enable_organisation_ext` TINYINT(1) NOT NULL DEFAULT '1' AFTER `params`, ADD `enable_img_source` TINYINT(1) NOT NULL DEFAULT '1' AFTER `enable_organisation_ext`, ADD `enable_account_fax` TINYINT(1) NOT NULL DEFAULT '1' AFTER `enable_img_source`, ADD `enable_account_phone` TINYINT(1) NOT NULL DEFAULT '1' AFTER `enable_account_fax`, ADD `enable_phone_alternate` TINYINT(1) NOT NULL DEFAULT '0' AFTER `enable_account_phone`,ADD `enable_account_email` TINYINT(1) NOT NULL DEFAULT '1' AFTER `enable_phone_alternate`, ADD `enable_account_street` TINYINT(1) NOT NULL DEFAULT '1' AFTER `enable_account_email`,  ADD `enable_account_addresss` TINYINT(1) NOT NULL DEFAULT '0' AFTER `enable_account_street`, ADD `enable_account_city` TINYINT(1) NOT NULL DEFAULT '1' AFTER `enable_account_addresss`, ADD `enable_description` TINYINT(1) NOT NULL DEFAULT '1' AFTER `enable_account_city`;",
    ),
    5508 => array(
        'Revision: Änderung in Mapper\Contacts, Begrenzung Abfrage auf dem Wert contact',
        "ALTER TABLE `contacts` ADD `contact_type` VARCHAR(10) NOT NULL DEFAULT 'contact' AFTER `deleted`;"
    ),
    5507 => array(
        'BUG: Beim hinzufügen von weiteren Beiträgen in eine Gruppe, verliert diese das gesetzte Template',
        'Revision: Änderung in Content\SaveContribution, Einsatz von preg_match um Werte zu vergleichen',
    ),    
    5506 => array(
        'BUG: Benutzer lassen sich nicht aus Benutzergruppen entfernen',
        'Revision: BackendPage mcwork/usringrp/delete und Accounts\DeleteUseringroups',
    ),    
    5505 => array(
        'BUG: Benutzer lassen sich nicht löschen',
        'Revision: BackendPage mcwork/user/delete und Accounts\DeleteUsers',
    ),    
    5504 => array(
        'BUG: Kein Emailversand bei interner Antragerstellung',
        'Revision: Municipal\SaveTrashOrder Auswertung Wert sendConfirm von number auf string gesetzt', 
    ),
    5503 => array(
        'BUG: Telefonummervalidierung im öffentlichen Antragsformular; Fehler bei iOS Geräten da keine durchgeschriebene Nummer zulässig.',
        'Revision: jquery.validate.js: tel: Durchgeschriebene Telefonummer jetzt möglich.',
    ),    
    5502 => array(
        'Revision: Übersetzungen',
    ),    
    5501 => array(
        'Revision: Municipal Sachgebiet überschreiben der E-Mailadresse aus Kontakte',
        "ALTER TABLE `municipal_organisation` ADD `contact_email` VARCHAR(100) NOT NULL AFTER `phone_fax`;",
    ),    
    5500 => array(
        'Revision: Setzen einer Collection als aktiv in Nutzung',
    ),    
    5499 => array(
        'Revision: Eindeutige Bezeichnungen bei Auswahl von Plugins im Beitrag',
    ),
    5498 => array(
        'Revison: Abhaken und entfernen der überprüften Beiträge aus der Liste durch den Administrator',
        "ALTER TABLE `web_content` ADD `updateflag` INT(1) UNSIGNED NOT NULL DEFAULT '0' AFTER `deleted`;",
    ),
    5497 => array(
        'Revision: Dashboard für Administratoren, Liste Beiträge die zuletzt geandert oder neu angelegt worden sind',
    ),    
    5496 => array(
        'Revision: Zugriffsrechte im Backend',
    ),    
    5495 => array(
        'Revision: Formularfeld Überschrift entfernt Mcwork\FormContactGroupForm',
    ),    
    5494 => array(
        'Revision: Dashboard Anträge Sperrmüll für Mitarbeiter mit diesem Aufgabengebiet',
    ),    
    5493 => array(
        'Revision: Dashboard Municipal für Municipal Benutzer',
    ),
    5492 => array(
        'Revision: Neuer Bereich unter Verwaltung: Kommunale Organisationen und Einrichtungen',
        "ALTER TABLE `accounts` ADD `municipal_account` INT(1) NOT NULL DEFAULT '0' AFTER `occupancy_resource`, ADD `municipal_local` INT(1) NOT NULL DEFAULT '0' AFTER `municipal_account`, ADD `municipal_directory` INT(1) NOT NULL DEFAULT '0' AFTER `municipal_local`;",
        "INSERT INTO `field_types` (`id`, `name`, `typescope`, `params`, `created_by`, `update_by`, `register_date`, `up_date`) VALUES ((SELECT MAX( id )+1 FROM field_types acctypes), 'Kommunale Organisationen', 'municipalaccount', '', '1', '1', NOW(), NOW());",
    ),
    5491 => array(
        'Revision: Municipal Navigation',
    ),
    5490 => array(
        'Revision: Modul Blog Auswahl per Kategorie',
    ),    
    5489 => array(
        'Revision: Begrenzung Abfrage auf 250 Beiträge in Mcwork\Mapper\Blog\Article für schneller Ladezeit bei sehr vielen Artikeln im Backend',
    ),
    5488 => array(
        'Revision: Straßen sortiert nach Alphabet im Öffentlichen Formular Sperrmüllbestellung',
    ),    
    5487 => array(
        'BUG: Sperrmüllbestellung Entity Link beim Speichern: Änderung Municipal\Model\Trash\SavePublicOrder und pages.php in beiden fehlende Entity hinzugefügt',
    ),    
    5486 => array(
        'Revision: Änderung Formular Felder Sperrmüllbestellung auf Type: Email und Phone für den Mobilbenutzer',
    ),    
    5485 => array(
        'Municipal Anträge auf Sperrmüll Kundenkonfiguration',
    ),    
    5484 => array(
        'Municipal Anträge auf Sperrmüll Basiskonfiguration',
    ),    
    5483 => array(
        'Municipal Abfallwirtschaft Basiskonfiguration',
    ),    
    5482 => array(
        'Foundation 6 Templates erstellt',
    ),
    5481 => array(
        'Foundation 6 ViewHelper erstellt',
    ),    
    5480 => array(
        'Municipal Verzeichnisse Basiskonfiguration',
    ),
    5479 => array(
        'Update municipal_trash_calendar mit date_end Spalte. Änderung Municipal\Entity\TrashCalendar',
        "ALTER TABLE `municipal_trash_calendar` ADD `date_end` DATETIME NOT NULL DEFAULT '0000-00-00 00:00:00' AFTER `date_start`;"
    ),
    5478 => array(
        'BUG: Löschen von MapMarkern ohne Wirkung: Änderung in mcwork pages.php, neue Datei Mcwork\Model\Maps\DeleteMarker',
    ),    
    5477 => array(
        'BUG: Abfrage Map Marker Veröffentlichungsstatus wird nicht berücksichtigt: Änderung in Mapper\ModulMaps',
    ),    
    5476 => array(
        'Publish/Unpublish Schalter für Organisationen',
    ),
    5475 => array(
        'Umbau Abfragen Veranstaltungskalender von Doctrine Mapper zu Nativem SQL',
        'Änderungen in Mcevent\Mapper\ModulActualDates, Mcevent\Mapper\ModulActualGroupDates, Mcevent\Mapper\ModulDates und Mcevent\View\Helper\Event\DatesRow',
        'Neue Datei (abstract class) Mcevent\Mapper\AbstactEventQueries mit dem nativen SQL String',
    ),
    5474 => array(
        'Veranstaltungsorauswahl bei Termin anlegen erweitert: Service\Accounts\LocationServiceFactory'
    ),
    5473 => array(
        'Municipal:BUG: Fontawesome Icon für Building wird nicht gesetzt: Änderung am Municipal\View\Helper\Municipal\Departments',
    ),
    5472 => array(
        'BUG: Content templates werden nicht eingesetzt: Änderund am ApplicationController, Helper\Content',
    ),
    5471 => array(
        'BUG: Mapmarker Icons werden nicht angezeigt: Änderung in Datenbank, Entity\WebMapsData, Form\MapMarkerForm, Helper\Maps',
        "ALTER TABLE `web_maps_data` CHANGE `map_marker` `map_marker` VARCHAR(250) NOT NULL DEFAULT '_nomedia';",
        "UPDATE `web_maps_data` SET `map_marker` = '_nomedia' WHERE `map_marker` = 0;"
    ),
    5470 => array(
        'Kopieren von einzelnen Asset collection files, Implementierung einer einfachen Editorfunktion (Textfeld)',
    ),
    5469 => array(
        'Cache public Administration für Manager im Backend',
        'Ein/Aus der Cachespeicher von öffentlichen Content, wie Seiten, Navigation, Domainkonfiguration'
    ),    
    5468 => array(
        'Neue Konfigurationdatei für das Modul contentinum, verhindert das überschreiben beim Update'
    ),    
    5467 => array(
        'Enable/Disable Navigation Cache, neuer Wert in contentinum.config'
    ),    
    5466 => array(
        'Umbruch Erweiterung Organisationsnamen in Steckbriefen, Standard ist das span Tag mit class="organization-further"',
        'Änderung der ViewHelper Microdata\ContactGroup und Microdata\Organisation'
    ),
);