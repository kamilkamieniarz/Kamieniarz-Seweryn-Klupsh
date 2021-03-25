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
$qry = mysqli_query($conn,"SELECT goods.id, goods.name, goods.unit_price, goods.unit_of_measure ,producers.Name FROM goods LEFT OUTER JOIN producers ON producers.ID = goods.id_producer where goods.id='$id'"); // select query
$data = mysqli_fetch_array($qry); // fetch data
if(isset($_POST['update'])) // when click on Update button
{   	
    $edit = mysqli_query($conn,"UPDATE goods SET name='".$_POST['goodname']."',id_producer='".$_POST['goodproducer']."',unit_price='".$_POST['good_unit_price']."',unit_of_measure='".$_POST['good_unit_of_measure']."' WHERE id='$id'");
	
    if($edit)
    {
        mysqli_close($db); // Close connection
        header("location:goods.php"); // redirects to all records page
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
		<h1 class="page-title">Edycja danych towaru</h1>
		</header>	
			<form name="form1" method="post" action=''>
			<p>Nazwa: </p> <input type="text" name="goodname" size="30" value="<?php echo $data['name'] ?>" require>
			<p>producer: </p> <select name="goodproducer"><?php 
									
									$sql = mysqli_query($conn,"SELECT * FROM `producers`");
											 while ($row = mysqli_fetch_array($sql))
												{
													echo "<option value='".$row['id']."'>".$row['name']."</option>";
												}
											?> 
								</select>
			<p>cena jednostkowa: </p> <input type="text" name="good_unit_price" size="30" value="<?php echo $data['unit_price'] ?> " require>
			<p>jednostka miary: </p> <select name="good_unit_of_measure"   require>
											<option><?php echo $data['unit_of_measure'] ?></option>
											<option>kg</option>
											<option>g</option>
											<option>m</option>
											<option>szt</option>
											<option>opakowanie</option>
											<option>szklanki</option>
			</br>
			<input type="submit" name="update" value="edytuj"></left>		
		</form>
</body>
</html>