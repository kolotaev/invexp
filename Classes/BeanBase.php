<?php

abstract class BeanBase {
    protected  $conn = NULL;

    public function __construct(){

    }

    public function setConnection($connection) {
        $this->conn = $connection;
    }
}