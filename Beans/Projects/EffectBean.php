<?php

class EffectBean extends ProjectsBeanBase
{
    private $Income;
    private $Costs;
    private $Around;

    public function __construct() {
        parent::__construct();
        Utils::getLib('pChart');
        $this->Income = $this->getDependencyModel('projects.incomebean.mg');
        $this->Costs = $this->getDependencyModel('projects.costsbean.mg');
        $this->Around = $this->getDependencyModel('projects.aroundbean.mg');
    }

    public function getPureProfit($num) {
        $profit_tax = $this->getField('around.macro.profit_tax');
        $pure_profit = $this->Income->getAllNoNDSIncome($num) - $this->Costs->getAllCosts($num);
        if ($pure_profit > 0) {
            $pure_profit -= $pure_profit * $profit_tax / 100;
        }
        return round($pure_profit, 2);
    }

    public function getPureProfitTotal($n) {
        $profit_tax = $this->getField('around.macro.profit_tax');
        $pure_profit = $this->Income->getAllNoNDSIncomeTotal($n) - $this->Costs->getAllCostsTotal($n);
        if ($pure_profit > 0) {
            $pure_profit -= $pure_profit * $profit_tax / 100;
        }
        return round($pure_profit, 2);
    }

    public function getActivesR($num) {
        $pure_profit = $this->getPureProfit($num);
        $all_actives = $this->Around->getAllActives();

        if ($all_actives !== 0.0) {
            return round(($pure_profit / $all_actives * 100), 2);
        }
        else {
            return 0;
        }
    }

    public function getActivesRTotal($n) {
        $pure_profit = $this->getPureProfitTotal($n);
        $all_actives = $this->Around->getAllActives();

        if ($all_actives !== 0.0) {
            return round(($pure_profit / $all_actives * 100), 2);
        }
        else {
            return 0;
        }
    }

    public function getSalesR($num) {
        $pure_profit = $this->getPureProfit($num);
        $rough_income = $this->Income->getAllRoughIncome($num);

        if ($rough_income !== 0) {
            return round(($pure_profit / $rough_income * 100), 2);
        }
        else {
            return 0;
        }
    }

    public function getSalesRTotal($n) {
        $pure_profit = $this->getPureProfitTotal($n);
        $rough_income = $this->Income->getAllRoughIncomeTotal($n);

        if ($rough_income !== 0) {
            return round(($pure_profit / $rough_income * 100), 2);
        }
        else {
            return 0;
        }
    }

    public function getProductionR($num) {
        $pure_profit = $this->getPureProfit($num);
        $production_costs = $this->Costs->getAllProductionCosts($num);

        if ($production_costs !== 0.0) {
            return round(($pure_profit / $production_costs * 100), 2);
        }
        else {
            return 0;
        }
    }

    public function getProductionRTotal($n) {
        $pure_profit = $this->getPureProfitTotal($n);
        $production_costs = $this->Costs->getAllProductionCostsTotal($n);

        if ($production_costs !== 0.0) {
            return round(($pure_profit / $production_costs * 100), 2);
        }
        else {
            return 0;
        }
    }

    public function getFnKTotal($n) {
        $fin_debts = 0;
        for ($i = 1; $i <= $n; $i++) {
            $fin_debts += $this->getField("costs.credit_payment_percent.$n");
        }
        $all_actives = $this->Around->getAllActives();

        if ($all_actives !== 0.0) {
            return round(($fin_debts / $all_actives), 2);
        }
        else {
            return 0;
        }
    }

    public function getPzK($num) {
        $pure_profit = $this->getPureProfit($num);
        $cred_pays = (float)$this->getField("costs.credit_payment.$num");

        if ($cred_pays !== 0.0) {
            return round(($pure_profit / $cred_pays), 2);
        }
        else {
            return 0;
        }
    }

    public function getPzKTotal($n) {
        $pure_profit = $this->getPureProfitTotal($n);
        $cred_pays = 0;
        for ($i = 1; $i <= $n; $i++) {
            $cred_pays += (float)$this->getField("costs.credit_payment.$n");
        }
        if ($cred_pays !== 0.0) {
            return round(($pure_profit / $cred_pays), 2);
        }
        else {
            return 0;
        }
    }


