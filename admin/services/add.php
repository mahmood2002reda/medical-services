<?php require_once '../inc/header.php' ; ?>
 
<?php require_once '../../function/validate.php' ;?>





<?php    
if(isset($_POST['submit'])){

$name=$_POST['name'];

if(isNotEmpty($name)){
    if(checkless($name,3)){$sql= "INSERT INTO services (`serv_name`) VALUES ('$name')";
       
        $success_message = db_insert($sql);
    
    } 
    

else {
    $error_message="Please Type Correct serves";
}
}

else {
    $error_message= "Please Type serves Name";
}
}
?>

<?php require '../inc/menu.php';  ?>
<div class="col-sm-6 offset-sm-3 ">
    <?php require_once "../../function/messages.php"?>
        <h3 class="text-center p-3 bg-primary text-white">Add New service</h3>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label >Name Of service</label>
                <input type="text" name="name" class="form-control" >
            </div>
            
            <button type="submit" name="submit" class="btn btn-success">Save</button>
        </form>
    
    </div>


<?php require '../inc/footer.php';  ?>
    
</body>


   

