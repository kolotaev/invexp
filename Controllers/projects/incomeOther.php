<?php
// ToDo: every entity should have it's oen controller. And IncomeOther is a hotfix style
class ControllerIncomeOther extends ControllerProjectsBase
{

    public function __construct() {
        parent::__construct();
        $this->getNativeModel("projects.incomebean.mg");
    }

    public function index() {
        $this->showOther();
    }

    public function showOther() {
        $this->checkAuthProjectAndGo();
        $setts = $this->getSettings($_SESSION['project']);
        $this->template->set('n', $setts['n']);
        $data = $this->Model->getField('income.other.*');
        $this->template->set('data', $data);
        $this->template->show('income/other');
    }


}