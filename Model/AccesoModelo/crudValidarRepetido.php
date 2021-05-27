<?php
/*require_once('../../Model/conexion.php');
//require_once('usuario.php');
class crudValidarRepetido{

    public function __construct(){

    }

    public function validarRepetido($usuario){// recibe como parametro el objeto usuario.

        $Db = Db::Conectar();//Cadena de conexión
        $sql = $Db->prepare("SELECT Correo FROM usuarios 
        WHERE Correo = :correo"); //Definicion del sql
        $sql->bindValue('correo',$usuario->getCorreo());
        $sql ->execute();//Ejecutar la consulta
        try{
            $sql->execute();
            $usuario->setExiste(0);
            if($sql->rowCount() > 0){//Determinar el numero de registros arrojados por la consulta
                $datosUsuario = $sql->fetch();//Asignar a la variable los datos de la consulta
                $usuario->setExiste(1);
            }
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
        }
        Db::CerrarConexion($Db);

        return $usuario;

    }


}*/


?>