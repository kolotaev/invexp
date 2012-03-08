<?php
class ControllerLogin extends ControllerBase {

    public function index() {

        //session_start();
        //$this->registry->get('template')->set('first_name', $_SESSION['xml']);

        $a = $this->beanfactory->build("user.mysql");
        $a->test();
        $this->template->show('users/login-form');

    }

}
