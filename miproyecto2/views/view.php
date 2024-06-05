<?php 
// Definición de la clase view
class view {
    // Método estático para mostrar una vista
    public static function show ($viewname, $data = null) {
        // Incluimos el archivo de la vista especificada
        include ("$viewname.php");
    }
}
?>
