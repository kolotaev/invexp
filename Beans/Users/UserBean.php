<?php

class UserBean extends BeanBase {

    public function newUser() {
        $login = $_REQUEST['ulogin'];
        $mail = $_REQUEST['umail'];
        $pass = md5($_REQUEST['upass']);
        $date = date("Y-m-d");

        $insert = array(
            '_id' => $login,
            'login' => $login,
            'email' => $mail,
            'password' => $pass,
            'reg_date' => $date,
        );
        $this->conn->users->save($insert);
    }

    public function getUserInfo($id) {
        $info = array();
        $query = array('_id' => $id);
        $info = $this->conn->uresrs->find($query);
        if (isset($info)) return $info;
        else return false;
    }

    public function checkUser() {

    }

}
