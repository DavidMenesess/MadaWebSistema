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

    public function registrarCategorias($categoria){
        $mensaje = "";
        $mensajeValidar = "";
        $Db = Db::Conectar();
        //Validar que un usuario no registre el mimso correo.
        $validarExiste = $Db->prepare("SELECT NombreCategoria FROM categorias
        WHERE NombreCategoria = :nombre");
        $validarExiste->bindvalue('nombre',$categoria->getNombreCategoria());
        try{
            $validarExiste->execute();
            if($validarExiste->rowCount() > 0){
                $mensajeValidar = "La categoria ya existe";
                return $mensajeValidar;
            }//Si el producto no existe, se ejecuta lo del elese y realiza la inserción
            else{
                $sql = $Db->prepare('INSERT INTO
                categorias(NombreCategoria, UrlImagen, Estado )
                VALUES (:nombre, :urlImagen, 1)');
                $sql->bindvalue('nombre',$categoria->getNombreCategoria());//dentro del value cuenta como variables las que tienen los dos puntos :
                $sql->bindvalue('urlImagen',$categoria->getUrlImagen());//recciben los datos que se mandaron por el set en controladorRegistrar
                $sql->execute();
                $mensaje = "Registro exitoso";
            }
        }
        catch(Exception $e){
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

    public function actualizarEstadoCategoria($categoria){
        $mensaje = "";
        $Db = Db::Conectar();
        $sql = $Db->prepare('UPDATE categorias SET Estado = :estado WHERE
        IdCategoria = :idCategoria');
        $sql->bindvalue('idCategoria',$categoria->getId_Categoria());
        $sql->bindvalue('estado',$categoria->getEstado());

        try{
            $sql->execute();
            $mensaje = "Se ha modificado el estado";
        }catch (Exception $e) {
            $mensaje = $e->getMessage();
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



