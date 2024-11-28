<?php
class Database {
    private static $instance = null; // Instancia única de la clase
    private $connection; // Conexión a la base de datos
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "clinica";
    private $port = 3307;

    // Constructor privado para evitar la creación de múltiples instancias
    private function __construct() {
        $this->connection = new mysqli(
            $this->servername,
            $this->username,
            $this->password,
            $this->dbname,
            $this->port
        );

        // Verificar si la conexión falla
        if ($this->connection->connect_error) {
            throw new Exception("Connection failed: " . $this->connection->connect_error);
        }
    }

    // Método para obtener la instancia única
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    // Método para obtener la conexión
    public function getConnection() {
        return $this->connection;
    }

    // Prohibir la clonación del objeto
    private function __clone() {}

}

// Uso del Singleton
try {
    $db = Database::getInstance(); // Obtener la instancia única
    $conn = $db->getConnection(); // Obtener la conexión
    //echo "Conexión exitosa";
} catch (Exception $e) {
    die($e->getMessage());
}
?>
