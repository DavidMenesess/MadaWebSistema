<?php
include "../../Controller/ProduccionControlador/controladorProductos.php";
$listaProductos = $controladorProductos->listarProductos();

session_start();
if (!isset($_SESSION['correoUsuario'])) { //Si no existe la varible de sesión lo redirecciona al login
    header("Location: ../../View/AccesoVista/login.php");
}

header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=reporteProductos.xls");



?>

<table border="1">
    <caption>PRODUCTOS MADA</caption>

    <thead>
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th><?php echo utf8_decode("Categoría") ?></th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($listaProductos as $producto) {
        ?>
            <tr>
                <td><?php echo utf8_decode($producto['NombreProducto']); ?></td>
                <td><?php echo $producto['Precio']; ?></td>
                <td><?php echo utf8_decode($producto['NombreCategoria']); ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>