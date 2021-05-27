<?php
require_once('../../Model/conexion.php');
require_once('../../Controller/AccesoControlador/controladorRegistrar.php');
require_once('../../Controller/AccesoControlador/controladorValidarRepetido.php');


    class crudRegistrar{

        public function __construct(){

        }

        public function RegistrarUsuario($Usuario){

            /*if(getExiste() == 1){//Si el correo existe

                validarRepetido();
            }*/

            $mensaje = "";

            $Db = Db::Conectar();

            $sql = $Db->prepare('INSERT INTO
             usuarios(Nombre, Apellido, Correo, Contrasena,Estado,IdRol )
             VALUES (:nombre, :apellido, :correo, :contrasena,1,3)');
             $sql->bindvalue('nombre',$Usuario->getNombre());//dentro del value cuenta como variables las que tienen los dos puntos :
             $sql->bindvalue('apellido',$Usuario->getApellido());//recciben los datos que se mandaron por el set en controladorRegistrar
             $sql->bindvalue('correo',$Usuario->getCorreo());
             $sql->bindvalue('contrasena',$Usuario->getContrasena());

             try{
                 $sql->execute();
                 $mensaje = "Registro exitoso";
             }

             catch(Exception $e){
                $mensaje = $e->getMessage();
             }

             Db::CerrarConexion($Db);
             return $mensaje;
        }

    }

?>