    public function drawLineChart($img_path, $data) {
        // Dataset definition
        if ($data == NULL) {
            return false;
        }
        // Setting data Series
        $DataSet = new pData;
        $i = 1;
        foreach ($data as $key_label => $value_arr) {
            $DataSet->AddPoint($value_arr, "Serie$i");
            $DataSet->AddSerie("Serie$i");
            $DataSet->SetSerieName($key_label, "Serie$i");
            $i++;
        }
        // Setting Abcisse label begins with 1
        $labelX = array();
        foreach ($data as $v) {
            $count = count($v);
            for ($r = 1; $r <= $count; $r++) {
                $labelX[] = $r;
            }
            break;
        }
        $DataSet->AddPoint($labelX, "Serie$i");
        $DataSet->SetAbsciseLabelSerie("Serie$i");
        // Initialise the graph
        $Test = new pChart(700, 230);
        $Test->setFontProperties("Libs/pChart/Fonts/tahoma.ttf", 10);
        $Test->setGraphArea(40, 30, 680, 200);
        $Test->drawGraphArea(252, 252, 252);
        $a = $DataSet->GetData();
        $b = $DataSet->GetDataDescription();
        $Test->drawScale($a, $b, SCALE_START0, 150, 150, 150, TRUE, 0, 2);
        $Test->drawGrid(4, TRUE, 230, 230, 230, 255);

        // Draw the line graph
        $a = $DataSet->GetData();
        $b = $DataSet->GetDataDescription();
        //!!!!!!!!!! $Test->setColorPalette(0,89,34,33);
        $Test->drawLineGraph($a, $b);
        $Test->drawPlotGraph($a, $b, 3, 2, 255, 255, 255);

        // Finish the graph
        $b = $DataSet->GetDataDescription();
        $Test->setFontProperties("Libs/pChart/Fonts/tahoma.ttf", 8);
        $Test->drawLegend(45, 35, $b, 255, 255, 255);
        $Test->setFontProperties("Libs/pChart/Fonts/tahoma.ttf", 10);
        //$Test->drawTitle(60,22,"My pretty graph",50,50,50,585);
        $Test->Render($img_path);
        return true;
    }

    public function drawBarChart($img_path, $data) {
        // Dataset definition
        if ($data == NULL) {
            return false;
        }
        // Setting Data Series
        $DataSet = new pData;
        $i = 1;
        foreach ($data as $key_label => $value_arr) {
            $DataSet->AddPoint($value_arr, "Serie$i");
            $DataSet->AddSerie("Serie$i");
            $DataSet->SetSerieName($key_label, "Serie$i");
            $i++;
        }
        // Setting Abcisse label begins with 1
        $labelX = array();
        foreach ($data as $v) {
            $count = count($v);
            for ($r = 1; $r <= $count; $r++) {
                $labelX[] = $r;
            }
            break;
        }
        $DataSet->AddPoint($labelX, "Serie$i");
        $DataSet->SetAbsciseLabelSerie("Serie$i");

        // Initialise the graph
        $Test = new pChart(700, 230);
        $Test->setFontProperties("Libs/pChart/Fonts/tahoma.ttf", 8);
        $Test->setGraphArea(50, 30, 680, 200);
        //$Test->drawFilledRoundedRectangle(7,7,693,223,5,240,240,240);
        //$Test->drawRoundedRectangle(5,5,695,225,5,230,230,230);
        $Test->drawGraphArea(255, 255, 255, TRUE);
        $Test->drawScale($DataSet->GetData(), $DataSet->GetDataDescription(), SCALE_START0, 150, 150, 150, TRUE, 0, 2, TRUE);
        $Test->drawGrid(4, TRUE, 230, 230, 230, 50);

        // Draw the 0 line
        $Test->setFontProperties("Libs/pChart/Fonts/tahoma.ttf", 6);
        $Test->drawTreshold(0, 143, 55, 72, TRUE, TRUE);

        // Draw the bar graph
        $Test->drawBarGraph($DataSet->GetData(), $DataSet->GetDataDescription(), TRUE);

        // Finish the graph
        $Test->setFontProperties("Libs/pChart/Fonts/tahoma.ttf", 8);
        $Test->drawLegend(54, 54, $DataSet->GetDataDescription(), 255, 255, 255);
        $Test->setFontProperties("Libs/pChart/Fonts/tahoma.ttf", 10);
        //$Test->drawTitle(50,22,"Example 12",50,50,50,585);
        $Test->Render($img_path);

        return true;
    }

