<?php
	require_once('../connect.php');
	$id = $_GET['id']; // get id through query string
	$qry = mysqli_query($conn,"select * from magazines where id='$id'"); // select query
	$data = mysqli_fetch_array($qry); // fetch data
	if(isset($_POST['update'])){ // when click on Update button 	
		$edit = mysqli_query($conn,"UPDATE magazines SET name='".$_POST['magazinename']."',shortcut='".$_POST['magazineshortcut']."',description='".$_POST['magazinedescription']."',street='".$_POST['magazinestreet']."',house_number='".$_POST['magazinehouse_number']."',apartment_number='".$_POST['magazineapartment_number']."',zip_code='".$_POST['magazinezip_code']."',town='".$_POST['magazinetown']."' WHERE id='$id'");
		if($edit){
			mysqli_close($db); // Close connection
			header("location:magazine.php"); // redirects to all records page
			exit;
		}
		else{echo "Błąd edycji danych magazynu";}    	
	}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
	<link rel="icon" href="../images/karton.ico" type="image/x-icon"/>
    <title>Edycja danych magazynu</title>
	<!--css i bootstrap-->
	<link rel="stylesheet" href="../view/bootstrap.min.css">
	<link rel="stylesheet" href="../view/main.css" type="text/css" />
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
	<header class="page-header">
		<a href='magazine.php' class='effect effect-add back'>Wróć</a><br>
		<h1 class="page-title text-center">Edycja danych magazynu</h1>
	</header>	
	
	<form name="form1" method="post" action='' class="text-center">
		<p>Nazwa:</p> <input type="text" name="magazinename" size="150" value="<?php echo $data['name'] ?>" require> </br>
		<p>Skrót:</p> <input type="text" name="magazineshortcut" size="10" value="<?php echo $data['shortcut'] ?>"> </br>
		<p>Opis:</p> <input type="text" name="magazinedescription" size="50" value="<?php echo $data['description'] ?>"></br>
		<p>Ulica:</p> <input type="text" name="magazinestreet" size="50" value="<?php echo $data['street'] ?>" require></br>
		<p>Nr domu:</p> <input type="text" name="magazinehouse_number" size="5" value="<?php echo $data['house_number'] ?>" require></br>
		<p>Nr mieszkania:</p> <input type="text" name="magazineapartment_number" size="5" value="<?php echo $data['apartment_number'] ?>"></br>
		<p>Kod pocztowy:</p> <input type="text" name="magazinezip_code" size="15" value="<?php echo $data['zip_code'] ?>" require></br>
		<p>Miejscowość:</p> <input type="text" name="magazinetown" size="50" value="<?php echo $data['town'] ?>" require></br>
		</br>
		<input type="submit" name="update" value="Edytuj" class='btn btn-primary'>
	</form>
</body>
</html>