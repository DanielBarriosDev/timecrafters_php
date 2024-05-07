<?php
    ob_start();

    class Controlador {

        function cargarTemplate () {

            if (isset($_SESSION['validado']) && $_SESSION['validado'] == true) {
                // Si el usuario está validado, carga el template principal
                include 'views/template.php';

            } else {
                // Si el usuario no está validado, carga el formulario de inicio de sesión
                include 'views/modules/login.php';

            }
           
        }

        public function enlacesPaginasControlador() {
            if (isset($_GET["action"])) {
                if (isset($enlace) && count($enlace) > 1) {
                    unset ($enlace);
                }
                $enlace = explode("/", $_GET["action"]);
            }
            else {
                $enlace[0] = "login";
                $enlace[1] = "home";
            }
            
            
            $enlacesPaginasModelo = new EnlacesPaginasModelo();
            $respuesta = $enlacesPaginasModelo -> enlacesPaginas($enlace);
            // echo $respuesta; 
            include ($respuesta);
        }

        // function cargarTemplate () {
        //     include 'views/template.php';
        // }
    
        // public function enlacesPaginasControlador() {
        //     if (isset($_SESSION['validado'])) {
        //         header("Location:" . SERVERURL ."dashboard");
        //         exit();
        //     }
    
        //     if ($_SERVER['REQUEST_URI'] === '/timecrafters/') {
        //         include 'views/modules/login.php';
        //         exit();
        //     }
    
        //     if (isset($_GET["action"])) {
        //     }
        //     else {
        //     }
    
        //     $enlacesPaginasModelo = new EnlacesPaginasModelo();
        //     $respuesta = $enlacesPaginasModelo->enlacesPaginas($enlace);
        //     include ($respuesta);
        // }
    }

?>