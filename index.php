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
</head>
 <body>
 	<div class="d-flex justify-content-center">
		<b>Panel Logowania</b>
	</div>
	<div class="d-flex justify-content-center">
        <form method="post" action="main.php"><br>
			<input type="text" id="login" name="login" placeholder="Login"></br>
            <input type="password" name="pass" placeholder="Hasło"></br>
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