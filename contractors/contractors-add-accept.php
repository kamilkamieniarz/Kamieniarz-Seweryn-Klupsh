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
$contractord= $_POST['contractordescription'];
$contractorst= $_POST['contractorstreet'];
$contractorhn= $_POST['contractorhouse_number'];
$contractoran= $_POST['contractorapartment_number'];
$contractorzc= $_POST['contractorzip_code'];
$contractort= $_POST['contractortown'];


?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>Kontahenci</title>
  

    
   
</head>

<body>

</br>
</br>
</br>
<?php
	
     $sql = "INSERT INTO `contractors`(`name`, `shortcut`, `description`, `street`, `house_number`, `apartment_number`, `zip_code`, `town`) VALUES ('$contractorn','$contractors','$contractord','$contractorst','$contractorhn','$contractoran','$contractorzc','$contractort')";
	 echo ("Kontrahent dodany pomyślnie");

	  ?>
	  <input type="button"  value="ok" onclick="window.location.href='contractors.php'">
	  <?php
	 $conn->close();
	 ?>
</body>
</html>