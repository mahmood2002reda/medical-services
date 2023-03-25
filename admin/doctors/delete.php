<?php

require '../inc/header.php';

  if(isset($_GET['doctor_id'])){

    $delete_id = $_GET['doctor_id'];

    $doctor_delete_result = deleteRow('doctors','doctor_id', $delete_id);

    if ($doctor_delete_result) {
        
        $success_message = 'doctor deleted successfully';

    } else {

        $error_message = 'something went wrong !';

    }
    
    require '../../function/messages.php';
    
    header("refresh:2; url=index.php"); 
    
   
}
   

