<?php
//For connecting to the databasename

//database parameters
$host = "localhost";
$username = "root";
$password = " ";
$databasename = "jishtest";

$con = mysqli_connect($host,$username,"",$databasename ) or die(mysqli_error());

require_once "DB/MysqliDB.php";

session_start();
//connect DB
$db = new MysqliDB ($host,$username,$password,$databasename);

 ?>