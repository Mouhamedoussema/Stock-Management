<?php

$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "pfe_db";
$id=$_GET['id'];

$conn = mysqli_connect($serverName, $userName, $password, $dbName);
if (!$conn) { die("Connection failed: " . mysqli_connect_error()); }

else {
    $sql = "DELETE FROM articles WHERE sNumber=".$id;
    echo $sql;
mysqli_query($conn, $sql);
}

header("location: articles.php");

?>
