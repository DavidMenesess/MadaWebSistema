<?php
/*require_once('../../Model/AccesoModelo/crudValidarRepetido.php');
    class controladorValidarRepetido{

            public function __construct(){

            }

            public function validarRepetido($correo){

                $usuario = new usuario;
                $usuario->setCorreo($correo);
                $crudValidarRepetido = new crudValidarRepetido();
                return $crudValidarRepetido->validarRepetido($usuario);//envia el objeto con el correo al modelo
                
            }
    }

            $controladorValidarRepetido = new controladorValidarRepetido();

            if(isset($_POST['registrarUsuario'])){

                $usuario = ($controladorValidarRepetido->validarRepetido($_POST['correo']));//Recibe el correo del formulario

                if($usuario->getExiste() == 1){//Si el correo existe

                    echo '<script>alert("El correo ya existe"); </script>';
                    //header('Location:../../View/AccesoVista/registrar.php');

                }

            }*/

?>