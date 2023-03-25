<?php require_once '../inc/header.php' ;?>

<?php require_once '../../function/db.php' ;?>

<?php require_once '../inc/menu.php' ;?>
<?php
    if(isset($_GET['doctor_id'])){
        $doctor_id = $_GET['doctor_id'];
        $message_id = $_GET['message_id'];
        $user_row = getRow('user','user_email',$_SESSION['user_email']);
        $user_id = $user_row['user_id'];
    }else{
        header("Location : index.php");
    }
?>
<div class="col-sm-6 offset-sm-3 border p-3">

        <h3 class="text-center p-3 bg-primary text-white">Send reply</h3>
        <form method="post" action="send.php?doctor_id=<?=$doctor_id?>&user_id=<?=$user_id?>&message_id=<?=$message_id?>" >
            <div class="form-group">
                <label >Reply</label>
                <textarea name="message" class="form-control" id="" cols="30" rows="10"></textarea>
            
                <br>
            <button type="submit" name="submit" class="btn btn-success">send</button>
        </form>


<?php require_once '../inc/footer.php' ;?>









