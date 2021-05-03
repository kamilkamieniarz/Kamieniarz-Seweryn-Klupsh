<?php
	require_once('../connect.php');
	$id = $_GET['id']; // get id through query string
	$qry = mysqli_query($conn,"SELECT goods.id, goods.name, goods.unit_price, goods.VAT, goods.unit_of_measure ,producers.Name FROM goods LEFT OUTER JOIN producers ON producers.ID = goods.id_producer where goods.id='$id'"); // select query
	$data = mysqli_fetch_array($qry); // fetch data
	if(isset($_POST['update'])){ // when click on Update button
		$edit = mysqli_query($conn,"UPDATE goods SET name='".$_POST['goodname']."',id_producer='".$_POST['goodproducer']."',unit_price='".$_POST['good_unit_price']."',VAT='".$_POST['good_VAT']."',unit_of_measure='".$_POST['good_unit_of_measure']."' WHERE id='$id'");
		if($edit){
			mysqli_close($conn); // Close connection
			header("location:goods.php"); // redirects to all records page
			exit;
		}
		else{
		echo "Błąd edycji danych towaru";
		}    	
	}
	require_once('../header.php');
	$num = (double) $data['unit_price'] ;

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
		<a href='goods.php' class='effect effect-add back'>Wróć</a><br>
		<h1 class="page-title">Edycja danych towaru</h1>
	</header>	
	
	<form name="form1" method="post" action=''>
		<p>Nazwa: </p> <input type="text" name="goodname" size="100" value="<?php echo $data['name'] ?>" require>
		<p>producer: </p> <select name="goodproducer">
		<?php 
			$sql = mysqli_query($conn,"SELECT * FROM `producers`");
			while ($row = mysqli_fetch_array($sql)){
				echo "<option value='".$row['id']."'>".$row['name']."</option>";
			}
		?> 
		</select>
		<p>cena jednostkowa: </p> <input type="number" step="0.01" name="good_unit_price" size="14" value="<?php echo $num ?>" require>
		<p>Stawka VAT:</p> 
		<select name="good_VAT" require>
			<option><?php echo $data['VAT'] ?></option>
			<option>23%</option>
			<option>8%</option>
			<option>5%</option>
			<option>0%</option>
		</select>
		<p>jednostka miary: </p> <select name="good_unit_of_measure"   require>
			<option><?php echo $data['unit_of_measure'] ?></option>
			<option>kg</option>
			<option>g</option>
			<option>m</option>
			<option>szt</option>
			<option>opakowanie</option>
			<option>szklanki</option>
		</select>
			</br>
			<input type="submit" name="update" value="edytuj">
		</form>
</body>
</html>