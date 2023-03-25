<?php require_once '../inc/header.php' ; ?>
<?php require '../../function/validate.php';  ?>

<?php  
if(isset($_GET['id']) )
{ 
    $row = getRow('city','city_id',$_GET['id']);
  
    $city_id = $row['city_id'];
}
else
{
    header("location:index.php");
}



?>

<?php require_once '../inc/menu.php' ; ?>

<div class="col-sm-6 offset-sm-3 border p-3">
        <h3 class="text-center p-3 bg-primary text-white">Edit City</h3>
        <form method="post" action="update.php" >
            <div class="form-group">
                <label >Name Of City</label>
                <input type="text" name="name" value="<?php echo($row['city_name']) ; ?>" class="form-control" >
                <input type="hidden" name="city_id" value="<?php echo $city_id; ?>" class="form-control" >
            </div>
            
            <button type="submit" name="submit" class="btn btn-success">Save</button>
        </form>

</div>

<?php require '../inc/footer.php';  ?>

</body>



