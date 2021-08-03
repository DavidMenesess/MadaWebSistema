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
    
    public function actualizarCategoria($id_categoria,$nombreCategoria,$nuevaImagen){
        $categoria = new categoria();//crear objeto del tippo producto
        $categoria->setId_Categoria($id_categoria);
        $categoria->setNombreCategoria($nombreCategoria);//asignar valores a los atributos
        $categoria->setUrlImagen($nuevaImagen);
        echo $nuevaImagen;

        $crudcategoria = new crudcategoria();
        //var_dump($categoria);
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

    if($tamanoImagen <= 5097152){

        if($tipoArchivo == "image/jpeg" || $tipoArchivo == "image/jpg" || $tipoArchivo == "image/png"){
            //Ruta de la carpte a de destino en el servido , es decir , donde va a quedar alojada la imagen.
            $carpetaDestino = $_SERVER['DOCUMENT_ROOT'].'/MadaWebSistema/images/categorias/';

            //Con la función move_uploaded_file movemos la foto de la capeta temporal a la ruta de destino que establecimos arriba.
            move_uploaded_file($_FILES['foto']['tmp_name'],$carpetaDestino.$nombreFoto);

             $controladorCategoria->registrarCategoria($nombreCategoria,$nombreFoto);


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

if(isset($_POST['actualizarCategoria'])){

    $idCategoria = $_POST['idCategoria'];
    $nombreFoto = $_FILES['fotoNueva']['name'];
    $tipoArchivo = $_FILES['fotoNueva']['type'];
    $tamanoImagen = $_FILES['fotoNueva']['size'];
    $nombreCategoria = $_POST['nombreCategoria'];
    $fotoAntigua = $_POST['fotoAntigua'];
    
    if($tamanoImagen <= 5097152){

        if($tipoArchivo == "image/jpeg" || $tipoArchivo == "image/jpg" || $tipoArchivo == "image/png"){
            //Ruta de la carpte a de destino en el servido , es decir , donde va a quedar alojada la imagen.
            $carpetaDestino = $_SERVER['DOCUMENT_ROOT'].'/MadaWebSistema/images/categorias/';

            //Con la función move_uploaded_file movemos la foto de la capeta temporal a la ruta de destino que establecimos arriba.
            move_uploaded_file($_FILES['fotoNueva']['tmp_name'],$carpetaDestino.$nombreFoto);

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
        alert('La imagn super el tamaño esperado. Debe ser menor o igual a 5Mb');
    </script>";
    }
    
    $carpetaDestinoEliminarFoto = $_SERVER['DOCUMENT_ROOT']."/MadaWebSistema/images/categorias/$fotoAntigua";
    unlink($carpetaDestinoEliminarFoto);
    $controladorCategoria->actualizarCategoria($idCategoria,$nombreCategoria,$nombreFoto);


}

if(isset($_POST['eliminarCategoria'])){
   
   $imagen = $_POST['imagen'];
   $carpetaDestinoEliminarFoto = $_SERVER['DOCUMENT_ROOT']."/MadaWebSistema/images/categorias/$imagen";
   unlink($carpetaDestinoEliminarFoto); 
   $controladorCategoria->eliminarCategoria($_POST['IdCategoria']);

   /* unlink elimina un fichero de una ruta
    especifica o de la misma carpeta, recibe como 
    parametro la ruta o el nombre del archivo. En este
    caso ecibe la ruta del fichero y el nombre del archivo.
    */

}
?>

 

