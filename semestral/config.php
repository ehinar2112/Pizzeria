<?php
class Conexion {
    private $host = "192.168.174.101";
    private $db = "pizzeria"; // Nombre de la base de datos
    private $user = "regular_user"; // Usuario de la base de datos
    private $password = "gatita12"; 
    private $charset = "utf8mb4";

    public function conectar() {
        try {
            $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::MYSQL_ATTR_SSL_CA => "/home/ehinar/ca-cert.pem",
            ];

            $pdo = new PDO($dsn, $this->user, $this->password, $options);
            return $pdo;
        } catch (PDOException $e) {
            die("Error al conectar con la base de datos: " . $e->getMessage());
        }
    }
}
?>
