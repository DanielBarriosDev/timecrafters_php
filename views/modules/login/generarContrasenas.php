<?php

    // if (!isset($_SESSION['validado'])) {
    //     header("location: views/modules/login.php"); 
    //     exit();
    // }
    

    // Incluir los archivos necesarios
    require_once 'controllers/loginControlador.php';

    // Crear una instancia del controlador LoginControlador
    $loginControlador = new LoginControlador();

    // Llamar al método generarPasswordDefectoControlador()
    $loginControlador -> generarPasswordDefectoControlador();

    echo "Contraseñas generadas y asignadas a los usuarios existentes.";
?>

