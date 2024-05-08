<?php
    ob_start();

    class Controlador {

        function cargarTemplate () {

            // if (!isset($_SESSION['validado'])) {
            //     include('views/modules/login.php');
            // } else {
            //     include('views/template.php');
            // }



            include 'views/dashboard.php';
            // include 'views/modules/login.php';
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

        
    }

?>