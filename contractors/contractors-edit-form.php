<?php
	require_once('../connect.php');
	$id = $_GET['id'];
	$qry = mysqli_query($conn,"select * from contractors where id='$id'");
	$data = mysqli_fetch_array($qry); 
	if(isset($_POST['update'])){   	
		$edit = mysqli_query($conn,"UPDATE contractors SET name='".$_POST['contractorname']."',shortcut='".$_POST['contractorshortcut']."',description='".$_POST['contractordescription']."',NIP='".$_POST['contractorNIP']."',street='".$_POST['contractorstreet']."',house_number='".$_POST['contractorhouse_number']."',apartment_number='".$_POST['contractorapartment_number']."',zip_code='".$_POST['contractorzip_code']."',town='".$_POST['contractortown']."' WHERE id='$id'");
		if($edit){
			mysqli_close($conn);
			header("location:contractors.php");
			exit;
		}
		else{ echo "Błąd edycji danych kontrahenta";}    	
	}
	require_once('../header.php');
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
	<link rel="icon" href="../images/karton.ico" type="image/x-icon"/>
    <title>Edycja danych kontrahenta</title>
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
		<h1 class="page-title text-center">Edycja danych kontrahtenta</h1>
	</header>	
	
	<form name="form1" method="post" action='' class='text-center'>
		<p>Nazwa: </p> 
		<input type="text" name="contractorname" size="30" value="<?php echo $data['name'] ?>" require>
		<p>Skrót: </p> 
		<input type="text" name="contractorshortcut" size="5" value="<?php echo $data['shortcut'] ?>"></br>
		<p>Opis: </p> 
		<input type="text" name="contractordescription" size="50" value="<?php echo $data['description'] ?>"></br>
		<p>NIP: </p> 	
		<input type="text" name="contractorNIP" size="50" value="<?php echo $data['NIP'] ?>" require ></br>
		<p>Ulica: </p> 
		<input type="text" name="contractorstreet" size="50" value="<?php echo $data['street'] ?>" require></br>
		<p>Nr domu: </p> 
		<input type="text" name="contractorhouse_number" size="5" value="<?php echo $data['house_number'] ?>" require></br>
		<p>Nr mieszkania: </p> 
		<input type="text" name="contractorapartment_number" size="3" value="<?php echo $data['apartment_number'] ?>" ></br>
		<p>Kod pocztowy: </p> 
		<input type="text" name="contractorzip_code" size="6" value="<?php echo $data['zip_code'] ?>" require></br>
		<p>Miejscowość: </p> 
		<input type="text" name="contractortown" size="50" value="<?php echo $data['town'] ?>" require></br></br>
		<input type="submit" name="update" class='btn btn-primary' value="Edytuj"></left>		
	</form>
</body>
</html>