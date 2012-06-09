<?php

class AroundBean extends ProjectsBeanBase
{
    public function calculateCredit() {
        $volume = $this->getField('around.micro.credit_volume');
        $term = $this->getField('around.micro.credit_term');
        $rate = $this->getField('around.micro.credit_rate');
        $num = $this->pr_settings['n'];
        if ($term !== 0) {
            for ($i = 1; $i <= $num; $i++) {
                $costs_main = $volume / $term;
                $costs_percent = $volume * $rate / 100;
                $costs_total = $costs_main + $costs_percent;
                $this->updateField('costs.credit_payment.$i', $costs_total);
            }
        }
    }

}
