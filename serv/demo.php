<?php

$demodata = array(
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
        ),
    ),

    'income' => array(
        'products' => array(
            'volume' => array(
                1 => 0,
                2 => 0,
                3 => 0,
                4 => 0,
                5 => 0,
            ),
            'price' => array(
                1 => 0,
                2 => 0,
                3 => 0,
                4 => 0,
                5 => 0,
            ),
            'nds_value' => array(
                1 => 0,
                2 => 0,
                3 => 0,
                4 => 0,
                5 => 0,
            ),
            'sales_profit' => array(
                1 => 0,
                2 => 0,
                3 => 0,
                4 => 0,
                5 => 0,
            ), // without NDS-tax
        ),
        'other' => array(
            1 => 0,
            2 => 0,
            3 => 0,
            4 => 0,
            5 => 0,
        ),
    ),

    'costs' => array(
        'rent' => array(
            1 => 0,
            2 => 0,
            3 => 0,
            4 => 0,
            5 => 0,
        ),
        'equipment' => array(
            1 => 0,
            2 => 0,
            3 => 0,
            4 => 0,
            5 => 0,
        ),
        'amortization' => array(
            1 => 0,
            2 => 0,
            3 => 0,
            4 => 0,
            5 => 0,
        ),
        'payment' => array(
            1 => 0,
            2 => 0,
            3 => 0,
            4 => 0,
            5 => 0,
        ), // all fees to workers, but only FOT
        'materials' => array(
            1 => 0,
            2 => 0,
            3 => 0,
            4 => 0,
            5 => 0,
        ),
        'adverts' => array(
            1 => 0,
            2 => 0,
            3 => 0,
            4 => 0,
            5 => 0,
        ),
        'organizational' => array(
            1 => 0,
            2 => 0,
            3 => 0,
            4 => 0,
            5 => 0,
        ),
        'credit_payment' => array(
            1 => 0,
            2 => 0,
            3 => 0,
            4 => 0,
            5 => 0,
        ),
        'credit_payment_percent' => array(
            1 => 0,
            2 => 0,
            3 => 0,
            4 => 0,
            5 => 0,
        ),
        'other' => array(
            1 => 0,
            2 => 0,
            3 => 0,
            4 => 0,
            5 => 0,
        ),
    ),

    'effect' => array(
        'npv' => array(
            1 => 0,
            2 => 0,
            3 => 0,
            4 => 0,
            5 => 0,
        ),
        'irr' => array(
            1 => 0,
            2 => 0,
            3 => 0,
            4 => 0,
            5 => 0,
        ),
    ),

);