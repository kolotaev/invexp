<?php

class EffectBean extends ProjectsBeanBase
{
    public function __construct() {
        parent::__construct();
        Utils::getLib('pChart');
    }

    public function drawLineChart($img_path, $data1,$data2=null, $label1='', $label2=''){
        // Dataset definition
        $DataSet = new pData;
        $DataSet->AddPoint($data1,"Serie1");
        $DataSet->AddSerie("Serie1");
        $DataSet->SetSerieName($label1,"Serie1");

        if ($data2 != null){
            $DataSet->AddPoint($data2,"Serie2");
            $DataSet->AddSerie("Serie2");
            $DataSet->SetSerieName($label2,"Serie2");
        }

        // Initialise the graph
        $Test = new pChart(700,230);
        $Test->setFontProperties("Libs/pChart/Fonts/tahoma.ttf",10);
        $Test->setGraphArea(40,30,680,200);
        $Test->drawGraphArea(252,252,252);
        $a = $DataSet->GetData();
        $b = $DataSet->GetDataDescription();
        $Test->drawScale($a,$b,SCALE_NORMAL,150,150,150,TRUE,0,2);
        $Test->drawGrid(4,TRUE,230,230,230,255);

        // Draw the line graph
        $a =$DataSet->GetData();
        $b= $DataSet->GetDataDescription();
        $Test->drawLineGraph($a,$b);
        $Test->drawPlotGraph($a,$b,3,2,255,255,255);

        // Finish the graph
        $b= $DataSet->GetDataDescription();
        $Test->setFontProperties("Libs/pChart/Fonts/tahoma.ttf",8);
        $Test->drawLegend(45,35,$b,255,255,255);
        $Test->setFontProperties("Libs/pChart/Fonts/tahoma.ttf",10);
        //$Test->drawTitle(60,22,"My pretty graph",50,50,50,585);
        $Test->Render($img_path);
        return true;
    }

    public function drawBarChart($img_path, $data1,$data2=null, $label1='', $label2=''){
        // Dataset definition
        $DataSet = new pData;
        $DataSet->AddPoint($data1,"Serie1");
        $DataSet->SetSerieName($label1,"Serie1");

        if ($data2 != null){
            $DataSet->AddPoint($data2,"Serie2");
            $DataSet->SetSerieName($label2,"Serie2");
        }

        $DataSet->AddAllSeries();
        $DataSet->SetAbsciseLabelSerie();

        // Initialise the graph
        $Test = new pChart(700,230);
        $Test->setFontProperties("Libs/pChart/Fonts/tahoma.ttf",8);
        $Test->setGraphArea(50,30,680,200);
        //$Test->drawFilledRoundedRectangle(7,7,693,223,5,240,240,240);
        //$Test->drawRoundedRectangle(5,5,695,225,5,230,230,230);
        $Test->drawGraphArea(255,255,255,TRUE);
        $Test->drawScale($DataSet->GetData(),$DataSet->GetDataDescription(),SCALE_NORMAL,150,150,150,TRUE,0,2,TRUE);
        $Test->drawGrid(4,TRUE,230,230,230,50);

        // Draw the 0 line
        $Test->setFontProperties("Libs/pChart/Fonts/tahoma.ttf",6);
        $Test->drawTreshold(0,143,55,72,TRUE,TRUE);

        // Draw the bar graph
        $Test->drawBarGraph($DataSet->GetData(),$DataSet->GetDataDescription(),TRUE);

        // Finish the graph
        $Test->setFontProperties("Libs/pChart/Fonts/tahoma.ttf",8);
        $Test->drawLegend(54,54,$DataSet->GetDataDescription(),255,255,255);
        $Test->setFontProperties("Libs/pChart/Fonts/tahoma.ttf",10);
        //$Test->drawTitle(50,22,"Example 12",50,50,50,585);
        $Test->Render($img_path);

    return true;
    }

}
