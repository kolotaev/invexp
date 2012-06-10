<?php

class IncomeBean extends ProjectsBeanBase
{
    public function getProductNoNDSProfit($num) {
        $v = $this->getField("income.products.volume.$num");
        $p = $this->getField("income.products.price.$num");
        $nds_tax = $this->getField("around.macro.nds_tax");
        $nds_value = $v * $p * $nds_tax / 100;
        $this->updateField("income.products.nds_value.$num", $nds_value);
        $profit = $v * $p - $nds_value;
        $this->updateField("income.products.sales_profit.$num", $profit);
        return (float)$profit;
    }

    public function getAllRoughIncome($num) {
        $v = $this->getField("income.products.volume.$num");
        $p = $this->getField("income.products.price.$num");
        $products = $p * $v;
        $other = $this->getField("income.other.$num");
        return (float)($products + $other);
    }

    public function getAllRoughIncomeTotal($n) {
        $products = 0;
        $other = 0;
        for ($i = 1; $i <= $n; $i++) {
            $v = $this->getField("income.products.volume.$i");
            $p = $this->getField("income.products.price.$i");
            $products += $p * $v;
            $other += $this->getField("income.other.$i");
        }
        return (float)($products + $other);
    }

    public function getAllNoNDSIncome($num) {
        $products = $this->getProductNoNDSProfit($num);
        $other = $this->getField("income.other.$num");
        return (float)($products + $other);
    }

    public function getAllNoNDSIncomeTotal($n) {
        $products = 0;
        $other = 0;
        for ($i = 1; $i <= $n; $i++) {
            $products += $this->getProductNoNDSProfit($i);
            $other += $this->getField("income.other.$i");
        }
        return (float)($products + $other);
    }

}
