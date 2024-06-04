<?php
include_once ('database/db.php');
class PedidosDAO {
    private $db_con;

    public function __construct() {
        $this->db_con=Database::connect();
    }

    public function crearPedido($id_usuario) {
        $hoy = date("Y-m-d");
        $stmt= $this->db_con->prepare ("Insert into Pedidos (ID_Usuario,fecha) values (:ID_Usuario,:fecha)");      
        
        $stmt->bindParam(':ID_Usuario', $id_usuario);
        $stmt->bindParam(':fecha', $hoy);
        try{
            $stmt->execute();
            return $this->db_con->lastInsertId();
        } catch (PDOException $e){
            echo $e->getMessage();
        }
    }
    public function insertarpp($id_pedido) {
        $stmt = $this->db_con->prepare("insert into ProductosPedidos (ID_Pedidos, ID_Producto) values (:ID_Pedido, :ID_Producto)");
        
        foreach ($_SESSION['cart'] as $pp ){   
            
            $stmt->bindValue(':ID_Pedido', $id_pedido);
            $stmt->bindValue(':ID_Producto', $pp);
            $stmt->execute();
        }$_SESSION['cart'] = array();
    }
    

}

?>
