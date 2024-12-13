<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Pizzas</title>
    <link rel="stylesheet" href="../css/catalogo.css">
</head>
<body>
    <header class="catalogo-header">
        <h1>Catálogo de Pizzas</h1>
        <nav>
            <a href="principalU.php">Inicio</a>
            <a href="contacto.html" class="link">Contacto</a>
            <a href="login.html">Cerrar Sesión</a>
        </nav>
        <?php
        session_start();
        if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] != 2) {
            header('Location: login.html'); // Redirigir si no es usuario regular
            exit();
        }

        // Contenido del área de usuario
        echo "Bienvenido al catalogo de usuarios, " . $_SESSION['usuario'];
        ?>
    </header>
    

    <main class="catalogo-main">
        <section class="productos">
            <?php
            require_once '../models/catalogo.php';
            if (is_array($productos)) {
                foreach ($productos as $producto) {
                    echo "
                        <div class='producto'>
                            <img src='{$producto['Foto_Prod']}' alt='{$producto['Nombre']}'>
                            <h2>{$producto['Nombre']}</h2>
                            <p>{$producto['Descripcion']}</p>
                            <p class='precio'>Precio: S/ {$producto['Precio']}</p>
                            <p class='descuento'>Descuento: {$producto['DescuentoTarjeta']}%</p>
                        </div>
                    ";
                }
            } else {
                echo "<p>Error al cargar los productos.</p>";
            }
            ?>
        </section>
    </main>
</body>
</html>
