<?php
include_once("views/header.php");
if (!isset($_SESSION['nombre'])) {
    $_SESSION['nombre'] = array();
}
if (!isset($_SESSION['rol'])) {
  $_SESSION['rol'] = array();
}
?>

<!-- Contenido principal de la vista -->
<div class="container mt-5">
<h2>Tu Cesta</h2>

<?php
if (!empty($_SESSION['nombre']) && $_SESSION['rol'] == 1) {
    if (empty($_SESSION['cart'])) {
        echo '<p>No hay productos en tu cesta.</p>';
    } else {
        echo '<table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Precio</th>
                        <th>cantidad</th>
                        <th>borrar</th>
                    </tr>
                </thead>
                <tbody>';
        foreach ($data as $productos) {
            echo '<tr>
        <td>' . $productos['ID_Producto'] . '</td>
        <td>' . $productos['Nombre_Producto'] . '</td>
        <td>' . $productos['Precio'] . ' €</td>
        <td>
            <input type="number" name="cantidad_' . $productos['ID_Producto'] . '" value="1" min="1">
        </td>
        <td>
            <a href="index.php?controller=productoscontroller&action=eliminarDelCarrito&ID_Producto=' . $productos['ID_Producto'] . '" class="btn btn-danger">Eliminar</a>
        </td>
    </tr>';

        }
        echo '</tbody>
            </table>
            <br>
            
            <a href="index.php?controller=Pedidoscontroller&action=realizarPedido" class="nav-link active" aria-current="page" style="background-color: blue; color: black;">Hacer Pedido</a>
    ';
    }
} else {
    foreach ($data as $productos) {
        if (empty($_SESSION['cart'])) {
            echo '<p>No hay productos en tu cesta.</p>';
        } else {
            echo '<table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Precio</th>
                            <th>cantidad</th>
                            <th>borrar</th>
                        </tr>
                    </thead>
                    <tbody>';
            foreach ($data as $productos) {
                echo '<tr>
                        <td>' . $productos['ID_Producto'] . '</td>
                        <td>' . $productos['Nombre_Producto'] . '</td>
                        <td>' . $productos['Precio'] . ' €</td>
                        <td>
                            <input type="number" name="cantidad_' . $productos['ID_Producto'] . '" value="1" min="1">
                        </td>
                        <td>
                            <a href="index.php?controller=productoscontroller&action=eliminarDelCarrito&ID_Producto=' . $productos['ID_Producto'] . '" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>';
            }
            echo '</tbody>
                </table>
                <br>';
        }
    }
}
?>

    <br>
    <br>
    <br>
</div>

<?php
require_once("views/footer.php");
?>
