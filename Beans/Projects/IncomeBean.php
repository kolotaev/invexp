<?php

class IncomeBean extends ProjectsBeanBase
{
    public function getProductProfit($num){
        $v = $this->getField("income.products.volume.$num");
        $p = $this->getField("income.products.price.$num");
        $profit = $v * $p;
        $this->updateField("income.products.sales_profit.$num", $profit);
        return $profit;
    }

}
