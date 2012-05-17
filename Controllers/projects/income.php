<?php
class ControllerIncome extends ControllerProjectsBase {

    public function __construct() {
        parent::__construct();
        $this->getModel("projects.incomebean.mg");
    }

    public function index() {
        $this->showProducts();
    }

    public function showProducts() {
        $this->checkAuthProjectAndGo();
        $setts = $this->getSettings($_SESSION['project']);
        $this->template->set('n', $setts['n']);
        $this->template->show('income/products');
    }

    public function showOther() {
        $this->checkAuthProjectAndGo();
        $setts = $this->getSettings($_SESSION['project']);
        $this->template->set('n', $setts['n']);
        $this->template->show('income/other');
    }


}