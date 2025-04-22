<?php 
require('pdf/fpdf.php');
require('admin/config/condb2.php'); 
if ($_GET["ticket_id"] == '') {
    echo "<script type='text/javascript'>";
    echo "alert('Error Contact Admin !!');";
    echo "window.location = 'ticketlist.php'; ";
    echo "</script>";
}
$ticket_id = mysqli_real_escape_string($link, $_GET['ticket_id']);
$query = "SELECT * FROM ticket WHERE ticket_id=$ticket_id" or die("Error:" . mysqli_error($link));
$result = mysqli_query($link, $query);
$row = mysqli_fetch_array($result);
extract($row);

$pdf = new FPDF('P' , 'mm' , array( 75,159 )); 
// Add Thai font 
$pdf->AddFont('THSarabunNew','','THSarabunNew.php');
$pdf->AddFont('THSarabunNew','B','THSarabunNew_b.php');
$pdf->AddPage();

$ticket="SELECT * from ticket ORDER BY ticket_id";
$query_ticket = mysqli_query ($link,$ticket);
$rs_ticket = mysqli_fetch_assoc ($query_ticket);

$pdf->Image('TicketTemplate2024-1.png', 0, 0, -200);

$pdf->SetFont('THSarabunNew','B',16);
$pdf->Cell(0, 22, iconv('UTF-8','cp874',$line),0,1,'C');
$pdf->SetFont('THSarabunNew','',16);
$pdf->Cell(0, -10, iconv('UTF-8','cp874',$day_trip),0,1,'C');
$pdf->SetFont('THSarabunNew','B',22);
$pdf->Cell(25, 30, iconv('UTF-8','cp874',$bus_id),0,1,'C');
$pdf->SetFont('THSarabunNew','B',22);
$pdf->Cell(85, -30, iconv('UTF-8','cp874',$time),0,1,'C');
$pdf->SetFont('THSarabunNew','B',22);
$pdf->Cell(25, 55, iconv('UTF-8','cp874',$seat_no),0,1,'C');
$pdf->SetFont('THSarabunNew','B',22);
$pdf->Cell(0, -30, iconv('UTF-8','cp874',$dep_id),0,1,'C');
$pdf->SetFont('THSarabunNew','B',22);
$pdf->Cell(0, 55, iconv('UTF-8','cp874',$arr_id),0,1,'C');
$pdf->SetFont('THSarabunNew','B',36);
$pdf->Cell(0, -33, iconv('UTF-8','cp874',$fare),0,1,'C');
$pdf->SetFont('THSarabunNew','B',16);
$pdf->Cell(32, 49, iconv('UTF-8','cp874',$name),0,1,'C');
$pdf->SetFont('THSarabunNew','',14);
$pdf->Cell(20, -35, iconv('UTF-8','cp874',$date_sell),0,1,'C');
$pdf->SetFont('THSarabunNew','',14);
$pdf->Cell(24, 48, iconv('UTF-8','cp874',$driver_id),0,1,'C');
$pdf->SetFont('THSarabunNew','B',18);
$pdf->Cell(100, -34, iconv('UTF-8','cp874',$ticket_id),0,1,'C');
$pdf->SetFont('THSarabunNew','',10);
$pdf->Cell(95, -12, iconv('UTF-8','cp874',$discount),0,1,'C');


// $pdf->SetFont('THSarabunNew','B',16);
// $pdf->Cell(12, 55, iconv('UTF-8','cp874',$line),8,8,'C');
// $pdf->SetFont('THSarabunNew','B',16);
// $pdf->Cell(0, 0, iconv('UTF-8','cp874',$dep_id),0,1,'C');
// $pdf->SetFont('THSarabunNew','B',16);
// $pdf->Cell(0, 0, iconv('UTF-8','cp874',$arr_id),0,1,'C');
// $pdf->SetFont('THSarabunNew','B',16);
// $pdf->Cell(0, 0, iconv('UTF-8','cp874',$time),0,1,'C');
// $pdf->SetFont('THSarabunNew','B',16);
// $pdf->Cell(0, 0, iconv('UTF-8','cp874',$bus_id),0,1,'C');
// $pdf->SetFont('THSarabunNew','',14);
// $pdf->Cell(0, 0, iconv('UTF-8','cp874',$date_sell),0,1,'C');
// $pdf->SetFont('THSarabunNew','',14);
// $pdf->Cell(0, 0, iconv('UTF-8','cp874',$driver_id),0,1,'C');
// $pdf->SetFont('THSarabunNew','B',16);
// $pdf->Cell(0, 0, iconv('UTF-8','cp874',$ticket_id),0,1,'C');





$pdf->Output('', 'UnivLiner Ticket.pdf');
?>