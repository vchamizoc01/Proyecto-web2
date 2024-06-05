<?php
// Definimos la clase controlador para gestionar las operaciones relacionadas con los usuarios
class ControllerUsu {

    // Método para mostrar la vista de inicio de sesión
    public function showiniciosesion() {
        View::show("iniciosesion");
    }

    // Método para validar los datos de inicio de sesión
    public function validacioniniciosesion() {
        $errores = array();
        
        // Verificamos si se ha enviado el formulario de inicio de sesión
        if (isset($_POST['iniciarsesion'])) {
            
            // Validamos el campo nombre de usuario
            if (!isset($_POST['nombre']) || strlen($_POST['nombre']) == 0) {
                $errores['nombre'] = "El nombre debe estar relleno";
            }
            
            // Validamos el campo contraseña
            if (!isset($_POST['contrasena']) || strlen($_POST['contrasena']) == 0) {
                $errores['contrasena'] = "La contraseña no puede estar vacía";
            }
            
            // Si no hay errores de validación
            if (empty($errores)) {
                // Incluimos los modelos necesarios para la validación
                include_once('models/UsuariosDAO.php');
                include_once('models/productosDAO.php');
                
                // Creamos una instancia del DAO de usuarios
                $uDAO = new UsuarioDAO();
                
                // Obtenemos el usuario a partir del nombre y la contraseña
                $user = $uDAO->getAllUsers($_POST['nombre'], $_POST['contrasena']);
                
                // Si el usuario no está registrado
                if (empty($user)) {
                    $errores['general'] = "El usuario no está registrado.";
                    View::show("iniciosesion", $errores);
                } else {
                    // Si el usuario está registrado, obtenemos los productos
                    $pDAO = new ProductosDAO();
                    $products = $pDAO->getAllProductos();
                    $pDAO = null;
                    
                    // Iniciamos la sesión y almacenamos los datos del usuario
                    $_SESSION['nombre'] = $_POST['nombre'];
                    $_SESSION['rol'] = $user['Rol'];
                    $_SESSION['id'] = $user['ID_Usuario'];
                    
                    // Mostramos la vista con la lista de productos
                    View::show("listar", $products);
                }
            } else {
                // Si hay errores, mostramos la vista de inicio de sesión con los errores
                View::show("iniciosesion", $errores);
            }
        }
    }

    // Método para cerrar la sesión del usuario
    public function cerrarsesion() {
        session_destroy();
        View::show("iniciosesion");
    }
}
?>
