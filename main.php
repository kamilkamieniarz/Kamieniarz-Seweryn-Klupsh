
<?php
session_start();

require_once 'database.php';

if (!isset($_SESSION['logged_id'])) {

	if (isset($_POST['login'])) {
		
		$login = filter_input(INPUT_POST, 'login');
		$password = filter_input(INPUT_POST, 'pass');
		$userQuery = $db->prepare('SELECT id, login, password FROM users WHERE login = :login');
		$userQuery->bindValue(':login', $login, PDO::PARAM_STR);
		$userQuery->execute();
		
		$user = $userQuery->fetch();
		if ($user && password_verify($password, $user['password'])) {
			$_SESSION['user'] = $user['login'];
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
	<link rel="icon" href="images/karton.ico" type="image/x-icon"/>
	<link rel="stylesheet" href="view/main.css" type="text/css" />
    <title>Panel Użytkownika</title>
	 
</head>

 <body> 
<div class="topnav">
  	<a class="active" href="main.php">HOME</a>
  	<a href="stocks/stocks.php">STAN MAGAZYNÓW</a>
	<a href="documents/documents.php?strona=1">DOKUMENTY</a>
	<a href="magazine/magazine.php">MAGAZYNY</a> 
	<a href="goods/goods.php?strona=1">TOWARY</a> 
	<a href="contractors/contractors.php?strona=1">KONTRAHENCI</a> 
	<a class="logout" href="logout.php">WYLOGUJ SIĘ</a> 
</div>
<div class ="witaj">
 <h1>
 	Witaj
 	<?php 
	 	echo $_SESSION['user'] 
	 ?>
	!
 </h1>
       
<div>
</body> 
</html>
