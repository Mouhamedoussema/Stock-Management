  <?php
 include "database.php";


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"> 

    <title>Add Article</title>
  </head>
  <body>

  
    <div class="container">
    <h1> Add Article</h1>
    
    <?php 
        if (isset($_POST['add'])) {
            $snumber = $_POST['s_number'];
            $article = $_POST['article'];
            $categorie = isset($_POST['categorie']) ? $_POST['categorie'] : "";  
            $description = $_POST['description'];
            $quatity = $_POST['quantity'];
            $prix = $_POST['prix'];

             
            $errors = array();

            if (empty($snumber) OR empty($article) OR empty($categorie) OR empty($description) OR empty($quatity) OR empty($prix)) {
                array_push($errors, "All fields are required");
              
            }

            require_once("database.php");
            $sql = "SELECT * FROM articles WHERE sNumber = '$snumber'";
            $result = mysqli_query($conn, $sql);
            $rowCount = mysqli_num_rows($result);
            if ($rowCount>0) {
              array_push($errors, "article already exist");
            }

            if (count($errors)>0) {
                foreach ($errors as $error) {
                    echo "<div class='alert alert-danger'>$error</div>";
                }
            }else {
                
                $sql = "INSERT INTO articles (sNumber, articleName, Quantité, descriptionArt, categorie_id, prix) VALUES ( ? , ? , ? , ? , ? , ? )";
               $stmt = mysqli_stmt_init($conn);
                $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
                
                if($prepareStmt){
                    mysqli_stmt_bind_param($stmt, "isissi", $snumber, $article, $quatity, $description, $categorie, $prix);
                    mysqli_stmt_execute($stmt);
                    
                    echo "<div class='alert alert-success'>Articled added successfuly.</div>";
                }else {
                    die("Something went wrong§§§§§");
                } 
            }
        }


        ?>


    <form action="art_Add.php" method="post">
  <div class="form-group">
    <label for="exampleFormControlInput1">Serial Number</label>
    <input type="text" class="form-control" name="s_number" id="exampleFormControlInput1" placeholder="Serial Number">
    <label for="exampleFormControlInput1">Article </label>
    <input type="text" class="form-control" name="article" id="exampleFormControlInput1" placeholder="Article name">
    <label for="exampleFormControlSelect1">Choose Categorie</label>

    <?php


        $req = "select * from categories";
        $res = mysqli_query($conn , $req);
        

    
    ?>

    <select class="form-control" name="categorie" id="exampleFormControlSelect1">

<?php 

    while($cats = mysqli_fetch_assoc($res))    {

      echo "<option value=$cats[id_Categorie]>  $cats[categorie_name] </option>";

    }

   



?>

    </select>
    <label for="exampleFormControlTextarea1">Description </label>
    <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3"></textarea>
    <label for="exampleFormControlInput1">Quantity</label>
    <input type="number" class="form-control" id="exampleFormControlInput1" name="quantity" placeholder="Quantity">
    <label for="exampleFormControlInput1">Prix en Dt</label>
    <input type="number" class="form-control" name="prix" id="exampleFormControlInput1" placeholder="Prix en Dt">
    <h1> <button type="submit" name="add" class="btn btn-primary">Add Article</button> </h1>
  </div>
 
  
</form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>