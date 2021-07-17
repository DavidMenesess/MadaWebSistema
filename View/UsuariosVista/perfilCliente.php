
<?php

require_once('../../Controller/UsuariosControlador/ControladorClientes.php');
$cliente = $ControladorCliente->buscarCliente($_GET['idCliente']);


session_start();
if(!isset($_SESSION['correo'])){
	header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Mi perfíl</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../../images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../fonts/linearicons-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../css/util.css">
	<link rel="stylesheet" type="text/css" href="../../css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">
	
	<!-- Header -->
	<header class="header-v4">
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			
			<div class="wrap-menu-desktop how-shadow1">
				<nav class="limiter-menu-desktop container">
					
					<!-- Logo desktop -->		
					<a href="#" class="logo">
						<img src="../../images/icons/logo-01.png" alt="IMG-LOGO">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li>
								<a href="index.php">Inicio</a>
							</li>

							<li>
								<a href="product.html">Productos</a>
							</li>

							<li>
								<a href="shoping-cart.html">Categorías</a>
								<ul class="sub-menu">
									<li><a href="#">Categoría 1</a></li>
									<li><a href="#">Categoría 2</a></li>
									<li><a href="#">Categoriá 3</a></li>
								</ul>
							</li>

							<li>
								<a href="about.html">Nosotros</a>
							</li>

							<li>
								<a href="contact.html">Contacto</a>
							</li>

							<?php
							if(!isset($_SESSION['correo'])){
							?>
							<li>
								<a href="contact.html">Ingresar</a>
							</li>
							<?php
							}
							?>
							<?php
							if(isset($_SESSION['correo'])){
							?>

							<li  class="active-menu">
								<a href="perfilCliente.php">Mí perfíl</a>
							</li>

							<li>
							  <a href="../../Controller/AccesoControlador/controladorAcceso.php?cerrarSesion">Cerrar sesión</a>
							</li>
							<?php
							}
							?>
						</ul>
					</div>	

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m h-full m-r-15">
						<div class="flex-c-m h-full p-r-5">
							<div class="icon-header-item cl2 hov-cl1 trans-04 p-lr-11 icon-header-noti js-show-cart" data-notify="2">
								<i class="zmdi zmdi-shopping-cart"></i>
							</div>
						</div>
					</div>
				</nav>
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="index.html"><img src="images/icons/logo-01.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="2">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="main-menu-m">
				<li>
					<a href="index.php">Inicio</a>
				</li>

				<li>
					<a href="product.html">Productos</a>
				</li>

				<li>
					<a href="shoping-cart.html">Categorías</a>
					<ul class="sub-menu-m">
						<li><a href="#">Categoría 1</a></li>
						<li><a href="#">Categoría 2</a></li>
						<li><a href="#">Categoría 3</a></li>
					</ul>
					<span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
				</li>

				<li>
					<a href="about.html">Nosotros</a>
				</li>

				<li>
					<a href="contact.html">Contacto</a>
				</li>
				
				<?php
				if(isset($_SESSION['correo'])){
				?>
				<li>
					<a href="contact.html">Ingresar</a>
				</li>
				<?php
				}
				?>

				<?php
				if(isset($_SESSION['correo'])){
				?>
				<li>
					<a href="perfilCliente.php">Mí perfíl</a>
				</li>

				<li>
					<a href="../../Controller/AccesoControlador/controladorAcceso.php?cerrarSesion">Cerrar sesión</a>
				</li>
				<?php
					}
				?>
			</ul>
		</div>
	</header>

	<!-- Cart -->
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Cart
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			
			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full">
					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="images/item-cart-01.jpg" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								White Shirt Pleat
							</a>

							<span class="header-cart-item-info">
								1 x $19.00
							</span>
						</div>
					</li>

					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="images/item-cart-02.jpg" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								Converse All Star
							</a>

							<span class="header-cart-item-info">
								1 x $39.00
							</span>
						</div>
					</li>

					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="images/item-cart-03.jpg" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								Nixon Porter Leather
							</a>

							<span class="header-cart-item-info">
								1 x $17.00
							</span>
						</div>
					</li>
				</ul>
				
				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						Total: $75.00
					</div>

					<div class="header-cart-buttons flex-w w-full">
						<a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							View Cart
						</a>

						<a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Check Out
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('../../images/bg-01.jpg');">
		<h2 class="ltext-105 cl0 txt-center">
			<?php echo $_SESSION['nombre']; ?>
		</h2>
	</section>	


	<!-- Content page -->
	<section class="bg0 p-t-62 p-b-60">
		<div class="container">
			<h1 class="mt-4 text-center text-dark">Mis datos</h1>
			<br>
            <ol class="breadcrumb mb-4">
              <li class="breadcrumb-item active text-dark"><p>¡Hola!, este es tú perfíl en el encontrarás tú información personal, podrás editar algunos datos y guardar la nueva información. Tambien puedes ver las compras que haz realizado.</p></li>
            </ol>
		</div>
		<div class="container">
		<form action="../../Controller/UsuariosControlador/ControladorClientes.php" method="POST" accept-charset="utf-8">
			<div class="form-group">
				<label for="idCliente" class="text-dark">ID</label>
				<input type="number" class="form-control" id="idCliente" name="idCliente" autocomplete="of" readonly value="<?php echo $cliente['IdUsuario'] ?>">
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
				<label for="nombre" class="text-dark">Nombre</label>
				<input type="text" class="form-control" id="nombre" name="nombre" autocomplete="of" readonly value="<?php echo $cliente['Nombre']; ?>">
				</div>
				<div class="form-group col-md-6">
				<label for="apellido" class="text-dark">Apellidos</label>
				<input type="text" class="form-control" id="apellido" name="apellido" autocomplete="of" readonly value="<?php echo $cliente['Apellido']; ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="correo" class="text-dark">Correo</label>
				<input type="email" class="form-control" id="correo" name="correo" autocomplete="of" readonly value="<?php echo $cliente['Correo']; ?>">
			</div>
			<div class="form-group">
				<label for="contrasena" class="text-dark">Contraseña</label>
				<input type="password" class="form-control" id="contrasena" name="contrasena" autocomplete="of" readonly value="<?php echo $cliente['Contrasena'] ?>">
				<label for="mostrarContra" class="text-dark">Mostrar contraseña</label>
				<input type="checkbox" id="mostrarContra" onclick="mostrarContrasena();">
			</div>
			<button type="submit" class="btn btn-success" name="btnActualizarDatos" id="btnGuardar" style="display: none;">Guardar cambios</button>
			<button type="button" class="btn btn-info" id="btnEditar" onclick="activarInputs();">Editar información</button>
			<button type="button" class="btn btn-danger" id="btnCancelar" style="display: none;" onclick="mostrarBotones();">Cancelar</button>
		</form>
	</div>
	<div class="container">
		<h1 class="mt-4 text-center text-dark">Mis pedidos</h1>
		<br>
		<ol class="breadcrumb mb-4">
		  <li class="breadcrumb-item active text-dark"><p>¡Hola!, aquí tienes las compras que haz realizado.</p></li>
		</ol>
	</div>
	<div class="container">
	<div class="accordion" id="accordionExample">
		<div class="card">
		  <div class="card-header" id="headingTwo">
			<h2 class="mb-0">
			  <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
				Da click aquí para ver tus compras
			  </button>
			</h2>
		  </div>
		  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
			<div class="card-body">
			  En esta parte es donde van los pedidos, en forma de tabla u otra forma (por definir)
			</div>
		  </div>
		</div>
	  </div>
	</div>
	</section>	
	
		

	<!-- Footer -->
	<footer class="bg3 p-t-75 p-b-32">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Categorías
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Women
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Men
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Shoes
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Watches
							</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Ayuda
					</h4>

					<ul>
						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Mi orden
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Devoluciones 
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								Envíos
							</a>
						</li>

						<li class="p-b-10">
							<a href="#" class="stext-107 cl7 hov-cl1 trans-04">
								<b>Preguntas frecuentes</b>
							</a>
						</li>
					</ul>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Contáctanos
					</h4>

					<p class="stext-107 cl7 size-201">
						¿Alguna pregunta? escribenos a nuestro correo correo@ejemplo.com o a nuestro número de contacto 000000000000000
					</p>

					<div class="p-t-27">
						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-facebook"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-instagram"></i>
						</a>

						<a href="#" class="fs-18 cl7 hov-cl1 trans-04 m-r-16">
							<i class="fa fa-pinterest-p"></i>
						</a>
					</div>
				</div>

				<div class="col-sm-6 col-lg-3 p-b-50">
					<h4 class="stext-301 cl0 p-b-30">
						Políticas
					</h4>

					<a href="#" class="fs-14 cl7 hov-cl1 trans-04 m-r-16">Términos & Condiciones</a>
					<br>
					<a href="#" class="fs-14 cl7 hov-cl1 trans-04 m-r-16">Políticas de privacidad</a>
					
					
				 </div>
			   </div>

			<div class="p-t-40">
				<p class="stext-107 cl6 txt-center">
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Todos los derechos reservados &copy; <script>document.write(new Date().getFullYear());</script> | Mada <i class="fa fa-heart-o" aria-hidden="true"></i>
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				</p>
			</div>
		</div>
	</footer>


	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
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
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="../../vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
<!--===============================================================================================-->
	<script src="../../vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="../../js/main.js"></script>

	<script>
        function mostrarContrasena(){
           var mostrar = document.getElementById("contrasena");
           if(mostrar.type=="password"){
               mostrar.type="text";
           } 
           else{
               mostrar.type="password";
           }
        }
    </script>

	<script>

		function activarInputs(){
			
			document.getElementById('nombre').readOnly = false;
			document.getElementById('apellido').readOnly = false;
			document.getElementById('contrasena').readOnly = false;

			var btnEditar = document.getElementById('btnEditar');
			var btnCancelar = document.getElementById('btnCancelar');
			var btnGuardar = document.getElementById('btnGuardar');

			btnEditar.style.display = 'none';
			btnGuardar.style.display = 'inline';
			btnCancelar.style.display = 'inline';

			
		}
		
	</script>

	<script>

		function mostrarBotones(){

			document.getElementById('nombre').readOnly = true;
			document.getElementById('apellido').readOnly = true;
			document.getElementById('contrasena').readOnly = true;

			var btnEditar = document.getElementById('btnEditar');
			var btnCancelar = document.getElementById('btnCancelar');
			var btnGuardar = document.getElementById('btnGuardar');

			btnEditar.style.display = 'inline';
			btnGuardar.style.display = 'none';
			btnCancelar.style.display = 'none';
		}

	</script>
	

</body>
</html>