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
    <title>System Magazynowy</title>
	<!-- BOOTSTRAP -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<!-- BOOTSTRAP -->
	<link rel="stylesheet" href="view/style.css">
</head>
 <body>
 	<div class="d-flex justify-content-center">
		<b>Panel Logowania</b>
	</div>
	<div class="d-flex justify-content-center">
        <form method="post" action="main.php">
		<!-- wybrać wersje z label, zwyłym tekstem albo tylko placeholder -->
            <label for="login"><b>Login</b></label><br><input type="text" id="login" name="login" placeholder="Login"></br>
            <label><input type="password" name="pass" placeholder="Hasło"></label></br>
            <input type="submit" value="Zaloguj" class="btn btn-primary">
				<?php
					if (isset($_SESSION['bad_attempt'])) {
						echo '<p style="color: red;"> Błąd logowania!  </p>';
						unset($_SESSION['bad_attempt']);
					}
				?>	
        </form>
		</div>
	</div>
</body> 
</html>