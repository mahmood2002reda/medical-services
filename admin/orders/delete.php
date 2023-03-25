<?php


require '../inc/header.php';

  if(isset($_GET['order_id'])){

    $delete_id = $_GET['order_id'];

    $order_delete_result = deleteRow('orders','orders_id', $delete_id);

    if ($order_delete_result) {
        
        $success_message = 'order deleted successfully';

    
    } else {

        $error_message = 'something went wrong !';

    }
    
    require '../../function/messages.php';
    
    header("refresh:3; url=index.php"); 
    
   
}
   

