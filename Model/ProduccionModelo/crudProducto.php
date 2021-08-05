<?php

    class CrudProducto{

        public function __construct(){

        }

        public function listarProductos(){
            $Db = Db::Conectar();
            $sql= $Db->query("SELECT p.IdProducto, p.NombreProducto, p.Descripcion,
            p.FechaRegistro, p.Precio, c.NombreCategoria FROM productos p JOIN categorias c
            ON p.Idcategoria = c.IdCategoria");
            $sql->execute();
            Db::CerrarConexion($Db);
            return $sql->fetchAll();
        }

        public function obtenerCategorias(){
            $Db = Db::Conectar();
            $sql= $Db->query("SELECT IdCategoria,NombreCategoria FROM categorias");
            $sql->execute();
            Db::CerrarConexion($Db);
            return $sql->fetchAll();
        }


        public function registrarProducto($producto){

            $mensaje = "";
            $mensajeValidar = "";
            $Db = Db::Conectar();
            //Validar que un usuario no registre el mimso correo.
            $validarExiste = $Db->prepare("SELECT NombreProducto FROM productos
            WHERE NombreProducto = :nombre");
            $validarExiste->bindvalue('nombre',$producto->getNombreProducto());
            try{
                $validarExiste->execute();
                if($validarExiste->rowCount() > 0){
                    $mensajeValidar = "El producto ya existe";
                    return $mensajeValidar;
                }//Si el usuaio no existe se ejecuta lo del else.... realiza la inserción.
                else{
                    $sql = $Db->prepare('INSERT INTO
                    productos(Nombre, Apellido, Correo, Contrasena,Estado,IdRol )
                    VALUES (:nombre, :apellido, :correo, :contrasena,1,1)');
                    $sql->bindvalue('nombre',$producto->getNombre());//dentro del value cuenta como variables las que tienen los dos puntos :
                    $sql->bindvalue('apellido',$producto->getApellido());//recciben los datos que se mandaron por el set en controladorRegistrar
                    $sql->bindvalue('correo',$producto->getCorreo());
                    $sql->bindvalue('contrasena',$producto->getContrasena());
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

    }   

?>