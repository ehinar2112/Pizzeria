<?php
require_once '../config.php';

class AdminController {
    public function agregarProducto($nombre, $descripcion, $precio, $descuento, $imagen) {
        try {
            $conexionObj = new Conexion();
            $conexion = $conexionObj->conectar();

            // Procesar imagen
            $nombreImagen = $imagen['name'];
            $rutaDestino = '../imagenes/' . $nombreImagen;

            if (!move_uploaded_file($imagen['tmp_name'], $rutaDestino)) {
                return "Error al subir la imagen.";
            }

            // Insertar producto en la base de datos
            $sql = "INSERT INTO productos (Nombre, Descripcion, Precio, Foto_Prod, DescuentoTarjeta)
                    VALUES (:nombre, :descripcion, :precio, :foto, :descuento)";
            $stmt = $conexion->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':descripcion', $descripcion);
            $stmt->bindParam(':precio', $precio);
            $stmt->bindParam(':foto', $rutaDestino);
            $stmt->bindParam(':descuento', $descuento);

            if ($stmt->execute()) {
                return true;
            } else {
                return "Error al insertar el producto.";
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }
}
?>
