<?php
class ControllerUsu{
   
public function showiniciosesion(){
    View::show("iniciosesion");
}

public function validacioniniciosesion() {
    $errores = array();
    if (isset($_POST['iniciarsesion'])) {
        if (!isset($_POST['nombre']) || strlen($_POST['nombre']) == 0) {
            $errores['nombre'] = "El nombre debe estar relleno";
        }
        if (!isset($_POST['contrasena']) || strlen($_POST['contrasena']) == 0) {
            $errores['contrasena'] = "La contrasena no puede estar vacia";
        }
        if (empty($errores)) {
            include_once('models/UsuariosDAO.php');
            include_once('models/productosDAO.php');
            $uDAO = new UsuarioDAO();
            $user = $uDAO->getAllUsers($_POST['nombre'], $_POST['contrasena']);
            if (empty($user)) {
                $errores['general'] = "El usuario no está registrado.";
                View::show("iniciosesion", $errores);
            } else {
                $pDAO = new ProductosDAO();
                $products = $pDAO->getAllProductos();
                $pDAO = null;
                $_SESSION['nombre'] = $_POST['nombre'];
                $_SESSION['rol'] = $user['Rol'];
                $_SESSION['id'] = $user['ID_Usuario']; // Guardar el rol del usuario en la sesión
                View::show("listar", $products);
            }
        }else{
            View::show("iniciosesion",$errores);
        }
    }
}
public function cerrarsesion(){
    session_destroy();
    View::show("iniciosesion");
}
}




?>