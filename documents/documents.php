<?php
session_start();

require_once 'database.php';

if (!isset($_SESSION['logged_id'])) {

	if (isset($_POST['login'])) {
		
		$login = filter_input(INPUT_POST, 'login');
		$password = filter_input(INPUT_POST, 'pass');
		
		//echo $login . " " .$password;
		
		$userQuery = $db->prepare('SELECT id, password FROM admins WHERE login = :login');
		$userQuery->bindValue(':login', $login, PDO::PARAM_STR);
		$userQuery->execute();
		
		//echo $userQuery->rowCount();
		
		$user = $userQuery->fetch();
		
		//echo $user['id'] . " " . $user['password'];
		
		if ($user && password_verify($password, $user['password'])) {
			$_SESSION['logged_id'] = $user['id'];
			unset($_SESSION['bad_attempt']);
		} else {
			$_SESSION['bad_attempt'] = true;
			header('Location: index.php');
			exit();
		}
			
	} else {
		
		header('Location: index.php');
		exit();
	}
}
?>

<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>kontrahenci</title>
	<a href="http://localhost/bauman-projekt/main.php">strona główna</a></br>
</head>
 <body> 
  	<?php
					

		$db = mysqli_connect("localhost","root","","bauman-projekt");

		if(!$db)
		{
		die("Connection failed: " . mysqli_connect_error());
		}
		?>
		<?php

						$records = mysqli_query($db,"select * from dokumenty"); // fetch data from database
						echo '<table><tr>	
							<th>typ</th>
							<th>data utworzenia</th>						
							<th>opcje</th>
							</tr>';
						//wys
						$ile = mysqli_num_rows($records);  //ilosc wszystkich rekordow (nie stron !!)
						$na_strone = 10; //tu podajesz ile rekordow na stronie max.
						$stron = ceil ($ile / $na_strone);   //tutaj masz ilosc stron zaokraglanych w gore
						echo 'strona:';
						if (!isset($_GET['strona'])) $strona = 1; else $strona = (int)$_GET['strona'];
						$sql = mysqli_query($db,"SELECT * FROM dokumenty LIMIT ".(($strona-1)*$na_strone).','.$na_strone);	// tak odczytujesz
 
						while ($resultat=mysqli_fetch_array($sql)) 
						{
							?>
							<tr>
							
							<td><p style="display: none"> <?php echo ['id']?></p><?php echo $resultat['type']; ?></td>
							<td><?php echo $resultat['date']; ?></td>
							   
							  
																				
							<td><a href="edycja.php?id=<?php echo $resultat['id']; ?>">Pobierz</a>
							<a href="documents-delete.php?id=<?php echo $resultat['id']; ?>">Usuń</a><br></td>
							

						<?php
						}
						echo ' <a href="?strona=1"> 1</a> ';
						for ($i = 1; $i < $stron; $i++) echo ' <a href="?strona='.($i+1).'"> '.($i+1).'</a> ';  //tak wyswietlasz numery;

						?>
       
   
</body> 
</html>