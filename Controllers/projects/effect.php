<?php
class ControllerEffect extends ControllerProjectsBase {

    public function __construct() {
        parent::__construct();
        Utils::getLib('pChart');
        $this->getModel("projects.effectbean.mg");
    }

    public function index() {
        $this->showRentable();
    }

    public function showRentable() {
        $this->checkAuthProjectAndGo();
        $setts = $this->getSettings($_SESSION['project']);
        $this->template->set('n', $setts['n']);

        $image = $this->Model->drawLineChart(array(40,45,65,57, 80), array(20,32,45,40,60));
        $this->template->set('chart1',"<img src='/$image' />");

        $this->template->show('effect/rentable');
    }

    public function showEfficiency() {
        $this->checkAuthProjectAndGo();
        $setts = $this->getSettings($_SESSION['project']);
        $this->template->set('n', $setts['n']);
        $this->template->show('effect/efficiency');
    }

    public function showVolume() {
        $this->checkAuthProjectAndGo();
        $setts = $this->getSettings($_SESSION['project']);
        $this->template->set('n', $setts['n']);

        $image = $this->Model->drawBarChart(array(280,290, 310, 360, 400), array(200,295, 390, 450, 560));
        $this->template->set('chart1',"<img src='/$image' />");

        $this->template->show('effect/volume');
    }


}