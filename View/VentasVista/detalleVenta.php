<?php
    include "../../Controller/VentasControlador/ControladorVentas.php";
    $detalle = $ControladorVentas->listarDetalleVenta($_GET['IdPedido']);
    $detalleV = $ControladorVentas->listarProductosVendidos($_GET['IdPedido']);
    $anulados = $ControladorVentas->listarProductosAnulados($_GET['IdPedido']);

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
        <title>MADA || Administrador</title>
        <link href="../../css/styles.css" rel="stylesheet" />
        <link href="../../libraries/dataTables.bootstrap4.min.css" rel="stylesheet"/>
        <script src="../../libraries/fontawesome.js"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">Mada</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            
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
                                    <a class="nav-link" href="../ProduccionVista/entradasProducto.php">Entradas</a>
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
                        <h1 class="mt-4">Administrador MADA</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Detalle Venta</li>
                        </ol>
                    
                        <h3 align="center">Detalle de la venta</h3>
                        <br>

                        <div class="row">
                                <div class="form-group col-md-12">
                                    <h3>Cliente asociado a la venta</h3>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="Nombre">Nombre: </label>
                                    <input type="text" class="form-control" name="Nombre" id="Nombre" readonly value="<?php echo $detalle['Nombre'];?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="Apellido">Apellido: </label>
                                    <input type="text" class="form-control" name="Apellido" id="Apellido" readonly value="<?php echo $detalle['Apellido'];?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="Documento">Documento: </label>
                                    <input type="text" class="form-control" name="Documento" id="Documento" readonly value="<>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="Direccion">Dirección: </label>
                                    <input type="text" class="form-control" name="Direccion" id="Direccion" readonly value="">
                                </div>
                                <!-- <div class="form-group col-md-4">
                                    <label for="Telefono">Telefono: </label>
                                    <input type="number" class="form-control" name="Telefono" id="Telefono" readonly value="<?php echo $detalle['Telefono'];?>">
                                </div> -->
                                <div class="form-group col-md-4">
                                    <label for="Correo">Correo: </label>
                                    <input type="email" class="form-control" name="Correo" id="Correo" readonly value="<?php echo $detalle['Correo'];?>">
                                </div>

                                <br>
                                <br>


                                <div class="form-group col-md-12">
                                    <h3 align="center">Productos</h3>
                                </div>
                                
                                <table class="table table-striped table-hover" id="tabla">
                                  <thead>
                                    <tr>
                                      <th scope="col">Producto</th>
                                      <th scope="col">Color</th>
                                      <th scope="col">Talla</th>
                                      <th scope="col">Valor Unitario</th>
                                      <th scope="col">Cantidad</th>
                                      <th scope="col">Iva</th>
                                      <th scope="col">Acciones</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                    $TotalIva = 0;
                                        foreach ($detalleV as $deta) {
                                    ?>
                                    <tr>
                                      <td><?php echo $deta['NombreProducto'];?></td>
                                      <td><?php echo $deta['Color'];?></td>
                                      <td><?php echo $deta['Talla'];?></td>
                                      <td>$<?php echo $deta['ValorUnitario'];
                                      $valor = $deta['ValorUnitario'];
                                      $iva = ($valor*19)/100;
                                      ?></td>

                                      <td><?php echo $deta['Cantidad'];
                                      $TotalIvaIndi = $iva*$deta['Cantidad']; 
                                      ?></td>

                                      <td><?php echo $TotalIvaIndi;
                                      $TotalIva+= $TotalIvaIndi;?></td>

                                      <td>
                                            <?php
                                            if ($deta['IdEstadoPedido']<3) {
                                            ?>
                                                <button type="button" id="anularProductoVenta" onclick="anularProductoVenta(<?php echo $deta['IdDetallePedido'];?>,<?php echo $deta['ValorUnitario'];?>,<?php echo $detalle['Total'];?>,<?php echo $detalle['Subtotal'];?>,<?php echo $deta['IdPedido'];?>,<?php echo $deta['Cantidad'];?>,<?php echo $deta['IdDetalleProducto'];?>,<?php echo $deta['Stock'];?>,<?php echo $TotalIvaIndi;?>);" name="anularProductoVenta" class="btn btn-primary">Anular</button> 
                                            <?php    
                                            } else if($deta['IdEstadoPedido']==3) {
                                                echo '<span class="badge bg-danger">Cancelado</span>';
                                            }else if($deta['IdEstadoPedido']==4){
                                                echo '<span class="badge bg-primary">Enviado</span>';
                                            }
                                            ?>
                                          
                                      </td>
                                    </tr>
                                    <?php   
                                        }
                                    ?>
                                  </tbody>
                                </table>
                                <div class="form-group col-md-3">
                                    <label for="Subtotal">SubTotal: </label>
                                    <input type="number" class="form-control" name="Subtotal" id="Correo" readonly value="<?php echo $detalle['Subtotal'];?>">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="ToatalIva">Total Iva: </label>
                                    <input type="number" class="form-control" name="TotalIva" id="TotalIva" readonly value="<?php echo $TotalIva ?>">
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="Total">Total: </label>
                                    <input type="text" class="form-control" name="Total" id="Correo" readonly value="<?php echo $detalle['Total'];?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="Fecha">Fecha de la venta: </label>
                                    <input type="text" class="form-control" name="Fecha" id="Correo" readonly value="<?php echo $detalle['FechaPedido'];?>">
                                </div>


                                <!-- Factuta -->
                                <div class="form-group col-md-3">

                                	<form action="../../Controller/VentasControlador/ControladorVentas.php" method="POST" accept-charset="utf-8">
                                    <input type="hidden" name="IdPedido" value="<?php echo $detalle['IdPedido'];?>">

                                    <button type="submit" id="factura" name="factura" class="btn btn-success">Generar recibo de venta</button>
 
                                </form>
                                     
                                </div>
                                <!-- Factura -->


                                <!-- Estado -->
                                <div class="form-group col-md-2">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                      Cambiar Estado
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Cambiar Estado Pedido</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            <div class="form-row">
                                                <form action="detalleVenta_submit" method="get" accept-charset="utf-8">
                                               
                                                <div class="form-group col-md-10">
                                                    <?php
                                                    if ($deta['IdEstadoPedido']<3) {
                                                    ?>
                                                        <label for="Estado">Cambiar Estado: </label>
                                                        <select class="form-control" name="idEstadoPedido" id="idEstadoPedido" class="camposInputs">
                                                            <option value="">Seleccione</option>
                                                            <option value="1">Pendiente</option>
                                                            <option value="2">En proceso</option>
                                                            <option value="3">Cancelado</option>
                                                            <option value="4">Enviado</option>
                                                        </select>
                                                        <input type="hidden" name="idPedido" id="idPedido" value="<?php echo $detalle['IdPedido'];?>">

                                                    <?php           
                                                    } else {
                                                        echo'<div class="alert alert-danger" role="alert">
                                                              ¡El estado no se puede cambiar!
                                                            </div>';
                                                        
                                                    }
                                                    ?>

                                                
                                            </div>
                                            <div class="form-group col-md-10">
                                                <label for="Estado">Estado Actual: </label>
                                                <?php if($deta['IdEstadoPedido']==1){
                                                    echo '<span class="badge bg-warning">Pendiente</span>';
                                                }else if($deta['IdEstadoPedido']==2){
                                                    echo '<span class="badge bg-success">En proceso</span>';
                                                }else if($deta['IdEstadoPedido']==3){
                                                    echo '<span class="badge bg-danger">Cancelado</span>';

                                                }else if($deta['IdEstadoPedido']==4){
                                                    echo '<span class="badge bg-primary">Enviado</span>';
                                                }
                                                ?>
                                                
                                                
                                            </div>

                                                
                                            </div>
                                            
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerar</button>
                                            <button onclick="cambiarEstado();" type="button" class="btn btn-primary">Guardar</button>
                                          </div>
                                        </form>
                                        </div>
                                      </div>
                                    </div>
                                    <!-- Modal -->

                                </div>
                                <!-- Estado      -->


                                <!-- Mostar Productos Anulados -->
                                <div class="form-group col-md-3">
                                    <!-- Large modal -->
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target=".bd-example-modal-lg">Productos anulados</button>

                                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Productos Anulados</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <table class="table table-striped table-hover" id="tabla">
                                              <thead>
                                                <tr>
                                                  <th scope="col">Producto</th>
                                                  <th scope="col">Color</th>
                                                  <th scope="col">Talla</th>
                                                  <th scope="col">Cantidad</th>
                                                  <th scope="col">Valor Unitario</th>
                                                  <th scope="col">Observación</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <?php
                                                    foreach ($anulados as $anu) {
                                                ?>
                                                <tr>
                                                  <td><?php echo $anu['NombreProducto'];?></td>
                                                  <td><?php echo $anu['Color'];?></td>
                                                  <td><?php echo $anu['Talla'];?></td>
                                                  <td><?php echo $anu['Cantidad'];?></td>
                                                  <td>$<?php echo $anu['ValorUnitario'];?></td>
                                                  <td><?php echo $anu['Observacion'];?></td>
                                                </tr>
                                                <?php   
                                                    }
                                                ?>
                                              </tbody>
                                            </table>

                                           <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerar</button>
                                            </div>
                                        </div>
                                      </div>
                                    </div>
 
                                </div>
                                <!-- ostar Productos Anulados -->


                                <!-- Anular producto venta -->
                                <div class="modal fade" id="AnularModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Anular Producto de la Venta</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                        <div class="form-group">
                                            <label for="Observacion" class="col-form-label">Escribe a continuación el por qué de la anulación de este producto:</label>
                                            <input style="height: 98px" type="text" class="form-control" placeholder="Escribe aquí la observación" id="Observacion" name="Observacion" required></input>
                                            <br>
                                            <div id="containerAlerta">
                                              
                                            </div>
                                        </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <button type="button" id="botonConformacion" class="btn btn-primary">Enviar observación</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <!-- Anular producto venta -->
                        </div>


                    </div>

                
                </main>
            </div>
           





        <script src="../../libraries/jquery-3.5.1.slim.min.js"></script>
        <script src="../../js/jquery-3.6.0.min.js"></script>
        <script src="../../libraries/bootstrap.bundle.min.js"></script>
        <script src="../../js/scripts.js"></script>
        <script src="../../libraries/jquery.dataTables.min.js"></script>
        <script src="../../libraries/dataTables.bootstrap4.min.js"></script>
        <script src="../../js/validaciones/validacionesUsuarios.js"></script>
        <script src="../../libraries/sweetalert2@11.js"></script>
        



        <script>

            function mostrarCantidad(){
                var IdDetalleProducto = document.getElementById("IdDetalleProducto").value;
                var Stock = document.getElementById("Stock").value;

                alert(Stock);
                alert(IdDetalleProducto);

            }
            function cambiarEstado(){

                var IdEstadoPedido = document.getElementById("idEstadoPedido").value;
                var IdPedido = document.getElementById("idPedido").value;

                var formData = new FormData();
                formData.append('cambiarEstado','');
                formData.append('IdEstadoPedido',IdEstadoPedido);
                formData.append('IdPedido',IdPedido);
                
                $.ajax({
                        url: '../../Controller/VentasControlador/ControladorVentas.php',
                        type: 'post',
                        data:formData,
                        contentType:false,
                        processData:false,
                        success: function(response){
                            // alert(response);
                            $('#exampleModal').modal('hide');

                             Swal.fire({
                              title: 'El estado fue cambiado.',
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
            }




            function anularProductoVenta(IdDetallePedido,ValorUnitario,Total,SubTotal,IdPedido,Cantidad,IdDetalleProducto,Stock,TotalIvaIndi){
                
                // alert("total iva indi: "+ TotalIvaIndi);

                var TotalIva = document.getElementById("TotalIva").value;
                // alert("total Iva: "+ TotalIva);


                Swal.fire({
                title: 'Anular Producto',
                text: "Se va a naular el producto ¿Seguro?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, anular!',
                cancelButtonText: 'Cancelar'
                }).then((result) => {
                if (result.isConfirmed) {

                    $('#AnularModal').modal('show'); // Abrir
                    const boton = document.querySelector("#botonConformacion");

                    boton.addEventListener("click", function(evento){

                        const Observacion = document.getElementById("Observacion").value;

                        if (Observacion == "") {
                            var borde;
                            var texto;

                            borde = document.getElementById("Observacion");
                            texto = document.getElementById("containerAlerta");
                            texto.innerHTML = "<div class='alert alert-danger' role='alert'>Campo obligatorio!</div>";
                            borde.style.borderColor ="#dc3545";

                        }else{
                            $('#AnularModal').modal('hide'); // Cerrar

                            // var Observacion = document.getElementById("Observacion").value;
                            alert(Observacion);
                            var resIva = TotalIva-TotalIvaIndi;
                            TotalIva = resIva;
                            var resTotal = SubTotal - (ValorUnitario*Cantidad);
                            SubTotal = resTotal;

                            Total = TotalIva + SubTotal;

                            var TotalStock = Cantidad+Stock;

                            var formData = new FormData();
                            formData.append('anularProductoVenta','');
                            formData.append('IdDetallePedido',IdDetallePedido);
                            // formData.append('TotalIva',TotalIva);
                            formData.append('SubTotal',SubTotal);
                            formData.append('Total',Total);
                            formData.append('IdPedido', IdPedido);
                            formData.append('TotalStock', TotalStock);
                            formData.append('IdDetalleProducto', IdDetalleProducto);
                            formData.append('Observacion',Observacion);
                            $.ajax({
                                url: '../../Controller/VentasControlador/ControladorVentas.php',
                                type: 'post',
                                data:formData,
                                contentType:false,
                                processData:false,
                                success: function(response){
                                    // alert(response);

                                    Swal.fire({
                                      title: 'El producto ha sido Anulado.',
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
                            
                        }
                        
                    });
                    
                  }
                })
            }


            
            
        </script>
        


    </body>
</html>




