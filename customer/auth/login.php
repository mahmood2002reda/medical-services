<?php require_once '../../config.php';?>

<?php
if(isset($_SESSION ['user_name']) ){
  header('location:../order/index.php');
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
    <link rel="stylesheet" href="../../css/style.css" >

    <title>Dashboard | Login</title>
<style>
   
.divider:after,
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
}

</style>
</head>

<body style="background-image: url(../../assets/images/vector-abstract-digital-technology-background-with-concept-security-login_178863-212.webp);    background-size: cover">


<?php 

if(isset($_POST['login'])){
    
    $password=$_POST['password'];
    $email=$_POST['email'];

if(isNotEmpty($email) && isNotEmpty($password)){
  
   if(ValidEmail($email)){
        $check = getRow('user','user_email',$email ); //يجب التحقق من وحود البيانات

        if($check){
            $check_password = password_verify($password,$check['user_password']);

            if($check_password){

                $_SESSION['user_name']=$check['user_name'];
                $_SESSION['user_email']=$check['user_email'];
                $_SESSION['user_id']=$check['user_id'];
              
              header('location:../home/index.php');
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
       
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
      <form method="POST"  >
          
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

                <button type="submit" name="login" class="btn btn-outline-light btn-lg px-5" 
                    style="display: block;margin-left: auto;margin-right: auto;">
                    Login
                </button>

              <button type="button" class="btn btn-outline-danger" style="position: relative;top: 10px;left: 40.5%;"> 
                <a class="nav-link"  href="register.php" stule="border:1" >
                    Create new
                </a>
              </button>

          </div>

        </form>
      </div>
    </div>
  </div>



 </section>
<?php require_once 'inc/footer.php'  ;?>  

</body>




