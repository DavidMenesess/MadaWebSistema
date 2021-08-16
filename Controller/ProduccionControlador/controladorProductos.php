<?php
require("../../Model/conexion.php");
require("../../Model/ProduccionModelo/producto.php");
require("../../Model/ProduccionModelo/crudProducto.php");
require("../../Model/ProduccionModelo/detalleProducto.php");
require("../../Model/ProduccionModelo/productoImagen.php");

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

        //AQUÍ FINALIZA DE MOMENTO LAS TRANSACCIONES DE LA TABLA PRODUCTOS E INICIA LAS DE DETALLE DEL PRODUCTO

        //ENTRADAS Y DETALLES DEL PRODUCTO!!!

        public function listarEntradasProducto($idProducto){
            $crudProducto = new CrudProducto();
           return $crudProducto->obtenerEntradasProductos($idProducto);
        }

        public function guardarEntradasProducto($color,$talla,$cantidad,$idProducto){

            $crudProducto = new CrudProducto();
            return $crudProducto->registrarEntradasProducto($color,$talla,$cantidad,$idProducto);
            header("Location: ../../View/ProduccionVista/detalleProducto.php?idProducto=" . $idProducto);
        }

        public function cambiarEstadoEntradaProducto($estado, $idDetalleProducto,$idProducto){

            $estadoActualizado = null;

            if($estado == 1){
                $estadoActualizado = 0;
            }elseif($estado == 0){
                $estadoActualizado = 1;
            }

            $estadoDetalleProducto = new DetalleProducto();
            $estadoDetalleProducto->setIdDetalleProducto($idDetalleProducto);
            $estadoDetalleProducto->setEstado($estadoActualizado);

            $crudProducto = new CrudProducto();
            //var_dump($estadoDetalleProducto);
            $crudProducto->actualizarEstadoEntradaProducto($estadoDetalleProducto);
            header("Location: ../../View/ProduccionVista/detalleProducto.php?idProducto=" . $idProducto);
        }

        public function eliminarEntradaProducto($idDetalleProducto,$idProducto){
            $crudProducto = new CrudProducto();
            $crudProducto->eliminarEntradaProducto($idDetalleProducto);
            header("Location: ../../View/ProduccionVista/detalleProducto.php?idProducto=" . $idProducto); 
        }

        //AQUÍ FINALIZA LAS TRANSACCIONES DE DETALLE DEL PRODUCTO E INICIA LAS FOTOS DEL PRODUCTO

        //FOTOS

        public function registrarFotos($nombreFoto1,$nombreFoto2,$nombreFoto3,$idProducto){
            $fotos = new Imagen();

            $fotos->setUrlImagen1($nombreFoto1);
            $fotos->setUrlImagen2($nombreFoto2);
            $fotos->setUrlImagen3($nombreFoto3);
            $fotos->setIdProducto($idProducto);
             
    
            $crudProducto = new CrudProducto();
            $crudProducto->registrarFotosProducto($fotos);
            var_dump($fotos);
            header('Location: ../../View/ProduccionVista/productos.php');
        }

        public function buscarFotosProducto($idProducto){
            $crudProducto = new CrudProducto();
           return $crudProducto->buscarFotosProducto($idProducto);
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

    //AQUÍ FINALIZA DE MOMENTO LAS TRANSACCIONES DE LA TABLA PRODUCTOS E INICIA LAS DE DETALLE DEL PRODUCTO

    //ENTRADAS Y DETALLES DEL PRODUCTO!!!


    if(isset($_POST['guardarEntrada'])){
     $mensaje = $controladorProductos->guardarEntradasProducto($_POST['color'],$_POST['talla'],$_POST['cantidad'],$_POST['idProducto']);

        if($mensaje ==  "La entrada de este producto ya existe"){
            echo "<script>
            location.replace('../../View/ProduccionVista/productos.php');
            alert('Ingreso una entrada existente para el producto, verifique las entradas he intente nuevamente.');
          </script>";
        }else{
            echo "<script>
            location.replace('../../View/ProduccionVista/productos.php');
            alert('Registro de entradas exitoso');
          </script>";
        }
    }

    if(isset($_POST['cambiarEstadoEntrada'])){
        $controladorProductos->cambiarEstadoEntradaProducto($_POST['estadoDetalle'],$_POST['IdDetalleProducto'],$_POST['idProducto']);
    }

    if(isset($_POST['eliminarEntrada'])){
        $controladorProductos->eliminarEntradaProducto($_POST['IdDetalleProducto'],$_POST['idProducto']);
    }


    //AQUÍ FINALIZA LAS TRANSACCIONES DE DETALLE DEL PRODUCTO E INICIA LAS FOTOS DEL PRODUCTO

    //FOTOS DEL PRODUCTO

    if(isset($_POST['fotosProducto'])){
        header("Location: ../../View/ProduccionVista/imagenesProducto.php?idProducto=" . $_POST["IdProducto"]);
    }

    if(isset($_POST['registrarFotos'])){

        $nombreFoto1 = $_FILES['foto1']['name'];
        $tipoArchivo1 = $_FILES['foto1']['type'];
        $tamanoImagen1 = $_FILES['foto1']['size'];
        $idProducto = $_POST['idProducto'];

        $nombreFoto2 = $_FILES['foto2']['name'];
        $tipoArchivo2 = $_FILES['foto2']['type'];
        $tamanoImagen2 = $_FILES['foto2']['size'];
        $idProducto = $_POST['idProducto'];

        $nombreFoto3 = $_FILES['foto3']['name'];
        $tipoArchivo3 = $_FILES['foto3']['type'];
        $tamanoImagen3 = $_FILES['foto3']['size'];
        $idProducto = $_POST['idProducto'];

        var_dump($nombreFoto1,$nombreFoto2,$nombreFoto3);

        if($tamanoImagen1 || $tamanoImagen2 || $tamanoImagen3 <= 5097152){

                if($tipoArchivo1 || $tipoArchivo2 || $tipoArchivo3 == "image/jpeg" || $tipoArchivo1 || $tipoArchivo2 || $tipoArchivo3 == "image/jpg" || $tipoArchivo1 || $tipoArchivo2 || $tipoArchivo3 == "image/png"){
                    //Ruta de la carpte a de destino en el servido , es decir , donde va a quedar alojada la imagen.
                    $carpetaDestino = $_SERVER['DOCUMENT_ROOT'].'/MadaWebSistema/images/productos/';

                    //Con la función move_uploaded_file movemos la foto de la capeta temporal a la ruta de destino que establecimos arriba.
                    move_uploaded_file($_FILES['foto1']['tmp_name'],$carpetaDestino.$nombreFoto1);
                    move_uploaded_file($_FILES['foto2']['tmp_name'],$carpetaDestino.$nombreFoto2);
                    move_uploaded_file($_FILES['foto3']['tmp_name'],$carpetaDestino.$nombreFoto3);

                    $controladorProductos->registrarFotos($nombreFoto1,$nombreFoto2,$nombreFoto3,$idProducto);
                }

                else{
                    echo "<script>
                    location.replace('../../View/ProduccionVista/categorias.php');
                    alert('El formato seleccionado no corresponde a una imagen.');
                    </script>";
                }
            }

                else{
                    echo "<script>
                    location.replace('../../View/ProduccionVista/categorias.php');
                    alert('La imagn super el tamaño esperado. Debe ser menor o igual a 5Mb');
                    </script>";
                    }
    }

?>