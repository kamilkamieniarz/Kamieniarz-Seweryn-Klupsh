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
    <title>Stany Magazynowe</title>
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
        //Tutaj trzeba połączyć się z tabelą magazynów i z tabelą towarów żeby wyświetlić który magazyn ma jakie i ile towarów
		//SELECT goods.name ,magazines_goods.amount ,magazines.shortcut FROM magazines_goods LEFT OUTER JOIN goods ON goods.id = magazines_goods.id_goods LEFT OUTER JOIN magazines ON magazines.id = magazines_goods.id_magazines WHERE magazines_goods.amount != '0'
		echo "<a href='pz.php' class='effect effect-add pz'>Przyjęcie towaru</a>
			<a href='wz.php' class='effect effect-add wz'>Wydanie towaru </a>
			<a href='' class='effect effect-add shift'>Przesunięcie</a><br>
			<form name='form1' method='post' action=''>
			<p>Magazyn:  <select name='choosemagasin'>";
		$sql = mysqli_query($conn,"SELECT * FROM `magazines`");
		while ($row = mysqli_fetch_array($sql)){echo "<option value='".$row['id']."'>".$row['shortcut']."</option>";}
		echo "</select></p><input type='submit' name='update' value='Flitruj'></form></br>";
		if(isset($_POST['choosemagasin']) == TRUE){
			$magazyn=$_POST['choosemagasin'];
			$records = mysqli_query($conn,"select * from magazines_goods where magazines_goods.amount != '0' AND magazines_goods.id_magazines = '$magazyn'"); // fetch data from database
			$ile = mysqli_num_rows($records);  //ilosc wszystkich rekordow (nie stron !!)
			$na_strone = 6; //tu podajesz ile rekordow na stronie max.
			$stron = ceil ($ile / $na_strone);   //tutaj masz ilosc stron zaokraglanych w gore
			if (!isset($_GET['strona'])) ($strona = 1); 
			else ($strona = (int)$_GET['strona']);
			$sql = mysqli_query($conn,"SELECT goods.name,goods.unit_price, goods.unit_of_measure ,magazines_goods.amount ,magazines.shortcut FROM magazines_goods LEFT OUTER JOIN goods ON goods.id = magazines_goods.id_goods LEFT OUTER JOIN magazines ON magazines.id = magazines_goods.id_magazines WHERE magazines_goods.amount != '0'  AND magazines_goods.id_magazines = '$magazyn' LIMIT ".(($strona-1)*$na_strone).','.$na_strone);	// tak odczytujesz;
			echo "Strona: <a href='?strona=1' style='color:#00F !important;'> 1</a> ";
			for ($i = 1; $i < $stron; $i++) {echo '<a href="?strona='.($i+1).'"> '.($i+1).'</a>';}  //tak wyswietlasz numery;
		}				
		echo "<table class='table table-striped table-hover'>
				<tr>	
					<th>Nazwa</th>						
					<th>Ilość</th>
					<th>Cena jednostkowa</th>
					<th>Całkowita wartość</th>
				</tr>";
		while ($resultat=mysqli_fetch_array($sql)){
			echo "<tr>
					<td>".$resultat['name']."</td>
					<td>".$resultat['amount']." ".$resultat['unit_of_measure']."</td>
					<td>".$resultat['unit_price']." zł</td>
					<td>".$resultat['amount']*$resultat['unit_price']." zł</td>
				</tr>";
		}
	?>	  
</body> 
</html>