<?php
/**
 * Clase que implementa un método estático para realizar la conexión a la BBDD. Obtiene los datos de conexión
 * de variables de entorno existentes en el fichero .env.
 */
class Database {

    public static function connect (){
        $host = 'mariadb';          // Dirección del host de la base de datos
        $dbname = 'database';     // Nombre de la base de datos
        $username = 'admin';        // Nombre de usuario de la base de datos
        $password = 'changepassword';        // Contraseña de la base de datos

        try {
            $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname . ';charset=utf8';
            // Intentar establecer la conexión PDO
            $dbh = new PDO($dsn, $username, $password);
            // Devolver el objeto PDO si la conexión es exitosa
            return $dbh;
        } catch (PDOException $e ) {
            echo "Connection failed: " . $e->getMessage();
            // Devolver null si la conexión falla
            return null;
        }
    }
}
?>