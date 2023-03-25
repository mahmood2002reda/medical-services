
<?php 
   
?>

<?php require '../../function/validate.php';  ?>
<?php require_once '../inc/header.php';?>

<?php require_once '../inc/menu.php';?>
   
    <div class="cont-main" style="background:url(../../assets/images/bg-1.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">

                <?php 
                if (isset($_POST['submit'])) 
                { 

                    $mobile = $_POST['mobile'];
                    $email = $_SESSION['user_email'];
                    $notes = sanitizeString($_POST['notes']); 
                    $service = $_POST['service'];
                    $city = $_POST['city'];
                    $medical_specialty =$_POST['doctors'];
                    $status = "not sent" ;
                   
                   
                  
                    
                    if (isNotEmpty($mobile)) 
                    {
                        
                        $sql  = "INSERT INTO orders (`orders_mobile`,`orders_email`,`orders_notes`,`orders_serve_id`,`orders_city_id`,`doctor_major` , `status`, `pending`)
                            VALUES ('$mobile','$email','$notes','$service','$city','$medical_specialty' , '$status' , '1' )
                         ";
                         $success_message = db_insert($sql);
                    }
                    else 
                    {
                        $error_message = "Please Type Your Name And Your Mobile";
                    }      
                    
                }
        ?>

services


                <form class="row" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="mt-5" >
                    <?php require '../../function/messages.php'; ?>
                    <div class="col-sm-6 ">
                        <div class="form-group mt-3">

                            <label for="serv" class="font-1">Choose Service</label>
                            <select name="service" id="serv" class="form-control font-1">
                                <?php $data = getRows('services');  $x=1; ?>
                                <?php foreach($data as $row){   ?>
                                <option value="<?php echo $row['serv_id']; ?>">
                                    <?php echo $row['serv_name']; ?>
                                </option>
                                <?php } ?> 
                            </select>
                            
                        </div>
                    </div>


                    <div class="col-sm-6 ">
                        <div class="form-group mt-3">

                            <label for="serv" class="font-1">Choose City</label>
                            <select name="city" id="serv" class="form-control font-1">
                                <?php $dataCity = getRows('city');  $x=1; ?>
                                <?php foreach($dataCity as $row){   ?>
                                <option value="<?php echo $row['city_id']; ?>">
                                    <?php echo $row['city_name']; ?>
                                </option>
                                <?php } ?> 
                            </select>
                            
                        </div>
                    </div>
                    <div class="col-sm-6 ">
                        <div class="form-group mt-3">

                            <label for="serv" class="font-1">Choose specialty</label>
                            <select name="doctors" id="serv" class="form-control font-1">
                                <?php $dataCity = getRows('doctors');  $x=1; ?>
                                <?php foreach($dataCity as $row){   ?>
                                <option value="<?php echo $row['doctor_id']; ?>">
                                    <?php echo $row['medical_specialty']; ?>
                                </option>
                                <?php } ?> 
                            </select>
                            
                        </div>
                    </div>


                    

                  

                    <div class="col-md-4 col-sm-12">
                        <div class="form-group ">

                            <label for="serv" class="font-1">Type Your Mobile *</label>
                            <input type="text" name="mobile"  class="form-control font-1 bg-base">
                            
                        </div>
                    </div>
                    



                    <div class="col-sm-12">
                        <div class="form-group">

                            <label for="serv" class="font-1">Type Notes</label>
                            <textarea name="notes"  class="form-control font-1 bg-base"  rows="5"></textarea>
                            
                        </div>
                    </div>



                    
                    <div class="col-sm-12">
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-success form-control">Send</button>
                            <button type="button" class="btn btn-outline-danger" style="position: relative;top: 10px;left: 46.5%;"> <a class="nav-link"  href="../auth/logout.php" stule="border:1" >Logout</a></button>
                        </div>
                    </div>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
   
                

    <?php require_once '../inc/footer.php'  ;?>
  </body>
</html>