<?php

// ToDo: this class should be overlooked in the future!
class Bones
{
    static private $project_bones = array(

        '_id' => '',
        'name' => '',
        'user' => '',
        'periods' => '',
        'currency1' => '',
        'currency2' => '',
        'description' => '',
        'creation_date' => '',

        'around' => array(
            'macro' => array(
                'prise_rise_tempo' => 0,
                'currency_rate' => 0,
                'refinance_rate' => 0,
                'nds_tax' => 0,
                'profit_tax' => 0,
                'fszn_tax' => 0,
            ),
            'micro' => array(
                'amortization' => 0,
                'credit_volume' => 0,
                'credit_rate' => 0,
                'credit_term' => 0,
                'own_money' => 0,
                'discont' => 0,
            ),
        ),

        'income' => array(
            'products' => array(
                'volume' => array(),
                'price' => array(),
                'nds_value' => array(),
                'sales_profit' => array(), // without NDS-tax
            ),
            'other' => array(),
        ),

        'costs' => array(
            'rent' => array(),
            'equipment' => array(),
            'amortization' => array(),
            'payment' => array(),                             // all fees to workers, but only FOT
            'materials' => array(),
            'adverts' => array(),
            'organizational' => array(),
            'credit_payment' => array(),                    // all credit payments
            'credit_payment_percent' => array(),           // part of all credit payments
            'other' => array(),
        ),

        'effect' => array(
            'npv' => array(),
            'irr' => array(),
        ),

    );

    static final public function getBones($n) {
        foreach (self::$project_bones['income']['products'] as &$v) {
            for ($i = 1; $i <= $n; $i++) {
                $v[$i] = 0;
            }
        }
        for ($i = 1; $i <= $n; $i++) {
            self::$project_bones['income']['other'][$i] = 0;
        }
        foreach (self::$project_bones['costs'] as &$v) {
            for ($i = 1; $i <= $n; $i++) {
                $v[$i] = 0;
            }
        }
        foreach (self::$project_bones['effect'] as &$v) {
            for ($i = 1; $i <= $n; $i++) {
                $v[$i] = 0;
            }
        }
        return self::$project_bones;
    }
}
