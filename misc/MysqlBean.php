<?php

class MysqlBean {

    private $reg;
    private $connection;

    public function __construct() {
        $this->reg = Registry::getInstance();
        $conf = $this->reg['conf'];

        $host = $conf['mysql']['host'];
        $user = $conf['mysql']['user'];
        $pass = $conf['mysql']['pass'];
        $db = $conf['mysql']['db'];

        $this->connection = mysql_connect($host, $user, $pass);
        if(!mysql_select_db($db))
            throw new Exception("Can't connect DB ".mysql_error());

    }

    public function __destruct() {
        mysql_close($this->connection);
    }

}
