<?php
class ControllerEffect extends ControllerProjectsBase {

    public function __construct() {
        parent::__construct();
        // ToDo: Organise it by call of something like Utils class
        require_once("Libs/pChart/pChart/pData.class");
        require_once("Libs/pChart/pChart/pChart.class");

        $this->getModel("projects.effectbean.mg");
    }

    public function index() {
        $this->showRentable();

    }

    public function showRentable() {
        $this->checkAuthProjectAndGo();
        $setts = $this->getSettings($_SESSION['project']);
        $this->template->set('n', $setts['n']);
        $this->template->show('effect/rentable');
    }

    public function showEfficiency() {
        $this->checkAuthProjectAndGo();
        $setts = $this->getSettings($_SESSION['project']);
        $this->template->set('n', $setts['n']);
        $this->template->show('effect/efficiency');
    }


}