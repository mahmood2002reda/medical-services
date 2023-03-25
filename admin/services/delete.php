<?php


require '../inc/header.php';

  if(isset($_GET['service_id'])){

    $delete_id = $_GET['service_id'];

    $service_delete_result = deleteRow('services','serv_id', $delete_id);

    if ($service_delete_result) {
        
        $success_message = 'service deleted successfully';
    
    } else {

        $error_message = 'something went wrong !';

    }
    
    require '../../function/messages.php';
    
    header("refresh:3; url=index.php"); 
    
   
}
   

