<?php require_once '../inc/header.php' ; ?>
<?php require '../../function/validate.php';  ?>

    <?php 

        if(isset($_POST['submit']))
        {
            $city_id = $_POST['city_id'];
            $name = sanitizeString($_POST['name']);
            $notEmpty = isNotEmpty($name);
          
            if($notEmpty)
            {
                $less = checkLess($name,3);
                if($less)
                {
                    $sql = "UPDATE city SET `city_name`='$name' WHERE `city_id`='$city_id' ";
                    $success_message = db_update($sql);
                
                }
                else 
                {
                    $error_message = "Please Type Correct City";
                }
            }
            else 
            {
                $error_message = "Please Type City Name";
            }

            require '../../function/messages.php';
        }


    ?>


<?php require '../inc/footer.php';  ?>




   

