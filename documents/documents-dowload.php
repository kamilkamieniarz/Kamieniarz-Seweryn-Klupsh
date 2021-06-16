<?php

require_once "../library/tcpdf.php";
require_once('../connect.php');
$id = $_GET['id'];
$sql = mysqli_query($conn,"SELECT * FROM documents LEFT OUTER JOIN users ON documents.id_author = users.id WHERE documents.id=$id");
$resultat = mysqli_fetch_array($sql);
$sql2 = mysqli_query($conn,"SELECT * FROM documents_goods LEFT OUTER JOIN goods ON documents_goods.`id_goods` = goods.id WHERE `id_documents`=$id");
$razem=0;


$pdf = new TCPDF('P','mm','A4');
$pdf -> setPrintHeader(false);
$pdf -> AddPage();
//add content
$pdf -> SetFont('freesans','',14); 
$pdf -> Cell(190,10,"Dokument ".$resultat['type']."  nr.".$resultat['number'],1,1,'C');
$pdf -> SetFont('freesans','',8);


$tab1 = "
<table>
 <tr><th>".$resultat['client_name_used_in_creation']." </th></tr>
 <tr> <th>".$resultat['client_adress_used_in_creation']." </th> </tr>
 <tr><th> NIP:".$resultat['client_NIP_used_in_creation']."</th></tr>

</table> 
";
$tab2 = "
<table>
 <tr><th>firma </th></tr>
 <tr> <th>ulicowa 5/15 64-100 Leszno  </th> </tr>
 <tr><th> NIP: 1111111111 </th></tr>

</table> 
";
$tab3 = "
<table>
 <tr>
	<th>Towar</th> 
	<th>ilosc</th> 
	<th>j.m.</th> 
	<th>cena</th>
	<th>VAT</th>
	<th>rabat</th>
	<th>wartosc Netto</th>
	<th>wartość brutto </th>
 </tr>
 
</table> 
";
$tab4 = "
<table>
 <tr><th>".$resultat['client_name_used_in_creation']." </th></tr>
 <tr> <th>".$resultat['client_adress_used_in_creation']." </th> </tr>

</table> 
";
$sql4 = mysqli_query($conn,"SELECT * FROM `magazines` WHERE `id`='".$resultat['id_magazine']."'");
$resultat4 = mysqli_fetch_array($sql4);
if(isset($resultat['apartment_number'])){
				$adres = "ul. ".$resultat4['street']." ".$resultat4['house_number']."/".$resultat4['apartment_number']." ,".$resultat4['zip_code']." ".$resultat4['town'];
			}
			else{
				$adres = "ul. ".$resultat4['street']." ".$resultat4['house_number']." ,".$resultat4['zip_code']." ".$resultat4['town'];
			}

$tab5 = "
<table>
 <tr><th>".$resultat4['name']." </th></tr>
 <tr> <th>".$adres." </th> </tr>

</table> 
";
while ($resultat2=mysqli_fetch_array($sql2)){
	$vat=($resultat2['vat']/100)+1;
	$discount=($resultat2['discount']/100);
	$brutto=$resultat2['total_value']*$vat-($discount*$resultat2['total_value']);
	$brutto= round($brutto, 2);
	$razem=$razem+$brutto;
	$cena=$resultat2['total_value']/$resultat2['amount'];
	
	$tab3 .="
	<tr>
	<th>".$resultat2['good_name_used_in_creation']."</th> 
	<th>".$resultat2['amount']."</th> 
	<th>".$resultat2['unit_of_measure']."</th> 
	<th>".$cena."</th>
	<th>".$resultat2['vat']."%</th>
	<th>".$resultat2['discount']."%</th>
	<th>".$resultat2['total_value']."</th>
	<th>".$brutto."</th>
 </tr>
 ";
}
if ( $resultat['type'] == 'PZ') // dokiment PZ
{

$pdf -> Cell(95,5,"Sprzedawca",1);
$pdf -> Cell(95,5,"Nabywca",1);
$pdf->Ln();
$pdf -> WriteHTMLCell(95,5,'','',"$tab1",1);
$pdf -> WriteHTMLCell(95,5,'','',"$tab2",1);
}
if ( $resultat['type'] == 'WZ') // dokiment WZ
{

$pdf -> Cell(95,5,"Sprzedawca",1);
$pdf -> Cell(95,5,"Nabywca",1);
$pdf->Ln();
$pdf -> WriteHTMLCell(95,5,'','',"$tab2",1);
$pdf -> WriteHTMLCell(95,5,'','',"$tab1",1);
}
if ( $resultat['type'] == 'PM') // dokiment PM
{
$pdf -> Cell(95,5,"Magazyn wydający",1);
$pdf -> Cell(95,5,"Magazyn przyjmujący",1);
$pdf->Ln();
$pdf -> WriteHTMLCell(95,5,'','',"$tab5",1);  
$pdf -> WriteHTMLCell(95,5,'','',"$tab4",1);
}
$pdf->Ln(20);

$pdf -> WriteHTMLCell(190,5,'','',"$tab3",1);
$pdf->Ln();
$pdf -> WriteHTMLCell(50,5,150,'',"Razem ".$razem." zł.",1);
$pdf->Ln();
$pdf -> WriteHTMLCell(50,5,'','',"wystawił: ".$resultat['login']." dnia ".$resultat['date'],1);
$pdf->Output();