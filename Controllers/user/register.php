<?php
class ControllerRegister extends ControllerBase
{

    private $User; // Instance of UserBean class

    public function __construct() {
        parent::__construct();
        $this->getModel($this->User, "users.userbean.mg");
    }

    public function index() {
        if (isset($_SESSION['auth'])) {
            $this->template->show('users/cabinet');
        }
        else {
            $this->template->show('users/register-form');
        }
    }

    public function createAccount() {
        if ($this->validate()) {
            $this->insertNewUser();
            $this->authorize();
            $this->redirect('/user/cabinet');
        }
        else {
            $this->template->set('warning', 'Извините, но данные заполнены неверно или не полностью');
            $this->template->show('users/register-form');
        }
    }


    // Private functions (validation and etc.)

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
            $this->showErrorPage($e);
            return false;
        }
        return true;
    }

    private function authorize() {
        if ($this->getAuth() === '') $_SESSION['auth'] = $_REQUEST['ulogin'];
    }
}