<?php
include_once ('database/db.php');
/**
 * Clase de acceso a datos para la tabla productos. IMplementa todos los métodos que necesiten atacar
 * la tabla productos de la base de datos.
 */
class ProductosDAO {

    //Atributo con la conexión a la BBDD.
    private $db_con;

    //Constructor que inicializa la conexión a la BBDD.
    public function __construct (){
        $this->db_con=Database::connect();
    }

    //Método que devuelve un array con todos los productos existentes en la base de datos.
    public function getAllProductos(){
        $stmt= $this->db_con->prepare("Select * from Productos");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    //Método que devuelve toda la información de un producto dado su id.
    public function getProductById ($id){
        $stmt= $this->db_con->prepare("Select * from Productos where ID_Producto=$id");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetch();        
    }
    public function insertProduct( $Nombre_Producto, $Precio, $Descripcion, $Foto){
        $stmt= $this->db_con->prepare ("Insert into Productos (Nombre_Producto, Precio, Descripcion, Foto) values (:Nombre_Producto, :Precio, :Descripcion, :Foto)");      
        
        $stmt->bindParam(':Nombre_Producto', $Nombre_Producto);
        $stmt->bindParam(':Precio', $Precio);
        $stmt->bindParam(':Descripcion', $Descripcion);
        $stmt->bindParam(':Foto', $Foto);

        try{
            return $stmt->execute();
        } catch (PDOException $e){
            echo $e->getMessage();
        }
        
    }

    public function borrarprod($id){
        $stmt= $this->db_con->prepare ("Delete from Productos where ID_Producto=$id");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();
        return $stmt->fetch();       
    }

}
?>