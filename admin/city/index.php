<?php require_once '../inc/header.php' ; ?>
<?php require_once '../../function/validate.php' ;?>


<?php require_once '../inc/menu.php' ; ?>
<div class="col-sm-12">
        <h3 class="text-center p-3 bg-primary text-white">View All Cities</h3>
        <table class="table table-dark table-bordered">
            <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Action</th>
       
                </tr>
            </thead>
            <tbody>
                <?php $data = getRows('city'); $x=1;  ?>
                <?php foreach($data as $row){   ?>
                <tr class="text-center">
                    <td scope="row"><?php echo $x; ?></td>
                    <td class="text-center"> <?php echo $row['city_name'] ?>  </td>
                 
                    <td class="text-center">
                        <a href="edit.php?id=<?= $row['city_id'] ?>" class="btn btn-warning">Edit</a>
                        <a href="delete.php?city_id=<?= $row['city_id']; ?>" class="btn btn-danger delete" >Delete</a>
                    </td>
                </tr>
                <?php $x++; } ?>
               
            </tbody>
        </table>
</div>


<?php require '../inc/footer.php';  ?>
    
</body>


