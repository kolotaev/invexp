<?php
class ControllerCabinet extends ControllerBase
{
    private $User; // Instance of UserBean class
    private $Project; // Instance of ProjectBean class

    public function __construct() {
        parent::__construct();
        $this->getModel($this->User, "users.userbean.mg");
        $this->getModel($this->Project, "users.projectbean.mg");
    }

    public function index() {
        $this->checkAuthAndGo('/user/cabinet/show');
    }

    public function show() {
        $current_id = $_SESSION['auth'];
        $this->populateCabinetInfo($current_id);
        $this->template->show('users/cabinet');
    }

    private function populateCabinetInfo($id) {
        $login = $this->User->getUserField($id, 'login');
        $this->template->set('login', $login);
        $email = $this->User->getUserField($id, 'email');
        $this->template->set('email', $email);

        $projects = $this->Project->getFieldInRelation('name', 'user', $login);
        $project_ids = $this->Project->getFieldInRelation('_id', 'user', $login);

        $this->template->set('projects', $projects);
        $this->template->set('project_ids', $project_ids);
        $this->template->set('files', 'Нет');
    }

    public function newEmail() {
        $id = $_SESSION['auth'];
        $new_email = $_REQUEST['newemail'];
        if(!$this->User->fieldExists('email', $new_email)){
            $this->User->updateField($id, 'email', $new_email);
            echo $new_email;
        }
        else {
            echo $this->User->getUserField($id, 'email');
        }
    }

}
/// 'users/cabinet'