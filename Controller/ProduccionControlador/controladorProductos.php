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

        public function cambiarEstadoProducto($idProducto,$estadoActual){

            $estadoActualizado = null;

            if($estadoActual == 1){
                $estadoActualizado = 0;
            }elseif($estadoActual == 0){
                $estadoActualizado = 1;
            }

            $productoEstado = new Producto();
            $productoEstado->setId($idProducto);
            $productoEstado->setEstado($estadoActualizado);

            $crudProducto = new CrudProducto();
            $crudProducto->actualizarEstadoProducto($productoEstado);
            header("Location: ../../View/ProduccionVista/productos.php");
        }

        public function editarInformacionProducto($idProducto,$nombre,$descripcion,$precioNuevo,$categoria,$precioActual){

            $producto = new Producto();

            if($precioActual == $precioNuevo){
                $producto->setPrecio($precioActual);
            }
            elseif($precioActual != $precioNuevo){
                $iva = (19 * $precioNuevo)/100;
                $precioConIva = $iva + $precioNuevo;
                $producto->setPrecio($precioConIva);
            }

            $producto->setId($idProducto);
            $producto->setNombre($nombre);
            $producto->setDescripcion($descripcion);
            
            $producto->setCategoria($categoria);

            $crudProducto = new CrudProducto();
            $crudProducto->actualizarDatosProducto($producto);
            header("Location: ../../View/ProduccionVista/productos.php");
        }

        public function eliminarProducto($idProducto){

            $crudProducto = new CrudProducto();
            $crudProducto->eliminarProducto($idProducto);
            header("Location: ../../View/ProduccionVista/productos.php");
        }

        //ENTRADAS Y DETALLES DEL PRODUCTO!!!

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

    if(isset($_POST['cambiarEstado'])){

        $controladorProductos->cambiarEstadoProducto($_POST['IdProducto'],$_POST['estadoProducto']);

    }

    //Lllevar a la vista de editar
    if(isset($_POST['editarProducto'])){
        header('Location: ../../View/ProduccionVista/editarProducto.php?idProducto='.$_POST['IdProducto']);
    }

    if(isset($_POST['actualizarDatosProducto'])){
        $controladorProductos->editarInformacionProducto($_POST['idProducto'],$_POST['nombre'],$_POST['descripcion'],$_POST['precioNuevo'],$_POST['categoria'],$_POST['precioActual']);
    }

    //Buscar producto para agregar el detalle.
    if(isset($_POST["agregarDetalle"])){
        header("Location: ../../View/ProduccionVista/detalleProducto.php?idProducto=" . $_POST["IdProducto"]);
    }

    if(isset($_POST['eliminarProducto'])){
        $controladorProductos->eliminarProducto($_POST['IdProducto']);
    }

    //ENTRADAS Y DETALLES DEL PRODUCTO!!!

?>