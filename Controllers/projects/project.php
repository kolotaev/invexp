<?php
class ControllerProject extends ControllerBase
{
    private $Model; // Instance of ProjectBean class

    public function __construct() {
        parent::__construct();
        $this->getModel($this->Model, "users.projectbean.mg");
        $this->displayProjectIcon();
    }

    public function index() {
        $this->checkAuthAndGo();
        $this->show();
        $this->template->show('project/open');
    }

    public function open() {
        $this->checkAuthAndGo();
        if (!isset($_REQUEST['pid']))
            $this->redirect('/projects/project/show');
        $_SESSION['project'] = $_REQUEST['pid'];
        $this->Model->setProjectId($_REQUEST['pid']);
        $this->template->set('project_name', $this->Model->getField('name'));
        $this->template->show('project/project-main');
    }

    public function mainWindow() {
        $this->checkAuthProjectAndGo();
        $this->Model->setProjectId($_SESSION['project']);
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

    public function showPrefs() {
        $this->checkAuthProjectAndGo();
        $this->Model->setProjectId($_SESSION['project']);
        $data = array();
        $data['periods'] = $this->Model->getField('periods');
        $data['currency1'] = $this->Model->getField('currency1');
        $data['currency2'] = $this->Model->getField('currency2');
        $data['description'] = $this->Model->getField('description');
        $this->template->set('data', $data);
        $this->template->show('project/preferences');
    }

    // Fire-method
    public function createProject() {
        $this->checkProjectExists();
        $this->insertNewProject();
        $this->authProject();
        $this->redirect('/projects/project/mainWindow');
    }

    // Fire-method
    public function updateProject() {
        $this->Model->setProjectId($_SESSION['project']);
        $this->Model->updateField('periods', $_REQUEST['nperiods']);
        $this->Model->updateField('currency1', $_REQUEST['curr1']);
        $this->Model->updateField('currency2', $_REQUEST['curr2']);
        $this->Model->updateField('description', $_REQUEST['description']);
        $this->redirect('/projects/project/showPrefs');
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

    private function makeFolder($file) {
        $project_folder = md5($_SESSION['project']);

        $path = SITE_PATH . "output/";
        if (!file_exists($path . $project_folder)) {
            mkdir($path . $project_folder, 0, true);
        }

        $full = $path . $project_folder . "/" . $file . '.png';
        $html = '/output/' . $project_folder . "/" . $file . '.png';

        return array('full' => $full, 'html' => $html);
    }

    public function remove() {
        if (isset($_SESSION['project']))
            $id = $_SESSION['project'];
        else
            $id = '';
        $this->Model->deleteProject($id);

        $project_folder = md5($_SESSION['project']);
        $path = SITE_PATH . "output/" . $project_folder;
        if (is_dir($path)) {
            $objects = scandir($path);
            foreach ($objects as $object) {
                if ($object != "." && $object != "..") {
                    unlink($path . "/" . $object);
                }
            }
            rmdir($path);
        }

        unset($_SESSION['project']);
        $this->template->set('warning', 'Проект удален');
        $this->show();
        $this->template->show('project/open');
    }

    private function authProject() {
        $project_in_use = $_REQUEST['pname'] . '@' . $_SESSION['auth'];
        $_SESSION['project'] = $project_in_use;
    }

    private function checkAuthProjectAndGo($url = '') {
        if (!isset($_SESSION['auth'])) {
            $_SESSION['action-to-login'] = '/' . $_REQUEST['route'];
            $this->redirect('/user/login');
        }
        elseif (!isset($_SESSION['project']) || $_SESSION['project'] === '') {
            $_SESSION['action-to-login'] = '/' . $_REQUEST['route'];
            if ($_SESSION['action-to-login'] != '/projects/project/newProjectForm')
                $this->redirect('/projects/project/newProjectForm');
            else $this->redirect('/user/cabinet');
        }
        elseif ($_SESSION['project'] == 'fake_null') {
            $this->redirect('/projects/project');
        }
        else {
            if ($url !== '') $this->redirect($url);
        }
    }
}