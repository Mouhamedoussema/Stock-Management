<?php

$localhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "leoni";

 $conn =mysqli_connect($localhost, $dbuser, $dbpass, $dbname);

 if (!$conn) {
    die("Something Wrong!");
 }
?>