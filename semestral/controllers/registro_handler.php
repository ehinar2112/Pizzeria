<?php
require_once '../models/registrar.php'; // Incluye la clase ControladorRegistro

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recopilar los datos del formulario
    $data = [
        'nombre' => $_POST['nombre'] ?? '',
        'apellido' => $_POST['apellido'] ?? '',
        'correo' => $_POST['correo'] ?? '',
        'usuario' => $_POST['usuario'] ?? '',
        'contrasena' => $_POST['contrasena'] ?? ''
    ];

    // Crear instancia del controlador
    $controlador = new ControladorRegistro();

    // Registrar usuario
    $resultado = $controlador->registrarUsuario($data);

    // Manejar respuesta
    if ($resultado === "Registro exitoso.") {
        echo "<script>alert('$resultado');</script>";
        echo "<script>window.location.href = '../views/login.html';</script>";
    } else {
        echo "<script>alert('$resultado');</script>";
        echo "<script>window.location.href = '../views/registro.html';</script>";
    }
}
?>
