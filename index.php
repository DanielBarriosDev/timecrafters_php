<?php

    // Controladores 

    require_once 'controllers/controlador.php';
    require_once 'controllers/usuariosControlador.php';
    require_once 'controllers/ciudadesControlador.php';
    require_once 'controllers/rolesControlador.php';


    // Modelos o DAOS 

    require_once 'models/enlacesPaginasModelo.php';
    require_once 'models/usuariosDAO.php';
    require_once 'models/cuidadesDAO.php';
    require_once 'models/rolesDAO.php';

    
    // Clases
    
    require_once 'models/usuarios.php';
    require_once 'models/ciudades.php';
    require_once 'models/roles.php';


    $controlador = new Controlador();
    $controlador -> cargarTemplate();

?>