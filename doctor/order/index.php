<?php require_once '../inc/header.php' ;?>

<?php require_once '../inc/menu.php' ;?>
    <div class="col-sm-12">
        <h3 class="text-center p-3 bg-primary text-white">All Orders</h3>
        <table class="table table-dark table-bordered">
            <thead>
                <tr class="text-center">
                    <th scope="col">#</th>      
                    <th scope="col">Name</th>
                    <th scope="col">Email</th> 
                    <th scope="col">Notes</th>
                    <th scope="col">Mobile</th>
                    <th scope="col">Service</th>
                    <th scope="col">City</th>                    
                    <th scope="col">Action</th>                   
                </tr>
            </thead>
            <tbody>

                <?php 
                 $doctorOrdersSql = "SELECT * FROM 
                 orders o
                 INNER JOIN 
                 user u ON u.user_email = o.orders_email
                 INNER JOIN  doctors d ON  d.doctor_id = o.doctor_major
                 INNER JOIN city c ON c.city_id = o.orders_city_id
                 INNER JOIN services s ON s.serv_id = o.orders_serve_id WHERE o.status = 'sent' AND o.pending = '1'  ";

                 $doctorObject = mysqli_query($conn , $doctorOrdersSql);
                $x=1; 
                
                ?>
                <?php while($row = mysqli_fetch_assoc($doctorObject)){   ?>
                
                    <tr class="text-center">
                    <td scope="row"><?php echo $x; ?></td>
                    <td class="text-center"><?php echo $row['doctor_name']; ?></td>
                    <td class="text-center"><?php echo $row['orders_email']; ?></td>
                    <td class="text-center"><?php echo $row['orders_notes']; ?></td>
                    <td class="text-center"><?php echo $row['orders_mobile']; ?></td>
                    <td class="text-center"><?php echo $row['serv_name']; ?></td>
                    <td class="text-center"><?php echo $row['city_name']; ?></td>
                    <td class="text-center">
                    <a href="reply.php?user_id=<?= $row['user_id']; ?>&order_id=<?= $row['orders_id'] ?>" class="btn btn-success">Contact</a>
                    <a href="delete.php?order_id=<?= $row['orders_id'] ?>" class="btn btn-danger " >Decline</a>
                    </td>
                    
                </tr>
                <?php $x++; } ?>
               
            </tbody>
        </table>
    </div>



<?php require '../inc/footer.php';  ?>
    
</body>