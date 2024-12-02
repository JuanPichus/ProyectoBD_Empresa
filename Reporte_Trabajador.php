<?php
require('fpdf/fpdf.php');

$conexion = new mysqli('localhost', 'root', /*contrasena*/ '', 'bd_enterprise') or die("Fallo en la Conexion");

$sql_query = $conexion->query("SELECT * FROM trabajador_puesto");

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(138, 138, 138);
$pdf->Cell(20, 10, "Nomina", 1, 0, 'C', 0);
$pdf->Cell(45, 10, "Nombre", 1, 0, 'C', 0);
$pdf->Cell(45, 10, "Apellido", 1, 0, 'C', 0);
$pdf->Cell(20, 10, "Sueldo", 1, 0, 'C', 0);
$pdf->Cell(60, 10, "Puesto", 1, 0, 'C', 0);

while ($data = mysqli_fetch_array($sql_query)) {
    $pdf->Ln(10);
    $pdf->Cell(20, 10, "$data[Nomina]", 1, 0, 'C', 0);
    $pdf->Cell(45, 10, "$data[Nombre]", 1, 0, 'C', 0);
    $pdf->Cell(45, 10, "$data[Apellido]", 1, 0, 'C', 0);
    $pdf->Cell(20, 10, "$data[Sueldo]", 1, 0, 'C', 0);
    $pdf->Cell(60, 10, "$data[Puesto]", 1, 0, 'C', 0);
}

$pdf->Output();
