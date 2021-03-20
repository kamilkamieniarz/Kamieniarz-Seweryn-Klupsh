
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
<head>
    <meta charset="utf-8"> 
	<link rel="stylesheet" href="view/main.css" type="text/css" />
     <title>Panel Użytkownika</title>
	 
</head>

 <body> 
<div class="topnav">
  <a class="active" href="main.php">Główna</a>
  <a href="stan magazynu.php">stan magazynów</a>
	<a href="documents/documents.php?strona=1">dokumenty</a>
	<a href="magazine/magazine.php">magazyny</a> 
	<a href="goods/goods.php?strona=1">towary</a> 
	<a href="contractors/contractors.php?strona=1">kontrehenci</a> 
	<a class="logout" href="logout.php">wyloguj się</a> 
</div>
<div class ="witaj">
 <h1 >Witaj!</h1>
       
<div>
</body> 
</html>
