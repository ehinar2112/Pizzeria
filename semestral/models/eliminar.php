<?php
require_once 'eliminar_usuario.php';

class ControladorEliminarUsuario {
    public function manejarSolicitud() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['nombre_usuario'])) {
                $nombreUsuario = trim($_POST['nombre_usuario']);
                $modelo = new UsuarioModelo();
                $resultado = $modelo->eliminarUsuario($nombreUsuario);
    
                // Guardar el resultado en la sesión y redirigir
                session_start();
                $_SESSION['resultado'] = $resultado;
                header('Location: ../views/borrarU.php');
                exit();
            } else {
                echo "Por favor, ingresa el nombre de usuario.";
            }
        }
    }
    
}


$controlador = new ControladorEliminarUsuario();
$controlador->manejarSolicitud();
?>
