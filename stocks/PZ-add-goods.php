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
			echo"<form name='form1' method='post' action='' class='text-center'>
				Wybierz magazyn:</br>
				<select name='magazin'>";
			$sql = mysqli_query($conn,"SELECT * FROM `magazines` ");
			while ($row = mysqli_fetch_array($sql)){echo "<option value='".$row['id']."'>".$row['name']."</option>";}
			echo"</select></br>
				<input type='submit' name='accept1' class='btn btn-primary' value='Wybierz'>
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
			echo"<div class='row pl-2'>
					<div class='col-4'>
					<form name='form1' method='post' action=''>
					Wybierz towar:</br> <select name='good'>";
			$sql1 = mysqli_query($conn,"SELECT * FROM `goods` WHERE `id_producer`=$prod");
			while ($row = mysqli_fetch_array($sql1)){echo "<option value='".$row['id']."'>".$row['name']."</option>";}
			echo"</select></br></br>
				<input type='submit' name='dodaj' class='btn btn-warning m-1' value='Dodaj towar'></div>
				<div class='col-4'>
				Ilość</br>
				<input type='number'  name='amount' size='14'  require></br>
				VAT(%)</br>
				<input type='number' name='vat' size='3' value='27' step='1' require>
				</div>
			</form>
			</div>";
			if(isset($_POST['dodaj'])){
				if(is_numeric($_POST['amount']) && is_numeric($_POST['vat'])){
					$sql2 = mysqli_query($conn,"SELECT * FROM `goods` WHERE `id`= '".$_POST['good']."'");
					$resultat = mysqli_fetch_array($sql2);
					$price=$resultat['unit_price']*$_POST['amount'];
					$vat=$_POST['vat'];	
					$sql3="INSERT INTO `documents_goods`(`amount`, `total_value`, `vat`, `id_author`, `id_documents`, `id_goods`, `good_name_used_in_creation`) VALUES ('".$_POST['amount']."', $price, '".$vat."' ,'".$_SESSION['logged_id']."','$id','".$_POST['good']."','".$resultat['name']."')";
					if($conn->query($sql3) === TRUE){}
					else{ echo "Error: " . $sql3 . "<br>" . $conn->error;}
				}
				else{
					echo"<script>alert('Uzupełnij poprawnie formularz')</script>";
				}
			}
			$sql4 = mysqli_query($conn,"SELECT documents_goods.id, documents_goods.amount,documents_goods.total_value, documents_goods.vat, documents_goods.id_goods, documents_goods.good_name_used_in_creation, goods.unit_of_measure FROM documents_goods LEFT OUTER JOIN goods ON documents_goods.id_goods = goods.id WHERE documents_goods.id_documents=$id");
			echo"</br><div class='row pl-2'>
				<div class='col-4'>
					<form name='form2' method='post' action=''>
						Data dokumentu obcego (opcjonalne)</br>
						<input type='datetime-local' name='date'></br></br>
						<input type='submit' name='accept' class='btn btn-primary m-2' value='Zatwierdź listę towarów'>		
					</form>
				</div>
				</div></br>
				Dodane towary:
				
				<table class='table table-striped table-hover text-center'>
					<tr>	
						<th>Nazwa towaru</th>	
						<th>Ilość</th>
						<th>Cena NETTO</th>		
						<th>Cena jednostkowa NETTO</th>
						<th>VAT</th>
						<th>Cena BRUTTO</th>
						<th>Opcje</th>
					</tr>";
			while($resultat = mysqli_fetch_array($sql4)){
				$netto=$resultat['total_value']/$resultat['amount'];
				$brutto=round($brutto=$resultat['total_value']+($resultat['total_value']*($resultat['vat']/100)),2);
			echo	"<tr>
						<td>".$resultat['good_name_used_in_creation']."</td>
						<td>".$resultat['amount']." ".$resultat['unit_of_measure']."</td>   
						<td>".$resultat['total_value']." zł</td>
						<td>".$netto." zł</td>		
						<td>".$resultat['vat']." %</td>		
						<td>".$brutto." zł</td>								
						<td><a href='goods-delete.php?id=".$resultat['id']."' class='effect effect-delete'>Usuń</a><br></td> 
					</tr>";
			}
			if(isset($_POST['accept'])){
				$id = $_GET['id'];
				$sql7 = mysqli_query($conn,"SELECT SUM(`total_value`) as suma FROM documents_goods WHERE `id_documents`='$id'");
				$resultat = mysqli_fetch_array($sql7);	
				$value=$resultat['suma'];
				if(isset($_POST['date'])){$date_foreign_documents = $_POST['date'];}
				else{$date_foreign_documents = NULL;}
				if($sql7){
					$sql8 = "UPDATE documents SET `value` = '$value', `date_foreign_documents` = '$date_foreign_documents' WHERE `id` = '$id'";
					if($conn->query($sql8)){
						$id = $_GET['id'];
						$sql4 = mysqli_query($conn,"SELECT `id_goods`, `amount` FROM documents_goods WHERE `id_documents`=$id");
						while($resultat = mysqli_fetch_array($sql4)){
							$magazine = $_GET['magazine'];
							$sql5 = "INSERT INTO magazines_goods (`id_magazines`, `id_goods`, `amount`) VALUES ('$magazine','".$resultat['id_goods']."','".$resultat['amount']."')";
							if($conn->query($sql5) == TRUE){}
						}
						echo"<script>window.location.href = '../documents/documents.php';</script>";
					}
					else{ echo "Error: " .$sql8. "</br>" .$conn->error. "</br>";}
				}
				else{ echo "Error: " .$sql7. "</br>" .$conn->error. "</br>";}
			} 
		}
	?>
  

	
	
</body>
</html>