<?php


require '../inc/header.php';

  if(isset($_GET['message_id'])){

    $message_id = $_GET['message_id'];

    $message_delete_result = deleteRow('doctor_user_messages','message_id', $message_id);

    if ($message_delete_result) {
        
        $success_message = 'message deleted successfully';

    
    } else {

        $error_message = 'something went wrong !';

    }
    
    require '../../function/messages.php';
    
    header("refresh:3; url=index.php"); 
    
   
}
   

