<?php
require("../../Controller/VentasControlador/ControladorVentas.php");


$listarPedidos = $ControladorVentas->listarVentas();

session_start();
if (!isset($_SESSION['correoUsuario'])) { //Si no existe la varible de sesión lo redirecciona al login
    header("Location: ../../View/AccesoVista/login.php");
}

header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=reportePedidos.xls");



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
        foreach ($listarPedidos as $pedido) {
        ?>
            <tr>
                <td><?php echo $pedido['FechaPedido']; ?></td>
                <td><?php echo $pedido['Subtotal']; ?></td>
                <td><?php echo $pedido['Total']; ?></td>
                <td><?php echo $pedido['Nombre']; ?></td>
                <td>
                    <?php if ($pedido['IdEstadoPedido'] == 1) {
                        echo "Pendiente";
                        } else if ($pedido['IdEstadoPedido'] == 2) {
                            echo "En proceso";
                        } else if ($pedido['IdEstadoPedido'] == 3) {
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