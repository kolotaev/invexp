<?php

require_once "classes/autoloader.php";
require_once "settings/config.php";

error_reporting(E_ALL);

if (version_compare(phpversion(), '5.1.0', '<') == true) {
    die ('PHP5.1 Only');
}

// Constants:
define ('DIRSEP', DIRECTORY_SEPARATOR);

// Get the site path
$SITE_PATH = realpath(dirname(__FILE__) . DIRSEP . '.' . DIRSEP) . DIRSEP;
define ('SITE_PATH', $SITE_PATH);

// Run main starter
$bootstrap = new Bootstrap($config);
$bootstrap->run();