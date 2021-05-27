<?php
require_once('../../Model/conexion.php');
require_once('../../Model/usuario.php');
require_once('../../Model/AccesoModelo/crudRegistrar.php');

    class controladorRegistrar{

        public function __construct(){

        }

        public function RegistrarUsuario($nombre, $apellido, $correo, $contrasena){//Recibe como parametros los que se recibe en el isset de abajo

            $contrasena = hash('sha512', $contrasena);//Se ecripta la contrasena.
            $Usuario = new usuario();//Se cea un nuevo objeto a partir de la clase usuario
            $Usuario->setNombre($nombre);//se asignan los valores al nuevo objeto
            $Usuario->setApellido($apellido);//se asignan los valores al nuevo objeto
            $Usuario->setCorreo($correo);//se asignan los valores al nuevo objeto
            $Usuario->setContrasena($contrasena);//Recibe el valor de la contrasena pero encriptado

            $crudRegistrar = new crudRegistrar();
            $crudRegistrar->RegistrarUsuario($Usuario);
            header('Location:../../View/AccesoVista/login.php');
        }
    }

    $controladorRegistrar = new controladorRegistrar();//Creamos un objeto de la clase controladorUsuario(esta clase).

    if(isset($_POST['registrarUsuario'])){
        //enviamos los parametros que va a recibir la función registrarUsuario.

        $controladorRegistrar->registrarUsuario($_POST['nombre'], $_POST['apellido'],
        $_POST['correo'],$_POST['contrasena']);



    }





?>