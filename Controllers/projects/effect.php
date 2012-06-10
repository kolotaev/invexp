<?php
class ControllerEffect extends ControllerProjectsBase {

    public function __construct() {
        parent::__construct();
        Utils::getLib('pChart');
        $this->getNativeModel("projects.effectbean.mg");
    }

    public function index() {
        $this->showVolume();
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

    public function showActivesR() {
        $this->checkAuthProjectAndGo();
        $setts = $this->getSettings($_SESSION['project']);
        $this->template->set('n', $setts['n']);

        $activesR = array();
        for ($i=1; $i <= $setts['n']; $i++) {
            $activesR[$i] = $this->Model->getActivesR($i);
        }

        $path = $this->makeFolder('activesR');
        $data = array(
            'R активов' => $activesR,
        );
        $this->Model->drawSingleLineChart($path['full'], $data, 125,67,222);
        $embed = $path['html'];
        $this->template->set('chart1',"<img src='$embed' />");

        $this->template->set('activesR', $activesR);
        $this->template->show('effect/actives-r');
    }

    public function showProductsR() {
        $this->checkAuthProjectAndGo();
        $setts = $this->getSettings($_SESSION['project']);
        $this->template->set('n', $setts['n']);

        $salesR = array();
        $productsR = array();
        for ($i=1; $i <= $setts['n']; $i++) {
            $salesR[$i] = $this->Model->getActivesR($i);
            $productsR[$i] = $this->Model->getProductionR($i);
        }

        $path = $this->makeFolder('productsR');
        $data = array(
            'R продукции' => $productsR,
            'R продаж' => $salesR,
        );
        $this->Model->drawLineChart($path['full'], $data);
        $embed = $path['html'];
        $this->template->set('chart1',"<img src='$embed' />");

        $this->template->set('salesR', $salesR);
        $this->template->set('productsR', $productsR);
        $this->template->show('effect/products-r');
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
        $pure_profit = array();
        $Income = NULL;
        $this->getModel($Income, "projects.incomebean.mg");
        for ($i=1; $i <= $setts['n']; $i++) {
            $all_income[$i] = $Income->getAllRoughIncome($i);
            $pure_profit[$i] = $this->Model->getPureProfit($i);
        }

        // Fill view-table
        $this->template->set('all_income', $all_income);
        $this->template->set('pure_profit', $pure_profit);

        // Fill view-chart
        $path = $this->makeFolder('volume');
        $data = array(
            'Чистая прибыль' => $pure_profit,
            'Выручка' => $all_income,
        );
        $this->Model->drawBarChart($path['full'], $data);
        $embed = $path['html'];
        $this->template->set('chart1',"<img src='$embed' />");

        $this->template->show('effect/volume');
    }

    public function showKs() {
        $this->checkAuthProjectAndGo();
        $setts = $this->getSettings($_SESSION['project']);
        $this->template->set('n', $setts['n']);

        $PzK = array();
        for ($i=1; $i <= $setts['n']; $i++) {
            $PzK[$i] = $this->Model->getPzK($i);
        }

        $path = $this->makeFolder('Ks');
        $data = array(
            'K пз' => $PzK,
        );
        $this->Model->drawSingleLineChart($path['full'], $data, 45,78,98);
        $embed = $path['html'];
        $this->template->set('chart1',"<img src='$embed' />");

        $this->template->set('PzK', $PzK);
        $this->template->show('effect/ks');
    }

}