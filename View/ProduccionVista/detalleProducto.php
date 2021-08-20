<?php
require("../../Controller/ProduccionControlador/controladorProductos.php");
//Recibo el id que es mandado por medio de controlador, lo envio nuevamente al controlador y este lo manda 
//Al modelo, que me retorna los valores encontrados según el Id del producto.
$producto = $controladorProductos->buscarProducto($_GET['idProducto']);
$listaEntradas = $controladorProductos->listarEntradasProducto($_GET['idProducto']);

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
        <title>Detalles del producto</title>
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
                        <h1 class="mt-4 text-center">Entradas del producto - <?php echo $producto['NombreProducto']?></h1>
                        <br>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">¡Agrega las entradas de este producto</li>
                        </ol>
                        <!--FORMULARIO DE INGRESAR AS ENTRADAS-->
                        <form action="../../Controller/ProduccionControlador/controladorProductos.php" method="POST" accept-charset="utf-8" novalidate autocomplete="off">
                        <div class="container">
                            <div class="form-group">
                                <br>
                                <label for="idUsuario">Generar las entradas del producto</label>
                                <input type="hidden" name="idProducto" value="<?php echo $producto['IdProducto']?>">
                                <button type="button" class="btn btn-info" id="generarEntrada" onclick="mostrarBoton();">Generar entrada</button>
                                <button type="submit" class="btn btn-success" name="guardarEntrada" id="guardarEntrada" style="display: none;">Guardar</button>
                            </div>
                        </form>
                        <!--FIN DEL FORMULARIO DE ENTRADAS-->
                        <br> 
                            <div class="">
                            <a href="productos.php" class="btn btn-secondary">Volver a productos</a>
                            </div>                    
                        <br>
                        <div class="card mb-4">
                      <div class="card-header">
                        <i class="fas fa-table mr-1"></i>
                        Entradas existentes del producto
                     </div>
                      <div class="card-body">
                         <div class="table-responsive">
                          <table class="table table-hover table-bordered" id="tablaEntradaProductos">      
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Color</th>
                                        <th>Talla</th>
                                        <th>Cantidad</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                  <tbody>
                                     <?php
                                     foreach ($listaEntradas as $entrada) {
                                     ?>
                                          <tr>
                                          <td><?php echo $entrada['IdDetalleProducto'];?></td>
                                          <td><?php echo $entrada['Color'];?></td>
                                          <td><?php echo $entrada['Talla'];?></td>
                                          <td><?php echo $entrada['Stock'];?></td>
                                          <td>
                                        <?php 
                                           if($entrada['Estado'] != 1){
                                            echo '<span class="badge bg-danger text-light">Inactivo</span>';
                                            }else{
                                            echo '<span class="badge bg-success text-light">Activo</span>';
                                             }
                                        ?>
                                        </td>
                                          
                                        <td>
                                          <form action="../../Controller/ProduccionControlador/controladorProductos.php" method="POST" accept-charset="utf-8">
                                            <input type="hidden" name="IdDetalleProducto" value="<?php echo $entrada['IdDetalleProducto'];?>">
                                            <input type="hidden" name="estadoDetalle" value="<?php echo $entrada['Estado'];?>">
                                            <input type="hidden" name="idProducto" value="<?php echo $producto['IdProducto']?>">
                                            <button type="submit" name="cambiarEstadoEntrada" id="cambiarEstadoEntrada" class="btn btn-primary"  onclick="return confirm('¿Está seguro de cambiar el estado?');"><i class="fas fa-exchange-alt"></i></button>
                                            <!--<button type="submit" name="" id="" class="btn btn-info"><i class="fas fa-edit"></i></button>-->
                                            <button type="submit" name="eliminarEntrada" id="eliminarEntrada" class="btn btn-danger" onclick="return confirm('¿Está seguro de eliminar el registro?');"><i class="fas fa-trash-alt"></i></button>
                                            <button type="submit" name="agregarCantidadEntrada" id="agregarCantidadEntrada" class="btn btn-success"><i class="fas fa-plus"></i></button>
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
                    <br>
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
    $("#generarEntrada").click(function(){
        var contador = $("input[type='text']").length;

        
        $(this).before('<div class="input-group"><div class="input-group-prepend"><span class="input-group-text" id="">Entrada</span></div><input type="text" name="color[]" class="form-control" placeholder="Color"><input type="text" name="talla[]" class="form-control" placeholder="Talla"><input type="text" name="cantidad[]" class="form-control" placeholder="Cantidad"><button type="button" class="btn btn-danger eliminarEntrada">Eliminar</button></div>');
        

    });

    $(document).on('click', '.eliminarEntrada', function(){
        $(this).parent().remove();
    });
});
    </script>

<script>
    $(document).ready(function() {
    $('#tablaEntradaProductos').DataTable();
    } );

    let table = $('#tablaEntradaProductos').DataTable({
    language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 a 0 de 0 Entradas",
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
        function mostrarBoton(){
            let boton = document.getElementById('guardarEntrada');
            boton.style.display='inline';
        }
    </script>
</html>
