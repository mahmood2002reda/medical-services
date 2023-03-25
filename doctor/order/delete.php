<?php


require '../inc/header.php';

  if(isset($_GET['order_id'])){

    $order_id = $_GET['order_id'];

    $order_delete_result = deleteRow('orders','orders_id', $order_id);

    if ($order_delete_result) {
        
        $success_message = 'message deleted successfully';

    
    } else {

        $error_message = 'something went wrong !';

    }
    
    require '../../function/messages.php';
    
    header("refresh:3; url=index.php"); 
    
   
}
   

