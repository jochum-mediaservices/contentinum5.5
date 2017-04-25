<?php
return array( //ALTER TABLE `account_groups` ADD `enable_internet` TINYINT(1) NOT NULL DEFAULT '1' AFTER `enable_description`;
    5564 => array(
        "ALTER TABLE `web_medias` CHANGE `media_link` `media_link` VARCHAR(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;"
    ),
    5563 => array(
        'Backend Update: jquery datatables version 1.10.13'
    ),    
    5562 => array(
        'Tags für Organisation anlegen und Organisationen zuweisen'
    ),
    5561 => array(
        'Organisationen mit Kontakte verknüpfen, als Gruppe anzeigen',
        "CREATE TABLE `account_contacts` ( `id` int(11) UNSIGNED NOT NULL,  `account_id` int(20) UNSIGNED NOT NULL,  `contacts_id` int(11) UNSIGNED NOT NULL,  `created_by` int(11) UNSIGNED NOT NULL DEFAULT '0',  `update_by` int(11) UNSIGNED NOT NULL DEFAULT '0',  `register_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',  `up_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00') ENGINE=InnoDB DEFAULT CHARSET=utf8;ALTER TABLE `account_contacts`ADD PRIMARY KEY (`id`);",
    ),
    5560 => array(
        'Contentinum build 5560',
    ), 
    5559 => array(
        'Update FontAwesome auf Version 4.7',
    ),
    5558 => array(
        'Download Kalender als csv oder ics Datei',
    ),
    5557 => array(
        'Upgrade TinyMCE auf Version 4.5.2',
    ),    
    5556 => array(
        'Upgrade Foundation auf Version 6.3',
    ),
    5555 => array(
        "ALTER TABLE `mcevent_types` ADD `calc_key` VARCHAR(40) NOT NULL AFTER `description`;",
        "ALTER TABLE `mcevent_group` ADD `calc_key` VARCHAR(40) NOT NULL AFTER `params`;"
    ),
    5554 => array(
        "ALTER TABLE `contact_group_index` CHANGE `business_title` `business_title` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;",
    ),
    5553 => array(
        "ALTER TABLE `contact_groups` ADD `enable_orgaphone` TINYINT(1) NOT NULL DEFAULT '1' AFTER `enable_orgaddress`, ADD `enable_orgamail` TINYINT(1) NOT NULL DEFAULT '1' AFTER `enable_orgaphone`, ADD `enable_orgainternet` TINYINT(1) NOT NULL DEFAULT '1' AFTER `enable_orgamail`;",
    ),
    5552 => array(
        'robots.txt und Standard favicon.ico hinzugefügt',
    ),
    5551 => array(
        'Neue CSS Klasse (Faxnummer) in Microdata Templates',
    ),
    5550 => array(
        'Platzhalter für den Kopfbereich auf der Startseite'
    ),
    5549 => array(
        'Neue Javascript Biblotheken und Kollektions für Teilnehmerregistrierung, Terminbuchungen',
    ),    
    5548 => array(
        'Update javascript Formularvalidation',
    ),
    5547 => array(
        'Meta Beschreibung in den Seiteneigenschaften von 180 auf 500 Zeichen verlängert.',
        "ALTER TABLE `web_pages_parameter` CHANGE `meta_description` `meta_description` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;"
    ),
    5546 => array(
        'Termine mit Teilnehmeranmeldungen',
        "ALTER TABLE `mcevent_dates_register` ADD `num_groupmember` INT(4) NOT NULL DEFAULT '0' AFTER `merkblatt`;",
        "ALTER TABLE `mcevent_dates_config` ADD `settings_formular` TEXT NOT NULL AFTER `emailsignature`;",
        "ALTER TABLE `mcevent_dates_register` ADD `stay_breakfast` VARCHAR(10) NOT NULL AFTER `num_groupmember`, ADD `stay_lunch` VARCHAR(10) NOT NULL AFTER `stay_breakfast`, ADD `stay_dinner` VARCHAR(10) NOT NULL AFTER `stay_lunch`;",
        "ALTER TABLE `mcevent_dates_register` ADD `stay_overnight` VARCHAR(10) NOT NULL AFTER `stay_dinner`;",
        "ALTER TABLE `mcevent_dates_register` CHANGE `name` `name` VARCHAR(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;",
    ),
    5545 => array(
        'Formularfelder in Spalten anordnen',
    ),
    5544 => array(
        'Anmelden zu einer Veranstaltung: Interresenten können sich zu einer Veranstaltung anmelden',
        "ALTER TABLE `mcevent_dates` ADD `applicant_int` INT(4) NOT NULL DEFAULT '0' AFTER `public_view`;",
        "ALTER TABLE `mcevent_dates` ADD `applicant_ext` INT(4) NOT NULL DEFAULT '0' AFTER `applicant_int`;",
        "ALTER TABLE `mcevent_dates` ADD `configure_id` INT(5) NOT NULL DEFAULT '0' AFTER `calendar_id`;",
    ),
    5543 => array(
        'Einstellungen Gästebuch als Datenbankeintrag'
    ),    
    5542 => array(
        'Überarbeitung Javascript Fehlermeldungen bei Formularvaldierungen im Frontend'
    ),    
    5541 => array(
        'Übersetzungen'
    ),    
    5540 => array(
        'Weitere Beitragsformatierung: Large Grids'
    ),    
    5539 => array(
        'Weitere Beitragsformatierung unter Foundation6: "Combined Column/Row", reduzierter HTML Quellcode'
    ),
    5538 => array(
        'BUG Template addierende Schleife bei Auswahl einer Beitragsformatierung, Revision: Schleife entfernt',
    ),    
    5537 => array(
        'Name Kontakt Erweiterung (Post)',
    ),
    5536 => array(
        'Neue Page Option Eigenschaft: populateFromFactory',
    ),
    5535 => array(
        'Automatisiertes setzen von Formular Filter wenn Pflichtfeld oder kein Pflichtfeld',
    ),
    5534 => array(
        'Modul Feuerwehr: Einsatzberichte Portierung von Version 4.4 abgeschlossen',
        "ALTER TABLE `fw_misson_report` ADD `mission_mediagroup_id` INT(20) NOT NULL DEFAULT '0' AFTER `id`;",
        "ALTER TABLE `fw_misson_report` CHANGE `mission_alarmweg` `mission_alarmweg` VARCHAR(500) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '';",
        "ALTER TABLE `fw_misson_assign_num` CHANGE `id` `id` INT(20) UNSIGNED NOT NULL AUTO_INCREMENT;ALTER TABLE `fw_misson_equipment` CHANGE `id` `id` INT(20) UNSIGNED NOT NULL AUTO_INCREMENT;",
        "ALTER TABLE `fw_misson_report` CHANGE `mission_description` `description` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;",
        "ALTER TABLE `fw_equipment` CHANGE `equipment_id` `equipment_id` VARCHAR(36) NOT NULL;ALTER TABLE `fw_equipment` CHANGE `department_id` `department_id` VARCHAR(36) NOT NULL;",
        "ALTER TABLE `fw_misson_report` ADD `img_caption` VARCHAR(250) NOT NULL AFTER `img_source`, ADD `img_style` VARCHAR(250) NOT NULL AFTER `img_caption`, ADD `img_teaser` VARCHAR(250) NOT NULL AFTER `img_style`;",
    ),
    5533 => array(
        'Neue Parameter in Account Tabelle zur begrenzug von Einträgen vom Feuerwehr Modul ',
        "ALTER TABLE `accounts` ADD `fw_account` TINYINT(1) NOT NULL DEFAULT '0' AFTER `municipal_directory`;ALTER TABLE `accounts` ADD `fw_resource` TINYINT(1) NOT NULL DEFAULT '0' AFTER `fw_account`;ALTER TABLE `accounts` ADD `disable` TINYINT(1) NOT NULL DEFAULT '0' AFTER `fw_resource`;",
    ),
    5532 => array(
        'Municipal Benutzer in Zugriffsgruppen einordnen (municipal/usringrp)',
    ),    
    5531 => array(
        'Zusätzlichen Feld Mobile Telefonnummer in Organisationen',
        "ALTER TABLE `accounts` ADD `phone_mobile` VARCHAR(50) NOT NULL AFTER `phone_alternate`;",
    ),
    5530 => array(
        'Zusätzlichen Feld Post Namenserweiterung in Kontakte',
        "ALTER TABLE `contacts` ADD `name_extension` VARCHAR(200) NOT NULL AFTER `last_name`;",
    ),
    5529 => array(
        'Konfiguration Fieldset bei Formularen',
        "ALTER TABLE `web_forms_field` ADD `fieldset` INT(1) NOT NULL DEFAULT '0' AFTER `field_class`;ALTER TABLE `web_forms_field` ADD `fieldset_legend` VARCHAR(250) NOT NULL AFTER `fieldset`;ALTER TABLE `web_forms_field` ADD `fieldset_attributes` TEXT NOT NULL AFTER `fieldset_legend`;",
    ),
    5528 => array(
        'Neues Plugin/Modul: Feuerwehr (Upgrade von Contentinum 4.4)',
    ),    
    5527 => array(
        'Update Doctrine/ORM Module auf ~1.1',
    ),    
    5526 => array(
        'Neues Plugin/Modul: Gästebuch (Upgrade von Contentinum 4.4)',
    ),    
    5525 => array(
        'Anpassungen an Zend Framework 2.7; Vorbereitungen auf ZF 3',
    ),    
    5524 => array(
        'Vollständiger Wechsel Zend Framework von Version 2.4 auf 2.5/2.7',
    ),    
    5523 => array(
        'Neuer View Helper: Sitemap als HTML Version nach Linkwertigkeit sortiert',
    ),    
    5522 => array(
        'Municipal Kontakte Sachgebiete und Fachbreiche ein- und ausblenden von Kontaktdaten',
        "ALTER TABLE `municipal_fachbereiche` ADD `enable_dept_phone` TINYINT(1) NOT NULL DEFAULT '0' AFTER `description`, ADD `enable_dept_fax`  TINYINT(1) NOT NULL DEFAULT '0' AFTER `enable_dept_phone`, ADD `enable_dept_email`  TINYINT(1) NOT NULL DEFAULT '0' AFTER `enable_dept_fax`, ADD `enable_dept_internet`  TINYINT(1) NOT NULL DEFAULT '0' AFTER `enable_dept_email`;",        
        "ALTER TABLE `municipal_sachgebiete` CHANGE `sg_internet` `debt_internet` VARCHAR(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;ALTER TABLE `municipal_sachgebiete` CHANGE `sg_email` `debt_email` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;ALTER TABLE `municipal_sachgebiete` CHANGE `sg_fax` `debt_fax` VARCHAR(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;ALTER TABLE `municipal_sachgebiete` CHANGE `sg_phone` `debt_phone` VARCHAR(25) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;",
        "ALTER TABLE `municipal_sachgebiete` ADD `enable_dept_phone` TINYINT(1) NOT NULL DEFAULT '0' AFTER `enable_organization`, ADD `enable_dept_fax`  TINYINT(1) NOT NULL DEFAULT '0' AFTER `enable_dept_phone`, ADD `enable_dept_email`  TINYINT(1) NOT NULL DEFAULT '0' AFTER `enable_dept_fax`, ADD `enable_dept_internet`  TINYINT(1) NOT NULL DEFAULT '0' AFTER `enable_dept_email`;",
    ),    
    5521 => array(
        'Core Update: Wechsel bei Zend Framework Komponenten zu den Versionen 2.5, 2.6, 2.7',
    ),    
    5520 => array(
        'Verbesserung der abfrage von Inhalten per Zeitsteuerung',
    ),    
    5519 => array(
        'Update tinymce auf version 4.4.1',
    ),    
    5518 => array(
        'Erstellen von Bildergruppen durch auslesen eines Dateiverzeichnisses',
    ),    
    5517 => array(
        "ALTER TABLE `municipal_service_groups` ADD `allowedips` VARCHAR(500) NOT NULL AFTER `groupscope`;ALTER TABLE `municipal_service_groups` ADD `urlident` VARCHAR(50) NOT NULL AFTER `groupscope`;",
    ),
    5516 => array(
        "Kleine Fehler und kleine Anpassungen",
        "UPDATE `web_maps_data` SET `web_medias_id`= 1 WHERE `web_medias_id` = 0;",
    ),
    5515 => array(
        "Anpassung der Tabellenspalten an die function date('D')",
        "ALTER TABLE `municipal_service_open` CHANGE `mo` `mon` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;
        ALTER TABLE `municipal_service_open` CHANGE `tu` `tue` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;
        ALTER TABLE `municipal_service_open` CHANGE `we` `wed` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;
        ALTER TABLE `municipal_service_open` CHANGE `th` `thu` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;
        ALTER TABLE `municipal_service_open` CHANGE `fr` `fri` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;
        ALTER TABLE `municipal_service_open` CHANGE `sa` `sat` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;
        ALTER TABLE `municipal_service_open` CHANGE `su` `sun` VARCHAR(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL;",
        "ALTER TABLE `municipal_service_open` ADD `variable_holidays` VARCHAR(250) NOT NULL AFTER `close_days`;",
    ),
    5514 => array(
        "Auswahl für Municipal Userlogin setzen",
        "ALTER TABLE `field_types` ADD `select_login` INT(1) NOT NULL DEFAULT '0' AFTER `params`;"
    ),
    5513 => array(
        'Neues Features: Content Post Loader für Verzeichnisse',
    ),  
    5512 => array(
        'Neues Features: VHS Verwaltung',
    ),    
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