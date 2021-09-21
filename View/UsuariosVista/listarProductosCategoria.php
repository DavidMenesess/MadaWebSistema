<?php
include "../../Controller/VistaClienteControlador/controladorVistaCliente.php";

$listarcategorias = $controladorVistaCliente->listarCategoriasVista();
$listarProductos = $controladorVistaCliente->listarProductosCategoria($_GET['IdCategoria']);
$nombreCategoria = $controladorVistaCliente->obtenerNombreCategoria($_GET['IdCategoria']);

session_start();

?>


<!DOCTYPE html>
<html lang="es">
<head>
	<title><?php echo $nombreCategoria[0]; ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.png"/>
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
	<link rel="stylesheet" type="text/css" href="../../vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../vendor/MagnificPopup/magnific-popup.css">
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
								<a href="productosC.php">Productos</a>
							</li>

							<li>
								<a href="#">Categorías</a>
								<ul class="sub-menu">
									<?php
									foreach($listarcategorias as $listar){
									?>
									<li><a href="listarProductosCategoria.php?IdCategoria=<?php echo $listar['IdCategoria']?>"><?php echo $listar['NombreCategoria']?></a></li>
									
									<?php
									}
									?>
								</ul>
							</li>

							<li>
								<a href="nosotros.php">Nosotros</a>
							</li>

							<li>
								<a href="contacto.php">Contacto</a>
							</li>
							<?php
							if(!isset($_SESSION['correo'])){
							?>
							<li>
								<a href="../AccesoVista/login.php">Ingresar</a>
							</li>
							<?php
							}
							?>
							<?php
							if(isset($_SESSION['correo'])){
							?>

							<li>
								<a href="perfilCliente.php?idCliente=<?php echo $_SESSION['id'] ?>">Mí perfíl</a>
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
					<div class="wrap-icon-header flex-w flex-r-m">
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="2">
							<i class="zmdi zmdi-shopping-cart"></i>
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
					<a href="productosC.php">Productos</a>
				</li>

				<li>
					<a href="#">Categorías</a>
					<ul class="sub-menu-m">
						<?php
							foreach($listarcategorias as $listar){
						?>
							<li><a href="listarProductosCategoria.php?IdCategoria=<?php echo $listar['IdCategoria']?>"><?php echo $listar['NombreCategoria']?></a></li>
									
						<?php
							}
						?>
					</ul>
					<span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
				</li>

				<li>
					<a href="nosotros.php">Nosotros</a>
				</li>

				<li>
					<a href="contacto.php">Contacto</a>
				</li>

				<?php
				if(!isset($_SESSION['correo'])){
				?>
				<li>
					<a href="../AccesoVista/login.php">Ingresar</a>
				</li>
				<?php
				 }
				?>

				<?php
				if(isset($_SESSION['correo'])){
				?>
				<li>
					<a href="perfilCliente.php?idCliente=<?php echo $_SESSION['id'] ?>">Mí perfíl</a>
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
					CARRITO DE COMPRAS
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
							VER CARRITO
						</a>

						<a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							VERIFICAR
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	
	<!-- Product -->
	<section class="bg0 p-t-23 p-b-130">
		<div class="container">
			<div class="p-b-10">
				<h3 class="ltext-103 cl5 text-center" >
					<?php 
						echo $nombreCategoria[0];
					?>
				</h3>
			</div>
			<br>
			<?php if(!empty($listarProductos)){ ?>
			<div class="flex-w flex-sb-m p-b-52">
				<?php
				foreach($listarProductos as $listar){
				?>
				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="../../images/productos/<?php echo $listar['Imagen1']?>" alt="IMG-PRODUCT" style="width: 268px; height: 400px; object-fit: cover;">

							<a href="detalleProductoCliente.php?idProducto=<?php echo $listar['IdProducto']?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
								Ver detalles
							</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
								<?php echo $listar['NombreProducto']?>
								</a>

								<span class="stext-105 cl3">
								$<?php echo $listar['Precio']?>
								</span>
							</div>
						</div>
					</div>
				</div>
				<?php
					}
				?>
				<?php 
					}else{ 
				?>
					<div class="alert alert-warning" role="alert">
						La categoría no tiene productos.
					</div>
				<?php } ?>
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
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="../../vendor/daterangepicker/moment.min.js"></script>
	<script src="../../vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="../../vendor/slick/slick.min.js"></script>
	<script src="../../js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script src="../../vendor/parallax100/parallax100.js"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="../../vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--===============================================================================================-->
	<script src="../../vendor/isotope/isotope.pkgd.min.js"></script>
<!--===============================================================================================-->
	<script src="../../vendor/sweetalert/sweetalert.min.js"></script>
	<script>
		$('.js-addwish-b2, .js-addwish-detail').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});
	
	</script>
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
	<script src="../../js/validaciones/variable.js"></script>

	<script>

		let IdCategoria = devolverVariable();
		console.log('Hello: ' + IdCategoria);
		console.info('Hello: ' + IdCategoria);
		// console.warn('Hello: ' + IdCategoria);
		// console.error('Hello: ' + IdCategoria);
		let url = '../../Controller/VistaClienteControlador/controladorListarProductosCate.php'
		fetch(url,IdCategoria)
			.then(response => response.json())
			.then(data => mostrarData(data))
			.catch(error => console.log(error))

		
		
	</script>

</body>
</html>