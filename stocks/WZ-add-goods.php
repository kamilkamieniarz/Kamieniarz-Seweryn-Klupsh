<?php
	session_start();
	require_once('../connect.php');
	if(!isset($_SESSION['logged_id'])){
		echo"<script>window.location.href = '../index.php';</script>";
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
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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
			echo"<div class='row'>
					<div class='col-4'>
					<form name='form1' method='post' action='' class='pl-2'>
					Wybierz towar:</br>
					<select name='good' id='good'>";
			$id = $_GET['id'];
			$magazine = $_GET['magazine'];
			//tutaj łączymy 3 tabele w jedną i pobieramy TYLKO te produkty, które są w danym magazynie
			$sql1 = mysqli_query($conn,"SELECT m.id, m.name, mg.id, mg.id_magazines, mg.id_goods, SUM(mg.amount) as amount, g.id, g.name, g.unit_price, g.unit_of_measure, g.id_producer FROM magazines as m LEFT OUTER JOIN magazines_goods as mg ON mg.id_magazines = m.id INNER JOIN goods as g ON mg.id_goods=g.id WHERE m.id='$magazine' GROUP by g.name");
			while ($row = mysqli_fetch_array($sql1)){
				echo "<option value='".$row['id']."'>".$row['name']." (".$row['amount']." ".$row['unit_of_measure'].")(".$row['unit_price']." zł)</option>";
			}
			echo"	</select></br>";
			$sql1 = mysqli_query($conn,"SELECT m.id, m.name, mg.id, mg.id_magazines, mg.id_goods, mg.amount, g.id, g.name, g.unit_price, g.unit_of_measure, g.id_producer FROM magazines as m LEFT OUTER JOIN magazines_goods as mg ON mg.id_magazines = m.id INNER JOIN goods as g ON mg.id_goods=g.id WHERE m.id='$magazine'");
			while ($row = mysqli_fetch_array($sql1)){
				echo "<input type='hidden' id='".$row['id']."' value='".$row['unit_price']."'>";
			}
			echo"	Ilość</br>
						<input type='number' name='amount' id='amount' size='14' require></br></br></br>
						<input type='submit' class='btn btn-warning m-1' name='dodaj' value='Dodaj towar'>	
					</div>
						
					<div class= 'col-4'>
						Cena wyjściowa NETTO(zł)</br>
						<input type='number' name='end_price' id='end_price' value='' disabled></br>
						Marża(np 6,5%)</br>
						<input type='number' name='markup' id='markup' size='3' step='0.1' value='0'></br>
						Rabat(np. 6,5%)</br>(Doliczany do ceny z marżą)</br>
						<input type='number' name='discount' id='discount' size='3' step='0.1' value='0'></br>
					</div>
					
					<div class= 'col-4'>
						VAT(%)</br>
						<input type='number' name='vat' id='vat' size='3' value='23' step='1' require></br>
						Cena wyjściowa Brutto(zł)</br>
						<input type='number' name='end_price' id='end_price_brutto' value='' disabled></br>
					</div>
				</div>	
				</form>";
			if(isset($_POST['dodaj'])){
				if(is_numeric($_POST['amount']) && is_numeric($_POST['markup']) && is_numeric($_POST['discount'])){
					$magazine = $_GET['magazine'];
					$good_id = $_POST['good'];
					//sprawdzamy ilość towaru, którego chcemy dodać, na wybranym magazynie
					$sql9 = mysqli_query($conn,"SELECT m.id, mg.id, mg.id_magazines, mg.id_goods, mg.amount FROM magazines as m LEFT OUTER JOIN magazines_goods as mg ON mg.id_magazines = m.id WHERE m.id='$magazine' AND mg.id_goods='$good_id'");
					$amount = mysqli_fetch_array($sql9);
					$amount = $amount['amount'];
					//sprawdzamy czy jest tyle w magazynie ile chcemy dodać do WZ
					if($amount >= $_POST['amount']){
						$sql2 = mysqli_query($conn,"SELECT * FROM `goods` WHERE `id`= '".$_POST['good']."'");
						$resultat = mysqli_fetch_array($sql2);
						$price=$resultat['unit_price']*$_POST['amount'];
						$vat=$_POST['vat'];
						$markup=$_POST['markup'];
						$discount=$_POST['discount'];
						if($markup>0.00){
							$price=$price+($price*($markup/100));
						}
						if($discount>0.00){
							$price=$price-($price*($discount/100));
						}
						$sql3="INSERT INTO `documents_goods`(`amount`, `total_value`, `vat`, `markup`, `discount`, `id_author`, `id_documents`, `id_goods`, `good_name_used_in_creation`) VALUES ('".$_POST['amount']."','$price', '".$vat."' ,'".$markup."','".$discount."','".$_SESSION['logged_id']."','$id','".$_POST['good']."','".$resultat['name']."')";
						if($conn->query($sql3) === TRUE){
							echo "<script>window.location.href = window.location.href</script>";
						}
						//zmniejszamy ilość towaru w wybranym magazynie o podaną ilość
						$amount -= $_POST['amount'];
						$sql10 = mysqli_query($conn,"UPDATE magazines_goods SET `amount` = '$amount' WHERE `id_magazines`='$magazine' AND `id_goods`='$good_id'");
						if($sql10){
						}
					}
					else{
						echo"<script>alert('Na magazynie jest tylko ".$amount."')</script>";
					}
				}
				else{
					echo"<script>alert('Uzupełnij poprawnie formularz')</script>";
				}
			}
			$sql4 = mysqli_query($conn,"SELECT documents_goods.id, documents_goods.amount,documents_goods.total_value, documents_goods.vat, documents_goods.id_goods, documents_goods.good_name_used_in_creation, goods.unit_of_measure FROM documents_goods LEFT OUTER JOIN goods ON documents_goods.id_goods = goods.id WHERE documents_goods.id_documents=$id");
			echo"<div class='row pl-2'>
						<div class='col-5'>
						</br><form name='form2' method='post' action=''>
						Data dokumentu obcego (opcjonalne)</br>
						<input type='datetime-local' name='date'></br>
						<input type='submit' name='accept' value='Zatwierdź listę towarów'>
						</form></br></div>
					</div>
				Dodane towary:
				<table class='table table-striped table-hover text-center'>
					<tr>	
						<th>Nazwa towaru</th>	
						<th>Ilość</th>
						<th>Cena NETTO</th>
						<th>VAT</th>
						<th>Cena BRUTTO</th>
						<th>Opcje</th>
					</tr>";
			while ($resultat=mysqli_fetch_array($sql4)){
				$brutto=round($brutto=$resultat['total_value']+($resultat['total_value']*($resultat['vat']/100)),2);
				echo"<tr>
						<td>".$resultat['good_name_used_in_creation']."</td>
						<td>".$resultat['amount']." ".$resultat['unit_of_measure']."</td>   
						<td>".$resultat['total_value']." zł</td>
						<td>".$resultat['vat']." %</td>		
						<td>".$brutto." zł</td>	  													
						<td><a href='goods-delete.php?id=".$resultat['id']."&amount=".$resultat['amount']."&magazine=".$_GET['magazine']."&good_id=".$resultat['id_goods']."&type=wz' class='effect effect-delete'>Usuń</a><br></td> 
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
						echo"<script>window.location.href = '../documents/documents.php';</script>";
					}
					else{ echo "Error: " .$sql8. "</br>" .$conn->error. "</br>";}
				}
				else{ echo "Error: " .$sql7. "</br>" .$conn->error. "</br>";}
			}
		}
	?>
	<script>
		$( document ).ready(function() {
			$('#good').change(function(){
				var id = $('#good').val();
				var price = $('#'+id).val();
				var amount = $('#amount').val();
				var markup = $('#markup').val();
				var discount = $('#discount').val();
				var vat = $('#vat').val();
				price = price * amount;
				markup = markup/100;
				price += price * markup;
				discount = discount/100;
				price -= price * discount;
				price = price.toFixed(2);
				$('#end_price').val(price);
				price = parseInt(price);
				vat = vat/100;
				price2 = price+(price * vat);
				price2 = price2.toFixed(2);
				$('#end_price_brutto').val(price2);
			});
			$('#amount').change(function(){
				var id = $('#good').val();
				var price = $('#'+id).val();
				var amount = $('#amount').val();
				var markup = $('#markup').val();
				var discount = $('#discount').val();
				var vat = $('#vat').val();
				price = price * amount;
				markup = markup/100;
				price += price * markup;
				discount = discount/100;
				price -= price * discount;
				price = price.toFixed(2);
				$('#end_price').val(price);
				price = parseInt(price);
				vat = vat/100;
				price2 = price+(price * vat);
				price2 = price2.toFixed(2);
				$('#end_price_brutto').val(price2);
			});
			$("#markup").change(function() {
				var id = $('#good').val();
				var price = $('#'+id).val();
				var amount = $('#amount').val();
				var markup = $('#markup').val();
				var discount = $('#discount').val();
				var vat = $('#vat').val();
				price = price * amount;
				markup = markup/100;
				price += price * markup;
				discount = discount/100;
				price -= price * discount;
				price = price.toFixed(2);
				$('#end_price').val(price);
				price = parseInt(price);
				vat = vat/100;
				price2 = price+(price * vat);
				price2 = price2.toFixed(2);
				$('#end_price_brutto').val(price2);
			});
			$("#discount").change(function() {
				var id = $('#good').val();
				var price = $('#'+id).val();
				var amount = $('#amount').val();
				var markup = $('#markup').val();
				var discount = $('#discount').val();
				var vat = $('#vat').val();
				price = price * amount;
				markup = markup/100;
				price += price * markup;
				discount = discount/100;
				price -= price * discount;
				price = price.toFixed(2);
				$('#end_price').val(price);
				price = parseInt(price);
				vat = vat/100;
				price2 = price+(price * vat);
				price2 = price2.toFixed(2);
				$('#end_price_brutto').val(price2);
			});
			$("#vat").change(function() {
				var id = $('#good').val();
				var price = $('#'+id).val();
				var amount = $('#amount').val();
				var markup = $('#markup').val();
				var discount = $('#discount').val();
				var vat = $('#vat').val();
				price = price * amount;
				markup = markup/100;
				price += price * markup;
				discount = discount/100;
				price -= price * discount;
				price = price.toFixed(2);
				$('#end_price').val(price);
				price = parseInt(price);
				vat = vat/100;
				price2 = price+(price * vat);
				price2 = price2.toFixed(2);
				$('#end_price_brutto').val(price2);
			});
		});
	</script>
</body>
</html>