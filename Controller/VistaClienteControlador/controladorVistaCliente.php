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

    public function listaTallasProducto($idProducto){
        $crudVista = new crudVista();
        return $crudVista->ObtenerTallasProducto($idProducto);
    }

    public function consultarColor($idProducto, $talla){
        $crudVista = new crudVista();
        return $crudVista->consultarColores($idProducto, $talla);
    }
}

$controladorVistaCliente = new controladorVistaCliente();

if(isset($_POST['consultarColor'])){
    echo json_encode($controladorVistaCliente->consultarColor($_POST['idProducto'], $_POST['talla']));
}


?>