<?php
session_start();
if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] != 1) {
    header('Location: ../views/login.html');
    exit();
}

require_once '../config.php';
require_once '../models/usuario.php';

// Crear una instancia de Conexion y obtener la conexión
$conexion = new Conexion();
$db = $conexion->conectar();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['nombre_usuario'], $_POST['nuevo_permiso'])) {

    $nombre_usuario = trim($_POST['nombre_usuario']); 
    $nuevo_permiso = intval($_POST['nuevo_permiso']);   
    $usuario = new Usuario($db);
    $resultado = $usuario->cambiarNivelPermiso($nombre_usuario, $nuevo_permiso);

    if ($resultado) {
        header('Location: ../views/cambiar_permiso.php?exito=1');
    } else {
        header('Location: ../views/cambiar_permiso.php?error=1');
    }
}
?>