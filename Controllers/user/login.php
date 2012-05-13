<?php
class ControllerLogin extends ControllerBase
{

    private $User; // Instance of UserBean class
    private $Project; // Instance of ProjectBean class

    public function __construct() {
        parent::__construct();
        $this->getModel($this->User, "users.userbean.mg");
        $this->getModel($this->Project, "users.projectbean.mg");
    }

    public function index() {
        if (isset($_SESSION['auth'])) {
            $this->redirect('/user/cabinet/show');
        }
        else {
            $this->template->show('users/login-form');
        }
    }

    public function checkLogin() {
        if ($this->getAuth() === '') {
            $income_login = $_REQUEST['ulogin'];
            if ($this->User->fieldExists('_id', $income_login) == false) {
                $this->template->set('warning', "Такого логина не существует!");
                $this->template->show('users/register-form');
            }
            else {
                $income_pass = $_REQUEST['upass'];
                $income_pass = md5($income_pass);
                $db_login = $this->User->getUserField($income_login, 'login');
                $db_pass = $this->User->getUserField($income_login, 'password');
                if ($db_login !== $income_login || $db_pass !== $income_pass) {
                    $this->template->set('warning', "Данные авторизации не верны");
                    $this->template->show('users/login-form');
                }
                else {
                    $this->authorize();
                    if (!empty($_SESSION['action-to-login']) && isset($_SESSION['action-to-login']))
                        $this->redirect($_SESSION['action-to-login']);
                    else
                        $this->redirect('/user/cabinet');
                }
            }
        }
        else $this->redirect('/user/cabinet/show');
    }

    // ToDo: remove it cause such function exists in Bean
    public function loginExists($login) {
        $login_from_db = $this->User->getUserField($login, '_id');
        if (isset($login_from_db)) return true;
        else return false;
    }

    private function authorize() {
        $id = $_REQUEST['ulogin'];
        if ($this->getAuth() === '') $_SESSION['auth'] = $id;
        $last_project = $this->User->getUserField($id, 'last_project');
        if ($this->Project->fieldExists('_id', $last_project) == true)
            $_SESSION['project'] = $this->User->getUserField($id, 'last_project');
        else
            unset($_SESSION['project']);
    }

}