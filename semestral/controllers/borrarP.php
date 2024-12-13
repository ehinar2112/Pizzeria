<?php
session_start();
if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] != 1) {
    header('Location: ../views/login.html'); // Redirigir si no es administrador
    exit();
}

require_once '../config.php';
require_once '../models/producto.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nombre_producto'])) {
    $conexionObj = new Conexion();
    $db = $conexionObj->conectar();
    $nombre_producto = trim($_POST['nombre_producto']); // Sanear entrada
    $producto = new Producto($db);
    $resultado = $producto->borrarProductoPorNombre($nombre_producto); // Método actualizado

    if ($resultado) {
        header('Location: ../views/borrar_producto.php?exito=1');
    } else {
        header('Location: ../views/borrar_producto.php?error=1');
    }
}
?>

