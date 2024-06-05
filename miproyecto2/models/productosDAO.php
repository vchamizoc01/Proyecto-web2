<?php
// Incluimos el archivo necesario para la conexión a la base de datos
include_once ('database/db.php');

/**
 * Clase de acceso a datos para la tabla productos. Implementa todos los métodos que necesitan interactuar
 * con la tabla productos de la base de datos.
 */
class ProductosDAO {

    // Atributo con la conexión a la BBDD
    private $db_con;

    // Constructor que inicializa la conexión a la BBDD
    public function __construct() {
        $this->db_con = Database::connect();
    }

    // Método que devuelve un array con todos los productos existentes en la base de datos
    public function getAllProductos() {
        // Preparamos la sentencia SQL para seleccionar todos los registros de la tabla Productos
        $stmt = $this->db_con->prepare("SELECT * FROM Productos");
        // Configuramos el modo de obtención de resultados a un array asociativo
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        // Ejecutamos la sentencia SQL
        $stmt->execute();
        // Devolvemos todos los resultados obtenidos
        return $stmt->fetchAll();
    }

    // Método que devuelve toda la información de un producto dado su ID
    public function getProductById($id) {
        // Preparamos la sentencia SQL para seleccionar el producto con el ID especificado
        $stmt = $this->db_con->prepare("SELECT * FROM Productos WHERE ID_Producto = :id");
        // Asignamos el parámetro ID del producto a la sentencia SQL
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        // Configuramos el modo de obtención de resultados a un array asociativo
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        // Ejecutamos la sentencia SQL
        $stmt->execute();
        // Devolvemos el resultado obtenido
        return $stmt->fetch();
    }

    // Método para insertar un nuevo producto en la base de datos
    public function insertProduct($Nombre_Producto, $Precio, $Descripcion, $Foto) {
        // Preparamos la sentencia SQL para insertar un nuevo producto
        $stmt = $this->db_con->prepare("INSERT INTO Productos (Nombre_Producto, Precio, Descripcion, Foto) VALUES (:Nombre_Producto, :Precio, :Descripcion, :Foto)");
        
        // Asignamos los parámetros de la sentencia SQL
        $stmt->bindParam(':Nombre_Producto', $Nombre_Producto);
        $stmt->bindParam(':Precio', $Precio);
        $stmt->bindParam(':Descripcion', $Descripcion);
        $stmt->bindParam(':Foto', $Foto);

        try {
            // Ejecutamos la sentencia SQL y devolvemos el resultado
            return $stmt->execute();
        } catch (PDOException $e) {
            // En caso de error, mostramos el mensaje de error
            echo $e->getMessage();
        }
    }

    // Método para borrar un producto de la base de datos dado su ID
    public function borrarprod($id) {
        // Preparamos la sentencia SQL para borrar el producto con el ID especificado
        $stmt = $this->db_con->prepare("DELETE FROM Productos WHERE ID_Producto = :id");
        // Asignamos el parámetro ID del producto a la sentencia SQL
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        // Configuramos el modo de obtención de resultados a un array asociativo
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        // Ejecutamos la sentencia SQL
        $stmt->execute();
        // Devolvemos el resultado obtenido
        return $stmt->fetch();
    }
}
?>
