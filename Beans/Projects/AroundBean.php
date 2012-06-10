<?php

class AroundBean extends ProjectsBeanBase
{
    public function getAllActives() {
        $actives = 0;
        $actives += $this->getField('around.micro.credit_volume');
        $actives += $this->getField('around.micro.own_money');
        return (float)$actives;
    }

    public function calculateCredit() {
        $volume = $this->getField('around.micro.credit_volume');
        $term = (int)$this->getField('around.micro.credit_term');
        $rate = $this->getField('around.micro.credit_rate');
        $num = $this->pr_settings['n'];
        if ($term !== 0) {
            for ($i = 1; $i <= $num; $i++) {
                $costs_main = $volume / $term;
                $costs_percent = $volume / $term * $rate / 100;
                $costs_total = $costs_main + $costs_percent;
                if ($i <= $term) {
                    $this->updateField("costs.credit_payment.$i", $costs_total);
                    $this->updateField("costs.credit_payment_percent.$i", $costs_percent);
                }
                else {
                    $this->updateField("costs.credit_payment.$i", 0);
                    $this->updateField("costs.credit_payment_percent.$i", 0);
                }
            }
        }
        else {
            for ($i = 1; $i <= $num; $i++) {
                $this->updateField("costs.credit_payment.$i", 0);
                $this->updateField("costs.credit_payment_percent.$i", 0);
            }
        }
    }

    public function calculateAmortization() {
        $num = $this->pr_settings['n'];
        $am_term = (int)$this->getField("around.micro.amortization");
        $equipment_sum = 0;
        if ($am_term !== 0) {
            for ($i = 1; $i <= $num; $i++) {
                $equipment_sum += $this->getField("costs.equipment.$i");
                $am_value = $equipment_sum / $am_term;
                if ($i <= $am_term) {
                    $this->updateField("costs.amortization.$i", $am_value);
                }
                else {
                    $this->updateField("costs.amortization.$i", 0);
                }
            }
        }
        else {
            for ($i = 1; $i <= $num; $i++) {
                $this->updateField("costs.amortization.$i", 0);
            }
        }
    }

    // adds FSZN tax to workers' fees
    public function calculatePayment() {
        $tax = $this->getField('around.macro.fszn_tax');
        $num = $this->pr_settings['n'];
        for ($i = 1; $i <= $num; $i++) {
            $pays = $this->getField('costs.payment');
            $costs_main = $volume / $term;
            $costs_percent = $volume / $term * $rate / 100;
            $costs_total = $costs_main + $costs_percent;
            if ($i <= $term) {
                $this->updateField("costs.credit_payment.$i", $costs_total);
                $this->updateField("costs.credit_payment_percent.$i", $costs_percent);
            }
        }
    }

}
