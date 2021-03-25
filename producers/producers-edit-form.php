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
$qry = mysqli_query($conn,"select * from producers where id='$id'"); // select query
$data = mysqli_fetch_array($qry); // fetch data
if(isset($_POST['update'])) // when click on Update button
{   	
    $edit = mysqli_query($conn,"UPDATE producers SET name='".$_POST['contractorname']."',shortcut='".$_POST['contractorshortcut']."',description='".$_POST['contractordescription']."',street='".$_POST['contractorstreet']."',house_number='".$_POST['contractorhouse_number']."',apartment_number='".$_POST['contractorapartment_number']."',zip_code='".$_POST['contractorzip_code']."',town='".$_POST['contractortown']."' WHERE id='$id'");
	
    if($edit)
    {
        mysqli_close($db); // Close connection
        header("location:producers.php"); // redirects to all records page
        exit;
    }
    else
    {
	
       echo "bład edycji klienta";
    }    	
}
 
?>





<!DOCTYPE html>
<html lang="pl">
<body>
		<header class="page-header">
		<h1 class="page-title">Edycja danych producenta</h1>
		</header>	
			<form name="form1" method="post" action=''>
			<p>Nazwa: </p> <input type="text" name="producername" size="30" value="<?php echo $data['name'] ?>" require>
			<p>Skrót: </p> <input type="text" name="producerhortcut" size="5" value="<?php echo $data['shortcut'] ?>"</br>
			<p>Opis: </p> <input type="text" name="producerdescription" size="50" value="<?php echo $data['description'] ?>"</br>
			<p>Ulica: </p> <input type="text" name="producerstreet" size="50" value="<?php echo $data['street'] ?>" require></br>
			<p>Nr domu: </p> <input type="text" name="producerhouse_number" size="5" value="<?php echo $data['house_number'] ?>" require></br>
			<p>Nr mieszkania: </p> <input type="text" name="producerapartment_number" size="3" value="<?php echo $data['apartment_number'] ?>" ></br>
			<p>Kod pocztowy: </p> <input type="text" name="producerzip_code" size="6" value="<?php echo $data['zip_code'] ?>" require></br>
			<p>Miejscowość: </p> <input type="text" name="producertown" size="50" value="<?php echo $data['town'] ?>" require></br>
			</br>
			<input type="submit" name="update" value="edytuj"></left>		
		</form>
</body>
</html>