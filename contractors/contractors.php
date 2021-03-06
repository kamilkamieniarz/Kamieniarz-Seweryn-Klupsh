<?php
	session_start();
	require_once('../connect.php');
	if(!isset($_SESSION['logged_id'])){
		header('Location: index.php');
		exit();
	}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
	<link rel="icon" href="../images/karton.ico" type="image/x-icon"/>
    <title>Kontrahenci</title>
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
		echo "<div class='text-center'><a href='contractors-add-form.php' class='effect effect-add person'>Dodaj kontrahenta</a></div><br>";
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
	$sql = mysqli_query($conn, "SELECT * FROM  contractors WHERE name LIKE '%$keyword%' or shortcut LIKE '%$keyword%' or description LIKE '%$keyword%' or NIP LIKE '%$keyword%' " );
	if(mysqli_num_rows($sql)==0){
		echo "Brak wynikow!";
			}
			else{
		echo '<table class="table table-striped table-hover text-center">
				<tr>	
					<th>Nazwa</th>
					<th>skrót</th>
					<th>opis</th>	
					<th>NIP</th>					
					<th>adres</th>
					<th>miasto</th>
					<th>opcje</th>
				</tr>';
		while ($row=mysqli_fetch_array($sql)){
			echo"
				<tr>
					<td>".$row['name']."</td>
					<td>".$row['shortcut']."</td>
					<td>".$row['description']."</td>
					<td>".$row['NIP']."</td>
					<td>ul. ".$row['street']." ".$row['house_number']."/".$row['apartment_number']."</td>
					<td>".$row['town']." ".$row['zip_code']."</td> 													
					<td><a href='producers-edit-form.php?id=".$row['id']."' class='effect effect-edit'>Edytuj</a>
					<a href='producers-delete.php?id=".$row['id']."' class='effect effect-delete'>Usuń</a><br></td>
				</tr>";
		}}}}
else{
		$records = mysqli_query($conn,"select * from contractors"); // fetch data from database
		$ile = mysqli_num_rows($records);  //ilosc wszystkich rekordow (nie stron !!)
		$na_strone = 10; //tu podajesz ile rekordow na stronie max.
		$stron = ceil ($ile / $na_strone);   //tutaj masz ilosc stron zaokraglanych w gore
		echo '<div class="text-center">Strona:';
		if (!isset($_GET['strona'])) $strona = 1; else $strona = (int)$_GET['strona'];
		echo ' <a href="?strona=1"> 1</a> ';
		for ($i = 1; $i < $stron; $i++) echo ' <a href="?strona='.($i+1).'"> '.($i+1).'</a> ';  //tak wyswietlasz numery;
		$sql = mysqli_query($conn,"SELECT * FROM contractors LIMIT ".(($strona-1)*$na_strone).','.$na_strone);	// tak odczytujesz
		echo '</div>
			<table class="table table-striped table-hover text-center">
				<tr>	
					<th>Nazwa</th>
					<th>skrót</th>
					<th>opis</th>	
					<th>NIP</th>	
					<th>adres</th>
					<th>miasto</th>
					<th>opcje</th>
				</tr>';
		while ($resultat=mysqli_fetch_array($sql)){
		echo"
				<tr>
					<td>".$resultat['name']."</td>
					<td>".$resultat['shortcut']."</td>  
					<td>".$resultat['description']."</td>
					<td>".$resultat['NIP']."</td>
					<td>ul. ".$resultat['street']." ".$resultat['house_number']."/".$resultat['apartment_number']."</td>
					<td>".$resultat['town'].' '.$resultat['zip_code']."</td>
					<td><a href='contractors-edit-form.php?id=".$resultat['id']."' class='effect effect-edit'>Edytuj</a>
					<a href='contractors-delete.php?id=".$resultat['id']."' class='effect effect-delete'>Usuń</a><br></td>
				</tr>";
}}
	?>
			</table>
</body> 
</html>