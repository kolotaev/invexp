<?php

class ProjectBean {

    public function newUser() {

        $login = $_REQUEST['ulogin'];
        $mail = $_REQUEST['umail'];
        $pass = $_REQUEST['upass'];
        $date = date("Y-m-d");

        $statement = "INSERT INTO Users(login, email, pass, reg_date) VALUES ('$login','$mail','$pass', '$date')";
        mysql_query($statement);

    }

}
