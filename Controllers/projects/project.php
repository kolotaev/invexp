<?php
class ControllerProject extends ControllerProjectsBase
{
    //private $User; // Instance of UserBean class

    public function __construct() {
        $this->checkAuthAndGo();
        parent::__construct();
        $this->getModel("users.projectbean.mg");
    }

    public function index() {
        $this->checkAuthAndGo();
        $this->show();
        $this->template->show('project/open');
    }

    public function open() {

    }

    public function show() {
        $login = $_SESSION['auth'];

        $projects = $this->Model->getFieldInRelation('name', 'user', $login);
        $project_ids = $this->Model->getFieldInRelation('_id', 'user', $login);

        $this->template->set('projects', $projects);
        $this->template->set('project_ids', $project_ids);
    }

    public function newProjectForm() {
        $this->template->show('project/new-project');
    }

    public function createProject() {
        $this->checkProjectExists();
        $this->insertNewProject();
        $this->authProject();
        $this->redirect('/user/cabinet/show');
    }

    // ToDo: This functionality should be overlooked cause it's a 'hot-fix' style
    private function checkProjectExists() {
        $name = $_REQUEST['pname'] . '@' . $_SESSION['auth'];
        if ($this->Model->fieldExists('_id', $name) == true) {
            $this->template->set('warning', "Такой проект уже существует!");
            $this->template->show('project/new-project');
            exit;
        }
    }

    private function insertNewProject() {
        try {
            $this->Model->newProject();
        }
        catch (Exception $e) {
            $this->showErrorPage($e);
            return false;
        }
        return true;
    }

    private function authProject() {
        $project_in_use = $_REQUEST['pname'] . '@' . $_SESSION['auth'];
        $_SESSION['project'] = $project_in_use;
    }
}