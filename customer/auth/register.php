<?php require_once '../../config.php'; ?>
<?php require_once '../../function/validate.php'; ?>



<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
  <!-- style CSS -->
  <link rel="stylesheet" href="../../assets/css/style.css">
  <!-- google font -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans&display=swap" rel="stylesheet">
  <title>Dashboard | Home Page</title>
</head>

<?php

if (isset($_POST['submit'])) {

  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  if (isNotEmpty($name) and isNotEmpty($email) and isNotEmpty($password)) {

    if (ValidEmail($email)) {

      if (!getRow("user", "user_email", $email)) {

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO user (`user_name`,`user_email`,`user_password`) /* query Sentence  will be paramter in db_insert  */
                VALUES ('$name','$email','$hashedPassword') ";

        $success_message = db_insert($sql);   // function in db.php

        $check = getRow('user','user_email',$email );

        $_SESSION['user_name']=$check['user_name'];

        $_SESSION['user_email']=$check['user_email'];

        $_SESSION['user_id']=$check['user_id'];

        header('refresh:3 ; url=../order/add.php');
        
      } else {

        $error_message = "email was used";

        header('refresh:3 ; url=register.php');
      }

    } else {

      $error_message = "please enter valid email";

      header('refresh:3 ; url=register.php');
    }
  } else {

    $error_message = "please fill all fields";

    header('refresh:3 ; url=register.php');
  }
  
  require_once '../../function/messages.php';
}


?>

<body style="background-image: url(../../assets/images/bg-1.jpg)">

  <div class="col-sm-6 offset-sm-3 border p-3">
    <h3 class="text-center p-3 bg-secondary text-grey">Add New account</h3>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <div class="form-group">
        <label>Name </label>
        <input type="text" name="name" class="form-control">
      </div>

      <div class="form-group">
        <label>Email </label>
        <input type="text" name="email" class="form-control">
      </div>

      <div class="form-group">
        <label>Password </label>
        <input type="password" name="password" class="form-control">
      </div>


      <div class="text-center text-lg-start mt-4 pt-2" style=" text-align:center">
        <button type="submit" name="submit" class="btn btn-outline-light btn-lg px-5" style="display: block;margin-left: auto;margin-right: auto; color:black;background-color:grey">Login</button>

      </div>
    </form>

  </div>


  <?php require_once '../inc/footer.php'; ?>

</body>