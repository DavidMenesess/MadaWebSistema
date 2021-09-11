<?php
session_start();
if (!isset($_SESSION['correoUsuario'])) { //Si no existe la varible de sesión lo redirecciona al login
    header("Location: ../View/AccesoVista/login.php");
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
    <title>Mada || Administración</title>
    <link href="../css/styles.css" rel="stylesheet" />
    <link href="../libraries/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/estiloReloj.css">
    <script src="../libraries/fontawesome.js"></script>
</head>

<body class="sb-nav-fixed" onload="startTime()">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="dashboard.php">Mada</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>

        <!-- Navbar-->
        <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0"">
                <li class=" nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="userDropdown" href="#!" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="../Controller/AccesoControlador/controladorAcceso.php?cerrarSesion">Cerrar sesión</a>
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
                                <a class="nav-link" href="../View/UsuariosVista/administradores.php">Administradores</a>
                                <a class="nav-link" href="../View/UsuariosVista/clientes.php">Clientes</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-tshirt"></i></div>
                            Producción
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link" href="ProduccionVista/categorias.php">Categorías</a>
                                <a class="nav-link" href="ProduccionVista/productos.php">Productos</a>
                                <a class="nav-link" href="ProduccionVista/entradasProducto.php">Entradas</a>
                            </nav>
                        </div>
                        <div class="sb-sidenav-menu-heading">Principal</div>
                        <a class="nav-link" href="VentasVista/pedidos.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-truck"></i></div>
                            Pedidos
                        </a>
                        <a class="nav-link" href="VentasVista/ventasEnviadas.php">
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
                    <h1 class="mt-4 text-center">Administración</h1>
                    <br>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">¡Bienvenid@ nuevamente! <b><?php echo $_SESSION['Nombre']; ?></b></li>
                    </ol>
                    <div id="clockdate">
                        <div class="clockdate-wrapper">
                            <div id="clock"></div>
                            <div id="date"></div>
                        </div>
                    </div>
                    <br>
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        ¿Necesitas ayuda con algo? ¡Clic aquí para ver la ayuda en línea!
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="bg-info text-light text-center">Selecciona el módulo con el que tienes dudas</div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-xl-3 col-md-6">
                                            <div class="card bg-dark text-white mb-4">
                                                <div class="card-body">Producción</div>
                                                <div class="card-footer d-flex align-items-center justify-content-between">
                                                    <a class="small text-white stretched-link" href="#">Ver detalles</a>
                                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6">
                                            <div class="card bg-secondary text-white mb-4">
                                                <div class="card-body">Usuarios</div>
                                                <div class="card-footer d-flex align-items-center justify-content-between">
                                                    <a class="small text-white stretched-link" href="ProduccionVista/categorias.php">Ver detalles</a>
                                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6">
                                            <div class="card bg-dark text-white mb-4">
                                                <div class="card-body">Ventas</div>
                                                <div class="card-footer d-flex align-items-center justify-content-between">
                                                    <a class="small text-white stretched-link" href="#">Ver detalles</a>
                                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-3 col-md-6">
                                            <div class="card bg-secondary text-white mb-4">
                                                <div class="card-body">Pedidos</div>
                                                <div class="card-footer d-flex align-items-center justify-content-between">
                                                    <a class="small text-white stretched-link" href="#">Ver detalles</a>
                                                    <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card border-primary text-primary mb-4">
                                <div class="card-body text-primary">Administradores</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-primary stretched-link" href="UsuariosVista/administradores.php">Ver detalles</a>
                                    <div class="small text-primary"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card border-dark text-dark mb-4">
                                <div class="card-body text-dark">Clientes</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-dark stretched-link" href="UsuariosVista/clientes.php">Ver detalles</a>
                                    <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card border-warning text-warning mb-4">
                                <div class="card-body text-warning">Categorías</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-warning stretched-link" href="ProduccionVista/categorias.php">Ver detalles</a>
                                    <div class="small text-warning"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card border-info text-info mb-4">
                                <div class="card-body text-info">Productos</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-info stretched-link" href="ProduccionVista/productos.php">Ver detalles</a>
                                    <div class="small text-info"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card border-secondary text-secondary mb-4">
                                <div class="card-body text-secondary">Entradas</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-secondary stretched-link" href="ProduccionVista/entradasProducto.php">Ver detalles</a>
                                    <div class="small text-secondary"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card border-danger text-danger mb-4">
                                <div class="card-body text-danger">Pedidos</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-danger stretched-link" href="VentasVista/pedidos.php">Ver detalles</a>
                                    <div class="small text-danger"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card border-success text-success mb-4">
                                <div class="card-body text-success">Ventas</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-success stretched-link" href="VentasVista/ventasEnviadas.php">Ver detalles</a>
                                    <div class="small text-success"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-6">
                            <div class="card border-dark text-warning mb-4">
                                <div class="card-body text-dark">Ayuda general</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-dark stretched-link" href="#">Ver detalles</a>
                                    <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">
                            Todos los derechos reservados &copy; <script>
                                document.write(new Date().getFullYear());
                            </script> | Mada <i class="fa fa-heart" aria-hidden="true"></i>
                        </div>
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
    <script src="../libraries/jquery-3.5.1.slim.min.js"></script>
    <script src="../libraries/bootstrap.bundle.min.js"></script>
    <script src="../js/scripts.js"></script>
    <script src="../libraries/jquery.dataTables.min.js"></script>
    <script src="../libraries/dataTables.bootstrap4.min.js"></script>
    <script src="../js/reloj.js"></script>
</body>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });

    let table = $('#dataTable').DataTable({
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },

    });
</script>

</html>