<?php
class ControllerRegister extends ControllerBase {

    private $User; // Instatnce of UserBean class

    public function __construct() {
        parent::__construct();
        $this->getModels();
    }

    public function index() {
        //session_start();
        //$this->registry->get('template')->set('first_name', $_SESSION['xml']);
        $this->template->show('users/register-form');
    }

    public function createAccount() {
        if ($this->validate()) {
            $this->insertNewUser();
            $this->authorize();
            $this->redirect('/user/cabinet');
        }
        else {
            $this->template->warningBox('Извините, но данные заполнены неверно или не полностью');
            $this->template->show('users/register-form');
        }
    }


    // Private functions (validation and etc.)

    private function getModels() {
        $this->User = $this->beanfactory->build("users.userbean.mongo");
    }

    private function validate() {
        foreach ($_REQUEST as $data) {
            if ($data === "") {
                return false;
            }
        }
        return true;
    }

    private function checkLoginAndEmail() {

    }

    private function insertNewUser() {
        try {
            $this->User->newUser();
        }
        catch (Exception $e) {
            $this->template->set('errormessage', $e);
            $this->template->show('errors/error');
            return false;
        }
        return true;
    }

    private function authorize() {
        if (!isset($_SESSION['auth'])) $_SESSION['auth'] = 'ok';
    }
}