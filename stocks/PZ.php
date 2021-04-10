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
?>
			
			<form name="form1" method="post" action=''>
			</select>
			<p>wybierz producenta: </p> <select name="producer">
			<?php
			
			if(!$conn){die("Connection failed: " . mysqli_connect_error());}
			$sql = mysqli_query($conn,"SELECT * FROM `producers` ");
			while ($row = mysqli_fetch_array($sql))
												{
													echo "<option value='".$row['id']."'>".$row['name']."</option>";
												}
			?> 
			</select></br>
			<input type="submit" name="create" value="dalej"></left>	
			</form>
			<?php
			if(isset($_POST['create'])){
				$sql = mysqli_query($conn,"SELECT * FROM `producers` WHERE id='".$_POST['producer']."'");
				$resultat = mysqli_fetch_array($sql);
				$addres=$resultat['street'].' '.$resultat['house_number'].'/'.$resultat['apartment_number'].' '.$resultat['zip_code'].' '.$resultat['town'];
				$query ="INSERT INTO `documents`(`id`, `type`,`id_producers`, `producer_name_used_in_creation`) VALUES ('','PZ','".$resultat['id']."','".$resultat['name']."')";		
				if($conn->query($query) === TRUE){
					mysqli_query($db, $query);

				 header('Location: PZ-add-goods.php?id='.mysqli_insert_id($conn));
				}
				else{ echo "Error: " . $query . "<br>" . $conn->error;}	
				
			}
				?>
			</br>
			</br>
				
		