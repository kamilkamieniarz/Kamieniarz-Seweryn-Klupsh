<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="utf-8">
	<link rel="stylesheet" href="../.view/main.css">
	<link rel="icon" href="../images/karton.ico" type="image/x-icon"/>
    <title>Stany Magazynów</title>
	<a href="../main.php">Home</a></br>
</head>
 <body> 
  	<?php
					

		$db = mysqli_connect("localhost","root","","bauman-projekt");

		if(!$db)
		{
		die("Connection failed: " . mysqli_connect_error());
		}
		?>
		<?php
            //Tutaj trzeba połączyć się z tabelą magazynów i z tabelą towarów żeby wyświetlić który magazyn ma jakie i ile towarów
        ?>
</body> 
</html>