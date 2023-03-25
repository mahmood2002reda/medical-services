<?php require_once '../inc/header.php' ;?>

<?php require_once '../inc/menu.php' ;?>
<div class="col-sm-12">
        <h3 class="text-center p-3 bg-primary text-white">Messages</h3>
        <table class="table table-dark table-bordered">
            <thead>
                <tr class="text-center">
                    <th scope="col">#</th>      
                    <th scope="col">Doctor name</th>           
                    <th scope="col">Message</th>           
                    <th scope="col">Action</th>           
              </tr>
            </thead>
            <tbody>
                <?php 
                 $user_id = $_SESSION['user_id'];

                 $userMsgSql = "SELECT * FROM `doctor_user_messages`dum INNER JOIN doctors d ON dum.doctor_id = d.doctor_id WHERE `user_id` = '$user_id' AND `status` <> 'replied' AND `sender` = 'doctor' ";

                 $userObject = mysqli_query($conn , $userMsgSql);
                $x=1; 
                
                ?>
                <?php while($row = mysqli_fetch_assoc($userObject)){   ?>
                
                    <tr class="text-center">
                    <td scope="row"><?php echo $x; ?></td>
                    <td class="text-center"><?php echo $row['doctor_name']; ?></td>
                    <td class="text-center"><?= substr( $row['message'],0,10) ?>..</td>
                    <td class="text-center">
                    <a href="../messages/reply.php?doctor_id=<?= $row['doctor_id']; ?>&message_id=<?$row['message_id']?>" class="btn btn-success">Reply</a>
                    <a href="../messages/delete.php?message_id=<?= $row['message_id'] ?>" class="btn btn-danger " >Delete</a>
                    <a href="../messages/show.php?message_id=<?= $row['message_id'] ?>" class="btn btn-warning " >Show</a>
                    </td>
                    
                </tr>
                <?php $x++; } ?>
               
            </tbody>
        </table>
    </div>


<?php require_once '../inc/footer.php' ;?>









