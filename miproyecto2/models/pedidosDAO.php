<?php
// Incluimos el archivo necesario para la conexión a la base de datos
include_once ('database/db.php');

class PedidosDAO {
    private $db_con;

    // Constructor para establecer la conexión a la base de datos
    public function __construct() {
        $this->db_con = Database::connect();
    }

    // Método para crear un nuevo pedido
    public function crearPedido($id_usuario) {
        // Obtenemos la fecha actual
        $hoy = date("Y-m-d");

        // Preparamos la sentencia SQL para insertar un nuevo pedido
        $stmt = $this->db_con->prepare("INSERT INTO Pedidos (ID_Usuario, fecha) VALUES (:ID_Usuario, :fecha)");
        
        // Asignamos los parámetros de la sentencia SQL
        $stmt->bindParam(':ID_Usuario', $id_usuario);
        $stmt->bindParam(':fecha', $hoy);

        try {
            // Ejecutamos la sentencia SQL
            $stmt->execute();
            // Devolvemos el ID del último pedido insertado
            return $this->db_con->lastInsertId();
        } catch (PDOException $e) {
            // En caso de error, mostramos el mensaje de error
            echo $e->getMessage();
        }
    }

    // Método para insertar productos en un pedido
    public function insertarpp($id_pedido) {
        // Preparamos la sentencia SQL para insertar productos en un pedido
        $stmt = $this->db_con->prepare("INSERT INTO ProductosPedidos (ID_Pedidos, ID_Producto) VALUES (:ID_Pedido, :ID_Producto)");
        
        // Recorremos los productos en el carrito de la sesión
        foreach ($_SESSION['cart'] as $pp) {
            // Asignamos los parámetros de la sentencia SQL
            $stmt->bindValue(':ID_Pedido', $id_pedido);
            $stmt->bindValue(':ID_Producto', $pp);
            // Ejecutamos la sentencia SQL
            $stmt->execute();
        }

        // Vaciamos el carrito de la sesión
        $_SESSION['cart'] = array();
    }
}
?>
