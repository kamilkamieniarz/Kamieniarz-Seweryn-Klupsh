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
    <title>Logowanie</title>
   
	
</head>

 <body> 
  
       
		<center><a><b>Zaloguj się</b></a></center>
		
    
                <form method="post" action="main.php">
                   <center> <label><p >Login</p> <input type="text" name="login"></label></br></br>
                    <label><p >Hasło</p> <input type="password" name="pass"></label></br></br>
                    <input type="submit" value="Zaloguj się!"></center>
					
					<?php
					if (isset($_SESSION['bad_attempt'])) {
						
						echo '<p style="color: red; text-align: center"> Błąd logowania!  </p>';
						unset($_SESSION['bad_attempt']);
					}
					?>
					
                </form>
          
        </main>

   
</body> 
</html>