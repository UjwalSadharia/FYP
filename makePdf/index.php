<?php
require_once 'vendor/autoload.php';
use Dompdf\Dompdf;


$dompdf = new Dompdf;
$dompdf->loadHtml('<h1>Hello</h1>');
// $dompdf->setPaper('A4','portrait');
$dompdf->render();
$dompdf->stream('abc.pdf');
?>