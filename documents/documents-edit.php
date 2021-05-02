<?php


require_once('../connect.php');
if(!$conn)
{
    die("Connection failed: " . mysqli_connect_error());
}
$id = $_GET['id']; // get id through query string
$sql = mysqli_query($conn,"SELECT `type` FROM `documents` WHERE id = '$id'");
$resultat = mysqli_fetch_array($sql);


	if($resultat['type']=='PZ')
	{
		  header("location:../stocks/PZ-add-goods.php?id=".$id);
	}
	if($resultat['type']=='WZ')
	{
		  header("location:../stocks/WZ-add-goods.php?id=".$id);
	}
	if($resultat['type']=='PM')
	{
		 header("location:../stocks/PM-add-goods.php?id=".$id);
	}
    mysqli_close($conn); // Close connection
    exit;	


?>