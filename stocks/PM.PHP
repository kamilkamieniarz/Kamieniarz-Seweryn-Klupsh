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
				header('Location: ../index.php');
				exit();
			}	
		}
		else{
			header('Location: ../index.php');
			exit();
		}
	}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
	<link rel="icon" href="../images/karton.ico" type="image/x-icon"/>
    <title>Stany Magazynów</title>
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
?>
		<header class="page-header">
		<h1 class="page-title">Wydanie zewnętrzne</h1>
		</header>	
			<form name="form1" method="post" action=''>
		
			<p>wybierz magazyn wydajacy: </p> <select name="magazin">
			<?php
			$db = mysqli_connect("localhost","root","","bauman-projekt");
									if(!$db){die("Connection failed: " . mysqli_connect_error());}
									$sql1 = mysqli_query($db,"SELECT * FROM `magazines`");
			 while ($row = mysqli_fetch_array($sql1))
												{
													echo "<option value='".$row['id']."'>".$row['shortcut']."</option>";
												}
			?> 
			</select>
			<p>wybierz magazyn przyjmujący: </p> <select name="magazin2">
			<?php
			
									if(!$db){die("Connection failed: " . mysqli_connect_error());}
									$sql2 = mysqli_query($db,"SELECT * FROM `contractors` ");
			 while ($row = mysqli_fetch_array($sql2))
												{
													echo "<option value='".$row['id']."'>".$row['shortcut']."</option>";
												}
			?> 
			</select>
			<input type="submit" name="update" value="wprowadż"></left>	
			
				
			</br>
			</br>