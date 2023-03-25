<?php require_once '../../config.php';?>
<?php require_once '../../function/validate.php' ;?>
<?php 

if(!isset($_SESSION ['doctor_name']) ){
header('location:login.php');
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

