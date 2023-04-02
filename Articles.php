
<?php
$conn=mysqli_connect("localhost","root","","pfe_db"); //database connection  
 //hostname, username, password, database name  
 if ($conn) {  
    $query="select * from articles";  
    $connect=mysqli_query($conn,$query);  
    $num=mysqli_num_rows($connect); //check in database any data have or not ; 
     
 }else{  
      echo "Error";  
 }  

  
 

  
 
?>

<?php include "index.php";
      

?>  
<h1>ARTICLES</h1>
<div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">Serial Number</th>
                                    <th scope="col">Article name</th>
                                    <th scope="col">ID Categorie</th>
                                    <th scope="col">Quantité</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <?php 
                                    if ($num>0) {  
                                        while($data=mysqli_fetch_assoc($connect)){  
                                            $id=$data['sNumber'];
                                            ECHO $id;
                                             echo " <tr> " ;
                                             echo  " <td>" .$data['sNumber']."</td>" ; 
                                             echo  " <td>" .$data['articleName']."</td>";  
                                             echo  " <td>" .$data['idCategories']."</td>" ; 
                                             echo  " <td>" .$data['Quantité']."</td>" ; 
                                             echo  " <td>" .$data['Description']."</td>" ; 
                                             echo "<td>";
                                             echo "<div class='btn-group'>";
                                             echo "<a class='btn btn-danger' href='delete_art.php?id=" .$data['sNumber'] ."'> Delete</a>";
                                             echo '<script>alert("Welcome to Geeks for Geeks")</script>';
                                             echo "</div>";
                                             echo "</td>";
                                             echo "</tr>" ;   
                                             
                                            
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
