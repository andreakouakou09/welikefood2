<?php 
$servername = "localhost";
$username = "spcom_userkouakou";
$password = "PROJK9IFVM1O";
$dbname = "spcom_kouakou";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(!$conn) {
    die("Connection failed: " .mysqli_connect__error());
}

// sql to create table


?>