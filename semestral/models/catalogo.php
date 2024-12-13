<?php
require_once '../config.php';

class CatalogoController {
    public function obtenerProductos() {
        try {
            $conexionObj = new Conexion();
            $conexion = $conexionObj->conectar();
            $sql = "SELECT Nombre, Descripcion, Precio, Foto_Prod, DescuentoTarjeta FROM productos";
            $stmt = $conexion->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }
}

// Extraer productos
$catalogoController = new CatalogoController();
$productos = $catalogoController->obtenerProductos();
?>
