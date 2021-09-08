<?php
include "../../Model/conexion.php";
include "../../Model/VentasModelo/ventas.php";
include "../../Model/VentasModelo/CrudVentas.php";

class ControladorVentas
{

	public function listarVentas()
	{

		$CrudVentas = new CrudVentas();

		return $CrudVentas->listarVentas();
	}

	public function listarCategoria()
	{
		$CrudVentas = new CrudVentas();

		return $CrudVentas->listarCategoria();
	}

	public function listarVentasEnviadas()
	{
		$CrudVentas = new CrudVentas();

		return $CrudVentas->listarVentasEnviadas();
	}

	public function listarDetalleVenta($IdPedido)
	{

		$CrudVentas = new CrudVentas();

		return $CrudVentas->listarDetalleVenta($IdPedido);
	}
	public function listarProductosVendidos($IdPedido)
	{
		$CrudVentas = new CrudVentas();

		return $CrudVentas->listarProductosVendidos($IdPedido);
	}
	public function listarProductosAnulados($IdPedido)
	{
		$CrudVentas = new CrudVentas();

		return $CrudVentas->listarProductosAnulados($IdPedido);
	}

	public function anularProductoVenta($IdDetallePedido, $SubTotal, $Total, $IdPedido, $TotalStock, $IdDetalleProducto, $Observacion)
	{

		$ventas = new Ventas();
		$ventas->setIdDetallePedido($IdDetallePedido);
		$ventas->setObservacion($Observacion);
		// $ventas -> setTotalIva($TotalIva);
		$ventas->setSubTotal($SubTotal);
		$ventas->setTotal($Total);
		$ventas->setIdPedido($IdPedido);
		$CrudVentas = new CrudVentas();
		$CrudVentas->preciosProductoVenta($ventas);
		$CrudVentas->anularProductoVenta($ventas);
		$CrudVentas->aumentarStock($TotalStock, $IdDetalleProducto);
	}
	public function cambiarEstado($IdEstadoPedido, $IdPedido)
	{
		$ventas = new Ventas();

		$ventas->setIdEstadoPedido($IdEstadoPedido);
		$ventas->setIdPedido($IdPedido);

		$CrudVentas = new CrudVentas();
		$CrudVentas->cambiarEstado($ventas);
		$CrudVentas->aumentarStock($TotalStock, $IdDetalleProducto);
	}
}
$ControladorVentas = new ControladorVentas();
//Redirigir
if (isset($_POST['factura'])) {
	header('Location:../../View/VentasVista/factura.php?IdPedido=' . $_POST['IdPedido']);
}

if (isset($_POST['verDetalleVenta'])) {
	// header('Location:../../Vista/VentasVista/detalleVenta.php?IdPedido='.$_POST['IdPedido']);
	header('Location:../../View/VentasVista/detalleVenta.php?IdPedido=' . $_POST['IdPedido']);
}

if (isset($_POST['anularProductoVenta'])) {
	$ControladorVentas->anularProductoVenta($_POST['IdDetallePedido'], $_POST['SubTotal'], $_POST['Total'], $_POST['IdPedido'], $_POST['TotalStock'], $_POST['IdDetalleProducto'], $_POST['Observacion']);
}

if (isset($_POST['cambiarEstado'])) {
	$ControladorVentas->cambiarEstado($_POST['IdEstadoPedido'], $_POST['IdPedido']);
}
