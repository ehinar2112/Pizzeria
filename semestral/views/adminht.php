<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="../css/adminht.css">
</head>
<body>
    <header class="admin-header">
        <div class="top-bar">
            <a href="principal.php" class="nav-link">Inicio</a>
            <a href="login.html" class="nav-link">Cerrar Sesión</a>
        </div>
        <div class="header-content">
            <?php
            session_start();
            if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] != 1) {
                header('Location: login.html'); // Redirigir si no es administrador
                exit();
            }

            // Contenido del panel de administrador
            echo "<h1>Bienvenido al panel de administrador, " . $_SESSION['usuario'] . "</h1>";
            ?>
            <nav class="admin-nav">
                <a href="catalogoA.php" class="nav-link">Catálogo</a>
                <a href="borrarU.php" class="nav-link">Borrar usuario</a>
                <a href="borrarP.php" class="nav-link">Borrar Producto</a>
                <a href="cambiar_permiso.php" class="nav-link">Cambiar permiso</a>
            </nav>
        </div>
    </header>

    <main class="admin-main">
        <section class="admin-form">
            <h2>Agregar Producto</h2>
            <form id="adminForm" method="POST" action="../controllers/intermediario_admin.php" enctype="multipart/form-data">
                <input type="text" name="nombre" placeholder="Nombre del Producto" required>
                <textarea name="descripcion" placeholder="Descripción del Producto" required></textarea>
                <input type="number" step="0.01" name="precio" placeholder="Precio" required>
                <input type="file" name="imagen" accept="image/*" required>
                <input type="number" step="0.01" name="descuento" placeholder="Descuento (opcional)">
                <button type="submit">Agregar Producto</button>
            </form>
        </section>
    </main>
    <?php if (isset($_GET['mensaje'])): ?>
        <div class="alert success">
            <?php echo htmlspecialchars($_GET['mensaje']); ?>
        </div>
    <?php elseif (isset($_GET['error'])): ?>
        <div class="alert error">
            <?php echo htmlspecialchars($_GET['error']); ?>
        </div>
    <?php endif; ?>
</body>
</html>
