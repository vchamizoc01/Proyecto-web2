<?php
if (!isset($_SESSION['nombre'])) {
    $_SESSION['nombre'] = array();
}
if (!isset($_SESSION['rol'])) {
  $_SESSION['rol'] = array();
}
?>
<div class="container">
    <h1>Listado de productos</h1>

    <div class="card-container">
    <?php
if (!empty($_SESSION['nombre']) && $_SESSION['rol'] == 2) {
    foreach ($data as $article) {
        echo '<div class="card">
                <div class="card-image">
                    <img src="' . $article['Foto'] . '" alt="' . $article['Nombre_Producto'] . '" style="max-width: 200px; max-height: 200px;">
                </div>
                <div class="card-body">
                    <h2 class="card-title">' . $article['Nombre_Producto'] . '</h2>
                    <p class="card-price">Precio: ' . $article['Precio'] . '€</p>
                    <a href="index.php?controller=productoscontroller&action=getProductById&ID_Producto=' . $article['ID_Producto'] . '" style="color: orange;">Ver más... </a>
                    <br>
                    <a href="index.php?controller=productoscontroller&action=borrarproducto&ID_Producto=' . $article['ID_Producto'] . '" style="color: orange; ">borrar producto </a>
                </div>
            </div>';
    }
} elseif (!empty($_SESSION['nombre']) && $_SESSION['rol'] == 1) {
    foreach ($data as $article) {
        echo '<div class="card">
                <div class="card-image">
                    <img src="' . $article['Foto'] . '" alt="' . $article['Nombre_Producto'] . '" style="max-width: 200px; max-height: 200px;">
                </div>
                <div class="card-body">
                    <h2 class="card-title">' . $article['Nombre_Producto'] . '</h2>
                    <p class="card-price">Precio: ' . $article['Precio'] . '€</p>
                    <a href="index.php?controller=productoscontroller&action=getProductById&ID_Producto=' . $article['ID_Producto'] . '" style="color: orange;">Ver más... </a>
                    <br>
                    <a href="index.php?controller=productoscontroller&action=addToCart&ID_Producto=' . $article['ID_Producto'] . '" style="color: orange;">Añadir al carrito </a>
                </div>
            </div>';
    }
} else {
    foreach ($data as $article) {
        echo '<div class="card">
                <div class="card-image">
                    <img src="' . $article['Foto'] . '" alt="' . $article['Nombre_Producto'] . '" style="max-width: 200px; max-height: 200px;">
                </div>
                <div class="card-body">
                    <h2 class="card-title">' . $article['Nombre_Producto'] . '</h2>
                    <p class="card-price">Precio: ' . $article['Precio'] . '€</p>
                    <a href="index.php?controller=productoscontroller&action=getProductById&ID_Producto=' . $article['ID_Producto'] . '" style="color: orange;">Ver más... </a>
                    <br>
                    <a href="index.php?controller=productoscontroller&action=addToCart&ID_Producto=' . $article['ID_Producto'] . '" style="color: orange;">Añadir al carrito </a>
                </div>
            </div>';
    }
}
?>

    </div>
</div>

<style>
    .card-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .card {
        width: 250px;
        border: 1px solid #ccc;
        border-radius: 5px;
        overflow: hidden;
    }

    .card-image {
        text-align: center;
        padding: 10px;
    }

    .card-image img {
        max-width: 100%;
        max-height: 100%;
    }

    .card-body {
        padding: 10px;
    }

    .card-title {
        margin: 0;
        font-size: 20px;
    }

    .card-price {
        font-weight: bold;
    }

    .card-description {
        color: #666;
    }
</style>