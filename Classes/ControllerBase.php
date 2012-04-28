<?php

abstract Class ControllerBase {

    protected $registry;
    private $beanfactory;
    protected $template;

    abstract public function index();

    public function __construct() {
        $this->registry = Registry::getInstance();
        $this->beanfactory = $this->registry['BeanFactory'];
        $this->template = $this->registry['template'];
    }

    protected function redirect($url) {
        header("Location: $url");
        exit;
    }


    protected function getAuth() {
        $session_login = '';
        if (isset($_SESSION['auth'])) {
            $session_login = $_SESSION['auth'];
            return $session_login;
        }
        else return $session_login;
    }


    public function checkAuthAndGo($url) {
        if (isset($_SESSION['auth'])) {
            $this->template->show($url);
        }
        else {
            $this->template->set('warning', "Необходима авторизация!");
            $this->template->show('users/login-form');
        }
    }

    public function showErrorPage($err, $type='') {
        $this->template->set('errormessage', $err);
        $this->template->show('errors/error');
    }

    protected function getModel(&$to, $from) {
        $to = $this->beanfactory->build($from);
    }

}