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
	<main>
		 
				<div class=" col-12 d-flex justify-content-center mt-5 ">
					 <h1 class="h2">Zaloguj się</h1>
				</div>
				
				<div class=" col-12 d-inline-flex justify-content-center">
					<form method="post" action="main.php">
						<input type="text" name="login" placeholder="Login"><br>
						<input type="password" name="pass" placeholder="Hasło"></br>
						<input type="submit" value="Zaloguj się">
						<?php
							if(isset($_SESSION['bad_attempt'])){
								echo '<p style="color: red; text-align: center"> Błąd logowania!  </p>';
								unset($_SESSION['bad_attempt']);
							}
						?>
					</form>
				</div>
		
    </main>
</body> 
</html>