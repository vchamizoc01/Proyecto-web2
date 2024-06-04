<?php
include_once ('models/productosDAO.php');
include_once ('views/view.php');

class Productoscontroller {

    public function getAllProductos(){
            $productosDAO = new productosDAO();
            // Recupero los usuarios de la base de datos
            $arrayUsuarios = $productosDAO->getAllProductos();
            view::show('listar', $arrayUsuarios);
    }
    public function getProductById(){
        if (isset($_GET['ID_Producto'])){
            $pDAO=new ProductosDAO();
            $producto=$pDAO-> getProductById($_GET['ID_Producto']);
            View::show("productoporid",$producto);
        }
    }
    public function addToCart(){
        if(!isset($_SESSION['cart'])){
            $_SESSION['cart'] = array();
        }
        
        if (isset($_GET['ID_Producto'])){
            $producto_id = $_GET['ID_Producto'];
            if (!in_array($producto_id, $_SESSION['cart'])) {
                array_push($_SESSION['cart'], $producto_id);   
            }  
            $productosDAO = new ProductosDAO();
            $productos = $productosDAO->getAllProductos();
            $productosDAO = null;
            View::show("listar", $productos);
        }
    }

    public function verCarrito() {
        $productosDAO = new ProductosDAO(); 
        $arrayCarrito = array();
    
        foreach ($_SESSION['cart'] as $posicion => $id) {
            $productos = $productosDAO->getProductById($id); 
            array_push($arrayCarrito, $productos);
        }
    
        View::show("carritocompra",$arrayCarrito);

    }
    public function eliminarDelCarrito(){
        if (isset($_GET['ID_Producto'])) {
            $idComic = $_GET['ID_Producto'];
            $posicion = array_search($idComic, $_SESSION['cart']);
            if ($posicion !== false) {
                unset($_SESSION['cart'][$posicion]);
                $_SESSION['cart'] = array_values($_SESSION['cart']);
            }
        }
        $this->verCarrito();
        
    }
    public function showaddproducto(){
        View::show("addproducto");
    }
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
                $nombre = ($_POST['Nombre_Producto']);
                $precio = ($_POST['Precio']);
                $descripcion = ($_POST['Descripcion']);
                $foto = ($_POST['Foto']);
    
                // Creamos una instancia de la clase ProductosDAO
                $productosDAO = new ProductosDAO();
                
                // Insertamos los datos en la base de datos
                $productosDAO->insertProduct($nombre, $precio, $descripcion, $foto);
                
                // Redirigir a la página de todos los productos
                $this->getAllProductos();
                exit();
            
            }
        }
        public function borrarproducto(){
            include_once 'models/productosDAO.php';
            if (isset($_GET['ID_Producto'])){
                $pDAO=new ProductosDAO();
                $products=$pDAO->borrarprod($_GET['ID_Producto']);
                $products=$pDAO->getAllProductos();
                $pDAO=null;
                View::show("listar", $products);
            }
        }
    }
      


    

?>