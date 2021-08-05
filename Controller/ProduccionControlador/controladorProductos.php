<?php
require("../../Model/conexion.php");
require("../../Model/ProduccionModelo/producto.php");
require("../../Model/ProduccionModelo/crudProducto.php");

    class ControladorProductos{

        public function __construct(){

        }

        public function listarProductos(){
            $crudProducto = new CrudProducto();
            return $crudProducto->listarProductos();
        }

        public function listarCategorias(){
            $crudProducto = new CrudProducto();
            return $crudProducto->obtenerCategorias();
        }

    }

    $controladorProductos = new ControladorProductos();

    if(isset($_POST["agregarDetalle"])){
        header("Location: ../../View/ProduccionVista/detalleProducto.php" . $_POST["IdProducto"]);
    }
?>