<?php
require_once('../../Controller/UsuariosControlador/controladorAdministrador.php');
$administrador = $controladorAdministrador->buscarAdministrador($_GET['IdUsuario']);
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
        <title>Editar Administrador</title>
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
                    <a class="dropdown-item" href="#!">Mi perfíl</a>
                    <div class="dropdown-divider"></div>
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
                                 <a class="nav-link" href="#">Categorías</a>
                                    <a class="nav-link" href="#">Productos</a>
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
                        <h1 class="mt-4">Editar información</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">¡Los cambios que aquí se realicen se veran en el perfil del usuario!</li>
                        </ol>

                    <form>
                        <div class="form-row">
                            <div class="col-md-4 mb-3">
                            <label for="validationDefault01">Nombre</label>
                            <input type="text" class="form-control" id="validationDefault01" value="<?php echo $administrador['Nombre'] ?>" name="nombre" >
                            </div>
                            <div class="col-md-4 mb-3">
                            <label for="validationDefault02">Apellido</label>
                            <input type="text" class="form-control" id="validationDefault02" placeholder="Last name" value="Otto" required>
                            </div>
                            <div class="col-md-4 mb-3">
                            <label for="validationDefaultUsername">Username</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupPrepend2">@</span>
                                </div>
                                <input type="text" class="form-control" id="validationDefaultUsername" placeholder="Username" aria-describedby="inputGroupPrepend2" required>
                            </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                            <label for="validationDefault03">City</label>
                            <input type="text" class="form-control" id="validationDefault03" placeholder="City" required>
                            </div>
                            <div class="col-md-3 mb-3">
                            <label for="validationDefault04">State</label>
                            <input type="text" class="form-control" id="validationDefault04" placeholder="State" required>
                            </div>
                            <div class="col-md-3 mb-3">
                            <label for="validationDefault05">Zip</label>
                            <input type="text" class="form-control" id="validationDefault05" placeholder="Zip" required>
                            </div>
                        </div>
                        <button class="btn btn-success" type="submit">Guardar cambios</button>
                        <a href="../" class="btn btn-danger">Cancelar</a>
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
        <script src="../../libraries/jquery.dataTables.min.js"></script>
        <script src="../../libraries/dataTables.bootstrap4.min.js"></script>
    </body>
    <script>
    $(document).ready(function() {
    $('#dataTable').DataTable();
    } );

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
