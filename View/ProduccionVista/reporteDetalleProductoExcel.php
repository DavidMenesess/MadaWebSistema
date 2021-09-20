<?php
include "../../Controller/ProduccionControlador/controladorProductos.php";

$listaDetalle = $controladorProductos->listarEntradasProducto($_GET['idProducto']);
$nombre = $controladorProductos->buscarProducto($_GET['idProducto']);

session_start();
if (!isset($_SESSION['correoUsuario'])) { //Si no existe la varible de sesión lo redirecciona al login
    header("Location: ../../View/AccesoVista/login.php");
}

header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=reporteDetalleProducto$nombre[1].xls");



?>

<table border="1">
    <caption>REPORTE DETALLE DEL PRODUCTO <?php echo strtoupper(utf8_decode($nombre[1])); ?></caption>

    <thead>
        <tr>
            <th>Color</th>
            <th>Talla</th>
            <th>Cantidad</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($listaDetalle as $detalle) {
        ?>
            <tr>
                <td><?php echo utf8_decode($detalle['Color']); ?></td>
                <td><?php echo $detalle['Talla']; ?></td>
                <td><?php echo utf8_decode($detalle['Stock']); ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>