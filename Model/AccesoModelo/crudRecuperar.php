<?php

 class crudRecuperar{

    public function __construct(){

    }

    public function recuperarContrasena($usuario){

        $mensaje = "";
        $mensajeValidar = "";
        $Db = Db::Conectar();
        //Validar que un usuario no registre el mimso correo.
        $validarUsuario = $Db->prepare("SELECT Correo FROM usuarios
        WHERE Correo = :Correo");
        $validarUsuario->bindvalue('Correo',$usuario->getCorreo());
        try{
            $validarUsuario->execute();
            if($validarUsuario->rowCount() > 0){
                $mensajeValidar = "El correo existe";
                return $mensajeValidar;
            }//Si el usuaio no existe se ejecuta lo del else.... realiza la inserción.
            else{
                $mensajeValidar = "El correo no existe";
                return $mensajeValidar;
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