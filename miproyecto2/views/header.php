<?php
// Comprobar si la variable de sesión 'cart' está inicializada
if (!isset($_SESSION['cart'])) {
    // Si no está inicializada, la inicializamos como un array vacío
    $_SESSION['cart'] = array();
}

// Comprobar si la variable de sesión 'nombre' está inicializada
if (!isset($_SESSION['nombre'])) {
    // Si no está inicializada, la inicializamos como un array vacío
    $_SESSION['nombre'] = array();
}

// Comprobar si la variable de sesión 'rol' está inicializada
if (!isset($_SESSION['rol'])) {
    // Si no está inicializada, la inicializamos como un array vacío
    $_SESSION['rol'] = array();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Title</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Mi Tienda Online</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="nav nav-pills">
            <?php
            if (!empty($_SESSION['nombre']) && $_SESSION['rol'] == 2) {
                echo '<li class="nav-item"><a href="index.php?controller=Productoscontroller&action=getAllProductos" class="nav-link" style="color: orange">Listar Productos</a></li>
                      <li class="nav-item"><a href="index.php?controller=ppController&action=getallpp" class="nav-link" style="color: orange">Listar Pedidos</a></li>
                      <li class="nav-item"><a href="index.php?controller=Productoscontroller&action=showaddproducto" class="nav-link" style="color: orange;">Añadir Producto</a></li>
                      <li class="nav-item"><a href="index.php?controller=ControllerUsu&action=cerrarsesion" class="nav-link active" aria-current="page" style="background-color: orange;">Cerrar Sesion</a></li>';
            } elseif (!empty($_SESSION['nombre']) && $_SESSION['rol'] == 1) {
                echo '<li class="nav-item"><a href="index.php?controller=Productoscontroller&action=getAllProductos" class="nav-link" style="color: orange">Listar Productos</a></li>
                      <li class="nav-item"><a href="index.php?action=verCarrito&controller=productoscontroller" class="nav-link" style="color: orange;">Carrito</a></li>
                      <li class="nav-item"><a href="index.php?controller=ControllerUsu&action=cerrarsesion" class="nav-link active" aria-current="page" style="background-color: orange;">Cerrar Sesion</a></li>';
            } else {
                echo '<div class="collapse navbar-collapse justify-content-between" id="navbarNavDarkDropdown"><div>
                          <a href="index.php?controller=ControllerUsu&action=showiniciosesion" style="margin-left: 10px;">Inicio Sesion</a>
                          <a href="http://localhost/miproyecto2/index.php?controller=productoscontroller&action=getAllProductos" style="margin-left: 10px;">Listado Productos</a>
                      </div>
                      <div>
                          <a href="index.php?action=verCarrito&controller=productoscontroller" style="margin-left: 10px;">Carrito</a>
                      </div>
                  </div>';
            }
            ?>
        </ul>
    </div>
</nav>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>
</html>
