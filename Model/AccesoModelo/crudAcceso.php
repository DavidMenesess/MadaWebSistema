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

            }
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
        Db::CerrarConexion($Db);

        return $usuario;

    }


}


?>