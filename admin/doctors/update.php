<?php require '../inc/header.php';  ?>
<?php require '../../function/validate.php';  ?>



    
<?php 

if(isset($_POST['submit']))
{
    $doctor_id = $_POST['doctor_id'];
    $name = sanitizeString($_POST['name']);
    $email = sanitizeString($_POST['email']);
       $medical_specialty = sanitizeString($_POST['medical_specialty']);
    $notEmpty = isNotEmpty($name);
  
    if($notEmpty)
    {
        $less = checkLess($name,3);
        if($less)
        {
            $sql = "UPDATE doctors SET `doctor_name`='$name' WHERE `doctor_id`='$doctor_id' ";
            $success_message = db_update($sql);
            
            $sql = "UPDATE doctors SET `doctor_email`='$email' WHERE `doctor_id`='$doctor_id' ";
            $success_message = db_update($sql);
            $sql = "UPDATE doctors SET `medical_specialty`='$medical_specialty ' WHERE `doctor_id`='$doctor_id' ";
            $success_message = db_update($sql);
        
        }
        else 
        {
            $error_message = "Please Type Correct doctor";
        }
    }
    else 
    {
        $error_message = "Please Type doctor Name";
    }

    require '../../function/messages.php';
}


?>


<?php require '../inc/footer.php';  ?>







   

