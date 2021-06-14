<?php
require_once('../../Model/conexion.php');
require_once('../../Model/usuario.php');
require_once('../../Model/AccesoModelo/crudAcceso.php');
    class controladorAcceso{

        public function __construct(){

        }

        public function validarAcceso($correo,$contrasena){//Envia como parametros los valores al modelo

            $usuario = new usuario(); //Le asigno un objeto del tipo Usuario que esta en el modelo
            $contrasena = hash('sha512', $contrasena);//Se ecripta la contrasena nuevamente para que realice la comparacion con la qu se registro en la bd
            $usuario->setCorreo($correo);
            $usuario->setContrasena($contrasena);
            $crudAcceso = new CrudAcceso();
          return  $crudAcceso->validarAcceso($usuario);//retorna el objeto usuario como parametro al modelo
        }
    }
    $controladorAcceso = new controladorAcceso();

    if(isset($_POST['validarAcceso'])){
        //echo "Pudo ingresar";
      $usuario = ($controladorAcceso->validarAcceso($_POST['correoUsuario'],$_POST['contrasenaUsuario']));//Recibe los dato desde el formulario.

      if($usuario->getExiste() == 1 && $usuario->getRol() == 1 || $usuario->getRol() == 2){
          //Las variables session son variables que nos van a permitir si el usuario esta o no en la bd
          session_start(); //Funcion propia de php para indicar que vamos a iniciar una session. Inicializa la variable de session
          $_SESSION['correoUsuario'] = $usuario->getCorreo();//Variable de sesión global.
          $_SESSION['Rol'] = $usuario->getRol();
          //$_SESSION['nombre'] = $usuario->getNombre();

          header("Location: ../../View/dashboard.php");

      }

      //Debo integrar un if para validar el acceso de los clientes.

      else{
        echo "<script>
                    location.replace('../../View/AccesoVista/login.php');
                    alert('Datos incorrectos por favor intente nuevamente.');
                </script>";
      }

    }

    else if(isset($_GET['cerrarSesion'])){//Destruir la variable de sesión
      session_start();
      session_destroy();
      header("Location: ../../View/AccesoVista/login.php");
    }

    

?>