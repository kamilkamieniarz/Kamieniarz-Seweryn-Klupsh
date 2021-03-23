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
			<form name="form1" method="post" action='goods-add-accept.php'>
			<p>Nazwa: </p> <input type="text" name="goodname" size="30"  require>
			<p>producer: </p> <input type="text" name="goodproducer" size="30"  require>
			<p>cena jednostkowa: </p> <input type="text" name="good_unit_price" size="30"  require>
			<p>jednostka miary: </p> <input type="text" name="good_unit_of_measure" size="30"  require>
			</br>
			<input type="submit" name="update" value="Dodaj"></left>		
		</form>
</body>
</html>