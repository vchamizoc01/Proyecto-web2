<?php

// Incluir el DAO de pedidos
require_once('models/pedidosDAO.php');
include_once('productoscontroller.php');

class PedidosController {
    public function verCarrito() {
        $productosDAO = new ProductosDAO(); 
        $arrayCarrito = array();
    
        foreach ($_SESSION['cart'] as $posicion => $id) {
            $productos = $productosDAO->getProductById($id); 
            array_push($arrayCarrito, $productos);
        }
    
        View::show("carritocompra",$arrayCarrito);

    }
    public function realizarPedido() {
            
        $id_usuario = $_SESSION['id'] ?? null;

        // Verificar si el usuario está autenticado y tiene el ID de usuario en la sesión
        if (!$id_usuario) {
            echo '<p>No has iniciado sesión o no tienes permiso para realizar esta acción.</p>';
            return;
        }
    
        // Verificar si hay productos en el carrito
        if (empty($_SESSION['cart'])) {
            echo '<p>No hay productos en tu cesta.</p>';
            return;
        }
    
        // Obtener los productos del carrito desde la sesión
    
        // Crear un nuevo pedido en la base de datos
        $pedidosDAO = new PedidosDAO();
        $id_pedido = $pedidosDAO->crearPedido($id_usuario);
        $insertarpp = $pedidosDAO->insertarpp($id_pedido); 
        $this->verCarrito(); }
    }
?>
