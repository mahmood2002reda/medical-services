<?php require '../inc/header.php';  ?>

<?php require '../../function/validate.php';  ?>

    <?php 

        if(isset($_POST['submit']))
        {
            $orders_id = $_POST['orders_id'];
            $name = sanitizeString($_POST['name']);
            $notes = sanitizeString($_POST['notes']);
            $notEmpty = isNotEmpty($name);
          
            if($notEmpty)
            {
                $sql  = "UPDATE `orders` SET `status` = 'sent'  WHERE '$orders_id' ";

                mysqli_query($conn , $sql);

                $success_message = "Order sent successfully";

                header('refresh:2 ; url=../home/index.php');  
            }else{
                $error_message = "Please Type orders Name";
            }

            require '../../function/messages.php';
        }


    ?>

<?php require '../inc/footer.php';  ?>



