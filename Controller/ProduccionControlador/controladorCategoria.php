<?php
include("../../Model/conexion.php");
include("../../Model/ProduccionModelo/categoria.php");
include("../../Model/ProduccionModelo/crudcategoria.php");

class controladorCategoria{
    public function __construct(){//metodo constructor
    }

    public function listarCategorias(){//metodo para hacer la peticion al modelo productos
    $crudcategoria = new crudcategoria();//crear un objeto de la clase CrudProducto
    return $crudcategoria->listarCategorias();//retornando los valores del metodo listarProducto
    }

    public function registrarCategoria($nombreCategoria,$nombreFoto){
        $categoria = new categoria();//crear objeto del tipo producto
        $categoria->setNombreCategoria($nombreCategoria);//asignar valores a los atributos
        $categoria->setUrlImagen($nombreFoto);//asignar valores a los atributos

        $crudcategoria = new crudcategoria();
        return $crudcategoria->registrarCategorias($categoria);
        //var_dump($categoria);
        header('Location: ../../View/ProduccionVista/categorias.php');

    }

    public function buscarCategorias($IdCategoria){
        $crudcategoria = new crudcategoria();
        return $crudcategoria->buscarCategorias($IdCategoria);
    }

    public function editarNombreCategoria($nuevoNombre, $idCategoria){
        $categoria = new categoria();
        $categoria->setNombreCategoria($nuevoNombre);
        $categoria->setId_Categoria($idCategoria);

        $crudCategoria = new crudCategoria;
        $crudCategoria->actualizarNombreCategoria($categoria);
        header("Location: ../../View/ProduccionVista/categorias.php");
    }
    
    public function actualizarImagenCategoria($id_categoria,$nuevaImagen){
        $categoria = new categoria();//crear objeto del tippo producto
        $categoria->setId_Categoria($id_categoria);
        $categoria->setUrlImagen($nuevaImagen);
        //echo $nuevaImagen;

        $crudcategoria = new crudcategoria();
        //var_dump($categoria);
        $crudcategoria->ActualizarImagenCategoria($categoria);
         
        header('Location: ../../View/ProduccionVista/categorias.php');
    }

    public function actualizarTodoCategoria($id_categoria,$nuevaImagen,$nuevoNombre){
        $categoria = new categoria();//crear objeto del tippo producto
        $categoria->setId_Categoria($id_categoria);
        $categoria->setUrlImagen($nuevaImagen);
        $categoria->setNombreCategoria($nuevoNombre);
        //echo $nuevaImagen;

        $crudcategoria = new crudcategoria();
        //var_dump($categoria);
        $crudcategoria->ActualizarTodoCategoria($categoria);
         
        header('Location: ../../View/ProduccionVista/categorias.php');
    }

    public function cambiarEstado($idCategoria, $estado){

        $estadoActualizado = null;
        //var_dump($idCategoria);
        if($estado == 1){
            $estadoActualizado = 0;
        }
        elseif($estado == 0){
            $estadoActualizado = 1;
        }

        $categoria = new categoria;
        $categoria->setId_Categoria($idCategoria);
        $categoria->setEstado($estadoActualizado);

        //var_dump($estado);
        $crudCategoria = new crudCategoria();
        $crudCategoria->actualizarEstadoCategoria($categoria);
        header ("Location: ../../View/ProduccionVista/categorias.php");

    }

