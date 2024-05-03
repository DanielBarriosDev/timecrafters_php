<?php
// Incluir los archivos necesarios
require_once 'controllers/loginControlador.php';

// Crear una instancia del controlador LoginControlador
$loginControlador = new LoginControlador();

// Llamar al método generarPasswordDefectoControlador()
$loginControlador -> generarPasswordDefectoControlador();

echo "Contraseñas generadas y asignadas a los usuarios existentes.";
?>

