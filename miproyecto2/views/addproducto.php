<?php include_once("header.php")?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            color: #000000;
            margin: 0;
            padding: 0;
        }
        
        h2 {
            color: #000000;
            text-align: center;
        }
        
        form {
            background-color: #000000;
            padding: 20px;
            border-radius: 10px;
            max-width: 400px;
            margin: 0 auto;
            color: #ffffff;
        }
        
        label {
            font-weight: bold;
        }
        
        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: none;
            border-radius: 5px;
            box-sizing: border-box;
        }
        
        textarea {
            height: 100px;
            resize: none;
        }
        
        input[type="submit"] {
            background-color: #ffffff;
            color: #000000;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        
        input[type="submit"]:hover {
            background-color: #cccccc;
        }
    </style>
</head>
<body>
    <h2>Formulario para ingresar un producto</h2>
    <form action="http://localhost/miproyecto2/index.php?controller=productoscontroller&action=insertProduct" method="post">
    <label for="Nombre_Producto">Nombre del Producto:</label><br>
    <input type="text" id="Nombre_Producto" name="Nombre_Producto" required><br><br>

    <label for="Precio">Precio:</label><br>
    <input type="number" id="Precio" name="Precio" step="0.01" min="0" required><br><br>

    <label for="Descripcion">Descripción:</label><br>
    <textarea id="Descripcion" name="Descripcion" rows="4" cols="50" required></textarea><br><br>

    <!-- Nuevo campo para la foto -->
    <label for="Foto">Foto:</label><br>
    <input type="text" id="Foto" name="Foto" required><br><br>

    <input class="boton" type="submit" value="enviar" name="registrarpro">
</form>
</body>
</html>
<?php include_once("footer.php")?>
