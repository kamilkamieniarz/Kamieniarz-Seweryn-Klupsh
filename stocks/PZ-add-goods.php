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
    <title>Przyjęcie Zewnętrzne</title>
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
		//wybór magazynu
		if(!isset($_GET['magazine'])){
			echo"
			<form name='form1' method='post' action=''>
				</select>
				Wybierz magazyn:</br>
				<select name='magazin'>";
			$sql = mysqli_query($conn,"SELECT * FROM `magazines` ");
			while ($row = mysqli_fetch_array($sql)){echo "<option value='".$row['id']."'>".$row['name']."</option>";}
			echo"</select></br>
				<input type='submit' name='accept1' value='Wybierz'>
			</form></br>";
		};
		//akceptacja wyboru magazynu
		if(isset($_POST['accept1'])){
			$magazine = $_POST['magazin'];
			header('Location: PZ-add-goods.php?id='.$id.'&magazine='.$magazine.'');
		}
		//po wyborze magazynu
		if(isset($_GET['magazine'])){
			$sql = mysqli_query($conn,"SELECT id_client FROM `documents` WHERE `id`=$id");
			$resultat = mysqli_fetch_array($sql);
			$prod=$resultat['id_client'];
			echo"<form name='form1' method='post' action=''>
					Wybierz towar:</br> <select name='good'>";
			$sql1 = mysqli_query($conn,"SELECT * FROM `goods` WHERE `id_producer`=$prod");
			while ($row = mysqli_fetch_array($sql1)){echo "<option value='".$row['id']."'>".$row['name']."</option>";}
			echo"</select></br></br>
				Ilość</br>
				<input type='number'  name='amount' size='14'  require></br></br>
				<input type='submit' name='dodaj' value='Dodaj towar'>		
			</form>";
			if(isset($_POST['dodaj'])){
				$sql2 = mysqli_query($conn,"SELECT * FROM `goods` WHERE `id`= '".$_POST['good']."'");
				$resultat = mysqli_fetch_array($sql2);
				$price=$resultat['unit_price']*$_POST['amount'];
				$sql3="INSERT INTO `documents_goods`(`amount`, `total_value`, `id_author`, `id_documents`, `id_goods`, `good_name_used_in_creation`) VALUES ('".$_POST['amount']."', $price, '".$_SESSION['logged_id']."','$id','".$_POST['good']."','".$resultat['name']."')";
				if($conn->query($sql3) === TRUE){}
				else{ echo "Error: " . $sql3 . "<br>" . $conn->error;}
			}
			$sql4 = mysqli_query($conn,"SELECT documents_goods.id, documents_goods.amount,documents_goods.total_value, documents_goods.id_goods, documents_goods.good_name_used_in_creation, goods.unit_of_measure FROM documents_goods LEFT OUTER JOIN goods ON documents_goods.id_goods = goods.id WHERE documents_goods.id_documents=$id");
			echo"<form name='form2' method='post' action=''>
					<input type='submit' name='accept' value='Zatwierdź listę towarów'>		
				</form></br>Dodane towary:
				
				<table class='table table-striped table-hover text-center'>
					<tr>	
						<th>Nazwa towaru</th>	
						<th>Ilość</th>				
						<th>Cena</th>
						<th>Opcje</th>
					</tr>";
			while($resultat = mysqli_fetch_array($sql4)){
			echo	"<tr>
						<td>".$resultat['good_name_used_in_creation']."</td>
						<td>".$resultat['amount']." ".$resultat['unit_of_measure']."</td>   
						<td>".$resultat['total_value']." zł</td>   													
						<td><a href='goods-delete.php?id=".$resultat['id']."' class='effect effect-delete'>Usuń</a><br></td> 
					</tr>";
			}
			if(isset($_POST['accept'])){
				$id = $_GET['id'];
				$sql7 = mysqli_query($conn,"SELECT SUM(`total_value`) as suma FROM documents_goods WHERE `id_documents`='$id'");
				$resultat = mysqli_fetch_array($sql7);	
				$value=$resultat['suma'];
				if($sql7){
					$sql8 = "UPDATE documents SET `value` = '$value' WHERE `id` = '$id'";
					if($conn->query($sql8)){
						$id = $_GET['id'];
						$sql4 = mysqli_query($conn,"SELECT `id_goods`, `amount` FROM documents_goods WHERE `id_documents`=$id");
						while($resultat = mysqli_fetch_array($sql4)){
							$magazine = $_GET['magazine'];
							$sql5 = "INSERT INTO magazines_goods (`id_magazines`, `id_goods`, `amount`) VALUES ('$magazine','".$resultat['id_goods']."','".$resultat['amount']."')";
							if($conn->query($sql5) == TRUE){}
						}
						header('Location: ../documents/documents.php');
					}
					else{ echo "Error: " .$sql8. "</br>" .$conn->error. "</br>";}
				}
				else{ echo "Error: " .$sql7. "</br>" .$conn->error. "</br>";}
			} 
		}
	?>
  

	
	
</body>
</html>