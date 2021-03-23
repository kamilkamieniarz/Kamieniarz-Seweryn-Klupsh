<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bauman-projekt";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$goodn= $_POST['goodname'];
$goodp= $_POST['goodproducer'];
$goodu= $_POST['good_unit_price'];
$goodm= $_POST['good_unit_of_measure'];


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
	
     $sql = "INSERT INTO `goods`(`id`, `name`, `producer`, `unit_price`, `unit_of_measure`, `quantity`) VALUES ('','$goodn','$goodp','$goodu','$goodm','0')";
	 echo ("Kontrahent dodany pomyślnie");

	  ?>
	  <input type="button"  value="ok" onclick="window.location.href='goods.php?strona=1.php'">
	  <?php
	  if ($conn->query($sql) === TRUE) {
  
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
	 ?>
</body>
</html>