    public function eliminarCategoria($IdCategoria){
        $crudcategoria = new crudcategoria();
        return $crudcategoria->eliminarCategoria($IdCategoria);
        header('Location: ../../View/ProduccionVista/categorias.php');
         
    }
    
}

    $controladorCategoria = new controladorCategoria();//crear un objeto de la clase producto
    //var_dump($Controlador->listarProducto()); //var_dump mostrar informacion o tipo de una variable

    if(isset($_POST['registrarCategoria'])){
        //llamado al metodo registrar el producto del controlador
        
        $nombreFoto = $_FILES['foto']['name'];
        $tipoArchivo = $_FILES['foto']['type'];
        $tamanoImagen = $_FILES['foto']['size'];
        $nombreCategoria = $_POST['nombreCategoria'];

        if($tamanoImagen <= 5097152){

            if($tipoArchivo == "image/jpeg" || $tipoArchivo == "image/jpg" || $tipoArchivo == "image/png"){
                //Ruta de la carpte a de destino en el servido , es decir , donde va a quedar alojada la imagen.
                $carpetaDestino = $_SERVER['DOCUMENT_ROOT'].'/MadaWebSistema/images/categorias/';

                //Con la función move_uploaded_file movemos la foto de la capeta temporal a la ruta de destino que establecimos arriba.
                move_uploaded_file($_FILES['foto']['tmp_name'],$carpetaDestino.$nombreFoto);

                $mensaje = $controladorCategoria->registrarCategoria($nombreCategoria,$nombreFoto);

                if($mensaje == "La categoria ya existe"){
                    echo "<script>
                location.replace('../../View/ProduccionVista/categorias.php');
                alert('Ya existe esa categoria.');
                </script>";
                }else{
                    echo "<script>
                location.replace('../../View/ProduccionVista/categorias.php');
                alert('Registro exitoso.');
                </script>";
                }


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

        
        //$controladorCategoria->registrarCategoria($nombreCategoria,$nombreFoto);

        //header('Location: ../../View/produccionVista/categorias.php');
    }

    if(isset($_POST['editarCategoria'])){ //sirve para comprovar si una variable esta definida
        header('location:../../View/ProduccionVista/editarCategoria.php?IdCategoria='.$_POST['IdCategoria']);

    }

    if(isset($_POST['actualizarNombreCategoria'])){
        $controladorCategoria->editarNombreCategoria($_POST['nuevoNombreCategoria'],$_POST['idCategoria']);
    }

    if(isset($_POST['actualizarImagenCategoria'])){

        $idCategoria = $_POST['idCategoria'];
        $nombreFoto = $_FILES['nuevaImagenCategoria']['name'];
        $tipoArchivo = $_FILES['nuevaImagenCategoria']['type'];
        $tamanoImagen = $_FILES['nuevaImagenCategoria']['size'];
        $fotoAntigua = $_POST['imagenAntiguaCategoria'];
        
        if($tamanoImagen <= 5097152){

            if($tipoArchivo == "image/jpeg" || $tipoArchivo == "image/jpg" || $tipoArchivo == "image/png"){
                //Ruta de la carpte a de destino en el servido , es decir , donde va a quedar alojada la imagen.
                $carpetaDestino = $_SERVER['DOCUMENT_ROOT'].'/MadaWebSistema/images/categorias/';

                //Con la función move_uploaded_file movemos la foto de la capeta temporal a la ruta de destino que establecimos arriba.
                $carpetaDestinoEliminarFoto = $_SERVER['DOCUMENT_ROOT']."/MadaWebSistema/images/categorias/$fotoAntigua";
                unlink($carpetaDestinoEliminarFoto);

                move_uploaded_file($_FILES['nuevaImagenCategoria']['tmp_name'],$carpetaDestino.$nombreFoto);
                $controladorCategoria->actualizarImagenCategoria($idCategoria,$nombreFoto);
                //$controladorCategoria->registrarCategoria($nombreCategoria,$nombreFoto);
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
            alert('La imagen super el tamaño esperado. Debe ser menor o igual a 5Mb');
        </script>";
        }

    }

    if(isset($_POST['actualizarTodoCategoria'])){

        $nuevoNombreCategoria = $_POST['nuevoNombreCategoria'];
        $idCategoria = $_POST['idCategoria'];
        $nombreFoto = $_FILES['nuevaImagenCategoria']['name'];
        $tipoArchivo = $_FILES['nuevaImagenCategoria']['type'];
        $tamanoImagen = $_FILES['nuevaImagenCategoria']['size'];
        $fotoAntigua = $_POST['imagenAntiguaCategoria'];
        
        if($tamanoImagen <= 5097152){

            if($tipoArchivo == "image/jpeg" || $tipoArchivo == "image/jpg" || $tipoArchivo == "image/png"){
                //Ruta de la carpte a de destino en el servido , es decir , donde va a quedar alojada la imagen.
                $carpetaDestino = $_SERVER['DOCUMENT_ROOT'].'/MadaWebSistema/images/categorias/';

                //Con la función move_uploaded_file movemos la foto de la capeta temporal a la ruta de destino que establecimos arriba.

                $carpetaDestinoEliminarFoto = $_SERVER['DOCUMENT_ROOT']."/MadaWebSistema/images/categorias/$fotoAntigua";
                unlink($carpetaDestinoEliminarFoto);

                move_uploaded_file($_FILES['nuevaImagenCategoria']['tmp_name'],$carpetaDestino.$nombreFoto);
                $controladorCategoria->actualizarTodoCategoria($idCategoria,$nombreFoto,$nuevoNombreCategoria);
                //$controladorCategoria->registrarCategoria($nombreCategoria,$nombreFoto);
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
            alert('La imagen super el tamaño esperado. Debe ser menor o igual a 5Mb');
        </script>";
        }
        
    }

    if(isset($_POST['cambiarEstadoCategoria'])){
        $controladorCategoria->cambiarEstado($_POST["IdCategoria"],$_POST["estadoCategoria"]);
    }

    if(isset($_POST['eliminarCategoria'])){
        
        $imagen = $_POST['imagen'];
        $mensaje = $controladorCategoria->eliminarCategoria($_POST['IdCategoria']);

        if($mensaje != "Existen productos con esta categoria"){
            $carpetaDestinoEliminarFoto = $_SERVER['DOCUMENT_ROOT']."/MadaWebSistema/images/categorias/$imagen";
            unlink($carpetaDestinoEliminarFoto); 
        }

        if($mensaje == "Existen productos con esta categoria"){
            echo "<script>
				location.replace('../../View/ProduccionVista/categorias.php');
				alert('No puedes eliminar la categoría debido a que tiene productos asociados');
			  </script>";
        }else{
            echo "<script>
				location.replace('../../View/ProduccionVista/categorias.php');
				alert('Categoría eliminada de manera correcta');
			  </script>";
        }
    /* unlink elimina un fichero de una ruta
        especifica o de la misma carpeta, recibe como 
        parametro la ruta o el nombre del archivo. En este
        caso ecibe la ruta del fichero y el nombre del archivo.
        */

    }