    public function drawSingleLineChart($img_path, $data, $R, $G, $B) {
        // Dataset definition
        if ($data == NULL) {
            return false;
        }
        // Setting data Series
        $DataSet = new pData;
        foreach ($data as $key_label => $value_arr) {
            $DataSet->AddPoint($value_arr, "Serie");
            $DataSet->AddSerie("Serie1");
            $DataSet->SetSerieName($key_label, "Serie1");
        }
        $DataSet->AddPoint($value_arr, "Serie1");
        $DataSet->AddSerie("Serie1");
        $DataSet->SetSerieName($key_label, "Serie1");
        // Setting Abcisse label begins with 1
        $labelX = array();
        foreach ($data as $v) {
            $count = count($v);
            for ($r = 1; $r <= $count; $r++) {
                $labelX[] = $r;
            }
            break;
        }
        $DataSet->AddPoint($labelX, "Serie2");
        $DataSet->SetAbsciseLabelSerie("Serie2");
        // Initialise the graph
        $Test = new pChart(700, 230);
        $Test->setFontProperties("Libs/pChart/Fonts/tahoma.ttf", 10);
        $Test->setGraphArea(40, 30, 680, 200);
        $Test->drawGraphArea(252, 252, 252);
        $a = $DataSet->GetData();
        $b = $DataSet->GetDataDescription();
        $Test->drawScale($a, $b, SCALE_START0, 150, 150, 150, TRUE, 0, 2);
        $Test->drawGrid(4, TRUE, 230, 230, 230, 255);

        // Draw the line graph
        $a = $DataSet->GetData();
        $b = $DataSet->GetDataDescription();
        $Test->setColorPalette(0, $R, $G, $B);
        $Test->drawLineGraph($a, $b);
        $Test->drawPlotGraph($a, $b, 3, 2, 255, 255, 255);

        // Finish the graph
        $b = $DataSet->GetDataDescription();
        $Test->setFontProperties("Libs/pChart/Fonts/tahoma.ttf", 8);
        $Test->drawLegend(45, 35, $b, 255, 255, 255);
        $Test->setFontProperties("Libs/pChart/Fonts/tahoma.ttf", 10);
        //$Test->drawTitle(60,22,"My pretty graph",50,50,50,585);
        $Test->Render($img_path);
        return true;
    }

    public function drawPieChart($img_path, $data, $definition) {
        // Dataset definition
        $DataSet = new pData;
        $DataSet->AddPoint(array(40, 30, 10, 15, 5), "Serie1");
        $DataSet->AddPoint(array("Jan", "Feb", "Mar", "Apr", "May"), "Serie2");
        $DataSet->AddAllSeries();
        $DataSet->SetAbsciseLabelSerie("Serie2");

        // Initialise the graph
        $Test = new pChart(300, 200);
        //$Test->loadColorPalette("Sample/softtones.txt");
        //$Test->drawFilledRoundedRectangle(7,7,293,193,5,240,240,240);
        //$Test->drawRoundedRectangle(5,5,295,195,5,230,230,230);

        // This will draw a shadow under the pie chart
        $Test->drawFilledCircle(122, 102, 70, 200, 200, 200);

        // Draw the pie chart
        $Test->setFontProperties("Libs/pChart/Fonts/tahoma.ttf", 8);
        $Test->drawBasicPieGraph($DataSet->GetData(), $DataSet->GetDataDescription(), 120, 100, 70, PIE_PERCENTAGE, 255, 255, 218);
        $Test->drawPieLegend(230, 15, $DataSet->GetData(), $DataSet->GetDataDescription(), 250, 250, 250);

        $Test->Render($img_path);
    }

}
