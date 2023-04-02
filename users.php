
<?php
$conn=mysqli_connect("localhost","root","","pfe_db"); //database connection  
 //hostname, username, password, database name  
 if ($conn) {  
    $query="select * from users";  
    $connect=mysqli_query($conn,$query);  
    $num=mysqli_num_rows($connect); //check in database any data have or not  ;  
 }else{  
      echo "Error";  
 }  

 
 
?>

<?php include "index.php";

?>  
<h1>Users</h1>
<div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                        <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">id</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    if ($num>0) {  
                                        while($data=mysqli_fetch_assoc($connect)){  
                                             echo "  
                                                  <tr>  
                                                  <td>".$data['idUser']."</td>  
                                                  <td>".$data['username']."</td>  
                                                  <td>".$data['email']."</td>  
                                                  <td>".$data['phone']."</td>
                                                  <td><button>Details</button>
                                                     
                                                  
                                             ";  
                                        }  
                                   }  
                            ?>
                                    
                            </table>
                    </div>

<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	
    <?php endif ?>
</div>
<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Recent Salse</h6>
                        <a href="">Show All</a>
                    </div>
                    
                </div>
            </div>
            <!-- Recent Sales End -->



            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Med Oussema Mahjoub</a>, All Right Reserved. 
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
