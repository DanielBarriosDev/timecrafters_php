<?php

    // Controladores 

    require_once 'controllers/controlador.php';
    require_once 'controllers/usuariosControlador.php';
    require_once 'controllers/ciudadesControlador.php';
    require_once 'controllers/rolesControlador.php';
    require_once 'controllers/rolesUsuariosControlador.php';


    // Modelos o DAOS 

    require_once 'models/enlacesPaginasModelo.php';
    require_once 'models/usuariosDAO.php';
    require_once 'models/cuidadesDAO.php';
    require_once 'models/rolesDAO.php';
    require_once 'models/rolesUsuariosDAO.php';

    
    // Clases
    
    require_once 'models/usuarios.php';
    require_once 'models/ciudades.php';
    require_once 'models/roles.php';
    require_once 'models/rolesUsuarios.php';


    $controlador = new Controlador();
    $controlador -> cargarTemplate();

    // if (!isset($_SESSION['usuario'])) {
    //     include_once 'views/modules/login/login.php';
    // } else {
    //     $controlador -> cargarTemplate();
    // }

    


    

?>