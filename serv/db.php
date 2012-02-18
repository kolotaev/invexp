<?php
// script 
if (@$_GET['act'] === 'crdb') { echo "crdb";}
// end of script


// Class that performs all business logic
class Serv {

private $user = 'root';
private $pass = 'vertrigo';
private $db = 'invexp1';
private $host = 'localhost';

function db () {

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
}

a {
display: block;
margin: 10px;
}
</style>
</head>
<body>

<a href="db.php?act=crdb"> Create DataBase </a> 
<a href="db.php"> Create Table </a>
<a href="db.php"> Drop/Clear Table</a>
<a href="db.php"> db </a>
<a href="db.php"> Exit GET </a>

</body>
</html>