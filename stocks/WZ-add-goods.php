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
			header('Location: WZ-add-goods.php?id='.$id.'&magazine='.$magazine.'');
		}
		//po wyborze magazynu
		if(isset($_GET['magazine'])){
			echo"<form name='form1' method='post' action=''>
					Wybierz towar:</br>
					<select name='good'>";
			$id = $_GET['id'];
			$magazine = $_GET['magazine'];
			$sql1 = mysqli_query($conn,"SELECT m.id, m.name, mg.id, mg.id_magazines, mg.id_goods, mg.amount, g.id, g.name, g.unit_price, g.unit_of_measure, g.amount, g.id_producer FROM magazines as m LEFT OUTER JOIN magazines_goods as mg ON mg.id_magazines = m.id INNER JOIN goods as g ON mg.id_goods=g.id WHERE m.id='$magazine'");
			while ($row = mysqli_fetch_array($sql1)){echo "<option value='".$row['id']."'>".$row['name']."</option>";}
			echo"	</select></br></br>
					Ilość</br>
					<input type='number' name='amount' size='14' require></br></br>
					Cena jednostkowa sprzedaży</br>
					<input type='number' name='value' size='14' require></br></br>
					<input type='submit' name='dodaj' value='Dodaj towar'>		
				</form>";
			if(isset($_POST['dodaj']) && is_numeric($_POST['amount']) && is_numeric($_POST['value'])){
				$sql2 = mysqli_query($conn,"SELECT * FROM `goods` WHERE `id`= '".$_POST['good']."'");
				$resultat = mysqli_fetch_array($sql2);
				$price=$_POST['value']*$_POST['amount'];
				$sql3="INSERT INTO `documents_goods`(`quantity`, `total_value`, `id_author`, `id_documents`, `id_goods`, `good_name_used_in_creation`) VALUES ('".$_POST['amount']."','$price','".$_SESSION['logged_id']."','$id','".$_POST['good']."','".$resultat['name']."')";
				if($conn->query($sql3) === TRUE){}
				else{ echo "Error: " . $sql3 . "</br>" . $conn->error . "</br>";}
			}
			//tutaj łączymy 3 tabele w jedną i pobieramy TYLKO te produkty, które są w danym magazynie
			$sql4 = mysqli_query($conn,"SELECT documents_goods.id, documents_goods.quantity,documents_goods.total_value, documents_goods.id_goods, documents_goods.good_name_used_in_creation, goods.unit_of_measure FROM documents_goods LEFT OUTER JOIN goods ON documents_goods.id_goods = goods.id WHERE documents_goods.id_documents=$id");
			echo "Dodane towary:
				<table class='table table-striped table-hover'>
					<tr>	
						<th>Nazwa towaru</th>	
						<th>ilośc</th>				
						<th>wartość</th>
						<th>Opcje</th>
					</tr>";
			while ($resultat=mysqli_fetch_array($sql4)){
				echo"<tr>
						<td>".$resultat['good_name_used_in_creation']."</td>
						<td>".$resultat['quantity']." ".$resultat['unit_of_measure']."</td>   
						<td>".$resultat['total_value']."</td>   													
						<td><a href='goods-delete.php?id=".$resultat['id']."' class='effect effect-delete'>Usuń</a><br></td> 
					</tr>";
			}
			echo"</br><form name='form2' method='post' action=''>
				<input type='submit' name='accept' value='Zatwierdz listę towarów'>		
				</form>";
			if(isset($_POST['accept'])){
				$sql7 = mysqli_query($conn,"SELECT SUM(`total_value`)AS suma FROM documents_goods WHERE `id_documents`='$id'");
				$resultat = mysqli_fetch_array($sql);	
				$value=$resultat['suma'];
				if($conn->query($sql7)){
					$sql8 = "UPDATE documents SET `value` = '$value' WHERE `id` = '$id'";
					if($conn->query($sql8)){
						header("Location:../../documents/documents.php");
					}
					else{ echo "Error: " . $sql8	 . "</br>" . $conn->error . "</br>";}
				}
				else{ echo "Error: " . $sql7	 . "</br>" . $conn->error . "</br>";}
			}
				//aktulizacja stanu magazynowego
				//$sql = mysqli_query($conn,"SELECT documents_goods.quantity+magazines_goods.amount AS SUMA, documents_goods.id_goods FROM documents_goods LEFT OUTER JOIN magazines_goods ON documents_goods.id_goods = magazines_goods.id_goods WHERE documents_goods.id_documents='$id'");
				//while ($resultat=mysqli_fetch_array($sql)){
				//$edit = mysqli_query($conn,"UPDATE `magazines_goods` SET `id_magazines`=['".$_POST['magazin']."'],`amount`='".$resultat['SUMA']."' WHERE id.goods='".$resultat['id_goods']."'");}
				//header("location:stocks.php"); 
		}
	?>
</body>
</html>