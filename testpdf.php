<?php 
require __DIR__ . "/vendor/autoload.php";
use Dompdf\Dompdf;
$dompdf = new Dompdf;
$dompdf->loadHtml ("Hello World");
$dompdf->render();
$dompdf->stream("invoice.pdf");
?>