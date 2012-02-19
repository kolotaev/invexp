<?php
// script 
$a = new Serv();
if (@$_GET['act'] === 'drop-db') { $a->drop('', true); } 
if (@$_GET['act'] === 'create-db') { $a->create(); } 
if (@$_GET['act'] === 'create-users') { $a->usersT(); } 
if (@$_GET['act'] === 'drop-users') { $a->drop(users); } 
//if (@$_GET['act'] === 'create-projects') { $a->projectsT(); } 
//if (@$_GET['act'] === 'drop-projects') { $a->drop(projects); } 

// end of script





// Class that performs all business logic
class Serv {

private $user = 'root';
private $pass = 'vertrigo';
private $db = 'invexp1';
private $host = 'localhost';

public function __construct () {
	mysql_connect ($this->host, $this->user, $this->pass)
	or die ("Could not connect");
}

// drops any table or the whole database 'invexp'
public function drop ($name='', $db=false) {
	if ($name==='' && $db === false) {return;}
	if ($name==='' && $db !== false) {
		echo "MySQL Dropping whole DB.... <br>";
		mysql_query ("DROP DATABASE $this->db".mysql_error());
	}
	else {
		echo "MySQL Dropping Table \"$name\".... <br>";
		mysql_query ('DROP TABLE $name');
	}
}

public function create () {
	echo "MySQL Creating whole DB.... <br>";
	mysql_query ("CREATE DATABASE $this->db".mysql_error());
}

public function usersT () {
	echo "MySQL Creating table USERS.... <br>";
	mysql_query ('CREATE TABLE IF NOT EXISTS users (
			id INT AUTO_INCREMENT PRIMARY KEY,
			name VARCHAR(35) NOT NULL,
			login VARCHAR(35) NOT NULL,
			email VARCHAR(50) NOT NULL,
			pass VARCHAR(35) NOT NULL,
			reg_date DATE NOT NULL
			)')
	or die ("Error".mysql_error());
}

public function projectsT () {
	echo "MySQL Creating table USERS.... <br>";
	mysql_query ('CREATE TABLE IF NOT EXISTS users (
			id INT AUTO_INCREMENT PRIMARY KEY,
			name VARCHAR(35) NOT NULL,
			login VARCHAR(35) NOT NULL,
			email VARCHAR(50) NOT NULL,
			pass VARCHAR(35) NOT NULL,
			reg_date DATE NOT NULL
			)')
	or die ("Error".mysql_error());
}

public function sss () {

echo "MySQL connection.... <br>";
mysql_connect ($host, $user, $pass)
 or die ("Could not connect");
 
echo "MySQL creating DB.... <br>";
@mysql_query ("CREATE DATABASE $db".mysql_error());

echo "MySQL selecting DB.... <br>";
mysql_select_db($db)
	or die ("Error".mysql_error());

// ************* Actions **********

// Clear table
mysql_query ('DROP TABLE users');

// users
mysql_query ('CREATE TABLE IF NOT EXISTS users (
			id INT AUTO_INCREMENT PRIMARY KEY,
			name VARCHAR(35) NOT NULL,
			login VARCHAR(35) NOT NULL,
			email VARCHAR(50) NOT NULL,
			pass VARCHAR(35) NOT NULL,
			reg_date DATE NOT NULL
			)')
	or die ("Error".mysql_error());

// goe	
mysql_query ('CREATE TABLE IF NOT EXISTS goe (
			id INT AUTO_INCREMENT PRIMARY KEY,
			name TEXT NOT NULL,
			login TEXT NOT NULL,
			email TEXT NOT NULL,
			pass TEXT NOT NULL
			)')
	or die ("Error".mysql_error());


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

<a href="db.php?act=create-db"> Create DataBase </a> 
<a href="db.php?act=drop-db"> Drop DataBase </a> 
<a href="db.php?act=create-users"> Create USERS tb </a> 
<a href="db.php?act=drop-users"> Drop USERS tb </a> 
<a href="db.php?act=create-projects"> Create PROJECTS tb </a> 
<a href="db.php?act=drop-projects"> Drop PROJECTS tb </a> 

<a class='exit' href="db.php"> Exit GET </a>

</body>
</html>