<?php
require_once('../../Controller/ProduccionControlador/controladorProductos.php');
$listarProducto = $controladorProductos->buscarProducto($_GET['idProducto']);
$listaCategorias = $controladorProductos->listarCategorias();
session_start();
if(!isset ($_SESSION['correoUsuario'])){//Si no existe la varible de sesión lo redirecciona al login
    header("Location: ../../View/AccesoVista/login.php");
}
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Editar producto</title>
        <link href="../../css/styles.css" rel="stylesheet" />
        <link href="../../libraries/dataTables.bootstrap4.min.css" rel="stylesheet"/>
        <script src="../../libraries/fontawesome.js"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="../../View/dashboard.php">Mada</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0"">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#!" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="../../Controller/AccesoControlador/controladorAcceso.php?cerrarSesion">Cerrar sesión</a>
                </div>
            </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Gestionar</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Usuarios
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="../../View/UsuariosVista/administradores.php">Administradores</a>
                                    <a class="nav-link" href="../../View/UsuariosVista/clientes.php">Clientes</a>
                                </nav>
                            </div>
                             <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-tshirt"></i></div>
                                Producción
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                             </a>
                             <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                 <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                 <a class="nav-link" href="categorias.php">Categorías</a>
                                    <a class="nav-link" href="productos.php">Productos</a>
                                    <a class="nav-link" href="entradasProductos.php">Entradas</a>
                                 </nav>
                             </div>
                             <div class="sb-sidenav-menu-heading">Principal</div>
                                <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon"><i class="fas fa-truck"></i></div>
                                    Pedidos
                                </a>
                                <a class="nav-link" href="#">
                                <div class="sb-nav-link-icon"><i class="fas fa-piggy-bank"></i></div>
                                    Ventas
                                </a>
                                
                            </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Frase o slogan</div>
                        que desee el cliente
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4 text-center">Editar información del producto</h1>
                        <br>
                        <br>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">¡Los cambios realizados se podrán editar nuevamente</li>
                        </ol>
                        <form action="../../Controller/ProduccionControlador/controladorProductos.php" method="POST" onsubmit="return validarEditDatosProducto();" autocomplete="off" accept-charset="utf-8">
                            <div class="form-group">
                                <label for="idProducto">ID</label>
                                <input type="number" class="form-control" id="idProducto" name="idProducto" readonly value="<?php echo $listarProducto['IdProducto']?>">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $listarProducto['NombreProducto']?>">
                                </div>
                                <div class="form-group col-md-6">
                                <label for="descripcion">Descripción</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $listarProducto['Descripcion']?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                <label for="precio">Precio</label>
                                <input type="text" class="form-control" id="precioNuevo" name="precioNuevo" value="<?php echo $listarProducto['Precio'] ?>">
                                </div>
                                <div class="form-group col-md-6">
                                <div class="input-group-prepend">
                                        <label for="categoria">Categoría</label>
                                   </div>
                                   
                                    <select class="custom-select" id="categoria" name="categoria">
                                        <option selected value ="<?php echo $listarProducto['IdCategoria'];?>">Seleccionar</option>
                                    <?php
                                        foreach($listaCategorias as $categoria){
                                    ?>
                                        <option value="<?php echo $categoria[0];?>"><?php echo $categoria[1];?></option>
                                    <?php
                                        }
                                    ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                <input type="hidden" class="form-control" id="precioActual" readonly name="precioActual" value="<?php echo $listarProducto['Precio'] ?>">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success" name="actualizarDatosProducto" id="actualizarDatosProducto">Guardar cambios</button>
                            <a href="productos.php" class="btn btn-danger">Cancelar</a>
                        </form>
                        <br>
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item active">Actualiza aquí las imágenes del producto</li>
                            </ol>
                        <br>
                        <div class="container text-center">
                            <img class="img-thumbnail" width="100px" src="../../images/productos/<?php echo $listarProducto['Imagen1'];?>" alt="<?php echo $listarProducto['Imagen1']?>"/>
                            <img class="img-thumbnail" width="100px" src="../../images/productos/<?php echo $listarProducto['Imagen2'];?>" alt="<?php echo $listarProducto['Imagen2']?>"/>
                            <img class="img-thumbnail" width="100px" src="../../images/productos/<?php echo $listarProducto['Imagen3'];?>" alt="<?php echo $listarProducto['Imagen3']?>"/>
                        </div>
                        <br>
                        <!--Accordion inicio-->
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Actualiza solo una imagen
                                    </button>
                                </h2>
                                </div>

                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <form action="../../Controller/ProduccionControlador/controladorProductos.php" enctype="multipart/form-data" onsubmit="return validarEditImagen1()" method="POST">
                                        <label for="imagen1Nueva">Actualizar imagen #1</label>
                                            <div class="input-group">
									            <input type="file" class="form-control" name="imagen1Nueva" id="imagen1Nueva">
                                                <input type="hidden" class="form-control" id="idProducto" name="idProducto" autocomplete="off" readonly value="<?php echo $listarProducto['IdProducto']?>">
                                                <input type="hidden" name="imagen1Antigua" value="<?php echo $listarProducto['Imagen1']; ?>">
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-success" name="editarImagen1" id="editarImagen1">
                                                        Guardar
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="card-body">
                                    <form action="../../Controller/ProduccionControlador/controladorProductos.php" enctype="multipart/form-data" onsubmit="return validarEditImagen2()" method="POST">
                                        <label for="imagen2">Actualizar imagen #2</label>
                                            <div class="input-group">
									            <input type="file" class="form-control" name="imagen2Nueva" id="imagen2Nueva">
                                                <input type="hidden" class="form-control" id="idProducto" name="idProducto" autocomplete="off" readonly value="<?php echo $listarProducto['IdProducto']?>">
                                                <input type="hidden" name="imagen2Antigua" value="<?php echo $listarProducto['Imagen2']; ?>">
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-success" name="editarImagen2" id="editarImagen2">
                                                        Guardar
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="card-body">
                                    <form action="../../Controller/ProduccionControlador/controladorProductos.php" enctype="multipart/form-data" onsubmit="return validarEditImagen3()" method="POST">
                                        <label for="imagen3">Actualizar imagen #3</label>
                                            <div class="input-group">
									            <input type="file" class="form-control" name="imagen3Nueva" id="imagen3Nueva">
                                                <input type="hidden" class="form-control" id="idProducto" name="idProducto" autocomplete="off" readonly value="<?php echo $listarProducto['IdProducto']?>">
                                                <input type="hidden" name="imagen3Antigua" value="<?php echo $listarProducto['Imagen3']; ?>">
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-success" name="editarImagen3" id="editarImagen3">
                                                        Guardar
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Actualiza las tres imágenes al mismo tiempo
                                    </button>
                                </h2>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <form action="../../Controller/ProduccionControlador/controladorProductos.php" enctype="multipart/form-data" onsubmit="return validarEditImagenes()" method="POST">
                                            <label for="imagen1">Imagen #1</label>
                                            <div class="input-group">
									            <input type="file" class="form-control" name="imagen1Nueva" id="imagen1">
                                            </div>
                                            <label for="imagen2">Imagen #2</label>
                                            <div class="input-group">
									            <input type="file" class="form-control" name="imagen2Nueva" id="imagen2">
                                            </div>
                                            <label for="imagen3">Imagen #3</label>
                                            <div class="input-group">
									            <input type="file" class="form-control" name="imagen3Nueva" id="imagen3">
                                            </div>
                                            <input type="hidden" class="form-control" id="idProducto" name="idProducto" autocomplete="off" readonly value="<?php echo $listarProducto['IdProducto']?>">
                                            <input type="hidden" name="imagen1Antigua" value="<?php echo $listarProducto['Imagen1']; ?>">
                                            <input type="hidden" name="imagen2Antigua" value="<?php echo $listarProducto['Imagen2']; ?>">
                                            <input type="hidden" name="imagen3Antigua" value="<?php echo $listarProducto['Imagen3']; ?>">
                                            <br>
                                            <div class="container text-center">
				      	                    <button type="submit"  class="btn btn-success" id="editarTodasImagenes" name="editarTodasImagenes">Guardar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>             
                        <!--Accordion final-->
                    </div>
                </main>
                <br>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Todos los derechos reservados &copy; Mada 2021</div>
                            <div>
                                <a href="#">Política de privacidad</a>
                                &middot;
                                <a href="#">Términos &amp; Condiciones</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="../../libraries/jquery-3.5.1.slim.min.js"></script>
        <script src="../../libraries/bootstrap.bundle.min.js"></script>
        <script src="../../js/scripts.js"></script>
        <script src="../../js/validaciones/validacionesProductos.js"></script>
        <script src="../../libraries/jquery.dataTables.min.js"></script>
        <script src="../../libraries/dataTables.bootstrap4.min.js"></script>
    </body>
</html>
