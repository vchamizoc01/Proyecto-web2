
<?php
include_once ('database/db.php');
class ProductospedidosDAO {
    private $db_con;

    function __construct() {
        $this->db_con=Database::connect();
    }

    public function getAllpp(){
            $stmt= $this->db_con->prepare("Select * from Pedidos");
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            return $stmt->fetchAll();
        }
    public function getPedidoById($id){
            $stmt= $this->db_con->prepare("Select * from ProductosPedidos where ID_Pedidos=$id");
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            return $stmt->fetchAll();
        }
}
?>
