<?php
require_once('../../Controller/ProduccionControlador/controladorCategoria.php');
$listarCategoria = $controladorCategoria->buscarCategorias($_GET['IdCategoria']);
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
        <title>Editar Categoría</title>
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
                                    <a class="nav-link" href="administradores.php">Administradores</a>
                                    <a class="nav-link" href="clientes.php">Clientes</a>
                                </nav>
                            </div>
                             <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-tshirt"></i></div>
                                Producción
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                             </a>
                             <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                 <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                 <a class="nav-link" href="../ProduccionVista/categorias.php">Categorías</a>
                                    <a class="nav-link" href="../ProduccionVista/productos.php">Productos</a>
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
                        <h1 class="mt-4 text-center">Editar información de la categoría <?php echo $listarCategoria['NombreCategoria'] ?></h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">¡Los cambios realizados se podrán editar nuevamente!</li>
                        </ol>
                        <input type="text" class="form-control text-center"  value="Imagen actual" readonly>
                        <br>
                        <div class="form-group col-md-12 text-center">
                            <img class="img-thumbnail" width="100px" name="fotoAntigua" src="../../images/categorias/<?php echo $listarCategoria['UrlImagen'];?>" alt="foto categoria"/>
                        </div>
                        <div class="container-fluid">
                                <div class="row">
                                    <a href="categorias.php" class="btn btn-secondary ml-auto">Volver a categorías</a>
                                </div>
                            </div> 
                        <br>
                        <!--Acorddion inicio-->
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Actualiza solo el nombre
                                    </button>
                                </h2>
                                </div>
                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                <form action="../../Controller/ProduccionControlador/controladorCategoria.php" method="POST">
                                    <div class="input-group">
									    <input type="text" class="form-control" name="nuevoNombreCategoria" id="" required autocomplete="off" placeholder="Nuevo nombre">
                                        <input type="hidden" name="idCategoria" value="<?php echo $listarCategoria['IdCategoria'];?>">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-success" name="actualizarNombreCategoria" id="actualizarNombreCategoria">
                                                Guardar
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Actualiza solo la imagen
                                    </button>
                                </h2>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                <div class="card-body">
                                    <form action="../../Controller/ProduccionControlador/controladorCategoria.php" enctype="multipart/form-data" method="POST">
                                        <div class="input-group">
                                            <input type="file" class="form-control" name="nuevaImagenCategoria" id="nuevaImagenCategoria" required>
                                            <input type="hidden" name="imagenAntiguaCategoria" value="<?php echo $listarCategoria['UrlImagen']; ?>">
                                            <input type="hidden" name="idCategoria" value="<?php echo $listarCategoria['IdCategoria'];?>">
                                            <div class="input-group-append">
                                                <button type="submit" class="btn btn-success" name="actualizarImagenCategoria" id="actualizarImagenCategoria">
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
                                        ¡Actualiza ambas!
                                    </button>
                                </h2>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                <div class="card-body">
                                <form action="../../Controller/ProduccionControlador/controladorCategoria.php" enctype="multipart/form-data" method="POST">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="nuevoNombreCategoria" id="nuevoNombreCategoria" required autocomplete="off" placeholder="Nuevo nombre">
                                        <input type="file" class="form-control" name="nuevaImagenCategoria" id="nuevaImagenCategoria" required>
                                        <input type="hidden" name="imagenAntiguaCategoria" value="<?php echo $listarCategoria['UrlImagen']; ?>">
                                        <input type="hidden" name="idCategoria" value="<?php echo $listarCategoria['IdCategoria'];?>">
                                    <div class="input-group-append">
                                            <button type="submit" class="btn btn-success" name="actualizarTodoCategoria" id="actualizarTodoCategoria">
                                                Guardar
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                </div>
                                </div>
                            </div>
                            </div>
                        <!--Acordion final-->
                        <br>
                        <br>
                    </div>
                </main>
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
        <script src="../../libraries/jquery.dataTables.min.js"></script>
        <script src="../../libraries/dataTables.bootstrap4.min.js"></script>
    </body>
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
</html>
