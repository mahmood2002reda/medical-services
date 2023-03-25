<?php

require '../inc/header.php';

  if(isset($_GET['admin_id'])){

    $delete_id = $_GET['admin_id'];

    $admin_delete_result = deleteRow('admins','admin_id', $delete_id);

    if ($admin_delete_result) {
        
        $success_message = 'admin deleted successfully';

    } else {

        $error_message = 'something went wrong !';

    }
    
    require '../../function/messages.php';
    
    header("refresh:3; url=index.php"); 
    
   
}
   

