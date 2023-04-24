

 <?php
 /*
session_start();
if (isset($_SESSION["user"])) {
    header("Location: index.php");
} */
?>  


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DASHMIN - Bootstrap Admin Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sign Up Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <a href="index.php" class="">
                                <h3 class="text-primary">LEONI</h3>
                            </a>
                            <h3>Sign Up</h3>
                        </div>

                        <?php 
        if (isset($_POST['submit'])) {
            $matricule = $_POST['id'];
            $fullname = $_POST['username'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $pass = $_POST['password_1'];
            $repass = $_POST['password_2'];

            $password_hashage = password_hash($pass,  PASSWORD_DEFAULT ); 
            $errors = array();

            if (empty($matricule) OR empty($fullname) OR empty($email) OR empty($phone) OR empty($pass) OR empty($repass)) {
                array_push($errors, "All fields are required");
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
               array_push($errors, "Email is Invalid"); 
            }
            
            if (strlen($pass)<8) {
                array_push($errors, "Password must be at least 8 caracters"); 
             }

            if ($pass !== $repass) {
                array_push($errors, "Password does not match");
            }
            require_once("database.php");
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $rowCount = mysqli_num_rows($result);
            if ($rowCount>0) {
              array_push($errors, "Email already exist");
            }

            if (count($errors)>0) {
                foreach ($errors as $error) {
                    echo "<div class='alert alert-danger'>$error</div>";
                }
            }else {
                
                $sql = "INSERT INTO users (Matricule, username, email, phone, password) VALUES ( ? , ? , ? , ? , ? )";
               $stmt = mysqli_stmt_init($conn);
                $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
                
                if($prepareStmt){
                    mysqli_stmt_bind_param($stmt, "issis", $matricule, $fullname, $email, $phone, $password_hashage);
                    mysqli_stmt_execute($stmt);
                    
                    echo "<div class='alert alert-success'>You are registered successfuly.</div>";
                }else {
                    die("Something went wrong§§§§§");
                } 
            }
        }


        ?>
                        <form method="post" action="register.php">
  	                    

                          <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="floatingText" name="id" autocomplete="off" required>
                            <label for="floatingText" >Matricule</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingText" name="username" autocomplete="off" required >
                            <label for="floatingText">Username</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" name="email" autocomplete="off" required >
                            <label for="floatingInput">Email address</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="floatingInput" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" autocomplete="off" required>
                            <label for="floatingInput">Phone</label>
                        </div>

                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" id="floatingPassword" name="password_1" autocomplete="off" required >
                            <label for="floatingPassword">Password</label>
                        </div>

                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" id="floatingPassword" name="password_2" autocomplete="off" required >
                            <label for="floatingPassword">Re-Password</label>
                        </div>
                        <button type="submit" class="btn btn-primary py-3 w-100 mb-4" name="submit">Sign Up</button>
                        <p class="text-center mb-0">Already have an Account? <a href="Login.php">Sign In</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign Up End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>