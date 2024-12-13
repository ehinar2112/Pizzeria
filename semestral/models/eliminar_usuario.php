<?php
require_once '../config.php';

class UsuarioModelo {
    public function eliminarUsuario($nombreUsuario) {
        try {
            // Crear conexión a la base de datos
            $conexionObj = new Conexion();
            $conexion = $conexionObj->conectar();

            // Preparar la consulta SQL para eliminar el usuario
            $sql = "DELETE FROM usuarios WHERE user = :user";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(':user', $nombreUsuario, PDO::PARAM_STR);
            $stmt->execute();

            // Verificar si se eliminó algún registro
            return $stmt->rowCount() > 0 ? "Usuario eliminado correctamente." : "No se encontró el usuario.";
        } catch (PDOException $e) {
            return "Error al eliminar el usuario: " . $e->getMessage();
        }
    }
}

?>
