<?php


include "database.php";

$id = $_GET['id'];

$req = "delete from categories where id_Categorie = $id";
$res = mysqli_execute_query($conn , $req);

header("Location:Categories.php");


?>