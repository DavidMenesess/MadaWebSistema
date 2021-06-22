<?php

 class crudRecuperar{

    public function __construct(){

    }

    public function validarExisteCorreo($usuario){

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

    public function insertarCodigo($correo, $codigo){
        $mensaje = "";
        $Db = Db::Conectar();
        try {
            $Db->query("INSERT INTO recuperarcontrasena(codigo, correo) 
            VALUES ('$codigo', '$correo')");
            $mensaje = "Registro exitoso";
        } catch (Exception $e) {
            $mensaje = $e->getMessage();
        }
        Db::CerrarConexion($Db);
        return $mensaje;
    }   

    public function buscar_correo($codigo){
        $mensaje = "";
        $Db = Db::Conectar();
        try {
            $correo = $Db->prepare("SELECT correo FROM recuperarcontrasena WHERE codigo = '$codigo'");
            $correo->execute();
            return $correo->fetch();
        } catch (Exception $e) {
            $mensaje = $e->getMessage();
        }
        Db::CerrarConexion($Db);
        return $mensaje;
    }

    public function cambiar_contrasena($contrasena, $correo, $codigo){
        $mensaje = "";
        $Db = Db::Conectar();
        try {
            $sql1 = $Db->prepare("UPDATE usuarios SET Contrasena = :contrasena WHERE Correo = :correo");
            $sql1->bindValue('contrasena', $contrasena);
            $sql1->bindValue('correo', $correo['0']);
            $sql1->execute();
            $Db->query("DELETE FROM recuperarcontrasena WHERE codigo = '$codigo'");
            $mensaje = "Se cambio la contraseña";
        } catch (Exception $e) {
            $mensaje = $e->getMessage();
        }
        Db::CerrarConexion($Db);
        return $mensaje;
    }

}

?>