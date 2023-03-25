<?php require_once '../inc/header.php' ; ?>
<?php require '../../function/messages.php';  ?>


<?php require '../inc/menu.php';  ?>
<div class="container d-flex justify-content-center align-items-center" >
             
             <div class="card" style="width:400px ;height :300px">

              <div class="upper">
            
                
                
              </div>

              <div class="user text-center">

                <div class="profile">

                  <img src="../../assets/images/37335057.jpg" class="rounded-circle" width="150">
                  
                </div>

              </div>


              <div class="mt-5 text-center">

                <h4 class="mb-0">system data </h4>
                

               


                <div class="d-flex justify-content-between align-items-center mt-4 px-4">

                  <div class="stats">
                    <h6 class="mb-0">orders</h6>
                    <span><?php $x= getRows("orders"); 
                                   $y=count($x);
                                echo $y ?></span>

                  </div>


                  <div class="stats">
                    <h6 class="mb-0">city</h6>
                    <span><?php $x= getRows("city"); 
                         $y=count($x);
                         echo $y ?></span>

                  </div>


                  <div class="stats">
                    <h6 class="mb-0">admins</h6>
                    <span><?php $x= getRows("admins"); 
                                $y=count($x);
                           echo $y ?></span>

                  </div>
                  <div class="stats">
                    <h6 class="mb-0">services</h6>
                     <span><?php $x= getRows("services"); 
                               $y=count($x);
                           echo $y ?></div></span>

                  
                  <div class="stats">
                    <h6 class="mb-0">doctors</h6>
                     <span><?php $x= getRows("doctors"); 
                               $y=count($x);
                           echo $y ?></div></span>
                </div>

                  </div>
                </div>
                
              </div>
               
             </div>

           </div>
  <div class="col-sm-12">
        <h3 class="text-center p-3 bg-primary text-white">last orders</h3>
        <table class="table table-dark table-bordered">
            <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    
                    <th scope="col">Name</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Email</th>
                    <th scope="col">Notes</th>
                    
                    <th scope="col">Service</th>
                    
                    <th scope="col">City</th>
                    
                    <th scope="col">Action</th>
       
                </tr>
            </thead>
            <tbody>
                <?php  $sql = "SELECT * FROM 
                    orders o
                    INNER JOIN 
                    user u ON u.user_email = o.orders_email
                    INNER JOIN  doctors d ON  d.doctor_id = o.doctor_major
                    INNER JOIN city c ON c.city_id = o.orders_city_id
                    INNER JOIN services s ON s.serv_id = o.orders_serve_id WHERE o.status <> 'sent' ";
                    
                    $sql_run = mysqli_query($conn , $sql);   
                    $x=1; 
                ?>

                <?php while($row = mysqli_fetch_assoc($sql_run)){   ?>
                
                    <?php

                       
                    ?>
                    <tr class="text-center">
                    <td scope="row"><?php echo $x; ?></td>
                    <td class="text-center"><?php echo $row['user_name']; ?></td>
                    <td class="text-center"><?php echo $row['orders_mobile']; ?></td>

                    <td class="text-center"><?php echo $row['orders_email']; ?></td>
                    <td class="text-center"><?php echo $row['orders_notes']; ?></td>
                    <td class="text-center"><?php echo  $row['serv_name']; ?></td>
                    <td class="text-center"><?php echo $row['city_name']; ?></td>
                    
                    <td class="text-center">
                        <a href="../orders/delete.php?order_id=<?= $row['orders_id'] ?>" class="btn btn-danger " >Delete</a>
                    </td>
                </tr>
                <?php $x++; } ?>
                
                <?php
                  
                
               ?>
               
            </tbody>
        </table>
    </div>

<?php require '../inc/footer.php';  ?>

</body>
              
  
  