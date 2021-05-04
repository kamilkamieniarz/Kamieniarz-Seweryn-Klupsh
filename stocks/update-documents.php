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
    <title>przyjęcie towaru</title>
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
	$id = $_GET['id'];
	if(!$conn){die("Connection failed: " . mysqli_connect_error());}
	$sql = mysqli_query($conn,"SELECT SUM(`total_value`)AS suma FROM documents_goods WHERE `id_documents`='$id'");
	$resultat = mysqli_fetch_array($sql);	
	$value=$resultat['suma'];
	$sql = mysqli_query($conn,"SELECT MAX(`number`)+1 AS number FROM documents");
	$resultat = mysqli_fetch_array($sql);
	$number=$resultat['number'];
	
?>
			<form name="form1" method="post" action=''>
			</select>
			<p>wybierz magazyn: </p> <select name="magazin">
			<?php
			
			if(!$conn){die("Connection failed: " . mysqli_connect_error());}
			$sql = mysqli_query($conn,"SELECT * FROM `magazines` ");
			while ($row = mysqli_fetch_array($sql))
												{
													echo "<option value='".$row['id']."'>".$row['name']."</option>";
												}
			?> 
			</select></br>
			<input type="submit" name="accept1" value="zatwierdż"></left>	
			</form>
			<?php
			if(isset($_POST['accept1'])){
					
					$edit = mysqli_query($conn,"UPDATE `documents` SET `number`=$number,`value`=$value,`date`=curtime() WHERE `id`=$id"); //uzupełnic o brakujace elementy
					//aktulizacja stanu magazynowego
					//$sql = mysqli_query($conn,"SELECT documents_goods.quantity+magazines_goods.amount AS SUMA, documents_goods.id_goods FROM documents_goods LEFT OUTER JOIN magazines_goods ON documents_goods.id_goods = magazines_goods.id_goods WHERE documents_goods.id_documents='$id'");
					//while ($resultat=mysqli_fetch_array($sql)){
					//$edit = mysqli_query($conn,"UPDATE `magazines_goods` SET `id_magazines`=['".$_POST['magazin']."'],`amount`='".$resultat['SUMA']."' WHERE id.goods='".$resultat['id_goods']."'");}
					//header("location:stocks.php"); 
			}