<?php require_once '../inc/header.php' ; ?>
<?php require '../../function/validate.php';  ?>

<?php  
if(isset($_GET['id']) )
{ 

    $sql = "SELECT * FROM 
    orders o
    INNER JOIN 
    user u ON u.user_email = o.orders_email
    WHERE `orders_id` = '$_GET[id]' ";
    
    $sql_run = mysqli_query($conn , $sql); 

    $row = mysqli_fetch_assoc($sql_run);
  
    $orders_id = $row['orders_id'];
}
else
{
    header("location:index.php");
}

?>
<?php require '../inc/menu.php';  ?>
<div class="col-sm-6 offset-sm-3 border p-3">
        <h3 class="text-center p-3 bg-primary text-white">Send orders</h3>
        <form method="post" action="update.php" >
            <div class="form-group">
                <label >Customer name</label>
                <input type="text" name="name" value="<?= $row['user_name'] ?>" class="form-control" >
                <br>
                
                <br>
                <label >Note Of orders</label>
                <textarea name="notes" class="form-control" id="" cols="30" rows="10"><?= $row['orders_notes'] ?></textarea>
            
                <br>
                <input type="hidden" name="orders_id" value="<?= $orders_id; ?>" class="form-control" >
                 
            
            </div>
            
            <button type="submit" name="submit" class="btn btn-success">send</button>
        </form>


<?php require '../inc/footer.php';  ?>

