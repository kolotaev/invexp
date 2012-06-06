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
        $rent = $this->Model->getField('costs.rent.*');
        $this->template->set('rent', $rent);
        $equipment = $this->Model->getField('costs.equipment.*');
        $this->template->set('equipment', $equipment);
        $this->template->show('costs/rent');
    }

    public function showPayment() {
        $this->checkAuthProjectAndGo();
        $setts = $this->getSettings($_SESSION['project']);
        $this->template->set('n', $setts['n']);
        $data = $this->Model->getField('costs.payment.*');
        $this->template->set('data', $data);
        $this->template->show('costs/payment');
    }

    public function showMaterials() {
        $this->checkAuthProjectAndGo();
        $setts = $this->getSettings($_SESSION['project']);
        $this->template->set('n', $setts['n']);
        $data = $this->Model->getField('costs.materials.*');
        $this->template->set('data', $data);
        $this->template->show('costs/materials');
    }

    public function showAdvertise() {
        $this->checkAuthProjectAndGo();
        $setts = $this->getSettings($_SESSION['project']);
        $this->template->set('n', $setts['n']);
        $data = $this->Model->getField('costs.adverts.*');
        $this->template->set('data', $data);
        $this->template->show('costs/advertise');
    }

    public function showOrganizational() {
        $this->checkAuthProjectAndGo();
        $setts = $this->getSettings($_SESSION['project']);
        $this->template->set('n', $setts['n']);
        $data = $this->Model->getField('costs.organizational.*');
        $this->template->set('data', $data);
        $this->template->show('costs/organizational');
    }

    public function showOther() {
        $this->checkAuthProjectAndGo();
        $setts = $this->getSettings($_SESSION['project']);
        $this->template->set('n', $setts['n']);
        $data = $this->Model->getField('costs.other.*');
        $this->template->set('data', $data);
        $this->template->show('costs/other');
    }


}