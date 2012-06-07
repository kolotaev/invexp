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
        $project_folder = md5($_SESSION['project']);
        $path = SITE_PATH . "output/";
        if(!file_exists($path . $project_folder)){
            mkdir($path . $project_folder, 0777, true);
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
        $data = array(
            'dgshg' => array(23,323,32,4,43),
            'ewewe' => array(2,33,2,4,43),
            'rterteeeeeeeeeeeet' => array(34,23,42,4,4),
        );
        $this->Model->drawLineChart($path['full'], $data);
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
        $data = array(
            'dgshg' => array('1'=>23,'2'=>323,'3'=>32,'4'=>4,'5'=>43),
        );
        $this->Model->drawBarChart($path['full'], $data);
        $embed = $path['html'];
        $this->template->set('chart1',"<img src='$embed' />");

        $this->template->show('effect/volume');
    }


}