<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "medical_services";   

$conn = mysqli_connect($server,$username,$password,$db); /// connection way

if(!$conn)
{
    die ( "Error In Connection : " . mysqli_connect_error());
    
}
function db_insert($sql)
{
    global $conn;
    $result = mysqli_query($conn,$sql); // function to use to send query to database
    if($result)
    {
        return "Added Success";
    }
    return false;
}

//get row from database // check email is found or not in database
function getRow($table,$field,$value){

global $conn ;
$sql="SELECT * FROM `$table` WHERE `$field`='$value' ";


$result =mysqli_query($conn,$sql);
if ($result){


    $rows=[];
    if (mysqli_num_rows($result)>0) { // (عدد الصفوف )result تحقق من ان  بها بيانات
        $rows[]= mysqli_fetch_assoc($result); // في المصفوفة result رجع القيم الي جاية من 
        return $rows[0];
    }
   
}

return false ;
}
function getRows($table){

    global $conn ;
    $sql="SELECT * FROM `$table`";
    
    $result =mysqli_query($conn,$sql);
    if ($result){
    
    
        $rows=[];
        if (mysqli_num_rows($result)>0) { 
        while($row=mysqli_fetch_assoc($result)) {

            $rows[]=$row;
    }
        
        }
    }
    
    return $rows ;
}

function getRowsWithJoin($table){

    global $conn ;
    $sql="SELECT * FROM `$table`";
    
    $result =mysqli_query($conn,$sql);
    if ($result){
    
    
        $rows=[];
        if (mysqli_num_rows($result)>0) { 
        while($row=mysqli_fetch_assoc($result)) {

            $rows[]=$row;
    }
        
        }
    }
    
    return $rows ;
}

    function db_update($sql)
{
    global $conn;
    $result = mysqli_query($conn,$sql);
    if($result)
    {
        return "Updated Success";
    }
    return false;
}



function limit($table){

    global $conn ;
    $sql="SELECT * FROM `$table` LIMIT 3";
    
    $result =mysqli_query($conn,$sql);
    if ($result){
    
    
        $rows=[];
        if (mysqli_num_rows($result)>0) { 
        while($row=mysqli_fetch_assoc($result)) {

            $rows[]=$row;
    }
        
        }
    }
    
    return $rows ;
    }

    function show($table,$feild,$value){
        global $conn ;
        $sql = "SELECT * FROM `$table` WHERE `$feild`='$value'";

        $result= mysqli_query( $conn, $sql);
        if ($result){

            $rows=[];
            if (mysqli_num_rows($result)>0) { // (عدد الصفوف )result تحقق من ان  بها بيانات
                $rows[]= mysqli_fetch_assoc($result); // في المصفوفة result رجع القيم الي جاية من 
            print_r($rows[0]) ;
            }

        }

     
    }

    function deleteRow( $table , $fieldId , $id){
       global $conn;

       $sql = "DELETE FROM `$table` WHERE `$fieldId` = '$id' ";

       $delete_result = mysqli_query($conn , $sql);

       return $delete_result;
    }