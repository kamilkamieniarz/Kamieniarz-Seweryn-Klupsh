<?php
	require_once('../connect.php');
	$producern= $_POST['producername'];
	$producers= $_POST['producershortcut'];
	$producerd= $_POST['producerdescription'];
	$producert= $_POST['producerstreet'];
	$producernip= $_POST['producerNIP'];
	$producern= $_POST['producerhouse_number'];
	$produceran= $_POST['producerapartment_number'];
	$producerc= $_POST['producerzip_code'];
	$producert= $_POST['producertown'];
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>Dodawanie Producenta</title>
</head>
<body>
	<?php
		$sql = "INSERT INTO `producers`(`id`,`name`, `shortcut`, `description`, `NIP`, `street`, `house_number`, `apartment_number`, `zip_code`, `town`) VALUES ('','$producern','$producers','$producerd','$producernip','$producert','$producern','$producern','$producerc','$producert')";
		echo ("Producent dodany pomyślnie");
	?>
	<input type="button"  value="ok" onclick="window.location.href='producers.php'">
	<?php
		if($conn->query($sql) === TRUE){}
		else{echo "Error: " . $sql . "<br>" . $conn->error;}
	?>
</body>
</html>