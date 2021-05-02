<?php
	session_start();
	require_once('../connect.php');
	if(!isset($_SESSION['logged_id'])){
		header('Location: ../index.php');
		exit();
	}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
	<link rel="icon" href="../images/karton.ico" type="image/x-icon"/>
    <title>Dokumenty</title>
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
		require_once('../header.php');
		echo "<a href='../stocks/stocks.php' class='effect effect-add document'>Dodaj dokument</a><br>";  
		/*Tutaj będzie wyszukiwarka*/
		$records = mysqli_query($conn,"select * from documents"); // fetch data from database
		$ile = mysqli_num_rows($records);  //ilosc wszystkich rekordow (nie stron !!)
		$na_strone = 6; //tu podajesz ile rekordow na stronie max.
		$stron = ceil ($ile / $na_strone);   //tutaj masz ilosc stron zaokraglanych w gore
		if (!isset($_GET['strona'])) $strona = 1; else $strona = (int)$_GET['strona'];
		$sql = mysqli_query($conn,"SELECT * FROM documents WHERE `value` !=0 LIMIT ".(($strona-1)*$na_strone).','.$na_strone); // tak odczytujesz
		echo '</br>Strona: <a href="?strona=1"> 1</a>';
		for ($i = 1; $i < $stron; $i++) echo ' <a href="?strona='.($i+1).'"> '.($i+1).'</a> ';  //tak wyswietlasz numery;
		echo '<table class="table table-striped table-hover text-center">
				<tr>	
					<th>Typ</th>
					<th>Nr</th>
					<th>Wartość</th>
					<th>Data utworzenia</th>					
					<th>Opcje</th>
				</tr>';
		while ($resultat=mysqli_fetch_array($sql)){
			echo "<tr>
					<td>".$resultat['type']."</td>
					<td>".$resultat['number']."</td>
					<td>".$resultat['value']." zł</td>
					<td>".$resultat['date']."</td>
					<td><a class='effect effect-edit download' href='documents-dowload.php?id=".$resultat['id']."'>Pobierz</a>
					<a class='effect effect-edit' href='documents-edit.php?id=".$resultat['id']."'>Edytuj</a>
					<a class='effect effect-delete' href='documents-delete.php?id=".$resultat['id']."'>Usuń</a></td>
				</tr>";
		}
		echo "</table>";
	?> 
</body> 
</html>