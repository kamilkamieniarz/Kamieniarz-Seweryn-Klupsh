<?php
require_once("../connect.php");
$id = $_GET['id'];
$del = mysqli_query($conn,"delete from documents_goods where id = '$id'");
if($del){
    mysqli_close($conn);
   

header('Location: ' . $_SERVER['HTTP_REFERER']);

    exit;	
}
else{echo "Error deleting record";}
?>