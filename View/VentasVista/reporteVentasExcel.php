<?php
require("../../Controller/VentasControlador/ControladorVentas.php");

$listarVentasEnvi = $ControladorVentas->listarVentasEnviadas();

session_start();
if (!isset($_SESSION['correoUsuario'])) { //Si no existe la varible de sesión lo redirecciona al login
    header("Location: ../../View/AccesoVista/login.php");
}

header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=reporteVentas.xls");



?>

<table border="1">
    <caption>PEDIDOS MADA</caption>

    <thead>
        <tr>
            <th>Fecha</th>
            <th>Subtotal</th>
            <th>Total</th>
            <th>Cliente</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($listarVentasEnvi as $venta) {
        ?>
            <tr>
                <td><?php echo $venta['FechaPedido']; ?></td>
                <td><?php echo $venta['Subtotal']; ?></td>
                <td><?php echo $venta['Total']; ?></td>
                <td><?php echo $venta['Nombre']; ?></td>
                <td>
                    <?php if ($venta['IdEstadoPedido'] == 1) {
                        echo "Pendiente";
                        } else if ($venta['IdEstadoPedido'] == 2) {
                            echo "En proceso";
                        } else if ($venta['IdEstadoPedido'] == 3) {
                            echo "Cancelado";
                         } else {
                            echo "Enviado";
                        }
                    ?>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>