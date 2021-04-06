<?php
    require_once('../connect.php');
    $id = $_GET['id'];
    $del = mysqli_query($conn,"delete from contractors where id = '$id'");
    if($del){
        mysqli_close($conn);
        header("location:contractors.php");
        exit;	
    }
    else{echo "Error deleting record";}
?>