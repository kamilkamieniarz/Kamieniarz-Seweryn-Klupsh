<?php

$db = mysqli_connect("localhost","root","","bauman-projekt");

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}
$sql = mysqli_query($conn,"SELECT `type` FROM `documents` WHERE id = '$id'");
$type=$_POST['type'];
$id = $_GET['id']; // get id through query string

$del = mysqli_query($db,"delete from documents where id = '$id'");
$del = mysqli_query($db,"DELETE FROM `documents_goods` WHERE `id_documents`='$id'");// delete query

if($del)
{
	if($type='PZ')
	{
		//obliczanie stanu
	}
	if($type='WZ')
	{
		//obliczanie stanu
	}
	if($type='PM')
	{
		//obliczanie stanu
	}
    mysqli_close($db); // Close connection
    header("location:documents.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>