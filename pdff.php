<?php
require('fpdf/fpdf.php');


$nombre = isset($_GET['nombre']) ? $_GET['nombre'] : '';
$apellido = isset($_GET['apellido']) ? $_GET['apellido'] : '';
if (empty($nombre) || empty($apellido)) {
    echo "Error: Nombre y apellido son requeridos.";
    exit;
}

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(40, 10, 'Nombre: ' . $nombre);
$pdf->Ln();
$pdf->Cell(40, 10, 'Apellido: ' . $apellido);


$pdf->Output('I','documento.pdf');

echo "OK";
?>