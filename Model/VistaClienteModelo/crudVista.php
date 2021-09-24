<?php

class crudVista{

    public function listarProductosVista(){
        $Db = Db::Conectar();
        $sql= $Db->query("SELECT * FROM productos WHERE Estado = 1");
        $sql->execute();
        Db::CerrarConexion($Db);
        return $sql->fetchAll();
    }

    public function listarCategoriasVista()
    {
        $Db = Db::Conectar(); //cadena de conexion
        $sql = $Db->query('SELECT * FROM categorias WHERE Estado = 1'); //definicion de sql
        $sql->execute(); //ejectar la consulta
        Db::CerrarConexion($Db);
        return $sql->fetchAll(); //retornar todo el listado de la consulta

    }

    public function obtenerDatosProducto($idProducto){
        $Db = Db::Conectar();
		$sql = $Db -> query("SELECT * FROM productos WHERE IdProducto = $idProducto");
		$sql -> execute();
	    Db::CerrarConexion($Db);
	    return $sql -> fetch();
    }

    public function listarProductosCategoria($IdCategoria){
    	$Db = Db::Conectar();
		$sql = $Db -> query("SELECT `productos`.`Imagen1`, `productos`.`NombreProducto`, `productos`.`Precio`, `productos`.`IdProducto`, `categorias`.`NombreCategoria`\n"

    . "FROM `productos` \n"

    . " LEFT JOIN `categorias` ON `productos`.`IdCategoria` = `categorias`.`IdCategoria`\n"

    . "    \n"

    . "    WHERE `productos`.`IdCategoria` = $IdCategoria  AND `productos`.`Estado` = 1");
		$sql -> execute();
	    Db::CerrarConexion($Db);
	    return $sql -> fetchAll();
    }

    public function obtenerNombreCategoria($idCategoria){
        $Db = Db::Conectar();
        $sql = $Db -> query("SELECT NombreCategoria FROM categorias WHERE IdCategoria = $idCategoria");
        $sql -> execute();
        Db::CerrarConexion($Db);
        return $sql ->fetch();
    }

    public function ObtenerTallasProducto($idProducto){
        $Db = Db::Conectar();
        $sql = $Db -> query("SELECT DISTINCT(Talla) FROM detalle_productos WHERE IdProducto = $idProducto AND Estado = 1");
        $sql-> execute();
        Db::CerrarConexion($Db);
        return $sql->fetchAll();
    }
    
}



?>