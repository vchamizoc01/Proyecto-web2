<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Productos Pedidos</title>
    <link rel="stylesheet" href="path/to/your/styles.css">
    <style>
        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
        }
        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .card {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 16px;
            width: 200px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .card-image img {
            width: 100%;
            height: auto;
        }
        .card-body {
            padding: 10px 0;
        }
        .card-title {
            font-size: 18px;
            margin: 10px 0;
        }
        .card-price {
            font-size: 16px;
            color: green;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Listado de Pedidos</h1>

        <div class="card-container">
        <?php
            foreach ($data as $productopedido) {
                echo '<div class="card">
                        <div class="card-body">
                            <h2 class="card-title">ID Usuario: ' . $productopedido['ID_Usuario'] . '</h2>
                            <p class="card-price">Fecha Pedido: ' . $productopedido['fecha'] . '</p>
                            <p>ID Pedido: ' . $productopedido['ID_Pedidos'] . '</p>
                        </div>
                        <a href="index.php?controller=ppcontroller&action=getPedidoById&ID_Pedidos=' . $productopedido['ID_Pedidos'] . '" style="color: black;">Ver detalles del pedido </a>
                    </div>';
            }
        ?>
        </div>
    </div>
</body>
</html>
