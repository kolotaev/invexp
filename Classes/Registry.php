<?php

class Registry {

 private static $instance = null;
 private static $vars = array();

 private function __construct() { }
 private function __clone() { }
 private function __wakeup() { }

 public static function getInstance () {
  if (self::$instance === null) {
 	 self::$instance = new Registry;
 	 }
  return self::$instance;	

 }

 public function set($key, $var) {
  if (isset(self::$vars[$key]) == true) {
  throw new Exception('Unable to set var `' . $key . '`. Already set.');
  }
  self::$vars[$key] = $var;
  return true;
 }

 public function get($key) {
  if (isset(self::$vars[$key]) == false) {
  return null;
  }
  return self::$vars[$key];
 }

 public function remove($var) {
  unset(self::$vars[$key]);
 } 
  
  public function testvars() {
        echo "<pre>";
		var_dump(self::$vars); 
		echo "</pre>";
    }

}


?>