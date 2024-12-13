<?php
require_once '../models/login.php'; // Incluye la clase ControladorLogin

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener datos del formulario
    $usuario = $_POST['usuario'] ?? '';
    $contrasena = $_POST['contrasena'] ?? '';

    // Crear instancia del controlador
    $controlador = new ControladorLogin();

    // Validar credenciales
    $resultado = $controlador->validarLogin($usuario, $contrasena);

    if (is_numeric($resultado)) { // Si retorna un número, es un TipoUsuarioID válido
        // Inicio de sesión exitoso
        session_start();
        $_SESSION['usuario'] = $usuario;
        $_SESSION['tipo_usuario'] = $resultado; // Guardar TipoUsuarioID en la sesión

        // Redirigir según el tipo de usuario
        if ($resultado == 1) {
            // Si es administrador, redirige a admin.php
            header('Location: ../views/principal.php');
        } elseif ($resultado == 2) {
            // Si es usuario regular, redirige a usuario.php
            header('Location: ../views/principalU.php');
        }
        exit();
    } else {
        // Error de inicio de sesión
        echo "<script>alert('$resultado');</script>";
        echo "<script>window.location.href = '../views/login.html';</script>";
    }
}
?>
