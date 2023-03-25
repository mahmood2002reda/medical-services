<?php  require '../../config.php';  ?>
<?php 
if(!isset( $_SESSION['admin_email']) ){
header('location:../auth/login.php');
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css" >
    <!-- style CSS -->
    <link rel="stylesheet" href="../../assets/css/style.css" >
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans&display=swap" rel="stylesheet">
    <title>Dashboard | Home Page</title>
  </head>




  