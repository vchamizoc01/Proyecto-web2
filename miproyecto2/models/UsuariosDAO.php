<?php
require_once ('database/db.php');

class UsuarioDAO{
    public $db_con;
    public function __construct(){
        $this->db_con=Database::connect();
    }
    public function getAllUsers($nombre, $contrasena) {
        $stmt = $this->db_con->prepare("SELECT * FROM Usuarios WHERE Nombre = ? AND Contrasena = ?");
        $stmt->execute([$nombre, $contrasena]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

?>