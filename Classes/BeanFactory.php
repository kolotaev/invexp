<?php

// Todo: maybe to reduce functionality
class BeanFactory
{

    private $reg;
    private $type;
    private $class;

    private $mysqlc;
    private $mongoc;
    private $table;

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
                return new $this->class();
                break;
            case 'mg':
                $this->mongoConnect();
                $mongoCollection = new $this->class();
                $mongoCollection->setConnection($this->table);
                return $mongoCollection;
                break;
            default:
                throw new Exception("Please, specify correct type of model");
        }
    }

    private function load($params) {
        $params = explode('.', $params);

        // define type and class of a required model
        $this->type = array_pop($params);
        $this->class = $params[count($params) - 1];
        $params = array_map('ucfirst', $params);
        $params = implode('.', $params);
        $class_name = str_replace('.', DIRSEP, $params);

        $filename = str_replace('bean', 'Bean', $class_name) . '.php';
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

    // ToDo: Create good connection variants from config
    private function mongoConnect() {
        if (!$this->mongoc) {
            $conf = $this->reg['config'];

            $host = $conf['mongo']['host'];
            $user = $conf['mongo']['user'];
            $pass = $conf['mongo']['pass'];
            $db = $conf['mongo']['db'];

            if ($pass != '' || $user != '') {
                $this->mongoc = new Mongo("mongodb://${user}:${pass}@${host}");
            }
            else {
                $this->mongoc = new Mongo();
            }
            $this->table = $this->mongoc->$db;
            if (!$this->table)
                throw new Exception("Can't connect to MongoDB table \"$table \"");
        }
    }

    private function mongoClose() {
        $this->mongoc->close();
    }

    public function __destruct() {
        if ($this->mysqlc) {
            $this->mysqlClose();
        }
        if ($this->mongoc) {
            $this->mongoClose();
        }
    }

}