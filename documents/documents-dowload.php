<?php

require_once   '../vendor/autoload.php';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bauman-projekt";
$conn = new mysqli($servername, $username, $password, $dbname);


$id = $_GET['id'];
$qry = mysqli_query($conn,"SELECT * FROM `documents` WHERE  id='$id'");
$data = mysqli_fetch_array($qry);
$type=$data['type'];
$number=$data['number'];


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$mpdf = new \Mpdf\Mpdf();
$data ='';
$data .= '<h1> Dokument nr.'.$number.'</h1>';

//write pdf
$mpdf->WriteHTML($data); 
$mpdf->Output(''.$type.$number.'.pdf','D');