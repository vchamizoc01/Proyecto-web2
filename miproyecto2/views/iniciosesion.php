
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            color: #000000;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #000000;
            border-radius: 5px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .container h2 {
            text-align: center;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #cccccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #000000;
            color: #ffffff;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #333333;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Iniciar Sesión</h2>
    <form action="index.php?controller=ControllerUsu&action=validacioniniciosesion" method="POST">
        <div class="form-group">
            <label for="username">Nombre de Usuario:</label>
            <input type="text" id="nombre" name="nombre">
            <?php

          if(isset($data) && isset($data['nombre'])){
            echo "<div class='alert alert-danger'>".$data['nombre']."</div>";
          }

        ?>
        </div>
        <div class="form-group">
            <label for="password">Contraseña:</label>
            <input type="password" id="contrasena" name="contrasena">
            <?php

          if(isset($data) && isset($data['contrasena'])){
            echo "<div class='alert alert-danger'>".$data['contrasena']."</div>";
          }

        ?>
        </div>
        <div class="form-group">
            <input type="submit" value="iniciarsesion" name="iniciarsesion"">
        </div>
    </form>
</div>

</body>
</html>
