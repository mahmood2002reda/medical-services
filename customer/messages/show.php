<?php require_once '../inc/header.php' ;?>

<?php require_once '../inc/menu.php' ;?>
<?php
    if(isset($_GET['message_id'])){
        $message_id = $_GET['message_id'];

        $sql = "SELECT `message` FROM doctor_user_messages WHERE `message_id` = '$message_id' ";

        $sql_run = mysqli_query($conn,$sql);

        if($sql_run){
            $row = mysqli_fetch_assoc($sql_run);
        }else{
            header("Location : index.php");
        }
    }else{
        header("Location : index.php");
    }
?>
<div class="col-sm-12">
       <div class="card">
            <h1 class="card-header text-warning text-center">
                Doctor message 
            </h1>
            <div class="card-body">
                <p><?=$row['message']?></p>
            </div>
       </div>
</div>


<?php require_once '../inc/footer.php' ;?>









