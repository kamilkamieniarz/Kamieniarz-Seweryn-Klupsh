<?php

$db = mysqli_connect("localhost","root","","bauman-projekt");

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}

$id = $_GET['id']; // get id through query string

$del = mysqli_query($db,"delete from contractors where id = '$id'"); // delete query

if($del)
{
    mysqli_close($db); // Close connection
    header("location:contractors.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>