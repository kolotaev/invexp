<?php

class BeanFactory
{
    public static function build($params)
    {
        $params = explode('.', $params);

        // define type and class of a required model
        $type = array_pop($params);
        $class = $params[count($params)-1];

        $params = implode('.', $params);
        $class_name = str_replace('.', DIRSEP, $params);

        $filename = strtolower($class_name) . '.php';
        $file = site_path . 'Beans' . DIRSEP . $filename;
        var_dump($file);

        // include the file
        if (file_exists($file) == false) {
            return false;
        }
        require_once ($file);

        // build and return new instance of a required class
        return new $class();

    }
}