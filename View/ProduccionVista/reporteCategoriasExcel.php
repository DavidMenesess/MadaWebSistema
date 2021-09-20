<?php
include "../../Controller/ProduccionControlador/controladorCategoria.php";
$listaCategorias = $controladorCategoria->listarCategorias();

session_start();
if (!isset($_SESSION['correoUsuario'])) { //Si no existe la varible de sesión lo redirecciona al login
    header("Location: ../../View/AccesoVista/login.php");
}

header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=reporteCategorias.xls");



?>

<table border="1">
    <caption><?php echo utf8_decode("CATEGORÍAS") ?> MADA</caption>

    <thead>
        <tr>
            <th>Nombre</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($listaCategorias as $categoria) {
        ?>
            <tr>
                <td><?php echo $categoria['NombreCategoria']; ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>