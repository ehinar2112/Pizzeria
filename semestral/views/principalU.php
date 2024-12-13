<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a Pizzería</title>
    <link rel="stylesheet" href="../css/principal.css">
</head>
<body>
    <header class="header">
        <div class="logo-container">
            <img src="../imagenes/logo.jpeg" alt="Logo de la Pizzería" class="logo">
        </div>
        <?php
        session_start();
        if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] != 2) {
            header('Location: login.html'); // Redirigir si no es usuario regular
            exit();
        }

        // Contenido del área de usuario
        echo "Bienvenido al área de usuario, " . $_SESSION['usuario'];
        ?>
    </header>

    <main class="main-content">
        <section class="welcome-section">
            <h2>Explora nuestro delicioso menú</h2>
            <p>En nuestra pizzería ofrecemos las mejores pizzas elaboradas con ingredientes frescos y de alta calidad. ¡Disfruta una experiencia única para tu paladar!</p>
        </section>

        <section class="navigation-links">
            <h3>Accesos Rápidos</h3>
            <div class="links-container">
                <a href="catalogoU.php" class="link">Ver Catálogo</a>
                <a href="contacto.html" class="link">Contacto</a>
                <a href="login.html" class="link">Cerrar Sesión</a>
            </div>
        </section>
    </main>
</body>
</html>