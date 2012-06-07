<?php

class CostsBean extends ProjectsBeanBase
{
    public function calculateAmortization($num) {
        $am_term = $this->getField("around.macro.amortization");
        $equipment_sum = 0;
        for ($n = 1; $n <= $num; $n++) {
            $equipment_sum += $this->getField("costs.equipment.$n");
        }
        return $equipment_sum / $am_term;
    }

    /*
    public function setAmortization($num) {
        $am = $this->calculateAmortization($num);
        $this->updateField('costs.amortization.$num', $am);
    }
    */


}
