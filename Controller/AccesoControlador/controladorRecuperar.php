<?php
require_once('../../Model/conexion.php');
require_once('../../Model/usuario.php');
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
    public function recuperarContrasena($correo){

        $usuario = new usuario();
        $usuario->setCorreo($correo);

        $crudRecuperar = new crudRecuperar();
        return $crudRecuperar->recuperarContrasena($usuario);
    }
}

$controladorRecuperar = new controladorRecuperar();

if(isset($_POST['restablecerContra'])){
    // al guardar lo que recibimos en el input en mensaje podemos obtener aqui el valor de retorno del modelo
    $mensaje = $controladorRecuperar->recuperarContrasena($_POST['correoRecuperar']);
    //Recibo el valor de retorno de la variable mensaje y según el caso hago una accion u otra... mandar el correo o la alerta.
    if($mensaje == "El correo existe"){
        
            $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'madaprueba123@gmail.com';                     //SMTP username
        $mail->Password   = 'madaprueba123456789';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('madaprueba123@gmail.com', 'Administrador Mada');
        $mail->addAddress('davidmeneses07123@gmail.com',);     //Add a recipient
        /*$mail->addAddress('ellen@example.com');               //Name is optional
        $mail->addReplyTo('info@example.com', 'Information');
        $mail->addCC('cc@example.com');
        $mail->addBCC('bcc@example.com');*/

        //Attachments
        /*$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        $mail->addAttachment('/tmp/image.jpg', 'new.jpg');*/    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Este es el asunto del correo';
        $mail->Body    = 'Hola este es un correo de prueba y aquí va el cuerpo del mensaje';
        /*$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';*/

        $mail->send();
        echo 'El mensaje se envio correctamente';
    } catch (Exception $e) {
        echo "Hubo un error al enviar el mensaje: {$mail->ErrorInfo}";
    }
        }

        elseif($mensaje == "El correo no existe"){

            echo "<script>
                location.replace('../../View/AccesoVista/recuperarContrasena.php');
                alert('El correo no existe.');
            </script>";

        }

    }

?>