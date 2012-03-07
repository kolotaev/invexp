<?php

class BeanFactory
{
    public function build($params)
    {
        $params = explode('.', $params);

        // define type and class of a required model
        $type = array_pop($params);
        $class = $params[count($params)-1];

        $params = implode('.', $params);
        $class_name = str_replace('.', DIRSEP, $params);

        $filename = strtolower($class_name) . '.php';
        $file = SITE_PATH . 'Beans' . DIRSEP . $filename;

        // include the file
        if (file_exists($file) === false) {
            return false;
        }
        require_once ($file);


        // build and return new instance of a required class
        switch ($type) {
            case 'a': {}
        }
        return new $class();

    }
}