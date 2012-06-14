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
        $n = $setts['n'];

        $data = array();
        $data['own_money'] = $this->Model->getField('around.micro.own_money');
        $data['credit_money'] = $this->Model->getField('around.micro.credit_volume');
        $data['npv'] = $this->Model->getNPVTotal($n);
        $data['pp'] = $this->Model->getPP();
        $data['pi'] = $this->Model->getPITotal($n);
        $data['vnd'] = $this->Model->getVNDTotal($n);
        $data['Ractives'] = $this->Model->getActivesRTotal($n);
        $data['Rsales'] = $this->Model->getSalesRTotal($n);
        $data['Rproduction'] = $this->Model->getProductionRTotal($n);

        $this->template->set('data', $data);
        $this->template->show('effect/efficiency');
    }

    public function showAnalysis() {
        $this->checkAuthProjectAndGo();
        $setts = $this->getSettings($_SESSION['project']);
        $n = $setts['n'];

        $data = array();
        $data['npv'] = $this->Model->getNPVTotal($n);
        $data['pp'] = $this->Model->getPP();
        $data['pi'] = $this->Model->getPITotal($n);
        $data['vnd'] = $this->Model->getVNDTotal($n);

        if ($data['npv'] > 0 && $data['pi'] > 100){
            $is_effective = true;
        }
        else {
            $is_effective = false;
        }

        $this->template->set('data', $data);
        $this->template->set('is_effective', $is_effective);
        $this->template->show('effect/analysis');
    }

    public function showCostsStructure() {
        $this->checkAuthProjectAndGo();

        $Costs = NULL;
        $this->getModel($Costs, "projects.costsbean.mg");

        $data = array(
             $Costs->getOneCostTotal($this->Model->getField('costs.rent.*')),
             $Costs->getOneCostTotal($this->Model->getField('costs.equipment.*')),
             $Costs->getOneCostTotal($this->Model->getField('costs.payment.*')),
             $Costs->getOneCostTotal($this->Model->getField('costs.materials.*')),
             $Costs->getOneCostTotal($this->Model->getField('costs.adverts.*')),
             $Costs->getOneCostTotal($this->Model->getField('costs.organizational.*')),
             $Costs->getOneCostTotal($this->Model->getField('costs.credit_payment.*')),
             $Costs->getOneCostTotal($this->Model->getField('costs.other.*')),
        );

        $definition = array(
            'Аренда',
            'Оборуд.',
            'З/П',
            'Матер.',
            'Рекл.',
            'Организ.',
            'Кредит',
            'Проч.',
        );

        $path = $this->makeFolder('costs');
        $this->Model->drawPieChart($path['full'], $data, $definition);
        $embed = $path['html'];
        $this->template->set('chart1',"<img src='$embed' />");

        $this->template->show('effect/costs-structure');
    }

    public function showIncomeStructure() {
        $this->checkAuthProjectAndGo();

        $Income = NULL;
        $this->getModel($Income, "projects.incomebean.mg");

        $data = array(
            $Income->getOneRoughIncomeTotal($this->Model->getField('income.products.sales_profit.*')),
            $Income->getOneRoughIncomeTotal($this->Model->getField('income.other.*')),
        );

        $definition = array(
            'Продукц.',
            'Прочее',
        );

        $path = $this->makeFolder('income');
        $this->Model->drawPieChart($path['full'], $data, $definition);
        $embed = $path['html'];
        $this->template->set('chart1',"<img src='$embed' />");

        $this->template->show('effect/income-structure');
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

    public function showNPV() {
        $this->checkAuthProjectAndGo();
        $setts = $this->getSettings($_SESSION['project']);
        $this->template->set('n', $setts['n']);

        $NPV = array();
        for ($i=1; $i <= $setts['n']; $i++) {
            $NPV[$i] = $this->Model->getNPVTotal($i);
            $VND[$i] = $this->Model->getVNDTotal($i);
        }

        $path = $this->makeFolder('npv');
        $data = array(
            'ЧДД' => $NPV,
        );
        $this->Model->drawSingleLineChart($path['full'], $data, 247,2,2);
        $embed = $path['html'];
        $this->template->set('chart1',"<img src='$embed' />");

        $path = $this->makeFolder('vnd');
        $data = array(
            'ВНД' => $VND,
        );
        $this->Model->drawSingleLineChart($path['full'], $data, 60,173,31);
        $embed = $path['html'];
        $this->template->set('chart2',"<img src='$embed' />");

        $this->template->set('NPV', $NPV);
        $this->template->set('VND', $VND);
        $this->template->show('effect/npv');
    }

    public function showPI() {
        $this->checkAuthProjectAndGo();
        $setts = $this->getSettings($_SESSION['project']);
        $this->template->set('n', $setts['n']);

        $NPV = array();
        for ($i=1; $i <= $setts['n']; $i++) {
            $PI[$i] = $this->Model->getPITotal($i);
        }

        $path = $this->makeFolder('pi');
        $data = array(
            'PI' => $PI,
        );
        $this->Model->drawSingleLineChart($path['full'], $data, 247,2,2);
        $embed = $path['html'];
        $this->template->set('chart1',"<img src='$embed' />");

        $this->template->set('PI', $PI);
        $this->template->show('effect/pi');
    }

}