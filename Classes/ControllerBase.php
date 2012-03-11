<?php

abstract Class ControllerBase {

    protected $registry;
    protected $beanfactory;
    protected $template;

    public function __construct() {
        $this->registry = Registry::getInstance();
        $this->beanfactory = $this->registry['BeanFactory'];
        $this->template = $this->registry['template'];
    }

    protected function redirect($url) {
        header("Location: $url");
        exit;
    }

    abstract public function index();


}