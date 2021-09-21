<?php
include("../../Model/conexion.php");
include("../../Model/VistaClienteModelo/crudVista.php");


class controladorVistaCliente{

    public function listarProductosVista(){
        $crudVista = new crudVista();
        return $crudVista->listarProductosVista();
    }

    public function listarCategoriasVista(){//metodo para hacer la peticion al modelo productos
       $crudvista = new crudVista();
       return $crudvista-> listarCategoriasVista();
    }

    public function obtenerDatosProducto($idProducto){
        $crudVista = new CrudVista();
		return $crudVista->obtenerDatosProducto($idProducto);
    }

    public function listarProductosCategoria($IdCategoria){
        $crudVista = new CrudVista();
        return $crudVista->listarProductosCategoria($IdCategoria);
    }

    public function obtenerNombreCategoria($idCategoria){
        $crudVista = new CrudVista();
        return $crudVista->obtenerNombreCategoria($idCategoria);
    }

}

$controladorVistaCliente = new controladorVistaCliente();


?>