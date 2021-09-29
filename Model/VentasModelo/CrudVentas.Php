<?php

class CrudVentas{

	public function _construct(){}

	public function listarVentas(){
		$Db = Db::Conectar();

		$sql = $Db -> query("SELECT `pedidos`.`IdPedido`, `pedidos`.`FechaPedido`,  `pedidos`.`Total`, `pedidos`.`IdEstadoPedido`, `pedidos`.`IdUsuario`, `usuarios`.`Nombre`\n"

    . "FROM `pedidos` \n"

    . "	LEFT JOIN `usuarios` ON `pedidos`.`IdUsuario` = `usuarios`.`IdUsuario` \n"

    . "	LEFT JOIN `estados_pedidos` ON `pedidos`.`IdEstadoPedido` = `estados_pedidos`.`IdEstadoPedido`

    	WHERE `pedidos`.`IdEstadoPedido` <=3");
		$sql -> execute();
		Db::CerrarConexion($Db);
		return $sql -> fetchAll();

	}


	public function listarCategoria(){
		$Db = Db::Conectar();

		$sql = $Db -> query("SELECT * FROM `categorias` WHERE IdCategoria = 3 ");
		$sql -> execute();
		Db::CerrarConexion($Db);
		return $sql -> fetchAll();

	}

	public function listarVentasEnviadas(){
		$Db = Db::Conectar();

		$sql = $Db -> query("SELECT `pedidos`.`IdPedido`, `pedidos`.`FechaPedido`, `pedidos`.`Subtotal`, `pedidos`.`Total`, `pedidos`.`IdEstadoPedido`, `pedidos`.`IdUsuario`, `usuarios`.`Nombre`\n"

    . "FROM `pedidos` \n"

    . "	LEFT JOIN `usuarios` ON `pedidos`.`IdUsuario` = `usuarios`.`IdUsuario` \n"

    . "	LEFT JOIN `estados_pedidos` ON `pedidos`.`IdEstadoPedido` = `estados_pedidos`.`IdEstadoPedido`

    	WHERE `pedidos`.`IdEstadoPedido` =4");
		$sql -> execute();
		Db::CerrarConexion($Db);
		return $sql -> fetchAll();
		
	}

	public function listarDetalleVenta($IdPedido){
		$Db = Db::Conectar();

		$sql = $Db->query("SELECT `usuarios`.`Nombre`, `usuarios`.`Apellido`, `usuarios`.`Correo`, `usuarios`.*, `pedidos`.`FechaPedido`, `pedidos`.`Total`,  `pedidos`.`IdEstadoPedido`, `pedidos`.*\n"

    . "FROM `usuarios` \n"

    . "	LEFT JOIN `pedidos` ON `pedidos`.`IdUsuario` = `usuarios`.`IdUsuario`"

    . "    \n"

    . "    WHERE `pedidos`.`IdPedido` = $IdPedido");
		$sql -> execute();
		Db::CerrarConexion($Db);
		return $sql -> fetch();
	}


	public function listarProductosVendidos($IdPedido){
		$Db = Db::Conectar();

		$sql = $Db->query("SELECT `productos`.`IdProducto`, `productos`.`NombreProducto`, `detalle_productos`.`Color`,`detalle_productos`.`IdDetalleProducto`,`detalle_pedidos`.`Anulado`, `detalle_pedidos`.`IdDetallePedido`, `detalle_pedidos`.`Cantidad`, `detalle_pedidos`.`ValorUnitario`, `detalle_productos`.`Talla`,`pedidos`.`IdEstadoPedido`,`pedidos`.`IdPedido`, `detalle_productos`.`Stock`\n"

    . "FROM `productos` \n"

    . "	LEFT JOIN `detalle_productos` ON `detalle_productos`.`IdProducto` = `productos`.`IdProducto` \n"

    . "	LEFT JOIN `detalle_pedidos` ON `detalle_pedidos`.`IdDetalleProducto` = `detalle_productos`.`IdDetalleProducto` \n"

    . "	LEFT JOIN `pedidos` ON `detalle_pedidos`.`IdPedido` = `pedidos`.`IdPedido`\n"

    . "    \n"

    . "   	WHERE `pedidos`.`IdPedido` = $IdPedido  and  `detalle_pedidos`.`Anulado` = 0");
		$sql -> execute();
		Db::CerrarConexion($Db);
		return $sql -> fetchAll();

		// and  `detalle_pedidos`.`Anulado` = 0

	}
	public function listarProductosAnulados($IdPedido){
		$Db = Db::Conectar();

		$sql = $Db->query("SELECT `productos`.`IdProducto`, `productos`.`NombreProducto`, `detalle_productos`.`Color`,`detalle_productos`.`IdDetalleProducto`,`detalle_pedidos`.`Anulado`,`detalle_pedidos`.`Observacion`, `detalle_pedidos`.`IdDetallePedido`, `detalle_pedidos`.`Cantidad`, `detalle_pedidos`.`ValorUnitario`, `detalle_productos`.`Talla`,`pedidos`.`IdEstadoPedido`,`pedidos`.`IdPedido`, `detalle_productos`.`Stock`\n"

    . "FROM `productos` \n"

    . "	LEFT JOIN `detalle_productos` ON `detalle_productos`.`IdProducto` = `productos`.`IdProducto` \n"

    . "	LEFT JOIN `detalle_pedidos` ON `detalle_pedidos`.`IdDetalleProducto` = `detalle_productos`.`IdDetalleProducto` \n"

    . "	LEFT JOIN `pedidos` ON `detalle_pedidos`.`IdPedido` = `pedidos`.`IdPedido`\n"

    . "    \n"

    . "   	WHERE `pedidos`.`IdPedido` = $IdPedido  and  `detalle_pedidos`.`Anulado` = 1");
		$sql -> execute();
		Db::CerrarConexion($Db);
		return $sql -> fetchAll();

	}




	public function anularProductoVenta($ventas){
		$mensaje = " ";
		$Db = Db::Conectar();
		$sql = $Db->prepare('UPDATE detalle_pedidos SET
	    	Anulado=1,
	    	Observacion=:Observacion
	    	WHERE IdDetallePedido = :IdDetallePedido');
		

		$sql->bindvalue('IdDetallePedido',$ventas->getIdDetallePedido());
		$sql->bindvalue('Observacion',$ventas->getObservacion());
		
		try{
	    	$sql->execute();
	    	$mensaje= "Modificación cool";
	    }catch(Exception $e){
	    	$mensaje = $e->getMessage();
	    }

		Db::CerrarConexion($Db);
		return $mensaje;

	}

	public function aumentarStock($TotalStock,$IdDetalleProducto){

		$Db = Db::Conectar();

		$sql = $Db->query("UPDATE detalle_productos SET
		Stock = $TotalStock
		WHERE IdDetalleProducto = $IdDetalleProducto");//Stock

		try{
	    	$sql->execute();
	    	$mensaje= "Modificación cool";
	    }catch(Exception $e){
	    	$mensaje = $e->getMessage();
	    }

		Db::CerrarConexion($Db);
		return $mensaje;
	}

	public function preciosProductoVenta($ventas){

		$mensaje = " ";
		$Db = Db::Conectar();
		$sql = $Db->prepare('UPDATE pedidos SET
	    	SubTotal=:SubTotal,
	    	Total=:Total
	    	WHERE IdPedido = :IdPedido');

		$sql->bindvalue('IdPedido',$ventas->getIdPedido());
		$sql->bindvalue('SubTotal',$ventas->getSubTotal());
		$sql->bindvalue('Total',$ventas->getTotal());

		try{
	    	$sql->execute();
	    	$mensaje= "Modificación cool";
	    }catch(Exception $e){
	    	$mensaje = $e->getMessage();
	    }

		Db::CerrarConexion($Db);
		return $mensaje;
	}

	public function cambiarEstado($ventas){
		$mensaje="";
	    $Db = Db::Conectar();

	    $sql = $Db ->prepare('UPDATE pedidos SET
	    	IdEstadoPedido=:IdEstadoPedido
	    	WHERE IdPedido = :IdPedido');
	    $sql->bindvalue('IdEstadoPedido',$ventas->getIdEstadoPedido());
	    $sql->bindvalue('IdPedido',$ventas->getIdPedido());

	    try{
	    	$sql->execute();
	    	$mensaje= "Modificación cool";
	    }catch(Exception $e){
	    	$mensaje = $e->getMessage();
	    }
	    Db::CerrarConexion($Db);
	    return $mensaje;

	}

	
}

?>