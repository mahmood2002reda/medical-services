<?php

require '../inc/header.php';

  if(isset($_GET['city_id'])){

    $delete_id = $_GET['city_id'];

    $city_delete_result = deleteRow('city','city_id', $delete_id);

    if ($city_delete_result) {
        
        $success_message = 'city deleted successfully';

    
    } else {

        $error_message = 'something went wrong !';

    }
    
    require '../../function/messages.php';
    
    header("refresh:3; url=index.php"); 
    
   
}
   

