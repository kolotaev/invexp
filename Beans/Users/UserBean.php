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

        //var_dump($this->conn);
        $this->conn->users->save($insert);

    }

}
