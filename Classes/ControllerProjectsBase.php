<?php
abstract class ControllerProjectsBase extends ControllerBase
{
    protected $Model; // Instance of any Bean, connected with Projects collection

    public function checkAuthAndGo($url='') {
        if (!isset($_SESSION['auth'])) {
            $_SESSION['action-to-login'] = '/'. $_REQUEST['route'];
            $this->redirect('/user/login');
        }
        elseif (!isset($_SESSION['project'])) {
            $_SESSION['action-to-login'] = '/'. $_REQUEST['route'];
            if ($_SESSION['action-to-login'] != '/projects/project/newProjectForm')
                $this->redirect('/projects/project/newProjectForm');
            else $this->redirect('/user/cabinet');
        }
        elseif($_SESSION['project'] == 'fake_null'){
            $this->redirect('/projects/project');
        }
        else {
            if ($url !== '') $this->redirect($url);
        }
    }

    protected function getModel($from) {
        parent::getModel($this->Model, $from);
    }

}
