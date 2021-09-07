<?php

class Ventas{
	private $IdPedido;
	private $IdDetallePedido;
	private $FechaPedido;
	private $SubTotal;
	private $TotalIva;
	private $Total;
	private $IdEstadoPedido;
	private $IdUsuario;
	private $Anulado;
	private $Observacion;

	public function __construct(){}

	//SETTES
	public function setIdPedido($IdPedido){
		$this -> IdPedido = $IdPedido;
	}
	public function setFechaPedido($FechaPedido){
		$this -> FechaPedido = $FechaPedido;
	}
	public function setSubTotal($SubTotal){
		$this -> SubTotal = $SubTotal;
	}
	public function setTotalIva($TotalIva){
		$this -> TotalIva = $TotalIva;
	}
	public function setTotal($Total){
		$this -> Total = $Total;
	}
	public function setIdEstadoPedido($IdEstadoPedido){
		$this -> IdEstadoPedido = $IdEstadoPedido;
	}
	public function setIdUsuario($IdUsuario){
		$this -> IdUsuario = $IdUsuario;
	}
	public function setAnulado($Anulado){
		$this -> Anulado = $Anulado;
	}
	public function setIdDetallePedido($IdDetallePedido){
		$this -> IdDetallePedido = $IdDetallePedido;
	}
	public function setObservacion($Observacion){
		$this -> Observacion = $Observacion;
	}

	//GETTES
	public function getIdPedido(){
		return $this -> IdPedido;
	}
	public function getFechaPedido(){
		return $this -> FechaPedido;
	}
	public function getSubTotal(){
		return $this -> SubTotal;
	}
	public function getTotalIva(){
		return $this -> TotalIva;
	}
	public function getTotal(){
		return $this -> Total;
	}
	public function getIdEstadoPedido(){
		return $this -> IdEstadoPedido;
	}
	public function getIdUsuario(){
		return $this -> IdUsuario;
	}
	public function getAnulado(){
		return $this -> Anulado;
	}
	public function getIdDetallePedido(){
		return $this -> IdDetallePedido;
	}
	public function getObservacion(){
		return $this -> Observacion;
	}

 

}

?>