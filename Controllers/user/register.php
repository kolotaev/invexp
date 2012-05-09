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
            $this->redirect('/user/cabinet/show');
        }
        else {
            $this->template->show('users/register-form');
        }
    }

    public function createAccount() {
        if ($this->validate()) {
            $this->checkLoginAndEmail();
            $this->insertNewUser();
            $this->authorize();
            $this->redirect('/user/cabinet/show');
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
        $income_login = $_REQUEST['ulogin'];
        $income_email = $_REQUEST['umail'];
        $if_login_exists = $this->User->fieldExists('_id', $income_login);
        $if_email_exists = $this->User->fieldExists('_id', $income_email);
        if ($if_login_exists || $if_email_exists) {
            $this->template->set('warning', "Такой логин или email уже существует!");
            $this->template->show('users/register-form');
            exit;
        }
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