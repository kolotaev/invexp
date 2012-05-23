<?php

class ProjectBean extends ProjectsBeanBase
{
    public function __construct() {
    }

    public function newProject() {
        $name = $_REQUEST['pname'];
        $periods = $_REQUEST['nperiods'];
        $curr1 = $_REQUEST['curr1'];
        $curr2 = $_REQUEST['curr2'];
        $description = $_REQUEST['description'];
        $user = $_SESSION['auth'];

        $bones = Bones::getBones($periods);
        $bones['_id'] = "$name@$user";
        $bones['name'] = $name;
        $bones['periods'] = $periods;
        $bones['currency1'] = $curr1;
        $bones['currency2'] = $curr2;
        $bones['description'] = $description;
        $bones['user'] = $user;
        $bones['creation_date'] = date("Y-m-d");

        $this->id = "$name@$user";
        //$_SESSION['project'] = "$name@$user";
        $this->pr->save($bones);
    }

    public function deleteProject($id) {
        $query = array('_id' => $id);
        $this->pr->remove($query);
    }
}
