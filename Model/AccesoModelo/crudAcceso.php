<?php
require_once('../../Model/conexion.php');
//require_once('usuario.php');
class CrudAcceso{

    public function __construct(){

    }

    public function validarAcceso($usuario){// recibecomo parametro el objeto usuario.

        $Db = Db::Conectar();//Cadena de conexión
        $sql = $Db->prepare("SELECT * FROM usuarios 
        WHERE Correo = :correo AND Contrasena = :contrasena AND Estado = 1 "); //Definicion del sql
        $sql->bindValue('correo',$usuario->getCorreo());
        $sql->bindValue('contrasena',$usuario->getContrasena());
        $sql ->execute();//Ejecutar la consulta
        try{
            $sql->execute();
            $usuario->setExiste(0);
            if($sql->rowCount() > 0){//Determinar el numero de registros arrojados por la consulta
                $datosUsuario = $sql->fetch();//Asignar a la variable los datos de la consulta
                $usuario->setContrasena('');//Despues de determinar que el usuario existe asginamos un valor vacio a la contrasena, para no manejarla en el objeto
                $usuario->setExiste(1);
                $usuario->setRol($datosUsuario['IdRol']);//Asignando al atributo rol el id del usuario
                $usuario->setNombre($datosUsuario['Nombre']);
                $usuario->setIdUsuario($datosUsuario['IdUsuario']);
            }
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
        Db::CerrarConexion($Db);

        return $usuario;

        hola

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
                VALUES (:nombre, :apellido, :correo, :contrasena,1,2)');
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