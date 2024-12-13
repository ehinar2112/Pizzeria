<?php
require_once '../models/admin.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $descuento = $_POST['descuento'] ?? 0;
    $imagen = $_FILES['imagen'];

    $adminController = new AdminController();
    $resultado = $adminController->agregarProducto($nombre, $descripcion, $precio, $descuento, $imagen);

    if ($resultado === true) {
        header("Location: ../views/adminht.php?mensaje=Producto agregado con éxito");
        exit();
    } else {
        header("Location: ../views/adminht.php?error=" . urlencode("Error al agregar el producto: " . $resultado));
        exit();
    }
}
?>
