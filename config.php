<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'chores');
define('DB_PASSWORD', 'chores');
define('DB_DATABASE', 'chores');
$dbcon = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE); //Procedural Style usage
//$dbcon = new MySQLi(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE); //OOP Style usage
?>