<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a Pizzería</title>
    <link rel="stylesheet" href="../css/inicio.css">
</head>
<body>
    <header class="admin-header">
        <div class="logo">
            <img src="../imagenes/logo.jpeg" alt="Logo de la Pizzería" class="logo">
        </div>
        <?php
        session_start();
        if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] != 1) {
            header('Location: login.html'); // Redirigir si no es administrador
            exit();
        }
        echo "Bienvenido al panel de administracion, " . $_SESSION['usuario'];
        ?>
        <nav class="admin-nav">
            <ul>
                <li><a href="catalogoA.php">Ver Catálogo</a></li>
                <li><a href="../views/login.html" class="logout-link">Cerrar Sesión</a></li>
            </ul>
        </nav>

    </header>
    <main class="admin-main">
        <section class="welcome-section">
            <h2>¡Bienvenido, Administrador!</h2>
            <p>"Recuerda, cada decisión que tomas como administrador ayuda a que más personas disfruten de momentos únicos con nuestras pizzas. ¡El éxito de la pizzería está en tus manos!" 🍕✨</p>
        </section>

        <section class="quick-access">
            <h3>Accesos Rápidos</h3>
            <div class="quick-links">
                <a href="adminht.php" class="btn">Anadir productos</a>
                <a href="borrarU.php" class="btn">Borrar Usuario</a>
                <a href="borrar_producto.php" class="btn">Borrar Producto</a>
                <a href="cambiar_permiso.php" class="btn">Cambiar Permiso</a>
            </div>
        </section>
    </main>
</body>
</html>
