<?php
include_once "../../dompdf/autoload.inc.php";
use Dompdf\Dompdf;
$pdf=new Dompdf();
ob_start();
include_once "../funciones/productosProveidosPDF.php";
$html=ob_get_clean();
$pdf->loadHtml($html);
$pdf->setPaper("A4","landscape");
$pdf->render();
$pdf->stream("ProductosProveidos");
?>