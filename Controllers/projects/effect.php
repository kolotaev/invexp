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

    private function makeFolder($file){
        $project_folder = $_SESSION['project'];
        $trans = array("/" => "_");
        $project_folder = strtr($project_folder, $trans);
        $path = SITE_PATH . "output/";
        if(!file_exists($path . $project_folder)){
            mkdir($path . $project_folder, 0, true);
        }

        $full = $path . $project_folder ."/" . $file . '.png';
        $html = '/output/' . $project_folder ."/" . $file . '.png';

        return array('full' => $full, 'html' => $html);
    }

    public function showRentable() {
        $this->checkAuthProjectAndGo();
        $setts = $this->getSettings($_SESSION['project']);
        $this->template->set('n', $setts['n']);

        $path = $this->makeFolder('rentable');
        $this->Model->drawLineChart($path['full'], array(40,45,65,57, 80), array(20,32,45,40,60));
        $embed = $path['html'];
        $this->template->set('chart1',"<img src='$embed' />");

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

        $path = $this->makeFolder('volume');
        $this->Model->drawBarChart($path['full'], array(280,290, 310, 360, 400), array(200,295, 390, 450, 560));
        $embed = $path['html'];
        $this->template->set('chart1',"<img src='$embed' />");

        $this->template->show('effect/volume');
    }


}