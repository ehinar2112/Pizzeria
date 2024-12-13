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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar Producto</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <!-- Header -->
    <header class="admin-header">
        <h1>Borrar Producto</h1>
        <nav class="admin-nav">
            <a href="principal.php" class="nav-link">Inicio</a>
            <a href="login.html" class="nav-link">Cerrar Sesión</a>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="admin-main">
        <?php if (isset($_GET['exito'])): ?>
            <p class="alert success">¡Producto eliminado exitosamente!</p>
        <?php elseif (isset($_GET['error'])): ?>
            <p class="alert error">Error al eliminar el producto.</p>
        <?php endif; ?>
        
        <form action="../controllers/borrarP.php" method="POST">
            <label for="nombre_producto">Nombre del Producto:</label>
            <input type="text" id="nombre_producto" name="nombre_producto" placeholder="Ingrese el nombre del producto" required>
            <button type="submit">Borrar Producto</button>
        </form>
    </main>
</body>
</html>
