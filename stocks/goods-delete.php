<?php
require_once("../connect.php");
$id = $_GET['id'];
$amount = $_GET['amount'];
$magazine = $_GET['magazine'];
$good_id = $_GET['good_id'];
$type = $_GET['type'];
$del = mysqli_query($conn,"DELETE FROM documents_goods WHERE id = '$id'");
$back = mysqli_query($conn,"INSERT INTO `magazines_goods`( `id_magazines`, `id_goods`, `amount`) VALUES ($magazine,$good_id,$amount)");
if($del){
    if($type == 'wz'){
        if($back){}
    }
    mysqli_close($conn);
    header('Location:'.$_SERVER['HTTP_REFERER']);
}
else{echo "Błąd podczas usuwania towaru";}
?>