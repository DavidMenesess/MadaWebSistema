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

        public function validarAcceso($correo,$contrasena){//Envia como parametros los valores al modelo

            $usuario = new usuario(); //Le asigno un objeto del tipo Usuario que esta en el modelo
            $contrasena = hash('sha512', $contrasena);//Se ecripta la contrasena nuevamente para que realice la comparacion con la qu se registro en la bd
            $usuario->setCorreo($correo);
            $usuario->setContrasena($contrasena);
            $crudAcceso = new CrudAcceso();
          return  $crudAcceso->validarAcceso($usuario);//retorna el objeto usuario como parametro al modelo
        }

        public function RegistrarUsuario($nombre, $apellido, $correo, $contrasena){//Recibe como parametros los que se recibe en el isset de abajo

          $nombreMayus = ucwords($nombre);
          $apellidoMayus = ucwords($apellido);
          $contrasena = hash('sha512', $contrasena);//Se ecripta la contrasena.
          $Usuario = new usuario();//Se cea un nuevo objeto a partir de la clase usuario
          $Usuario->setNombre($nombreMayus);//se asignan los valores al nuevo objeto
          $Usuario->setApellido($apellidoMayus);//se asignan los valores al nuevo objeto
          $Usuario->setCorreo($correo);//se asignan los valores al nuevo objeto
          $Usuario->setContrasena($contrasena);//Recibe el valor de la contrasena pero encriptado
  
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
          // $variables = new recuperarcontrasena();
          // $variables->setCorreo($correo);
          // $variables->setCodigo($codigo);
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
        //echo "Pudo ingresar";
      $usuario = ($controladorAcceso->validarAcceso($_POST['correoUsuario'],$_POST['contrasenaUsuario']));//Recibe los dato desde el formulario.

      if($usuario->getExiste() == 1 && $usuario->getRol() == 1){
          //Las variables session son variables que nos van a permitir si el usuario esta o no en la bd
          session_start(); //Funcion propia de php para indicar que vamos a iniciar una session. Inicializa la variable de session
          $_SESSION['correoUsuario'] = $usuario->getCorreo();//Variable de sesión global.
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
        header("Location: ../../index.php");

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
      header("Location: ../../index.php");
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
      // al guardar lo que recibimos en el input en mensaje podemos obtener aqui el valor de retorno del modelo
      $mensaje = $controladorAcceso->validarExisteCorreo($_POST['correoRecuperar']);
      //Recibo el valor de retorno de la variable mensaje y según el caso hago una accion u otra... mandar el correo o la alerta.
      if($mensaje == "El correo existe"){
          
          $correoRecuperar = $_POST['correoRecuperar'];
          $codigo = uniqid(true);
  
          $respuesta = $controladorAcceso->insertarDatos($correoRecuperar, $codigo);
          // var_dump($respuesta);
          if($respuesta != "Registro exitoso"){
              echo "<script>
                  location.replace('../../View/AccesoVista/recuperarContrasena.php');
                  alert('No se pudo recuperar la contraseña.');
              </script>";
          }else{
              $mail = new PHPMailer(true);
              try {
                  //Server settings
                  // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                  $mail->isSMTP();                                            //Send using SMTP
                  $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                  $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                  $mail->Username   = 'madaprueba123@gmail.com';                     //SMTP username
                  $mail->Password   = 'madaprueba123456789';                               //SMTP password
                  $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                  $mail->Port       = 465;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
          
                  //Recipients
                  $mail->setFrom('madaprueba123@gmail.com', 'Soporte al cliente');
                  $mail->addAddress($correoRecuperar);     //Add a recipient
                  /*$mail->addAddress('ellen@example.com');               //Name is optional
                  $mail->addReplyTo('info@example.com', 'Information');
                  $mail->addCC('cc@example.com');
                  $mail->addBCC('bcc@example.com');*/
          
                  //Attachments
                  /*$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                  $mail->addAttachment('/tmp/image.jpg', 'new.jpg');*/    //Optional name
          
                  //
                  $url = "http://localhost:8888/MadaWebSistema/View/AccesoVista/restablecer.php?codigo=".$codigo;
                  $mail->isHTML(true); 
                  $mail->CharSet = 'UTF-8';                                 //Set email format to HTML
                  $mail->Subject = 'Mada || - Restablecer contraseña';
                  $mail->Body    = "<div style='border: 1px solid #000; width:600px; height:300px; background-color: #F7F9F9; text-align:center;'><h1 style='text-align:center; color: Black'>Mada</h1><br>".
                                      "<p style='color:Black; text-align:center;'><b>Hola, recibimos la solicitud para cambiar tu contraseña, presiona el botón para hacerlo.</b></p><br>"
                                      ."<a href='$url' style='color: white; cursor: pointer; width:35px; height:38px; background-color: #8E44AD; border-radius: 4px; text-decoration:none; padding: 4px 25px; border: 1px solid #5B2C6F';><b>Restablecer Contraseña</b></a></div>"; //. $codigo;
                  /*$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';*/
          
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
