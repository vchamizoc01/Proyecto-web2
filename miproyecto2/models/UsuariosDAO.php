<?php
// Requerimos el archivo necesario para la conexión a la base de datos
require_once ('database/db.php');

// Definición de la clase UsuarioDAO
class UsuarioDAO {
    // Atributo para la conexión a la base de datos
    public $db_con;

    // Constructor que inicializa la conexión a la base de datos
    public function __construct() {
        $this->db_con = Database::connect();
    }

    // Método para obtener todos los usuarios que coincidan con el nombre de usuario y contraseña proporcionados
    public function getAllUsers($nombre, $contrasena) {
        // Preparamos la sentencia SQL para seleccionar los usuarios con el nombre de usuario y contraseña especificados
        $stmt = $this->db_con->prepare("SELECT * FROM Usuarios WHERE Nombre = ? AND Contrasena = ?");
        // Ejecutamos la sentencia SQL con los parámetros proporcionados
        $stmt->execute([$nombre, $contrasena]);
        // Devolvemos el resultado obtenido como un array asociativo
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
