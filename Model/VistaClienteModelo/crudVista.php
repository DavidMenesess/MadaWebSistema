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
    
}



?>