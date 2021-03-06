<?php
	session_start();
	require_once('../connect.php');
	if (!isset($_SESSION['logged_id'])) {
		header('Location: index.php');
		exit();
	}
	require_once('../header.php');
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
	<link rel="icon" href="../images/karton.ico" type="image/x-icon"/>
    <title>Dodaj Towar</title>
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
	<header class="page-header">
		<a href='goods.php' class='effect effect-add back'>Wróć</a><br>
		<h1 class="page-title text-center">Dodaj Towar</h1>
	</header>	

	<div class="container d-flex justify-content-center bg-light">
	<form name="form1" method="post" action='goods-add-accept.php' class= "col-12 " 
		<p>Nazwa:</p> <input type="text" name="goodname" size="100" class="mb-2" require>
		<p>Producent:</p> <select class="mb-2" name="goodproducer">
		<?php 
			$sql = mysqli_query($conn,"SELECT * FROM `producers`");
			while ($row = mysqli_fetch_array($sql)){
				echo "<option value='".$row['id']."'>".$row['name']."</option>";
			}
		?> 
		</select>
		<p>Cena jednostkowa:</p> 
		<input type="number" step=".01" name="good_unit_price" size="14" class="mb-2"  require>
		<p>Jednostka miary:</p> 
		<select name="good_unit_of_measure" class="mb-2" require>
			<option>kg</option>
			<option>g</option>
			<option>m</option>
			<option>szt</option>
			<option>opakowanie</option>
			<option>szklanki</option>
		</select>
		</br>
		<input type="submit" name="update" class="btn btn-primary m-2" value="Dodaj">		
	</form>
	</div>
</body>
</html>