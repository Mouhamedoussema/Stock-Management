<?php

include "database.php";
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>LEONI - Gestion de stock - IT </title>
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
<!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="index.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary">LEONI</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">John doe</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.php" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="users.php" class="nav-item nav-link "><i class="fas fa-users"></i></i>Users</a>
                    <a href="Categories.php" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Categories</a>
                    <a href="Articles.php" class="nav-item nav-link active"><i class="fas fa-boxes"></i>Articles</a>
                    <a href="demandes.php" class="nav-item nav-link"><i class="fas fa-clipboard-list"></i>Demandes</a>
                    <div class="nav-item dropdown">
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->
        <div class="content">
<!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item"></a>   
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item"></a>  
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-bell me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Notification</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Profile updated</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">New user added</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <h6 class="fw-normal mb-0">Password changed</h6>
                                <small>15 minutes ago</small>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all notifications</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">My Profile</a>
                            <a href="#" class="dropdown-item">Settings</a>
                            <a href="logout.php" class="dropdown-item" name="Logout">Log Out</a>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->


            <!-- Content Start -->
          
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light  rounded p-4">
                    <div class="d-flex   mb-4">
                        <h2 class="mb-0">Articles</h2>
                       
                    </div>
            <button class="btn btn-primary   "> <a href="art_Add.php" target="_blank" class="text-light"> Add Article </a></button>
           
           
           <?php
           
           $sql = "SELECT * FROM `articles`";
           $result = mysqli_query($conn, $sql);
           if(mysqli_num_rows($result) < 1) {
            echo "<p>No record Found</p>";
           }else {

           ?>


            <div class="table-responsive">


            <table class="table text-start table-bordered table-hover ">
                           
                
  <thead>
    <tr>
      <th class="p-2 mb-2 bg-success text-white" scope="col">Serial</th>
      <th class="p-2 mb-2 bg-success text-white" scope="col">Article</th>
      <th class="p-2 mb-2 bg-success text-white" scope="col">Description</th>
      <th class="p-2 mb-2 bg-success text-white" scope="col">Quantity</th>
      <th class="p-2 mb-2 bg-success text-white" scope="col">Prix</th>
      <th class="p-2 mb-2 bg-success text-white" scope="col">Actions</th>
      
    </tr>
    <tr>
    <?php
     
     
     if($result){
        while($row = mysqli_fetch_assoc($result)){
            $snumber = $row['sNumber'];
            $article = $row['articleName'];
            $description = $row['descriptionArt'];
            $quantity = $row['Quantité'];
            $prix = $row['prix'];

            echo '<tr>
            <th scope="row">'.$snumber.'</th>
            <td>'.$article.'</td>
            <td>'.$description.'</td>
            <td>'.$quantity.'</td>
            <td>'.$prix.'</td>
            <td> 
            
            '

            ?>

           <button onclick=displayModal()> 
           
           

<i class="bi bi-trash-fill"></i>

           </button> 
           
           <?php
           
         echo '</td>
            
            </tbody>
    ';
            
        }
        
    }

    
     ?>
    
    <div class="modal" id="id01" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Are you sure</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    
      <div class="modal-footer">
        <button type="button" class="btn btn-Secondary"> <a href="/pfe_project/deleteArt.php?id=<?php echo $snumber  ?> " > Save changes </a> </button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

    </tr>
  </thead>
  <tbody>
   
     
  
</table>
                    </div>
                </div>
            </div>


        <?php } ?>
  


            <!-- Content End -->




            
          <!-- Footer Start -->
          <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Med oussema Mahjoub</a>, All Right Reserved. 
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->

           
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

    <script src="custom.js"></script>

    <!-- Template Javascript -->
    <script>

    function displayModal(){

        document.getElementById('id01').style.display='block'; 

    }


    </script>


    <script src="js/main.js"></script>
</body>

</html>

