<?php

class DbModel {
	
	// DB connection requisites
	private $host;
	private $user;
	private $pass;
	private $db;
	private $reg;
	
	
	public function __construct() {
	 $this->reg = Registry::getInstance();
	 $conf = $this->reg->get('config');
	 $this->host = $conf->dbhost;
	 $this->user = $conf->dbuser;
	 $this->pass = $conf->dbpass;
	 $this->db = $conf->dbname;
	 $this->connect();
	}

	private function connect(){
	 mysql_connect($this->host, $this->user, $this->pass);
	 if(!mysql_select_db($this->db))
	 throw new Exception('Не могу подключиться к БД'.mysql_error());
	}

	 public function act() {
	 
	 $q = mysql_query("SELECT login FROM users");
     $w = mysql_result($q, 0);
	 
	 return $w;
	  
	  
	 }
	 
	 public function newuser() {
	 $login = $_REQUEST['ulogin'];
	 $mail = $_REQUEST['umail'];
	 $pass = $_REQUEST['upass'];
	 $date = date("Y-m-d");
	 
	 $q = mysql_query(
	  "INSERT INTO users (login, email, pass, reg_date)
       VALUES (
	   '$login',
	   '$mail',
	   '$pass',
	   '$date' )");
	 }
	 


}

?>