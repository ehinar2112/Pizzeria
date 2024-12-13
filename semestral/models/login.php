<?php
require_once '../config.php'; // Incluye la conexión a la base de datos

class ControladorLogin {
    private $db;

    public function __construct() {
        $conexion = new Conexion();
        $this->db = $conexion->conectar();
    }

    public function validarLogin($usuario, $contrasena) {
        if (empty($usuario) || empty($contrasena)) {
            return "Por favor, complete ambos campos.";
        }

        try {
            // Consultar el usuario en la base de datos
            $query = "SELECT * FROM usuarios WHERE user = :usuario";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(":usuario", $usuario, PDO::PARAM_STR);
            $stmt->execute();

            $usuarioData = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($usuarioData) {
                // Validar la contraseña
                if (password_verify($contrasena, $usuarioData['Contrasena'])) {
                    return $usuarioData['TipoUsuarioID'];
                } else {
                    return "Contraseña incorrecta.";
                }
            } else {
                return "El usuario no existe.";
            }
        } catch (PDOException $e) {
            return "Error en la validación: " . $e->getMessage();
        }
    }
}
?>
