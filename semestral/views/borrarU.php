<?php
session_start();
$resultado = $_SESSION['resultado'] ?? null;
unset($_SESSION['resultado']); // Limpiar el mensaje después de mostrarlo
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Usuario</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <!-- Header -->
    <header class="admin-header">
        <h2>Eliminar Usuario</h2>
        <nav class="admin-nav">
            <a href="principal.php" class="nav-link">Inicio</a>
            <a href="login.html" class="nav-link">Cerrar Sesión</a>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="admin-main">
        <form method="POST" action="../models/eliminar.php">
            <input type="text" name="nombre_usuario" placeholder="Nombre de Usuario" required>
            <button type="submit">Eliminar Usuario</button>
        </form>

        <?php if (isset($resultado)): ?>
            <div class="resultado">
                <p><?php echo htmlspecialchars($resultado); ?></p>
            </div>
        <?php endif; ?>
    </main>
</body>
</html>
