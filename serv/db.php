<?php
/*
This is some service tool script.
*/
// script 
$a = new Serv();

if (@$_GET['act'] === 'drop-db') {
    $a->drop('', true);
}
if (@$_GET['act'] === 'create-db') {
    $a->create();
}
if (@$_GET['act'] === 'create-users') {
    $a->usersT();
}
if (@$_GET['act'] === 'drop-users') {
    $a->drop("users");
}
if (@$_GET['act'] === 'create-projects') {
    $a->projectsT();
}
if (@$_GET['act'] === 'drop-projects') {
    $a->drop("projects");
}

// end of script


// Class that performs all business logic
class Serv {

    private $user = 'root';
    private $pass = 'vertrigo';
    private $db = 'invexp1';
    private $host = 'localhost';
    private $dblink;

    public function __construct() {
        $this->dblink = mysql_connect($this->host, $this->user, $this->pass)
            or die ("Could not connect");
    }

    public function __destruct() {
        mysql_close($this->dblink);
    }


// drops any table or the whole database 'invexp'
    public function drop($name = '', $db = false) {
        if ($name === '' && $db === false) {
            return;
        }
        if ($name === '' && $db !== false) {
            echo "MySQL Dropping whole DB.... <br>";
            mysql_query("DROP DATABASE $this->db" . mysql_error());
        }
        else {
            mysql_select_db($this->db)
                or die ("Error" . mysql_error());
            echo "MySQL Dropping Table \"$name\".... <br>";
            mysql_query("DROP TABLE IF EXISTS $name" . mysql_error());
        }
    }

    public function create() {
        echo "MySQL Creating whole DB.... <br>";
        mysql_query("CREATE DATABASE $this->db CHARACTER SET utf8 COLLATE utf8_general_ci" . mysql_error());
    }

    public function usersT() {
        mysql_select_db($this->db)
            or die ("Error" . mysql_error());

        echo "MySQL Creating table USERS.... <br>";
        mysql_query('CREATE TABLE IF NOT EXISTS Users (
			id INT AUTO_INCREMENT PRIMARY KEY,
			name VARCHAR(35),
			login VARCHAR(35) NOT NULL,
			email VARCHAR(50) NOT NULL,
			pass VARCHAR(32) NOT NULL,
			reg_date DATE NOT NULL
			)')
            or die ("Error" . mysql_error());
    }

    public function projectsT() {
        mysql_select_db($this->db)
            or die ("Error" . mysql_error());

        echo "MySQL Creating table PROJECTS.... <br>";
        mysql_query('CREATE TABLE IF NOT EXISTS Projects (
			id INT AUTO_INCREMENT PRIMARY KEY,
			user_id INT NOT NULL,
			name VARCHAR(40) NOT NULL,
			description TEXT,
			doc MEDIUMTEXT NOT NULL,
			creation_date DATE NOT NULL
			)')
            or die ("Error" . mysql_error());
    }
}

// end of class
?>



<html>
<head>
    <style type="text/css">
        body {
            text-align: center;
            font-size: 20px;
        }
        h1 {
            color: red;
            text-align: center;
            font-size: 24px;
            margin: 15px 100px;
            border: 1px solid red;
        }
        a {
            display: block;
            margin: 10px;
            color: green;
            font-size: 14px;
        }
        .exit {
            color: red;
            font-size: 16px;
            margin-top: 30px;
            padding: 5px;
            border: solid red 1px;
        }
    </style>
</head>
<body>

<h1> MySQL </h1>
<a href="db.php?act=create-db"> Create DataBase </a>
<a href="db.php?act=drop-db"> Drop DataBase </a>
<a href="db.php?act=create-users"> Create USERS tb </a>
<a href="db.php?act=drop-users"> Drop USERS tb </a>
<a href="db.php?act=create-projects"> Create PROJECTS tb </a>
<a href="db.php?act=drop-projects"> Drop PROJECTS tb </a>

<a class='exit' href="db.php"> Exit GET </a>

</body>
</html>