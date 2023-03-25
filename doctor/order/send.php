<?php 
include '../inc/header.php';

    if(isset($_POST['submit'])){
        $doctor_id = $_SESSION['doctor_id'];
        
        $user_id = $_GET['user_id'];

        $order_id = $_GET['order_id'];

        $message = $_POST['message'];
        
        $sql = "INSERT INTO `doctor_user_messages`(`doctor_id`, `user_id`, `message`,`status`,`sender`) VALUES ('$doctor_id','$user_id','$message','not replied' , 'doctor')";

       $result = mysqli_query($conn,$sql);
       if($result){

        $update_message_sql = "UPDATE `orders` SET `pending`= '0' WHERE `orders_id` = '$order_id' ";
        
        mysqli_query($conn,$update_message_sql);

         $success_message = "Message sent successfully";
       }else{
         $error_message = "Something went wrong!" ;
       }

       include '../../function/messages.php';

       header('refresh:2 ; url=../home/index.php');

    }else{
        header("Location: ../home/index.php");
    }

?>
