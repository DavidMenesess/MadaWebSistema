<?php

class CrudAdministrador{
	
	public function __construct(){

	}

	public function listarAdministrador(){
		$Db = Db::Conectar();

		$sql = $Db -> query('SELECT * FROM usuarios WHERE IdRol = 1');
		$sql -> execute();
		Db::CerrarConexion($Db);
		return $sql -> fetchAll();
	}


	public function registrarAdministrador($usuario){

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
				$mensajeValidar = "El usuario ya existe";
				return $mensajeValidar;
			}//Si el usuaio no existe se ejecuta lo del else.... realiza la inserción.
			else{
				$sql = $Db->prepare('INSERT INTO
				usuarios(Nombre, Apellido, Correo, Contrasena,Estado,IdRol )
				VALUES (:nombre, :apellido, :correo, :contrasena,1,1)');
				$sql->bindvalue('nombre',$usuario->getNombre());//dentro del value cuenta como variables las que tienen los dos puntos :
				$sql->bindvalue('apellido',$usuario->getApellido());//recciben los datos que se mandaron por el set en controladorRegistrar
				$sql->bindvalue('correo',$usuario->getCorreo());
				$sql->bindvalue('contrasena',$usuario->getContrasena());
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


	public function buscarAdministrador($IdUsuario){
		$Db = Db::Conectar();
		$sql = $Db -> query("SELECT * FROM usuarios WHERE IdUsuario = $IdUsuario");
		$sql -> execute();
	    Db::CerrarConexion($Db);
	    return $sql -> fetch(); //Retorna un registro
	}

	public function actualizarEstadoAdministrador($usuario){
		$mensaje="";
	    $Db = Db::Conectar();

	    $sql = $Db->prepare('UPDATE usuarios SET
	    	Estado=:Estado
	    	WHERE IdUsuario = :IdUsuario');
	    $sql->bindvalue('Estado',$usuario->getEstado());
	    $sql->bindvalue('IdUsuario',$usuario->getIdUsuario());


	    try{
	    	$sql->execute();
	    	$mensaje= "Modificación cool";
	    }catch(Exception $e){
	    	$mensaje = $e->getMessage();
	    }
	    Db::CerrarConexion($Db);
	    return $mensaje;
	}


	public function actualizarDatosAdmin($usuario){

		$mensaje = "";

		$Db = Db::Conectar();
		$sql = $Db->prepare('UPDATE usuarios SET 
		Nombre=:nombre,
		Apellido=:apellido
		WHERE IdUsuario=:idUsuario');

		$sql->bindvalue('nombre',$usuario->getNombre());
		$sql->bindvalue('apellido',$usuario->getApellido());
		$sql->bindvalue('idUsuario',$usuario->getIdUsuario());

		try{
			$sql->execute();
			$mensaje = "Modificación exitosa";
		}
		catch(Exception $e){
			$mensaje = $e->getMessage();
		}
		Db::CerrarConexion($Db);
		return $mensaje;

	}

	public function eliminarAdministrador($idUsuario){

		$mensaje = "";

		$Db = Db::Conectar();

		$sql = $Db->prepare('DELETE FROM usuarios WHERE IdUsuario = :idUsuario');
		$sql->bindvalue('idUsuario',$idUsuario);

		try{
			$sql->execute();
			$mensaje = "1";
		}
		catch(Exception $e){
			$mensaje = $e->getMessage();
		}
		Db::CerrarConexion($Db);
		return $mensaje;
	}




}

?>