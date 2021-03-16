<?php
session_start();

require_once 'database.php';

if (!isset($_SESSION['logged_id'])) {

	if (isset($_POST['login'])) {
		
		$login = filter_input(INPUT_POST, 'login');
		$password = filter_input(INPUT_POST, 'password');
		
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
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
    <title>Panel Użytkownika</title>
   
	<a href="stan magazynu.php">Stan magazynów</a></br>
	<a href="documents/documents.php?strona=1">Dokumenty</a></br>
	<a href="magazine/magazine.php">Magazyny</a> </br>
	<a href="goods/goods.php?strona=1">Towary</a> </br>
	<a href="contractors/contractors.php?strona=1">Kontrahenci</a> </br>
	<a href="logout.php">Wyloguj się</a> </br>
</head>

 <body> 
  
       
   
</body> 
</html>