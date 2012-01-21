<?php
abstract Class ControllerBase {

 protected $registry;
 protected $model;
 
 function __construct($registry) {
  $this->registry = $registry;
  $this->initmodel();
 }
 abstract public function index();
 abstract public function initmodel();

}
?>