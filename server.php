<?php 
session_start();


// initializing variables
$username = "";
$email = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'pfe_db');

// register user
if(isset($_POST['register'])){
    //receive all input values from the form
    $id = mysqli_real_escape_string($db, $_POST['idUser']);
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($id)) { array_push($errors, "ID is required");}
    if (empty($username)) { array_push($errors, "Username is required");}
    if (empty($email)) { array_push($errors, "Email is required");}
    if (empty($phone)) { array_push($errors, "Phone is required");}
    if (empty($password_1)) { array_push($errors, "Password is required");}
    if ($password_1 != $password_2) {
        array_push($errors, "Pass is not match");
    }

    //first check the database to make sure
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM users WHERE idUser='$id' OR username='$username' OR email='$email' OR phone='$phone' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists

        if ($user['idUser'] === $id) {
            array_push($errors, "ID already exists");
          }

        if ($user['username'] === $username) {
          array_push($errors, "Username already exists");
        }
    
        if ($user['email'] === $email) {
          array_push($errors, "email already exists");
        }

        if ($user['phone'] === $phone) {
            array_push($errors, "phone already exists");
          }
      }

      // Finally, register user if there no errors in the form
      if(count($errors) == 0) {
        $password = md5($password_1); // encrypt the pass before saving in the database

        $query = "INSERT INTO users (idUser, username, email, phone, password)
                        VALUES('$id', '$username', '$email', '$phone', '$password')";
    mysqli_query($db, $query);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are logged in";
    header('location: index.php');  
    
    }
}

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
  
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
          $_SESSION['username'] = $email;
         echo  $_SESSION['username'];
          $_SESSION['success'] = "You are now logged in";
          header('location: index.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
  }
  
  ?>
