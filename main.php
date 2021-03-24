
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
    <title>Panel Użytkownika</title>
	 <!--css i bootstrap-->
	 	<link rel="stylesheet" href="view/bootstrap.min.css">
		<link rel="stylesheet" href="view/main.css" type="text/css" />
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&amp;subset=latin-ext" rel="stylesheet">
</head>

 <body> 
<header>
	
		<nav class="navbar navbar-dark bg-menu navbar-expand-xl" style="z-index:1">
		
			<a class="navbar-brand" href="#"><img src="view/logo.png" width="30" height="30" class="d-inline-block mr-1 align-bottom" alt=""> </a>
		
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainmenu" aria-controls="mainmenu" aria-expanded="false" aria-label="Przełącznik nawigacji">
				<span class="navbar-toggler-icon"></span>
			</button>
		
			<div class="collapse navbar-collapse" id="mainmenu">
			
				<ul class="navbar-nav mr-auto">
				
					<li class="nav-item active">
						<a class="nav-link" href="main.php"> START </a>
					</li>
					
					
					
					<li class="nav-item">
						<a class="nav-link" href="stocks/stocks.php"> STAN MAGAZYNÓW </a>
					</li>
					
					<li class="nav-item">
						<a class="nav-link" href="documents/documents.php?strona=1"> DOKUMENTY </a>
					</li>
					
					<li class="nav-item">
						<a class="nav-link" href="magazine/magazine.php"> MAGAZYNY </a>
					</li>
					
					<li class="nav-item">
						<a class="nav-link" href="goods/goods.php?strona=1"> TOWARY </a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="contractors/contractors.php?strona=1"> KONTRAHENCI </a>
					</li>
				
				</ul>
			
					<a  href="logout.php">WYLOGUJ SIĘ</a> 
			
			</div>
		
		</nav>
	
	</header>
<div class ="witaj" style="z-index:-1">
 <h1>
 	Witaj
 	<?php 
	 	echo $_SESSION['user'] 
	 ?>
	!
 </h1>
       
<div>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body> 
</html>
