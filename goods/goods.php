<?php
	session_start();
	require_once '../database.php';
	if(!isset($_SESSION['logged_id'])){
		if(isset($_POST['login'])){
			$login = filter_input(INPUT_POST, 'login');
			$password = filter_input(INPUT_POST, 'password');
			//echo $login . " " .$password;
			$userQuery = $db->prepare('SELECT id, password FROM users WHERE login = :login');
			$userQuery->bindValue(':login', $login, PDO::PARAM_STR);
			$userQuery->execute();
			//echo $userQuery->rowCount();
			$user = $userQuery->fetch();
			//echo $user['id'] . " " . $user['password'];
			if($user && password_verify($password, $user['password'])){
				$_SESSION['logged_id'] = $user['id'];
				unset($_SESSION['bad_attempt']);
			} 
			else{
				$_SESSION['bad_attempt'] = true;
				header('Location: index.php');
				exit();
			}	
		}
		else{
			header('Location: index.php');
			exit();
		}
	}
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
</head>
 <body> 
  	<?php
		require_once('../header.php');
		$db = mysqli_connect("localhost","root","","bauman-projekt");
		if(!$db){die("Connection failed: " . mysqli_connect_error());}
		echo "<a href='goods-add-form.php'>dodaj towar</a><br>";
		$records = mysqli_query($db,"select * from goods"); // fetch data from database
		echo '<table>
				<tr>	
					<th>Nazwa</th>	
					<th>Producent</th>
					<th>Cena jednostkowa</th>					
					<th>Jednostka miary</th>
					<th>Opcje</th>
				</tr>';
				$ile = mysqli_num_rows($records);  //ilosc wszystkich rekordow (nie stron !!)
				$na_strone = 10; //tu podajesz ile rekordow na stronie max.
				$stron = ceil ($ile / $na_strone);   //tutaj masz ilosc stron zaokraglanych w gore
				echo 'strona:';
				if (!isset($_GET['strona'])) $strona = 1; else $strona = (int)$_GET['strona'];
				$sql = mysqli_query($db,"SELECT  goods.id, goods.name, goods.unit_price, goods.unit_of_measure ,producers.Name FROM goods LEFT OUTER JOIN producers ON producers.ID = goods.id_producer LIMIT ".(($strona-1)*$na_strone).','.$na_strone);	// tak odczytujesz
				
				while ($resultat=mysqli_fetch_array($sql)){
	?>
					<tr>
						<td><?php echo $resultat['name']; ?></td>
						<td><?php echo $resultat['Name']; ?></td>
						<td><?php echo $resultat['unit_price']; ?></td>   
						<td><?php echo $resultat['unit_of_measure']; ?></td>   													
						<td><a href="goods-edit-form.php?id=<?php echo $resultat['id']; ?>">edycja</a>
						<a href="goods-delete.php?id=<?php echo $resultat['id']; ?>">Usuń</a><br></td>
					</tr>
			<?php
				}
				echo ' <a href="?strona=1"> 1</a> ';
				for ($i = 1; $i < $stron; $i++) echo ' <a href="?strona='.($i+1).'"> '.($i+1).'</a> ';  //tak wyswietlasz numery;
			?>
</body> 
</html>