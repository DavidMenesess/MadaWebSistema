<?php 

include "../../Model/VistaClienteModelo/encriptarDatosCarrito.php";
session_start();

$mensaje ="";

if(isset($_POST['btnAccion'])){

    switch($_POST['btnAccion']){

        case 'Agregar':
            
            if(is_numeric(openssl_decrypt($_POST['idProducto'],COD,KEY))){
                $id = openssl_decrypt($_POST['idProducto'],COD,KEY);

                $cantidad = $_POST['cantidadProducto'];
                $talla = $_POST['tallaProducto'];
                $color = $_POST['colorProducto'];
                $foto = $_POST['fotoProducto'];

                $mensaje = "El id es correcto";

            }
            else{
                $mensaje = "Algo pasa con el id";
            }
            if(is_string((openssl_decrypt($_POST['nombreProducto'],COD,KEY)))){
                $nombre = openssl_decrypt($_POST['nombreProducto'],COD,KEY);

            }
            else{
                $mensaje = "Algo pasa con el nombre";
            }
            if(is_numeric(openssl_decrypt($_POST['precioProducto'],COD,KEY))){
                $precio = openssl_decrypt($_POST['precioProducto'],COD,KEY);
            }
            else{
                $mensaje = "Algo pasa con el precio";
            }

            header("Location: ../../View/UsuariosVista/detalleProductoCliente.php?idProducto=" . $id);
            //Si no existe la variable de session guardamos en una arreglo los datos de nuestro poducto
            //Y lo almacenamos en la posicion 0 de nuestra variable de session.
            //De lo contrario contaremos cuantos productos se encuentran en la variable de session
            //Y llevaremos ese control con la variable numero de productos
            if(!isset($_SESSION['CARRITO'])){
                $producto = array(

                    'ID'=>$id,
                    'Nombre'=>$nombre,
                    'Cantidad'=>$cantidad,
                    'Precio'=>$precio,
                    'Talla'=>$talla,
                    'Color'=>$color,
                    'Foto'=>$foto
                );

                $_SESSION['CARRITO'][0]=$producto;

            }
            else{
                $numeroProductos = count($_SESSION['CARRITO']);
                $producto = array(

                    'ID'=>$id,
                    'Nombre'=>$nombre,
                    'Cantidad'=>$cantidad,
                    'Precio'=>$precio,
                    'Talla'=>$talla,
                    'Color'=>$color,
                    'Foto'=>$foto
                );
                $_SESSION['CARRITO'][$numeroProductos]=$producto;
            }
            print_r($_SESSION['CARRITO'],true);

        break;    

    }

}

?>