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

    private $m; // Connection
    private $db; // Selected DB
    private $dbname = "invexp"; // Name of the DB

    public function __construct() {
        $this->m = new Mongo()
            or die ("Could not connect");
        $this->db = $this->m->selectDB($this->dbname);
    }

    public function __destruct() {
        $this->m->close();
    }


// drops any table or the whole database 'invexp'
    public function drop($name = '', $db = false) {
        if ($name === '' && $db === false) {
            return;
        }
        if ($name === '' && $db !== false) {
            echo "MongoDB Dropping whole DB.... <br>";
            $this->m->dropDB($this->m);
            return;
        }
        else {
            $this->db->selectCollection($name)->drop()
                or die ("Error dropping $name collection");
            echo "MongoDB Dropping Collection \"$name\".... <br>";
            return;
        }
    }

    public function create() {
        /* Stub. Cause Mongo creates automatically if not exists. The connection is in __constructor */
        echo "Stub";
        return;
    }

    public function usersT() {
        $this->db->createCollection("users")
            or die ("Error");
        echo "Created Users Collection";

    }

    public function projectsT() {
        $this->db->createCollection("projects")
            or die ("Error");
        echo "Created Projects Collection";
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
            color: #754f19;
            text-align: center;
            font-size: 24px;
            margin: 15px 100px;
            border: 1px solid green;
        }

        a {
            display: block;
            margin: 10px;
            color: green;
            font-size: 14px;
        }

        a:hover {
            background-color: #fff7cb;
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

<h1> MongoDB </h1>
<a href="mongo.php?act=create-db"> Create DataBase </a>
<a href="mongo.php?act=drop-db"> Drop DataBase </a>
<a href="mongo.php?act=create-users"> Create USERS Collection</a>
<a href="mongo.php?act=drop-users"> Drop USERS Collection</a>
<a href="mongo.php?act=create-projects"> Create PROJECTS Collection</a>
<a href="mongo.php?act=drop-projects"> Drop PROJECTS Collection</a>

<a class='exit' href="mongo.php"> Exit GET </a>

</body>
</html>