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
    <title>Wydanie Zewnętrzne</title>
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
		//wybór klienta
		echo"<form name='form1' method='post' action=''>
				</select>
				Wybierz kontrahenta:</br>
				<select name='contractor'>";
		if(!$conn){die("Connection failed: " . mysqli_connect_error());}
		$sql2 = mysqli_query($conn,"SELECT * FROM `contractors` ");
		while ($row = mysqli_fetch_array($sql2)){echo "<option value='".$row['id']."'>".$row['shortcut']."</option>";}
		echo"	</select></br>
				<input type='submit' name='create' value='Wybierz'>	
			</form>";
		if(isset($_POST['create'])){
			$sql = mysqli_query($conn,"SELECT * FROM `contractors` WHERE id='".$_POST['contractor']."'");
			$resultat = mysqli_fetch_array($sql);
			if(isset($resultat['apartment_number'])){
				$adres_used_in_creation = "ul. ".$resultat['street']." ".$resultat['house_number']."/".$resultat['apartment_number']." ,".$resultat['zip_code']." ".$resultat['town'];
			}
			else{
				$adres_used_in_creation = "ul. ".$resultat['street']." ".$resultat['house_number']." ,".$resultat['zip_code']." ".$resultat['town'];
			}
			$date = date("Y-m-d H:i:s");
			$query ="INSERT INTO `documents`( `type`, `date`, `date_foreign_documents`, `id_author`, `id_client`, `client_name_used_in_creation`, `client_adress_used_in_creation`, `client_NIP_used_in_creation`) VALUES ('WZ', '".$date."', NULL, '".$_SESSION['logged_id']."','".$resultat['id']."','".$resultat['name']."','".$adres_used_in_creation."','".$resultat['NIP']."')";
			if($conn->query($query) === TRUE){
				$id=mysqli_insert_id($conn);
				$sql3 = "UPDATE documents SET `number` = (SELECT max(`number`) FROM documents) +1 WHERE `id`='$id'";
				if($conn->query($sql3)){
					header('Location: WZ-add-goods.php?id='.$id);
				}
			}
			else{echo "Error: " . $query . "<br>" . $conn->error;}	
		}
	?>
</body>
</html>