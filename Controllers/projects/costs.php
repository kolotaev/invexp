<?php
class ControllerCosts extends ControllerProjectsBase {

    public function __construct() {
        parent::__construct();
        $this->getModel("projects.costsbean.mg");
    }

    public function index() {
        $this->showRent();
    }

    public function showRent() {
        $this->checkAuthProjectAndGo();
        $setts = $this->getSettings($_SESSION['project']);
        $this->template->set('n', $setts['n']);
        $this->template->show('costs/rent');
    }

    public function showPayment() {
        $this->checkAuthProjectAndGo();
        $setts = $this->getSettings($_SESSION['project']);
        $this->template->set('n', $setts['n']);
        $this->template->show('costs/payment');
    }

    public function showMaterials() {
        $this->checkAuthProjectAndGo();
        $setts = $this->getSettings($_SESSION['project']);
        $this->template->set('n', $setts['n']);
        $this->template->show('costs/materials');
    }

    public function showAdvertise() {
        $this->checkAuthProjectAndGo();
        $setts = $this->getSettings($_SESSION['project']);
        $this->template->set('n', $setts['n']);
        $this->template->show('costs/advertise');
    }

    public function showOther() {
        $this->checkAuthProjectAndGo();
        $setts = $this->getSettings($_SESSION['project']);
        $this->template->set('n', $setts['n']);
        $this->template->show('costs/other');
    }


}