<?php

$user = 'root';
$pass = 'vertrigo';
$db = 'invexp1';
$host = 'localhost';

mysql_connect ($host, $user, $pass)
 or die ("Could not connect");
 
@mysql_query ("CREATE DATABASE $db".mysql_error());

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
	
?>