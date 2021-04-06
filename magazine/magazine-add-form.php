<?php
	session_start();
	require_once('../connect.php');
	if (!isset($_SESSION['logged_id'])) {
		header('Location: index.php');
		exit();
	}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
	<link rel="icon" href="../images/karton.ico" type="image/x-icon"/>
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
	<header class="page-header">
		<h1 class="page-title">Dodaj magazyn</h1>
		<a href='magazine.php' class='effect effect-add back'>Wróć</a><br>
	</header>	
	
	<form name="form1" method="post" action='magazine-add-accept.php'>
		<p>Nazwa:</p> <input type="text" name="magazinename" size="150" placeholder="KowCem betorniarnia Sp. z o.o." require>
		<p>Skrót:</p> <input type="text" name="magazineshortcut" size="10" placeholder="KowBud" require></br>
		<p>Opis:</p> <input type="text" name="magazinedescription" size="50" placeholder="Materiały budowlane"></br>
		<p>Ulica:</p> <input type="text" name="magazinestreet" size="50" placeholder="Główna" require></br>
		<p>Nr domu:</p> <input type="text" name="magazinehouse_number" size="5" placeholder="12/A" require></br>
		<p>Nr mieszkania:</p> <input type="text" name="magazineapartment_number" size="5" placeholder="" ></br>
		<p>Kod pocztowy:</p> <input type="text" name="magazinezip_code" size="15" placeholder="64-100" require></br>
		<p>Miejscowość:</p> <input type="text" name="magazinetown" size="50" placeholder="Leszno" require></br>
		</br>
		<input type="submit" name="update" value="Dodaj"></left>		
	</form>
</body>
</html>