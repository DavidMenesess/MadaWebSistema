<?php
include "../../Model/conexion.php";
include "../../Model/UsuariosModelo/CrudAdministrador.php";
include "../../Model/UsuariosModelo/usuario.php";
include "../../Controller/AccesoControlador/controladorAcceso.php";

class ControladorAdministrador
{

	public function __construct()
	{
	}

	public function listarAdministrador()
	{
		$crudAdministrador = new CrudAdministrador();

		return $crudAdministrador->listarAdministrador();
	}



	public function registrarAdministrador($Nombre, $Apellido, $Correo, $contrasena)
	{

		$nombreMayus = ucwords($Nombre);
		$apellidoMayus = ucwords($Apellido);
		$contrasena = hash('sha512', $contrasena);
		$usuario = new usuario();
		$usuario->setNombre($nombreMayus);
		$usuario->setApellido($apellidoMayus);
		$usuario->setCorreo($Correo);
		$usuario->setContrasena($contrasena);

		$crudAdministrador = new CrudAdministrador();
		return $crudAdministrador->registrarAdministrador($usuario);

		header('Location:../../View/UsuariosVista/administradores.php');
	}



	public function buscarAdministrador($IdUsuario)
	{
		$crudAdministrador = new CrudAdministrador();
		return $crudAdministrador->buscarAdministrador($IdUsuario);
	}

	public function actualizarEstadoAdministrador($IdUsuario, $Estado)
	{
		// $EstadoActualizado = null;
		// if ($Estado == 1) {
		// 	$EstadoActualizado = 0;
		// } elseif ($Estado == 0) {
		// 	$EstadoActualizado = 1;
		// }
		$usuario = new usuario();
		$usuario->setIdUsuario($IdUsuario);
		$usuario->setEstado($Estado);
		$crudAdministrador = new CrudAdministrador();
		$crudAdministrador->actualizarEstadoAdministrador($usuario);
		// header('Location:../../View/UsuariosVista/administradores.php');
	}

	public function actualizarDatosAdmin($idUsuario, $nombre, $apellido)
	{

		$nombreMayus = ucwords($nombre);
		$apellidoMayus = ucwords($apellido);
		$usuario = new usuario();
		$usuario->setIdUsuario($idUsuario);
		$usuario->setNombre($nombreMayus);
		$usuario->setApellido($apellidoMayus);


		$crudAdministrador = new CrudAdministrador();
		$crudAdministrador->actualizarDatosAdmin($usuario);
		header('Location:../../View/UsuariosVista/administradores.php');
	}

	public function eliminarAdministrador($idUsuario)
	{
		$crudAdministrador = new CrudAdministrador();
		return $crudAdministrador->eliminarAdministrador($idUsuario);
	}
}

$ControladorAdministrador = new ControladorAdministrador();

if (isset($_POST['registrarAdministrador'])) {
	$mensaje = $ControladorAdministrador->registrarAdministrador($_POST['Nombre'], $_POST['Apellido'], $_POST['Correo'], $_POST['Contrasena']);

	if ($mensaje == "El usuario ya existe") {
		echo "<script>
				location.replace('../../View/UsuariosVista/administradores.php');
				alert('El correo ya existe, por favor intente con otro.');
			  </script>";
	} else {
		echo "<script>
				location.replace('../../View/UsuariosVista/administradores.php');
				alert('Registro realizado con éxito.');
			  </script>";
	}
}

if (isset($_POST['actualizarEstadoAdministrador'])) {
	$ControladorAdministrador->actualizarEstadoAdministrador($_POST['IdUsuario'], $_POST['Estado']);
}

if (isset($_POST['editarAdministrador'])) {
	header('Location:../../View/UsuariosVista/editarAdministrador.php?IdUsuario=' . $_POST['IdUsuario']);
}

if (isset($_POST['actualizarDatosAdmin'])) {
	$ControladorAdministrador->actualizarDatosAdmin($_POST['idUsuario'], $_POST['nombre'], $_POST['apellido']);
}

if (isset($_POST['eliminarAdministrador'])) {
	$ControladorAdministrador->eliminarAdministrador($_POST['IdUsuario']);
	header('Location:../../View/UsuariosVista/administradores.php');
}
