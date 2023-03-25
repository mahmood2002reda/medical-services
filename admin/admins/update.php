<?php require_once '../inc/header.php' ; ?>
<?php require '../../function/validate.php';  ?>

    <?php 

        if(isset($_POST['submit']))
        {
            $admin_id = $_POST['admin_id'];
            $name = sanitizeString($_POST['name']);
            $email = sanitizeString($_POST['email']);
               $email = sanitizeString($_POST['email']);
            $notEmpty = isNotEmpty($name);
          
            if($notEmpty)
            {
                $less = checkLess($name,3);
                if($less)
                {
                    $sql = "UPDATE admins SET `admin_name`='$name' WHERE `admin_id`='$admin_id' ";
                    $success_message = db_update($sql);
                    
                    $sql = "UPDATE admins SET `admin_email`='$email' WHERE `admin_id`='$admin_id' ";
                    $success_message = db_update($sql);
                    $sql = "UPDATE admins SET `admin_email`='$email' WHERE `admin_id`='$admin_id' ";
                    $success_message = db_update($sql);
                
                }
                else 
                {
                    $error_message = "Please Type Correct admin";
                }
            }
            else 
            {
                $error_message = "Please Type admin Name";
            }

            require '../../function/messages.php';
        }


    ?>

<?php require '../inc/footer.php';  ?>



