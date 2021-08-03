<?php

class crudcategoria
{ 
    public function __construct(){}

    public function listarCategorias(){
        $Db = Db::Conectar();//cadena de conexion
        $sql = $Db->query('SELECT * FROM categorias');//definicion de sql
        $sql->execute();//ejectar la consulta
        Db::CerrarConexion($Db);
        return $sql->fetchAll();//retornar todo el listado de la consulta

    }

    public function registrarCategorias($nombreCategoria,$nombreFoto){
        $mensaje = "";
        $Db = Db::Conectar();
        try {
            $Db->query("INSERT INTO categorias (NombreCategoria, UrlImagen) 
            VALUES ('$nombreCategoria', '$nombreFoto')");
            $mensaje = "Registro exitoso";
        } catch (Exception $e) {
            $mensaje = $e->getMessage();
        }
        Db::CerrarConexion($Db);
        return $mensaje;
    }


    public function buscarCategorias($IdCategoria){
        $Db = Db::Conectar();//cadena de conexion
        $sql = $Db->query("SELECT * FROM categorias
        WHERE IdCategoria = $IdCategoria");//definicion de sql
        $sql->execute();//ejectar la consulta
        Db::CerrarConexion($Db);
        return $sql->fetch();//retornar todo el listado de la consulta
    }

    public function ActualizarCategoria($categoria){
        $mensaje = "";
        $Db = Db::Conectar();//conexion a bd
        //definir la sentencia sql
        $sql = $Db->prepare('UPDATE 
        categorias SET
         NombreCategoria=:nombreCategoria,
         UrlImagen =:imagen
         WHERE IdCategoria=:IdCategoria
         ');
        $sql->bindvalue('IdCategoria',$categoria-> getId_Categoria());
        $sql->bindvalue('nombreCategoria',$categoria-> getNombreCategoria());
        $sql->bindvalue('imagen',$categoria-> getUrlImagen());
    
        
        try{
            $sql->execute();//ejecutar el sql
            $mensaje= "Actualizacion exitosa"; //mostrar mensaje de un registro exitoso
            //$mensaje = $categoria->getUrlImagen().$nombreCategoria;
        }
        catch(Exception $e)
        {
            $mensaje= $e->getMessage(); //obtener mensaje error
        }
        Db::CerrarConexion($Db);
        return $mensaje;
    }

    public function eliminarCategoria($IdCategoria){
        $Db = Db::Conectar();//conexion a bd
        //definir la sentencia sql
        $sql = $Db->prepare("DELETE FROM categorias 
        where IdCategoria = $IdCategoria");

        $sql->execute();//ejecutar el sql
        Db::CerrarConexion($Db);
    }
}
?>



