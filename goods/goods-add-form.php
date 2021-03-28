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
		<h1 class="page-title">Dodaj Towar</h1>
		</header>	
			<form name="form1" method="post" action='goods-add-accept.php'>
			<p>Nazwa: </p> <input type="text" name="goodname" size="30"  require>
			<p>producer: </p> <select name="goodproducer">
									<?php 
									$db = mysqli_connect("localhost","root","","bauman-projekt");
									if(!$db){die("Connection failed: " . mysqli_connect_error());}
									$sql = mysqli_query($db,"SELECT * FROM `producers`");
											 while ($row = mysqli_fetch_array($sql))
												{
													echo "<option value='".$row['id']."'>".$row['name']."</option>";
												}
											?> 
								</select>
			
			<p>cena jednostkowa: </p> <input type="text" name="good_unit_price" size="30"  require>
			<p>jednostka miary: </p> <select name="good_unit_of_measure"   require>
											<option>kg</option>
											<option>g</option>
											<option>m</option>
											<option>szt</option>
											<option>opakowanie</option>
											<option>szklanki</option>
			</br>
			<input type="submit" name="update" value="Dodaj"></left>		
		</form>
</body>
</html>