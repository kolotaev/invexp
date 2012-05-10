<?php
class ControllerProject extends ControllerBase
{
    private $Model; // Instance of ProjectBean class

    public function __construct() {
        parent::__construct();
        $this->getModel($this->Model, "users.projectbean.mg");
    }

    public function index() {
        $this->checkAuthAndGo();
        $this->show();
        $this->template->show('project/open');
    }

    public function open() {
        $pid = $_REQUEST['pid'];
        $_SESSION['project'] = $pid;
        $this->template->set('project_name', $this->Model->getField('name'));
        $this->template->show('project/project-main');
    }

    public function show() {
        $this->checkAuthAndGo();
        $login = $_SESSION['auth'];

        $projects = $this->Model->getFieldInRelation('name', 'user', $login);
        $project_ids = $this->Model->getFieldInRelation('_id', 'user', $login);

        $this->template->set('projects', $projects);
        $this->template->set('project_ids', $project_ids);
    }

    public function newProjectForm() {
        $this->checkAuthAndGo();
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

    public function remove() {
        if (isset($_SESSION['project']))
            $id = $_SESSION['project'];
        else
            $id ='';
        $this->Model->deleteProject($id);
        $_SESSION['project'] = 'fake_null';
        $this->template->set('warning', 'Проект удален');
        $this->show();
        $this->template->show('project/open');
    }

    private function authProject() {
        $project_in_use = $_REQUEST['pname'] . '@' . $_SESSION['auth'];
        $_SESSION['project'] = $project_in_use;
    }
}