<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bauman-projekt";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$producern= $_POST['producername'];
$producers= $_POST['producershortcut'];
$producerd= $_POST['producerdescription'];
$producert= $_POST['producerstreet'];
$producern= $_POST['producerhouse_number'];
$produceran= $_POST['producerapartment_number'];
$producerc= $_POST['producerzip_code'];
$producert= $_POST['producertown'];


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
	
     $sql = "INSERT INTO `producers`(`id`,`name`, `shortcut`, `description`, `street`, `house_number`, `apartment_number`, `zip_code`, `town`) VALUES ('','$producern','$producers','$producerd','$producert','$producern','$producern','$producerc','$producert')";
	 echo ("Kontrahent dodany pomyślnie");

	  ?>
	  <input type="button"  value="ok" onclick="window.location.href='producers.php'">
	  <?php
	  if ($conn->query($sql) === TRUE) {
  
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
	 ?>
</body>
</html>