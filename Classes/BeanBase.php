<?php

abstract class BeanBase {
    protected  $conn = NULL;

    public function setConnection($connection) {
        $this->conn = $connection;
    }
}