
<?php
require("../../Controller/VistaClienteControlador/controladorVistaCliente.php");
//include "../../Model/VistaClienteModelo/encriptarDatosCarrito.php";
include "../../Controller/VistaClienteControlador/controladorCarrito.php"; 

$listarcategorias = $controladorVistaCliente->listarCategoriasVista();
$informacionProducto = $controladorVistaCliente->obtenerDatosProducto($_GET['idProducto']);
$tallasProducto = $controladorVistaCliente->listaTallasProducto($_GET['idProducto']);

?>



<!DOCTYPE html>
<html lang="es">
<head>
	<title><?php echo $informacionProducto[1]?></title>
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
	<style>
		
	</style>
<!--===============================================================================================-->
</head>
<body class="animsition">
	
	<!-- Header -->
	<header class="header-v4">
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			<div class="wrap-menu-desktop how-shadow1">
				<nav class="limiter-menu-desktop container">
					
					<!-- Logo desktop -->		
					<a href="index.php" class="logo">
						<h2 style="color: #212121;">Mada</h2>
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
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart" data-notify="<?php  echo (empty($_SESSION['CARRITOMADA']))?0:count($_SESSION['CARRITOMADA']); ?>">
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
				<a href="index.php">
					<h2 style="color: #212121;">Mada</h2>
				</a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="<?php  echo (empty($_SESSION['CARRITOMADA']))?0:count($_SESSION['CARRITOMADA']); ?>">
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
					Carrito de compras
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			
			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full">
					<?php
					$total = 0; 
						if(!empty($_SESSION['CARRITOMADA'])){
					?>
					<?php $totalPorProducto = 0; ?>
					<?php foreach($_SESSION['CARRITOMADA'] as $indice => $producto) { ?>
					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
								<img class="img-thumbnail" width="80px" src="../../images/productos/<?php echo $producto['Foto'] ?>" alt="">
						</div>
						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
							 <?php echo $producto['Nombre']?>
							</a>
							<span class="header-cart-item-info">
							<?php echo $producto['Cantidad']?> x <?php echo $producto['Precio']?>
							<?php  $total+= number_format( $producto['Precio']*$producto['Cantidad'],3) ?>
							</span>
						</div>
					</li>
					<?php } ?>
				</ul>
				
				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						Total: <?php echo number_format($total,3) ?>
					</div>

					<div class="header-cart-buttons flex-w w-full">
						<a href="carritoCompras.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							Ver carrito
						</a>

						<a href="carritoCompras.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Ir a pagar
						</a>
					</div>
				</div>
				<?php
    				} else {
    				?>
						<div class="alert alert-dark" role="alert">
							No hay productos en el carrito
						</div>
				<div class="w-full">
					<div class="header-cart-buttons flex-w w-full">
						<a href="carritoCompras.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							Ver carrito
						</a>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
	
	
	
	

	<!-- Product Detail -->
	<section class="sec-product-detail bg0 p-t-65 p-b-60">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>
							<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

							<div class="slick3 gallery-lb">
								<div class="item-slick3" data-thumb="../../images/productos/<?php echo $informacionProducto[6]?>">
									<div class="wrap-pic-w pos-relative">
										<img src="../../images/productos/<?php echo $informacionProducto[6]?>" alt="IMG-PRODUCT">
									</div>
								</div>

								<div class="item-slick3" data-thumb="../../images/productos/<?php echo $informacionProducto[7]?>">
									<div class="wrap-pic-w pos-relative">
									    <img src="../../images/productos/<?php echo $informacionProducto[7]?>" alt="IMG-PRODUCT">
									</div>
								</div>

								<div class="item-slick3" data-thumb="../../images/productos/<?php echo $informacionProducto[8]?>">
									<div class="wrap-pic-w pos-relative">
										<img src="../../images/productos/<?php echo $informacionProducto[8]?>" alt="IMG-PRODUCT">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
					
				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<h4 class="mtext-105 cl2 js-name-detail p-b-14">
							<?php echo $informacionProducto[1]?>
						</h4>

						<span class="mtext-106 cl2">
							$<?php echo $informacionProducto[3]?>
						</span>

						<p class="stext-102 cl3 p-t-23">
							<?php echo $informacionProducto[2]?>
						</p>
						
						<!--  -->
						<form action="../../Controller/VistaClienteControlador/controladorCarrito.php" method="POST" onsubmit="return validarSeleccionProducto();">
							<input type="hidden" name="idProducto" id="idProducto" value="<?php echo openssl_encrypt($informacionProducto[0],COD,KEY)?>">
							<input type="hidden" name="nombreProducto" id="nombreProducto" value="<?php echo openssl_encrypt($informacionProducto[1],COD,KEY)?>">
							<input type="hidden" name="precioProducto" id="precioProducto" value="<?php echo openssl_encrypt($informacionProducto[3],COD,KEY)?>">
							<input type="hidden" name="fotoProducto" id="fotoProducto" value="<?php echo $informacionProducto[6]?>">
						<div class="p-t-33">
							<div class="flex-w flex-r-m p-b-10">
								<div class="size-203 flex-c-m respon6">
									Talla
								</div>

								<div class="size-204 respon6-next">
									<div class="rs1-select2 bor8 bg0">
										<select class="custom-select mr-sm-2" name="tallaProducto" id="tallaProducto">
											<option>Selecciona</option>
				 							<?php foreach($tallasProducto as $talla) { ?>
												<option value="<?php echo $talla[0] ?>" producto="<?php echo $_GET['idProducto'] ?>">Talla <?php echo $talla[0] ?></option>
											<?php } ?>
										</select>
										<div class="dropDownSelect2"></div>
									</div>
								</div>
							</div>

							<div class="flex-w flex-r-m p-b-10">
								<div class="size-203 flex-c-m respon6">
									Color
								</div>

								<div class="size-204 respon6-next">
									<div class="rs1-select2 bor8 bg0">
										<select class="custom-select mr-sm-2" name="colorProducto" id="colorProducto"></select>
										<div class="dropDownSelect2"></div>
									</div>
								</div>
							</div>

							<div class="flex-w flex-r-m p-b-10">
								<div class="size-204 flex-w flex-m respon6-next">
									<div class="wrap-num-product flex-w m-r-20 m-tb-10">
										<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-minus"></i>
										</div>

										<input class="mtext-104 cl3 txt-center num-product" type="number" name="cantidadProducto" id="cantidadProducto" value="1">

										<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-plus"></i>
										</div>
									</div>

									<button type="submit" name="btnAccion" value="Agregar" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
										Agregar al carrito
									</button>
								</div>
							</div>	
						</div>
					</form>
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

	<!-- Modal1 -->
	<div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
		<div class="overlay-modal1 js-hide-modal1"></div>

		<div class="container">
			<div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
				<button class="how-pos3 hov3 trans-04 js-hide-modal1">
					<img src="images/icons/icon-close.png" alt="CLOSE">
				</button>

				<div class="row">
					<div class="col-md-6 col-lg-7 p-b-30">
						<div class="p-l-25 p-r-30 p-lr-0-lg">
							<div class="wrap-slick3 flex-sb flex-w">
								<div class="wrap-slick3-dots"></div>
								<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

								<div class="slick3 gallery-lb">
									<div class="item-slick3" data-thumb="images/product-detail-01.jpg">
										<div class="wrap-pic-w pos-relative">
											<img src="../../images/productos/camiseta 1.jpg" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-01.jpg">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>

									<div class="item-slick3" data-thumb="images/product-detail-02.jpg">
										<div class="wrap-pic-w pos-relative">
											<img src="images/product-detail-02.jpg" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-02.jpg">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>

									<div class="item-slick3" data-thumb="images/product-detail-03.jpg">
										<div class="wrap-pic-w pos-relative">
											<img src="images/product-detail-03.jpg" alt="IMG-PRODUCT">

											<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="images/product-detail-03.jpg">
												<i class="fa fa-expand"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<!--===============================================================================================-->	
	<script src="../../vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="../../js/jquery-3.6.0.min.js"></script>
	<script src="../../js/validaciones/validacionesProductosC.js"></script>
	<script src="../../libraries/sweetalert2@11.js"></script>

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
	<script src="vendor/MagnificPopup/jquery.magnific-popup.min.js"></script>
	<!-- <script>
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
	</script> -->

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
				swal(nameProduct, "¡Se agregó al carrito!", "success");
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

<!--===============================================================================================-->
<script>
	//OBTENER DATOS DEL COLOR POR MEDIO DEL SELECT DE LA TALLA
	// function consultarColores(idProducto, talla){
	// 	alert(idProducto, talla)
	// }
	$("#tallaProducto").on("change", function(){
		talla = $("#tallaProducto option:selected").val()
		idProducto = $("#tallaProducto option:selected").attr("producto")
		if(talla != null && idProducto != null){
			let form = new FormData();
			form.append("idProducto", idProducto)
			form.append("talla", talla)
			form.append("consultarColor", "")
			$.ajax({
				url: "../../Controller/VistaClienteControlador/controladorVistaCliente.php", //Consultamos el controlador
				type: "post",
				data: form,
				contentType: false,
				processData: false,
				success: function (response) {
					if(response != "" && response != null){
						$('#colorProducto').empty()
						$('#colorProducto').append("<option value=''>Selecciona</option>")
						colores = $.parseJSON(response)
						colores.forEach(function(color) {
							$('#colorProducto').append("<option value='"+color.Color+"'>"+color.Color+"</option>")
						})
					}else{
						alert("No se encontraron colores para esta talla de la prenda.")
					}
				}, 	
			});
		}else
			alert('Ocurrio un error, intente de nuevo.')
	})
</script>
<!-- <script>
	function enviarDatos(){
		var tallaProducto = document.getElementById("tallaProducto").value;
		var colorProducto = document.getElementById("colorProducto").value;

		var idProducto = document.getElementById("idProducto").value;
		var nombreProducto = document.getElementById("nombreProducto").value;
		var precioProducto = document.getElementById("precioProducto").value;
		var fotoProducto = document.getElementById("fotoProducto").value;

		var formData = new FormData();
		formData.append('Agregar', '');
		formData.append("idProducto", idProducto);
		formData.append("nombreProducto", nombreProducto);
		formData.append("precioProducto", precioProducto);
		formData.append("fotoProducto", fotoProducto);
		formData.append("tallaProducto", tallaProducto);
		formData.append("colorProducto", colorProducto);
		$.ajax({
			url: '../../Controller/VistaClienteControlador/controladorCarrito.php',
			type: 'post',
			data: formData,
            contentType: false,
            processData: false,
		})
		.done(function() {
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		


	}
	
</script> -->

<!--===============================================================================================-->


<!--===============================================================================================-->
	<script src="../../js/main.js"></script>

</body>
</html>