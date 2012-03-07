<?php

class Registry implements ArrayAccess {

    private static $instance = null;
    private $vars = array();

    private function __construct() {}
    private function __clone() {}
    private function __wakeup() {}

    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Registry;
        }
        return self::$instance;
    }

    public function set($key, $var) {
        if (isset($this->vars[$key]) == true) {
            throw new Exception('Unable to set var `' . $key . '`. Already set.');
        }
        $this->vars[$key] = $var;
        return true;
    }

    public function get($key) {
        if (isset($this->vars[$key]) == false) {
            return null;
        }
        return $this->vars[$key];
    }

    public function remove($key) {
        unset($this->vars[$key]);
    }

    // Todo: delete this function
    public function testvars() {
        echo "<pre>";
        var_dump($this->vars);
        echo "</pre>";
    }

    function offsetExists($offset) {
        return isset($this->vars[$offset]);
    }

    function offsetGet($offset) {
        return $this->get($offset);
    }

    function offsetSet($offset, $value) {
        $this->set($offset, $value);
    }

    function offsetUnset($offset) {
        unset($this->vars[$offset]);
    }


}
