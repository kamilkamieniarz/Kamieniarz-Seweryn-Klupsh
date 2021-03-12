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



<!DOCTYPE html>
<html lang="pl">
<body>
		<header class="page-header">
		<h1 class="page-title">Dodaj kontraktenta</h1>
		</header>	
			<form name="form1" method="post" action='contractors-add-accept.php'>
			<p>nazwa: </p> <input type="text" name="contractorname" size="30" require>
			<p>skrót: </p> <input type="text" name="contractorshortcut" size="5" require></br>
			<p>adres: </p> <input type="text" name="contractoraddress" size="50" require></br>
			</br>
			<input type="submit" name="update" value="dodaj"></left>		
		</form>
</body>
</html>