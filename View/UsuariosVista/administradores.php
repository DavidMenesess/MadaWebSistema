<?php
include "../../Controller/UsuariosControlador/ControladorAdministrador.php";
$listarAdministrador = $ControladorAdministrador ->listarAdministrador();

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
        <title>Administradores || Mada</title>
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
                    <a class="dropdown-item" href="#">Mi perfíl</a>
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
                        <h1 class="mt-4" style="text-align:center;">Gestión de administradores</h1>
                        <br>
                        <br>
                        <?php
                        if($_SESSION['Rol']==1){
                        ?>
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
							  Nuevo Administrador
						</button>
                        <?php
                        }
                        ?>
                        </div>
                        <div>
                        	
                        </div>
                        <div class="card-body">

                   
                   <!-- Button trigger modal -->
				

				<!-- Modal -->
				<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Registrar Administrador</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">

				      	<form class="form" action="../../Controller/UsuariosControlador/ControladorAdministrador.php" method="POST" accept-charset="utf-8" autocomplete="off">
				      		<div class="form-row">
				      			<div class="form-group col-md-6">
				      				<label for="Nombre">Nombre: </label>
									<input type="text" class="form-control" name="Nombre" id="Nombre" required>
					      		</div>
					      		<div class="form-group col-md-6">
					      			<label for="Apellido">Apellido: </label>
									<input type="text" class="form-control" name="Apellido" id="Apellido" required>
					      		</div>
					      		<div class="form-group col-md-6">
					      			<label for="Correo">Correo: </label>
									<input type="email" class="form-control" name="Correo" id="Correo" required>
					      		</div>
					      		<div class="form-group col-md-6">
					      			<label for="Contrasena">Contraseña: </label>
									<input type="password" class="form-control" name="Contrasena" id="Contrasena" required>
					      		</div>	
				      		</div>

                            <div class="modal-footer">
				      	        <button type="submit"  class="btn btn-primary btn-lg active" id="registrarUsuario" name="registrarAdministrador">Registrar</button>
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
                        Supervisores 👮‍♀️👮‍♂️❤
                     </div>
                      <div class="card-body">
                         <div class="table-responsive">
                          <table class="table table-hover table-bordered" id="tablaClientes">      
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Correo</th>
                                        <th>Rol</th>
                                        <th>Estado</th>
                                        <?php
                                         if($_SESSION['Rol']==1){
                                        ?>
                                        <th>Accioneㅤㅤㅤ</th>
                                        <?php
                                         }
                                        ?>
                                    </tr>
                                </thead>
                                  <tbody>
                                     <?php
                                      foreach ($listarAdministrador as $administrador) {
                                        ?>
                                          <tr>
                                          <td><?php echo $administrador['IdUsuario'];?></td>
                                          <td><?php echo $administrador['Nombre'];?></td>
                                          <td><?php echo $administrador['Apellido'];?></td>
                                          <td><?php echo $administrador['Correo'];?></td>
                                          <td><?php echo $administrador['IdRol'];?></td>
                                          <td>
                                             <?php if($administrador['Estado']!=1){
                                                echo '<span class="badge bg-danger">Inactivo</span>';
                                                   }else{
                                                   echo '<span class="badge bg-success">Activo</span>';
                                                        }
                                                ?>    
                                            </td>
                                                
                                                <td>
                                                    <form action="../../Controller/UsuariosControlador/ControladorAdministrador.php" method="POST" accept-charset="utf-8">
                                                        <input type="hidden" name="IdUsuario" value="<?php echo $administrador['IdUsuario'];?>">
                                                        <input type="hidden" name="Estado" value="<?php echo $administrador['Estado'];?>">
                                                        <?php
                                                        if($_SESSION['Rol'] == 1 && $administrador['IdUsuario'] != 1)
                                                        {
                                                        ?>
                                                        <button type="" id="actualizarUsuario" name="actualizarEstadoAdministrador" class="btn btn-primary"><i class="fas fa-exchange-alt"></i></button>
                                                        <?php
                                                        }
                                                        ?>
                                                        <?php
                                                        if($_SESSION['Rol'] == 1  && $administrador['IdUsuario'] != 1)
                                                        {
                                                        ?>
                                                        <button type="submit" name="editarAdministrador" id="editarAdministrador" class="btn btn-info"><i class="fas fa-edit"></i></button>
                                                        <?php
                                                        }
                                                        ?>
                                                        <?php
                                                        if($_SESSION['Rol'] == 1 && $administrador['IdUsuario'] != 1)
                                                        {
                                                        ?>
                                                        <button type="submit" name="eliminarAdministrador" id="eliminarAdministrador" class="btn btn-danger" onclick="return confirm('¿Está seguro de eliminar el registro?');"><i class="fas fa-trash-alt"></i></button>
                                                        <?php
                                                        }
                                                        ?>
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
                <button type="button" class="btn btn-danger">Descargar <i class="fas fa-file-pdf"></i> pdf</button>
                <button type="button" class="btn btn-success">Descargar <i class="fas fa-file-excel"></i> excel</button>
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
        <script src="../../libraries/sweetalert2@11.js"></script>
    </body>
    <script>
    $(document).ready(function() {
    $('#tablaClientes').DataTable();
    } );

    let table = $('#tablaClientes').DataTable({
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