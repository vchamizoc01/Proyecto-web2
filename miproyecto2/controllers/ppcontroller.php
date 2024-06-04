<?php
include_once ('models/ppDAO.php');
include_once ('views/view.php');

class ppcontroller{
    public function getAllpp(){
        $ppDAO = new ProductospedidosDAO();
        // Recupero los usuarios de la base de datos
        $arraypp = $ppDAO->getAllpp();
        view::show('listarpp', $arraypp);
    }
    public function getPedidoById(){
        if (isset($_GET['ID_Pedidos'])){
            $peDAO=new ProductospedidosDAO();
            $pedido=$peDAO-> getPedidoById($_GET['ID_Pedidos']);
            View::show("pedidoporid",$pedido);
        }
    }
}

?>
