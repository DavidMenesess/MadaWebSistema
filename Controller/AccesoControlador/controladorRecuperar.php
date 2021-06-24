<?php
require_once('../../Model/conexion.php');
require_once('../../Model/usuario.php');
require_once('../../Model/recuperarcontrasena.php');
require_once('../../Model/AccesoModelo/crudRecuperar.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP ;
use PHPMailer\PHPMailer\Exception;

require '../../libraries/phpMailer/Exception.php';
require '../../libraries/phpMailer/PHPMailer.php';
require '../../libraries/phpMailer/SMTP.php';


class controladorRecuperar{

    public function __construct(){

    }
    public function validarExisteCorreo($correo){

        $usuario = new usuario();
        $usuario->setCorreo($correo);

        $crudRecuperar = new crudRecuperar();
        return $crudRecuperar->validarExisteCorreo($usuario);
    }

    public function insertarDatos($correo,$codigo){
        // $variables = new recuperarcontrasena();
        // $variables->setCorreo($correo);
        // $variables->setCodigo($codigo);
        $crudRecuperar = new crudRecuperar();
        return $crudRecuperar->insertarCodigo($correo, $codigo);
    }

    public function buscar_correo($codigo)
    {
        $crudRecuperar = new crudRecuperar();
        return $crudRecuperar->buscar_correo($codigo);
    }

    public function cambiar_contrasena($contrasena, $correo, $codigo){
        $contrasena_encriptada = hash('sha512', $contrasena);
        $crudRecuperar = new crudRecuperar();
        return $crudRecuperar->cambiar_contrasena($contrasena_encriptada, $correo, $codigo);
    }
}

$controladorRecuperar = new controladorRecuperar();

if(isset($_POST['restablecerContra'])){
    // al guardar lo que recibimos en el input en mensaje podemos obtener aqui el valor de retorno del modelo
    $mensaje = $controladorRecuperar->validarExisteCorreo($_POST['correoRecuperar']);
    //Recibo el valor de retorno de la variable mensaje y según el caso hago una accion u otra... mandar el correo o la alerta.
    if($mensaje == "El correo existe"){
        
        $correoRecuperar = $_POST['correoRecuperar'];
        $codigo = uniqid(true);

        $respuesta = $controladorRecuperar->insertarDatos($correoRecuperar, $codigo);
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
                $mail->Body    = "<div style='border: 1px solid #000; width:600px; height:500px; background-color: #F7F9F9; text-align:center;'><h1 style='text-align:center; color: Black'>Mada</h1><br>".
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
        $correo = $controladorRecuperar->buscar_correo($_POST['codigo']);
        if ($correo != null) {
            $mensaje = $controladorRecuperar->cambiar_contrasena($_POST['nuevaContrasena'], $correo, $_POST['codigo']);
        }

        if($mensaje = "Se cambio la contraseña"){
            echo "<script>
                    location.replace('../../View/AccesoVista/login.php');
                    alert('Se cambio la contraseña');
                </script>";
        }
    }

?>