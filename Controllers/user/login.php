<?php
class ControllerLogin extends ControllerBase {

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
            $this->template->show('users/login-form');
        }
    }

    public function checkLogin() {
        if ($this->getAuth()==='') {
            $income_login = @$_REQUEST['ulogin'];
            $income_pass = @$_REQUEST['upass'];
            $income_pass = md5($income_pass);
            $db_login = $this->User->getUserField($income_login, 'login');
            $db_pass = $this->User->getUserField($income_login, 'password');
            echo $income_login . "<br>";
            echo $db_login . "<br>";
            echo $income_pass;
            if ($db_login !== $income_login) echo 'log Ok';
            if ($db_pass != $income_pass) echo 'pass ok';
            if ($db_login !== $income_login || $db_pass != $income_pass) {
                $this->template->set('warning',"Данные авторизации не верны");
                $this->template->show('users/login-form');
            }
            else {
                $this->redirect('/user/cabinet');
            }
        }
        else $this->redirect('/user/cabinet');
    }

    public function loginExists($login) {

    }

}