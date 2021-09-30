<?php
require_once('../../Model/conexion.php');
require_once('../../Model/UsuariosModelo/usuario.php');
require_once('../../Model/AccesoModelo/recuperarcontrasena.php');
require_once('../../Model/AccesoModelo/crudAcceso.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP ;
use PHPMailer\PHPMailer\Exception;

require '../../libraries/phpMailer/Exception.php';
require '../../libraries/phpMailer/PHPMailer.php';
require '../../libraries/phpMailer/SMTP.php';
    
class controladorAcceso{

        public function __construct(){

        }

        public function validarAcceso($correo,$contrasena){

            $usuario = new usuario();
            $contrasena = hash('sha512', $contrasena);
            $usuario->setCorreo($correo);
            $usuario->setContrasena($contrasena);
            $crudAcceso = new CrudAcceso();
          return  $crudAcceso->validarAcceso($usuario);
        }

        public function RegistrarUsuario($nombre, $apellido, $correo, $contrasena){

          $nombreMayus = ucwords($nombre);
          $apellidoMayus = ucwords($apellido);
          $contrasena = hash('sha512', $contrasena);
          $Usuario = new usuario();
          $Usuario->setNombre($nombreMayus);
          $Usuario->setApellido($apellidoMayus);
          $Usuario->setCorreo($correo);
          $Usuario->setContrasena($contrasena);
  
          $crudAcceso = new CrudAcceso();
          return $crudAcceso->RegistrarUsuario($Usuario);
      }

        public function validarExisteCorreo($correo){

          $usuario = new usuario();
          $usuario->setCorreo($correo);
    
          $crudAcceso = new CrudAcceso();
          return $crudAcceso->validarExisteCorreo($usuario);
      }
    
      public function insertarDatos($correo,$codigo){
          $crudAcceso = new CrudAcceso();
          return $crudAcceso->insertarCodigo($correo, $codigo);
      }
    
      public function buscar_correo($codigo)
      {
          $crudAcceso = new CrudAcceso();
          return $crudAcceso->buscar_correo($codigo);
      }
    
      public function cambiar_contrasena($contrasena, $correo, $codigo){
          $contrasena_encriptada = hash('sha512', $contrasena);
          $crudAcceso = new crudAcceso();
          return $crudAcceso->cambiar_contrasena($contrasena_encriptada, $correo, $codigo);
      }

    }

   



    $controladorAcceso = new controladorAcceso();

    if(isset($_POST['validarAcceso'])){
        
      $usuario = ($controladorAcceso->validarAcceso($_POST['correoUsuario'],$_POST['contrasenaUsuario']));//Recibe los dato desde el formulario.

      if($usuario->getExiste() == 1 && $usuario->getRol() == 1){
          session_start();
          $_SESSION['correoUsuario'] = $usuario->getCorreo();
          $_SESSION['Rol'] = $usuario->getRol();
          $_SESSION['Nombre'] = $usuario->getNombre();
          header("Location: ../../View/dashboard.php");

      }

      if($usuario->getExiste() == 1 && $usuario->getRol() == 2){

        session_start();
        $_SESSION['correo'] = $usuario->getCorreo();
        $_SESSION['rol'] = $usuario->getRol();
        $_SESSION['nombre'] = $usuario->getNombre();
        $_SESSION['id'] = $usuario->getIdUsuario();
        header("Location: ../../View/UsuariosVista/index.php");

      }

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
      header("Location: ../../View/UsuariosVista/index.php");
    }

    if(isset($_POST['registrarUsuario'])){
      //enviamos los parametros que va a recibir la función registrarUsuario.
     $mensaje = $controladorAcceso->registrarUsuario($_POST['nombre'], $_POST['apellido'],
      $_POST['correo'],$_POST['contrasena']);

      if($mensaje == "El usuario ya existe"){
          echo "<script>
                  location.replace('../../View/AccesoVista/registrar.php');
                  alert('El correo ya existe, por favor intente con otro');
              </script>";
      }
      else if($mensaje = "Registro exitoso"){
      header('Location:../../View/AccesoVista/login.php');
      }
      else{
      header('Location:../../404.html');
      }
  }

    if(isset($_POST['restablecerContra'])){
      
      $mensaje = $controladorAcceso->validarExisteCorreo($_POST['correoRecuperar']);
      
      if($mensaje == "El correo existe"){
          
          $correoRecuperar = $_POST['correoRecuperar'];
          $codigo = uniqid(true);
  
          $respuesta = $controladorAcceso->insertarDatos($correoRecuperar, $codigo);
          
          if($respuesta != "Registro exitoso"){
              echo "<script>
                  location.replace('../../View/AccesoVista/recuperarContrasena.php');
                  alert('No se pudo recuperar la contraseña.');
              </script>";
          }else{
              $mail = new PHPMailer(true);
              try {
                                      
                  $mail->isSMTP();                                           
                  $mail->Host       = 'smtp.gmail.com';                     
                  $mail->SMTPAuth   = true;                                   
                  $mail->Username   = 'madaprueba123@gmail.com';                     
                  $mail->Password   = 'madaprueba123456789';                               
                  $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         
                  $mail->Port       = 465;                                    
          
                 
                  $mail->setFrom('madaprueba123@gmail.com', 'Soporte al cliente');
                  $mail->addAddress($correoRecuperar);     
                 
                  $url = "http://localhost:8888/MadaWebSistema/View/AccesoVista/restablecer.php?codigo=".$codigo;
                  $mail->isHTML(true); 
                  $mail->CharSet = 'UTF-8';                                 
                  $mail->Subject = 'Mada || - Restablecer contraseña';
                  $mail->Body    = "<div style='border: 1px solid #000; width:600px; height:300px; background-color: #F7F9F9; text-align:center;'><h1 style='text-align:center; color: Black'>Mada</h1><br>".
                                      "<p style='color:Black; text-align:center;'><b>Hola, recibimos la solicitud para cambiar tu contraseña, presiona el botón para hacerlo.</b></p><br>"
                                      ."<a href='$url' style='color: white; cursor: pointer; width:35px; height:38px; background-color: #8E44AD; border-radius: 4px; text-decoration:none; padding: 4px 25px; border: 1px solid #5B2C6F';><b>Restablecer Contraseña</b></a></div>"; //. $codigo;
                  
          
                  $mail->send();
                  echo "<script>
                          location.replace('../../View/AccesoVista/recuperarContrasena.php');
                          alert('Se envio el link de restablecimiento a su correo electronico');
                      </script>";
              } catch (Exception $e) {
                  echo "Hubo un error al enviar el mensaje: {$mail->ErrorInfo}";
              }
          }
      }elseif($mensaje == "El correo no existe"){
  
          echo "<script>
              location.replace('../../View/AccesoVista/recuperarContrasena.php');
              alert('El correo no existe.');
          </script>";
  
      }
  
      }

    if (isset($_POST["guardarNuevaContra"])) {
      $mensaje = "";
      $correo = $controladorAcceso->buscar_correo($_POST['codigo']);
      if ($correo != null) {
          $mensaje = $controladorAcceso->cambiar_contrasena($_POST['nuevaContrasena'], $correo, $_POST['codigo']);
      }

      if($mensaje = "Se cambio la contraseña"){
          echo "<script>
                  location.replace('../../View/AccesoVista/login.php');
                  alert('Se cambio la contraseña');
              </script>";
      }
  }
