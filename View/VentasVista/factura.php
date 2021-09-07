<?php

include "../../Controller/VentasControlador/ControladorVentas.php";
$detalle = $ControladorVentas->listarDetalleVenta($_GET['IdPedido']);
$detalleV = $ControladorVentas->listarProductosVendidos($_GET['IdPedido']);


// Include the main TCPDF library (search for installation path).
require_once('TCPDF-main/tcpdf_import.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Brayan Hncapie Monsalve');
$pdf->SetTitle('Mada Web');
$pdf->SetSubject('Factura');
$pdf->SetKeywords('TCPDF, PDF, Mada');

// set default header data
$PDF_HEADER_TITLE="Mada Web";
$PDF_HEADER_STRING="Compra a tu medida";
$PDF_HEADER_LOGO="imagen";
$pdf->SetHeaderData($PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, $PDF_HEADER_TITLE, $PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$PDF_MARGIN_HEADER = 10;
$PDF_MARGIN_LEFT = 10;
$PDF_MARGIN_RIGHT= 10;
$PDF_MARGIN_TOP = 30;
$pdf->SetMargins($PDF_MARGIN_LEFT, $PDF_MARGIN_TOP, $PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin($PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', 'B', 10);

// add a page
$pdf->AddPage();

$pdf->Write(0, 'FACTURA DE VENTA #' .$detalle['IdPedido'], '', 0, 'C', true, 0, false, false, 0);
$pdf->Write(0, 'MEDELLÍN-COLOMBIA', '', 0, 'C', true, 0, false, false, 0);
$pdf->Write(0, 'FECHA ' .$detalle['FechaPedido'] , '', 0, 'C', true, 0, false, false, 0);

$pdf->SetFont('helvetica', '', 11);




// -----------------------------------------------------------------------------

// Table with rowspans and THEAD

$tbl = '
<div class="container">
<h4>Datos Cliente</h4>
    <div class="col-md-4">
        <label for="nombre"><strong>Nombre:</strong> '.$detalle['Nombre'].' '.$detalle['Apellido'].' </label> 
        <br>
        <label for="correo"><strong>Documento:</strong> 10000</label>
        <br>
        <label for="correo"><strong>Correo:</strong> '.$detalle['Correo'].'</label>
    </div>
    
</div>
<br>

<table id="tabla">
    <thead>
        <tr style="background-color: black; color:white">
        <th style="text-align:center;"colspan="2">Cod.</th>
        <th style="text-align:center;"colspan="3">Producto</th>
        <th style="text-align:center;"colspan="3">Color</th>
        <th style="text-align:center;"colspan="2">Talla</th>
        <th style="text-align:center;"colspan="2">Cant.</th>
        <th style="text-align:center;"colspan="3">Valor Unitario</th>
        <th style="text-align:center;"colspan="3">Valor</th>
        </tr>
    </thead>
        <tbody>';
        $total = 0;
        foreach ($detalleV as $deta) {

$tbl .= ' <tr>
        <td style="text-align:center;" colspan="2">'.$deta['IdProducto'].'</td>
        <td style="text-align:center;" colspan="3">'.$deta['NombreProducto'].'</td>
        <td style="text-align:center;" colspan="3">'.$deta['Color'].'</td>
        <td style="text-align:center;" colspan="2">'.$deta['Talla'].'</td>
        <td style="text-align:center;" colspan="2">'.$deta['Cantidad'].'</td>
        <td style="text-align:center;" colspan="3">$'.$deta['ValorUnitario'].'</td>
        <td style="text-align:center;" colspan="3">$'.$deta['Cantidad']*$deta['ValorUnitario'].'</td>


    </tr> '; 
    $calc= (($deta['ValorUnitario']*19)/100)*$deta['Cantidad'];
    $total+= $calc;
    }

$tbl .= '<tr>
<br>
<td colspan="12"></td>
<td style="text-align:center; background-color: black; color:white" colspan="3">SubTotal</td>
<td style="text-align:center; " colspan="3">$'.$detalle['Subtotal'].'</td>
</tr>

<tr>
<td colspan="12"></td>
<td style="text-align:center; background-color: black; color:white" colspan="3">IVA</td>
<td style="text-align:center; " colspan="3"> '.$total .' </td>
</tr>

<tr>
<td colspan="12"></td>
<td style="text-align:center; background-color: black; color:white" colspan="3">Total</td>
<td style="text-align:center; " colspan="3">$'.$detalle['Total'].'</td>
</tr>


</tbody>
</table>';






$pdf->writeHTML($tbl, true, false, false, false, '');

// $pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

//Close and output PDF document
$pdf->Output('Factura.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+