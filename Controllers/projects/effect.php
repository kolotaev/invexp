<?php
class ControllerEffect extends ControllerProjectsBase {

    public function __construct() {
        parent::__construct();
        $this->getModel("projects.effectbean.mg");
    }

    public function index() {
    }

    public function products() {
        $this->checkAuthProjectAndGo();
        $setts = $this->getSettings($_SESSION['project']);
        $this->template->set('n', $setts['n']);

        $this->showMain();
    }

    public function showMain() {
        $this->template->show('income/products');
    }


}