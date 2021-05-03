<?php
	require_once("../connect.php");
	$goodn= $_POST['goodname'];
	$goodp= $_POST['goodproducer'];
	$goodu= $_POST['good_unit_price'];
	$goodm= $_POST['good_unit_of_measure'];
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>Towary</title>
	<!--css i bootstrap-->
	<link rel="stylesheet" href="../view/bootstrap.min.css">
	<link rel="stylesheet" href="../view/main.css" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="https://kit.fontawesome.com/168b28f506.js" crossorigin="anonymous"></script>
</head>
<body>
	<?php
		$sql = "INSERT INTO `goods`(`name`, `id_producer`, `unit_price`, `unit_of_measure`, `amount`) VALUES (,'$goodn','$goodp','$goodu','$goodm','0')";
		echo ("Towar dodany pomyślnie");
	?>
	<input type="button"  value="ok" onclick="window.location.href='goods.php?strona=1.php'">
	<?php
		if($conn->query($sql) === TRUE){}
		else{ echo "Error: " . $sql . "<br>" . $conn->error;}
	?>
</body>
</html>