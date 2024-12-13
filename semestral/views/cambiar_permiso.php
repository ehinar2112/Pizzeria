<?php
session_start();
if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] != 1) {
    header('Location: login.html');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cambiar Nivel de Permiso</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h1>Cambiar Nivel de Permiso</h1>
    <?php if (isset($_GET['exito'])): ?>
        <p class="success">¡Permiso actualizado exitosamente!</p>
    <?php elseif (isset($_GET['error'])): ?>
        <p class="error">Error al actualizar el permiso.</p>
    <?php endif; ?>
    <form action="../controllers/cambiarP.php" method="POST">
        <label for="nombre_usuario">Nombre del usuario:</label>
        <input type="textbox" id="nombre_usuario" name="nombre_usuario" required>
        <label for="nuevo_permiso">Nuevo Permiso (1 = Admin, 2 = Usuario):</label>
        <select id="nuevo_permiso" name="nuevo_permiso">
            <option value="1">Administrador</option>
            <option value="2">Usuario</option>
        </select>
        <button type="submit">Cambiar Permiso</button>
    </form>

    <!-- Botón para regresar al inicio -->
    <a href="../views/login.html" class="btn-inicio">Cerrar session</a>
    <a href="../views/principal.php" class="btn-inicio">Ir al Inicio</a>
</body>
</html>

