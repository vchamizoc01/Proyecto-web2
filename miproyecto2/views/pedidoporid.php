<div class="container">
    <h1>Información detallada del Pedido</h1>

    <?php
            foreach ($data as $pedido) {
                echo '<div class="card">
                        <div class="card-body">
                            <p class="card-title">Cantidad: ' . $pedido['cantidad'] . '</p>
                            <p class="card-price">ID Producto: ' . $pedido['ID_Producto'] . '</p>
                            <p>ID Pedido: ' . $pedido['ID_Pedidos'] . '</p>
                        </div>
                    </div>';
            }
        ?>
</div>

