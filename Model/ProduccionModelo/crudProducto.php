<?php

    class CrudProducto{

        public function __construct(){

        }

        public function listarProductos(){
            $Db = Db::Conectar();
            $sql= $Db->query("SELECT p.IdProducto, p.NombreProducto, p.Descripcion,
            p.Estado, p.Precio, c.NombreCategoria FROM productos p JOIN categorias c
            ON p.Idcategoria = c.IdCategoria");
            $sql->execute();
            Db::CerrarConexion($Db);
            return $sql->fetchAll();
        }

        public function obtenerCategorias(){
            $Db = Db::Conectar();
            $sql= $Db->query("SELECT IdCategoria,NombreCategoria FROM categorias WHERE Estado = 1");
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
            $validarExiste->bindvalue('nombre',$producto->getNombre());
            try{
                $validarExiste->execute();
                if($validarExiste->rowCount() > 0){
                    $mensajeValidar = "El producto ya existe";
                    return $mensajeValidar;
                }//Si el producto no existe, se ejecuta lo del elese y realiza la inserción
                else{
                    $sql = $Db->prepare('INSERT INTO
                    productos(NombreProducto, Descripcion, Precio, IdCategoria, Estado )
                    VALUES (:nombre, :descripcion, :precio, :categoria, 1)');
                    $sql->bindvalue('nombre',$producto->getNombre());//dentro del value cuenta como variables las que tienen los dos puntos :
                    $sql->bindvalue('descripcion',$producto->getDescripcion());//recciben los datos que se mandaron por el set en controladorRegistrar
                    $sql->bindvalue('precio',$producto->getPrecio());
                    $sql->bindvalue('categoria',$producto->getCategoria());
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

        public function buscarProducto($idProducto){
            $Db = Db::Conectar();
            $sql = $Db->query("SELECT * FROM productos WHERE IdProducto = $idProducto");
            $sql->execute();
            $Db = Db::CerrarConexion($Db);
            return $sql->fetch();
        }

    }   

?>