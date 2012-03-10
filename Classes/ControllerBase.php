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

    abstract public function index();

}