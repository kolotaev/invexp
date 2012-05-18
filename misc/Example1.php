<?php
// Standard inclusions
    // Standard inclusions
    include("pChart/pData.class");
    include("pChart/pChart.class");

    // Dataset definition
    $DataSet = new pData;
    $DataSet->AddPoint(array('a'=>21, 'b'=>4, 'd'=> 43));
    $DataSet->AddSerie();
    $DataSet->SetSerieName("Sample data","Serie1");

    // Initialise the graph
    $Test = new pChart(700,230);
    $Test->setFontProperties("Fonts/tahoma.ttf",10);
    $Test->setGraphArea(40,30,680,200);
    $Test->drawGraphArea(252,252,252);
    $a =$DataSet->GetData();
    $b= $DataSet->GetDataDescription();
    $Test->drawScale($a,$b,SCALE_NORMAL,150,150,150,TRUE,0,2);
    $Test->drawGrid(4,TRUE,230,230,230,255);

    // Draw the line graph
    $a =$DataSet->GetData();
    $b= $DataSet->GetDataDescription();
    $Test->drawLineGraph($a,$b);
    $Test->drawPlotGraph($a,$b,3,2,255,255,255);

    // Finish the graph
    $b= $DataSet->GetDataDescription();
    $Test->setFontProperties("Fonts/tahoma.ttf",8);
    $Test->drawLegend(45,35,$b,255,255,255);
    $Test->setFontProperties("Fonts/tahoma.ttf",10);
    $Test->drawTitle(60,22,"My pretty graph",50,50,50,585);
    $Test->Render("Naked.png");


echo ""
?>