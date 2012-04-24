<?php
class ControllerLogin extends ControllerBase {

    private $User; // Instance of UserBean class

    public function __construct() {
        parent::__construct();
        $this->getModel($this->User, "users.userbean.mg");
    }

    public function index() {
        $this->template->show('users/login-form');
    }

    public function checkLogin() {
        if ($this->checkAuth()==='') {
            $income_login = $_REQUEST['ulogin'];
            $this->User->getUserInfo($income_login)bnmbmnbnm user bean;
        }
        else $this->redirect('/user/cabinet');
    }

}