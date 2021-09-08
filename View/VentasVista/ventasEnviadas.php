<?php
include "../../Controller/VentasControlador/ControladorVentas.php";
$listarVentasEnvi = $ControladorVentas->listarVentasEnviadas();

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
    <title>Ventas || Mada</title>
    <link href="../../css/styles.css" rel="stylesheet" />
    <link href="../../libraries/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <script src="../../libraries/fontawesome.js"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="../dashboard.php">Mada</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->

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
                                <a class="nav-link" href="../UsuariosVista/administradores.php">Administradores</a>
                                <a class="nav-link" href="../UsuariosVista/clientes.php">Clientes</a>
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
                                <a class="nav-link" href="../ProduccionVista/entradasProducto.php">Entradas</a>
                            </nav>
                        </div>
                        <div class="sb-sidenav-menu-heading">Principal</div>
                        <a class="nav-link" href="pedidos.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-truck"></i></div>
                            Pedidos
                        </a>
                        <a class="nav-link" href="ventasEnviadas.php">
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
                    <div class="container-fluid">
                        <h1 class="mt-4" style="text-align:center;">Gestión de ventas enviadas</h1>
                        <br>
                        <br>

                        <div>

                        </div>
                        <div class="card-body">
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>

                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="sampleTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Fecha</th>
                                                <th>Subtotal</th>
                                                <th>Total</th>
                                                <th>Estado</th>
                                                <th>Documento Usuario</th>
                                                <th>Botones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($listarVentasEnvi as $ventas) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $ventas['IdPedido']; ?></td>
                                                    <td><?php echo $ventas['FechaPedido']; ?></td>
                                                    <td><?php echo $ventas['Subtotal']; ?></td>
                                                    <td><?php echo $ventas['Total']; ?></td>
                                                    <td>
                                                        <?php if ($ventas['IdEstadoPedido'] == 1) {
                                                            echo '<span class="badge bg-warning">Pendiente</span>';
                                                        } else if ($ventas['IdEstadoPedido'] == 2) {
                                                            echo '<span class="badge bg-success">En proceso</span>';
                                                        } else if ($ventas['IdEstadoPedido'] == 3) {
                                                            echo '<span class="badge bg-danger">Cancelado</span>';
                                                        } else {
                                                            echo '<span class="badge bg-primary">Enviado</span>';
                                                        }
                                                        ?>

                                                    </td>
                                                    <td><?php echo $ventas['Nombre']; ?></td>
                                                    <td>
                                                        <form action="../../Controller/VentasControlador/ControladorVentas.php" method="POST" accept-charset="utf-8">
                                                            <input type="hidden" name="IdPedido" value="<?php echo $ventas['IdPedido']; ?>">

                                                            <button type="submit" id="verDetalleVenta" name="verDetalleVenta" class="btn btn-primary">Ver Detalle</button>

                                                            <!-- <button type="submit" id="eliminarUsuario"  name="eliminarUsuario" class="btn btn-warning">Eliminar</button> -->

                                                        </form>

                                                    </td>

                                                </tr>
                                            <?php
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2021</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>





    <script src="../../libraries/jquery-3.5.1.slim.min.js"></script>
    <script src="../../js/jquery-3.6.0.min.js"></script>
    <script src="../../libraries/bootstrap.bundle.min.js"></script>
    <script src="../../js/scripts.js"></script>
    <script src="../../libraries/jquery.dataTables.min.js"></script>
    <script src="../../libraries/dataTables.bootstrap4.min.js"></script>
    <script src="../../js/validaciones/validacionesUsuarios.js"></script>
    <script src="../../libraries/sweetalert2@11.js"></script>
    <!-- <script src="../js/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../../js/scripts.js"></script>
        

    <script src="../js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="../js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="../assets/demo/datatables-demo.js"></script>

    <!-- Data table plugin-->
    <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">
        $('#sampleTable').DataTable();
    </script> -->
</body>

</html>