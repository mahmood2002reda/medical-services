<?php require_once '../../config.php';?>


<?php
if(isset($_SESSION ['admin_name']) ){
header('location:../home/index.php');
}
?>
<?php require_once '../../function/validate.php';?>
<!doctype html>
<html lang="en" >
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css" >
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/style.css" >

    <title>Dashboard | Login</title>
<style>   .divider:after,
.divider:before {
content: "";
flex: 1;
height: 1px;
background: #eee;
}
.h-custom {
height: calc(100% - 73px);
}
@media (max-width: 450px) {
.h-custom {
height: 100%;
}
}</style>
</head>
<body style="background-image: url(../../assets/images/login-security.png)">


<?php 

if(isset($_POST['login'])){
    
    $password=$_POST['password'];
    $email=$_POST['email'];

    if(isNotEmpty($email) && isNotEmpty($password)){
      
      if(ValidEmail($email)){
            $check = getRow('admins','admin_email',$email ); //يجب التحقق من وحود البيانات

            if( $check){

                $check_password = password_verify($password,$check['admin_password']);
                
                if($check_password){

                    $_SESSION['admin_name']=$check['admin_name'];
                    $_SESSION['admin_email']=$check['admin_email'];
                    $_SESSION['admin_id']=$check['admin_id'];
                  header('Location:../home/index.php');

                }else{
                  $error_message= "incorrect password";
                }
                  
              }else{
                $error_message= "incorrect user name or password";
              }
      
          }else{
            $error_message= "Please enter valid email";
          }
      
    }else{
      $error_message= "please fill all fields";
    }
    
}


  ?> 
  <section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src=<?php echo"../../assets/images/21557419.jpg";?>
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
      <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST"  >
          
          <!-- Email input -->
          <div class="form-outline mb-4" style=" text-align:center">
          <?php  require '../../function/messages.php'; ?>          
            <label class="form-label" for="form3Example3" style="color:white; font-size: 20px; " >Email address : </label>

            <input type="text" name="email" id="form3Example3" class="form-control form-control-lg"
              placeholder="Enter a valid email address" />
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3" style=" text-align:center">
          <label class="form-label" for="form3Example4" style="color:white; font-size: 20px; ">Password :</label>
            <input type="password" name="password" id="form3Example4" class="form-control form-control-lg"
              placeholder="Enter password" />
            
          </div>

          

          <div class="text-center text-lg-start mt-4 pt-2"style=" text-align:center" >
            <button   type="submit" name="login" class="btn btn-outline-light btn-lg px-5" 
           style="display: block;margin-left: auto;margin-right: auto;">Login</button>
            
          </div>

        </form>
      </div>
    </div>
  </div>
  
</section>
 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../../assets/js/jquery-3.4.1.min.js" ></script>
    <script src="../../assets/js/popper.min.js" ></script>
    <script src="../../assets/js/bootstrap.min.js" ></script>


