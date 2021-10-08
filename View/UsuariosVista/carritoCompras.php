<?php
include "../../Controller/VistaClienteControlador/controladorVistaCliente.php";
include "../../Controller/VistaClienteControlador/controladorCarrito.php";


$listarcategorias = $controladorVistaCliente->listarCategoriasVista();
// $clienteDatos = $controladorVistaCliente->cliente($_SESSION['id']);


// session_start();
?>


<!DOCTYPE html>
<html lang="es">
<head>
	<title>Carrito de compras || Mada</title>
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
	<link rel="stylesheet" type="text/css" href="../../vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../../css/util.css">
	<link rel="stylesheet" type="text/css" href="../../css/main.css">
	<style>
		#botonPago{
			display:  none;
		}
		#alerta{
			display:  none;
		}
	</style>
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
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="<?php  echo (empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']);?>">
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
							<li><a href="#"><?php echo $listar['NombreCategoria']?></a></li>
									
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
							</span>
						</div>
					</li>
					<?php } ?>
				</ul>
				
				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						Total:
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
	
	<!-- Shoping Cart -->

	

	<!-- <form class="bg0 p-t-75 p-b-85"> -->
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
					<table class="table table-responsive">
						<thead>
							<tr>
							<th scope="col"></th>
							<th scope="col">Producto</th>
							<th scope="col">Cantidad</th>
							<th scope="col">Talla</th>
							<th scope="col">Color</th>
							<th scope="col">Precio</th>
							<th scope="col">Total</th>
							<th scope="col">Quitar</th>
							</tr>
						</thead>
						<?php 
						$total = 0;
						$cont;
						 ?>
						<tbody>
						<?php 
							if(!empty($_SESSION['CARRITOMADA'])) {
						?>
							<?php foreach($_SESSION['CARRITOMADA'] as $indice => $producto) { ?>
							<tr>
							<th scope="row"><img class="img-thumbnail" width="80px" src="../../images/productos/<?php echo $producto['Foto'] ?>" alt=""></th>
							<td><?php echo $producto['Nombre'];?></td>
							<td><?php echo $producto['Cantidad']?></td>
							<td><?php echo $producto['Talla']?></td>
							<td><?php echo $producto['Color'] ?></td>
							<td><?php echo $producto['Precio']?></td>
							<td><?php echo  number_format( $producto['Precio']*$producto['Cantidad'],3)?> <?php $total+= number_format( $producto['Precio']*$producto['Cantidad'],3) ?></td>
							<td>
							<form action="../../Controller/VistaClienteControlador/controladorCarrito.php" method="post">
								<input type="hidden" name="idProducto" value="<?php echo openssl_encrypt($producto['ID'],COD,KEY)?>">
								<input type="hidden" name="tallaProducto" value="<?php echo openssl_encrypt($producto['Talla'],COD,KEY)?>">
								<input type="hidden" name="colorProducto" value="<?php echo openssl_encrypt($producto['Color'],COD,KEY)?>">
								<button type="submit" class="btn btn-dark" name="btnAccion" value="eliminar"><i class="fa fa-times" aria-hidden="true"></i></button>
							</form>
							</td>
							</tr>
							<?php 
							$cont = $producto['Nombre']." Talla ".$producto['Talla']." ".$producto['Color']."\n";
							$productoCompra = $producto["Nombre"];

						} ?>
						<?php
    					} else {
    					?>
							<div class="alert alert-dark" role="alert">
								No hay productos en el carrito
							</div>
						<?php } ?>
						</tbody>
						</table>
					</div>
				</div>
				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Total del carrito
						</h4>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Subtotal:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-110 cl2">
									<?php echo number_format($total,3) ?>
								</span>
							</div>
						</div>

						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Envío:
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<p class="stext-111 cl6 p-t-2">
									Por favor ingrese su dirección para realizar el envío, recuerde que este tiene un costo de <?php echo number_format($total,3) ?>
								</p>
								
								<div class="p-t-15">
									<span class="stext-112 cl8">
										Datos de envío
									</span>

									<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
										<select class="js-select2"  id= "ciudad" name="ciudad">
											<option>Ciudad</option>
											<option value="Medellin">Medellín</option>
										</select>
										<div class="dropDownSelect2"></div>
									</div>
									<?php 
										if(isset($_SESSION['correo'])){
									?>

									<input type="hidden" id="idCliente" name="idCliente" value="<?php echo $_SESSION['id']?>">
									<?php
										}
									?>
									<div class="bor8 bg0 m-b-12">
										<input id="direccion" class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="state" placeholder="Dirección de envío">
									</div>

									<div class="bor8 bg0 m-b-22">
										<input id="documento" class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="postcode" placeholder="Documento">
									</div>

									<div class="bor8 bg0 m-b-22">
										<input id="celular" class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="postcode" placeholder="Número de celular">
									</div>

									<div class="bor8 bg0 m-b-22">
										<input id="descrip" class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="postcode" placeholder="Describe tu residencia">
									</div>	
								</div>
							</div>
						</div>

						<div class="flex-w flex-t p-t-27 p-b-33">
							<div class="size-208">
								<span class="mtext-101 cl2">
									Total:
								</span>
							</div>

							<div class="size-209 p-t-1">
								<span class="mtext-110 cl2">
									<?php echo number_format($total,3) ?>
								</span>
							</div>
						</div>

						<div>
							<button class="btn btn-dark btn-block" onclick="mostrarBoton()">Guardar</button>
						</div>
						<div>

						</div>

						<br>
						<div id="alerta">
							<div class="alert alert-danger" role="alert">
							  Llena todos los campos!
							</div>
						</div>
						<br>
						<div id="botonPago" class="btn btn-block">
							<form>
					        <script
					        <?php 
							if(isset($_SESSION['correo'])){
							?>
					            src="https://checkout.epayco.co/checkout.js"
					            class="epayco-button"
					            data-epayco-key="491d6a0b6e992cf924edd8d3d088aff1"
					            data-epayco-amount="<?php echo number_format($total,3) ?>"
					            data-epayco-name=<?php echo $productoCompra ?>
					            data-epayco-description="<?php echo $cont ?>"
					            data-epayco-currency="cop"
					            data-epayco-country="co"
					            data-epayco-test="true"
					            data-epayco-external="false"
					            data-epayco-rejected="http://localhost:8888/MadaWebSistema/View/UsuariosVista/carritoCompras.php"
					            data-epayco-confirmation="http://localhost:8888/MadaWebSistema/View/UsuariosVista/carritoCompras.php"
					            data-epayco-name-billing="<?php echo $_SESSION['nombre'];?>"
					            data-epayco-type-doc-billing="CC"
					            data-epayco-number-doc-billing= "1000887442"
						        data-epayco-mobilephone-billing=celular
						        data-epayco-address-billing=direccion>
						    <?php } ?>
						        </script>
						    </form>
						 </div>
					</div>
				</div>
			</div>
		</div>
	<!-- </form> -->
	
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
	<script src="../../js/jquery-3.6.0.min.js"></script>
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
		function mostrarBoton(){
			const direccion = document.getElementById("direccion").value;
			const documento = document.getElementById("documento").value;
			const celular = document.getElementById("celular").value;
			const descrip = document.getElementById("descrip").value;
			const ciudad = document.getElementById("ciudad").value;
			//const idCliente = document.getElementById("idCliente").value;


			if (direccion == "" || documento == "" || celular == "" || descrip == "" || ciudad == "") {
				document.getElementById("alerta").style.display = "block";
			}else{
				document.getElementById("botonPago").style.display = "block";
				document.getElementById("alerta").style.display = "none";
			}


		}
	</script>

</body>
</html>