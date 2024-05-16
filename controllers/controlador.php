<?php
    ob_start();

    class Controlador {

        function cargarTemplate () {
            include 'views/modules/login.php';
            // include 'views/dashboard.php';
        }

        public function enlacesPaginasControlador() {
            if (isset($_GET["action"])) {
                if (isset($enlace) && count($enlace) > 1) {
                    unset ($enlace);
                }
                $enlace = explode("/", $_GET["action"]);
            }
            else {
                $enlace[0] = "";
                $enlace[1] = "inicio";
            }
            $loginControlador = new LoginControlador();
             $loginControlador->validarSesion(); // Validar sesión antes de incluir la vista

            
            $enlacesPaginasModelo = new EnlacesPaginasModelo();
            $respuesta = $enlacesPaginasModelo -> enlacesPaginas($enlace);
            // echo $respuesta; 
            include ($respuesta);
        }

        
    }

?>