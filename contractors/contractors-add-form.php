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
    <title>Dodawanie kontrahenta</title>
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
		<a href='contractors.php' class='effect effect-add back'>Wróć</a><br>
		<h1 class="page-title text-center">Dodaj kontrahtenta</h1>
	</header>	
	
	<form name="form1" method="post" action='contractors-add-accept.php' class='text-center'>
		<p>Nazwa: </p> 
		<input type="text" name="contractorname" size="150" placeholder="KowCem betorniarnia Sp. z o.o." require>
		<p>Skrót: </p> 
		<input type="text" name="contractorshortcut" size="10" placeholder="KowBud" require></br>
		<p>Opis: </p>
		<input type="text" name="contractorshortcut" size="10" placeholder="KowBud" require></br>
		<p>NIP: </p> 	
		<input type="text" name="contractorNIP" size="50" placeholder="1111111111"></br>
		<p>Ulica: </p> 
		<input type="text" name="contractorstreet" size="50" placeholder="Główna" require></br>
		<p>Nr domu: </p> 
		<input type="text" name="contractorhouse_number" size="5" placeholder="12/A" require></br>
		<p>Nr mieszkania: </p> 
		<input type="text" name="contractorapartment_number" size="5" placeholder="" ></br>
		<p>Kod pocztowy: </p> 
		<input type="text" name="contractorzip_code" size="15" placeholder="64-100" require></br>
		<p>Miejscowość: </p> 
		<input type="text" name="contractortown" size="50" placeholder="Leszno" require></br>
		</br>
			<input type="submit" name="update" class='btn btn-primary' value="Dodaj">		
		</form>
</body>
</html>