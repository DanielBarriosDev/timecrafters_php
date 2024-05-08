<?php

    // if(isset($_SESSION['validado'])){
    //     session_destroy();
    //     header("location:" . SERVERURL);
    //     include 'views/modules/login.php';

    // }

    session_start();
    if (!isset($_SESSION['validado']) || $_SESSION['validado'] !== true) {
        // Si el usuario no está logueado, redirigir al login
        header("Location: " . SERVERURL);
        exit();
    } else {
        // Si el usuario está logueado, limpiar la sesión y redirigir al login
        session_unset(); // Limpiar todas las variables de sesión
        session_destroy(); // Destruir la sesión
        header("Location: " . SERVERURL);
        exit();
    }

?>
