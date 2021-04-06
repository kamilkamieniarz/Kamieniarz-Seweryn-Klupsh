<?php
require_once('../connect.php');
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
	<?php
		$sql = "INSERT INTO `contractors`(`id`,`name`, `shortcut`, `description`, `street`, `house_number`, `apartment_number`, `zip_code`, `town`) VALUES ('','$contractorn','$contractors','$contractord','$contractorst','$contractorhn','$contractoran','$contractorzc','$contractort')";
		echo ("Kontrahent dodany pomyślnie");
	?>
		<input type="button"  value="ok" onclick="window.location.href='contractors.php'">
	<?php
		if($conn->query($sql) === TRUE){}
		else{echo "Error: " . $sql . "<br>" . $conn->error;}
	?>
</body>
</html>