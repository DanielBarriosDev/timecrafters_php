<?php
    // Iniciar sesión si aún no lo está
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Verificar si el usuario ha iniciado sesión
    if (isset($_SESSION['validado']) && $_SESSION['validado'] === true) {
        // Limpiar todas las variables de sesión
        $_SESSION = array();

        // Si se está usando cookies para la sesión, también borrar la cookie
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        // Destruir la sesión
        session_destroy();
    }

    // Redirigir al login solo si la sesión ha sido destruida
    if (session_status() === PHP_SESSION_NONE) { // <-- Condición agregada
        header("Location: " . SERVERURL);
        exit();
    }
?>