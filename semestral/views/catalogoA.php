<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Pizzas</title>
    <link rel="stylesheet" href="../css/catadmin.css">
</head>
<body>
    <header class="catalogo-header">
        <h1>Catálogo de Pizzas</h1>
        <?php
        session_start();
        if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] != 1) {
            header('Location: login.html'); // Redirigir si no es administrador
            exit();
        }

        // Contenido del panel de administrador
        echo "Bienvenido al catálogo de productos para administradores, " . $_SESSION['usuario'];
        ?>
        <nav>
            <a href="principal.php">Inicio</a>
            <a href="login.html">Cerrar Sesión</a>
        </nav>
    </header>
    
    <main class="catalogo-main">
        <section class="admin-options">
            <h2>Opciones de Administración</h2>
            <nav>
                <a href="adminht.php">Administrar Productos</a>
                <a href="borrarU.php" class="link">Borrar usuario</a>
                <a href="borrar_producto.php" class="link">Borrar Producto</a>
                <a href="cambiar_permiso.php" class="link">Cambiar permiso</a>
            </nav>
        </section>
        
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
