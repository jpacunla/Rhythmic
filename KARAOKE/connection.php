<?php
// ini_set('display_errors', '1');
//     ini_set('display_startup_errors', '1');
//      error_reporting(E_ALL);
//$servername = "us-cdbr-east-06.cleardb.net";
//$username = "bafa509fd17051";
//$password = "4c32c599";
//$dbname = "heroku_3c4f20371a441b5";
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "rhythmic";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>