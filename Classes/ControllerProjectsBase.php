<?php
abstract class ControllerProjectsBase extends ControllerBase
{
    protected $Model; // Instance of any Bean, connected with Projects collection

    public function __construct() {
        parent::__construct();
        $this->displayProjectIcon();
    }

    public function checkAuthProjectAndGo($url = '') {
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

    public function save() {
        $to = $_REQUEST['cell'];
        $new_value = $_REQUEST['data'];
        $this->Model->updateField($to, $new_value);
        $cell_data = $this->Model->getField($to);
        $data = array(
            'caller' => array(
                'cell' => $to,
                'value' => $cell_data,
            )
        );
        echo json_encode($data);
    }

    protected function getSettings($id) {
        $project = NULL;
        $settings = array();
        parent::getModel($project, "users.projectbean.mg");
        $settings['n'] = $project->getField('periods', $id);
        return $settings;
    }

    protected function getModel($from) {
        parent::getModel($this->Model, $from);
    }

}
