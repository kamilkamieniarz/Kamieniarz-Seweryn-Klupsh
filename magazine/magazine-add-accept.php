<?php
	require_once('../connect.php');
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
    <title>Magazyn</title> 
</head>
<body>
	<?php
		$sql = "INSERT INTO `magazines`(`id`,`name`, `shortcut`, `description`, `street`, `house_number`, `apartment_number`, `zip_code`, `town`) VALUES ('','$magazinen','$magazines','$magazined','$magazinet','$magazinen','$magazinean','$magazinec','$magazinet')";
		echo ("Dodano magazyn");
		?>
			<input type="button" value="Dalej" onclick="window.location.href='magazine.php'">
		<?php
		if($conn->query($sql) === TRUE) {} 
		else{
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	?>
</body>
</html>