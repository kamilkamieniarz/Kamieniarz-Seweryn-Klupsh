<?php
	session_start();
	require_once('../connect.php');
	if(!isset($_SESSION['logged_id'])){
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
  	<?php
	
		require_once('../header.php');
		echo "<div class='text-center'><a href='goods-add-form.php' class='effect effect-add goods'>Dodaj Towar</a></div><br>";
		?>
		<form method="Get" class='text-center'>
		 <input type="text" name="word" size="30">
		 <input type="submit" name="submit" value="Szukaj">		
		 </form>
		<?php
		
if (isset($_GET['submit'])){


	$keyword = "";
	if(isset($_GET['word'])) {
	   $keyword = $_GET['word'];
	 
	}
	
	

	$na_strone = 6; //tu podajesz ile rekordow na stronie max.	
	if (!isset($_GET['strona'])) $strona = 1; else $strona = (int)$_GET['strona'];
	$sql = mysqli_query($conn, "SELECT goods.id, goods.name, goods.unit_price, goods.unit_of_measure, producers.Name FROM goods LEFT OUTER JOIN producers ON producers.ID = goods.id_producer WHERE goods.name LIKE '%$keyword%' or producers.Name LIKE '%$keyword%'");
	$sql1 = mysqli_query($conn, "SELECT goods.id, goods.name, goods.unit_price, goods.unit_of_measure, producers.Name FROM goods LEFT OUTER JOIN producers ON producers.ID = goods.id_producer WHERE goods.name LIKE '%$keyword%' or producers.Name LIKE '%$keyword%' LIMIT ".(($strona-1)*$na_strone).','.$na_strone );
	// $records = mysqli_query($conn,"select * from goods WHERE name LIKE '%$keyword%'"); // fetch data from database
	   $ile = mysqli_num_rows($sql);  //ilosc wszystkich rekordow (nie stron !!)
	   $stron = ceil ($ile / $na_strone);   //tutaj masz ilosc stron zaokraglanych w gore
	echo '<div class="text-center">Strona: <a href="goods.php?word='.$keyword.'&submit=przeszukaj&strona=1"> 1</a> ';
	for ($i = 1; $i < $stron; $i++) echo '<a href="goods.php?word='.$keyword.'&submit=przeszukaj&strona='.($i+1).'"> '.($i+1).'</a> ';  //tak wyswietlasz numery;
		echo '</div>
			<table class="table table-striped table-hover text-center">
				<tr>	
					<th>Nazwa</th>	
					<th>Producent</th>
					<th>Cena jednostkowa netto </th>					
					<th>Jednostka miary</th>
					<th>Opcje</th>
				</tr>';
		while ($row=mysqli_fetch_array($sql1)){
			echo"
				<tr>
					<td>".$row['name']."</td>
					<td>".$row['Name']."</td>
					<td>".$row['unit_price']."</td>
					<td>".$row['unit_of_measure']."</td>   													
					<td><a href='goods-edit-form.php?id=".$row['id']."' class='effect effect-edit'>Edytuj</a>
					<a href='goods-delete.php?id=".$row['id']."' class='effect effect-delete'>Usuń</a><br></td>
				</tr>";
	}
}
else{
		$records = mysqli_query($conn,"select * from goods"); // fetch data from database
		$ile = mysqli_num_rows($records);  //ilosc wszystkich rekordow (nie stron !!)
		$na_strone = 6; //tu podajesz ile rekordow na stronie max.
		$stron = ceil ($ile / $na_strone);   //tutaj masz ilosc stron zaokraglanych w gore
		if (!isset($_GET['strona'])) $strona = 1; else $strona = (int)$_GET['strona'];
		$sql = mysqli_query($conn,"SELECT goods.id, goods.name, goods.unit_price, goods.unit_of_measure, producers.Name FROM goods LEFT OUTER JOIN producers ON producers.ID = goods.id_producer LIMIT ".(($strona-1)*$na_strone).','.$na_strone);	// tak odczytujesz
		echo '<div class="text-center">Strona: <a href="?strona=1"> 1</a> ';
		for ($i = 1; $i < $stron; $i++) echo '<a href="?strona='.($i+1).'"> '.($i+1).'</a> ';  //tak wyswietlasz numery;
		echo '</div>
			<table class="table table-striped table-hover text-center">
				<tr>	
					<th>Nazwa</th>	
					<th>Producent</th>
					<th>Cena jednostkowa netto </th>					
					<th>Jednostka miary</th>
					<th>Opcje</th>
				</tr>';
		while ($resultat=mysqli_fetch_array($sql)){
			echo"
				<tr>
					<td>".$resultat['name']."</td>
					<td>".$resultat['Name']."</td>
					<td>".$resultat['unit_price']."</td>
					<td>".$resultat['unit_of_measure']."</td>   													
					<td><a href='goods-edit-form.php?id=".$resultat['id']."' class='effect effect-edit'>Edytuj</a>
					<a href='goods-delete.php?id=".$resultat['id']."' class='effect effect-delete'>Usuń</a><br></td>
				</tr>";
		}
}
	?>
		</table>
</body> 
</html>