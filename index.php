<?php

require_once "classes/autoloader.php";
require_once "settings/config.php";

error_reporting (E_ALL);

if (version_compare(phpversion(), '5.1.0', '<') == true) { die ('PHP5.1 Only'); }

// Константы:
define ('DIRSEP', DIRECTORY_SEPARATOR);

// Узнаём путь до файлов сайта
$site_path = realpath(dirname(__FILE__) . DIRSEP . '.' . DIRSEP) . DIRSEP;
define ('site_path', $site_path);

// Get config file-class
$config = new Config();

// Run main starter
$bootstrap = new Bootstrap($config);
$bootstrap->run();


?>