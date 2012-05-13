<?php
class ControllerExit extends ControllerBase
{
    private $User; // Instance of UserBean class

    public function __construct() {
        parent::__construct();
        $this->getModel($this->User, "users.userbean.mg");
    }

    public function index() {
        $this->logout();
        $this->template->show('users/exit');
    }

    private function logout() {
        if (isset($_SESSION['project']) && $_SESSION['project'] !== '' && isset($_SESSION['auth'])) {
            $id = $_SESSION['auth'];
            $current_users_project = $_SESSION['project'];
            $this->User->updateField($id, 'last_project', $current_users_project);
        }
        $_SESSION = array();
        unset($_SESSION[session_name()]);
        session_destroy();
    }

}