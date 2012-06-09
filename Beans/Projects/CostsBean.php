<?php

class CostsBean extends ProjectsBeanBase
{
    public function getAllCosts($num) {
        $costs = 0;
        $costs += $this->getField("costs.rent.$num");
        $costs += $this->getField("costs.equipment.$num");
        $costs += $this->getField("costs.amortization.$num");

        $pays = $this->getField("costs.payment.$num");
        $fszn_tax = $this->getField("around.macro.fszn_tax");
        $costs += $pays + $pays * $fszn_tax / 100;

        $costs += $this->getField("costs.materials.$num");
        $costs += $this->getField("costs.adverts.$num");
        $costs += $this->getField("costs.organizational.$num");
        $costs += $this->getField("costs.credit_payment.$num");
        $costs += $this->getField("costs.other.$num");
        return (float)$costs;
    }

    public function getAllProductionCosts($num) {
        $costs = 0;
        $costs += $this->getField("costs.rent.$num");
        $costs += $this->getField("costs.equipment.$num");
        $costs += $this->getField("costs.amortization.$num");

        $pays = $this->getField("costs.payment.$num");
        $fszn_tax = $this->getField("around.macro.fszn_tax");
        $costs += $pays + $pays * $fszn_tax / 100;

        $costs += $this->getField("costs.materials.$num");
        $costs += $this->getField("costs.adverts.$num");
        $costs += $this->getField("costs.organizational.$num");
        $costs += $this->getField("costs.other.$num");
        return (float)$costs;
    }


    /*
    public function setAmortization($num) {
        $am = $this->calculateAmortization($num);
        $this->updateField('costs.amortization.$num', $am);
    }
    */


}
