<?php require_once '../inc/header.php' ;?>


<?php
    if(isset($_POST['submit'])){
        $doctor_id = $_GET['doctor_id'];

        $user_id = $_GET['user_id'];

        $message_id = $_GET['message_id'];
        
        $message = $_POST['message'];

        $sql = "INSERT INTO `doctor_user_messages`(`doctor_id`, `user_id`, `message`,`status`,`sender`) VALUES ('$doctor_id','$user_id','$message','not replied' , 'user')";

       $result = mysqli_query($conn,$sql);
       if($result){
        $update_message_sql = "UPDATE `doctor_user_messages` SET `status`='replied' WHERE `message_id` = '$message_id' ";
        
        mysqli_query($conn,$update_message_sql);
        
         $success_message = "Reply sent successfully";
       }else{
         $error_message = "Something went wrong!" ;
       }

       include '../../function/messages.php';

       header('refresh:2 ; url=../home/index.php');
    }else{
        header("Location : index.php");
    }
?>

<?php require_once '../inc/footer.php' ;?>









