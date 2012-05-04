<?php

class UserBean extends BeanBase
{

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

    // returns an array of data-info for this user;
    public function getAllUserInfo($id) {
        $query = array('_id' => $id);
        $cursor = $this->conn->users->find($query);
        if (isset($cursor)) {
            return $cursor->getNext();
        }
        else throw new Exception("The User exists not");
    }

    public function getUserField($id, $field) {
        $query = array('_id' => $id);
        $cursor = $this->conn->users->find($query);
        if (isset($cursor)) {
            $cursor = iterator_to_array($cursor);

            return $cursor[$id][$field];
        }
        else throw new Exception("The User or Requested field exists not");
    }

    public function checkUser() {

    }

}
