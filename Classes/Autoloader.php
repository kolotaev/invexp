<?php #Autoload function

function __autoload($class_name) {
    $class_name = str_replace('_', '/', $class_name);
    $filename = strtolower($class_name) . '.php';
    $file = SITE_PATH . 'classes' . DIRSEP . $filename;
    if (file_exists($file) == false) {
        return false;
    }
    require_once ($file);
    return true;
}