<?php
require_once('../../Controller/UsuariosControlador/controladorAdministrador.php');
$listarAdministrador = $ControladorAdministrador->buscarAdministrador($_GET['IdUsuario']);
session_start();
if (!isset($_SESSION['correoUsuario'])) { //Si no existe la varible de sesión lo redirecciona al login
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
    <title>Editar Administrador</title>
    <link href="../../css/styles.css" rel="stylesheet" />
    <link href="../../libraries/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <script src="../../libraries/fontawesome.js"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="../../View/dashboard.php">Mada</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>

        <!-- Navbar-->
        <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0"">
                <li class=" nav-item dropdown">
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
                        <a class="nav-link" href="../dashboard.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                            Inicio
                        </a>
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
                            Producto
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link" href="../ProduccionVista/categorias.php">Categorías</a>
                                <a class="nav-link" href="../ProduccionVista/productos.php">Productos</a>
                                <a class="nav-link" href="../ProduccionVista/entradasProducto.php">Entradas</a>
                            </nav>
                        </div>
                        <div class="sb-sidenav-menu-heading">Principal</div>
                        <a class="nav-link" href="../VentasVista/pedidos.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-truck"></i></div>
                            Pedidos
                        </a>
                        <a class="nav-link" href="../VentasVista/ventasEnviadas.php">
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
                    <h1 class="mt-4 text-center">Editar información</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">¡Los cambios realizados se podrán editar nuevamente</li>
                    </ol>
                    <form action="../../Controller/UsuariosControlador/ControladorAdministrador.php" method="POST" autocomplete="off" onsubmit="return validarEditAdministrador();" accept-charset="utf-8">
                        <div class="form-group">
                            <label for="idUsuario">ID</label>
                            <input type="number" class="form-control" id="idUsuario" name="idUsuario" readonly value="<?php echo $listarAdministrador['IdUsuario'] ?>">
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $listarAdministrador['Nombre'] ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="apellido">Apellidos</label>
                                <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo $listarAdministrador['Apellido'] ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="correo">Correo</label>
                            <input type="email" class="form-control" id="correo" name="correo" readonly value="<?php echo $listarAdministrador['Correo'] ?>">
                        </div>
                        <button type="submit" class="btn btn-success" name="actualizarDatosAdmin" id="actualizarDatosAdmin">Guardar cambios</button>
                        <a href="administradores.php" class="btn btn-danger">Cancelar</a>
                    </form>
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
    <script src="../../libraries/sweetalert2@11.js"></script>
    <script src="../../js/validaciones/validacionesUsuarios.js"></script>
    <script src="../../libraries/jquery.dataTables.min.js"></script>
    <script src="../../libraries/dataTables.bootstrap4.min.js"></script>
</body>

</html>


