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

        public function buscarProducto($idProducto){
            $crudProducto = new CrudProducto();
            return $crudProducto->buscarProducto($idProducto);
        }

        public function registrarProducto($nombre,$descripcion,$precio,$idCategoria){

            $iva = (19 * $precio)/100;
            $precioConIva = $iva + $precio;

            $producto = new Producto();
            $producto->setNombre($nombre);
            $producto->setDescripcion($descripcion);
            $producto->setPrecio($precioConIva);
            $producto->setCategoria($idCategoria);

            $crudProducto = new CrudProducto();

            return $crudProducto->registrarProducto($producto);
            header("Location: ../../View/ProduccionVista/productos.php");


        }

    }

    $controladorProductos = new ControladorProductos();

    //Registrar Producto
    if(isset($_POST['registrarProducto'])){
        $mensaje = $controladorProductos->registrarProducto($_POST['nombreProducto'],$_POST['descripcionProducto'],$_POST['precioProducto'],$_POST['categoria']);

        if($mensaje == "El producto ya existe"){

            echo "<script>
				location.replace('../../View/ProduccionVista/productos.php');
				alert('Ya existe un producto con ese nombre');
			  </script>";

        }else{
            echo "<script>
				location.replace('../../View/ProduccionVista/productos.php');
				alert('Registro realizado con éxito');
			  </script>";
        }

    }

    //Buscar producto para agregar el detalle.
    if(isset($_POST["agregarDetalle"])){
        header("Location: ../../View/ProduccionVista/detalleProducto.php?idProducto=" . $_POST["IdProducto"]);
    }
?>