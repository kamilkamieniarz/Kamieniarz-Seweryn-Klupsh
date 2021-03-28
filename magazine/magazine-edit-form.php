<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bauman-projekt";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id']; // get id through query string
$qry = mysqli_query($conn,"select * from magazines where id='$id'"); // select query
$data = mysqli_fetch_array($qry); // fetch data
if(isset($_POST['update'])) // when click on Update button
{   	
    $edit = mysqli_query($conn,"UPDATE magazines SET name='".$_POST['magazinename']."',shortcut='".$_POST['magazineshortcut']."',description='".$_POST['magazinedescription']."',street='".$_POST['magazinestreet']."',house_number='".$_POST['magazinehouse_number']."',apartment_number='".$_POST['magazineapartment_number']."',zip_code='".$_POST['magazinezip_code']."',town='".$_POST['magazinetown']."' WHERE id='$id'");
	
    if($edit)
    {
        mysqli_close($db); // Close connection
        header("location:magazine.php"); // redirects to all records page
        exit;
    }
    else
    {
	
       echo "bład edycji magazynu";
    }    	
}
 
?>





<!DOCTYPE html>
<html lang="pl">
<body>
		<header class="page-header">
		<h1 class="page-title">Edycja danych magazynu</h1>
		</header>	
			<form name="form1" method="post" action=''>
			<p>Nazwa: </p> <input type="text" name="magazinename" size="30" value="<?php echo $data['name'] ?>" require>
			<p>Skrót: </p> <input type="text" name="magazineshortcut" size="5" value="<?php echo $data['shortcut'] ?>"</br>
			<p>Opis: </p> <input type="text" name="magazinedescription" size="50" value="<?php echo $data['description'] ?>"</br>
			<p>Ulica: </p> <input type="text" name="magazinestreet" size="50" value="<?php echo $data['street'] ?>" require></br>
			<p>Nr domu: </p> <input type="text" name="magazinehouse_number" size="5" value="<?php echo $data['house_number'] ?>" require></br>
			<p>Nr mieszkania: </p> <input type="text" name="magazineapartment_number" size="3" value="<?php echo $data['apartment_number'] ?>" ></br>
			<p>Kod pocztowy: </p> <input type="text" name="magazinezip_code" size="6" value="<?php echo $data['zip_code'] ?>" require></br>
			<p>Miejscowość: </p> <input type="text" name="magazinetown" size="50" value="<?php echo $data['town'] ?>" require></br>
			</br>
			<input type="submit" name="update" value="edytuj"></left>		
		</form>
</body>
</html>