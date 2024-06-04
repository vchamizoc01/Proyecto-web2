<div class="container">
    <h1>Información detallada del producto</h1>

    <div class="product-card">
        <div class="product-image">
            <img src="<?php echo $data['Foto']; ?>" alt="<?php echo $data['Nombre_Producto']; ?>">
        </div>
        <div class="product-details">
            <h2><?php echo $data['Nombre_Producto']; ?></h2>
            <p><strong>Precio:</strong> <?php echo $data['Precio']; ?> €</p>
            <p><strong>Descripción:</strong><br> <?php echo $data['Descripcion']; ?></p>
            <a href="index.php?controller=productoscontroller&action=addToCart&ID_Producto=<?php echo $data['ID_Producto']; ?>" style="color: orange;">Añadir al carrito </a>
        </div>
    </div>
</div>

<style>
    .container {
        margin: 20px auto;
        max-width: 600px;
    }

    .product-card {
        display: flex;
        border: 1px solid #ccc;
        border-radius: 5px;
        overflow: hidden;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .product-image {
        flex: 1;
        overflow: hidden;
    }

    .product-image img {
        width: 100%;
        height: auto;
    }

    .product-details {
        flex: 2;
        padding: 20px;
    }

    .product-details h2 {
        font-size: 24px;
        margin-bottom: 10px;
    }

    .product-details p {
        font-size: 16px;
        margin-bottom: 8px;
    }

    .product-details strong {
        font-weight: bold;
    }

</style>
