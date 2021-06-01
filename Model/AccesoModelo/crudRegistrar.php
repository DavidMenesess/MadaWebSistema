<?php

    class crudRegistrar{

        public function __construct(){

        }

        public function RegistrarUsuario($Usuario){

            $mensaje = "";
            $mensajeValidar = "";
            $Db = Db::Conectar();
            //Validar que un usuario no registre el mimso correo.
            $validarUsuario = $Db->prepare("SELECT Correo FROM usuarios
            WHERE Correo = :Correo");
            $validarUsuario->bindvalue('Correo',$Usuario->getCorreo());
            try{
                $validarUsuario->execute();
                if($validarUsuario->rowCount() > 0){
                    $mensajeValidar = "El usuario ya existe";
                    return $mensajeValidar;
                }//Si el usuaio no existe se ejecuta lo del else.... realiza la inserción.
                else{
                    $sql = $Db->prepare('INSERT INTO
                    usuarios(Nombre, Apellido, Correo, Contrasena,Estado,IdRol )
                    VALUES (:nombre, :apellido, :correo, :contrasena,1,1)');
                    $sql->bindvalue('nombre',$Usuario->getNombre());//dentro del value cuenta como variables las que tienen los dos puntos :
                    $sql->bindvalue('apellido',$Usuario->getApellido());//recciben los datos que se mandaron por el set en controladorRegistrar
                    $sql->bindvalue('correo',$Usuario->getCorreo());
                    $sql->bindvalue('contrasena',$Usuario->getContrasena());
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