<?php

// session_start();

    // Controladores

    require_once 'controllers/controlador.php';
    require_once 'controllers/usuariosControlador.php';
    require_once 'controllers/ciudadesControlador.php';
    require_once 'controllers/rolesControlador.php';
    require_once 'controllers/rolesUsuariosControlador.php';
    require_once 'controllers/loginControlador.php';
    require_once 'controllers/departamentosControlador.php';


    // Modelos o DAOS

    require_once 'models/enlacesPaginasModelo.php';
    require_once 'models/usuariosDAO.php';
    require_once 'models/ciudadesDAO.php';
    require_once 'models/rolesDAO.php';
    require_once 'models/rolesUsuariosDAO.php';
    require_once 'models/loginDAO.php';
    require_once 'models/departamentosDAO.php';

    
    // Clases
    
    require_once 'models/usuarios.php';
    require_once 'models/ciudades.php';
    require_once 'models/roles.php';
    require_once 'models/rolesUsuarios.php';
    require_once 'models/login.php';
    require_once 'models/departamentos.php';


    $controlador = new Controlador();
    // $controlador -> cargarTemplate();
    

    /*if (isset($_SESSION['validado'])) {
        $controlador->cargarTemplate('dashboard.php'); // Cargar dashboard si ha iniciado sesión
    } else {
        $controlador->cargarTemplate('modules/login.php');  // Cargar login si no ha iniciado sesión
    }*/


    // Redirigir al dashboard si la sesión está activa y la ruta es la raíz
    if (isset($_SESSION['validado']) && ($_SERVER['REQUEST_URI'] === '/' || $_SERVER['REQUEST_URI'] === '/index.php')) {
        header("Location: " . SERVERURL . "dashboard");
        exit;
    }

    // Verificar si el usuario ha iniciado sesión para cargar la vista correcta
    if (isset($_SESSION['validado'])) {
        $controlador->cargarTemplate('dashboard.php'); // Cargar dashboard si ha iniciado sesión
    } else {
        $controlador->cargarTemplate('modules/login.php');  // Cargar login si no ha iniciado sesión
    }

    // if (!isset($_SESSION['validado'])) {
    //     include_once 'views/modules/login.php';
    // } else {
    //     $controlador -> cargarTemplate();
    // }


    // require_once 'controllers/correosPHPMailer.php';

    echo $_SERVER['REQUEST_URI'];
?>
