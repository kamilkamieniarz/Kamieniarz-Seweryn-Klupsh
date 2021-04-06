<?php
require_once('../connect.php');
$id = $_GET['id']; // get id through query string
$del = mysqli_query($conn,"delete from magazines where id = '$id'"); // delete query
if($del){
    mysqli_close($conn); // Close connection
    header("location:magazine.php"); // redirects to all records page
    exit;	
}
else{
    echo "Nie udało się usunąć magazynu"; // display error message if not delete
}
?>