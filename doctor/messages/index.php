<?php require_once '../inc/header.php' ;?>

<?php require_once '../inc/menu.php' ;?>
<div class="col-sm-12">
        <h3 class="text-center p-3 bg-primary text-white">Messages</h3>
        <table class="table table-dark table-bordered">
            <thead>
                <tr class="text-center">
                    <th scope="col">#</th>      
                    <th scope="col">Customer name</th>           
                    <th scope="col">Message</th>           
                    <th scope="col">Action</th>           
              </tr>
            </thead>
            <tbody>
                <?php 
                 $doctor_id = $_SESSION['doctor_id'];

                 $userMsgSql = "SELECT * FROM `doctor_user_messages`dum INNER JOIN user u ON dum.user_id = u.user_id WHERE dum.user_id = '$doctor_id' AND `status` <> 'replied' AND `sender` = 'user' ";

                 $userObject = mysqli_query($conn , $userMsgSql);
                $x=1; 
                
                ?>
                <?php while($row = mysqli_fetch_assoc($userObject)){   ?>
                
                    <tr class="text-center">
                    <td scope="row"><?php echo $x; ?></td>
                    <td class="text-center"><?php echo $row['user_name']; ?></td>
                    <td class="text-center"><?= substr( $row['message'],0,10) ?>..</td>
                    <td class="text-center">
                    <a href="reply.php?user_id=<?= $row['user_id']; ?>&message_id=<?=$row['message_id']?>" class="btn btn-success">Reply</a>
                    <a href="delete.php?message_id=<?= $row['message_id'] ?>" class="btn btn-danger " >Delete</a>
                    <a href="show.php?message_id=<?= $row['message_id'] ?>" class="btn btn-warning " >Show</a>
                    </td>
                    
                </tr>
                <?php $x++; } ?>
               
            </tbody>
        </table>
    </div>


<?php require_once '../inc/footer.php' ;?>









