<?php

abstract class BeanBase {

    abstract public function __destruct();

    abstract public function getdata();
    abstract public function setdata();
    abstract public function updatedata();
    abstract public function deletedata();

}