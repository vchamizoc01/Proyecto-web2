<?php
// Incluimos los archivos necesarios para acceder a la capa de datos (productosDAO) y a la vista (view)
include_once ('models/productosDAO.php');
include_once ('views/view.php');

// Definimos la clase controlador para gestionar las operaciones relacionadas con "Productos"
class Productoscontroller {

    // Método para obtener todos los productos
    public function getAllProductos(){
        // Creamos una instancia del DAO para acceder a los datos
        $productosDAO = new productosDAO();
        // Obtenemos todos los productos
        $arrayUsuarios = $productosDAO->getAllProductos();
        // Llamamos a la vista para mostrar los productos, pasando los datos obtenidos
        view::show('listar', $arrayUsuarios);
    }

    // Método para obtener un producto específico por su ID
    public function getProductById(){
        // Verificamos si el ID del producto está presente en la solicitud GET
        if (isset($_GET['ID_Producto'])){
            // Creamos una instancia del DAO para acceder a los datos
            $pDAO = new ProductosDAO();
            // Obtenemos el producto por su ID
            $producto = $pDAO->getProductById($_GET['ID_Producto']);
            // Llamamos a la vista para mostrar el producto específico, pasando los datos obtenidos
            View::show("productoporid", $producto);
        }
    }

    // Método para agregar un producto al carrito
    public function addToCart(){
        // Verificamos si la sesión del carrito no existe, entonces la creamos
        if (!isset($_SESSION['cart'])){
            $_SESSION['cart'] = array();
        }

        // Verificamos si el ID del producto está presente en la solicitud GET
        if (isset($_GET['ID_Producto'])){
            $producto_id = $_GET['ID_Producto'];
            // Si el producto no está en el carrito, lo agregamos
            if (!in_array($producto_id, $_SESSION['cart'])) {
                array_push($_SESSION['cart'], $producto_id);
            }
            // Creamos una instancia del DAO para acceder a los datos
            $productosDAO = new ProductosDAO();
            // Obtenemos todos los productos
            $productos = $productosDAO->getAllProductos();
            // Destruimos la instancia del DAO
            $productosDAO = null;
            // Llamamos a la vista para mostrar los productos, pasando los datos obtenidos
            View::show("listar", $productos);
        }
    }

    // Método para ver los productos en el carrito
    public function verCarrito() {
        // Creamos una instancia del DAO para acceder a los datos
        $productosDAO = new ProductosDAO();
        $arrayCarrito = array();

        // Recorremos el carrito para obtener los detalles de cada producto
        foreach ($_SESSION['cart'] as $posicion => $id) {
            $productos = $productosDAO->getProductById($id);
            array_push($arrayCarrito, $productos);
        }

        // Llamamos a la vista para mostrar el carrito, pasando los datos obtenidos
        View::show("carritocompra", $arrayCarrito);
    }

    // Método para eliminar un producto del carrito
    public function eliminarDelCarrito(){
        // Verificamos si el ID del producto está presente en la solicitud GET
        if (isset($_GET['ID_Producto'])) {
            $idComic = $_GET['ID_Producto'];
            // Buscamos la posición del producto en el carrito
            $posicion = array_search($idComic, $_SESSION['cart']);
            // Si el producto está en el carrito, lo eliminamos
            if ($posicion !== false) {
                unset($_SESSION['cart'][$posicion]);
                // Reindexamos el array del carrito
                $_SESSION['cart'] = array_values($_SESSION['cart']);
            }
        }
        // Llamamos al método para ver el carrito actualizado
        $this->verCarrito();
    }

    // Método para mostrar la vista de agregar producto
    public function showaddproducto(){
        View::show("addproducto");
    }

    // Método para insertar un nuevo producto
    public function insertProduct() {
        $datospro = array();
        $errors = array();

        // Verificar si se envió el formulario
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $errors = array();

            // Validar los campos del formulario
            if (empty($_POST['Nombre_Producto'])) {
                $errors[] = "El nombre del producto es requerido.";
            }
            if (empty($_POST['Precio'])) {
                $errors[] = "El precio es requerido.";
            }
            if (empty($_POST['Descripcion']) || strlen($_POST['Descripcion']) < 20) {
                $errors[] = "La descripción debe tener al menos 20 caracteres.";
            }
            if (empty($_POST['Foto'])) {
                $errors[] = "La foto es requerida.";
            }

            // Si hay errores, generar JavaScript para mostrar alerta emergente
            if (!empty($errors)) {
                echo '<script>';
                echo 'alert("Error:\n' . implode('\n', $errors) . '");';
                echo '</script>';
                View::show("addproducto", $datospro);
            }
        }

        // Si no hay errores, procesamos los datos del formulario
        if (empty($errors)) {
            $nombre = $_POST['Nombre_Producto'];
            $precio = $_POST['Precio'];
            $descripcion = $_POST['Descripcion'];
            $foto = $_POST['Foto'];

            // Creamos una instancia de la clase ProductosDAO
            $productosDAO = new ProductosDAO();
            
            // Insertamos los datos en la base de datos
            $productosDAO->insertProduct($nombre, $precio, $descripcion, $foto);
            
            // Redirigir a la página de todos los productos
            $this->getAllProductos();
            exit();
        }
    }

    // Método para borrar un producto
    public function borrarproducto(){
        // Incluimos el archivo del modelo de productosDAO
        include_once 'models/productosDAO.php';
        // Verificamos si el ID del producto está presente en la solicitud GET
        if (isset($_GET['ID_Producto'])){
            // Creamos una instancia del DAO para acceder a los datos
            $pDAO = new ProductosDAO();
            // Borramos el producto por su ID
            $products = $pDAO->borrarprod($_GET['ID_Producto']);
            // Obtenemos todos los productos restantes
            $products = $pDAO->getAllProductos();
            // Destruimos la instancia del DAO
            $pDAO = null;
            // Llamamos a la vista para mostrar los productos, pasando los datos obtenidos
            View::show("listar", $products);
        }
    }
}
?>
