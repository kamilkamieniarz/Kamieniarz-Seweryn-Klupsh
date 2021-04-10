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
	$sql = mysqli_query($conn,"SELECT id_producers FROM `documents` WHERE `id`=$id");
	$resultat = mysqli_fetch_array($sql);
	$prod=$resultat['id_producers'];
	  ?>
	 
	  <form name="form1" method="post" action=''>
		
			<p>wybierz towar: </p> <select name="good">
			<?php
								
			$sql1 = mysqli_query($conn,"SELECT * FROM `goods` WHERE `id_producer`=$prod");
			 while ($row = mysqli_fetch_array($sql1))
												{
													echo "<option value='".$row['id']."'>".$row['name']."</option>";
												}
			?> 
			</select>
			<p>ilość</p><input type="number"  name="amunt" size="14"  require></br></br>
			<input type="submit" name="dodaj" value="Dodaj towar">		
			</form>
			<?php
			if(isset($_POST['dodaj'])){
				$sql2 = mysqli_query($conn,"SELECT * FROM `goods` WHERE `id`= '".$_POST['good']."'");
				$resultat = mysqli_fetch_array($sql2);
				$price=$resultat['unit_price']*$_POST['amunt'];
				$sql3="INSERT INTO `documents_goods`(`id`, `quantity`, `total_value`, `id_documents`, `id_goods`, `good_name_used_in_creation`) VALUES ('','".$_POST['amunt']."',$price,$id,'".$_POST['good']."','".$resultat['name']."')";
				if($conn->query($sql3) === TRUE){}
				else{ echo "Error: " . $sql3 . "<br>" . $conn->error;}
			}
			$sql4 = mysqli_query($conn,"SELECT documents_goods.id, documents_goods.quantity,documents_goods.total_value, documents_goods.id_goods, documents_goods.good_name_used_in_creation, goods.unit_of_measure FROM documents_goods LEFT OUTER JOIN goods ON documents_goods.id_goods = goods.id WHERE documents_goods.id_documents=$id");
			echo "dodane towary:";
			echo '<table class="table table-striped table-hover">
				<tr>	
					<th>Nazwa towaru</th>	
					<th>ilośc</th>				
					<th>wartość</th>
					<th>Opcje</th>
				</tr>';
			while ($resultat=mysqli_fetch_array($sql4)){
			echo"
			<tr>
				<td>".$resultat['good_name_used_in_creation']."</td>
				<td>".$resultat['quantity']." ".$resultat['unit_of_measure']."</td>   
				<td>".$resultat['total_value']."</td>   													
				<td><a href='goods-delete.php?id=".$resultat['id']."' class='effect effect-delete'>Usuń</a><br></td> 
			</tr>";
			}  ?>
			<form name="form2" method="post" action=''>
			<input type="submit" name="accept" value="Zatwierdż listę towarów ">		
			</form>	
			<?php
			if(isset($_POST['accept'])){
				header('Location: update-documents.php?id='.$id);
			} ?>
  

	
	
</body>
</html>