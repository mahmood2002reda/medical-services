<?php require_once '../inc/header.php'?>

<?php require '../../function/validate.php';  ?>

<?php  
    if(isset($_GET['doctor_id']) )
    { 
        $row = getRow('doctors','doctor_id',$_GET['doctor_id']);

        $doctor_id = $row['doctor_id'];
    }
    else
    {
         header("location:index.php");
    }

?>

<?php require_once '../inc/menu.php' ; ?>
<div class="col-sm-6 offset-sm-3 border p-3">
        <h3 class="text-center p-3 bg-primary text-white">Edit doctor</h3>
        <form method="post" action="../../doctor/update.php">
            <div class="form-group">
                <label >Name Of doctor</label>
                <input type="text" name="name" value="<?php echo($row['doctor_name']) ; ?>" class="form-control" >
                <br>
                <input type="text" name="email" value="<?php echo($row['doctor_email']) ; ?>" class="form-control" >
                <br>
                <input type="text" name="medical_specialty" value="<?php echo($row['medical_specialty']) ; ?>" class="form-control" >
                <input type="hidden" name="doctor_id" value="<?php echo $doctor_id; ?>" class="form-control" >
            </div>
            
            <button type="submit" name="submit" class="btn btn-success">Save</button>
        </form>


<?php require '../inc/footer.php';  ?>


</body>
