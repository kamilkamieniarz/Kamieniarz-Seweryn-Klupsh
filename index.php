<?php
session_start();

if (isset($_SESSION['logged_id'])) {
	header('Location: main.php');
	exit();
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
	<link rel="stylesheet" href="view/main.css">
	<link rel="icon" href="images/karton.ico" type="image/x-icon"/>
    <title>System Magazynowy</title>
	<!-- BOOTSTRAP -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<!-- BOOTSTRAP -->
	<link rel="stylesheet" href="view/login.css">
</head>

 <body>
	<div class="d-flex align-items-center justify-content-center" style="background-color:rgba(160, 160, 160, 0.5); border-radius: 20px; padding: 20px; width: auto; left:40%; top:50%;">
		<form method="post" action="main.php" class='text-center'>
			<h2>Zaloguj się</h2>
			<input type="text" name="login" placeholder="Login" class="mb-3"><br>
			<input type="password" name="pass" placeholder="Hasło" class="mb-3"></br>
			<input type="submit" value="Zaloguj się">
			<?php
				if(isset($_SESSION['bad_attempt'])){
					echo '<p style="color: red; text-align: center"> Błąd logowania!  </p>';
					unset($_SESSION['bad_attempt']);
				}
			?>
		</form>
	</div>
</body> 
</html>