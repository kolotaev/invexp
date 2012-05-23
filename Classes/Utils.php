<?php
class Utils
{
    static final public function getLib($util){
        $util = strtolower($util);
        switch($util) {
            case 'pchart':
                require_once("Libs/pChart/pChart/pData.class");
                require_once("Libs/pChart/pChart/pChart.class");
                break;
            default:
                break;
        }
    }
}
