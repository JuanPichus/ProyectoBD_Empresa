<?php
require('fpdf/fpdf.php');

$conexion = new mysqli('localhost', 'root', /*contrasena*/ '', 'bd_enterprise') or die("Fallo en la Conexion");

$sql_query = $conexion->query("SELECT * FROM proyectos_info");

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 8);
$pdf->SetFillColor(138, 138, 138);
$pdf->Cell(40, 10, "Proyecto", 1, 0, 'C', 0);
$pdf->Cell(25, 10, "Presupuesto", 1, 0, 'C', 0);
$pdf->Cell(40, 10, "Nombre Admin", 1, 0, 'C', 0);
$pdf->Cell(40, 10, "Apellido Admin", 1, 0, 'C', 0);
$pdf->Cell(40, 10, "Cliente", 1, 0, 'C', 0);

while ($data = mysqli_fetch_array($sql_query)) {
    $pdf->Ln(10);
    $pdf->Cell(40, 10, "$data[Proyecto]", 1, 0, 'C', 0);
    $pdf->Cell(25, 10, "$data[Presupuesto]", 1, 0, 'C', 0);
    $pdf->Cell(40, 10, "$data[Nombre_Administrador]", 1, 0, 'C', 0);
    $pdf->Cell(40, 10, "$data[Apellido_Administrador]", 1, 0, 'C', 0);
    $pdf->Cell(40, 10, "$data[Cliente]", 1, 0, 'C', 0);
}

$pdf->Output();
