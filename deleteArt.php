<?php


include "database.php";

$id = $_GET['id'];

$req = "delete from articles where sNumber = $id";
$res = mysqli_execute_query($conn , $req);

header("Location:articles.php");


?>