<?php
include "../../Controller/UsuariosControlador/ControladorClientes.php";
$listarCliente = $ControladorCliente -> listarCliente();
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=reporteClientes.xls");



?>

<table border="1">  
    <caption>CLIENTES MADA</caption>    
        <thead>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Apellido</th>
              <th>Correo</th>
              </tr>
        </thead>
            <tbody>
                <?php
                  foreach ($listarCliente as $cliente) {
                ?>
                   <tr>
                    <td><?php echo $cliente['IdUsuario'];?></td>
                    <td><?php echo $cliente['Nombre'];?></td>
                    <td><?php echo $cliente['Apellido'];?></td>
                    <td><?php echo $cliente['Correo'];?></td>
                   </tr>
                <?php   
                }
                ?>
            </tbody>
</table>