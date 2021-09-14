<?php
require("../../Model/conexion.php");
require("../../Model/ProduccionModelo/producto.php");
require("../../Model/ProduccionModelo/crudProducto.php");
require("../../Model/ProduccionModelo/detalleProducto.php");

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

        public function registrarProducto($nombre,$descripcion,$precio,$idCategoria,$imagen1,$imagen2,$imagen3){

            $iva = (19 * $precio)/100;
            $precioConIva = $iva + $precio;

            $producto = new Producto();
            $producto->setNombre($nombre);
            $producto->setDescripcion($descripcion);
            $producto->setPrecio($precioConIva);
            $producto->setCategoria($idCategoria);
            $producto->setImagen1($imagen1);
            $producto->setImagen2($imagen2);
            $producto->setImagen3($imagen3);

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
            return $crudProducto->eliminarProducto($idProducto);
            header("Location: ../../View/ProduccionVista/productos.php");
        }

        //AQUÍ FINALIZA DE MOMENTO LAS TRANSACCIONES DE LA TABLA PRODUCTOS E INICIA LAS DE IMAGENES DEL PRODUCTOS
        public function actualizarImagen1Producto($nuevaImagen1, $idProducto){
            $crudProducto = new CrudProducto();
            $crudProducto->actualizarImagen1Producto($nuevaImagen1,$idProducto);
            header("Location: ../../View/ProduccionVista/productos.php");
        }

        public function actualizarImagen2Producto($nuevaImagen2,$idProducto){
            $crudProducto = new CrudProducto();
            $crudProducto->actualizarImagen2Producto($nuevaImagen2,$idProducto);
            header("Location: ../../View/ProduccionVista/productos.php");
        }

        public function actualizarImagen3Producto($nuevaImagen3,$idProducto){
            $crudProducto = new CrudProducto();
            $crudProducto->actualizarImagen3Producto($nuevaImagen3,$idProducto);
            header("Location: ../../View/ProduccionVista/productos.php");
        }

        public function actualizarTodasLasImagenes($nuevaImagen1,$nuevaImagen2,$nuevaImagen3,$idProducto){
            $crudProducto = new CrudProducto();
            $crudProducto->actualizarTodasLasImagenes($nuevaImagen1,$nuevaImagen2,$nuevaImagen3,$idProducto);
            header("Location: ../../View/ProduccionVista/productos.php");
        }

        //ENTRADAS Y DETALLES DEL PRODUCTO!!!

        public function listarEntradasProducto($idProducto){
            $crudProducto = new CrudProducto();
           return $crudProducto->obtenerEntradasProductos($idProducto);
        }

        public function buscarEntradaProducto($idDetalleProducto){
            $crudProducto = new CrudProducto();
          return $crudProducto->buscarEntradaProducto($idDetalleProducto);
        }

        public function guardarEntradasProducto($color,$talla,$cantidad,$idProducto){

            $crudProducto = new CrudProducto();
            return $crudProducto->registrarEntradasProducto($color,$talla,$cantidad,$idProducto);
            header("Location: ../../View/ProduccionVista/detalleProducto.php?idProducto=" . $idProducto);
        }

        public function sumarNuevaCantidadDeEntrada($nuevaCantidad, $idDetalleProducto, $idProducto){
            $crudProducto = new CrudProducto();
            $crudProducto->sumarNuevaCantidadDeEntrada($nuevaCantidad, $idDetalleProducto);
            header("Location: ../../View/ProduccionVista/detalleProducto.php?idProducto=".$idProducto);

            
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

    }

    $controladorProductos = new ControladorProductos();

    //Registrar Producto
    if(isset($_POST['registrarProducto'])){

        $nombreFoto1 = $_FILES['foto1']['name'];
        $tipoArchivo1 = $_FILES['foto1']['type'];
        $tamanoImagen1 = $_FILES['foto1']['size'];
       

        $nombreFoto2 = $_FILES['foto2']['name'];
        $tipoArchivo2 = $_FILES['foto2']['type'];
        $tamanoImagen2 = $_FILES['foto2']['size'];
       

        $nombreFoto3 = $_FILES['foto3']['name'];
        $tipoArchivo3 = $_FILES['foto3']['type'];
        $tamanoImagen3 = $_FILES['foto3']['size'];

        //var_dump($nombreFoto1,$nombreFoto2,$nombreFoto3);

        if($tamanoImagen1 || $tamanoImagen2 || $tamanoImagen3 <= 5097152){

                if($tipoArchivo1 || $tipoArchivo2 || $tipoArchivo3 == "image/jpeg" || $tipoArchivo1 || $tipoArchivo2 || $tipoArchivo3 == "image/jpg" || $tipoArchivo1 || $tipoArchivo2 || $tipoArchivo3 == "image/png"){
                    //Ruta de la carpte a de destino en el servido , es decir , donde va a quedar alojada la imagen.
                    $carpetaDestino = $_SERVER['DOCUMENT_ROOT'].'/MadaWebSistema/images/productos/';

                    //Con la función move_uploaded_file movemos la foto de la capeta temporal a la ruta de destino que establecimos arriba.
                    move_uploaded_file($_FILES['foto1']['tmp_name'],$carpetaDestino.$nombreFoto1);
                    move_uploaded_file($_FILES['foto2']['tmp_name'],$carpetaDestino.$nombreFoto2);
                    move_uploaded_file($_FILES['foto3']['tmp_name'],$carpetaDestino.$nombreFoto3);

                    $mensaje = $controladorProductos->registrarProducto($_POST['nombreProducto'],$_POST['descripcionProducto'],$_POST['precioProducto'],$_POST['categoria'], $nombreFoto1,$nombreFoto2,$nombreFoto3);

                   
                }

                else{
                    echo "<script>
                    location.replace('../../View/ProduccionVista/productos.php');
                    alert('El formato seleccionado no corresponde a una imagen.');
                    </script>";
                }
            }

                else{
                    echo "<script>
                    location.replace('../../View/ProduccionVista/productos.php');
                    alert('La imagen super el tamaño esperado. Debe ser menor o igual a 5Mb');
                    </script>";
                    }


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

    //ACTUALIZAR IMAGENES DE LOS PRODUCTOS
    if(isset($_POST['editarImagen1'])){
        
        $idProducto =  $_POST['idProducto']; 
        $nuevaImagen1 = $_FILES['imagen1Nueva']['name'];
        $tipoArchivo = $_FILES['imagen1Nueva']['type'];
        $tamanoImagen = $_FILES['imagen1Nueva']['size'];
        $imagenAntigua = $_POST['imagen1Antigua'];

        //var_dump($idProducto,$imagenAntigua);

        if($tamanoImagen <= 5097152){

            if($tipoArchivo == "image/jpeg" || $tipoArchivo == "image/jpg" || $tipoArchivo == "image/png"){
                //Ruta de la carpte a de destino en el servido , es decir , donde va a quedar alojada la imagen.
                $carpetaDestino = $_SERVER['DOCUMENT_ROOT'].'/MadaWebSistema/images/productos/';
                //Con la función move_uploaded_file movemos la foto de la capeta temporal a la ruta de destino que establecimos arriba.

                $carpetaDestinoEliminarFoto = $_SERVER['DOCUMENT_ROOT']."/MadaWebSistema/images/productos/$imagenAntigua";
                unlink($carpetaDestinoEliminarFoto);

                move_uploaded_file($_FILES['imagen1Nueva']['tmp_name'],$carpetaDestino.$nuevaImagen1);
                $controladorProductos->actualizarImagen1Producto($nuevaImagen1,$idProducto);

                
            }
    
            else{
                echo "<script>
                location.replace('../../View/ProduccionVista/productos.php');
                alert('El formato seleccionado no corresponde a una imagen.');
                </script>";
            }
        }
    
        else{
            echo "<script>
            location.replace('../../View/ProduccionVista/productos.php');
            alert('La imagen supera el tamaño esperado. Debe ser menor o igual a 5Mb');
        </script>";
        }

    }

    if(isset($_POST['editarImagen2'])){

        $idProducto =  $_POST['idProducto']; 
        $nuevaImagen2 = $_FILES['imagen2Nueva']['name'];
        $tipoArchivo = $_FILES['imagen2Nueva']['type'];
        $tamanoImagen = $_FILES['imagen2Nueva']['size'];
        $imagenAntigua = $_POST['imagen2Antigua'];

        //var_dump($idProducto,$imagenAntigua);

        if($tamanoImagen <= 5097152){

            if($tipoArchivo == "image/jpeg" || $tipoArchivo == "image/jpg" || $tipoArchivo == "image/png"){
                //Ruta de la carpte a de destino en el servido , es decir , donde va a quedar alojada la imagen.
                $carpetaDestino = $_SERVER['DOCUMENT_ROOT'].'/MadaWebSistema/images/productos/';
                //Con la función move_uploaded_file movemos la foto de la capeta temporal a la ruta de destino que establecimos arriba.

                $carpetaDestinoEliminarFoto = $_SERVER['DOCUMENT_ROOT']."/MadaWebSistema/images/productos/$imagenAntigua";
                unlink($carpetaDestinoEliminarFoto);

                move_uploaded_file($_FILES['imagen2Nueva']['tmp_name'],$carpetaDestino.$nuevaImagen2);
                $controladorProductos->actualizarImagen2Producto($nuevaImagen2,$idProducto);
            }
    
            else{
                echo "<script>
                location.replace('../../View/ProduccionVista/productos.php');
                alert('El formato seleccionado no corresponde a una imagen.');
                </script>";
            }
        }
    
        else{
            echo "<script>
            location.replace('../../View/ProduccionVista/productos.php');
            alert('La imagen supera el tamaño esperado. Debe ser menor o igual a 5Mb');
        </script>";
        }
        
    }

    if(isset($_POST['editarImagen3'])){

        $idProducto =  $_POST['idProducto']; 
        $nuevaImagen3 = $_FILES['imagen3Nueva']['name'];
        $tipoArchivo = $_FILES['imagen3Nueva']['type'];
        $tamanoImagen = $_FILES['imagen3Nueva']['size'];
        $imagenAntigua = $_POST['imagen3Antigua'];

        //var_dump($idProducto,$imagenAntigua);

        if($tamanoImagen <= 5097152){

            if($tipoArchivo == "image/jpeg" || $tipoArchivo == "image/jpg" || $tipoArchivo == "image/png"){
                //Ruta de la carpte a de destino en el servido , es decir , donde va a quedar alojada la imagen.
                $carpetaDestino = $_SERVER['DOCUMENT_ROOT'].'/MadaWebSistema/images/productos/';
                //Con la función move_uploaded_file movemos la foto de la capeta temporal a la ruta de destino que establecimos arriba.
                $carpetaDestinoEliminarFoto = $_SERVER['DOCUMENT_ROOT']."/MadaWebSistema/images/productos/$imagenAntigua";
                unlink($carpetaDestinoEliminarFoto);
                
                move_uploaded_file($_FILES['imagen3Nueva']['tmp_name'],$carpetaDestino.$nuevaImagen3);
                $controladorProductos->actualizarImagen3Producto($nuevaImagen3,$idProducto);
            }
    
            else{
                echo "<script>
                location.replace('../../View/ProduccionVista/productos.php');
                alert('El formato seleccionado no corresponde a una imagen.');
                </script>";
            }
        }
    
        else{
            echo "<script>
            location.replace('../../View/ProduccionVista/productos.php');
            alert('La imagen supera el tamaño esperado. Debe ser menor o igual a 5Mb');
        </script>";
        }
    }

    if(isset($_POST['editarTodasImagenes'])){

        $idProducto =  $_POST['idProducto']; 

        $nuevaImagen1 = $_FILES['imagen1Nueva']['name'];
        $tipoArchivo1 = $_FILES['imagen1Nueva']['type'];
        $tamanoImagen1 = $_FILES['imagen1Nueva']['size'];
        $imagenAntigua1 = $_POST['imagen1Antigua'];

        $nuevaImagen2 = $_FILES['imagen2Nueva']['name'];
        $tipoArchivo2 = $_FILES['imagen2Nueva']['type'];
        $tamanoImagen2 = $_FILES['imagen2Nueva']['size'];
        $imagenAntigua2 = $_POST['imagen2Antigua'];

        $nuevaImagen3 = $_FILES['imagen3Nueva']['name'];
        $tipoArchivo3 = $_FILES['imagen3Nueva']['type'];
        $tamanoImagen3 = $_FILES['imagen3Nueva']['size'];
        $imagenAntigua3 = $_POST['imagen3Antigua'];

        //var_dump($idProducto,$imagenAntigua);

        if($tamanoImagen1 <= 5097152 && $tamanoImagen2 <= 5097152 && $tamanoImagen3 <= 5097152){

            if($tipoArchivo1 == "image/jpeg" || $tipoArchivo1 == "image/jpg" || $tipoArchivo1 == "image/png" && $tipoArchivo2 == "image/jpeg" || $tipoArchivo2 == "image/jpg" || $tipoArchivo2 == "image/png" && $tipoArchivo3 == "image/jpeg" || $tipoArchivo3 == "image/jpg" || $tipoArchivo3 == "image/png"  ){
                //Ruta de la carpte a de destino en el servido , es decir , donde va a quedar alojada la imagen.
                $carpetaDestino = $_SERVER['DOCUMENT_ROOT'].'/MadaWebSistema/images/productos/';
                //Con la función move_uploaded_file movemos la foto de la capeta temporal a la ruta de destino que establecimos arriba.

                $carpetaDestinoEliminarFoto1 = $_SERVER['DOCUMENT_ROOT']."/MadaWebSistema/images/productos/$imagenAntigua1";
                $carpetaDestinoEliminarFoto2 = $_SERVER['DOCUMENT_ROOT']."/MadaWebSistema/images/productos/$imagenAntigua2";
                $carpetaDestinoEliminarFoto3 = $_SERVER['DOCUMENT_ROOT']."/MadaWebSistema/images/productos/$imagenAntigua3";
        
                unlink($carpetaDestinoEliminarFoto1);
                unlink($carpetaDestinoEliminarFoto2);
                unlink($carpetaDestinoEliminarFoto3);

                move_uploaded_file($_FILES['imagen1Nueva']['tmp_name'],$carpetaDestino.$nuevaImagen1);
                move_uploaded_file($_FILES['imagen2Nueva']['tmp_name'],$carpetaDestino.$nuevaImagen2);
                move_uploaded_file($_FILES['imagen3Nueva']['tmp_name'],$carpetaDestino.$nuevaImagen3);
                $controladorProductos->actualizarTodasLasImagenes($nuevaImagen1,$nuevaImagen2,$nuevaImagen3,$idProducto);
            }
    
            else{
                echo "<script>
                location.replace('../../View/ProduccionVista/productos.php');
                alert('El formato seleccionado no corresponde a una imagen.');
                </script>";
            }
        }
    
        else{
            echo "<script>
            location.replace('../../View/ProduccionVista/productos.php');
            alert('La imagen supera el tamaño esperado. Debe ser menor o igual a 5Mb');
        </script>";
        }
        
    }
    // FINALIZA EDITAR IMAGENES DEL PRODUCTO

    if(isset($_POST['eliminarProducto'])){

        $imagen1 = $_POST['imagen1'];
        $imagen2 = $_POST['imagen2'];
        $imagen3 = $_POST['imagen3'];

        $mensaje = $controladorProductos->eliminarProducto($_POST['IdProducto']);

        if($mensaje != "Existen  entradas relacionadas al producto"){
            $carpetaDestinoEliminarFoto1 = $_SERVER['DOCUMENT_ROOT']."/MadaWebSistema/images/productos/$imagen1";
            $carpetaDestinoEliminarFoto2 = $_SERVER['DOCUMENT_ROOT']."/MadaWebSistema/images/productos/$imagen2";
            $carpetaDestinoEliminarFoto3 = $_SERVER['DOCUMENT_ROOT']."/MadaWebSistema/images/productos/$imagen3";

            unlink($carpetaDestinoEliminarFoto1); 
            unlink($carpetaDestinoEliminarFoto2); 
            unlink($carpetaDestinoEliminarFoto3); 
        }
 
        if($mensaje == "Existen  entradas relacionadas al producto"){
            echo "<script>
                location.replace('../../View/ProduccionVista/productos.php');
                alert('No puedes eliminar el producto debido a que contiene entradas');
              </script>";
        }else{
            echo "<script>
                location.replace('../../View/ProduccionVista/productos.php');
                alert('Producto eliminado de manera correcta');
              </script>";
        }
        //LA AVRIABLE GLOBAL SERVER CON 'DOCUMENT_ROOT' 
        //El directorio raíz de documentos del servidor en el cual se está ejecutando
        //el script actual, según está definida en el archivo de configuración del servidor.
        //ES DECIR, EN ESTE CASO, SE UBICA EN HTDOCS
        
        //UNLINK ELIMINA UN FICHERO DE UNA RUTA ESPECIFICA, RECIBE COMO PARAMETRO ESA RUTA CON EL NOMBRE DEL FICHERO
    }

    //AQUÍ FINALIZA DE MOMENTO LAS TRANSACCIONES DE LA TABLA PRODUCTOS E INICIA LAS DE DETALLE DEL PRODUCTO

    //ENTRADAS Y DETALLES DEL PRODUCTO!!!

    //Buscar producto para agregar el detalle.
    if(isset($_POST["agregarDetalle"])){
        header("Location: ../../View/ProduccionVista/detalleProducto.php?idProducto=" . $_POST["IdProducto"]);
    }   

    if(isset($_POST["buscarEntradas"])){
        header("Location: ../../View/ProduccionVista/entradasProducto.php?idProducto=" . $_POST["IdProducto"]);
    }

    if(isset($_POST['guardarEntrada'])){
     $mensaje = $controladorProductos->guardarEntradasProducto($_POST['color'],$_POST['talla'],$_POST['cantidad'],$_POST['idProducto']);

        if($mensaje ==  "La entrada de este producto ya existe"){
            echo "<script>
            location.replace('../../View/ProduccionVista/productos.php');
            alert('Ingreso un detalle existente para el producto, verifique he intente nuevamente.');
          </script>";
        }else{
            echo "<script>
            location.replace('../../View/ProduccionVista/productos.php');
            alert('Registro de detalles exitoso');
          </script>";
        }
    }

    if(isset($_POST['agregarCantidadEntrada'])){
        header("Location: ../../View/ProduccionVista/agregarCantidadEntrada.php?idDetalleProducto=".$_POST["IdDetalleProducto"]);
    }

    if(isset($_POST['guardarNuevaCantidadEntrada'])){
        $controladorProductos->sumarNuevaCantidadDeEntrada($_POST['nuevaCantidad'],$_POST['idDetalleProducto'],$_POST['idProducto']);
    }

    //Volver a la vista de las entradas del producto seleccionado
    if(isset($_POST['volverAentradasDelProducto'])){
        header("Location: ../../View/ProduccionVista/detalleProducto.php?idProducto=".$_POST["idProducto"]);
    }

    if(isset($_POST['cambiarEstadoEntrada'])){
        $controladorProductos->cambiarEstadoEntradaProducto($_POST['estadoDetalle'],$_POST['IdDetalleProducto'],$_POST['idProducto']);
    }

    if(isset($_POST['eliminarEntrada'])){
        $controladorProductos->eliminarEntradaProducto($_POST['IdDetalleProducto'],$_POST['idProducto']);
    }
