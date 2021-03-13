<?php
session_start();

require_once 'database.php';

if (!isset($_SESSION['logged_id'])) {

	if (isset($_POST['login'])) {
		
		$login = filter_input(INPUT_POST, 'login');
		$password = filter_input(INPUT_POST, 'pass');
		
		//echo $login . " " .$password;
		
		$userQuery = $db->prepare('SELECT id, password FROM users WHERE login = :login');
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
	<a href="http://localhost/bauman-projekt/main.php">menu głownie</a></br>
</head>
 <body> 
  	<?php
					

		$db = mysqli_connect("localhost","root","","bauman-projekt");

		if(!$db)
		{
		die("Connection failed: " . mysqli_connect_error());
		}
		?>
		<a href="contractors-add-form.php">dodaj kontraktenta</a><br>
		<?php

						$records = mysqli_query($db,"select * from contractors"); // fetch data from database
						echo '<table><tr>	
							<th>Nazwa</th>
							<th>skrót</th>	
							<th>opis</th>
							<th>adres</th>
							<th>miasto</th>
							<th>opcje</th>
							</tr>';
						//wys
						$ile = mysqli_num_rows($records);  //ilosc wszystkich rekordow (nie stron !!)
						$na_strone = 10; //tu podajesz ile rekordow na stronie max.
						$stron = ceil ($ile / $na_strone);   //tutaj masz ilosc stron zaokraglanych w gore
						echo 'strona:';
						if (!isset($_GET['strona'])) $strona = 1; else $strona = (int)$_GET['strona'];
						$sql = mysqli_query($db,"SELECT * FROM contractors LIMIT ".(($strona-1)*$na_strone).','.$na_strone);	// tak odczytujesz
 
						while ($resultat=mysqli_fetch_array($sql)) 
						{
							?>
							<tr>
							
							<td><p style="display: none"> <?php echo ['id']?></p><?php echo $resultat['name']; ?></td>
							<td><?php echo $resultat['shortcut']; ?></td>
							<td><?php echo $resultat['description']; ?></td> 
							<td><?php echo $resultat['street']; ?>  
							<?php echo $resultat['house_number'];
							echo "/";
							echo $resultat['apartment_number']; ?>	
							<td><?php echo $resultat['zip_code'];?>
							    <?php echo $resultat['town']; ?></td>
							  
																				
							<td><a href="edycja.php?id=<?php echo $resultat['id']; ?>">edycja</a>
							<a href="contractors-delete.php?id=<?php echo $resultat['id']; ?>">Usuń</a><br></td>
							

						<?php
						}
						echo ' <a href="?strona=1"> 1</a> ';
						for ($i = 1; $i < $stron; $i++) echo ' <a href="?strona='.($i+1).'"> '.($i+1).'</a> ';  //tak wyswietlasz numery;

						?>
       
   
</body> 
</html>