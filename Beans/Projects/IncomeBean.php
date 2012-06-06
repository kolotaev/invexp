<?php

class IncomeBean extends ProjectsBeanBase
{
    public function getProductProfit($num){
        $v = $this->getField("income.products.volume.$num");
        $p = $this->getField("income.products.price.$num");
        $nds_tax = $this->getField("around.macro.nds_tax");
        $nds_value = $v*$p*$nds/100;
        $this->updateField("income.products.nds_value.$num", $nds_value);
        $profit = $v*$p - $nds_value;
        $this->updateField("income.products.sales_profit.$num", $profit);
        return $profit;
    }

    public function getAllProfit($num){
        $products_profit = $this->getField("income.products.sales_profit.$num");
        $other_profit = $this->getField("income.other.$num");
        return $products_profit + $other_profit;
    }

}
