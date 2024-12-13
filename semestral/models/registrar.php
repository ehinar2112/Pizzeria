<?php
require_once '../config.php'; // Incluye la conexión a la base de datos

class ControladorRegistro {
    private $db;

    public function __construct() {
        $conexion = new Conexion();
        $this->db = $conexion->conectar();
    }

    public function registrarUsuario($data) {
        // Validar que todos los campos estén completos
        foreach ($data as $campo) {
            if (empty($campo)) {
                return "Por favor complete todos los campos.";
            }
        }

        // Verificar si el usuario ya existe
        try {
            $query = "SELECT * FROM usuarios WHERE user = :usuario";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(":usuario", $data['usuario'], PDO::PARAM_STR);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return "El usuario ya existe. Por favor, elija otro nombre de usuario.";
            }

            // Insertar el nuevo usuario en la base de datos
            $query = "INSERT INTO usuarios (user, Contrasena, ClienteID, TipoUsuarioID) VALUES (:usuario, :contrasena, NULL, 2)";
            $stmt = $this->db->prepare($query);

            // Encriptar la contraseña
            $contrasenaEncriptada = password_hash($data['contrasena'], PASSWORD_DEFAULT);

            // Asignar parámetros
            $stmt->bindParam(":usuario", $data['usuario'], PDO::PARAM_STR);
            $stmt->bindParam(":contrasena", $contrasenaEncriptada, PDO::PARAM_STR);

            $stmt->execute();

            return "Registro exitoso.";
        } catch (PDOException $e) {
            return "Error al registrar: " . $e->getMessage();
        }
    }
}
?>
