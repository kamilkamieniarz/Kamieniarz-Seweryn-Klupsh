<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bauman-projekt";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$magazinen= $_POST['magazinename'];
$magazines= $_POST['magazineshortcut'];
$magazined= $_POST['magazinedescription'];
$magazinet= $_POST['magazinestreet'];
$magazinen= $_POST['magazinehouse_number'];
$magazinean= $_POST['magazineapartment_number'];
$magazinec= $_POST['magazinezip_code'];
$magazinet= $_POST['magazinetown'];


?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>magazyn</title>
  

    
   
</head>

<body>

</br>
</br>
</br>
<?php
	
     $sql = "INSERT INTO `magazines`(`id`,`name`, `shortcut`, `description`, `street`, `house_number`, `apartment_number`, `zip_code`, `town`) VALUES ('','$magazinen','$magazines','$magazined','$magazinet','$magazinen','$magazinean','$magazinec','$magazinet')";
	 echo ("magazyn dodany pomyślnie");

	  ?>
	  <input type="button"  value="ok" onclick="window.location.href='magazine.php'">
	  <?php
	  if ($conn->query($sql) === TRUE) {
  
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
	 ?>
</body>
</html>