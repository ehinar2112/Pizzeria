<?php
require_once '../config.php';

class Usuario {
    private $db;

    public function __construct($db) {
        $this->db = $db; // Usa la conexión pasada como parámetro
    }

    public function cambiarNivelPermiso($nombre_usuario, $nuevo_permiso) {
        $query = "UPDATE usuarios SET TipoUsuarioID = :nuevo_permiso WHERE user = :nombre_usuario";
        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':nuevo_permiso', $nuevo_permiso, PDO::PARAM_INT);
        $stmt->bindParam(':nombre_usuario', $nombre_usuario, PDO::PARAM_STR);

        return $stmt->execute();
    }
}
?>

