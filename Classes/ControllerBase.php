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


    public function checkAuthAndGo($url='') {
        if (isset($_SESSION['auth'])) {
            if ($url !== '') $this->redirect($url);
        }
        else {
            $_SESSION['action-to-login'] = '/'. $_REQUEST['route'];
            // deleted cause shows 2 pages
            //$this->template->set('warning', "Необходима авторизация!");
            $this->redirect('/user/login');
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