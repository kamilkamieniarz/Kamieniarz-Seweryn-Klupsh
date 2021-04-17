<?php
require_once("../connect.php");
$id = $_GET['id'];
$amount = $_GET['amount'];
$magazine = $_GET['magazine'];
$good_id = $_GET['good_id'];
$del = mysqli_query($conn,"DELETE FROM documents_goods WHERE id = '$id'");
$back = mysqli_query($conn,"UPDATE magazines_goods SET `amount` = amount + '$amount' WHERE `id_magazines`='$magazine' AND `id_goods`='$good_id'");
if($del && $back){
    mysqli_close($conn);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;	
}
else{echo "Błąd podczas usuwania towaru";}
?>