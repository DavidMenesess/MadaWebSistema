<?php
include "../../Controller/UsuariosControlador/ControladorAdministrador.php";
$listarAdministrador = $ControladorAdministrador->listarAdministrador();

header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=reporteAdministradores.xls");



?>

<table border="1">
    <caption>ADMINISTRADORES MADA</caption>

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
        foreach ($listarAdministrador as $administrador) {
        ?>
            <tr>
                <td><?php echo $administrador['IdUsuario']; ?></td>
                <td><?php echo $administrador['Nombre']; ?></td>
                <td><?php echo $administrador['Apellido']; ?></td>
                <td><?php echo $administrador['Correo']; ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>