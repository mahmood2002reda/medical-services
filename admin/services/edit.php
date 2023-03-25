<?php require '../inc/header.php';  ?>
<?php require '../../function/validate.php';  ?>

<?php  
if(isset($_GET['service_id']) )
{ 
    $row = getRow('services','serv_id',$_GET['service_id']);
  
    $serv_id = $row['serv_id'];
}
else
{
    header("location:index.php");
}



?>

<?php require '../inc/menu.php';  ?>
<div class="col-sm-6 offset-sm-3 border p-3">
        <h3 class="text-center p-3 bg-primary text-white">Edit services</h3>
        <form method="post" action="serves/update.php" >
            <div class="form-group">
                <label >Name Of services</label>
                <input type="text" name="name" value="<?php echo($row['serv_name']) ; ?>" class="form-control" >
                <input type="hidden" name="serv_id" value="<?php echo $serv_id; ?>" class="form-control" >
            </div>
            
            <button type="submit" name="submit" class="btn btn-success">Save</button>
        </form>


<?php require '../inc/footer.php';  ?>
    
</body>

