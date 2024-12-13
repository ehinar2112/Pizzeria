<?php
class Producto {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function borrarProductoPorNombre($nombre_producto) {
        $query = "DELETE FROM productos WHERE nombre = ?";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([$nombre_producto]);
    }
}
?>

