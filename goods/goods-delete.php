<?php
require_once("../connect.php");
$id = $_GET['id'];
$del = mysqli_query($conn,"delete from goods where id = '$id'");
if($del){
    mysqli_close($conn);
    header("location:goods.php");
    exit;	
}
else{echo "Błąd podczas usuwania towaru";}
?>