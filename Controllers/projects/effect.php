<?php
class ControllerEffect extends ControllerProjectsBase
{

    private $Income;

    public function __construct() {
        parent::__construct();
        Utils::getLib('pChart');
        $this->getNativeModel("projects.effectbean.mg");
    }

    public function index() {
        $this->showRentable();
    }

    private function makeFolder($file) {
        $project_folder = md5($_SESSION['project']);
        $path = SITE_PATH . "output/";
        if (!file_exists($path . $project_folder)) {
            mkdir($path . $project_folder, 0777, true);
        }

        $full = $path . $project_folder . "/" . $file . '.png';
        $html = '/output/' . $project_folder . "/" . $file . '.png';

        return array('full' => $full, 'html' => $html);
    }

    public function showRentable() {
        $this->checkAuthProjectAndGo();
        $setts = $this->getSettings($_SESSION['project']);
        $this->template->set('n', $setts['n']);

        $path = $this->makeFolder('rentable');
        $data = array(
            'dgshg' => array(1,1,1,1)
        );
        try {
            $this->Model->drawLineChart($path['full'], $data);
        }
        catch (Exception $e) {
            $this->template->set('errormessage', $e);
            $this->template->show('errors/error');
        }
        $embed = $path['html'];
        $this->template->set('chart1', "<img src='$embed' />");

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

        // All income
        $all_income = array();
        $this->getModel($this->Income, "projects.incomebean.mg");
        for ($i = 1; $i <= $setts['n']; $i++) {
            $all_income[] = $this->Income->getAllRoughIncome($i);
        }

        // Fill view-table
        $this->template->set('all_income', $all_income);

        // Fill view-chart
        $path = $this->makeFolder('volume');
        $data = array(
            'hhj' => $all_income,
        );
        $this->Model->drawBarChart($path['full'], $data);
        $embed = $path['html'];
        $this->template->set('chart1', "<img src='$embed' />");

        $this->template->show('effect/volume');
    }


}