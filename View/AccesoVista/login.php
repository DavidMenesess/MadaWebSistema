<!DOCTYPE html>
<html lang="es">

<head>
	<title>Ingresar - Registrarse || Mada</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../css/utilLogin.css">
	<link rel="stylesheet" type="text/css" href="../../css/mainLogin.css">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
				<form class="login100-form validate-form flex-sb flex-w" action="../../Controller/AccesoControlador/controladorAcceso.php" method="POST" onsubmit="return validarCamposIngreso()">
					<span class="login100-form-title p-b-32 text-center">
						Mada
					</span>

					<span class="txt1 p-b-11">
						Correo
					</span>
					<div class="wrap-input100 validate-input m-b-36" data-validate="El correo es necesario">
						<input class="input100" type="text" name="correoUsuario" id="correoUsuario">
						<span class="focus-input100"></span>
					</div>

					<span class="txt1 p-b-11">
						Contraseña
					</span>
					<div class="wrap-input100 validate-input m-b-12" data-validate="La contraseña es necesaria">
						<span class="btn-show-pass">
							<i class="fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="contrasenaUsuario" id="contrasenaUsuario">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-48">
						<div class="contact100-form">
							<a href="registrar.php" class="txt3">
								¿No tienes una cuenta? ¡Registrate!
							</a>
						</div>

						<div class="contact100-form">
							<a href="recuperarContrasena.php" class="txt3">
								¿Olvidó su contraseña?
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="validarAcceso" id="validarAcceso">
							Ingresar
						</button>
					</div>
				</form>
			</div>
			<div class="container-login100-form-btn">
				<a href="../../View/UsuariosVista/index.php" class="login100-form-btn-regresarTienda" name="validarAcceso" id="validarAcceso">
					Volver a la tienda
				</a>
			</div>
		</div>
	</div>
	<!--===============================================================================================-->
	<script src="../../vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="../../vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="../../vendor/bootstrap/js/popper.js"></script>
	<script src="../../vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="../../vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="../../vendor/daterangepicker/moment.min.js"></script>
	<script src="../../vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="../../vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="../../js/mainLogin.js"></script>

	<script src="../../js/scripts.js"></script>
	<script src="../../js/validaciones/validacionesLogin.js"></script>
	<script src="../../libraries/sweetalert2@11.js"></script>

</body>

</html>