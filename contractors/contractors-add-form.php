<?php
session_start();

require_once '../database.php';

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



<!DOCTYPE html>
<html lang="pl">
<body>
		<header class="page-header">
		<h1 class="page-title">Dodaj kontrahtenta</h1>
		</header>	
			<form name="form1" method="post" action='contractors-add-accept.php'>
			<p>Nazwa: </p> <input type="text" name="contractorname" size="30" placeholder="KowCem betorniarnia Sp. z o.o." require>
			<p>Skrót: </p> <input type="text" name="contractorshortcut" size="5" placeholder="KowBud" require></br>
			<p>Opis: </p> <input type="text" name="contractordescription" size="50" placeholder="Materiały budowlane"></br>
			<p>Ulica: </p> <input type="text" name="contractorstreet" size="50" placeholder="Główna" require></br>
			<p>Nr domu: </p> <input type="text" name="contractorhouse_number" size="5" placeholder="12/A" require></br>
			<p>Nr mieszkania: </p> <input type="text" name="contractorapartment_number" size="3" placeholder="" ></br>
			<p>Kod pocztowy: </p> <input type="text" name="contractorzip_code" size="6" placeholder="64-100" require></br>
			<p>Miejscowość: </p> <input type="text" name="contractortown" size="50" placeholder="Leszno" require></br>
			</br>
			<input type="submit" name="update" value="Dodaj"></left>		
		</form>
</body>
</html>