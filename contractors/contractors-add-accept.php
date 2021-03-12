<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bauman-projekt";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$contractorn= $_POST['contractorname'];
$contractors= $_POST['contractorshortcut'];
$contractora= $_POST['contractoraddress'];

?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>kontrahenci</title>
  

    
   
</head>

<body>

</br>
</br>
</br>
<?php
	
     $sql = "INSERT INTO `contractors`(`id`, `name`, `Shortcut`, `address`) VALUES ('','$contractorn','$contractors','$contractora')";
	 echo ("Kontrahent dodany pomyślnie");

	  ?>
	  <center><input type="button"  value="ok" onclick="window.location.href='contractors.php'"></center>
	  <?php
	 $conn->close();
	 ?>
</body>
</html>