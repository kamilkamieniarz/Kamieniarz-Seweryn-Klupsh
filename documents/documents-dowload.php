<?php

require_once "../library/tcpdf.php";
require_once('../connect.php');
$id = $_GET['id'];
$sql = mysqli_query($conn,"SELECT * FROM documents LEFT OUTER JOIN users ON documents.id_author = users.id WHERE documents.id=$id");
$resultat = mysqli_fetch_array($sql);
$sql2 = mysqli_query($conn,"SELECT * FROM documents_goods LEFT OUTER JOIN goods ON documents_goods.`id_goods` = goods.id WHERE `id_documents`=$id");



$pdf = new TCPDF('P','mm','A4');
$pdf -> setPrintHeader(false);
$pdf -> AddPage();
//add content
$pdf -> SetFont('freesans','',14);
$pdf -> Cell(190,10,"Dokument ".$resultat['type']."  nr.".$resultat['number'],1,1,'C');

$pdf -> SetFont('freesans','',8);
$pdf -> Cell(95,5,"Sprzedawca",1);
$pdf -> Cell(95,5,"Nabywca",1);
$pdf->Ln();

$tab1 = "
<table>
 <tr><th>".$resultat['client_name_used_in_creation']." </th></tr>
 <tr> <th>".$resultat['client_adress_used_in_creation']." </th> </tr>
 <tr><th> NIP: 111-111-11-11 </th></tr>

</table> 
";
$tab2 = "
<table>
 <tr><th>firma </th></tr>
 <tr> <th>ulicowa 5/15 64-100 Leszno  </th> </tr>
 <tr><th> NIP: 111-111-11-11 </th></tr>

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
	<th>wartosc Netto</th>
	<th>wartość brutto </th>
 </tr>
 
</table> 
";
while ($resultat2=mysqli_fetch_array($sql2)){
	$tab3 .="
	<tr>
	<th>".$resultat2['good_name_used_in_creation']."</th> 
	<th>".$resultat2['amount']."</th> 
	<th>".$resultat2['unit_of_measure']."</th> 
	<th>".$resultat2['unit_price']."</th>
	<th>".$resultat2['unit_price']."</th>
	<th>".$resultat2['unit_price']."</th>
	<th>".$resultat2['total_value']."</th>
 </tr>
 ";
}
$pdf -> WriteHTMLCell(95,5,'','',"$tab1",1);
$pdf -> WriteHTMLCell(95,5,'','',"$tab2",1);
$pdf->Ln(20);

$pdf -> WriteHTMLCell(190,5,'','',"$tab3",1);
$pdf->Ln();
$pdf -> WriteHTMLCell(50,5,150,'',"Razem ".$resultat['value']." zł.",1);
$pdf->Ln();
$pdf -> WriteHTMLCell(50,5,'','',"wystawił: ".$resultat['login']." dnia ".$resultat['date'],1);
$pdf->Output();