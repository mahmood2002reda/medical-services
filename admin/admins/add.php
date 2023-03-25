<?php require_once '../inc/header.php'; ?>

<?php require_once '../../function/validate.php'; ?>

<?php

if (isset($_POST['submit'])) {

  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  if (isNotEmpty($name) and isNotEmpty($email) and isNotEmpty($password)) {

    if (ValidEmail($email)) {

      if (!getRow("admins", "admin_email", $email)) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO admins (`admin_name`,`admin_email`,`admin_password`) /* query Sentence  will be paramter in db_insert  */
                VALUES ('$name','$email','$hashedPassword') ";
        $success_message = db_insert($sql);   // function in db.php
      } else {
        $error_message = "email was used";
      }
    } else {
      $error_message = "please correct email";
    }
  } else {
    $error_message = "please fill all filde";
  }
 
}


?>

<?php require_once '../inc/menu.php'; ?>
<?php require_once '../../function/messages.php'; ?>

<div class="col-sm-6 offset-sm-3 border p-3">
  <h3 class="text-center p-3 bg-secondary text-grey">Add New Admin</h3>
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