<?php
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
            'smth' => '',
        ),

        'workers' => array(
            'smth' => '',
        ),



    );

    static final public function getBones(){
        return self::$project_bones;
    }
}
