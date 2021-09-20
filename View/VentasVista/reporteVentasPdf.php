<?php

require('../../libraries/fpdf/fpdf.php');
require("../../Controller/VentasControlador/ControladorVentas.php");

$listarVentasEnvi = $ControladorVentas->listarVentasEnviadas();


session_start();
if (!isset($_SESSION['correoUsuario'])) { //Si no existe la varible de sesión lo redirecciona al login
    header("Location: ../../View/AccesoVista/login.php");
}


class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    //$this->Image('logo.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',14);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(73,10,'Reporte de pedidos Mada',0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->Cell(65, 8, 'Fecha', 1, 0, 'C', 0);
    $this->Cell(65, 8, 'Total', 1, 0, 'C', 0);
    $this->Cell(65, 8, 'Cliente', 1, 1, 'C', 0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10, utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',11);

foreach($listarVentasEnvi as $venta){
    
    $pdf->Cell(65, 8, utf8_decode($venta['FechaPedido']), 1, 0, 'C', 0);
    $pdf->Cell(65, 8, utf8_decode($venta['Total']), 1, 0, 'C', 0);
    $pdf->Cell(65, 8, utf8_decode($venta['Nombre']), 1, 1, 'C', 0);

}


$pdf->Output();
