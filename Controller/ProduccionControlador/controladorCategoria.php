<?php
include("../../Model/conexion.php");
include("../../Model/categoria.php");
include("../../Model/ProduccionModelo/crudcategoria.php");

class controladorCategoria{
    public function __construct(){//metodo constructor
    }

    public function listarCategorias(){//metodo para hacer la peticion al modelo productos
    $crudcategoria = new crudcategoria();//crear un objeto de la clase CrudProducto
    return $crudcategoria->listarCategorias();//retornando los valores del metodo listarProducto
    }

    public function registrarCategoria($nombreCategoria,$nombreFoto){
        //$categoria = new categoria();//crear objeto del tipo producto
        //$categoria->setNombreCategoria($nombreCategoria);//asignar valores a los atributos
        //$categoria->setUrlImagen($foto);//asignar valores a los atributos

        $crudcategoria = new crudcategoria();
        $crudcategoria->registrarCategorias($nombreCategoria,$nombreFoto);
        //var_dump($categoria);
        header('Location: ../../View/ProduccionVista/categorias.php');

    }

    public function buscarCategorias($IdCategoria){
        $crudcategoria = new crudcategoria();
        return $crudcategoria->buscarCategorias($IdCategoria);
    }
    
    public function ActualizarCategoria($idCategoria,$nombreCategoria,$imagen){
        $categoria = new categoria();//crear objeto del tippo producto
        $categoria->setId_Categoria($idCategoria);
        $categoria->setNombreCategoria($nombreCategoria);//asignar valores a los atributos
        $categoria->setUrlImagen($imagen);


        $crudcategoria = new crudcategoria();
        $crudcategoria->ActualizarCategoria($categoria);
        header('Location: ../../View/ProduccionVista/categorias.php');
        

    }
    public function eliminarCategoria($IdCategoria){
        $crudcategoria = new crudcategoria();
        $crudcategoria->eliminarCategoria($IdCategoria);
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

    if($tamanoImagen <= 2097152){

        if($tipoArchivo == "image/jpeg" || $tipoArchivo == "image/jpg" || $tipoArchivo == "image/png"){
            //Ruta de la carpte a de destino en el servido , es decir , donde va a quedar alojada la imagen.
            $carpetaDestino = $_SERVER['DOCUMENT_ROOT'].'/MadaWebSistema/images/categorias/';

            //Con la función move_uploaded_file movemos la foto de la capeta temporal a la ruta de destino que establecimos arriba.
            move_uploaded_file($_FILES['foto']['tmp_name'],$carpetaDestino.$nombreFoto);

        }

        else{
            echo "<script>
            location.replace('../../View/ProduccionVista/categorias.php');
            alert('El formato seleccionado no corresponde al de una imagen.');
            </script>";
        }
    }

    else{
        echo "<script>
        location.replace('../../View/ProduccionVista/categorias.php');
        alert('La imagn super el tamaño esperado. Debe ser de 2Mb');
    </script>";
    }

    
    $controladorCategoria->registrarCategoria($nombreCategoria,$nombreFoto);

    //header('Location: ../../View/produccionVista/categorias.php');
}

if(isset($_POST['editarCategoria'])){ //sirve para comprovar si una variable esta definida
    header('location:../../View/ProduccionVista/editarCategoria.php?IdCategoria='.$_POST['IdCategoria']);

}

if(isset($_POST['actualizarCategoria'])){
    //llamado al metodo Actualizar el producto del controlador
    $controladorCategoria->ActualizarCategoria($_POST['idCategoria'],$_POST['nombreCategoria'],$_POST['imagen']);
    //var_dump($Controlador->ActualizarCategorias($_POST['Id_categoria'],$_POST['Nombre']));
}

if(isset($_POST['eliminarCategoria'])){
   // echo 'eliminando producto'.$_POST['Id_producto'];
   $controladorCategoria->eliminarCategoria($_POST['IdCategoria']);

}
?>

 

