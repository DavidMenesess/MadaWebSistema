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

    }

    $controladorProductos = new ControladorProductos();

?>