<?php
require("../../Controller/ProduccionControlador/controladorProductos.php");
$listaProductos = $controladorProductos->listarProductos();
$listaCategorias = $controladorProductos->listarCategorias();

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
    <title>Productos || Mada</title>
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
                                <a class="nav-link" href="../UsuariosVista/administradores.php">Administradores</a>
                                <a class="nav-link" href="../UsuariosVista/clientes.php">Clientes</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                            <div class="sb-nav-link-icon"><i class="fas fa-tshirt"></i></div>
                            Producto
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                <a class="nav-link" href="categorias.php">Categorías</a>
                                <a class="nav-link" href="productos.php">Productos</a>
                                <a class="nav-link" href="entradasProducto.php">Entradas</a>
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
                    <h1 class="mt-4" style="text-align:center;">Gestión de productos</h1>
                    <br>
                    <br>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalProducto">
                        Nuevo producto
                    </button>
                </div>
                <div>

                </div>
                <div class="card-body">


                    <!-- Button trigger modal -->


                    <!-- Modal -->
                    <div class="modal fade" id="modalProducto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Nuevo producto</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                    <form class="form" action="../../Controller/ProduccionControlador/controladorProductos.php" method="POST" enctype="multipart/form-data" onsubmit="return validarRegistroProducto()" accept-charset="utf-8" autocomplete="off">
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="nombreProducto">Nombre:</label>
                                                <input type="text" class="form-control" name="nombreProducto" id="nombreProducto">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="descripcionProducto">Descripción:</label>
                                                <input type="text" class="form-control" name="descripcionProducto" id="descripcionProducto">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="precioProducto">Precio:</label>
                                                <input type="text" class="form-control" name="precioProducto" id="precioProducto">
                                            </div>
                                            <div class="form-group col-md-6">
                                                <div class="input-group-prepend">
                                                    <label for="categoria">Categoría:</label>
                                                </div>

                                                <select class="custom-select" id="categoriaProducto" name="categoria">
                                                    <option selected>Seleccionar</option>
                                                    <?php
                                                    foreach ($listaCategorias as $categoria) {
                                                    ?>
                                                        <option value="<?php echo $categoria[0]; ?>"><?php echo $categoria[1]; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>

                                            </div>
                                            <div class="form-group">
                                                <label for="foto1">Imagen1:</label>
                                                <input type="file" class="form-control-file" name="foto1" id="foto1">
                                            </div>
                                            <div class="form-group">
                                                <label for="foto2">Imagen2:</label>
                                                <input type="file" class="form-control-file" name="foto2" id="foto2">
                                            </div>
                                            <div class="form-group">
                                                <label for="foto3">Imagen3:</label>
                                                <input type="file" class="form-control-file" name="foto3" id="foto3">
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary btn-lg active" id="registrarProducto" name="registrarProducto">Registrar</button>
                                            <button type="button" class="btn btn-secondary btn-lg active" data-dismiss="modal">Cerrar</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table mr-1"></i>
                            Productos 👗👖💄❤
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" id="tablaProductos">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Descripción</th>
                                            <th>Precio</th>
                                            <th>Categoría</th>
                                            <th>Imagen #1</th>
                                            <th>Imagen #2</th>
                                            <th>Imagen #3</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($listaProductos as $producto) {
                                        ?>
                                            <tr>
                                                <td><?php echo $producto['IdProducto']; ?></td>
                                                <td><?php echo $producto['NombreProducto']; ?></td>
                                                <td><?php echo $producto['Descripcion']; ?></td>
                                                <td><?php echo $producto['Precio']; ?></td>
                                                <td><?php echo $producto['NombreCategoria']; ?></td>
                                                <td><img class="img-thumbnail" width="100px" src="../../images/productos/<?php echo $producto['Imagen1']; ?>" alt="<?php echo $producto['Imagen1'] ?>" /></td>
                                                <td><img class="img-thumbnail" width="100px" src="../../images/productos/<?php echo $producto['Imagen2']; ?>" alt="<?php echo $producto['Imagen2'] ?>" /></td>
                                                <td><img class="img-thumbnail" width="100px" src="../../images/productos/<?php echo $producto['Imagen3']; ?>" alt="<?php echo $producto['Imagen3'] ?>" /></td>

                                                <td>
                                                    <?php
                                                    if ($producto['Estado'] != 1) {
                                                        echo '<span class="badge bg-danger text-light">Inactivo</span>';
                                                    } else {
                                                        echo '<span class="badge bg-success text-light">Activo</span>';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <button type="submit" name="cambiarEstado" id="cambiarEstado" class="btn btn-primary" onclick="cambiarEstado(<?php echo $producto['IdProducto'];?>,<?php echo $producto['Estado'];?>);"><i class="fas fa-exchange-alt"></i></button>
 

                                                    <form action="../../Controller/ProduccionControlador/controladorProductos.php" method="POST" accept-charset="utf-8">
                                                        <input type="hidden" name="IdProducto" value="<?php echo $producto['IdProducto']; ?>">
                                                        <input type="hidden" name="estadoProducto" value="<?php echo $producto['Estado']; ?>">
                                                        <input type="hidden" name="imagen1" value="<?php echo $producto['Imagen1']; ?>">
                                                        <input type="hidden" name="imagen2" value="<?php echo $producto['Imagen2']; ?>">
                                                        <input type="hidden" name="imagen3" value="<?php echo $producto['Imagen3']; ?>">
                                                        <button type="submit" name="editarProducto" id="editarProducto" class="btn btn-info"><i class="fas fa-edit"></i></button>
                                                        <!--<button type="submit" name="eliminarProducto" id="eliminarProducto" class="btn btn-danger" onclick="return confirm('¿Está seguro de eliminar el registro?');"><i class="fas fa-trash-alt"></i></button>-->

                                                        <button type="submit" name="agregarDetalle" id="agregarDetalle" class="btn btn-success"><i class="fas fa-plus"></i></button>
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
                    <a href="reporteProductosPdf.php" target="_blank" class="btn btn-danger">Descargar <i class="fas fa-file-pdf"></i> pdf</a>
                    <a href="reporteProductosExcel.php" class="btn btn-success">Descargar <i class="fas fa-file-excel"></i> excel</a>
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
    <script src="../../js/jquery-3.6.0.min.js"></script>
    <script src="../../libraries/bootstrap.bundle.min.js"></script>
    <script src="../../js/scripts.js"></script>
    <script src="../../js/validaciones/validacionesProductos.js"></script>
    <script src="../../libraries/jquery.dataTables.min.js"></script>
    <script src="../../libraries/dataTables.bootstrap4.min.js"></script>
    <script src="../../libraries/sweetalert2@11.js"></script>
    
</body>
<script>
    $(document).ready(function() {
        $('#tablaProductos').DataTable();
    });

    let table = $('#tablaProductos').DataTable({
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

<script>

    function cambiarEstado(IdProducto,estadoProducto){

            Swal.fire({
                title: 'Cambiar estado del producto',
                text: "Se va a cambiar estado del producto ¿Seguro?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, cambiar estado!',
                cancelButtonText: 'Cancelar'
                }).then((result) => {
                if (result.isConfirmed) {

                    $estado = null;
                    if (estadoProducto == 0) {
                        $estado = 1; 
                    }else{
                        $estado = 0;
                    }
                    estadoProducto = $estado;

                    var formData = new FormData();
                    formData.append('cambiarEstado','');
                    formData.append('IdProducto',IdProducto);
                    formData.append('estadoProducto',estadoProducto);

                    $.ajax({
                        url: '../../Controller/ProduccionControlador/controladorProductos.php',
                        type: 'post',
                        data: formData,
                        contentType:false,
                        processData:false,
                        success: function(response){
                            // alert(response);
                            Swal.fire({
                              title: 'El estado se ha cambiado',
                              icon: 'success',
                              confirmButtonText: `OK`,

                            }).then((result) => {
                              /* Read more about isConfirmed, isDenied below */
                              if (result.isConfirmed) {
                                location.reload(); 
                              }
                            })
                            
                        }
                        

                    });
                    // 

                  }
                })

    }
</script>

</html>