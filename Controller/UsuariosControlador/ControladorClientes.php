<?php
include "../../Model/conexion.php";
include "../../Model/UsuariosModelo/CrudCliente.php";
include "../../Model/usuario.php";
include "../../Controller/AccesoControlador/controladorAcceso.php";

class ControladorCliente{

	public function __construct(){}

	public function listarCliente(){
		$crudCliente = new CrudCliente();

		return $crudCliente->listarCliente(); 
	}

	

	public function registrarCliente($Nombre,$Apellido,$Correo,$contrasena){

		$contrasena = hash('sha512',$contrasena);
		$usuario = new usuario();
		$usuario->setNombre($Nombre);
		$usuario->setApellido($Apellido);
		$usuario->setCorreo($Correo);
		$usuario->setContrasena($contrasena);

		$CrudUsuarios = new CrudCliente();
		return $CrudUsuarios->registrarCliente($usuario);

		header('Location:../../View/UsuariosVista/clientes.php');
	}

	

	public function buscarCliente($IdUsuario){
    	$CrudUsuarios = new CrudUsuarios();
    	return $CrudUsuarios -> buscarCliente($IdUsuario);

    }

    public function actualizarCliente($IdUsuario,$Estado){
    	$EstadoActualizado=null;
    	if ($Estado==1) {
    		$EstadoActualizado = 0;
    	} elseif ($Estado==0) {
    		$EstadoActualizado = 1;
    	}
    	$usuario = new usuario();
    	$usuario->setIdUsuario($IdUsuario);
		$usuario->setEstado($EstadoActualizado);		
		$CrudCliente = new crudCliente();
	    $CrudCliente -> actualizarCliente($usuario);	
	    header('Location:../../View/UsuariosVista/clientes.php');
		
    }


}

$ControladorCliente = new ControladorCliente();

if(isset($_POST['registrarCliente'])){
	$mensaje = $ControladorCliente->registrarCliente($_POST['Nombre'],$_POST['Apellido'],$_POST['Correo'],$_POST['Contrasena']);

	if($mensaje == "El usuario ya existe"){
		echo "<script>
				location.replace('../../View/UsuariosVista/clientes.php');
				alert('El correo ya existe, por favor intente con otro.');
			  </script>";
	}
	else{
		echo "<script>
				location.replace('../../View/UsuariosVista/clientes.php');
				alert('Registro realizado con éxito.');
			  </script>";
	}
}

if(isset($_POST['actualizarCliente'])){
	$ControladorCliente->actualizarCliente($_POST['IdUsuario'],$_POST['Estado']);
}


?>

