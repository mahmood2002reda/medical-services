<?php require '../inc/header.php';  ?>
<?php require '../../function/validate.php';  ?>




    <?php 

        if(isset($_POST['submit']))
        {
            $serv_id = $_POST['serv_id'];
            $name = sanitizeString($_POST['name']);
            $notEmpty = isNotEmpty($name);
          
            if($notEmpty)
            {
                $less = checkLess($name,3);
                if($less)
                {
                    $sql = "UPDATE services SET `serv_name`='$name' WHERE `serv_id`='$serv_id' ";
                    $success_message = db_update($sql);
                
                }
                else 
                {
                    $error_message = "Please Type Correct services";
                }
            }
            else 
            {
                $error_message = "Please Type City services";
            }

            require '../../function/messages.php';
        }


    ?>

<?php require '../inc/footer.php';  ?>

    
</body>


   


   

