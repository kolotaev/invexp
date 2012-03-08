<?php

// Todo: maybe to reduce functionality
class BeanFactory {

    private $reg;
    private $type;
    private $class;

    private $mysqlc;

    public function __construct() {
        $this->reg = Registry::getInstance();
    }

    public function build($params) {
        // require_once the file of a requested file
        $this->load($params);

        // build and return new instance of a required class
        switch ($this->type) {
            case 'mysql':
                $this->mysqlConnect();
                break;
            case 'xml':
                break;
            default:
                throw new Exception("Please, specify correct type of model");
        }

        return new $this->class();
    }

    private function load($params) {

        $params = explode('.', $params);

        // define type and class of a required model
        $this->type = array_pop($params);
        $this->class = $params[count($params) - 1];

        $params = implode('.', $params);
        $class_name = str_replace('.', DIRSEP, $params);

        $filename = strtolower($class_name) . '.php';
        $file = SITE_PATH . 'Beans' . DIRSEP . $filename;

        // include the file
        if (file_exists($file) === false) {
            return false;
        }
        require_once ($file);
        return true;

    }

    private function mysqlConnect() {

        if (!$this->mysqlc) {
            $conf = $this->reg['config'];

            $host = $conf['mysql']['host'];
            $user = $conf['mysql']['user'];
            $pass = $conf['mysql']['pass'];
            $db = $conf['mysql']['db'];

            $this->mysqlc = mysql_connect($host, $user, $pass);
            if (!mysql_select_db($db))
                throw new Exception("Can't connect DB " . mysql_error());
        }

    }

    private function mysqlClose() {
        mysql_close($this->mysqlc);
    }

    private function xmlConnect() {

    }

    public function __destruct() {
        $this->mysqlClose();
    }

}