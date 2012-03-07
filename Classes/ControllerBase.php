<?php

abstract Class ControllerBase {

    protected $registry;
    protected $beanfactory;
    protected $template;

    public function __construct($registry) {
        $this->registry = $registry;
        $this->beanfactory = $this->registry['BeanFactory'];
        $this->template = $this->registry['Template'];
    }

    abstract public function index();

}